<?php

include '../library/init.php';

include DIR_BACKEND_CLASSES . 'admin.class.php';
Admin::init();

App::check_spam();

if (Admin::is_logged_in()) {
    $course_id = _var('id', $_PAYLOAD);
    $response = array(
        'ok' => true,
        'errors' => array(),
        'response' => '',
    );
    $data = array(
        'name' => _var('name', $_PAYLOAD),
        'times' => fetch_times($_PAYLOAD),
    );
    $errors = array();
    if (!_str($data['name'], 4)) {
        array_push($errors, array('name', 'Bitte validen Kursnamen eingeben.'));
    }
    if(!is_numeric($course_id) || $course_id <= 0) {
        array_push($errors, array('id', 'Kurs-ID ist falsch.'));
    } else {
        $course_id = intval($course_id);
    }
    //
    if (empty($errors)) {
        foreach ($data['times'] as $index => $item) {
            if (!isset($item['day']) || strlen($item['day']) < 2 || !isset($item['time']) || strlen($item['time']) < 2) {
                unset($data['times'][$index]);
            }
        }
        sort($data['times']);
        //
        $update_response = Xjsondb::update('courses', $course_id, $data);
        if ($update_response) {
            $response['response'] = array(
                $course_id,
                'Kurs erfolgreich gespeichert.'
            );
        } else {
            $response['ok'] = false;
            $response['errors'] = array('Course could not be saved.');
            $response['response'] = 'Process not successfull.';
            $response['debug'] = array($_PAYLOAD, $data);
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
