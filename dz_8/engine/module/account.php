<?php

require_once LIB_DIR . 'admin.php';

$vars = [
    'title_main' => 'Личный кабинет',
    'title_h2' => 'Мои заказы',
	'myorders' => showOrdersUser($_SESSION['user_id'])
];

require_once TPL_DIR . 'account.php';