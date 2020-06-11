<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/lib/showTitle.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/DB/main_menu.php");
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../styles.css">
    <title><?=showTitle($mainMenu);?></title>
</head>

<body class="body">
<h1 class="main-title"><?=showTitle($mainMenu);?></h1>
</body>
</html>