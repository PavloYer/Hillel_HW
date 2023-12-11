<?php
declare(strict_types=1);

require_once 'classes/CapitalPrintText.php';

use classes\PrintText;
use classes\CapitalPrintText;

$text = new PrintText();
$text->print();
echo PHP_EOL;

$capitalText = new CapitalPrintText();
$capitalText->print();
