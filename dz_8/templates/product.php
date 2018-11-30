<?php require_once LIB_DIR. 'module/main/header.php'; ?>
<h2><?=$vars['product']['name']?></h2>

<div class = "product">
<div class = "catalog_product">
    <p><img src = <?= IMG_DIR . $vars['product']['image_path'] ?> > </p>
    <p><?= $vars['product']['describe'] ?> </p>
    <p><?= $vars['product']['price'] ?> руб.</p>
	<button class = "btn btn-buy" data-id = <?=$vars['product']['id']?> data-action = "put">В корзину</button>
</div>
</div>
<?php require_once LIB_DIR. 'module/main/footer.php';
echo '$_SESSION'; 
var_dump($_SESSION);
echo "<br>";
echo '$_POST';
var_dump($_POST);
?>

