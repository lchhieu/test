<?php

namespace Core\Classes;

abstract class ProductAbstract
{
    /*
     * @var string
    */
    private $name;

    /*
     * @var double
    */
    private $price;

    /*
     * @var float
     * unit: kilogram(kg)
    */
    private $weight;

    /*
     * @var float
     * unit: meter(m)
    */
    private $width;

    /*
     * @var float
     * unit: meter(m)
    */
    private $height;

    /*
     * @var float
     * unit: meter(m)
    */
    private $depth;

    public function __construct($name, $price, $weight, $width, $height, $depth)
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * Get gross price
     * @param $coefficients
     * @return int|mixed
     */
    public function getGrossPrice($coefficients)
    {
        return 0;
    }

    /**
     * Get fee by dimension
     * @return float|int
     */
    private function getFeeByDimension()
    {
        return 0;
    }

    /**
     * Get fee by weight
     * @return float|int
     */
    private function getFeeByWeight()
    {
        return 0;
    }

    /**
     * Get free by product type
     * @return int
     */
    private function getFeeByProductType()
    {
        return 0;
    }
}