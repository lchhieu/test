<?php

namespace Core\Classes;

class Product extends ProductAbstract
{
    private $coefficients;

    public function __construct($name, $price, $weight, $width, $height, $depth)
    {
        parent::__construct($name, $price, $weight, $width, $height, $depth);
    }

    /**
     * Get gross price
     * @param $coefficients
     * @return int|mixed
     */
    public function getGrossPrice($coefficients)
    {
        $this->coefficients = $coefficients;

        return $this->price + $this->shippingFee();
    }

    /**
     * Get fee by dimension
     * @return float|int
     */
    private function getFeeByDimension()
    {
        return $this->width *
            $this->height *
            $this->depth *
            $this->coefficients['dimension'];
    }

    /**
     * Get fee by weight
     * @return float|int
     */
    private function getFeeByWeight()
    {
        return $this->weight * $this->coefficients['weight'];
    }

    /**
     * Get free by product type
     * @return int
     */
    private function getFeeByProductType()
    {
        return 0;
    }

    /**
     * Get shipping fee
     * @return mixed
     */
    private function shippingFee()
    {
        return max($this->getFeeByDimension(), $this->getFeeByWeight(), $this->getFeeByProductType());
    }
}