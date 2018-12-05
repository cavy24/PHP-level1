<?php

require_once LIB_DIR . 'db.php';
require_once LIB_DIR . 'functions.php';

/*При открытии страницы отображаются все заказы*/
function showOrders() {
	$sqlshowOrders = "select orders.created_at, orders.order_number, orders.user_id, orders.amount, orders.status, product.price from orders inner join product on orders.product_id = product.id order by orders.created_at desc;";
	$orders = getAssocResult($sqlshowOrders, DB_MARKET);
	//if(empty($orders)) echo "Заказов пока нет.";
	return $orders;
}

/*Функция изменения статуса заказа*/
function changeStatusOrder($stat, $orderNumber) {
	$sql = "update orders set status = \"{$stat}\" where order_number = {$orderNumber};";
	executeQuery($sql, DB_MARKET);
}

/*Выбор заказов по id юзера*/
function showOrdersUser($id) {
	//echo $id . "   ";
	$sql = "select orders.created_at, orders.order_number, orders.user_id, orders.amount, orders.status, product.name, product.price from orders inner join product on orders.product_id = product.id  where orders.user_id = {$id} order by orders.order_number;";
	//echo "   " . $sql;
	$ordersUser = getAssocResult($sql, DB_MARKET);
	if(isset($_SESSION['iduserfororders'])) unset($_SESSION['iduserfororders']);
	return $ordersUser;
}

/*Просмотр конкретного заказа*/
function showOrder($number) {
	$sql = "select orders.created_at, orders.order_number, orders.user_id, orders.amount, orders.status,  product.id, product.name, product.price from orders inner join product on orders.product_id = product.id  where orders.order_number = {$number};";
	$orders = getRowResult($sql, DB_MARKET);
	if(isset($_SESSION['ordernumber'])) unset($_SESSION['ordernumber']);
	return $orders;
}

/*При открытии страницы отображаются все продукты*/
function showProducts() {
	$sql = "select * from product";
	$products = getAssocResult($sql, DB_MARKET);
	return $products;
}

/*Удаление картинки продукта*/
function deleteImage($productId) {
	$sql = "update product set image_path='' where id={$productId}";
	executeQuery($sql, DB_MARKET);
}

/*Изменение картинки продукта*/
function changeImgProduct($path, $id) {
	$sqlPath = "select image_path from product";
	$pathes = scandir(IMG_DIR);
	if(in_array($path, $pathes)) {
	//if(in_array($path, array_column($pathes, 'image_path'))) {
		$sql = "update product set image_path=\"{$path}\" where id={$id}";
		echo $sql;
		executeQuery($sql, DB_MARKET);
	}/* else {
		echo "Название картинки введено неверно!";
	}*/
}

/*Изменение наименования и описания продукта на странице админа*/
function changeNameAndDescribeProduct($productId, $nameProduct, $describeProduct) {
	$sql = "update product set name='{$nameProduct}', `describe`='{$describeProduct}' where id={$productId};";
	//echo $sql;
	executeQuery($sql, DB_MARKET);
}

/*Удаление продукта на странице админа*/
function deleteProduct($productId) {
	$sql = "delete from product where id={$productId};";
	//echo $sql;
	executeQuery($sql, DB_MARKET);
}

/*Добавление нового продукта на странице админа*/

function addNewProduct($name, $price) {
$sql = "insert into product (`name`, `price`) values ('{$name}', '{$price}')";
executeQuery($sql, DB_MARKET);
	
}

/*Добавление стоимости доставки к заказу*/
function addCostDelivery($numOrder) {
	//Проверяем, заказана ли уже доставка к этому заказу
	$sqlChangeOrder = "select order_number from delivery;";
	$numberOrders = getAssocResult($sqlChangeOrder, DB_MARKET);
	//Если да:
	if(in_array($numOrder, array_column($numberOrders, 'order_number'))) {
		//echo $numOrder;
		/*$sqlCost = "select cost from delivery where order_number={$numOrder}";
		$costDelivery = getRowResult($sqlCost, DB_MARKET); */
		return true;
	} else { //если нет
		$sqlCost = "insert into delivery (`order_number`, `cost`) values ('{$numOrder}', 500)";
		$costDelivery = executeQuery($sqlCost, DB_MARKET);
		//return false;
	}
	//var_dump($costDelivery);
	//return $costDelivery;	
}

/*Удаление заказа*/
function deleteOrder($num) {
	$sqlOrder = "delete from orders where order_number={$num};";
	$sqlDeliv = "delete from delivery where order_number={$num};";
	executeQuery($sqlOrder);
	executeQuery($sqlDeliv);
}

/*Оплта заказа*/
function payOrder($numOrderPay, $costDeliv) {
	$sqlOrder = "update orders set status='Оплачен' where order_number={$numOrderPay};";
	$sqlDeliv = "update delivery set cost_status='Оплачен' where order_number={$numOrderPay};";
	executeQuery($sqlOrder, DB_MARKET);
	executeQuery($sqlDeliv, DB_MARKET);
	
	header('Location: /src/public/?module=payment');
}