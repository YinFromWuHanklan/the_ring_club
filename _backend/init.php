<?php

include DIR_BACKEND_CLASSES . 'app.class.php';
include DIR_BACKEND_CLASSES . 'file.class.php';
include DIR_BACKEND_CLASSES . 'utilities.class.php';
include DIR_BACKEND_CLASSES . 'validate.class.php';
include DIR_BACKEND_CLASSES . 'curl.class.php';
include DIR_BACKEND_CLASSES . 'xcaptcha.class.php';
#
include DIR_BACKEND_CLASSES . 'project/customer.class.php';
include DIR_BACKEND_CLASSES . 'project/course.class.php';

//
$path_to_script = str_replace(basename($_SERVER["SCRIPT_NAME"]), '', $_SERVER["SCRIPT_NAME"]);
if (substr($path_to_script, 0, 1) == '/') {
    $path_to_script = substr($path_to_script, 1);
}
$url_path_to_script = str_replace('_backend/', '', $path_to_script);
define('BASEURL', "http" . (is_https() ? 's' : '') . "://" . $_SERVER['SERVER_NAME'] . '/' . $url_path_to_script);
//
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

function _str($value, $minlength = 2) {
    return is_string($value) && strlen($value) >= $minlength;
}

/** From: https://www.php.net/manual/de/function.parse-str.php    || And minimized */
function proper_parse_str($str, &$variable) {
    $str = urldecode($str);
    $arr = array();
    $pairs = explode('&', $str);
    foreach ($pairs as $i) {
        list($name, $value) = explode('=', $i, 2);
        if (isset($arr[$name])) {
            if (is_array($arr[$name])) {
                $arr[$name][] = $value;
            } else {
                $arr[$name] = array($arr[$name], $value);
            }
        } else {
            $arr[$name] = $value;
        }
    }
    $variable = $arr;
}

//Create $_PAYLOAD

$input = file_get_contents('php://input');
if (!empty($input)) {
    if (substr($input, 0, 1) == '"') {
        $input = substr($input, 1);
    }
    if (substr($input, strlen($input) - 1) == '"') {
        $input = substr($input, 0, strlen($input) - 1);
    }
    if (strstr($input, '{') && strstr($input, '}')) {
        $_PAYLOAD = json_decode($input, true);
    } else {
        proper_parse_str($input, $_PAYLOAD);
    }
} else {
    $_PAYLOAD = array();
}
