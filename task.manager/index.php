
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$isAuth = null;

if (isset($_POST["btnSend"])) {
    require_once ($_SERVER["DOCUMENT_ROOT"] . "/include/passwords.php");
    require_once ($_SERVER["DOCUMENT_ROOT"] . "/include/logins.php");

    $login = $_POST["login"];
    $password = $_POST["password"];

    $index = array_search($login, $logins);

    $isAuth = $index !== false && $password == $passwords[$index];
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body>

<div class="header">
    <div class="logo"><img src="/img/logo.png" width="68" height="23" alt="Project"></div>
    <div class="clearfix"></div>
</div>

<div class="clear">
    <ul class="main-menu">
        <li><a href="#">Главная</a></li>
        <li><a href="#">О нас</a></li>
        <li><a href="#">Контакты</a></li>
        <li><a href="#">Новости</a></li>
        <li><a href="#">Каталог</a></li>
    </ul>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <td class="left-collum-index">
        <h1>Возможности проекта —</h1>

        <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с
            друзьями и просматривать списки друзей.</p>
    </td>


    <td>
        <td class="right-collum-index ">

            <div class="project-folders-menu">
                <ul class="project-folders-v">
                    <li class="project-folders-v-active"><a href="/?login=yes">Авторизация</a></li>
                    <li><a href="#">Регистрация</a></li>
                    <li><a href="#">Забыли пароль?</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <?php if (isset($_GET["login"]) && $_GET["login"] == 'yes') : ?>

            <div class="index-auth">
                <div>
                    <?php if ($isAuth) {
                        include($_SERVER["DOCUMENT_ROOT"] . "/include/success.php");
                    } elseif ($isAuth === null) {
                        include($_SERVER["DOCUMENT_ROOT"] . "/include/enter.php");
                    } else {
                        include($_SERVER["DOCUMENT_ROOT"] . "/include/error.php");
                    }?>
                </div>

                <?php if (!$isAuth) : ?>

                <form action="/?login=yes" method="post">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="iat">
                                <label for="login_id">Ваш e-mail:</label>
                                <input id="login_id" size="30" name="login"
                                       value="<?= $_POST["login"] ?? "" ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="iat">
                                <label for="password_id">Ваш пароль:</label>
                                <input id="password_id" size="30" name="password" type="password">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="btnSend" value="Войти"></td>
                        </tr>
                    </table>
                </form>

                <?php endif;?>
            </div>

            <?php endif;?>

        </td>
    </td>

</table>

<div class="footer-menu clearfix">
    <ul class="main-menu bottom">
        <li><a href="#">Главная</a></li>
        <li><a href="#">О нас</a></li>
        <li><a href="#">Контакты</a></li>
        <li><a href="#">Новости</a></li>
        <li><a href="#">Каталог</a></li>
    </ul>
</div>

<div class="footer">&copy;&nbsp;<nobr>2020</nobr>
    Project.
</div>

</body>
</html>