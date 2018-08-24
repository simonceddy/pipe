<?php
namespace Eddy\Tubular;

interface ProcessorInterface
{
    public function process(PayloadInterface $payload): PayloadInterface;
}
