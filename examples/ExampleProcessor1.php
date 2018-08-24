<?php
namespace Eddy\Tubular\Example;

use Eddy\Tubular\ProcessorInterface;
use Eddy\Tubular\PayloadInterface;

class ExampleProcessor1 implements ProcessorInterface
{
    public function process(PayloadInterface $payload): PayloadInterface
    {
        $payload->setData('The test worked.');
        return $payload;
    }
}
