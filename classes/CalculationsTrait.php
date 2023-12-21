<?php


trait CalculationsTrait
{
    protected function calculateDelivery(float $distance, float $price): float
    {
        return $distance * $price;
    }
}