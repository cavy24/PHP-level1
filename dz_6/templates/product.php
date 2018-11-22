<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="<?=WWW_ROOT?>/css/style.css">
	<title><?=$vars['title_main']?></title>
</head>
<body>

<h2><?=$vars['product'][0]['name']?></h2>

<div class = "product">

<form action = "" method = "post">
<div class = "catalog_product">
    <p><img src = <?= IMG_DIR . $vars['product'][0]['image_path'] ?> > </p>
    <p><?= $vars['product'][0]['describe'] ?> </p>
    <p><?= $vars['product'][0]['price'] ?></p>
	<input type = "hidden" name = "id" value = <?= $vars['product'][0]['id'] ?> />
	<input class = "reviews-btn" type = "submit" value = "В корзину" name = "addproduct" />
	<input class = "reviews-btn" type = "submit" value = "Удалить" name = "delproduct" />
</div>
</form>
</div>
</body>
</html>
