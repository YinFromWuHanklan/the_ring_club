<?php

include DIR_BACKEND_CLASSES . 'app.class.php';
include DIR_BACKEND_CLASSES . 'file.class.php';
include DIR_BACKEND_CLASSES . 'utilities.class.php';
include DIR_BACKEND_CLASSES . 'validate.class.php';
include DIR_BACKEND_CLASSES . 'curl.class.php';
include DIR_BACKEND_CLASSES . 'xcaptcha.class.php';

//

define('BASEURL', '');

//################### Taken from XPM #########################
include DIR_BACKEND_CLASSES . 'jsondb.class.php';
include DIR_BACKEND_CLASSES . 'xdb.class.php';
include DIR_BACKEND . 'db_config.php';

//############################################################
//Shortcuts
function debug($var, $height = 'auto', $width = 'auto') {
    Utilities::dump($var, $height, $width);
}

function gz_compress($content) {
    return Utilities::gz_compress($content);
}

//Maybe Missing Functions
if (!function_exists('boolval')) {

    function boolval($val) {
        return ($val == true || $val == 1);
    }

}
if (!function_exists('mime_content_type')) {

    function mime_content_type($filename) {
        return Utilities::mime_content_type_by_filename($filename);
    }

}

function is_https() {
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443 || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https');
}

function _var($key, $var = null) {
    if (!is_array($var)) {
        $var = $_POST;
    }
    if (isset($var[$key])) {
        return Utilities::validate($var[$key]);
    } else {
        return null;
    }
}

//Create $_PAYLOAD

$input = file_get_contents('php://input');
if (!empty($input)) {
    if (substr($input, 0, 1) == '"') {
        $input = substr($input, 1);
    }
    if (substr($input, strlen($input) - 2) == '"') {
        $input = substr($input, 0, strlen($input));
    }
    if(strstr($input, '{') && strstr($input, '}')) {
        $_PAYLOAD = json_decode($input, true);
    } else {
        parse_str($input, $_PAYLOAD);
    }
} else {
    $_PAYLOAD = array();
}
