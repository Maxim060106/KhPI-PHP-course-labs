<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = md5($_POST['password']); // завдання вимагає md5()

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "Реєстрація успішна! <a href='login.php'>Увійти</a>";
    } else {
        echo "Помилка: " . $stmt->error;
    }
}
?>

<form method="POST">
    <h2>Реєстрація</h2>
    <input type="text" name="username" placeholder="Ім'я користувача" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <button type="submit">Зареєструватися</button>
</form>
