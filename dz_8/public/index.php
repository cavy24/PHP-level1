<?php
setcookie('name', 'kuka', time() + 3600);
session_start();
require_once '../config/config.php';
require_once LIB_DIR . 'auth.php';

$moduleAdmin = ['admin', 'admin_show_orders_number', 'admin_show_orders_user'];
$module = 'index';
if(isset($_GET['module'])) {
    $module = trim(str_replace(['/', '\\', '.'], ['', '', ''], $_GET['module']));
}
if($module !== 'login' && !alreadyLoggedIn()){
    header('Location: /src/public/?module=login');
}
if(\in_array($module, $moduleAdmin) && !loggedInAdmin()){
	header("Location: /src/public/");
}

require_once LIB_DIR. 'module/'.$module.'.php';