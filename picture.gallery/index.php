<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib.php';

include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
echo "<h1 class=\"main-title\">Форма загрузки файлов</h1>";
include $_SERVER['DOCUMENT_ROOT'] . '/templates/form.php';
include $_SERVER['DOCUMENT_ROOT'] . '/templates/messages-and-upload.php';
echo "<a class=\"link\" href=\"/gallery.php\">Перейти в галерею</a>";
include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';








