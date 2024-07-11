$(function() {
	$(".woocommerce-checkout").addClass("woocommerce");	
});

window.onload = function(){
	$('.wc-block-components-checkbox.wc-block-checkout__use-address-for-billing .wc-block-components-checkbox__label').text('Use o mesmo endereço para cobrança');
	$('.wp-block-woocommerce-checkout-order-note-block .wc-block-components-checkbox__label').text('Adicione uma nota ao seu pedido');
	$('.wp-block-woocommerce-checkout-order-summary-cart-items-block.wc-block-components-totals-wrapper .wc-block-components-order-summary__button-text').text('Resumo do pedido');
	$('.wc-block-components-totals-coupon .wc-block-components-panel__button').text('Adicionar um cupom');
}
