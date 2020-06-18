<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

echo "<h1 class='galley-title'>Галерея</h1>";

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib.php';

$dir = $_SERVER["DOCUMENT_ROOT"] . "/uploaded_files/";
$files = scandir($dir);
array_shift($files); // удаляем из массива '.'
array_shift($files); // удаляем из массива '..'

include $_SERVER['DOCUMENT_ROOT'] . '/templates/form-gallery.php';

echo "<a class=\"link\" href=\"/index.php\">Назад</a>";

include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';

