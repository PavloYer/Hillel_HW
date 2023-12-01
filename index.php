<?php
declare(strict_types=1);

use classes\Order;

require_once 'configs.php';
require_once ROOT . 'classes/Order.php';


try {
    $quickOrder = new Order([
        ['title' => 'gloves', 'amount' => 300, 'price' => 65.7],
        ['title' => 'boots', 'amount' => 42, 'price' => 112],
        ['title' => 'coat', 'amount' => 7, 'price' => 956],
        ['title' => 'hat', 'amount' => 34, 'price' => 124.98],
        ['title' => 'shoes', 'amount' => 60, 'price' => 375],
    ]);
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit;
}

$quickOrder->printOrder() . PHP_EOL;
echo "Total price: " . $quickOrder->getSum() . PHP_EOL;

try {
    $quickOrder->addToOrder([
        ['title' => 'keyboard', 'amount' => 2, 'price' => 1400]
    ]);
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit;
}

$quickOrder->printOrder() . PHP_EOL;
echo "Total price: " . $quickOrder->getSum() . PHP_EOL;

