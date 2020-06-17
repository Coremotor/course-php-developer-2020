<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib.php';

include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/templates/form.php';
include $_SERVER['DOCUMENT_ROOT'] . '/templates/massages.php';
include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';

moveFile($uploadUserPhotoArr, $uploadPath);






