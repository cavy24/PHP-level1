<?php

require_once '../config/config.php';


$module = 'index';

if(isset($_GET['module'])) {
    $module = trim(str_replace(['/', '\\', '.'], ['', '', ''], $_GET['module']));
}

require_once LIB_DIR. 'module/'.$module.'.php';