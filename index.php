<?php
declare(strict_types=1);

function calculate(int $value_1, int $value_2, ?closure $toPrint = null): int
{
    $var = $value_1 * $value_2;

    if ($toPrint instanceof Closure) {
        $toPrint($var);
    }
    return $var;
}

calculate(34, 345, function (int $value): void {
    echo $value . PHP_EOL;
});