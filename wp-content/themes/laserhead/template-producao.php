<?php
//Template Name: Em Produção
get_header();?>
<?php 
$image = get_field('capa');
if( !empty( $image ) ): ?>
	<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner-full">
<?php endif; ?>


<?php 
$image_mobile = get_field('capa_mobile');

if( !empty( $image_mobile ) ): ?>
	<img src="<?php echo esc_url($image_mobile['url']); ?>" alt="<?php echo esc_attr($image_mobile['alt']); ?>" class="banner-full banner-full-mob">
<?php endif; ?>
<div class="container">
	<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 text-content">
				<h1 class="page-title-in"><?php the_title(); ?></h1>
				<div class="row">
					<div class="flex-flex">
					<?php 
						$args = array('post_type' => 'producao', 'posts_per_page' => -1, 'order' =>'DESC',);
						$loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post();

						$capa_producao = get_field('capa_producao');
					?>
						<div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<?php 
								$title = get_the_title(); 
								$title = strtolower($title);

								$title = preg_replace('/[áàãâä]/ui', 'a', $title);
								$title = preg_replace('/[éèêë]/ui', 'e', $title);
								$title = preg_replace('/[íìîï]/ui', 'i', $title);
								$title = preg_replace('/[óòõôö]/ui', 'o', $title);
								$title = preg_replace('/[úùûü]/ui', 'u', $title);
								$title = preg_replace('/[ç]/ui', 'c', $title);
								$title = preg_replace('/[^a-z0-9]/i', '_', $title);
								$title = preg_replace('/_+/', '_', $title);
							?>

							<div class="item-prod <?php echo $title;?>">
								<a data-fancybox href="<?php echo esc_url($capa_producao['url']); ?>" data-caption="<?php the_title();?>">
									<img src="<?php echo esc_url($capa_producao['url']); ?>" alt="" class="img-responsive">
								</a>

								
								<div class="item-box">
									<h3><?php echo esc_html( get_field('tipo') ); ?></h3>
									<h2><?php the_title();?></h2>
									<?php if( have_rows('tags') ): ?>
										<div class="tags">
											<?php while( have_rows('tags') ): the_row();?>
												<?php 
													$tagintag = get_sub_field('tag'); 
													$tagintag = strtolower($tagintag);

													$tagintag = preg_replace('/[áàãâä]/ui', 'a', $tagintag);
													$tagintag = preg_replace('/[éèêë]/ui', 'e', $tagintag);
													$tagintag = preg_replace('/[íìîï]/ui', 'i', $tagintag);
													$tagintag = preg_replace('/[óòõôö]/ui', 'o', $tagintag);
													$tagintag = preg_replace('/[úùûü]/ui', 'u', $tagintag);
													$tagintag = preg_replace('/[ç]/ui', 'c', $tagintag);
													$tagintag = preg_replace('/[^a-z0-9]/i', '_', $tagintag);
													$tagintag = preg_replace('/_+/', '_', $tagintag);
												?>
												<span class="prod <?php echo $tagintag;?>"><?php echo wp_kses_post( get_sub_field('tag') );?></span>
											<?php endwhile; ?>
										</div>
									<?php endif; ?>
									
									<div class="chamada">
										<?php the_content('', false);?>
									</div>
									<div class="content-prod">
										<?php the_content('', true);?>

										<?php $content_arr = get_extended ( $post->post_content );?>
										<p><?php echo $content_arr['extended'];?></p>
									</div>

									<a href="#" onclick="return false;" title="Veja mais - <?php the_title();?>" class="v-mais">Veja mais</a>
										
									<!--<p class="date">Data de lançamento <span><?php echo esc_html ( get_field( 'data_de_lancamento' ) ); ?></span></p>-->
									<p class="date">Data de lançamento <span>Em breve</span></p>
								</div>
							</div>
						</div>
					<?php endwhile; wp_reset_query();?>
				</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>
</div>
<?php get_footer(); ?>