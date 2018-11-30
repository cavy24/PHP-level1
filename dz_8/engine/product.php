<?php

require_once LIB_DIR . 'db.php';
require_once LIB_DIR . 'functions.php';

function showProduct() {
	checkValue($_GET['id']);
	$_SESSION['product_id'] = $_GET['id'];
	$sql = "select * from product where id=" . $_GET['id'];
	$res = getRowResult($sql, DB_MARKET);
	return $res;
}

/*function addProduct($values = []) {
	if(isset($values['addproduct'])) {
		if($values['addproduct'] !== null) {
		//checkValue($values['addproduct']);
		$_SESSION['id_product'] = $values['id']; 
		$_SESSION['quantity'] = 1;
		}
	}
}*/