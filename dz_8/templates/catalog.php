<?php require_once LIB_DIR. 'module/main/header.php'; ?>
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
<?php require_once LIB_DIR. 'module/main/footer.php'; ?>
