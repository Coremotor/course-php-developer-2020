<?php

namespace renderMenu;

    function render ($mainMenu, $fontSize) {

        foreach ($mainMenu as $item) {
           $title = $item["title"];

           echo "<li style='font-size: {$fontSize}'><a href={$item["path"]}>{$title}</a></li>";
        }
    }
