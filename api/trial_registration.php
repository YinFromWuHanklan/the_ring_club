<?php

include '../library/init.php';

App::check_spam();

$data = array(
    'name' => Utilities::validate($_POST['name']),
    'phone' => Utilities::validate($_POST['phone']),
    'email' => Utilities::validate($_POST['email']),
);
