<?php
// Крок 1: Інтерфейс банківського рахунку
interface AccountInterface {
    public function deposit($amount);
    public function withdraw($amount);
    public function getBalance();
}

// Крок 2: Базовий клас BankAccount
class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;

    protected $balance;
    protected $currency;

    public function __construct($currency, $balance = 0) {
        $this->currency = $currency;
        $this->balance = $balance;
    }

    public function deposit($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума поповнення повинна бути додатною.");
        }
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума зняття повинна бути додатною.");
        }
        if ($this->balance - $amount < self::MIN_BALANCE) {
            throw new Exception("Недостатньо коштів.");
        }
        $this->balance -= $amount;
    }

    public function getBalance() {
        return $this->balance . " " . $this->currency;
    }
}

// Крок 3: Спадкування та статичні властивості
class SavingsAccount extends BankAccount {
    public static $interestRate = 0.05; // 5%

    public function applyInterest() {
        $interest = $this->balance * self::$interestRate;
        $this->balance += $interest;
    }
}

// Крок 4: Тестування та обробка винятків
try {
    $account1 = new BankAccount("USD", 100);
    $account1->deposit(50);
    echo "Баланс account1: " . $account1->getBalance() . "<br>";

    $account1->withdraw(30);
    echo "Після зняття: " . $account1->getBalance() . "<br>";

    // Тестування помилки
    // $account1->withdraw(1000);

    $savings = new SavingsAccount("EUR", 200);
    $savings->applyInterest();
    echo "Баланс накопичувального рахунку: " . $savings->getBalance() . "<br>";

} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage();
}
?>