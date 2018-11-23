<?php
setcookie('name', 'kuka', time() + 3600);
session_start();
require_once '../config/config.php';
require_once LIB_DIR . 'auth.php';
/*echo '$_COOKIE' . "<br>";
var_dump($_COOKIE);
echo "<br>" . "<br>";
echo '$_SESSION' . "<br>";
var_dump($_SESSION);*/
$module = 'index';
if(isset($_GET['module'])) {
    $module = trim(str_replace(['/', '\\', '.'], ['', '', ''], $_GET['module']));
}
if($module !== 'login' && !alreadyLoggedIn()){
    header('Location: /src/public/?module=login');
}
require_once LIB_DIR. 'module/'.$module.'.php';