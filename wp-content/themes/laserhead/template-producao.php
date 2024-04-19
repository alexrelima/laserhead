<?php
//Template Name: Em Produção
get_header();?>
<?php 
$image = get_field('capa');
if( !empty( $image ) ): ?>
	<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner-full">
<?php endif; ?>
<div class="container">
	<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 text-content">
				<h1 class="page-title-in"><?php the_title(); ?></h1>
				<div class="row">
					<?php 
						$args = array('post_type' => 'producao', 'posts_per_page' => -1, 'order' =>'DESC',);
						$loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post();
					?>
						<div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="item">
								<?php the_post_thumbnail('post-thumbnail', array( 'class' => 'img-responsive' ));?>
								<div class="item-box">
									<h3><?php echo esc_html( get_field('tipo') ); ?></h3>
									<h2><?php the_title();?></h2>
									<span class="prod">Em Produção</span>
									<div class="chamada">
										<?php the_excerpt();?>
										<a href="<?php the_permalink();?>" title="Veja mais - <?php the_title();?>">Veja mais</a>
									</div>
									<p class="date">Data de lançamento <span><?php echo esc_html ( get_field( 'data_de_lancamento' ) ); ?></span></p>
								</div>
							</div>
						</div>
					<?php endwhile; wp_reset_query();?>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>
</div>
<?php get_footer(); ?>