<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/lib/currentURL.php");

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
