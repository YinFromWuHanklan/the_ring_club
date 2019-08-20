<?php

//Define Constants
define('DIR_LIB', str_replace('\\', '/', __DIR__) . '/');
define('ROOT', str_Replace('library/', '', DIR_LIB));
define('DIR_BACKEND', ROOT . '_backend/');
define('DIR_BACKEND_CLASSES', DIR_BACKEND . 'classes/');

include DIR_LIB . 'functions.php';
