<?php

namespace classes;

require_once 'Figure.php';

class Rectangle extends Figure
{
    private float $longSide;
    private float $shortSide;

    public function __construct($longSide, $shortSide)
    {
        $this->setLongSide($longSide);
        $this->setShortSide($shortSide);
    }

    function area(): float
    {
        return $this->getLongSide() * $this->getShortSide();
    }

    function perimeter(): float
    {
        return ($this->getLongSide() + $this->getShortSide()) * 2;
    }

    public function setLongSide(float $longSide): void
    {
        if ($longSide <= 0) {
            throw new \Exception('Invalid data');
        }
        $this->longSide = $longSide;
    }

    public function getLongSide(): float
    {
        return $this->longSide;
    }

    public function setShortSide(float $shortSide): void
    {
        if ($shortSide <= 0) {
            throw new \Exception('Invalid data');
        }
        $this->shortSide = $shortSide;
    }

    public function getShortSide(): float
    {
        return $this->shortSide;
    }

    public function getArea(): void
    {
        print $this->area();
    }

    public function getPerimeter(): void
    {
        print $this->perimeter();
    }
}