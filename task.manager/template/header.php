<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/phpconfig.php");
session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/DB/main_menu.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/lib/lib.php");

if (!isCurrentUrl('/')) {
    if (!isset($_SESSION['isAuth'])) {
        redirect('/');
    }
}

if (isset($_GET["logout"]) && $_GET["logout"] == 'yes' && $_COOKIE['login']) {
    logout();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body class="body">

<div class="header">
    <div class="logo"><img src="/img/logo.png" width="68" height="23" alt="Project"></div>
    <div class="clearfix"></div>
</div>

<div class="clearfix">

    <?php
        renderMenu($mainMenu, 'asc', "main-menu", "active");
    ?>

</div>

