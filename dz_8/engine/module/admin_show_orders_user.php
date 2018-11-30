<?php

require_once LIB_DIR . 'admin.php';

$vars = [
    'title_main' => 'Кабинет админа - заказы юзера',
    'ordersUser' => showOrdersUser($_SESSION['iduserfororders']),
];

require_once TPL_DIR . 'admin_show_orders_user.php';