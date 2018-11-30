<?php require_once LIB_DIR. 'module/main/header.php'; ?>
<h2><?= $vars['title_main']?></h2>
<h3><?= $vars['title_h2_1']?></h3>

<div class = "orders">
<h5>Дата создания&nbsp;&nbsp;&nbsp;Номер заказа&nbsp;&nbsp;&nbsp;Номер юзера&nbsp;&nbsp;&nbsp;Сумма заказа&nbsp;&nbsp;&nbsp;Статус заказа&nbsp;&nbsp;&nbsp;Управление статусом</h5>
<?php foreach ($vars['orders'] as $order): ?>
<div class = "orders_order">

    <p class = "basket_goods_inner"><?= $order['created_at'] ?></p>
    <p class = "number_order basket_goods_inner"><a class = "orders_order_number" href =<?=WWW_ROOT.'/?module=admin_show_orders_number'?>><?= $order['order_number'] ?></a></p>
    <p class = "basket_goods_inner"><a class = "orders_order_user" href =<?=WWW_ROOT.'/?module=admin_show_orders_user'?>><?= $order['user_id'] ?></a></p>
    <p class = "basket_goods_inner"><?= $order['price'] * $order['amount'] ?> рублей</p>
	<p class = "order_status basket_goods_inner"><?= $order['status'] ?></p>
	<select class="status">
		<option value="Резерв">Резерв</option>
		<option value="Оплачен">Оплачен</option>
		<option value="Отправлен">Отправлен</option>
		<option value="Получен">Получен</option>
	</select>
</div>
<?php endforeach;?>
<p class = "basket_goods_inner">Общая сумма заказов: <?=$vars['sumOrders']?> рублей</p>
<p>Вы можете посмотреть все заказы любого юзера, нажав на номер его id (колонка "Номер юзера").</p>
<p>Нажмите на номер заказа, чтобы узнать о нём подробнее (колонка "Номер заказа").</p>

<h3><?= $vars['title_h2_2']?></h3>
<?php require_once LIB_DIR. 'module/main/footer.php';

