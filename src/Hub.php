<?php
namespace Eddy\Tubular;

/**
 * The Hub class provides a means for handling multiple Pipelines.
 * 
 * It allows Payloads to be 'routed' depending on conditions, as well as
 * specifying global pre and post Processors.
 * 
 * @category Pipelines
 * @package  Tubular
 * @author   Simon Eddy <simon@simoneddy.com.au>
 * @license  MIT
 * @link     http://github.com/simonceddy/tubular
*/
class Hub implements ProcessorInterface
{
    protected $pipelines = [];

    protected $named_pipelines = [];

    protected $processors = [];

    protected $named_processors = [];

    protected $pre_processors = [];

    protected $post_processors = [];

    protected $triggers = [];

    protected $named_triggers = [];

    public function __construct(array $pipelines = [])
    {

    }

    /**
     * @inheritDoc
     */
    public function process(PayloadInterface $payload): PayloadInterface
    {
        return $payload;
    }

    public function addProcessor(
        ProcessorInterface $processor,
        $pos = null,
        string $alias = null
    ) {
        if (null !== $pos && null === $alias && is_string($pos)) {
            $alias = $pos;
            $pos = null;
        }
        if (null === $alias) {
            $this->pipelines[] = $processor;
        }
    }

    public function addNamedProcessor(
        string $alias,
        ProcessorInterface $processor
    ) {

    }

    public function addPipeline(
        PipelineInterface $pipeline,
        $pos = null,
        string $alias = null
    ) {
        $this->addProcessor($pipeline, $pos, $alias);
    }
}
