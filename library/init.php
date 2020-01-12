<?php


ini_set('short_open_tag', 1);
ini_set('magic_quotes_gpc', 1);
ini_set("memory_limit", "512M");

session_start();
if(!isset($_SESSION['trc'])) {
    $_SESSION['trc'] = array();
}

//Define Constants
define('DIR_LIB', str_replace('\\', '/', __DIR__) . '/');
define('ROOT', str_Replace('library/', '', DIR_LIB));
define('DIR_BACKEND', ROOT . '_backend/');
define('DIR_BACKEND_CLASSES', DIR_BACKEND . 'classes/');
define('DIR_BACKEND_PAGES', DIR_BACKEND . 'adminpages/');

if (isset($_ENV['environment'])) {
    define('ENV', strtolower($_ENV['environment']));
} else if (isset($_ENV['env'])) {
    define('ENV', strtolower($_ENV['env']));
} else {
    $ENV_dev = (bool) preg_match('/(192\.168\.\d+\.\d+|localhost|.+\.docker)/i', $_SERVER['SERVER_NAME']);
    if ($ENV_dev) {
        define('ENV', 'dev');
    } elseif ($_SERVER['SERVER_NAME'] == 'staging.thering-muc.de') {
        define('ENV', 'staging');
    } elseif ($_SERVER['SERVER_NAME'] == 'thering-muc.de' || $_SERVER['SERVER_NAME'] == 'www.thering-muc.de') {
        define('ENV', 'live');
    }
}
define('IS_LIVE', ENV == 'live');

include DIR_LIB . 'functions.php';
//Kickstart Backend.
include DIR_BACKEND . 'init.php';
