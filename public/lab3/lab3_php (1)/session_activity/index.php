<?php
session_start();
$timeout = 300;

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
    session_unset();
    session_destroy();
    echo "Сесія завершена через неактивність.";
    exit;
}
$_SESSION['last_activity'] = time();
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Session Activity</title></head>
<body>
    <h2>Ваша сесія активна</h2>
    <p>Час останньої активності: <?= date("H:i:s", $_SESSION['last_activity']) ?></p>
</body>
</html>