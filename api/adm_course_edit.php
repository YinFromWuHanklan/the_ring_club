<?php

include '../library/init.php';

include DIR_BACKEND_CLASSES . 'admin.class.php';
Admin::init();

App::check_spam();

if (Admin::is_logged_in()) {
    $customer_id = _var('id', $_PAYLOAD);
    $response = array(
        'ok' => true,
        'errors' => array(),
        'response' => '',
    );
    $data = array(
        'gender' => _var('gender', $_PAYLOAD),
        'firstname' => _var('firstname', $_PAYLOAD),
        'lastname' => _var('lastname', $_PAYLOAD),
        'email' => _var('email', $_PAYLOAD),
        'phone' => _var('phone', $_PAYLOAD),
        'bank_iban' => _var('bank_iban', $_PAYLOAD),
        'paymodel' => _var('paymodel', $_PAYLOAD),
        'courses' => _var('courses', $_PAYLOAD),
    );
    $errors = array();
    if (!is_numeric($customer_id) || $customer_id <= 0) {
        array_push($errors, array('id', 'Customer-ID konnte nicht erkannt werden.'));
    }
    if (!_str($data['firstname'], 2)) {
        array_push($errors, array('firstname', 'Bitte validen Vornamen eingeben.'));
    }
    if (!_str($data['lastname'], 2)) {
        array_push($errors, array('lastname', 'Bitte validen Nachnamen eingeben.'));
    }
    if (is_string($data['email']) && strlen($data['email']) > 0 && !Validate::is_email($data['email'])) {
        array_push($errors, array('email', 'Email-Adresse ist ungültig.'));
    }
    //
    if (empty($errors)) {
        $edit_response = Xjsondb::update('customers', $customer_id, $data);
        if ($edit_response) {
            $response['response'] = array(
                $customer_id,
                'Kunde erfolgreich gespeichert.'
            );
        } else {
            $response['ok'] = false;
            $response['errors'] = array('Customer could not be saved.');
            $response['response'] = 'Process not successfull.';
        }
    } else {
        $response['ok'] = false;
        $response['errors'] = $errors;
        $response['response'] = 'Process not successfull.';
    }
    echo json_encode($response);
} else {
    echo 'Non of your business.';
}
die;
