<?php

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

add_theme_support('title-tag');
add_theme_support('post-thumbnails'); 

include('inc/post-type-banners.php');
include('inc/post-type-producao.php');

function laserhead_scripts(){
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js?ver=1', false, 1, true );
  wp_enqueue_script( 'jquery' );
  wp_deregister_script( 'wp-embed');
  wp_register_script( 'migrate', 'https://code.jquery.com/jquery-migrate-1.4.1.min.js', array( 'jquery' ), 1, true );
  wp_enqueue_script( 'migrate');
  wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), 1, true );
  wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery' ), 1, true );
  wp_enqueue_script( 'mask', get_template_directory_uri() . '/js/jquery.mask.min.js', array( 'jquery' ), 1, true );  
  wp_enqueue_script( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array( 'jquery' ), 1, true );  
  wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ),  1, true  );


}
add_action( 'wp_enqueue_scripts', 'laserhead_scripts' );



function laserhead_styles(){
	wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'laserhead_styles');


add_action('init', 'imaginy_menus' );
function imaginy_menus() {
  register_nav_menus(
    array(
      'menu-principal' => __('Menu Principal'),
      'menu-loja' => __('Menu Loja'),
      )
    );
}

function wpb_imagelink_setup(){
  $image_set = get_option( 'image_default_link_type' );
  
  if ($image_set !== 'none') {
    update_option('image_default_link_type', 'none');
  }
}
add_action('admin_init', 'wpb_imagelink_setup', 10);


if ( is_admin() ) require_once( TEMPLATEPATH . '/admin_settings.php' );




/* ----------------------- WOOCOMMERCE ----------------------- */

add_theme_support( 'woocommerce', array(
  'thumbnail_image_width' => 455,
  'gallery_thumbnail_image_width' => 100,
  'single_image_width' => 600,
));


add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
 
function bbloomer_display_quantity_minus() {
   if ( ! is_product() ) return;
   echo '<button type="button" class="minus" >-</button>';
}
 
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
 
function bbloomer_display_quantity_plus() {
   if ( ! is_product() ) return;
   echo '<button type="button" class="plus" >+</button>';
}
 
add_action( 'woocommerce_before_single_product', 'bbloomer_add_cart_quantity_plus_minus' );
 
function bbloomer_add_cart_quantity_plus_minus() {
   wc_enqueue_js( "
      $('form.cart').on( 'click', 'button.plus, button.minus', function() {
            var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
            if ( $( this ).is( '.plus' ) ) {
               if ( max && ( max <= val ) ) {
                  qty.val( max );
               } else {
                  qty.val( val + step );
               }
            } else {
               if ( min && ( min >= val ) ) {
                  qty.val( min );
               } else if ( val > 1 ) {
                  qty.val( val - step );
               }
            }
         });
   " );
}





?>

