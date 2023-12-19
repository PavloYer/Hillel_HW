<?php

class Order
{
    private float $orderPrice;
    private ?Delivery $delivery;

    public function __construct(float $orderPrice, ?Delivery $delivery = null)
    {
        $this->setOrderPrice($orderPrice);
        $this->delivery = $delivery;
    }

    public function getFinalAmount(): float
    {
        return $this->orderPrice + (isset($this->delivery) ? $this->delivery->getTotal() : 0);
    }

    /**
     * @param float $orderPrice
     */
    public function setOrderPrice(float $orderPrice): void
    {
        $this->orderPrice = $orderPrice;
    }

    /**
     * @param Delivery|null $delivery
     */
    public function setDelivery(?Delivery $delivery): void
    {
        $this->delivery = $delivery;
    }

    /**
     * @return float
     */
    public function getOrderPrice(): float
    {
        return $this->orderPrice;
    }

    /**
     * @return Delivery|null
     */
    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }
}