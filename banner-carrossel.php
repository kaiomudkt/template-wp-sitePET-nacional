<?php //https://portal.oxyhospedagem.com.br/index.php?rp=/knowledgebase/1/Carregar-o-bootstrap-4-no-wordpress.html ?>

<?php wp_head();?>
<div id="carouselBSWP" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
		<?php 
			//https://github.com/rvsanches/BS4-WP/blob/master/tema/wp-content/themes/bs4wp/front-page.php
			$my_args_banner = array(
			'post_type' => 'banners',
			'posts_per_page' => 3,
			);
			$my_query_banner = new WP_Query ( $my_args_banner );
		?>		
		<?php 
			if( $my_query_banner->have_posts()) : 
				//$banner = $banners[0];
				$c = 0;
				while( $my_query_banner->have_posts() ) : 
					$my_query_banner->the_post(); 
					?>
					<div class="carousel-item <?php $c++; if($c == 1) { echo ' active'; } ?>">
					  <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid rounded')) ?>
					  <div class="carousel-caption d-none d-md-block">
					    <h5>
					      <?php the_title(); ?>
					    </h5>
					  </div>
					</div>
		<?php 	endwhile; 
			endif; ?>
		<?php wp_reset_query(); ?>
    </div>
</div>

<?php wp_footer();?>