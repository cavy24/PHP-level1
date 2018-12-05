<?php

require_once LIB_DIR . 'db.php';
require_once LIB_DIR . 'functions.php';

/*При открытии страницы отображаются все заказы*/
function showGoods() {
	$sqlShowGoods = "select product.id, product.name, product.image_path, product.price, `orders`.amount from product inner join `orders` on product.id = `orders`.product_id where `orders`.user_id = {$_SESSION['user_id']} && `orders`.amount <> 0";
	$goods = getAssocResult($sqlShowGoods, DB_MARKET);
	return $goods;
}

/*Получение одного параметра из БД*/
function selectRowParamToMarket($table,$param, $conditions) {
	$sql = "select {$param} from {$table} where {$conditions};";
	$value = getRowResult($sql, DB_MARKET);
	return $value;
}

function changeGoodToBasket($userId, $productId, $action) {
	if($action === 'up' || $action === 'put') { //добавить кол-во товара или положить товар в корзину
		//Проверка кол-ва товара на складе
		$quantity = selectRowParamToMarket('product', 'quantity', "id = {$productId}");
		if(isset($quantity['quantity']) && $quantity['quantity'] > 0) {
			//Проверяем, есть ли такой товар у этого покупателя в корзине
			$amount = selectRowParamToMarket('orders', 'amount', "user_id = {$userId} and product_id = {$productId}");// ф-ция selectRowParamToMarket как частный случай оставлена в basket.php	
			if($amount['amount'] === null || $amount['amount'] === '') {
			//Вычисляем номер заказа
			$orderNumberNew = (getMaxValueFromDB('order_number', 'orders', DB_MARKET)) + 1; // ф-ция getMaxValueFromDB - в db.php
			$sqlGood = "insert into `orders` (`user_id`, `product_id`, `amount`, `order_number`, `created_at`, `status`) values ({$userId},  {$productId}, 1, {$orderNumberNew}, '" . date("Y-m-d H:i:s") . "', 'Резерв');";
			} else {$sqlGood = "update `orders` set amount = amount + 1, created_at = '" . date("Y-m-d H:i:s") . " ' where user_id = {$userId} and product_id = {$productId};";
		}
		$sqlProduct = "update product set quantity = quantity - 1 where id = {$productId};";
		} else {
			return 0;
		}
	}
	if($action === 'down') { //убавить кол-во товара
		$sqlGood = "update `orders` set amount = amount - 1, created_at = '" . date("Y-m-d H:i:s") . " ' where user_id = {$userId} and product_id = {$productId};";
		$sqlProduct = "update product set quantity = quantity + 1 where id = {$productId};";
		}
	if($action === 'del') {  //удалить товар
		$sqlGood = "delete from `orders` where user_id = {$userId} and product_id = {$productId};";
		$amount = selectRowParamToMarket('orders', 'amount', "user_id = {$userId} and product_id = {$productId}");
		$amountDel = $amount['amount'];
		$sqlProduct = "update product set quantity = quantity + {$amountDel} where id = {$productId};";
	}
	
	if(($sqlGood !== '' || $sqlGood !== null) && ($sqlProduct !== '' || $sqlProduct !== null)) {
		//echo $sqlGood . "<br>" . $sqlProduct;
		$goodsChange = executeQuery($sqlGood, DB_MARKET);
		$productChange = executeQuery($sqlProduct, DB_MARKET);
	}
	if(!$goodsChange && !$productChange) {
		echo "Попытка не удалась. Попробуйте ещё раз!";
	}
	
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
	