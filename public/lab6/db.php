<?php
$host = "localhost";
$user = "root";   // або твій користувач MySQL
$pass = "";       // пароль користувача
$db   = "users_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}
?>
