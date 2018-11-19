<?php

require_once LIB_DIR . 'db.php';
require_once LIB_DIR . 'functions.php';

function updateBase($values = []) {
	
	if($values['addreview'] !== null) {
		foreach($values as $key => $val) {
		$valuesNew[$key] = checkValue($val);
	}
		//echo $date;
		$sql = "insert into review (`name`, `text`, `created_at`) values ('" . $valuesNew['name'] . "', '" . $valuesNew['review'] . "', '" . $valuesNew['date'] . "');";
		//echo $sql;
		executeQuery($sql, $database = DB_REVIEW);
	}
	if($values['delreview'] !== null) {
		echo "<pre>";
		var_dump($values);
		echo "</pre>";
		//echo $values['id'];
		$sql = "delete from review where id = " . $values['id'];
		//echo $sql;
		executeQuery($sql, $database = DB_REVIEW);
	}
}
function showReviews() {
	$sql = "select * from review order by `created_at` desc";
	$res = getAssocResult($sql, $database = DB_REVIEW);
	/*echo "<pre>";
	var_dump($res[0]);
	echo "</pre>";*/
	return $res;
	
}