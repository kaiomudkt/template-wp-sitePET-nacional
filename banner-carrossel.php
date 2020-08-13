
<?php 
	$my_args_banner = array(
	'post_type' => 'banners',
	'posts_per_page' => 3,
	);
	$my_query_banner = new WP_Query ( $my_args_banner );
?>	

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>
    <div class="carousel-inner ">
		<?php 
			if( $my_query_banner->have_posts()) : 
				//$banner = $banners[0];
				$c = 0;
				while( $my_query_banner->have_posts() ) : 
					$my_query_banner->the_post(); 
					?>
					<div class="carousel-item tamanho-carrossel <?php $c++; if($c == 1) { echo ' active'; } ?>">
						<!-- img-fluid rounded d-block w-100 post-thumbnail img-thumbnail -->
						<!-- <div class=""
							>
						-->
							<!--style="background-image: url(&quot;<?php //echo get_the_post_thumbnail_url(); ?>&quot;);" -->
							<?php the_post_thumbnail( 'large', array('class' => 'tamanho-carrossel img-fluid rounded d-block w-100')) ?>

						<!-- </div>  -->
						<div class="carousel-caption d-none d-md-block">
							<h1 class="text-primary">
								<?php the_title(); ?>
							</h1>
							<p>
								<?php the_excerpt(); ?>
							</p>
						</div>
					</div>
		<?php 	endwhile; 
			endif; ?>
		<?php wp_reset_query(); ?>
    </div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon fonteIcon" aria-hidden="true"></span>

		<span class="sr-only">Anterior</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon fonteIcon" aria-hidden="true"></span>
		<span class="sr-only">Próximo</span>
	</a>
</div>
