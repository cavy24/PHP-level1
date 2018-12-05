$(function($) {
	/*Функция для кнопок на страницах product и basket для манипуляций с товаром: добавление, удаление и т.д.*/
	/*Удаление картинки товара на странице админа*/
	/*Изменение наименования и описания товара или его удаление*/
	$(".btn").on("click", function() {
		let $idProduct = $(this).data('id');
		let $action = $(this).data('action');
		let $nameProduct = $(this).parent().parent().children(".products_product_name").children(".products_product_name_input").val();
		let $describeProduct = $(this).parent().parent().children(".products_product_describe").children(".products_product_describe_textarea").val();
		console.log($nameProduct);
		console.log($describeProduct);
		
		$.ajax({
			type: "POST",
			url: "?module=action_product",
			data: {id: $idProduct,
			action: $action,
			name: $nameProduct,
			describe: $describeProduct}
		})
		.done(function(msg) {
			alert(msg);
		}).fail(function() {
			alert("Произошла ошибка.\nПопробуйте ещё раз.");
		});
	});
	
	/*Добавление цвета строкам таблицы Заказы на странице админа в зависимости от статуса заказа*/
	let $orderStatus = $(".orders_order .order_status"),
	$color = "";
	$orderStatus.each(function() {
	switch($(this).text()) {	
	case "Резерв": $color = "lightblue"; break;
	case "Оплачен": $color = "lightgreen"; break;
	case "Отправлен": $color = "yellow";  break;
	case "Получен": $color = "lightgrey";
	}
	$(this).parent().css("background", $color);
	});
	
	/*Функция управления статусами заказов на странице админа*/	
	$(".status").on("change",function() {
		let $val = $(this).val();
		let $orderNumber = $(this).parent().children(".number_order").html();
		$(this).parent().children(".order_status ").html($val);
		$.ajax({
			type: "POST",
			url: "?module=action_order",
			data: {status: $val,
			number: $orderNumber}
		})
		.done(function(msg) {
			alert(msg);
		}).fail(function() {
			alert("Произошла ошибка. (\nПопробуйте ещё разок.");
		});
		
	});	
		
	/*Функция вывода информации о заказах по id юзера на странице админа*/	
	$(".orders_order_user").on("click", function() {
		let $idUser = $(this).text();
		//console.log($idUser);
		
		$.ajax({
			type: "POST",
			url: "?module=action_order",
			data: {idUser: $idUser}
		})
		.done(function(msg) {
			alert(msg);
		}).fail(function() {
			alert("Что-то пошло не так.\nПопробуйте ещё раз.");
		});
	});
	
	/*Функция вывода информации о заказах по номеру заказа на странице админа*/	
	$(".orders_order_number").on("click", function() {
		let $orderNumber = $(this).text();
		console.log($orderNumber);
		
		$.ajax({
			type: "POST",
			url: "?module=action_order",
			data: {orderNumber: $orderNumber}
		})
		.done(function(msg) {
			alert(msg);
		}).fail(function() {
			alert("Что-то пошло не так.\nПопробуйте ещё раз.");
		});
	});
	
	/*Подсчёт суммы на странице админа и в личном кабинете - вывод заказов по пользователю*/
	if($(".orders_show_term").length) {
	let $terms = $(".orders_show_term"),
	$placeSum = $(".orders_show_sum"),
	$sum = 0;
	//console.log($terms);
	$terms.each(function() {
		let curr = $(this).html();
		return $sum += +curr;
	});
	$placeSum.html("Общая сумма заказов: " + $sum + " рублей");
};

/*Замена картинки на новую на странице админа: Товары */

//При клике на картинку открывается инпут для ввода названия картинки
$(".products .products_product_img").on("click", function() {
		let $pPathNewImg = $(this).parent().children(".products .products_product_img_new");
		$pPathNewImg.css({"display":"block", "zIndex":99});
		
	});
	
//После ввода названия в инпут, оно и ID продукта передаётся ajax-ом
	$(".products_product_img_new input").on("blur", function() {
		$pathNewImg = $(this).val();
		let $idProduct = $(this).parent().parent().children(".products_product_id").text();
		console.log($pathNewImg, $idProduct);
		$.ajax({
			type: "POST",
			url: "?module=action_product",
			data: {imgpath: $pathNewImg,
			idproduct: $idProduct}
		})
		.done(function(msg) {
			alert(msg);
		}).fail(function() {
			alert("Что-то пошло не так.\nПопробуйте ещё раз.");
		});
	});
	
/*Добавление товара на странице админа*/

//При клике на кнопку открывается инпут для ввода названия и цены
$(".btn_add_product").on("click", function() {
		let $pNewProduct = $(".products_product_new");
		$pNewProduct.css({"display":"block", "zIndex":99});
		
	});
	
//После ввода названия  и цены (not null в БД) в инпут, они передаются ajax-ом
	$(".btn_add_product_new").on("click", function() {
		$nameNewProduct = $(".products_product_new_name").val();
		$priceNewProduct = $(".products_product_new_price").val();
		
		$.ajax({
			type: "POST",
			url: "?module=action_product",
			data: {name_new_prod: $nameNewProduct,
			price_new_prod: $priceNewProduct}
		})
		.done(function(msg) {
			alert(msg);
		}).fail(function() {
			alert("Что-то пошло не так.\nПопробуйте ещё раз.");
		});
	});
	
/*Функция добавления доставки в личном кабинете*/
	$(".btn_order_delivery").on("click", function() {
		let $statusOrder = $(this).parent().parent().children(".order_status_delivery").text();
		console.log($statusOrder);
		if($statusOrder === "Резерв" || $statusOrder === "Оплачен") {
		let $numOrder = $(this).data('id');
		console.log($numOrder);
		$.ajax({
			type: "POST",
			url: "?module=action_order",
			data: {num_order_deliv: $numOrder}
		})
		.done(function() {
			let $pCostDelivery = $(this).parent().parent().children(".orders_delivery");
			$pCostDelivery.html("Доставка: " + 500 + "рублей"); 
		}).fail(function() {
			alert("Произошла ошибка.\nПопробуйте ещё раз.");
		});
		} else {return 0;}
	});

	/*Функция удаления заказа в личном кабинете*/
	$(".btn_cancel_order").on("click", function() {
		let $numOrder = $(this).data('id');
		
		$.ajax({
			type: "POST",
			url: "?module=action_order",
			data: {num_order_del: $numOrder}
		})
		.done(function() {
			alert("Заказ был удалён!");
		}).fail(function() {
			alert("Произошла ошибка.\nПопробуйте ещё раз.");
		});
	});
	
/*Кнопка оплаты в личном кабинете*/
$(".btn_order_pay").on("click", function() {
		let $numOrder = $(this).data('id');
		let $costDeliv = $(this).parent().parent().children(".orders_delivery").text();
		$.ajax({
			type: "POST",
			url: "?module=action_order",
			data: {num_order_pay: $numOrder,
			cost_deliv: $costDeliv}
		})
		.done(function() {
			alert("Заказ был оплачен.");
		}).fail(function() {
			alert("Произошла ошибка.\nПопробуйте ещё раз.");
		});
	});

});