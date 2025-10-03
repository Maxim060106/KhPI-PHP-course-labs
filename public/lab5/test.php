<?php
require_once __DIR__ . '/classes.php';

echo "=== Тест: BankAccount та SavingsAccount ===\n\n";

try {
    $acc = new BankAccount("USD", 100.0);
    echo "Початковий баланс: {$acc->getBalance()} {$acc->getCurrency()}\n";

    echo "Поповнюємо 50.25\n";
    $acc->deposit(50.25);
    echo "Баланс після поповнення: {$acc->getBalance()} {$acc->getCurrency()}\n";

    echo "Знімаємо 30\n";
    $acc->withdraw(30);
    echo "Баланс після зняття: {$acc->getBalance()} {$acc->getCurrency()}\n";

    echo "Спроба зняти 1000 (має кинути виняток)\n";
    $acc->withdraw(1000);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
}

echo "\n---\n\n";

// 2) Негативні суми
try {
    $acc2 = new BankAccount("EUR");
    echo "Пробуємо поповнити -10\n";
    $acc2->deposit(-10); // помилка
} catch (Exception $e) {
    echo "Очікувана помилка при негативному поповненні: " . $e->getMessage() . "\n";
}

try {
    echo "Пробуємо зняти -5\n";
    $acc2->withdraw(-5); // помилка
} catch (Exception $e) {
    echo "Очікувана помилка при негативному знятті: " . $e->getMessage() . "\n";
}

echo "\n---\n\n";

// 3) SavingsAccount та застосування відсотків
try {
    $sav = new SavingsAccount("UAH", 1000.00);
    echo "Стан рахунку накопичувального: {$sav->getBalance()} {$sav->getCurrency()}\n";
    echo "Поточна ставка (static): " . (SavingsAccount::$interestRate * 100) . "%\n";

    echo "Застосовуємо відсоток...\n";
    $sav->applyInterest();
    echo "Баланс після нарахування відсотків: {$sav->getBalance()} {$sav->getCurrency()}\n";

    echo "Змінюємо ставку на 10% і застосовуємо знову\n";
    SavingsAccount::setInterestRate(0.10);
    $sav->applyInterest();
    echo "Баланс після ще одного нарахування: {$sav->getBalance()} {$sav->getCurrency()}\n";
} catch (Exception $e) {
    echo "Помилка (SavingsAccount): " . $e->getMessage() . "\n";
}

echo "\n=== Кінець тестів ===\n";
