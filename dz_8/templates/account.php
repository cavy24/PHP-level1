<?php require_once LIB_DIR. 'module/main/header.php'; ?>

<h2><?= $vars['title_h2']?></h2>
<p>Уважаемый(ая) <?=$_SESSION['user']?>, вы можете заказать доставку или отменить заказ, если его статус: "Резерв".</p>
<div class = "orders_show">
<h5>Номер заказа&nbsp;&nbsp;&nbsp;Дата заказа&nbsp;&nbsp;&nbsp;Наименование товара&nbsp;&nbsp;&nbsp;Цена&nbsp;&nbsp;&nbsp;Кол-во&nbsp;&nbsp;&nbsp;Сумма заказа&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Статус заказа</h5>
<?php foreach ($vars['myorders'] as $orderUser): ?>
<div>
	<p class = "basket_goods_inner order_number_delivery"><?=$orderUser['order_number']?></p>
	<p class = "basket_goods_inner"><?=$orderUser['created_at']?></p>
	<p class = "basket_goods_inner"><?=$orderUser['name']?></p>
	<p class = "basket_goods_inner"><?=$orderUser['price']?></p>
	<p class = "basket_goods_inner"><?=$orderUser['amount']?></p>
	<p class = "basket_goods_inner orders_show_term"><?=$orderUser['amount'] * $orderUser['price']?></p>
	<p class = "basket_goods_inner order_status_delivery"><?=$orderUser['status']?></p>
	<p class = "basket_goods_inner">
		<button class = "btn_order_delivery" data-id = "<?=$orderUser['order_number'] ?>">Заказать доставку</button><button class = "btn_cancel_order" data-id = "<?=$orderUser['order_number']?>">Отменить заказ</button><button class = "btn_order_pay" data-id = "<?= $product['id'] ?>" data-action = "order_pay">Оплатить заказ</button>
	</p>
	<p class = "orders_delivery">Доставка: 0</p>
</div>
<?php endforeach;?>
<p class = "orders_show_sum"></p>

</div>

<?php require_once LIB_DIR. 'module/main/footer.php'; ?>