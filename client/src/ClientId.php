<?php
namespace Client;

class ClientId
{
    private $id;

    public function __construct($clientId = null)
    {
        if (!$clientId) {
            $idFile = __DIR__ . '/../client_id';
            if (!file_exists($idFile)) {
                file_put_contents($idFile, uniqid(exec('hostname')));
            }
            $clientId = trim(file_get_contents($idFile));
        }

        $this->id = $clientId;
    }

    public function __toString()
    {
        return $this->id;
    }
}
