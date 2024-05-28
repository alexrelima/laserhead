$(function() {
	var slide_wrp_header    = ".side-menu-wrapper_header"; //Menu Wrapper
	var open_button_header  = ".menu-open_header"; //Menu Open Button
	var close_button_header = ".menu-close_header"; //Menu Close Button
	var overlay_header      = ".menu-overlay_header"; //Overlay

	//Initial menu position
	$(slide_wrp_header).hide().css( {"right": -$(slide_wrp_header).outerWidth()+'px'}).delay(50).queue(function(){$(slide_wrp_header).show()}); 

	$(open_button_header).click(function(e){ //On menu open button click
		e.preventDefault();
	$(slide_wrp_header).css( {"right": "0px"}); //move menu right position to 0
	setTimeout(function(){
	    $(slide_wrp_header).addClass('active'); //add active class
	},50);
	$(overlay_header).css({"opacity":"1", "width":"100%"});
	});

	$(close_button_header).click(function(e){ //on menu close button click
		e.preventDefault();
	$(slide_wrp_header).css( {"right": -$(slide_wrp_header).outerWidth()+'px'}); //hide menu by setting right position 
	setTimeout(function(){
	    $(slide_wrp_header).removeClass('active'); // remove active class
	},50);
	$(overlay_header).css({"opacity":"0", "width":"0"});
	});

	$(document).on('click', function(e) { //Hide menu when clicked outside menu area
	if (!e.target.closest(slide_wrp_header) && $(slide_wrp_header).hasClass("active")){ // check menu condition
		$(slide_wrp_header).css( {"right": -$(slide_wrp_header).outerWidth()+'px'}).removeClass('active');
		$(overlay_header).css({"opacity":"0", "width":"0"});
	}
	});

	$('.conteudos').owlCarousel({
		loop:false,
		margin:0,
		nav:false,
		dots: true,
		autoplay: false,
		items:1,
		responsive:{
			0:{
			},
			600:{
			},
			1000:{
			},
		}
	});

	$('.onsale').each(function(){
		$(this).wrapInner('<i></i>');
	});



	var SPMaskBehavior = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions = {
		onKeyPress: function(val, e, field, options) {
			field.mask(SPMaskBehavior.apply({}, arguments), options);
		},
	};
	$(".fullphone").mask(SPMaskBehavior, spOptions);


	$('.v-mais').click(function() {
		
		$(this).closest(".item-prod").toggleClass("open");
		$(this).prev('.content-prod').toggleClass('open');

		$('.item-prod .v-mais').text('Veja mais');
		$('.item-prod.open .v-mais').text('Ver menos');

	});

	Fancybox.bind('[data-fancybox]', {
        //
      });  



	if ($(window).width() < 992) {
		/* Home - menu */
		$(".run-contato").insertAfter(".run-ose");

	}

	if ($(window).width() < 768) {
		/*OSE - Logo*/
		$(".banner-content .container").addClass('container-move');
		$(".banner-content .container").prependTo(".conteudo");

		/*OSE - secundário*/
		$(".secundario .container-sec").prependTo(".secundario-mob-content");

		/*OSE - Carrousel*/
		$(".item .imagem_carrousel").prependTo(".item .conteudo_carrousel");

	}

});

$(window).resize(function(){
	if ($(window).width() < 992) {
		/* Home - menu */
		$(".run-contato").insertAfter(".run-ose");

	} else{ 
		/* Home - menu */
		$(".run-ose").insertAfter(".run-contato");
	}

	if ($(window).width() < 768) {
		/*OSE - Logo*/
		$(".banner-content .container").addClass('container-move');
		$(".banner-content .container").prependTo(".conteudo");

		/*OSE - secundário*/
		$(".secundario .container-sec").prependTo(".secundario-mob-content");
		
		
	}else{
		/*OSE - Logo*/
		$(".conteudo .container-move").prependTo(".banner-content");

		/*OSE - secundário*/
		$(".secundario-mob-content .container-sec").prependTo(".secundario");
		
		
	}
});