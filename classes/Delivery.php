<?php

abstract class Delivery
{
    protected float $distance;
    protected float $price;

    public function __construct(float $distance, float $price)
    {
        $this->setDistance($distance);
        $this->setPrice($price);
    }

    abstract public function getTotal();

    /**
     * @param float $distance
     */
    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
}