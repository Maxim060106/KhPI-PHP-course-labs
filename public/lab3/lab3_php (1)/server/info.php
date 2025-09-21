<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: get_request.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Server Info</title></head>
<body>
    <h3>IP клієнта: <?= $_SERVER['REMOTE_ADDR'] ?></h3>
    <h3>Браузер: <?= $_SERVER['HTTP_USER_AGENT'] ?></h3>
    <h3>Скрипт: <?= $_SERVER['PHP_SELF'] ?></h3>
    <h3>Метод: <?= $_SERVER['REQUEST_METHOD'] ?></h3>
    <h3>Шлях до файлу: <?= $_SERVER['SCRIPT_FILENAME'] ?></h3>
</body>
</html>