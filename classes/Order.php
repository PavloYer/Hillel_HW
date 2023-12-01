<?php

namespace classes;

class Order
{
    protected array $items = [];

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getSum (): float {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item[1] * $item[2];
        }
        return $total;
    }

    public function addToOrder (array $order): void {
        $this->items[] = $order;
    }

    public function printOrder (): void {
        foreach ($this->items as $item) {
            foreach ($item as $value) {
                echo $value . " ";
            }
            echo PHP_EOL;
        }
    }
}