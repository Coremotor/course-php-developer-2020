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

<table class="clearfix" width="100%" border="0" cellspacing="0" cellpadding="0">

    <td class="left-collum-index">
        <h1><?=showTitle($mainMenu);?></h1>

        <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с
            друзьями и просматривать списки друзей.</p>
    </td>