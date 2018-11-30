<?php

require_once LIB_DIR . 'admin.php';

$vars = [
    'title_main' => 'Кабинет администратора',
    'title_h2_1' => 'Заказы',
    'title_h2_2' => 'Товары',
	'orders' => showOrders(),
    'sumOrders' => addSumArrValues(showOrders()), // в functions.php
	//'ordersUser' => showOrdersUser($idUser)
	];

require_once TPL_DIR . 'admin.php';