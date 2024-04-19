<?php get_header();?>

<?php if(is_product_category()){ ?>    
	<div class="container">
		<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-3 filtro_collum">
			<h2 class="page-title-in title-left">Filtros</h2>
			<?php if ( dynamic_sidebar('widget_woocommerce') ) : else : endif; ?>
		</div>                   
		<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-9 woocommerce prod_collum">
			<?php woocommerce_content(); ?>
		</div>
	</div>
	<?php } else if(is_shop()){ ?>

		<?php $my_query = new WP_Query('page_id=16');
			while ($my_query->have_posts()) : $my_query->the_post();
			$do_not_duplicate = $post->ID;
		?>
			<?php 
			$image = get_field('capa');
			if( !empty( $image ) ): ?>
				<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner-full">
			<?php endif; ?>
		<?php endwhile; wp_reset_query();?>


		<div class="container">
			<div class="row">
				<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 text-content">
					<?php woocommerce_content(); ?>
				</div>
			</div>
		</div>
	<?php } else{ ?>
		<?php 
		$image = get_field('capa');
		if( !empty( $image ) ): ?>
			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner-full">
		<?php endif; ?>
		<div class="container">
			<div class="row">
				<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 woocommerce prod_collum">
					<div class="row">
						<?php woocommerce_content(); ?>
					</div>
				</div>
			</div>
		</div>
<?php } ?>

<?php get_footer();?>