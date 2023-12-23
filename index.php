<?php
declare(strict_types=1);

require_once 'configs.php';
require_once ROOT . 'classes/Order.php';
require_once ROOT . 'classes/MeestPoshtaDelivery.php';
require_once ROOT . 'classes/NovaPoshtaDelivery.php';
require_once ROOT . 'classes/UkrPoshtaDelivery.php';

$postService = new UkrPoshtaDelivery(900,1.75,'free123');

$clientOrder = new Order(1740,$postService);
echo $clientOrder->getFinalAmount();