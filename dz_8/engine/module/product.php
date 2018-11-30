<?php

require_once LIB_DIR . 'product.php';

$vars = [
    'title_main' => 'Карточка товара',
    'product' => showProduct(),
	//'good' => addProduct($_POST)
];

require_once TPL_DIR . 'product.php';