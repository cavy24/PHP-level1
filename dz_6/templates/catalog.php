<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="<?=WWW_ROOT?>/css/style.css">
	
    <title><?=$vars['title_main']?></title>
</head>
<body>
<p>Создать страницу каталога товаров:
товары хранятся в БД;
страница формируется автоматически;
по клику на товар открывается карточка товара с подробным описанием.
подумать, как лучше всего хранить изображения товаров.</p>
<h2><?= $vars['title_h2']?></h2>

<div class = "catalog">


<?php foreach ($vars['catalog'] as $product): ?>
<div class = "catalog_product">

    <h3><?= $product['name'] ?></h3>
	<p><img src = <?= IMG_DIR . $product['image_path'] ?> > </p>
    <p><?= $product['describe'] ?> </p>
    <p><?= $product['price'] ?></p>
	<input type = "hidden" name = "id" value = <?= $product['id'] ?> />
	<a href = <?=WWW_ROOT.'/?module=product&id='.$product['id']?> ><input class = "reviews-btn" type = "submit" value = "Подробнее" name = "linkproduct" />
	</a>
</div>
<?php endforeach;?>

</div>
</body>
</html>
