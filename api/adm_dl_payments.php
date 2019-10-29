<?php

include '../library/init.php';

include DIR_BACKEND_CLASSES . 'admin.class.php';
Admin::init();

App::check_spam();

if (Admin::is_logged_in()) {
    $Customer = Customer::$last ? Customer::$last : new Customer(0);
    echo '<div class="popup_caption">Kunden-Buchungen Herunterladen</div>';
    echo '<select name="month" class="">';
    foreach (range(2019, date('Y')) as $year) {
        foreach (range(01, 12) as $month) {
            if(($year > 2019 || $month > 9) && ($year < date('Y') || $month < date('m'))) {
                echo '<option value="' . $year . '-' . $month . '">';
                echo $year . '-' . $month;
                echo '</option>';
            }
        }
    }
    echo '</select>';
    echo '<div class="popup_close close_topright"></div>';
} else {
    echo 'Non of your business.';
}
die;
