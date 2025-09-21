<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login === "admin" && $password === "1234") {
        $_SESSION['user'] = $login;
        header("Location: welcome.php");
        exit;
    } else {
        $error = "Невірний логін або пароль!";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Логін</title></head>
<body>
    <form method="post">
        <input type="text" name="login" placeholder="Логін">
        <input type="password" name="password" placeholder="Пароль">
        <button type="submit">Увійти</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
</body>
</html>