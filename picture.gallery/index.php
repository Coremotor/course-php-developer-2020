<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib.php';

include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
echo "<h1 class=\"main-title\">Форма загрузки файлов</h1>";
include $_SERVER['DOCUMENT_ROOT'] . '/templates/form.php';
include $_SERVER['DOCUMENT_ROOT'] . '/templates/massages.php';
echo "<a class=\"link\" href=\"/gallery.php\">Перейти в галерею</a>";
include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
if ((isset($_POST["uploadBtn"]) && checkEmptyArr())) {
    moveFile($uploadPath);
}







