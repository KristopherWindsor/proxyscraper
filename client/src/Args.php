<?php
namespace Client;

class Args
{
    private $argv;

    public function __construct(array $argv)
    {
        $this->argv = $argv;
    }

    public function getArg($name, $default = null)
    {
        foreach ($this->argv as $i) {
            if (strpos($i, $name . '=') === 0)
                return substr($i, strlen($name) + 1);
        }
        return $default;
    }
}
