<?php

namespace renderMenu;

    function render ($mainMenu) {

        foreach ($mainMenu as $item) {
           echo "<li><a href={$item["path"]}>{$item["title"]}</a></li>";
        }
    }
