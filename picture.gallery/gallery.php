<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

?><h1 class='galley-title'>Галерея</h1><?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib.php';

$dir = $_SERVER["DOCUMENT_ROOT"] . "/uploaded_files/";
$files = scandir($dir);
$arr = [".", ".."];

$arrFilter = array_filter($files, function ($item) use ($arr) {
    return (!in_array($item, $arr));
});

include $_SERVER['DOCUMENT_ROOT'] . '/templates/form-gallery.php';

?><a class="link uk-link-text" href="/">Назад</a><?php

include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';

