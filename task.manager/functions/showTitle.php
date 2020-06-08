<?php

function showTitle($mainMenu) {

    foreach ($mainMenu as $menuItem) {
        if ($menuItem["path"] === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
            return $menuItem["title"];
        }
    }
};
