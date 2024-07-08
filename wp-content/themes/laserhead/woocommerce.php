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
		<div class="container">
			<div class="row">
				<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 text-content woo-marge">
					<?php aws_get_search_form( true ); ?>
					<?php woocommerce_content(); ?>
				</div>
			</div>
		</div>
	<?php } else{ ?>
		<div class="container">
			<div class="row">
				<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 woocommerce prod_collum">
					<div class="row">
						<?php aws_get_search_form( true ); ?>
						<?php woocommerce_content(); ?>
					</div>
				</div>
			</div>
		</div>
<?php } ?>

<?php get_footer();?>