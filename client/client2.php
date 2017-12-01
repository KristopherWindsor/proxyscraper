<?php
use Client\Args;
use Client\Program;

require_once __DIR__ . '/vendor/autoload.php';

new Program(new Args($argv));
