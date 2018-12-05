<?php
require_once LIB_DIR . 'basket.php';
require_once LIB_DIR . 'admin.php';
require_once LIB_DIR . 'functions.php';

$action = checkValue($_POST['action']);
$userId = $_SESSION['user_id'];
$productId = checkValue($_POST['id']);

$nameProduct = checkValue($_POST['name']);
$describeProduct = checkValue($_POST['describe']);
$nameNewProduct = checkValue($_POST['name_new_prod']);
$priceNewProduct = checkValue($_POST['price_new_prod']);

$imgPath = checkValue($_POST['imgpath']);
$idProduct = checkValue($_POST['idproduct']);

echo $action;
if($action !== null || $action !== '' || !empty($action)) {
if($nameProduct === null || $nameProduct === '' || empty($nameProduct)) {
	if($action === 'del_img') {
	$actionDelImg = deleteImage($productId);
	} 
	if($action === 'add_product') {
	$newProduct = addProduct($nameNewProduct, $priceNewProduct);	
	} else {
	$good = changeGoodToBasket($userId, $productId, $action);
	}
} else {
	if($action === 'save_change') {
		$productChange = changeNameAndDescribeProduct($productId, $nameProduct, $describeProduct);
} 
	if($action === 'del_product') {
		$productDel = deleteProduct($productId);
	}
}
}
$newImgPath = changeImgProduct($imgPath, $idProduct);
$newProduct = addNewProduct($nameNewProduct, $priceNewProduct); 
//echo "\nСделано!";