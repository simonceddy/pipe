# Pipe
#### "Surf's Away"


__Docs aren't finished yet! Hang ten!__
Pipe is a simple implementation of the Pipeline Design Pattern.

## Installation
Pipe can be installed with Composer (requires Composer, of course):
```sh
composer require simoneddy/pipe
```

Alternatively, you can clone this repo and point your autoloader to its __src__ directory.

## Usage
The idea of a Pipeline is to run a "Payload" object through a series of Processor classes. Each Processor class might handle or update the Payload object in a different way. Once each Processor has run, the updated Payload object is returned.

### Building a Pipeline

By default, Pipelines must implement the __Eddy\Pipe\PipelineInterface__.

Pipe's Pipeline class provides a simple implementation that is adequate in many cases.

In order for a Pipeline to be useful it requires some Processors. Processors are classes implementing the __Eddy\Pipe\ProcessorInterface__, which defines a single `process()` method. This method must accept and return a Payload object (more on Payloads below - they're important!), but whatever it does to the Payload is up to you.

The default Pipeline can be constructed like so:

```php
use Eddy\Pipe\Pipeline;

// Create a new Pipeline passing an array of Processors to its constructor:
$pipeline = new Pipeline([
    new MyCoolProcessor,
    new MyCoolerProcessor,
    new MySecondRateProcessor,
    // etc
]);

// Alternatively, construct the Pipeline and then add processors afterwards.
$pipeline = new Pipeline;

// You can add an array of Processors with the addProcessors() method:
$pipeline->addProcessors([
    new AnotherCoolProcessor,
    new NotQuiteACoolProcessor
]);

// Or you can add Processors individually with the addProcessor() method:
$pipeline->addProcessor(new UniqueProcessor);

// addProcessor() returns the Pipeline object, so calls can be chained together:
$pipeline->addProcessor(new PrettyGoodProcessor)
    ->addProcessor(new NotShabbyProcessor)
    ->addProcessor(new NeverEndingProcessor);
```

### Building a Payload

Now you need a Payload! You must build a Payload object yourself, but that's where the fun lies!

Payload objects must implement __Eddy\Pipe\PayloadInterface__ to be accepted by Pipelines and Processors. This interface does not specify any methods, and exists solely to allow objects through your Pipelines.

What the Payload actually contains and does is entirely up to you and the requirements of your project, although it is expected to be useable by your Processors.

A Payload class might look something like this:
```php
namespace MyApp;

use Eddy\Pipe\PayloadInterface;

// Implement the PayloadInterface to make the object processable:
class MyCoolPayload implements PayloadInterface
{
    // For this example, let's make the Payload contain a basic string property.
    // We'll call it $text for creativity.
    protected $text = 'My excellent text';

    // Let's say our Processors will manipulate our $text property.
    // They will need to access the current text:
    public function getText()
    {
        return $this->text;
    }

    // And they will need to be able to update the text:
    public function updateText(string $text)
    {
        $this->text = $text;
    }

    // Any other required methods are also added.
}
```

In the above example our Payload is fairly simple, and only deals with a single string. Your Payload objects can be as basic or as complex as required, provided your Processors can use them.


### Processing a Payload

Processing a Payload is done via a Pipeline's `process()` method. An instance of your Payload class is passed to this method, and the processed Payload is returned. By default, the `process()` method will only ever return an instance of __Eddy\Pipe\PayloadInterface__, and will throw an Exception if it cannot.

```php
// Using the example Payload from the previous section:
$payload = new MyApp\MyCoolPayload;

// Send our Payload through our Pipeline for processing:
$result = $pipeline->process($payload);
```

The default Pipeline contains an `__invoke()` magic method (though it is not defined in the __Eddy\Pipe\PipelineInterface__), and can be used as a function/callable:




