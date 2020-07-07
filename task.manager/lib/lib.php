<?php

//Ф-ия для определения текущего URL
function isCurrentUrl($url)
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $url;
}

//Ф-ия для обрезания строки
function titleSubStrReplace($str, $length)
{
    if (mb_strlen($str) >= $length) {
        $str = mb_strimwidth($str, 0, $length, "...");
    }
    return $str;
}

//Ф-ия для вывода пунктов меню
function renderMenu($arr, $sort, $listClassName, $activeClass)
{
    $newArr = arraySort($arr, $sort);

    include($_SERVER["DOCUMENT_ROOT"] . "/template/menu.php");
}

//Ф-ия для вывода заголовка
function showTitle($mainMenu)
{
    $title = null;
    foreach ($mainMenu as $menuItem) {
        if (isCurrentUrl($menuItem["path"])) {
            $title = $menuItem["title"];
            break;
        }
    }
    return $title;
}

//Ф-ия сортировки пунктов меню
function arraySort($arr, $sort)
{
    usort($arr, function ($a, $b) use ($sort) {
        return $sort == 'desc' ? $b['sort'] - $a['sort'] : $a['sort'] - $b['sort'];
    });
    return $arr;
}

//Ф-ия редиректа
function redirect($destination)
{
    header('Location: ' . $destination);
    exit();
}

//Ф-ия для удаления куки и значений сессии
function logout()
{
    unset($_SESSION['isAuth']);
    setcookie("login", "", time() - 36000, "/");
    redirect('/');
}

//Ф-ия авторизации
function authorization($logins, $passwords)
{
    $isAuth = false;
    $login = $_POST["login"];
    $password = $_POST["password"];

    $index = array_search($login, $logins);

    if ($index !== false && $password == $passwords[$index]) {
        $isAuth = true;
        if (!isset($_SESSION["isAuth"])) {
            setcookie("login", $login, time() + 60 * 60 * 24 * 30, "/");
            $_SESSION["isAuth"] = $isAuth;
        }
    }
    return $isAuth;
}
//Ф-ия обновления куки если пользователь авторизован
function updateCookie () {
    if (isset($_SESSION["isAuth"]) && $_SESSION["isAuth"] === true && isset($_COOKIE["login"])) {
        $login = $_COOKIE["login"];
        setcookie("login", $login, time() + 60 * 60 * 24 * 30, "/");
    }
}