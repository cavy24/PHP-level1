<?php

require_once LIB_DIR . 'db.php';
require_once LIB_DIR . 'functions.php';

function showProducts() {
	$sql = "select * from product order by `price`";
	$res = getAssocResult($sql, $database = DB_MARKET);
	return $res;
	
}