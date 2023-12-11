<?php
declare(strict_types=1);

require_once 'classes/BankAccount_HW13.php';

use classes\BankAccount;


try {
    $client_1 = new BankAccount('account371', 3700.97);
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit;
}

try {
    $client_1->setAccountId('account456');

} catch (Exception $exception) {
    echo $exception->getMessage();
    exit;
}

try {
    $client_1->refillBalance(960);
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit;
}

try {
    $client_1->withdrawAmount(3400);
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit;
}

echo $client_1->getAccountBalance();