<?php

include '../library/init.php';

/* Modes */
if (isset($_GET['mode'])) {
    $response = array(
        'status' => 400,
        'response' => array(),
        'errors' => array(),
        'error_code' => 0
    );
    if ($_GET['mode'] == 'start') {
        if (Xcaptcha::check_if_safe()) {
            Xcaptcha::$is_safe = true;
            Xcaptcha::$html = Xcaptcha::$templates['easy'];
            $n1 = rand(1, 29);
            $n2 = rand(1, 29);
            Xcaptcha::$html = str_replace('###N1###', $n1, Xcaptcha::$html);
            Xcaptcha::$html = str_replace('###N2###', $n2, Xcaptcha::$html);
            $answer = $n1 + $n2;
            Xcaptcha::add_answer($answer);
        } else {
            Xcaptcha::$html = Xcaptcha::$templates['normal'];
            $img_amount = 2;
            Xcaptcha::$html = str_replace('###IMAGES###', Xcaptcha::generate_img(2, $img_amount), Xcaptcha::$html);
            Xcaptcha::$html = str_replace('###IMAGES_AMOUNT###', $img_amount, Xcaptcha::$html);
        }

        $response['response'] = array(
            'safe' => Xcaptcha::$is_safe,
            'html' => Xcaptcha::$html,
        );
        $response['status'] = 200;
    } else if ($_GET['mode'] == 'answer') {
        if (isset($_PAYLOAD['answer'])) {
            $answer = Utilities::validate($_PAYLOAD['answer']);
            if (!empty($answer)) {
                $response['status'] = 200;
                $response['response'] = array(
                    'ok' => Xcaptcha::check($answer),
                    'debug' => Xcaptcha::$answers,
                );
                if ($response['response']['ok']) {
                    Xcaptcha::mark_safe();
                }
            }
        }
    }
    echo json_encode($response);
    die;
} else {
    die;
}
