<?php

function showTitle($mainMenu)
{
    $title = null;
    foreach ($mainMenu as $menuItem) {
        if ($menuItem["path"] === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
            $title = $menuItem["title"];
        }
    }
    return $title;
}
