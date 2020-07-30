<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */

get_header();

$layout = onepress_get_layout();

/**
 * @since 2.0.0
 * @see onepress_display_page_title
 */
//do_action( 'onepress_page_before_content' );//tem alguma coisa haver com o titulo

/*
$show_thumbnail = true;
if ( get_theme_mod( 'onepress_hide_thumnail_if_not_exists', false ) ) {
	if ( ! has_post_thumbnail() ) {
		$show_thumbnail = false;
	}
}
*/
?>
<style>
	.blog{
	    border-top: 1px solid #e9e9e9;
		padding-top: 25px 0px;
		padding: 25px 0px;
	}
</style>
	<div id="content" class="site-content">
        <?php //onepress_breadcrumb(); ?>
		<div id="content-inside" class="container <?php echo esc_attr( $layout ); ?>">
			<div class="content-area">
				<main id="main" class="site-main" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>

					<?php endwhile; // End of the loop. ?>

				</main><!-- #list posts -->
				<div class=" post ">
					<?php $estados = [
                        'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG','PA',
                        'PB', 'PR','PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF',
                    ]; ?>
					<?php foreach($estados as $estado) : ?>
						<?php $url = esc_url(get_option($estado)); ?>
						<?php if ($url) : ?>
							<?php $arguments = array('method' => 'GET'); ?>
							<?php $request = wp_remote_get( $url."/wp-json/wp/v2/posts?per_page=1&_embed", $arguments); ?>
							<?php if ( ! is_wp_error( $request ) ) : ?>
								<?php $body = wp_remote_retrieve_body( $request ); ?>
								<?php $data = json_decode( $body ); ?>
								<?php if ( ! is_wp_error( $data ) ) : ?>
									<?php foreach( $data as $rest_post ) : ?>
										<?php $URLthumbnail = esc_url($rest_post->_embedded->{'wp:featuredmedia'}[0]->source_url); ?>

										<article id="post-<?php the_ID(); ?>" class="list-article clearfix post-6 post type-post status-publish format-standard has-post-thumbnail hentry category-sem-categoria blog list-article ">
											<?php //if ( $show_thumbnail ) : ?>
											<?php if ( $URLthumbnail ) : ?>
										 		<div class=""><!-- nao sei pq, mas essa class esta quebrando a apresentação list-article-thumb -->
										 			<?php 
							 							echo '<a href="'.esc_url($rest_post->link).'">'; 
														if ( $URLthumbnail ) {
															echo '<img class="attachment-onepress-blog-small size-onepress-blog-small wp-post-image" src="' . $URLthumbnail . '" >';
															//the_post_thumbnail( 'onepress-blog-small' );
														} else {
															echo '<img alt="" src="' . get_template_directory_uri() . '/assets/images/placholder2.png' . '">';
														}
														?>
													</a>
												</div>
										 	<?php endif; ?>

											<div class="list-article-content">
												<div class="list-article-meta">
													<?php //the_category( ' / ' ); colocar a categoria ?>
												</div>
												<header class="entry-header">
													<?php echo  '<h2 class="entry-title"><a href="'.$rest_post->link.'">'.$rest_post->title->rendered.'</a></h2>'; ?>
												</header><!-- .entry-header -->
												<div class="entry-excerpt">
													<?php //the_excerpt(); ?>
													<?php
														/* wp_link_pages(
															array(
																'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'onepress' ),
																'after'  => '</div>',
															)
														); */
														?>
														<?php echo esc_attr($rest_post->content->rendered); ?>
														<?php //var_dump($rest_post->content->rendered); ?>
												</div><!-- .entry-content -->
											</div>
										</article>	
									<?php endforeach; ?>
								<?php endif; ?>
							<?php endif; ?>
						<?php endif; ?>
					 <?php endforeach;?>
				</div>

				<!-- MAPA BRASIL -->
				<div id="mapa_pets_brasil" class=" post list-article clearfix">
				    <div style="">
				        <div id="mapa_brasil">
				            <?php
				                include('Mapa+do+Brasil+SVGa.html');
				            ?>
				        </div>

				    </div> 
				    <div>
				        <ul id="lista_pets" class="list-group" style="width: 110%;height: 50px;padding: 50px 130px;"></ul>
				    </div>
				</div>
			</div>

            <?php if ( $layout != 'no-sidebar' ) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>

		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
