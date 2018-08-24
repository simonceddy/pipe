<?php
namespace Eddy\Tubular;

class PipeRunner
{
    public function run(PayloadInterface $payload, $processors)
    {
        if (!\is_iterable($processors)) {
            throw new \InvalidArgumentException(
                'Processors must be passed in an iterable form.'
            );
        }

        foreach ($processors as $processor) {
            if ($processor instanceof TriggerableInterface
                && !$processor->trigger($payload)
            ) {
                // bypass
            } else {
                $payload = $processor->process($payload);
            }
        }
        return $payload;
    }
}
