
<?php
error_reporting(E_ALL);


if (!empty($_POST)) {
    $login = $_POST["login"];
    $password = $_POST["password"];
}

$logins = ['admin', 'user'];
$passwords = ['a', 'u'];

$isAuth = false;
$error = false;

if (isset($_POST["btnSend"])) {
    $index = array_search($login, $logins);

    if ($index !== false && $password == $passwords[$index]) {
        $isAuth = true;
    } else {
        $isAuth = false;
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html>
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
    <tr>
        <td class="left-collum-index">

            <h1>Возможности проекта —</h1>
            <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с
                друзьями и просматривать списки друзей.</p>

        </td>
    </tr>

    <tr>
        <td class="right-collum-index <?= $_GET["login"] == "yes" ? "" : "display-none" ?>">

            <div class="project-folders-menu">
                <ul class="project-folders-v">
                    <li class="project-folders-v-active"><a href="#">Авторизация</a></li>
                    <li><a href="#">Регистрация</a></li>
                    <li><a href="#">Забыли пароль?</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="index-auth">

                <div>
                    <? if ($isAuth) {
                        include($_SERVER["DOCUMENT_ROOT"] . "/include/success.php");
                    } elseif ($error) {
                        include($_SERVER["DOCUMENT_ROOT"] . "/include/error.php");
                    } else {
                        include($_SERVER["DOCUMENT_ROOT"] . "/include/enter.php");
                    }?>
                </div>

                <form class=<?= $isAuth ? "display-none" : "" ?> action="index.php?login=yes" method="post">
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
                                <input id="password_id" size="30" name="password" type="password"
                                       value="">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="btnSend" value="Войти"></td>
                        </tr>
                    </table>
                </form>
            </div>

        </td>
    </tr>

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

<a class="clearfix footer-link" href="/?login=yes">Войти</a>

<div class="footer">&copy;&nbsp;<nobr>2020</nobr>
    Project.
</div>

</body>
</html>