<?php

include '../library/init.php';

include DIR_BACKEND_CLASSES . 'admin.class.php';
Admin::init();

App::check_spam();

if (Admin::is_logged_in()) {
    $form = File::instance(DIR_BACKEND . 'partials/course_form.php')->get_content();
    $Course = Course::$last ? Course::$last : new Course(0);
    echo '<div class="popup_caption">' . ($Course->id > 0 ? 'Bestehenden Kunden bearbeiten' : 'Neuen Kunden erstellen') . '</div>';
    echo $form;
    echo '<div class="popup_close close_topright"></div>';
} else {
    echo 'Non of your business.';
}
die;
