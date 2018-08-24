<?php
namespace Eddy\Tubular;

/**
 * A "Triggerable" Processor implementing this interface can be bypassed
 * if a Payload does not meet its requirements.
 * 
 * Processors must also implement the ProcessorInterface. This interface
 * does not extend the ProcessorInterface. This means Triggerable objects
 * do not have to be Processors, allowing a variety of uses without the
 * extra code.
 * 
 * @category Pipeline
 * @package  Tubular
 * @author   Simon Eddy <simon@simoneddy.com.au>
 * @license  MIT
 * @link     http://github.com/simonceddy/tubular
*/
interface TriggerableInterface
{
    /**
     * The trigger method accepts a Payload object and determines if
     * it should be processed, returning true for "go ahead" or false
     * for "find a detour".
     *
     * @param PayloadInterface $payload
     * @return boolean
     */
    public function trigger(PayloadInterface $payload): bool;
}
