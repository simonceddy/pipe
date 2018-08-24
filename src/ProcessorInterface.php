<?php
namespace Eddy\Tubular;

/**
 * The ProcessorInterface defines a Processor and allows implementations
 * to be added to a Pipeline.
 * 
 * @category Processors
 * @package  Tubular
 * @author   Simon Eddy <simon@simoneddy.com.au>
 * @license  MIT
 * @link     http://github.com/simonceddy/tubular
*/
interface ProcessorInterface
{
    /**
     * The process() method must accept and return an instance of
     * Eddy\Tubular\PayloadInterface. Anything in between is limited only
     * by your imagination (oh, and PHP... and your computer... etc).
     *
     * @param PayloadInterface $payload
     * @return PayloadInterface
     */
    public function process(PayloadInterface $payload): PayloadInterface;
}
