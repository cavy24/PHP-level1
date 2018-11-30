<?php
require_once LIB_DIR . 'basket.php';
require_once LIB_DIR . 'functions.php';

$userId = $_SESSION['user_id'];
$productId = checkValue($_POST['id']);
$action = checkValue($_POST['action']);
if($action === 'put') {
	$good = addGoodToBasket($userId, $productId);
} else {
	$good = changeGoodToBasket($userId, $productId, $action);
}
echo "Сделано!";