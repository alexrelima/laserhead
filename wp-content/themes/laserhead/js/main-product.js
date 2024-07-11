$(function() {
	
	$(".related.products").prependTo($(".move-related"));
	$(".woocommerce-tabs").prependTo($(".move-tabs"));

	$(".summary .tipo").insertBefore(".summary .product_title");

	$var = $('.woocommerce-product-details__short-description p').width();
	$(".woocommerce .product .cart").width($var);

	$( ".comment-form-author" ).insertAfter( ".comment-notes" );
	$( ".comment-form-email" ).insertAfter( ".comment-form-author" );


	$("a.switchtab").click(function(e){
        e.preventDefault(); //Prevents hash to be appended at the end of the current URL.
        $("div.woocommerce-tabs>ul.tabs>li>a[href='" + $(this).attr("href") + "']").click(); //Opens up the particular tab
        $('html, body').animate({
            scrollTop: $("div.woocommerce-tabs").offset().top - 135
        }, 1000); //Change to whatever you want, this value is in milliseconds.
    });



	$(".related.products .product").each(function() {
		$(this).find(".tipo").insertBefore($(this).find(".woocommerce-loop-product__title"));
	});

	$(".minus").hover(function () {
		$(".quantity").toggleClass("negative");
	});

	$(".plus").hover(function () {
		$(".quantity").toggleClass("positive");
	});
	

		
});

$(window).resize(function(){

});