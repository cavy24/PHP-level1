<?php

require_once LIB_DIR . 'bascket.php';
//require_once LIB_DIR . 'product.php';

$vars = [
    'title_main' => 'Корзина покупателя',
    'title_h2' => 'Корзина',
    'goods' => showGoods(),
	'delGood' => delGood(),
	'addGoog' => addGoog()
];
echo "<br>SESSION: ";
var_dump($_SESSION);
require_once TPL_DIR . 'bascket.php';