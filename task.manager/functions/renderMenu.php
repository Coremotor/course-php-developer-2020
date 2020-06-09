<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/titleSubStrReplace.php");

function renderMenu($arr, $fontSize)
{
    foreach ($arr as $item) {

        $title = titleSubStrReplace($item["title"], 15);

        echo "<li style='font-size: {$fontSize}'><a href={$item["path"]}>{$title}</a></li>";
    }
}
