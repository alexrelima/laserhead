$(function() {
	$(".woocommerce-cart").addClass("woocommerce");



});

$(window).load(function() {
	$('.wp-block-woocommerce-cart-order-summary-coupon-form-block button:contains("Add a coupon")').text("Cupom de desconto");
	$('.wp-block-woocommerce-cart-express-payment-block').appendTo(".wp-block-woocommerce-cart-order-summary-block");
	$('.wc-block-cart__submit.wp-block-woocommerce-proceed-to-checkout-block').appendTo(".wp-block-woocommerce-cart-order-summary-block");
	$(".wp-block-woocommerce-cart-order-summary-block" ).append( "<a href='https://laserhead.com.br/loja/' class='cmp'>Comprar mais produtos</p>" );
	

	$(".wc-block-components-panel__button").click(function(){ 
		$('.wc-block-components-totals-coupon__input label').text("Insira seu cupom");
		$("#wc-block-components-totals-coupon__input-0").attr("aria-expanded","Insira seu cupom");
		});
	
});

$(".wc-block-components-panel__button").click(function(){
	alert("The paragraph was clicked.");
});