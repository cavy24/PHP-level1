<?php

require_once LIB_DIR . 'db.php';
require_once LIB_DIR . 'functions.php';

function manageReview($values = []) {
	foreach($values as $key => $val) {
		$valuesNew[$key] = checkValue($val);
	}
	if($values['addreview'] !== null) {
		//echo $date;
		$sql = "insert into review (`name`, `text`, `created_at`) values ('" . $valuesNew['name'] . "', '" . $valuesNew['review'] . "', '" . $valuesNew['date'] . "');";
		//echo $sql;
		executeQuery($sql, DB_REVIEW);
	}
	if($values['delreview'] !== null) {
		/*echo "<pre>";
		var_dump($valuesNew);
		echo "</pre>";*/
		$sql = "delete from review where id = " . $valuesNew['id'];
		//echo $sql;
		executeQuery($sql, DB_REVIEW);
	}
}
function showReviews() {
	$sql = "select * from review order by `created_at` desc";
	$res = getAssocResult($sql, DB_REVIEW);
	/*echo "<pre>";
	var_dump($res[0]);
	echo "</pre>";*/
	return $res;
	
}