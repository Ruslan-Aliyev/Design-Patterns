<?php

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
