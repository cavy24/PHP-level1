<?php
require_once LIB_DIR . 'admin.php';
require_once LIB_DIR . 'functions.php';

$stat = checkValue($_POST['status']);
$orderNumber = checkValue($_POST['number']);
$newStatus = changeStatusOrder($stat, $orderNumber);

$_SESSION['iduserfororders'] = checkValue($_POST['idUser']);// передаём значение в $_SESSION, чтобы вызвать функцию showOrdersUser из \engine\module\admin_show_orders_user.php с этим значением
$_SESSION['ordernumber'] = checkValue($_POST['orderNumber']);// передаём значение в $_SESSION, чтобы вызвать функцию showOrder из \engine\module\admin_show_orders_number.php с этим значением
echo "OK!";