<?php
$menu = [
	'Главная' => '/src/public',
	'Галерея' => '/src/public/?module=images',
	'Каталог' => '/src/public/?module=catalog',
	'Блог' => '/src/public/?module=reviews'
];

$varsHeader = [
	'menu' => $menu
];

require_once TPL_DIR. 'main/header.php';