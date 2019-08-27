<?php

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'init.php';

include DIR_BACKEND_CLASSES . 'admin.class.php';

Admin::init();

if(!is_string(Admin::$path) || empty(Admin::$path)) {
    Utilities::redirect('admin/login');
}

