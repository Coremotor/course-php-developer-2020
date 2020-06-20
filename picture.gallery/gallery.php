<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

echo "<h1 class='galley-title'>Галерея</h1>";

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib.php';

$dir = $_SERVER["DOCUMENT_ROOT"] . "/uploaded_files/";
$files = scandir($dir);

$arrFilter = array_filter($files, function ($item) {
    return($item !== "." && $item !== "..");
});

include $_SERVER['DOCUMENT_ROOT'] . '/templates/form-gallery.php';

echo "<a class=\"link\" href=\"/\">Назад</a>";

include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';

