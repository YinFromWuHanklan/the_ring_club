<?php

class Admin {

    public static $path = null;

    public static function init() {
        $url_path_explode = explode('/admin', $_SERVER['REQUEST_URI']);
        if (count($url_path_explode) > 1) {
            $path_after_admin = end($url_path_explode);
            if (substr($path_after_admin, 0, 1) == '/') {
                $path_after_admin = substr($path_after_admin, 1);
            }
        } else {
            $path_after_admin = '';
        }
        self::$path = trim($path_after_admin);
    }

}
