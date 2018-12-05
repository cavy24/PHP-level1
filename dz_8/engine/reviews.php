<?php

require_once LIB_DIR . 'db.php';
require_once LIB_DIR . 'functions.php';

function manageReview($values = []) {
	if(!empty($values)) {
		//var_dump($values);
	foreach($values as $key => $val) {
		$valuesNew[$key] = checkValue($val);
	}
	if(isset($values['addreview']) && $values['addreview'] !== null) {
		$sql = "insert into review (`name`, `text`, `created_at`) values ('" . $valuesNew['name'] . "', '" . $valuesNew['review'] . "', '" . $valuesNew['date'] . "');";
		//echo $sql;
	}
	if(isset($values['delreview']) && $values['delreview'] !== null) {
		$sql = "delete from review where id = " . $valuesNew['id'];
	}
	executeQuery($sql, DB_REVIEW);
	}
}
function showReviews() {
	$sql = "select * from review order by `created_at` desc;";
	$res = getAssocResult($sql, DB_REVIEW);
	return $res;
	
}