<?php require_once LIB_DIR. 'module/main/header.php'; ?>
<h2><?= $vars['title_main']?></h2>
<h4>Заказ №: <?=$vars['orders']['order_number']?></h4>

<div class = "order_show">
<h5>Дата создания&nbsp;&nbsp;&nbsp;ID товара&nbsp;&nbsp;&nbsp;Наименование товара&nbsp;&nbsp;&nbsp;Цена товара&nbsp;&nbsp;&nbsp;Кол-во товара&nbsp;&nbsp;&nbsp;Сумма заказа&nbsp;&nbsp;&nbsp;Id юзера&nbsp;&nbsp;&nbsp;Статус заказа</h5>
	<p class = "basket_goods_inner"><?=$vars['orders']['created_at']?></p>
	<p class = "basket_goods_inner"><?=$vars['orders']['id']?></p>
	<p class = "basket_goods_inner"><?=$vars['orders']['name']?></p>
	<p class = "basket_goods_inner"><?=$vars['orders']['price']?></p>
	<p class = "basket_goods_inner"><?=$vars['orders']['amount']?></p>
	<p class = "basket_goods_inner"><?=$vars['orders']['amount'] * $vars['orders']['price']?></p>
	<p class = "basket_goods_inner"><?=$vars['orders']['user_id']?></p>
	<p class = "basket_goods_inner"><?=$vars['orders']['status']?></p>

</div>
<a href = <?=WWW_ROOT.'/?module=admin'?>><button>Вернуться в кабинет</button></a>
<?php require_once LIB_DIR. 'module/main/footer.php';?>

