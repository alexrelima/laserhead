$(function() {
	$(".product").each(function() {
		$(this).find(".tipo").insertBefore($(this).find(".woocommerce-loop-product__title"));
	});
});
