<?php
declare(strict_types=1);

require_once 'configs.php';
require_once 'classes/Order.php';
require_once 'classes/MeestPoshtaDelivery.php';
require_once 'classes/NovaPoshtaDelivery.php';
require_once 'classes/UkrPoshtaDelivery.php';


//$postService = new MeestPoshtaDelivery(10,3,4);
//$postService = new NovaPoshtaDelivery(20, 15, 30);
$postService = new UkrPoshtaDelivery(900, 1.75, 'free123');

$clientOrder = new Order(1740, $postService);
echo $clientOrder->getFinalAmount();