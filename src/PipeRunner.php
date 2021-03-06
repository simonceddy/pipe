<?php
namespace Eddy\Pipe;

/**
 * PipeRunner
 * 
 * @category Processing
 * @package  Pipe
 * @author   Simon Eddy <simon@simoneddy.com.au>
 * @license  MIT
 * @link     http://github.com/simonceddy/tubular
*/
class PipeRunner
{
    /**
     * Run the passed Payload through the passed processors iterable and
     * return the resulting Payload;
     *
     * @param PayloadInterface $payload
     * @param array|mixed $processors
     * @return PayloadInterface
     */
    public function run(
        PayloadInterface $payload,
        $processors
    ): PayloadInterface {
        if (!\is_iterable($processors)) {
            throw new \InvalidArgumentException(
                'Processors must be passed in an iterable form.'
            );
        }

        foreach ($processors as $processor) {
            $payload = $processor->process($payload);
        }

        return $payload;
    }
}
