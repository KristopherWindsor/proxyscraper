<?php
namespace Client;

class LastState
{
    protected $clientId;

    public function __construct(ClientId $clientId)
    {
        $this->clientId = $clientId;
    }

    public function setDidRepeat($didRepeat)
    {
        if ($didRepeat)
            touch($this->getFilename());
        else
            @unlink($this->getFilename());
    }

    public function didRepeat()
    {
        return file_exists($this->getFilename());
    }

    protected function getFilename()
    {
        return __DIR__ . '/../' . $this->clientId . '-laststate.dat';
    }
}
