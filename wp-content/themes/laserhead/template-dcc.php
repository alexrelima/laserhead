<?php
//Template Name: Dungeon Crawl Classics
get_header();?>
<?php 

$opcoes = get_option('wptester_theme_settings');  
$image = get_field('capa');
$imageMob = get_field('capa_mobile');
if( !empty( $image ) ): ?>
	<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner-full">
<?php endif; ?>
<?php if( !empty( $imageMob ) ): ?>
	<img src="<?php echo esc_url($imageMob['url']); ?>" alt="<?php echo esc_attr($imageMob['alt']); ?>" class="banner-full-mob">
<?php endif; ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 banner-content">
		<div class="container">
			<div class="row">
				<?php the_content();?>
			</div>
		</div>
	</div>
	<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 conteudo">
		<div class="container">
			<div class="row">
				<div class="conteudos owl-carousel owl-theme">
					
						<?php if( have_rows('carrousel') ): ?>
							
							<?php while( have_rows('carrousel') ): the_row(); 
								$image = get_sub_field('imagem_de_destaque');
							?>
							<div class="item">
								<div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6 imagem_carrousel">
									<?php echo wp_get_attachment_image( $image, 'full' ); ?>
								</div>
								<div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6 conteudo_carrousel">
									<?php the_sub_field('conteudo'); ?>
									<!--<a href="#">compre agora</a>-->
								</div>
							</div>
							<?php endwhile; ?>
							
						<?php endif; ?>						
				</div>
			</div>
		</div>
	</div>

	<div class="secundario">
		<img src="<?php the_field('destaque_conteudo_secundario'); ?>" class="img-responsive">
		<div class="container-sec">
			<div class="secundario-content">
				<?php the_field('conteudo_secundario'); ?>
				<!--<a href="#">Em breve</a>-->
				<span>Em Breve</span>
			</div>
		</div>
	</div>
	<div class="secundario-mob">
		<img src="<?php the_field('destaque_conteudo_secundario_mobile'); ?>" class="img-responsive">
	</div>
	<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 secundario-mob-content">
	</div>



<?php endwhile; endif; ?>
<?php get_footer(); ?>