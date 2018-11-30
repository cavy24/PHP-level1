<?php

require_once LIB_DIR . 'admin.php';

$vars = [
    'title_main' => 'Кабинет админа - просмотр заказа',
    'orders' => showOrder($_SESSION['ordernumber'])
	];

require_once TPL_DIR . 'admin_show_orders_number.php';