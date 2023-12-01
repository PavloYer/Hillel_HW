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



