<?php
if (isset($_FILES['myfile'])) {
    $file = $_FILES['myfile'];
    $name = $file['name'];
    $tmp = $file['tmp_name'];

    // Створюємо папку uploads, якщо її немає
    if (!is_dir('uploads')) {
        mkdir('uploads');
    }

    // Зберігаємо файл у папку uploads
    if (move_uploaded_file($tmp, 'uploads/' . $name)) {
        echo "Файл $name успішно завантажено!<br>";
        echo "<a href='uploads/$name' download>Завантажити файл</a>";
    } else {
        echo "Сталася помилка при завантаженні.";
    }
} else {
    echo "Файл не вибрано.";
}
?>
