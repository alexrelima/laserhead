$(function() {
	$(".woocommerce-account").addClass("woocommerce");

	$('.woocommerce-MyAccount-navigation-link--customer-logout a').text('Sair');

	$(".product").each(function() {
		$(this).find(".tipo").insertBefore($(this).find(".woocommerce-loop-product__title"));
	});
});