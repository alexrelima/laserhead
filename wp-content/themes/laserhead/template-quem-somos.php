<?php
//Template Name: Quem Somos
get_header();?>
<?php $opcoes = get_option('wptester_theme_settings'); ?>
      
<div class="container">
	<div class="row">
		<div class="box-sobre">
			<div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<h2><?php the_title();?></h2>
				<?php $destaque_sobre = get_field('imagem_de_destaque');?>
				<img src="<?php echo esc_url($destaque_sobre['url']); ?>" alt="" class="img-responsive">
			</div>
			<div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<?php the_content();?>
			</div>
		</div>
	</div>		
</div>
<?php get_footer(); ?>