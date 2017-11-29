<?php
namespace Client;

class Endpoint
{
    const CLIENT_VERSION = '1.1';

    private $endpoint;

    public function __construct(ClientId $clientId, $endpointBase)
    {
        $endpointFilename = __DIR__ . '/../api.dat';

        if ($endpointBase) {
            // OK
        } elseif (!file_exists($endpointFilename) || filemtime($endpointFilename) < time() - 3600 * 4) {
            $endpointBase = trim(file_get_contents('http://windsorportal.com/acerbox.txt'));
            if (!$endpointBase)
                die();
            file_put_contents($endpointFilename, $endpointBase);
        } else {
            $endpointBase = file_get_contents($endpointFilename);
        }

        $this->endpoint = $endpointBase . '?cId=' . $clientId . '&cV=' . self::CLIENT_VERSION . '&do=';
    }

    public function __toString()
    {
        return $this->endpoint;
    }
}
