<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . '/lib.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Фото галерея</title>
</head>
<body>
<div class="container">
    <h1 class="galley-title">Галерея</h1>

    <?php
    $dir = $_SERVER["DOCUMENT_ROOT"] . "/uploaded_files/";
    $files = scandir($dir);
    array_shift($files); // удаляем из массива '.'
    array_shift($files); // удаляем из массива '..'

    ?>

    <div class="img-container">

        <?php foreach ($files as $file): ?>

            <img src="<?= "/uploaded_files/" . $file?>" alt="Картинка">

        <?php endforeach; ?>

    </div>

</div>

</body>
</html>

