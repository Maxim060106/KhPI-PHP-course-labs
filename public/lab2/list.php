<?php
$dir = 'uploads/';

if (is_dir($dir)) {
    $files = array_diff(scandir($dir), ['.', '..']);
    if (!empty($files)) {
        echo "<h3>Файли у папці uploads:</h3>";
        foreach ($files as $file) {
            echo "<a href='$dir$file' download>$file</a><br>";
        }
    } else {
        echo "У папці uploads немає файлів.";
    }
} else {
    echo "Папка uploads не існує.";
}
?>
