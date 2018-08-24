<?php
namespace Eddy\Tubular\Example;

use Eddy\Tubular\TriggerableInterface;
use Eddy\Tubular\PayloadInterface;
use Eddy\Tubular\ProcessorInterface;

class ExampleTriggerable implements ProcessorInterface, TriggerableInterface
{
    public function trigger(PayloadInterface $payload): bool
    {
        return null === $payload->getData();
    }

    public function process(PayloadInterface $payload): PayloadInterface
    {
        $payload->setData('Contents added');
        return $payload;
    }
}
