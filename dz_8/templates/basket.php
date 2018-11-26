<?php require_once LIB_DIR. 'module/main/header.php'; ?>

<h2><?=$vars['title_h2']?></h2>

<div class = "basket">
<?php foreach ($vars['goods'] as $good): ?>
<div class = "basket_goods">
<form action = "" method = "post">

	<h3><?= $good['name'] ?></h3>
    <p class = "basket_goods_inner"><img src = <?= IMG_DIR . $good['image_path'] ?> > </p>
    <p class = "basket_goods_inner"><?= $good['price'] ?></p>
    <p class = "basket_goods_inner"><?= $good['quantity'] ?></p>
    <p class = "basket_goods_inner"><?= $good['price'] * $good['quantity'] ?> рублей</p>
	<input type = "hidden" name = "id" value = <?= $good['id'] ?> />
	<input type = "hidden" name = "amount" value = <?= $good['quantity'] ?> />
	<input class = "basket_goods_inner reviews-btn" type = "submit" value = "Удалить" name = "delGood" />
	</form>
</div>

<?php endforeach;?>
</div>
<?php require_once LIB_DIR. 'module/main/footer.php'; ?>
