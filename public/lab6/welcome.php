<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<h1>Вітаю, <?php echo $_SESSION['username']; ?>!</h1>
<a href="logout.php">Вийти</a>
