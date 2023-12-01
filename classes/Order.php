<?php

namespace classes;

use Exception;

class Order
{
    protected array $items = [];

    public function __construct(array $items)
    {
        $this->setItems($items);
    }

    private function setItems(array $items): void
    {
        $this->items = $this->validateOrder($items);
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getSum(): float
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item['amount'] * $item['price'];
        }
        return $total;
    }

    public function addToOrder(array $order): void
    {
        $order = $this->validateOrder($order);
        foreach ($order as $item) {
            $this->items[] = $item;
        }
    }

    public function printOrder(): void
    {
        foreach ($this->items as $item) {
            foreach ($item as $value) {
                echo $value . " ";
            }
            echo PHP_EOL;
        }
    }

    private function validateOrder(array $order): array
    {
        $validatedOrder = [];

        foreach ($order as $item) {

            extract($item);
            if (empty($title) || !is_string($title)) {
                throw new Exception('Title is invalid');
            }

            if (empty($amount) || !is_int($amount) || $amount < 1) {
                throw new Exception('Amount is invalid');
            }

            if (empty($price) || !is_numeric($price) || $price <= 0) {
                throw new Exception('Price is invalid');
            }

            $validatedOrder[] = ['title' => $title, 'amount' => $amount, 'price' => (float)$price];
        }
        return $validatedOrder;
    }

}