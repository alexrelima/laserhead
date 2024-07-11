<?php 
//Template Name: Minha conta
get_header();?>
<?php $opcoes = get_option('wptester_theme_settings'); ?>
      
<div class="container woo-marge">
	<div class="row">
		<div class="box-conta">
			<h1><?php the_title();?></h1>
			<?php the_content();?>
		</div>
		<div class="outhers-products">
			<h2>Produtos</h2>
			<?php echo do_shortcode('[products limit="3" columns="3" orderby="rand"]');?>
		</div>
	</div>		
</div>
<?php get_footer(); ?>