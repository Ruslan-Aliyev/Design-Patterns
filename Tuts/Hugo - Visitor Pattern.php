<?php

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
