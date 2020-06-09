<?php

function isCurrentUrl($url){

    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $url;

}
