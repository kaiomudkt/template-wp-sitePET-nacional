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
			
			<div id="divListPosts" class="post">
				<!-- posts serao inseridos dinamicamente no client side via JS -->
			</div>

            <div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"> /*CND axios/"
            	</script>
                <script>
                    busca_list_links();
                    async function busca_list_links(){
               			try{
	                        const response = await axios.get('http://localhost:8089/wp-json/api/links_estados')
	                        const links_estados = response.data
	                        const link_nacional = links_estados['link_nacional']
	                        Object.entries(links_estados).forEach(
	                        	async ([estado, link]) => {
	                        		if (estado != 'link_nacional') {
	                        			const post = await busca_ultima_postagem(link)
	                        			if (post) {
	                        				exibe_postagem(estado, link, post.data[0], link_nacional)
	                        			}else{
	                        				console.log(post)
	                        			}
	                        		}
	                    		}
	                		)
                    	}catch (e){
                    		console.log(e)
                    	}
                    }
                    /* metodo assincrono que faz requisicao da ultima postagem */
                    async function busca_ultima_postagem(link) {
                        try{
                        	return await axios.get(link + "/wp-json/wp/v2/posts?per_page=1&_embed")
                        }catch (e){
                        	console.log(e)
                        	return null
                        }
                    }
					/* exibe postagem */
					function exibe_postagem(estado, link, post, link_nacional){
						var	divListPosts = document.getElementById('divListPosts')
						divListPosts.innerHTML += `
						<article id="article_conteudo" class="list-article clearfix post-6 post type-post status-publish format-standard has-post-thumbnail hentry category-sem-categoria blog list-article ">
							<a href="${link}">
								<h2>${estado}</h2>
							</a>
							<div class="list-article-thumb">
								<a href="${post.link}">
									${returna_img(post, link_nacional)}
								</a>
							</div>
							<div class="list-article-content">
								<div class="list-article-meta">
									<!-- implementar, lista categorias desta postagem -->
								</div>
								<div class="entry-header">
									<h2>
										<a href="${post.link}">${post.title.rendered}</a>
									</h2>
								</div>
								<div class="entry-excerpt">
									<p>
										${post.excerpt.rendered}
									</p>
								</div>
							</div>
						</article>	
						` 
					}

					/* retorna img */
					//$rest_post->_embedded->{'wp:featuredmedia'}[0]->source_url
					function returna_img(post, link_nacional){
						if (post._embedded['wp:featuredmedia']){
							const link = post._embedded['wp:featuredmedia'][0].source_url
							return `<img class="tamanho-img attachment-onepress-blog-small size-onepress-blog-small wp-post-image" src="${link}">` 
						}else{
							return `<img class="tamanho-img attachment-onepress-blog-small size-onepress-blog-small wp-post-image" src="${link_nacional}/wp-content/themes/wp-template-child-sitePET-nacional/sem_imagem.png">`
						}
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
