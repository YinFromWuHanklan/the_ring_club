<?php
function fetch_file($filename) {
    foreach(array('', ROOT, ROOT . 'components/', DIR_LIB) as $folder) {
        if(is_file($folder . $filename)) {
            include $folder . $filename;
            return true;
        } else if(is_file($folder . $filename . '.php')) {
            include $folder . $filename . '.php';
            return true;
        } else if(is_file($folder . $filename . '.html')) {
            include $folder . $filename . '.html';
            return true;
        }
    }
    return false;
}
