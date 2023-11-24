<?php
declare(strict_types=1);

function getRandValArray(int $length): array
{

    if ($length < 1) die("error\n");

    for ($i = 0; $i < $length; $i++) {
        $randArray[] = rand(-100, 100);
    }

    return $randArray;
}

function getMax(array $array): int
{
    $maxVal = $array[0];
    foreach ($array as $value) {
        if ($maxVal < $value) {
            $maxVal = $value;
        }
    }

    return $maxVal;
}

function getMin(array $array): int
{
    $minVal = $array[0];
    foreach ($array as $value) {
        if ($minVal > $value) {
            $minVal = $value;
        }
    }

    return $minVal;
}

function sortArray(array $array): array
{

    $length = count($array);

    for ($i = 0; $i < $length - 1; $i++) {
        for ($j = 0; $j < $length - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    return $array;
}

$aData = getRandValArray(10);
echo "Max: " . getMax($aData) . "    ";
echo "Min: " . getMin($aData) . PHP_EOL;
$sortedArray = sortArray($aData);

foreach ($sortedArray as $value) echo $value . " ";
echo PHP_EOL;


//USING BUILT-IN FUNCTIONS
$randArray = array_map(fn() => rand(-100, 100), array_fill(0, 10, null));
echo "Max: " . max($randArray) . "    ";
echo "Min: " . min($randArray) .  PHP_EOL;
sort($randArray);
foreach ($randArray as $value) echo $value . " ";
echo PHP_EOL;


