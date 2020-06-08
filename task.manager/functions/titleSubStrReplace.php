<?php

function titleSubStrReplace ($str, $length) {
    if (strlen($str) >= $length) {
        $title = substr_replace(($str), '...', 15);
    } else {
        $title = $str;
    }

    return $title;
}
