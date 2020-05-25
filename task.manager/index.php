<pre>
<?php
    include "include/success.php";

    $login = "admin";

    $password = "pass";

//    var_dump("GET", $_GET);
//    var_dump("POST", $_POST);

    if (isset($_POST["btnSend"])) {
        if ($_POST["login"] == $login && $_POST["password"] == $password) {
            $authorization = true;
        } else {
            $repeat = true;
        }
    }
?>
</pre>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body style="margin: 0 auto; width: 800px">

    <div class="header">
    	<div class="logo"><img src="img/logo.png" width="68" height="23" alt="Project"></div>
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
				<p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>

			</td>
        </tr>


        <tr>
            <td class="right-collum-index <?=$_GET["login"] == "yes" ? "" : "display-none"?>">

                <div class="project-folders-menu">
                    <ul class="project-folders-v">
                        <li class="project-folders-v-active"><a href="#">Авторизация</a></li>
                        <li><a href="#">Регистрация</a></li>
                        <li><a href="#">Забыли пароль?</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="index-auth">
                    <div style="margin: 20px" class=<?= $authorization ? "" : "display-none"?>><?=$massage?></div>

                    <div style="margin: 20px" class=<?= $repeat ? "" : "display-none"?>>Неверный email или пароль</div>

                    <form class=<?= $authorization ? "display-none" : ""?> action="index.php?login=yes" method="post">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="iat">
                                    <label for="login_id">Ваш e-mail:</label>
                                    <input id="login_id" size="30" name="login" value="<?=isset($_POST["login"]) ? $_POST["login"] : ""?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="iat">
                                    <label for="password_id">Ваш пароль:</label>
                                    <input id="password_id" size="30" name="password" type="password" value="<?=isset($_POST["password"]) ? $_POST["password"] : ""?>">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="btnSend" "Войти"></td>
                            </tr>
                        </table>
                    </form>
                </div>

            </td>
        </tr>

    </table>
    
    <div style="margin-bottom: 10px" class="clearfix">
        <ul class="main-menu bottom">
            <li><a href="#">Главная</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
            <li><a href="#">Новости</a></li>
            <li><a href="#">Каталог</a></li>
        </ul>
    </div>

    <a class="clearfix" style="color: white; font-size: 20px; margin: 10px" href="/?login=yes">Войти</a>

    <div class="footer">&copy;&nbsp;<nobr>2018</nobr> Project.</div>

</body>
</html>