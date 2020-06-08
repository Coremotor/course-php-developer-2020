<?php

function currentUrl($url) {
    return $url == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

function showTitle($mainMenu) {
    foreach ($mainMenu as $menuItem) {

        if (currentUrl($menuItem['path'])) {
            $currPageCaption = $menuItem['title'];
            break;
        }
    }

    if (! isset($currPageCaption)) {
        $currPageCaption = 'Страница не найдена.';
    }

    return $currPageCaption;
}