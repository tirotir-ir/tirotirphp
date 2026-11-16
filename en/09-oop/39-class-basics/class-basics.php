<?php
declare(strict_types=1);

class BankAccount
{
    // private: only code inside this class can touch it
    private float $balance = 0.0;

    public function __construct(private string $owner)
    {
    }

    public function deposit(float $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Amount must be positive");
        }
        $this->balance += $amount;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function __toString(): string
    {
        return $this->owner . ": " . number_format($this->balance, 2);
    }
}

$account = new BankAccount("Ali");
$account->deposit(150.75);
echo $account . PHP_EOL;
