<?php

require_once 'CalculationsTrait.php';

class UkrPoshtaDelivery extends Delivery
{
    use CalculationsTrait;

    private bool $promocode;

    public function __construct(float $distance, float $price, ?string $promocode = null)
    {
        parent::__construct($distance, $price);
        $this->setPromocode($promocode);
    }

    public function getTotal(): float
    {
        if ($this->promocode) {
            return 0;
        }
        return $this->calculateDelivery($this->distance, $this->price);
    }

    /**
     * @param string|null $promocode
     */
    public function setPromocode(?string $promocode): void
    {
        if (in_array($promocode, ['free', 'secretCode', 'blackFriday'])) {
            $this->promocode = true;
        } else {
            $this->promocode = false;
        }
    }
}