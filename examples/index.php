<?php
require dirname(__DIR__).'/vendor/autoload.php';

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
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

$environment = Environment::createCommonMarkEnvironment();
$parser = new CommonMarkConverter([], $environment);

$page = file_get_contents(dirname(__DIR__).'/readme.md');
echo $parser->convertToHtml($page);
