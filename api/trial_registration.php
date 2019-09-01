<?php

include '../library/init.php';

App::check_spam();

$response = array(
    'ok' => false,
    'response' => '',
    'errors' => array(),
);
$input = file_get_contents('php://input');
if(substr($input, 0, 1) == '"') {
    $input = substr($input, 1);
}
if(substr($input, strlen($input) - 2) == '"') {
    $input = substr($input, 0, strlen($input));
}
parse_str($input, $_PAYLOAD);
$data = array(
    'name' => _var('name', $_PAYLOAD),
    'phone' => _var('phone', $_PAYLOAD),
    'email' => _var('email', $_PAYLOAD),
);


if(!is_string($data['name']) || strlen($data['name']) < 2) {
    array_push($response['errors'], array('name', 'Bitte tragen Sie einen richtigen Namen ein.'));
}
if(!is_string($data['phone']) || strlen($data['phone']) < 2) {
    array_push($response['errors'], array('phone', 'Bitte tragen Sie eine richtige Telefonnummer ein.'));
}
if(!is_string($data['email']) || strlen($data['email']) < 5 || !strstr($data['email'], '@')) {
    array_push($response['errors'], array('email', 'Bitte tragen Sie eine richtige E-Mail ein.'));
}

if(empty($response['errors'])) {
    Xjsondb::insert('trials', $data);
    $response['ok'] = true;
    $response['response'] = 'Sie sind eingetragen.';
}

echo json_encode($response);
