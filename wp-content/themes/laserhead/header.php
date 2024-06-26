<!DOCTYPE html>
<html <?php language_attributes();?> class="no-js" itemscope itemtype="http://schema.org/WebPage">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <!--[if IE]>
  <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
  <![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!--[if lt IE 9]>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>
<body <?php body_class('responsivo'); ?>>
    <?php 

      $opcoes = get_option('wptester_theme_settings'); 

      $ddd =  $opcoes['contatos_ddd'];
      $tel1 = $opcoes['contatos_telefone'];

      $searchVal = array("-", " ", "(", ")",); 
      $replaceVal = array("", "", "", ""); 

      $t_ddd = str_replace($searchVal, $replaceVal, $ddd); 
      $t_tel1 = str_replace($searchVal, $replaceVal, $tel1);

      $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
      $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
      $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
      $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
      $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");

    ?>
    <header itemscope itemtype="http://schema.org/Organization">
      <div class="container">
        <div class="row">
          <h1 class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Laser Head">
              <span itemprop="image">
                <img src="<?php bloginfo('template_directory');?>/images/logo.svg" alt="Laser Head" title="Laser Head" class="img-responsive">
              </span>
            </a>
          </h1>
            <?php if (is_woocommerce() || is_cart() || is_checkout() || is_account_page()) { ?> 
              <?php wp_nav_menu(array('theme_location' => 'menu-loja'));?>
            <?php } else { ?> 
              <?php wp_nav_menu(array('theme_location' => 'menu-principal'));?>
            <?php } ?>
        </div>



        <a href="#" class="menu-open_header">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M3 18V16H21V18H3ZM3 13V11H21V13H3ZM3 8V6H21V8H3Z" fill="#FFFBF1"/>
          </svg>
        </a>
        <div class="side-menu-wrapper_header" style="display:none;">
          <a href="#" class="menu-close_header">×</a>
          <?php wp_nav_menu(array('theme_location' => 'menu-principal'));?>
        </div>
      </div>
    </header>
