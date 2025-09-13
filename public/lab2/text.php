<?php
$file = 'log.txt';

if (isset($_POST['text_content'])) {
    $text = trim($_POST['text_content']);
    if ($text != "") {
        file_put_contents($file, $text . PHP_EOL, FILE_APPEND);
        echo "Текст успішно записано!<br>";
    }
}

if (file_exists($file)) {
    echo "<h3>Вміст файлу log.txt:</h3>";
    $lines = file($file, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        echo htmlspecialchars($line) . "<br>";
    }
} else {
    echo "Файл log.txt ще не створено.";
}
?>
