<?php

require_once LIB_DIR . 'basket.php';

$vars = [
    'title_main' => 'Корзина покупателя',
    'title_h2' => 'Корзина',
    'goods' => showGoods()
];
echo "<br>SESSION: ";
var_dump($_SESSION);
require_once TPL_DIR . 'basket.php';