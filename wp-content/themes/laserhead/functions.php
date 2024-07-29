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


  if (is_home()) {
      //wp_register_script( 'index-js', get_template_directory_uri() . '/js/index.js', array( 'jquery' ), '1.0', TRUE );
      //wp_enqueue_script( 'index-js' );
  }else if ( is_product() ) {
      wp_register_script( 'main-product', get_template_directory_uri() . '/js/main-product.js', array( 'jquery' ), '1.0', TRUE );
      wp_enqueue_script( 'main-product' );
  }else if ( is_cart() ) {
      wp_register_script( 'cart-js', get_template_directory_uri() . '/js/main-cart.js', array( 'jquery' ), '1.0', TRUE );
      wp_enqueue_script( 'cart-js' );
  }else if (is_product_category() || is_shop()) {
    wp_register_script( 'category-product', get_template_directory_uri() . '/js/main-category.js', array( 'jquery' ), '1.0', TRUE );
    wp_enqueue_script( 'category-product' );
  }
  else if (is_account_page()) {
    wp_register_script( 'main-acount', get_template_directory_uri() . '/js/main-acount.js', array( 'jquery' ), '1.0', TRUE );
    wp_enqueue_script( 'main-acount' );
  }else if (is_checkout()) {
    wp_register_script( 'main-checkout', get_template_directory_uri() . '/js/main-checkout.js', array( 'jquery' ), '1.0', TRUE );
    wp_enqueue_script( 'main-checkout' );
  }

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

/* Alterando texto de ordenação - filtros */
add_filter( 'woocommerce_catalog_orderby', 'so_37445423_orderby_options', 20 );
function so_37445423_orderby_options( $options ){
    $options['menu_order'] = __('Ordenar por', 'laserhead');
    return $options;
}

/* Alterando texto botão comprar - single */
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single' ); 
function woocommerce_add_to_cart_button_text_single() {
    return __( 'Adicionar ao carrinho', 'woocommerce' ); 
}


/* Alterando quantidade de produtos relacionados */ 
function woo_related_products_limit() {
  global $product;
   
   $args['posts_per_page'] = 3;
   return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
   $args['posts_per_page'] = 3;
   $args['columns'] = 3;
   return $args;
}

/* Removendo informações adicionais */
add_filter( 'woocommerce_product_tabs', 'remove_additional_information_tab', 98 );

function remove_additional_information_tab( $tabs ) {

 unset( $tabs['additional_information'] );

 return $tabs;

}


/* Widget */
function laser_widget() {
 register_sidebar( array(
 'name' => 'Widget Woocommerce',
 'id' => 'widget_woocommerce',
 'before_widget' => '<div class="widget">',
 'after_widget' => '</div>',
 'before_title' => '<h3 class="wid-woo">',
 'after_title' => '</h3>',
 'description' => 'área de widget Woocommerce',
 ) );

}
add_action( 'widgets_init', 'laser_widget' );

?>

