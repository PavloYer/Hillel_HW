<?php
declare(strict_types=1);

function generatorFibonacci(int $value): Generator
{
    $beforeLast = 1;
    $last = 1;
    $next = $beforeLast + $last;;

    while ($next < $value) {
        yield $next;

        $beforeLast = $last;
        $last = $next;
        $next = $beforeLast + $last;
    }
}

$userValue = (int)fgets(STDIN);

if ($userValue < 2) {
    exit("Too low value. No Fibonacci numbers less than $userValue found." . PHP_EOL);
} else {
    echo "Fibonacci sequence: 1 1 ";
    foreach (generatorFibonacci($userValue) as $item) {
        echo $item . " ";
    }
    echo PHP_EOL;
}