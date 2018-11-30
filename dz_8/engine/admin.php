<?php

require_once LIB_DIR . 'db.php';
require_once LIB_DIR . 'functions.php';

/*При открытии страницы отображаются все заказы*/
function showOrders() {
	$sqlshowOrders = "select orders.created_at, orders.order_number, orders.user_id, orders.amount, orders.status, product.price from orders inner join product on orders.product_id = product.id order by orders.created_at desc;";
	$orders = getAssocResult($sqlshowOrders, DB_MARKET);
	//var_dump($orders);
	if(empty($orders)) echo "Заказов пока нет.";
	return $orders;
}

/*Функция изменения статуса заказа*/
function changeStatusOrder($stat, $orderNumber) {
	$sql = "update orders set status = \"{$stat}\" where order_number = {$orderNumber};";
	//echo "   " . $sql;
	executeQuery($sql, DB_MARKET);
}

/*Выбор заказов по id юзера*/

function showOrdersUser($id) {
	//echo $_SESSION['iduserfororders'] . "   ";
	$sql = "select orders.created_at, orders.order_number, orders.user_id, orders.amount, orders.status, product.price from orders inner join product on orders.product_id = product.id  where orders.user_id = {$id} order by orders.order_number;";
	//echo $sql;
	$ordersUser = getAssocResult($sql, DB_MARKET);
	unset($_SESSION['iduserfororders']);
	return $ordersUser;
}

function showOrder($number) {
	//echo $_SESSION['ordernumber'] . "   ";
	$sql = "select orders.created_at, orders.order_number, orders.user_id, orders.amount, orders.status,  product.id, product.name, product.price from orders inner join product on orders.product_id = product.id  where orders.order_number = {$number};";
	//echo $sql;
	$orders = getRowResult($sql, DB_MARKET);
	//var_dump($orders);
	unset($_SESSION['ordernumber']);
	return $orders;
}