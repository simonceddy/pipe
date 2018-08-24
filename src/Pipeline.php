<?php
namespace Eddy\Tubular;

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
        if (null === $pos || $pos > count($this->processors)) {
            $this->processors[] = $processor;
        }
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
}
