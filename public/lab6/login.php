<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if ($password === $hashed_password) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit;
        } else {
            echo "Невірний пароль!";
        }
    } else {
        echo "Користувач не знайдений!";
    }
}
?>

<form method="POST">
    <h2>Вхід</h2>
    <input type="text" name="username" placeholder="Ім'я користувача" required><br>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <button type="submit">Увійти</button>
</form>
