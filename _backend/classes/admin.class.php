<?php

class Admin {

    public static $path = null;
    public static $page_File = null;

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
        //
        $page_filepath = null;
        if (is_file(DIR_BACKEND_PAGES . self::$path)) {
            $page_filepath = DIR_BACKEND_PAGES . self::$path;
        } else if (DIR_BACKEND_PAGES . self::$path . '.php') {
            $page_filepath = DIR_BACKEND_PAGES . self::$path . '.php';
        } else if (DIR_BACKEND_PAGES . self::$path . '.html') {
            $page_filepath = DIR_BACKEND_PAGES . self::$path . '.html';
        }
        self::$page_File = File::instance($page_filepath);
    }
    
    public static function is_logged_in() {
        return isset($_SESSION['trc']['login']) && $_SESSION['trc']['login'];
    }

}
