<?php
// Встановлення cookie
if (isset($_POST['username'])) {
    $name = $_POST['username'];
    setcookie("username", $name, time() + (7 * 24 * 60 * 60)); // 7 днів
    header("Location: index.php");
    exit;
}

// Видалення cookie
if (isset($_POST['delete_cookie'])) {
    setcookie("username", "", time() - 3600);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Cookie</title>
</head>
<body>
    <?php if (isset($_COOKIE['username'])): ?>
        <h2>Привіт, <?= htmlspecialchars($_COOKIE['username']) ?>!</h2>
        <form method="post">
            <button type="submit" name="delete_cookie">Видалити cookie</button>
        </form>
    <?php else: ?>
        <form method="post">
            <label>Введіть ім’я: <input type="text" name="username"></label>
            <button type="submit">Зберегти</button>
        </form>
    <?php endif; ?>
</body>
</html>