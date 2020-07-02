<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once($_SERVER["DOCUMENT_ROOT"] . "/DB/main_menu.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/lib/lib.php");

$isAuth = null;

if (isset($_POST["btnSend"])) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/DB/passwords.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/DB/logins.php");

    $login = $_POST["login"];
    $password = $_POST["password"];

    $index = array_search($login, $logins);

    $isAuth = $index !== false && $password == $passwords[$index];

    if (!isset($_SESSION["isAuth"])) {
        session_start();
        setcookie("login", $login, time() + 60 * 60 * 24 * 30, "/");
        $_SESSION["isAuth"] = $isAuth;
        var_dump($_SESSION["isAuth"]);
    }
}

if (isset($_GET["logout"]) && $_GET["logout"] == 'yes' && $_COOKIE['login']) {
    var_dump($_GET);
    unset($_SESSION['isAuth']);
    setcookie("login", "", time() - 36000, "/");

}

?>

<?php
include($_SERVER["DOCUMENT_ROOT"] . "/template/header.php");
?>


<td>
<td class="right-collum-index ">

    <div class="project-folders-menu">
        <ul class="project-folders-v">

            <?php if (isset($_SESSION['isAuth']) && $_SESSION['isAuth']) : ?>
                <li class="project-folders-v-active"><a href="/?logout=yes">Выйти</a></li>
            <?php endif; ?>

            <?php if (!isset($_SESSION['isAuth'])) : ?>
                <li class="project-folders-v-active"><a href="/?login=yes">Авторизация</a></li>
            <?php endif; ?>

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
                } ?>
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

            <?php endif; ?>
        </div>

    <?php endif; ?>

</td>
</td>

</table>

<?php
include($_SERVER["DOCUMENT_ROOT"] . "/template/footer.php");
?>

</body>
</html>