<?php
include 'library/init.php';
if (!isset($website_title)) {
    $website_title = 'The Ring Boxing Club Munich';
}
if (!isset($website_description)) {
    $website_description = 'The Ring Boxing Club Munich';
}
?><!DOCTYPE html>
<html>
    <head>
        <title><?= $website_title ?></title>
        <meta name="description" content="<?= $website_description ?>">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style<?= IS_LIVE ? '.min' : '' ?>.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:300,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:300,700&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php fetch_file("navbar.php"); ?>
        <?php fetch_file("header.html"); ?>
