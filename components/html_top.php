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
        <?php fetch_file('head.html') ?>
    </head>
    <body>
        <?php fetch_file("navbar.php"); ?>
        <?php fetch_file("header.html"); ?>
