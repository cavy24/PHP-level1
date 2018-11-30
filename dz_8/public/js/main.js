$(function($) {
	/*Функция для кнопок на страницах product и basket для манипуляций с товаром: добавление, удаление и т.д.*/
	$(".btn").on("click", function() {
		let $idProduct = $(this).data('id');
		let $action = $(this).data('action');
		console.log($idProduct);
		console.log($action);
		
		$.ajax({
			type: "POST",
			url: "?module=action_product",
			data: {id: $idProduct,
			action: $action}
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
	
	/*Подсчёт суммы на странице админа - вывод заказов пользователя*/	
	let $terms = $(".orders_show_term"),
	$placeSum = $(".orders_show_sum"),
	$sum = 0;
	//console.log($terms);
	$terms.each(function() {
		let curr = $(this).html();
		return $sum += +curr;
	});
	$placeSum.html("Общая сумма: " + $sum + " рублей");
});