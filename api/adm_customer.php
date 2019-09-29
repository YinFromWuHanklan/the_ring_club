<?php

include '../library/init.php';

include DIR_BACKEND_CLASSES . 'admin.class.php';
Admin::init();

App::check_spam();

if (Admin::is_logged_in()) {
    $form = File::instance(DIR_BACKEND . 'partials/customer_form.php')->get_content();
    $Customer = Customer::$last ? Customer::$last : new Customer(0);
    echo '<div class="popup_caption">' . ($Customer->id > 0 ? 'Bestehenden Kunden bearbeiten' : 'Neuen Kunden erstellen') . '</div>';
    echo $form;
    echo '<div class="popup_close close_topright"></div>';
} else {
    echo 'Non of your business.';
}
die;
