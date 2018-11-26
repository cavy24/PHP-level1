$(function($) {
	$(".btn-buy").on("click", function() {
		let $product = $(this).attr('data-id');
		console.log($product);
		$.ajax({
			type: "POST",
			url: "src/public/?module=put_product",
			data: {id: $product}
		})
		.done(function(msg) {
			alert(msg);
		}).fail(function(msg) {
			alert("Произошла ошибка. \n Попробуйте ещё раз.");
		});
	});
});