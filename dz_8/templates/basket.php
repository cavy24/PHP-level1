<?php require_once LIB_DIR. 'module/main/header.php'; ?>

<h2><?=$vars['title_h2']?></h2>

<div class = "basket">
<?php foreach ($vars['goods'] as $good): ?>
<div class = "basket_goods">
<form action = "" method = "post">

	<h3><?= $good['name'] ?></h3>
    <p class = "basket_goods_inner"><img src = <?= IMG_DIR . $good['image_path'] ?> > </p>
    <p class = "basket_goods_inner"><?= $good['price'] ?></p>
    <p class = "basket_goods_inner"><?= $good['amount'] ?></p>
    <p class = "basket_goods_inner"><?= $good['price'] * $good['amount'] ?> рублей</p>
	<input type = "hidden" name = "id" value = <?= $good['id'] ?> />
	<input type = "hidden" name = "amount" value = <?= $good['quantity'] ?> />
	<p class = "basket_goods_inner"><button class = "btn btn-good-plus basket_goods_inner" data-id = <?=$good['id']?> data-action = "up">Добавить</button><p/>
	<p class = "basket_goods_inner"><button class = "btn btn-good-minus basket_goods_inner" data-id = <?=$good['id']?> data-action = "down">Убавить</button><p/>
	<p class = "basket_goods_inner"><button class = "btn btn-good-del basket_goods_inner" data-id = <?=$good['id']?> data-action = "del">Удалить</button><p/>
	</form>
</div>
<?php endforeach;?>
<div class = "basket_sum">
	<p class = "basket_goods_inner">Общая сумма вашего заказа: <?=$vars['sumGoods']?> рублей</p>
</div>
</div>
<?php require_once LIB_DIR. 'module/main/footer.php'; ?>
