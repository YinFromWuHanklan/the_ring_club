<?php

class App {

    public static function check_spam() {
        if(!isset($_SESSION['last_request'])) {
            $_SESSION['last_request'] = microtime();
            return true;
        }
    }

}
