<?php get_header();?>
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
				<?php the_content();?>
			</div>
		<?php endwhile; endif; ?>
	</div>
</div>
<?php get_footer();?>