<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (ini_get("session.gc_maxlifetime") !== 60 * 20) {
    ini_set("session.gc_maxlifetime", 60 * 20);
}

if (ini_get("session.cookie_lifetime") !== 60 * 20) {
    ini_set("session.cookie_lifetime", 60 * 20);
}

if (ini_get("session.name") !== 'session_id') {
    ini_set("session.name", 'session_id');
}