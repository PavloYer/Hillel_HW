<?php

namespace classes;

class BankAccount
{
    private string $accountId;
    private float $accountBalance;

    public function __construct($accountId, $accountBalance)
    {
        $this->setAccountId($accountId);
        $this->setAccountBalance($accountBalance);
    }

    public function refillBalance(float $amount): void
    {
        if ($amount <= 0) {
            throw new \Exception('Invalid amount');
        }
        $this->accountBalance += $amount;
    }

    public function withdrawAmount(float $amount): void
    {
        if ($amount <= 0) {
            throw new \Exception('Invalid amount');
        }

        if ($this->accountBalance < $amount) {
            throw new \Exception('Not enough money on your account');
        }

        $this->accountBalance -= $amount;
    }

    public function setAccountId(string $accountId): void
    {
        if (!ctype_alnum($accountId) || strlen($accountId) < 5 || strlen($accountId) > 10) {
            throw new \Exception('Invalid account ID');
        }

        $this->accountId = $accountId;
    }

    public function getAccountId(): string
    {
        return $this->accountId;
    }

    public function setAccountBalance(float $accountBalance): void
    {
        if ($accountBalance < 0) {
            throw new \Exception('Balance must be below 0');
        }
        $this->accountBalance = $accountBalance;
    }

    public function getAccountBalance(): float
    {
        return $this->accountBalance;
    }
}