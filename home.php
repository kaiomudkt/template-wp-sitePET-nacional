<?php
/**
 * The front page template file.
 *
 * The front-page.php template file is used to render your site’s front page,
 * whether the front page displays the blog posts index (mentioned above) or a static page.
 * The front page template takes precedence over the blog posts index (home.php) template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package OnePress
 */

get_header();

$layout = onepress_get_layout();

?>
<?php onepress_breadcrumb(); ?>
	
<?php //exibi post que tem o ID do slide show  gerado pelo plugin  ?>
<div id="content" class="site-content">
	<div id="content-inside" class="container <?php echo esc_attr( $layout ); ?>">
		<!-- carrossel -->
		<div id="primary" class="content-area">
			<?php require_once($template_diretorio_filho . "/banner-carrossel.php");  ?>
            <!-- fim carrossel -->
			<!-- lista posts  API-->
			<?php
			//https://developer.wordpress.org/reference/functions/wp_trim_excerpt/
			function descricao_resumida( $text) {
			    $raw_excerpt = $text;
			    $text = strip_shortcodes( $text );
			    $text = excerpt_remove_blocks( $text );
			    /** This filter is documented in wp-includes/post-template.php */
			    $text = apply_filters( 'the_content', $text );
			    $text = str_replace( ']]>', ']]&gt;', $text );
			    /* translators: Maximum number of words used in a post excerpt. */
			    $excerpt_length = intval( _x( '55', 'excerpt_length' ) );
			    /**
			     * Filters the maximum number of words in a post excerpt.
			     *
			     * @since 2.7.0
			     *
			     * @param int $number The maximum number of words. Default 55.
			     */
			    $excerpt_length = (int) apply_filters( 'excerpt_length', $excerpt_length );
			    /**
			     * Filters the string in the "more" link displayed after a trimmed excerpt.
			     *
			     * @since 2.9.0
			     *
			     * @param string $more_string The string shown within the more link.
			     */
			    $excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
			    $text         = wp_trim_words( $text, $excerpt_length, $excerpt_more );
			    /**
			     * Filters the trimmed excerpt string.
			     *
			     * @since 2.8.0
			     *
			     * @param string $text        The trimmed text.
			     * @param string $raw_excerpt The text prior to trimming.
			     */
			    return $text;
			}
			?>
		
			<div class="post "><!-- list posts API -->
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
									<article id="post-<?php the_ID(); ?>" class="list-article clearfix post-6 post type-post status-publish format-standard has-post-thumbnail hentry category-sem-categoria blog list-article ">
										<h2><?php echo $estado; ?></h2>
								 		
								 		<div class=""><!-- nao sei pq, mas essa class esta quebrando a apresentação list-article-thumb -->
								 			<?php echo '<a href="'.esc_url($rest_post->link).'">'; 
													if ( isset($rest_post->_embedded->{'wp:featuredmedia'}[0]->source_url) ) {
														echo '<img class="attachment-onepress-blog-small size-onepress-blog-small wp-post-image" src="' . esc_url($rest_post->_embedded->{'wp:featuredmedia'}[0]->source_url) . '" >';
														//the_post_thumbnail( 'onepress-blog-small' );
													} else {
														echo '<img alt="" src="' . get_template_directory_uri() . '/assets/images/placholder2.png' . '">';
													}
											?></a>
										</div>

										<div class="list-article-content">
											<div class="list-article-meta">
												<?php //the_category( ' / ' ); colocar a categoria ?>
											</div>
											<div class="entry-header">
												<?php echo  '<h2 class="entry-title"><a href="'.$rest_post->link.'">'.$rest_post->title->rendered.'</a></h2>'; ?>
											</div>
											<div class="entry-excerpt">
													<?php echo esc_attr(descricao_resumida($rest_post->content->rendered)); ?>
											</div>
										</div>
									</article>	
								<?php endforeach; ?>
							<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				 <?php endforeach;?>
			</div><!-- end post -->

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
			</div><!-- end MAPA BRASIL -->

		</div><!-- #primary -->
        <?php //if ( $layout != 'no-sidebar' ) { ?>
            <?php get_sidebar(); ?>
        <?php //} ?>
	</div><!--#content-inside -->
</div><!-- #content -->
<?php get_footer(); ?>
