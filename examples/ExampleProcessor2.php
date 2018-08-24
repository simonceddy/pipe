<?php
namespace Eddy\Tubular\Example;

use Eddy\Tubular\ProcessorInterface;
use Eddy\Tubular\PayloadInterface;

class ExampleProcessor2 implements ProcessorInterface
{
    public function process(PayloadInterface $payload): PayloadInterface
    {
        $payload->eraseData();
        return $payload;
    }
}
