<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles.css">
    <title>Фото Галерея</title>
</head>
<body>
    <div class="container">
        <h1 class="main-title">Форма загрузки файлов</h1>

        <form class="form" action="lib.php" method="post" enctype="multipart/form-data">
            <label class="label" for="input">Выберите файлы для загрузки</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
            <input id="input" class="input" type="file" name="uploadUserPhoto[]" multiple accept="image/jpeg,image/png,image/jpg" />
            <button name="uploadBtn" type="submit" value="Отправить">Отправить</button>
        </form>

        <a class="link" href="/gallery.php">Перейти в галерею</a>
    </div>
</body>
</html>



<?php
