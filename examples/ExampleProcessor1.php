<?php
namespace Eddy\Pipe\Example;

use Eddy\Pipe\ProcessorInterface;
use Eddy\Pipe\PayloadInterface;

class ExampleProcessor1 implements ProcessorInterface
{
    public function process(PayloadInterface $payload): PayloadInterface
    {
        if (null === $payload->getData()) {
            $payload->setData('some new data.');
        } else {
            $payload->setData('The test worked.');
        }
        return $payload;
    }
}
