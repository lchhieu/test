<?php

namespace Core\Services;

class ShippingService
{
    private $products = [];

    /**
     * ShippingService constructor.
     * @param array $products
     */
    public function __construct($products = [])
    {
        $this->products = $products;
    }

    /**
     * Add product to list
     * @param $product
     */
    public function addProduct($product)
    {
        $this->products[] = $product;
    }

    /**
     * Get list product
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Calculate shipping price
     * @param $coefficients
     * @return int
     */
    public function calculate($coefficients)
    {
        $grossPrice = 0;

        foreach ($this->products as $product) {
            $grossPrice += $product->getGrossPrice($coefficients);
        }

        return $grossPrice;
    }
}