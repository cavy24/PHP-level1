<?php

require_once LIB_DIR . 'catalog.php';

$vars = [
    'title_main' => 'Задание 4',
    'title_h2' => 'Каталог',
   	'catalog' => showProducts()
];

require_once TPL_DIR . 'catalog.php';
