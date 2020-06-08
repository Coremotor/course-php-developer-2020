
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once ($_SERVER["DOCUMENT_ROOT"] . "/main_menu.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/renderMenu.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/trimStr.php");

var_dump(strlen($mainMenu[4]["title"]));

$isAuth = null;

if (isset($_POST["btnSend"])) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/BD/passwords.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/BD/logins.php");

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

<?php
    include ($_SERVER["DOCUMENT_ROOT"] . "/template/header.php");
?>

<table class="clearfix" width="100%" border="0" cellspacing="0" cellpadding="0">

    <td class="left-collum-index">
        <h1>Возможности проекта</h1>

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

<?php
    include ($_SERVER["DOCUMENT_ROOT"] . "/template/footer.php");
?>

</body>
</html>