<?php
session_start();

if (isset($_POST['product'])) {
    $product = $_POST['product'];
    $_SESSION['cart'][] = $product;

    $previous = isset($_COOKIE['previous']) ? explode(",", $_COOKIE['previous']) : [];
    $previous[] = $product;
    setcookie("previous", implode(",", $previous), time() + (7 * 24 * 60 * 60));
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Корзина</title></head>
<body>
    <form method="post">
        <select name="product">
            <option value="Яблуко">Яблуко</option>
            <option value="Банан">Банан</option>
            <option value="Апельсин">Апельсин</option>
        </select>
        <button type="submit">Додати</button>
    </form>

    <h3>Корзина (сесія):</h3>
    <ul>
        <?php if (!empty($_SESSION['cart'])) foreach ($_SESSION['cart'] as $item) echo "<li>$item</li>"; ?>
    </ul>

    <h3>Попередні покупки (cookie):</h3>
    <ul>
        <?php if (isset($_COOKIE['previous'])) foreach (explode(",", $_COOKIE['previous']) as $item) echo "<li>$item</li>"; ?>
    </ul>
</body>
</html>