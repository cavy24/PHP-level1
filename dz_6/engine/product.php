<?php

require_once LIB_DIR . 'db.php';
require_once LIB_DIR . 'functions.php';

function showProduct() {
	$sql = "select * from product where id=" . $_GET['id'];
	//echo $sql;
	$res = getAssocResult($sql, $database = DB_MARKET);
	/*echo "<pre>";
	var_dump($res);
	echo "</pre>";*/
	return $res;
}