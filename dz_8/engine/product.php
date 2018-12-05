<?php

require_once LIB_DIR . 'db.php';
require_once LIB_DIR . 'functions.php';

function showProduct() {
	checkValue($_GET['id']);
	$_SESSION['product_id'] = $_GET['id'];
	$sql = "select * from product where id=" . (int)$_GET['id'];
	$res = getRowResult($sql, DB_MARKET);
	return $res;
}