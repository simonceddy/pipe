# Tubular
#### "Surf's Away"

Tubular is an implementation of the Pipeline Design Pattern that provides a few nifty features on top.

## Installation
Tubular can be installed with Composer (requires Composer, of course):
```sh
composer require simoneddy/tubular
```

Alternatively, you can clone this repo and point your autoloader to its __src__ directory.

## Usage
The idea of a Pipeline is to run a "Payload" object through a series of Processor classes. Each Processor class might handle or update the Payload object in a different way. Once each Processor has run, the updated Payload object is returned.

### Creating a new Pipeline
Tubular's default Pipeline can be constructed like so:

```php
use Eddy\Tubular\Pipeline;

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

Payload objects must implement __Eddy\Tubular\PayloadInterface__ to be accepted by Pipelines and Processors. This interface does not specify any methods, and exists solely to allow objects through your Pipelines.

What the Payload actually contains and does is entirely up to you and the requirements of your project, although it is expected to be useable by your Processors.

A Payload class might look something like this:
```php
namespace MyApp;

use Eddy\Tubular\PayloadInterface;

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