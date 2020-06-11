<?php

function isCurrentUrl($url){

    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $url;

}






require_once($_SERVER["DOCUMENT_ROOT"] . "/lib/titleSubStrReplace.php");



function renderMenu($arr, $fontSize, $sort, $listClassName)
{
    $newArr = arraySort($arr, $sort);

    echo "<ul class=$listClassName>";

    foreach ($newArr as $item) {

        $title = titleSubStrReplace($item["title"], 15);

        echo "<li class=$fontSize><a href={$item["path"]}>{$title}</a></li>";
    }

    echo "</ul>";
}
