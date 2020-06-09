<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/titleSubStrReplace.php");



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
