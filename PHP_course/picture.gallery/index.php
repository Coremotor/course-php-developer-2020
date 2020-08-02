<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib.php';

include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
?><h1 class="main-title">Форма загрузки файлов</h1><?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/form.php';
include $_SERVER['DOCUMENT_ROOT'] . '/templates/messages.php';
?><a class="link uk-link-text" href="/gallery.php">Перейти в галерею</a><?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';








