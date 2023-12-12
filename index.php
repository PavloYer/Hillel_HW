<?php
require_once 'classes/Rectangle.php';
require_once 'classes/Circle.php';

use classes\Rectangle;
use classes\Circle;

$rect = new Rectangle(7, 4);

echo $rect->perimeter() . PHP_EOL;
echo $rect->area() . PHP_EOL;

$circ = new Circle(6);

echo $circ->perimeter() . PHP_EOL;
echo $circ->area();