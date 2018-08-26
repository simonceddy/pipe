<?php
namespace Eddy\Pipe;

/**
 * The default Pipeline implementation.
 * 
 * @category Pipeline
 * @package  Pipe
 * @author   Simon Eddy <simon@simoneddy.com.au>
 * @license  MIT
 * @link     http://github.com/simonceddy/pipe
*/
class Pipeline implements PipelineInterface
{
    protected $runner;

    protected $processors = [];

    public function __construct(array $processors = [])
    {
        if (!empty($processors)) {
            $this->addProcessors($processors);
        }
    }

    /**
     * @inheritDoc
     */
    public function process(PayloadInterface $payload): PayloadInterface
    {
        if (!isset($this->runner)) {
            $this->runner = new PipeRunner;
        }
        $payload = $this->runner->run($payload, $this->processors);
        return $payload;
    }

    /**
     * @inheritDoc
     */
    public function addProcessor(ProcessorInterface $processor, int $pos = null)
    {
        // TODO: Handle pos is not null
        if (null === $pos || $pos > count($this->processors)) {
            $this->processors[] = $processor;
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addProcessors(array $processors)
    {
        foreach ($processors as $processor) {
            $this->addProcessor($processor);
        }
    }

    /**
     * Allows the Pipeline to be callable. Passes the Payload to the
     * process() method and returns the result.
     * 
     * Identical functionality to the process() method.
     *
     * @param PayloadInterface $payload
     * @return PayloadInterface
     */
    public function __invoke(PayloadInterface $payload): PayloadInterface
    {
        return $this->process($payload);
    }
}
