<?php

class App {

    public static $spam_ratio = 2;
    public static $spam_timespan = 4;
    
    public static function check_spam() {
        if(!isset($_SESSION['spam_check']) ||  !is_array($_SESSION['spam_check'])) {
            $_SESSION['spam_check'] = array(microtime(true));
            return true;
        } else {
            foreach($_SESSION['spam_check'] as $index => $request_time) {
                if(microtime(true) - $request_time > self::$spam_timespan) {
                    unset($_SESSION['spam_check'][$index]);
                }
            }
            array_push($_SESSION['spam_check'], microtime(true));
            if(count($_SESSION['spam_check']) < (self::$spam_ratio * self::$spam_timespan)) {
                return true;
            } else {
                //##Spammer Detected
                die('Non of your business.');
            }
        }
    }

}
