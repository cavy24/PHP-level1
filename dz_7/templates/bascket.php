<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="<?=WWW_ROOT?>/css/style.css">
	<title><?=$vars['title_main']?></title>
</head>
<body>

<h2><?=$vars['title_h2']?></h2>

<div class = "bascket">
<?php foreach ($vars['goods'] as $good): ?>
<div class = "bascket_goods">
<form action = "" method = "post">

	<h3><?= $good['name'] ?></h3>
    <p class = "bascket_goods_inner"><img src = <?= IMG_DIR . $good['image_path'] ?> > </p>
    <p class = "bascket_goods_inner"><?= $good['price'] ?></p>
    <p class = "bascket_goods_inner"><?= $good['quantity'] ?></p>
    <p class = "bascket_goods_inner"><?= $good['price'] * $good['quantity'] ?> рублей</p>
	<input type = "hidden" name = "id" value = <?= $good['id'] ?> />
	<input type = "hidden" name = "amount" value = <?= $good['quantity'] ?> />
	<input class = "bascket_goods_inner reviews-btn" type = "submit" value = "Удалить" name = "delGood" />
	</form>
</div>

<?php endforeach;?>
</div>
</body>
</html>
