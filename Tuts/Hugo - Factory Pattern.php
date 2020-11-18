<?php

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
