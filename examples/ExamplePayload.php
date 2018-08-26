<?php
namespace Eddy\Pipe\Example;

use Eddy\Pipe\PayloadInterface;

class ExamplePayload implements PayloadInterface
{
    protected $testing_data;

    public function __construct(string $contents = null)
    {
        if (null !== $contents) {
            $this->setData($contents);
        }
    }

    public function getData()
    {
        return $this->testing_data;
    }

    public function setData(string $contents)
    {
        return $this->testing_data = $contents;
    }

    public function eraseData()
    {
        return $this->testing_data = null;
    }
}
