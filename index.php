<?php

//          !!!BAD CODE!!!
/*require_once 'CalculationsTrait.php';

class UkrPoshtaDelivery
              extends Delivery
{
use CalculationsTrait;

private bool $promocode;

public function __construct(float $distance, float $price, ?string $promocode = null)
    {
    parent::__construct($distance, $price);
    $this->setPromocode($promocode);
    }

    public function getTotal(): float
    {
    if ($this->promocode) {return 0;}
    return $this->calculateDelivery($this->distance, $this->price);
    }
public function setPromocode(?string $promocode): void
    {
    if (in_array($promocode, ['free', 'secretCode', 'blackFriday'])) {
    $this->promocode = true;
    } else {
$this->promocode = false;
        }
    }
}
class Order{

private float$orderPrice;
private?Delivery $delivery;

public function __construct(float $orderPrice,?Delivery $delivery=null){$this->setOrderPrice($orderPrice);
$this->delivery = $delivery;}
public function getFinalAmount(): float
    {return $this->orderPrice+ (isset($this->delivery)?$this->delivery->getTotal() : 0);}

public function setOrderPrice(float $orderPrice):void
    {$this->orderPrice = $orderPrice;}

public function setDelivery(?Delivery $delivery): void {
        $this->delivery = $delivery;
    }

public function getOrderPrice(): float
    {
    return $this->orderPrice;
    }

public function getDelivery(): ?Delivery{return $this->delivery;}}

$postService = new UkrPoshtaDelivery(900,1.75,'free123');
$clientOrder = new Order(1740,$postService);
echo $clientOrder->getFinalAmount();
*/



// STANDARDIZED CODE
declare(strict_types=1);

require_once 'configs.php';
require_once ROOT . 'classes/Order.php';
require_once ROOT . 'classes/MeestPoshtaDelivery.php';
require_once ROOT . 'classes/NovaPoshtaDelivery.php';
require_once ROOT . 'classes/UkrPoshtaDelivery.php';

$postService = new UkrPoshtaDelivery(900,1.75,'free123');

$clientOrder = new Order(1740,$postService);
echo $clientOrder->getFinalAmount();
