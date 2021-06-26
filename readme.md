# Design Patterns

## Tutorials

- https://sourcemaking.com/design_patterns/
- https://www.youtube.com/playlist?list=PLF206E906175C7E07
- https://en.wikipedia.org/wiki/Software_design_pattern
- https://www.journaldev.com/31902/gangs-of-four-gof-design-patterns
- https://tuxdoc.com/download/gang-of-four-design-patterns-40pdf_pdf
- https://www.tutorialspoint.com/design_pattern/index.htm
- https://sourcemaking.com/design_patterns
- https://refactoring.guru/design-patterns/catalog

## Creational patterns

### Factory 

The factory pattern takes out the responsibility of instantiating a object from the class to a Factory class.

```php
class CarFactory
{
    public static function create(int $wheels = 4, float $fuel = 100.0): CarInterface
    {
        // Validate inputs...

        return new CarInstance(
            new Engine(),
            $wheels,
            $fuel
        );
    }
}
```

Polymorphic example:
```php
class CarFactory
{
    public static function createSportscar(): CarInterface;
    public static function createMinivan(): CarInterface;
    public static function createSuperCar(): CarInterface;

    public static function create(string $type = 'sports'): CarInterface;
}
```

### Abstract Factory 

Allows us to create a Factory for factory classes.

```php

```

Factory vs Abstract Factory:

- https://stackoverflow.com/questions/5739611/what-are-the-differences-between-abstract-factory-and-factory-design-patterns

### Prototype

Creating a new object instance from another similar instance and then modify according to our requirements.

https://github.com/Ruslan-Aliyev/Design-Patterns/blob/master/Illustrations/factory_prototype_builder.pdf

### Builder

Creating an object step by step and a method to finally get the object instance.

```php
class CarBuilder
{
    protected $wheels = 4;
    protected $fuel = 100.0;
    protected $engine = null;

    public function wheels(int $wheels): self
    {
        // Validate input...

        $this->wheels = $wheels;

        return $this;
    }

    public function fuel(float $fuel): self
    {
        // Validate input ...

        $this->fuel = $fuel;

        return $this;
    }

    public function engine(Engine $engine): self
    {
        // Validate input ...

        $this->engine = $engine;

        return $this;
    }

    public function build(): CarInterface
    {
        return new CarInstance(
            $this->engine,
            $this->wheels,
            $this->fuel
        );
    }
}

// Build car with defaults.
$builder = new CarBuilder();
$car = $builder->build();

// Build car with different fuel quantity.
$builder = new CarBuilder();
$car = $builder->fuel(999)->build();

// Build car with different wheel quantity.
$builder = new CarBuilder();
$car = $builder->wheels(3)->build();

// Build FULL car.
$builder = new CarBuilder();
$car = $builder
        ->fuel(999)
        ->wheels(3)
        ->engine(
            new Engine()
        )
        ->build();
```

### Singleton

Only one instance of the class can be created.

