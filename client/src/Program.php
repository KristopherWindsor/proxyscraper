<?php
namespace Client;

use GuzzleHttp;

class Program
{
    protected $args;
    protected $clientId;
    protected $hibernate;
    protected $endpoint;
    protected $logger;

    public function __construct(Args $args)
    {
        $this->args      = $args;
        $this->clientId  = new ClientId($this->args->getArg('clientId'));
        $this->hibernate = new Hibernate($this->clientId);
        $this->endpoint  = new Endpoint($this->clientId, $this->args->getArg('server'));
        $this->logger    = new VerboseLogger($this->clientId);

        $this->run();
    }

    public function run()
    {
        $instructions = $this->getInstructions();

        if (!empty($instructions->doRepeat)) {
            // In this mode, the client requests more instructions as soon as it is done,
            // exiting after several minutes
            $repeatForSeconds = $instructions->repeatForSeconds ?? 1800;
            $exitTime = new \DateTime('+' . $repeatForSeconds . ' seconds');

            // The client will run for several minutes, so only one process should be running
            // We hibernate without exiting to prevent other clients from starting up
            $this->dieIfOtherProcessRunning();
            $this->hibernate->hibernateFor($repeatForSeconds);

            for (;
                $this->processInstructions($instructions), new \DateTime() < $exitTime;
                $instructions = $this->getInstructions()
            );
        } else {
            sleep(rand(1, 30)); // Don't burst all activity right on the minute
            $this->processInstructions($instructions);
        }
    }

    protected function dieIfOtherProcessRunning()
    {
        $running = exec("ps aux | grep 'client2.php' | grep -v grep | wc -l");
        if ($running > 1) {
            $this->logger->log('quitting because other instance is running');
            die();
        }
    }

    protected function getInstructions() : array
    {
        $client = new GuzzleHttp\Client();
        $response = $client->get($this->endpoint . 'instructions');
        $instructions = @json_decode($response->getBody(), true);
        $this->logger->log(
            'got instructions',
            [
                'endpoint' => $this->endpoint . 'instructions',
                'instructions' => $instructions,
                'httpCode' => $response->getStatusCode(),
            ]
        );
        if (!$instructions) {
            // Safe place to quit
            $this->hibernate->hibernateUntil(time() + 120);
            die();
        }
        return $instructions;
    }

    protected function processInstructions(array $instructions)
    {
        $sleepDuration = 600;

        switch ($instructions['action'] ?? null) {
            case 'getPages':
                $this->doGetPages($instructions);
                break;
            case 'getRSS':
                $this->doGetRSS($instructions);
                break;
            case 'hibernate':
                $sleepDuration = $instructions['seconds'] ?? $sleepDuration;
            default:
                $this->hibernate->hibernateFor($sleepDuration);
        }
    }

    protected function doGetPages(array $instructions)
    {
        // TODO
    }

    protected function doGetRSS(array $instructions)
    {
        // TODO
    }

    protected function reportForbiddenAndQuit($url)
    {
        $instructions = @json_decode(file_get_contents($this->endpoint . 'reportError'));
        $this->logger->log('reported error', ['403' => 'encountered', 'url' => $url, 'instructions' => $instructions]);
        $this->hibernate->hibernateUntil(time() + ($instructions->hibernateSeconds ?? 600));
        die();
    }
}
