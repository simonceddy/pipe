<?php
namespace Eddy\Pipe\Example;

use Eddy\Pipe\ProcessorInterface;
use Eddy\Pipe\PayloadInterface;

class ExampleProcessor2 implements ProcessorInterface
{
    public function process(PayloadInterface $payload): PayloadInterface
    {
        $payload->eraseData();
        return $payload;
    }
}
