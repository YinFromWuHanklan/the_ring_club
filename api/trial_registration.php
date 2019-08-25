<?php

include '../library/init.php';

App::check_spam();

$response = array(
    'ok' => false,
    'response' => '',
    'errors' => array(),
);
$data = array(
    'name' => _post('name'),
    'phone' => _post('phone'),
    'email' => _post('email'),
);

echo json_encode($response);
