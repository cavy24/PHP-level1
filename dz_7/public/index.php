<?php
session_start();
require_once '../config/config.php';

setcookie('name', 'kuka', time() + 3600);
$_SESSION['name'] = $_COOKIE['name'];
//echo '$_COOKIE' . "<br>";
//var_dump($_COOKIE);
echo "<br>" . "<br>";
echo '$_SESSION' . "<br>";
var_dump($_SESSION);
$module = 'index';

if(isset($_GET['module'])) {
    $module = trim(str_replace(['/', '\\', '.'], ['', '', ''], $_GET['module']));
}

require_once LIB_DIR. 'module/'.$module.'.php';