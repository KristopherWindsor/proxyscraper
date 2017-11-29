<?php
namespace Client;

class VerboseLogger
{
    private $clientId;

    public function __construct(ClientId $clientId)
    {
        $this->clientId = $clientId;
    }

    public function log($event, array $data = [])
    {
        file_put_contents(
            __DIR__ . '/../verbose-' . $this->clientId . '.log',
            date(\DateTime::ATOM) . ' ' . $event . ' pid=' . getmypid() . "\n" . json_encode($data) . "\n\n",
            FILE_APPEND
        );
    }
}
