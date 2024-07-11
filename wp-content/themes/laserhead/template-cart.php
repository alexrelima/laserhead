<?php 
//Template Name: Carrinho
get_header();?>
<?php $opcoes = get_option('wptester_theme_settings'); ?>
      
<div class="container woo-marge">
	<div class="row">
		<div class="box-cart">
			<h1><?php the_title();?></h1>
			<?php the_content();?>
		</div>
	</div>		
</div>
<?php get_footer(); ?>