![](https://github.com/Ruslan-Aliyev/Design-Patterns/blob/master/Illustrations/singleton1_lazy.PNG)

Thread safety issues:

![](https://github.com/Ruslan-Aliyev/Design-Patterns/blob/master/Illustrations/singleton2_threadsafe_sync.PNG)

![](https://github.com/Ruslan-Aliyev/Design-Patterns/blob/master/Illustrations/singleton3_threadsafe_eager.PNG)

![](https://github.com/Ruslan-Aliyev/Design-Patterns/blob/master/Illustrations/PHP_Singleton_vs_Static.jpg)

https://github.com/Ruslan-Aliyev/Design-Patterns/blob/master/Illustrations/PHP_Singleton.pdf

Testing issues:

## Structural patterns

### Adapter

Provides an interface between two unrelated entities so that they can work together.

![](/Illustrations/adaptor.png)

### Bridge

![](/Illustrations/bridge0.JPG)

![](/Illustrations/bridge.png)

### Decorator

**Modify/add functionality to an object at runtime.**

![](/Illustrations/decorator.png)

This type of composition is **better than inheritance. With inheritance, if top class changes, everything below needs to be refactored.**

The decorator pattern allows an entity to completely contain another entity so that using the decorator looks identical to the contained entity. This allows the decorator to **modify the behaviour and/or content of whatever it is encapsulating without changing the outward appearance of the entity**. For example, you might use a decorator to add logging output on the usage of the contained element without changing any behaviour of the contained element. 
(http://en.wikipedia.org/wiki/Decorator_pattern)

### Composite 

Handle individual objects and composites uniformly. Eg handle a book and a collection of books the same way.

![](/Illustrations/composite.png)

Decorator & Composite usually go hand in and hand. In that using the composite pattern often leads to also using the decorator pattern.

The composite pattern allows you to build a hierarchical structure (such as a tree of elements) in a way that allows your external code to view the entire structure as a single entity. So the interface to a leaf entity is exactly the same as the entity for a compound entity. So the essence is that all elements in your composite structure have the same interface even though some are leaf nodes and others are entire structures. User interfaces often use this approach to allow easy composability. 
(http://en.wikipedia.org/wiki/Composite_pattern)

### Facade

Creating a wrapper interfaces on top of existing interfaces to help client applications.

### Flyweight

Caching and reusing object instances, when there is a need to create objects that varies little.

![](/Illustrations/flyweight1.png)

![](/Illustrations/flyweight2.png)

![](/Illustrations/flyweight3.png)

### Proxy

## Behavioural patterns

### Chain of responsibility

Request is passed to a sequential chain of handlers.

![](/Illustrations/chain_responsibility.png)

### Command

When a command (which is normally a function) is made into an object.

- It can be called later.
- It become undo-able.
- The command can be called from many different places.

![](/Illustrations/command1.png)

![](/Illustrations/command2.png)

https://sourcemaking.com/design_patterns/command

### Interpreter
### Iterator

Access the elements of an aggregate object sequentially without exposing its underlying representation.

- https://www.tutorialspoint.com/design_pattern/iterator_pattern.htm
- https://sourcemaking.com/design_patterns/iterator/php

### Mediator

Provide a centralized communication medium between different objects in a system.

### Memento

Used to save a history of an object's past states.

https://sourcemaking.com/design_patterns/memento/php

### Observer

Useful when you are interested in the state of an object and want to get notified whenever there is any change.

```php
// Observed
class Subject
{
    private $observer;

    function __construct(Observer $observer) 
    {
      $this->observer = $observer;
    }

    function notify() 
    {
      $this->observer->update($this);
    }

    function updateFavorites() 
    {
      $this->notify();
    }

    function getFavorites() 
    {
      return "Dummy Update Notice";
    }
}

// Observer
class Observer
{
    public function update(Subject $subject)
    {
      echo $subject->getFavorites() . "<br>";
    }
}

// Run
require_once("observer.php");
require_once("subject.php");

$gossipFan = new Observer();
$gossiper = new Subject($gossipFan);

$gossiper->updateFavorites();
$gossiper->updateFavorites();
```

![](https://github.com/Ruslan-Aliyev/Design-Patterns/blob/master/Illustrations/observer.png)

### State
### Template method

When algorithms are roughly the same. 

Eg: parsers/processors of different file formats - the reading part, the data re-organizing part, etc... are all the same. The only bit of difference is the parsing of different file formats.

![](/Illustrations/template.png)

### Strategy

Used when we have multiple algorithm for a specific task and client decides the actual implementation to be used at runtime.

```php
class ProductTax implements TaxInterface
{
    public function calculate(float $price) : float
    {
        return ($price * 1.20);
    }
}

class Product implements ProductInterface
{
    protected $tax = null;

    /**
     * Dependency Injection / Strategy Pattern
     */
    public function __construct(TaxInterface $tax): void
    {
        $this->tax = $tax;
    }

    public function calculatePrice(): float
    {
        return $this->tax->calculate($this->price());
    }
}
```

### Visitor

Perform an operation on a group of similar kind of Objects.

```php
class ProductTax implements TaxInterface
{
    public function calculate(ProductInterface $product) : float
    {
        return ($product->price() * 1.20);
    }
}

class Product implements ProductInterface
{
    /**
     * Visitor Pattern
     */
    public function calculatePrice(TaxInterface $tax): float
    {
        return $tax->calculate($this);
    }
}
```

Visitor vs Strategy: Visitor pattern allows **Double Dispatch**

- https://stackoverflow.com/questions/8665295/what-is-the-difference-between-strategy-pattern-and-visitor-pattern
- https://www.youtube.com/watch?v=TeZqKnC2gvA

## SOLID

![](https://raw.githubusercontent.com/Ruslan-Aliyev/Design-Patterns/master/Illustrations/SOLID.jpg)
