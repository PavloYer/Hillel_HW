<?php
declare(strict_types=1);

use classes\Order;

require_once 'configs.php';
require_once ROOT . 'classes/Order.php';

$quickOrder = new Order([
    ['gloves', 300, 65.7],
    ['boots', 42, 112],
    ['coat', 7, 956],
    ['hat', 34, 124.98],
    ['shoes', 60, 375],
]);

$quickOrder->printOrder() . PHP_EOL;
echo "Total price: " . $quickOrder->getSum() . PHP_EOL;

$quickOrder->addToOrder(['keyboard', 2, 1400]);
$quickOrder->printOrder() . PHP_EOL;
echo "Total price: " . $quickOrder->getSum() . PHP_EOL;

//$array = [
//    ['name' => 'Bob', 'id' => 1, 'position' => 'editor', 'age' => 43],
//    ['name' => 'Bob', 'id' => 4, 'position' => 'editor', 'age' => 56],
//    ['name' => 'Marlin', 'id' => 6, 'position' => 'xor', 'age' => 27],
//    ['name' => 'Andy', 'id' => 5, 'position' => 'editor', 'age' => [63,4]],
//    ['name' => 'Max', 'id' => 2, 'position' => 'trainee', 'age' => 19],
//];
//
//$array_keys = ['first', 'second', 'third', 'fourth'];
//$a = array_search(5, $array[3], true);


