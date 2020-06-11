<?php

//Ф-ия для определения текущего URL
function isCurrentUrl($url){
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $url;
}

//Ф-ия для обрезания строки
function titleSubStrReplace($str, $length)
{
    if (mb_strlen($str) >= $length) {
        $title = mb_strimwidth($str, 0, $length, "...");
    } else {
        $title = $str;
    }
    return $title;
}

//Ф-ия для вывода пунктов меню
function renderMenu($arr, $fontSize, $sort, $listClassName)
{
    $newArr = arraySort($arr, $sort);

    include ($_SERVER["DOCUMENT_ROOT"] . "/template/menu.php");
}

//Ф-ия для вывода заголовка
function showTitle($mainMenu)
{
    $title = null;
    foreach ($mainMenu as $menuItem) {
        if (isCurrentUrl($menuItem["path"])) {
            $title = $menuItem["title"];
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