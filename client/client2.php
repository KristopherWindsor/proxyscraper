<?php
use Client\Args;
use Client\Program;

require_once __DIR__ . '/vendor/autoload.php';

// Command line options:
// clientId=XYZ -- specify the client ID
// endpoint=http://XYZ -- specify the server address

new Program(new Args($argv));
