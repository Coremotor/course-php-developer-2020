<table class="clearfix" width="100%" border="0" cellspacing="0" cellpadding="0">

    <td class="left-collum-index">
        <h1><?= showTitle($mainMenu); ?></h1>

        <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с
            друзьями и просматривать списки друзей.</p>

        <?php if (isset($_SESSION['isAuth']) && $_SESSION['isAuth']) : ?>
            <a href="/?logout=yes">Выйти</a>
        <?php endif; ?>

    </td>
    <?php if (!isset($_SESSION['isAuth'])) : ?>
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
                            <?php
                                if ($isAuth === false) {
                                    include($_SERVER["DOCUMENT_ROOT"] . "/include/error.php");
                                } elseif (isset($_SESSION) && !isset($_COOKIE["login"])) {
                                    include($_SERVER["DOCUMENT_ROOT"] . "/include/enter.php");
                                } elseif (isset($_COOKIE["login"])) {
                                    include($_SERVER["DOCUMENT_ROOT"] . "/include/enterPass.php");
                                }
                            ?>
                        </div>

                        <form action="/?login=yes" method="post">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="iat">
                                        <label for="login_id" class=<?= isset($_COOKIE["login"]) ? "display-none" : ""?>>Ваш логин:</label>
                                        <input id="login_id" size="30" name="login"
                                           value="<?= isset($_COOKIE["login"]) ? $_COOKIE["login"] : $_POST["login"] ?? ""?>"
                                            <?= isset($_COOKIE["login"]) ? "hidden" : ""?>
                                        >
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

                    </div>

                <?php endif; ?>

            </td>
        </td>

    <?php endif; ?>

</table>
