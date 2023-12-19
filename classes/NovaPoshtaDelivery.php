<?php

require_once 'CalculationsTrait.php';

class NovaPoshtaDelivery extends Delivery
{
    use CalculationsTrait;

    private float $informSenderPrice;

    public function __construct(float $distance, float $price, float $informSenderPrice = 0)
    {
        parent::__construct($distance, $price);
        $this->setInformSender($informSenderPrice);
    }

    public function getTotal(): float
    {
        return $this->calculateDelivery($this->distance, $this->price) + $this->informSenderPrice;
    }

    private function setInformSender(float|int $informSenderPrice)
    {
        $this->informSenderPrice = $informSenderPrice;
    }


}