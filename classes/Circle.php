<?php

namespace classes;

require_once 'Figure.php';

class Circle extends Figure
{
    private float $radius;

    public function __construct($radius)
    {
        $this->setRadius($radius);
    }

    function area(): float
    {
        return pi() * pow($this->getRadius(), 2);
    }

    function perimeter(): float
    {
        return 2 * pi() * $this->getRadius();
    }

    public function setRadius(float $radius): void
    {
        if ($radius <= 0) {
            throw new \Exception('Invalid data');
        }
        $this->radius = $radius;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }
}