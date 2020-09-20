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
//wp_head();
$layout = onepress_get_layout();

?>
<?php onepress_breadcrumb(); ?>
	
<?php //exibi post que tem o ID do slide show  gerado pelo plugin  ?>
<div id="content" class="site-content">
	<div id="content-inside" class="container <?php echo esc_attr( $layout ); ?>">
		<div id="primary" class="content-area">
			<?php require_once(get_stylesheet_directory() . "/banner-carrossel.php");  ?>
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
		
			<div id="divListPosts"></div>
			

			<div>
				<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
				<script>
					/* busca na api do site nacional o link de todos os sites estaduais*/
					axios.get('http://localhost:8089/wp-json/api/links_estados')
				        .then(response => {
				            var links_estados = response.data
				            Object.entries(links_estados).forEach(
				            	([estado, link]) => {
				            		//console.log(estado +' - '+link)
				            		var post = busca_ultima_postagem(link)
				            		exibe_postagem(post)
				            	}
				            )
				        }).catch(error => {
				            console.log(error)
				        });
			        /* metodo assincrono que faz requisicao da ultima postagem */
			        function busca_ultima_postagem(link) {
			        	axios.get(link + "/wp-json/wp/v2/posts?per_page=1&_embed")
				        	.then(response => {
			        			console.log(response.data[0])
			        			return response.data[0]
			        		}).catch(error => {
				            console.log(error)
				        })
						return null
					}
					/* exibe postagem */
					function exibe_postagem(post){
						console.log(post)
						var divListPosts = document.getElementById('divListPosts')
						divListPosts.innerHTML += "<div>"+"teste"+"</div>"
					}
				</script>
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
			</div><!-- end MAPA BRASIL -->

		</div><!-- #primary -->
        <?php //if ( $layout != 'no-sidebar' ) { ?>
            <?php get_sidebar(); ?>
        <?php //} ?>
	</div><!--#content-inside -->
</div><!-- #content -->
<?php //wp_footer(); ?>
<?php get_footer(); ?>
