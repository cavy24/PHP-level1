<?php

require_once LIB_DIR . 'product.php';

$vars = [
    'title_main' => 'Карточка товара',
    'product' => showProduct()
];

require_once TPL_DIR . 'product.php';