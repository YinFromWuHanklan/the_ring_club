<?php

include '../library/init.php';

include DIR_BACKEND_CLASSES . 'admin.class.php';
Admin::init();

App::check_spam();

if (Admin::is_logged_in()) {
    $content = 'ID,Datum,Name,E-Mail,Tel.,Typ,Kurs';
    foreach (Xjsondb::select('trials') as $trial) {
        $row = array();
        array_push($row, '"' . $trial['id'] . '"');
        array_push($row, '"' . date('H:i d.m.Y', $trial['insert_date']) . '"');
        array_push($row, '"' . $trial['name'] . '"');
        array_push($row, '"' . $trial['email'] . '"');
        array_push($row, '"' . $trial['phone'] . '"');
        array_push($row, '"' . $trial['type'] . '"');
        array_push($row, '"' . $trial['course'] . '"');
        $content .= "\n" . implode(',', $row);
    }
    header('Content-Disposition: attachment; filename="theringclub_trials_' . date('Y-m-d') . '.csv"');
    header("Content-Length: " . strlen($content));
    header("Content-Type: application/octet-stream;");
    echo $content;
} else {
    echo 'Non of your business.';
}
