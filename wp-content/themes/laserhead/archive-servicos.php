<?php
//Template Name: Serviços
get_header();?>
<div class="container">
	<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div id="breadcrumb">
			<span class="bc-span">Você está em:</span>
			<ol itemscope itemtype="http://schema.org/BreadcrumbList">
				<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<a itemprop="item" href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
						<span itemprop="name">Home</span>
					</a>››
					<meta itemprop="position" content="1">
				</li>
				<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<a itemprop="item" href="<?php echo esc_url( home_url( '/' ) ); ?>servicos/"> 
						<span itemprop="name">Serviços</span>
					</a>
					<meta itemprop="position" content="2">
				</li>
			</ol>
		</div>
	</div>
</div>
<div class="content-page">
	<div class="services-home services-home-page">
		<div class="container">
			<div class="row">
				<?php $args = array('post_type' => 'servicos', 'posts_per_page' => 6); $loop = new WP_Query( $args ); $count = 4; while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="col col-xs-12 col-sm-6 col-md-4 col-lg-4 sgl-service-home">
					<div class="icon-home">
						<a href="<?php the_permalink();?>" title="<?php the_title();?>">
							<img src="<?php the_field('icone_servicos'); ?>" alt="<?php the_title();?>" title="<?php the_title();?>">
						</a>
					</div>
					<h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
				</div>
				<?php  $count = $count + 1; endwhile;?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>