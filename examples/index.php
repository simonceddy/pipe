<?php
require dirname(__DIR__).'/vendor/autoload.php';

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use Eddy\Pipe\Pipeline;

$payload = new Eddy\Pipe\Example\ExamplePayload('Testing');

$pipeline = new Pipeline([
    new Eddy\Pipe\Example\ExampleProcessor1,
    new Eddy\Pipe\Example\ExampleProcessor2,
    new Eddy\Pipe\Example\ExampleProcessor1
]);

$result = $pipeline->process($payload);
$result = $pipeline($payload);
$result = call_user_func($pipeline, $payload);

var_dump($result);

$environment = Environment::createCommonMarkEnvironment();
$parser = new CommonMarkConverter([], $environment);

$page = file_get_contents(dirname(__DIR__).'/readme.md');
echo $parser->convertToHtml($page);
