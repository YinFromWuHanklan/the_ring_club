<?php
if (is_file('library/init.php')) {
    include 'library/init.php';
} else if (is_file('../library/init.php')) {
    include '../library/init.php';
}

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
        <meta name="description" content="<?= $website_description ?>" />

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/style<?= IS_LIVE ? '.min' : '' ?>.css" />

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:300,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:300,700&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/3ee0779e23.js"></script>
        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start':
                            new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-N5DSTZS');</script>
        <!-- End Google Tag Manager -->
    </head>
    <body>
<?php fetch_file("navbar.php"); ?>
<?php fetch_file("header.html"); ?>
