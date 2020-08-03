<?php

include($_SERVER["DOCUMENT_ROOT"] . "/template/header.php");
$isAuth = null;

if (isset($_POST["btnSend"])) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/DB/passwords.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/DB/logins.php");
    $isAuth = authorization($logins, $passwords);
}

include($_SERVER["DOCUMENT_ROOT"] . "/template/form.php");
include($_SERVER["DOCUMENT_ROOT"] . "/template/footer.php");


