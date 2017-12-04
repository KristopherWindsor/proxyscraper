<?php
namespace Client;

class Hibernate
{
    protected $clientId;

    public function __construct(ClientId $clientId)
    {
        $this->clientId = $clientId;
    }

    public function shouldHibernate()
    {
        $hibernateUntil = @file_get_contents($this->getFilename());
        return $hibernateUntil && $hibernateUntil > time();
    }

    public function hibernateUntil($timestamp)
    {
        file_put_contents($this->getFilename(), $timestamp);
    }

    public function hibernateFor($seconds)
    {
        $this->hibernateUntil(time() + $seconds);
    }

    protected function getFilename()
    {
        return __DIR__ . '/../' . $this->clientId . '-hibernate.dat';
    }
}
