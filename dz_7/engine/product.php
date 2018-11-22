<?php

require_once LIB_DIR . 'db.php';
require_once LIB_DIR . 'functions.php';

function showProduct() {
	checkValue($_GET['id']);
	$sql = "select * from product where id=" . $_GET['id'];
	//echo $sql; 
	$res = getAssocResult($sql, DB_MARKET);
	return $res;
}

function addProduct($values = []) {
	if(isset($values['addproduct'])) {
		if($values['addproduct'] !== null) {
		checkValue($values['addproduct']);
		$_SESSION['id_product'] = $values['id']; 
		$_SESSION['quantity'] = 1;
		}
	}
}