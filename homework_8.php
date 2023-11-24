<?php
declare(strict_types=1);

function getRandValArray(int $length): array
{
    for ($i = 0; $i < $length; $i++) {
        $randArray[] = rand(0, 30);
    }
    return $randArray;
}

function getMultiplied(array $array): float
{
    $sum = 1;
    foreach ($array as $value) {
        $sum *= $value;
    }
    return $sum;
}

function countValue_5(array $array): int
{
    $count = 0;
    $length = count($array);

    while ($length) {
        if ($array[$length - 1] == 5)
            $count++;
        $length--;
    }
    return $count;
}

function countDivided_3(array $array): array
{
    $count = [];
    $length = count($array);

    for ($i = 0; $i < $length; $i++) {
        if (($array[$i] !== 0) && ($array[$i] % 3) == 0) {
            $count[] = $array[$i];
        }
    }
    return $count;
}

$aData = getRandValArray(30);
echo "Created array: ";
foreach ($aData as $value)
    echo $value . " ";
echo PHP_EOL;

echo "Multiplication: " . getMultiplied($aData) . PHP_EOL;
echo "Count number 5: " . countValue_5($aData) . PHP_EOL;

$array = countDivided_3($aData);
echo "Divides by 3: : ";
foreach ($array as $value)
    echo $value . " ";

echo PHP_EOL;
