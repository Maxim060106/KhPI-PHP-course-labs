<?php
// classes.php

interface AccountInterface
{
    public function deposit(float $amount): void;
    public function withdraw(float $amount): void;
    public function getBalance(): float;
}

class BankAccount implements AccountInterface
{
    public const MIN_BALANCE = 0.0;

    protected float $balance;
    protected string $currency;

    public function __construct(string $currency = "USD", float $initialBalance = 0.0)
    {
        $this->currency = $currency;
        $this->balance = 0.0;
        if ($initialBalance !== 0.0) {
            $this->deposit($initialBalance);
        }
    }

    public function deposit(float $amount): void
    {
        if (!is_numeric($amount)) {
            throw new \Exception("Некоректна сума для поповнення");
        }
        if ($amount <= 0) {
            throw new \Exception("Сума поповнення повинна бути більше нуля");
        }
        $this->balance += $amount;
    }

    public function withdraw(float $amount): void
    {
        if (!is_numeric($amount)) {
            throw new \Exception("Некоректна сума для зняття");
        }
        if ($amount <= 0) {
            throw new \Exception("Сума зняття повинна бути більше нуля");
        }
        if ($amount > $this->balance) {
            throw new \Exception("Недостатньо коштів");
        }
        $this->balance -= $amount;

        // Додаткова перевірка на мінімальний баланс (якщо потрібно)
        if ($this->balance < self::MIN_BALANCE) {
            // хоча MIN_BALANCE = 0, але для гнучкості лишаємо перевірку
            throw new \Exception("Баланс опустився нижче допустимого мінімуму");
        }
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}

class SavingsAccount extends BankAccount
{
    // процентна ставка у вигляді десяткового дробу (наприклад, 0.05 = 5%)
    public static float $interestRate = 0.05;

    public function applyInterest(): void
    {
        $rate = self::$interestRate;
        if ($rate <= 0) {
            // якщо ставка нульова або від'ємна — просто нічого не додаємо
            return;
        }
        $interest = $this->getBalance() * $rate;
        // Можна округлити до копійок:
        $interest = round($interest, 2);
        if ($interest > 0) {
            $this->deposit($interest);
        }
    }

    public static function setInterestRate(float $newRate): void
    {
        if ($newRate < 0) {
            throw new \Exception("Відсоткова ставка не може бути від'ємною");
        }
        self::$interestRate = $newRate;
    }
}
