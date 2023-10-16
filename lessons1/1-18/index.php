<?php

// Позвольте загружать только файлы размером меньше 8Мб. Сделайте это с помощью сравнения с $_FILES['attachment']['size'].

// Изучите директиву upload_max_filesize в файле php.ini. Установите её значение, равное 2M.
// Перезапустите веб-сервер. Попробуйте теперь загрузить файл, размером в 5Мб. Теперь обработайте соответствующую ошибку
// с помощью проверки значения $_FILES['attachment']['error'].

//Разрешите загружать картинки с шириной не более 1280px и высотой не более 720px.

if (!empty($_FILES['attachment'])) {
    $file = $_FILES['attachment'];

    $srcFileName = $file['name'];
    $newFilePath = __DIR__ . '/uploads/' . $srcFileName;
    $maxWidth = 1280;
    $maxHeight = 720;
    $imageSize = getimagesize($file);

    $allowedExtensions = ['jpg', 'png', 'gif'];
    $extension = pathinfo($srcFileName, PATHINFO_EXTENSION);
    if($_FILES['attachment']['size'] > 8 * 1024 * 1024) $error = 'Размер файла превышает 8МБ!';
    elseif ($file['error'] == UPLOAD_ERR_INI_SIZE) {
        $error = 'Размер файла превышает допустиые значения!';
    }
    else if (!in_array($extension, $allowedExtensions)) {
        $error = 'Загрузка файлов с таким расширением запрещена!';
    }
    else if ($imageSize[0] > $maxWidth || $imageSize[1] > $maxHeight) {
        $error = 'Размер изображения превышает допустимые значения!';
    }
    elseif ($file['error'] !== UPLOAD_ERR_OK) {
        $error = 'Ошибка при загрузке файла.';
    } elseif (file_exists($newFilePath)) {
        $error = 'Файл с таким именем уже существует';
    } elseif (!move_uploaded_file($file['tmp_name'], $newFilePath)) {
        $error = 'Ошибка при загрузке файла';
    } else {
        $result = 'http://localhost/uploads/' . $srcFileName;
    }
}
?>
<html>
<head>
    <title>Загрузка файла</title>
</head>
<body>
<?php if (!empty($error)): ?>
    <?= $error ?>
<?php elseif (!empty($result)): ?>
    <?= $result ?>
<?php endif; ?>
<br>
<form action="/upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="attachment">
    <input type="submit">
</form>
</body>
</html>