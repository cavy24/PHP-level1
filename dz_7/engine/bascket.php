<?php

require_once LIB_DIR . 'db.php';
require_once LIB_DIR . 'functions.php';

function showGoods() {
	$sql_goods = "select `id`, `name`, `image_path`, `price`, `quantity` from `product` where `quantity` <> 0";
	$goods = getAssocResult($sql_goods, DB_MARKET);
	
	return $goods;
}
function addGoog() {
	if(isset($_SESSION['id_product']) && isset($_SESSION['quantity'])) {
		if($_SESSION['id_product'] !== null && $_SESSION['id_product'] !== 0 && $_SESSION['id_product'] !== '' && $_SESSION['quantity'] > 0) {
			checkValue($_SESSION['id_product']);
			checkValue($_SESSION['quantity']);
			$sql_amount = "select `id`, `quantity` from `product` where `id` = " . (int)$_SESSION['id_product'];
			$amount = getAssocResult($sql_amount, DB_MARKET);
			if(isset($amount[0]['id'])) {
					if($amount[0]['quantity'] === 0 || $amount[0]['quantity'] === null) {
						$sql = "update product set quantity = 1 where `id` = " . (int)$_SESSION['id_product'];
					} else {
						$sql = "update product set quantity = quantity + 1 where `id` = " . (int)$_SESSION['id_product'];
			}
			}
			executeQuery($sql, DB_MARKET);
		}
	}
	//$_SESSION['id_product'] = '';
}
function delGood() {
	echo "<br><br>";
	echo '$_POST';
	echo "<br>";
	var_dump($_POST);
	echo "<br>";
	if(isset($_POST['delGood'])) {
		checkValue($_POST['delGood']);
		$_SESSION['id_product'] = (int)$_POST['id'];
		$sql_quan = "select `quantity` from `product` where `id` = " . (int)$_SESSION['id_product'];
		echo "<br><br>";
		$quan = getAssocResult($sql_quan, DB_MARKET);
		echo "<br><br>";
		var_dump($quan[0]['quantity']);
		if($quan[0]['quantity'] > 0) {
		$sql = "update product set quantity =(quantity - 1) where id = " . (int)$_SESSION['id_product'];
		echo "<br>" . $sql;
		}
		executeQuery($sql, DB_MARKET);
		
	
}
}