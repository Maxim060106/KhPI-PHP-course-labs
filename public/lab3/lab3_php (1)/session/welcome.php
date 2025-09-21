<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Welcome</title></head>
<body>
    <h2>Вітаю, <?= $_SESSION['user'] ?>!</h2>
    <a href="logout.php">Вихід</a>
</body>
</html>