<?php

$XDB = new XDB('jsondb');

$XDB->add_tables(array(
    'users' => array(
        'username' => '',
        'password' => '',
        'hash' => function($data) {
            $email = (isset($data['email']) ? $data['email'] : 'no-email');
            return strtoupper(md5($data['id'] . '||' . $email));
        },
        'email' => '',
        'email_validated' => null,
    ),
    'user_groups' => array('user_id' => '', 'name' => ''),
    'trials' => array(
        'name' => '',
        'phone' => '',
        'hash' => function($data) {
            $email = (isset($data['email']) ? $data['email'] : 'no-email');
            return strtoupper(md5($data['id'] . '||' . $email));
        },
        'email' => '',
        'course' => '',
    ),
    'courses' => array(
        'name' => '',
        'times' => array(),
    ),
    'customers' => array(
        'gender' => '',
        'firstname' => '',
        'lastname' => '',
        'email' => '',
        'phone' => '',
        'courses' => array(),
        'bank_iban' => array(),
    ),
));

$XDB->add_validations(array(
    'users' => array(
        'groups' => array('id' => array('user_groups', 'user_id')),
    )
));

$XDB->init();
