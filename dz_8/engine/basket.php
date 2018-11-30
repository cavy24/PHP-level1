<?php

require_once LIB_DIR . 'db.php';
require_once LIB_DIR . 'functions.php';

function showGoods() {
	$sqlShowGoods = "select product.id, product.name, product.image_path, product.price, `orders`.amount from product inner join `orders` on product.id = `orders`.product_id where `orders`.user_id = {$_SESSION['user_id']} && `orders`.amount <> 0";
	$goods = getAssocResult($sqlShowGoods, DB_MARKET);
	//var_dump($goods);
	//if(empty($goods)) return;
	return $goods;
}

function selectRowParamToMarket($table,$param, $conditions) {
	$sql = "select {$param} from {$table} where {$conditions};";
	$value = getRowResult($sql, DB_MARKET);
	return $value;
}
/*Добавление товара в корзину на странице product&id=[number]*/
function addGoodToBasket($userId, $productId) {
	//Проверяем, есть ли товар на складе
	$sqlParamProduct = "select name, quantity from `product` where id = {$productId};";
	$paramProduct = getRowResult($sqlParamProduct, DB_MARKET);
	if(isset($paramProduct['quantity']) && $paramProduct['quantity'] > 0) {
		//Проверяем, есть ли такой товар у этого покупателя в корзине
		$amount = selectRowParamToMarket('orders', 'amount', "user_id = {$userId} and product_id = {$productId}");// ф-ция selectRowParamToMarket как частный случай оставлена в basket.php
		//echo "<br>" . 'amount' . "<br>";
		//var_dump($amount);
		if($amount['amount'] > 0) {
			$sqlGood = "update `orders` set amount = amount + 1, created_at = '" . date("Y-m-d H:i:s") . " ' where user_id = {$userId} and product_id = {$productId};";	
		} else {
			//Вычисляем номер заказа
			$orderNumberNew = (addMaxValueFromDB('order_number', 'orders', DB_MARKET)) + 1;// ф-ция addMaxValueFromDB - в db.php
			$sqlGood = "insert into `orders` (`user_id`, `product_id`, `amount`, `order_number`, `created_at`) values ({$userId},  {$productId}, 1, {$orderNumberNew}, '" . date("Y-m-d H:i:s") . "');";
	}
	$good = executeQuery($sqlGood, DB_MARKET);
	//Если запрос в БД не прошёл
	if(!$good) {
		echo "Попытка не удалась. Попробуйте ещё раз!";
	} else {
		//В случае удачи уменьшаем кол-во товара на складе на 1
		echo "Товар в корзине";
		$sqlSubstrQuantity = "update product set quantity = quantity - 1 where id = {$productId};";
		executeQuery($sqlSubstrQuantity, DB_MARKET);
	}
	} else echo 'К сожалению, товар "' . $paramProduct['name'] .  '" закончился';
	return $good;
}

function changeGoodToBasket($userId, $productId, $action) {
	//echo "<br>" . $action . "<br>";
	if($action === 'up') {
		$sql = "update `orders` set amount = amount + 1, created_at = '" . date("Y-m-d H:i:s") . " ' where user_id = {$userId} and product_id = {$productId};";
		$sqlChange = "update product set quantity = quantity - 1 where id = {$productId};";
	}
	if($action === 'down') {
		$sql = "update `orders` set amount = amount - 1, created_at = '" . date("Y-m-d H:i:s") . " ' where user_id = {$userId} and product_id = {$productId};";
		$sqlChange = "update product set quantity = quantity + 1 where id = {$productId};";
	}
	if($action === 'del') {
		$sql = "delete from`orders` where user_id = {$userId} and product_id = {$productId};";
		$amount = selectRowParamToMarket('orders', 'amount', "user_id = {$userId} and product_id = {$productId}");
		$amountDel = $amount['amount'];
		//var_dump($amountDel);
		$sqlChange = "update product set quantity = quantity + {$amountDel} where id = {$productId};";
	}
	//echo "<br>" . $sqlChange . "<br>";
	executeQuery($sql, DB_MARKET);
	executeQuery($sqlChange, DB_MARKET);
	//showGoods();
}

	/*if(isset($_POST['delGood'])) {
		//checkValue($_POST['delGood']);
		//$_SESSION['id_product'] = (int)$_POST['id'];
		$sql_quan = "select `quantity` from `product` where `id` = " . (int)$_POST['id'];
		$quan = getAssocResult($sql_quan, DB_MARKET);
		echo "<br><br>quan<br>";
		var_dump($quan[0]['quantity']);
		if((int)$quan[0]['quantity'] > 0) {
		$sql = "update product set quantity = (quantity - 1) where id = " . (int)$_POST['id'];
		executeQuery($sql, DB_MARKET);
		echo "<br>sql: " . $sql;
		}	
	}*/
	
/*	if(isset($_SESSION['id_product']) && isset($_SESSION['quantity'])) {
		if($_SESSION['id_product'] !== null && $_SESSION['id_product'] !== 0 && $_SESSION['id_product'] !== '' && $_SESSION['quantity'] > 0) {
			checkValue($_SESSION['id_product']);
			$id = (int)$_SESSION['id_product'];
			$_SESSION['id_product'] = '';
			//checkValue($_SESSION['quantity']);
			$sql_amount = "select `id`, `quantity` from `product` where `id` = " . $id;
			$amount = getAssocResult($sql_amount, DB_MARKET);
			if(isset($amount[0]['id'])) {
					if($amount[0]['quantity'] === 0 || $amount[0]['quantity'] === null) {
						$sql = "update product set quantity = 1 where `id` = " . $id;
					} else {
						$sql = "update product set quantity = quantity + 1 where `id` = " . $id;
			}
			}
			executeQuery($sql, DB_MARKET);
		}
	}*/
	