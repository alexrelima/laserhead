$(function() {
	
	$(".related.products").prependTo($(".move-related"));
	$(".woocommerce-tabs").prependTo($(".move-tabs"));

	$( ".comment-form-author" ).insertAfter( ".comment-notes" );
	$( ".comment-form-email" ).insertAfter( ".comment-form-author" );


	$(".related.products .product").each(function() {
		$(this).find(".tipo").insertBefore($(this).find(".woocommerce-loop-product__title"));
	});
	

		
});

$(window).resize(function(){

});