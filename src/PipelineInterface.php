<?php
namespace Eddy\Tubular;

interface PipelineInterface extends ProcessorInterface
{
    /**
     * Add a Processor to the Pipeline. An optional second argument can be
     * used to set the Processor's position in the Pipeline.
     *
     * @param ProcessorInterface $processor
     * @param integer $pos
     * @return void
     */
    public function addProcessor(
        ProcessorInterface $processor,
        int $pos = null
    );

    /**
     * Add an array of Processors. Processors should be added in identical
     * order to the passed array.
     *
     * @param array $processors
     * @return void
     */
    public function addProcessors(array $processors);
}
