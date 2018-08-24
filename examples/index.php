<?php
require dirname(__DIR__).'/vendor/autoload.php';

use Eddy\Tubular\Pipeline;
use Eddy\Tubular\Example;

$payload = new Example\ExamplePayload('Testing');

$pipeline = new Pipeline([
    new Example\ExampleProcessor1,
    new Example\ExampleProcessor2,
    new Example\ExampleTriggerable
]);

$result = $pipeline->process($payload);

var_dump($result);
