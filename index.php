<?php
declare(strict_types=1);

//Написати програму на PHP, яка містить користувацьку функцію для обчислення площі кола
// та демонструє використання передачі даних у функцію за допомогою параметрів.
function calcArea(int|float $area): int|float
{
    return pi() * pow($area, 2);
}

$area = 12.43;
echo "Circle area: " . calcArea($area) . PHP_EOL;
echo PHP_EOL;


//Написати програму на PHP, яка приймає число і підносить його до ступеню:
function getPower(int|float $number, int|float $power): int|float // коли вона повертає нове число
{
    return $number ** $power;
}

function getPowerAndChangeValue(int|float &$number, int|float $power): void // коли вона змінює передане число
{
    $number **= $power;
}

$userVal = 3.42;
$power = 17.3;

$result = getPower($userVal, $power);
echo "New variable: $result" . PHP_EOL;

getPowerAndChangeValue($userVal, $power) . PHP_EOL;
echo "Changed default variable: $userVal" . PHP_EOL;
