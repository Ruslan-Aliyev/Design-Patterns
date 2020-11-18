<?php

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
