<?php
/*
Este arquivo é especialmente para mostrar um unico poste do tipo PET,
as postagens normais são mostradas pelo o arquivo "single.php",
e as portagens personzalidas do C-P-T sao mostrada neste arquivo "single-program_edu_tutorial.php"
*/

get_header();
$layout = onepress_get_layout();

/**
 * @since 2.0.0
 * @see onepress_display_page_title
 */
//do_action( 'onepress_page_before_content' );


// vars
$location = esc_attr( get_post_meta( get_the_ID(), 'location', true));
$thumbnail = esc_attr( get_post_meta( get_the_ID(), 'thumbnail', true));
$tutor = esc_attr( get_post_meta( get_the_ID(), 'tutor', true));
$qtd_integrantes = esc_attr( get_post_meta( get_the_ID(), 'qtd_integrantes', true));
$data_criacao = esc_attr( get_post_meta( get_the_ID(), 'data_criacao', true));
$instituicao_pertencente = esc_attr( get_post_meta( get_the_ID(), 'instituicao_pertencente', true));
$cursos_abrangentes = esc_attr( get_post_meta( get_the_ID(), 'cursos_abrangentes', true));
$link_site = esc_attr( get_post_meta( get_the_ID(), 'link_site', true));
$estado = esc_attr( get_post_meta( get_the_ID(), 'estado', true));
$cidade = esc_attr( get_post_meta( get_the_ID(), 'cidade', true));
$campus = esc_attr( get_post_meta( get_the_ID(), 'campus', true));
echo "get_the_ID: ". get_the_ID();
?>

<div id="content" class="site-content">
	<?php onepress_breadcrumb(); ?>
	<div id="content-inside" class="container <?php echo esc_attr( $layout ); ?>">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<header class="entry-header">
					<?php if ( has_post_thumbnail() ) { ?>
				        <div class="entry-thumbnail">
				            <?php
				            $layout = onepress_get_layout();
				            $size = 'thumbnail';
				            the_post_thumbnail( $size );
				            ?>
				        </div><!-- .entry-footer -->
				    <?php } ?>
				    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			        <?php if ( get_theme_mod( 'single_meta', 1 ) ) : ?>
						<div class="entry-meta">
				        	<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Categorias: <?php the_category(', ') ?></p>
							<?php onepress_posted_on(); ?>
							<?php the_author(); ?>
							<?php echo 'yyyyy' ?>
				        	<p><?php edit_post_link('Edit'); ?></p>
						</div><!-- .entry-meta -->
			        <?php endif; ?>

				</header><!-- .entry-header -->
				
				<?php if( $instituicao_pertencente) : ?>
					<p><?php echo $instituicao_pertencente; ?></p>
				<?php endif; ?>
				
				<?php if( $tutor): ?>
					<p class="">Tutor: <?php echo $tutor; ?></p>
				<?php endif; ?>			
				
				<?php if( $qtd_integrantes ): ?>
					<p >Quantidade de Membros: <?php echo $qtd_integrantes; ?> petianos</p>
				<?php endif; ?>

				<p>
					<?php if( $cidade  ): ?>
						<?php echo $cidade . ' - '; ?>
					<?php endif; ?>
					<?php if ($estado): ?>
						<?php echo $estado; ?>
					<?php endif; ?>
				</p>

				<?php if ($campus): ?>
					<p><?php echo 'campus: '.$campus; ?></p>
				<?php endif; ?>

				<?php if( $link_site ): ?>
					<p class="">
						<a class="btn btn-primary" href="<?php echo $link_site; ?>" role="button" >
						Venha conferir nosso site
						</a>
			 		</p>
				<?php endif; ?>

				<?php if( $location ): ?>
					<div id="event-map" class="">
						<div class="" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
				<?php endif; ?>

				

				<?php //var_dump(the_excerpt()); ?>
				<?php if (the_excerpt()) : ?>
					<p>descrição: 
					<?php //the_excerpt(); ?>
					</p>
				<?php endif; ?>

				<?php 
				// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				 ?>
			</main><!-- #main -->
		</div><!-- #primary -->

        <?php if ( $layout != 'no-sidebar' ) { ?>
            <?php get_sidebar(); ?>
        <?php } ?>
	</div><!--#content-inside -->
</div><!-- #content -->
<?php get_footer();?>