<?php

class Xcaptcha {

    public static $is_safe = false;
    public static $html = '';
    public static $cache_path = ROOT . '_backend/_xtreme_cache/xcaptcha/';
    public static $img_width = null; //will change from picture to picture
    public static $img_height = 25;
    //
    public static $api_baseurl = 'https://www.powerapi.de/xcaptcha/';
    public static $api_user_ref = null;
    public static $api_user_ip = null;
    //
    public static $answers = array();
    //
    public static $templates = array(
        'easy' => '',
        'normal' => '',
    );

    public static function init() {
        //Just to be safe
        @mkdir(ROOT . '_backend/_xtreme_cache');
        @mkdir(ROOT . '_backend/_xtreme_cache/xcaptcha');
        //
        Xcaptcha::$api_user_ip = Utilities::remote_ip();
        Xcaptcha::$api_user_ref = sha1(Xcaptcha::$api_user_ip . $_SERVER['HTTP_USER_AGENT']);
        //
        if (isset($_SESSION['Xcaptcha_answers'])) {
            self::$answers = $_SESSION['Xcaptcha_answers'];
        }
        //

        self::$templates['easy'] = '<div class="xcaptcha">
    <div class="xcaptcha_title">XCaptcha</div>
    <div class="xcaptcha_math">
        <div class="xcaptcha_math_1">###N1###</div>
        <div class="xcaptcha_math_2">###N2###</div>
        <input type="text" name="xcaptcha_answer" />
    </div>
    <div class="xcaptcha_submit"></div>
</div>';

        self::$templates['normal'] = '<div class="xcaptcha">
    <div class="xcaptcha_title">XCaptcha</div>
    <div class="xcaptcha_images xcaptcha_images_amount_###IMAGES_AMOUNT###">
        ###IMAGES###
    </div>
    <div class="xcaptcha_answer">
        <input type="text" name="xcaptcha_answer" />
    </div>
    <div class="xcaptcha_submit"></div>
</div>';
    }

    public static function check_if_safe() {
        if (isset($_SESSION['Xcaptcha_is_safe']) && $_SESSION['Xcaptcha_is_safe']) {
            return true;
        }
        $check_response = Curl::get(self::$api_baseurl . 'get.php?key=' . self::$api_user_ref);
        $check_response = trim($check_response);
        if (in_array($check_response, array(1, '1', true, 'true', 'TRUE'))) {
            $_SESSION['Xcaptcha_is_safe'] = true;
            return true;
        } else {
            return false;
        }
    }

    public static function mark_safe() {
        Curl::get(self::$api_baseurl . 'set.php?value=true&key=' . self::$api_user_ref);
    }

    public static function generate_img($length = 4, $blocks = 2) {
        self::$img_width = $length * 30;
        $html = '';
        $answer = '';
        foreach (self::generate_phrases($length, $blocks) as $plain) {
            $img_path = self::create_image($plain);
            $img_url = BASEURL . str_replace(ROOT, '', $img_path);
            //
            $html .= '<img src="' . $img_url . '" width="' . self::$img_width * 1.5 . '" height="' . self::$img_height * 1.5 . '" alt />';
            $answer .= $plain;
        }
        self::add_answer($answer);
        return $html;
    }

    public static function add_answer($answer) {
        array_push(self::$answers, array($answer, time()));
        $new_answers = array();
        foreach (self::$answers as $a) {
            if (isset($a[1]) && $a[1] + 180 > time()) {
                array_push($new_answers, $a);
            }
        }
        $_SESSION['Xcaptcha_answers'] = self::$answers = $new_answers;
    }

    public static function check($answer) {
        foreach (self::$answers as $a) {
            if (isset($a[0]) && $a[0] == $answer) {
                return true;
            }
        }
        return false;
    }

    public static function generate_phrases($length = 4, $blocks = 2) {
        self::$img_width = $length * 30;
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $chars_length = strlen($chars);
        $words = array();
        for ($block_index = 0; $block_index < $blocks; $block_index++) {
            $word = '';
            for ($i = 0; $i < $length; $i++) {
                $char = $chars[rand(0, $chars_length - 1)];
                $word .= $char;
            }
            array_push($words, $word);
        }
        return $words;
    }

    public static function create_image($plain = null) {
        self::$img_width = strlen($plain) * 30;
        $image = imagecreatetruecolor(self::$img_width, self::$img_height);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image, 0, 0, self::$img_width, self::$img_height, $background_color);

        $line_color = imagecolorallocate($image, 64, 64, 64);
        for ($i = 0; $i < rand(1, 2); $i++) {
            imageline($image, 0, rand() % self::$img_height, self::$img_width + self::$img_height, rand() % self::$img_height, $line_color);
        }

        $pixel = imagecolorallocate($image, 0, 0, 255);
        for ($i = 0; $i < 150; $i++) {
            imagesetpixel($image, rand() % self::$img_width, rand() % self::$img_height, $pixel);
        }

        $text_color = imagecolorallocate($image, 0, 0, 0);
        foreach (str_split($plain) as $i => $char) {
            imagestring($image, 5, 10 + ($i * 30), 5, $char, $text_color);
        }

        $image_path = self::$cache_path . md5(microtime() . $plain) . '.png';

        imagepng($image, $image_path);

        return $image_path;
    }

}

Xcaptcha::init();
