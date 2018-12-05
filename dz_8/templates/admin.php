<?php require_once LIB_DIR. 'module/main/header.php'; ?>
<h2><?= $vars['title_main']?></h2>
<h3><?= $vars['title_h2_1']?></h3>

<p>Вы можете посмотреть все заказы любого юзера, нажав на номер его id (колонка "Номер юзера").</p>
<p>Нажмите на номер заказа, чтобы узнать о нём подробнее (колонка "Номер заказа").</p>
<div class = "orders">
<h5>Дата создания&nbsp;&nbsp;&nbsp;Номер заказа&nbsp;&nbsp;&nbsp;Номер юзера&nbsp;&nbsp;&nbsp;Сумма заказа&nbsp;&nbsp;&nbsp;Статус заказа&nbsp;&nbsp;&nbsp;Управление статусом</h5>
<?php if(empty($vars['orders'])) print("Заказов пока нет");
else {foreach ($vars['orders'] as $order): ?>
<div class = "orders_order">

    <p class = "basket_goods_inner"><?= $order['created_at'] ?></p>
    <p class = "number_order basket_goods_inner">
		<a class = "orders_order_number" href =<?=WWW_ROOT.'/?module=admin_show_orders_number'?>><?= $order['order_number'] ?></a>
	</p>
    <p class = "basket_goods_inner">
		<a class = "orders_order_user" href =<?=WWW_ROOT.'/?module=admin_show_orders_user'?>><?= $order['user_id'] ?></a>
	</p>
    <p class = "basket_goods_inner"><?= $order['price'] * $order['amount'] ?> рублей</p>
	<p class = "order_status basket_goods_inner"><?= $order['status'] ?></p>
	<select class="status">
		<option value="Резерв">Резерв</option>
		<option value="Оплачен">Оплачен</option>
		<option value="Отправлен">Отправлен</option>
		<option value="Получен">Получен</option>
	</select>
</div>
<?php endforeach; } ?>
<p class = "basket_goods_inner">Общая сумма заказов: <?=$vars['sumOrders']?> рублей</p>

<h3><?= $vars['title_h2_2']?></h3>
<p>Чтобы заменить картинку на новую - кликните по картинке.</p>
<p>Чтобы изменить наименование или описание продукта - просто исправьте текст в соответствующих полях.</p>
<p>Чтобы добавить продукт - нажмите кнопку "Add product", чтобы удалить продукт - кнопку "Delete product".</p>
<div class = "products">
<h5>Фото&nbsp;&nbsp;&nbsp;ID товара&nbsp;&nbsp;&nbsp;Наименование&nbsp;&nbsp;&nbsp;Описание&nbsp;&nbsp;&nbsp;Цена&nbsp;&nbsp;&nbsp;Кол-во на складе</h5>

<button class = "btn_add_product">Add product</button>
<p class = "products_product_new"  style = "display: none"><input class = "products_product_new_name" type = "text" placeholder = "Enter the name" value = ""><input class = "products_product_new_price" type = "text" placeholder = "Enter the price" value = ""><button class = "btn_add_product_new">Add</button></p>

<?php foreach ($vars['products'] as $product): ?>
<div class = "products_product">
	<p class = "basket_goods_inner products_product_img"><img src = <?= IMG_DIR . $product['image_path'] ?>><p class = "products_product_img_new"  style = "display: none">Введите название картинки<input type = "text" placeholder = "Например, molotok_new.jpg" value = ""></p><button class = "btn" data-id = "<?= $product['id'] ?>" data-action = "del_img">Del img</button></p>
    <p class = "basket_goods_inner products_product_id"><?= $product['id']?></p>
    <p class = "basket_goods_inner products_product_name"><input class = "products_product_name_input" type = "text" value = "<?= $product['name']?>"></p>
    <p class = "basket_goods_inner products_product_describe"><textarea rows="6" cols="22" class = "products_product_describe_textarea"><?= $product['describe']?></textarea></p>
    <p class = "basket_goods_inner"><?= $product['price'] ?></p>
	<p class = "basket_goods_inner"><?= $product['quantity'] ?></p>
	<p class = "basket_goods_inner"><button class = "btn btn_save_change" data-id = "<?= $product['id'] ?>" data-action = "save_change">Save change</button><button class = "btn" data-id = "<?= $product['id'] ?>" data-action = "del_product">Delete product</button></p>
	
</div>
<?php endforeach;?>

<?php require_once LIB_DIR. 'module/main/footer.php';

