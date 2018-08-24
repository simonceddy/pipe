<?php
namespace Eddy\Tubular;

interface TriggerableInterface
{
    /**
     * A Triggerable Processor must contain a trigger method that accepts
     * the Payload as an argument and determines whether it should be
     * processed by the implementing class.
     * 
     * If the method returns true the Processor will be run as normal. If
     * it returns false the Processor will be bypassed.
     *
     * @param PayloadInterface $payload
     * @return boolean
     */
    public function trigger(PayloadInterface $payload): bool;
}
