<?php

require_once 'Delivery.php';
require_once 'CalculationsTrait.php';

class MeestPoshtaDelivery extends Delivery
{
    use CalculationsTrait;

    private int $expressDelivery;

    public function __construct(float $distance, float $price, int $expressDelivery = 1)
    {
        parent::__construct($distance, $price);
        $this->setExpressDelivery($expressDelivery);
    }

    public function getTotal(): float
    {
        return $this->calculateDelivery($this->distance, $this->price) * $this->expressDelivery;
    }

    /**
     * @param int|null $expressDelivery
     */
    public function setExpressDelivery(?int $expressDelivery): void
    {
        $this->expressDelivery = $expressDelivery;
    }

    /**
     * @return int|null
     */
    public function getExpressDelivery(): ?int
    {
        return $this->expressDelivery;
    }
}