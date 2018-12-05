<?php
require_once LIB_DIR . 'admin.php';
//require_once LIB_DIR . 'admin_show_orders_user.php';
require_once LIB_DIR . 'functions.php';

$stat = checkValue($_POST['status']);
$orderNumber = checkValue($_POST['number']);
$newStatus = changeStatusOrder($stat, $orderNumber);

$numOrderDelivery = checkValue($_POST['num_order_deliv']);
$delivery = addCostDelivery($numOrderDelivery);

$numOrderDelete = checkValue($_POST['num_order_del']);
$orderDel = deleteOrder($numOrderDelete);

$numOrderPay = checkValue($_POST['num_order_pay']);
$costDeliv = checkValue($_POST['cost_deliv']);
$orderPay = payOrder($numOrderPay, $costDeliv);

//$idUser = checkValue($_POST['idUser']);
//$ordersUser = showOrdersUser($idUser);
$_SESSION['iduserfororders'] = checkValue($_POST['idUser']);// передаём значение в $_SESSION, чтобы вызвать функцию showOrdersUser из \engine\module\admin_show_orders_user.php с этим значением
$_SESSION['ordernumber'] = checkValue($_POST['orderNumber']);// передаём значение в $_SESSION, чтобы вызвать функцию showOrder из \engine\module\admin_show_orders_number.php с этим значением
echo "OK!";