<?php

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'init.php';

include DIR_BACKEND_CLASSES . 'admin.class.php';

Admin::init();

if(!is_string(Admin::$path) || empty(Admin::$path)) {
    Utilities::redirect('admin/login');
}
if(strstr($_SERVER['REQUEST_URI'], '/admin/admin/')) {
    Utilities::redirect('../' . Admin::$path);
}
if(Admin::$path != 'login' && !Admin::is_logged_in()) {
    Utilities::redirect('login');
}


$admin_content = Admin::$page_File->get_content();
$html = File::instance(DIR_BACKEND . 'html_base.php')->get_content();
$html = str_replace('###CONTENT###', $admin_content, $html);

echo $html;
