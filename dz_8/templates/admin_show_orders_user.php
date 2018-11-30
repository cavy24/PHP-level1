<?php require_once LIB_DIR. 'module/main/header.php'; ?>
<h2><?= $vars['title_main']?></h2>
<h4>Заказы юзера: <?=$vars['ordersUser'][0]['user_id']?></h4>

<div class = "orders_show">
<h5>Номер заказа&nbsp;&nbsp;&nbsp;Дата заказа&nbsp;&nbsp;&nbsp;Сумма заказа&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Статус заказа</h5>
<?php foreach ($vars['ordersUser'] as $orderUser): ?>
<div>
	<p class = "basket_goods_inner"><?=$orderUser['order_number']?></p>
	<p class = "basket_goods_inner"><?=$orderUser['created_at']?></p>
	<p class = "basket_goods_inner orders_show_term"><?=$orderUser['amount'] * $orderUser['price']?></p>
	<p class = "basket_goods_inner"><?=$orderUser['status']?></p>
</div>
<?php endforeach;?>
<p class = "basket_goods_inner orders_show_sum"></p>
</div>
<a href = <?=WWW_ROOT.'/?module=admin'?>><button>Вернуться в кабинет</button></a>
<?php require_once LIB_DIR. 'module/main/footer.php';?>

