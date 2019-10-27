<?php

include '../library/init.php';

include DIR_BACKEND_CLASSES . 'admin.class.php';
Admin::init();

App::check_spam();

if (Admin::is_logged_in()) {
    $response = array(
        'status' => true,
        'errors' => array(),
        'response' => '',
    );
    echo json_encode($response);
} else {
    echo 'Non of your business.';
}
die;
