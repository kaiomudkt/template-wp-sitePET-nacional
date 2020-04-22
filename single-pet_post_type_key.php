<?php
/*
Este arquivo é especialmente para mostrar um unico poste do tipo PET,
as postagens normais são mostradas pelo o arquivo "single.php",
e as portagens personzalidas do C-P-T sao mostrada neste arquivo "single-pet_post_type_key.php"
*/

//https://www.advancedcustomfields.com/resources/adding-fields-posts/
get_header();

the_post();


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
?>

<div class="wrap">
	<div id="event-hero">

	<div class="jumbotron" style="padding: 10px 20px;">
		<h2 class="display-4" style="color:#666666"><?php the_title(); ?> ~ <?php echo $instituicao_pertencente; ?></h2>
		<?php if( $tutor): ?>
			<h4 class="lead" id="tutor" style="color:#666666">Tutor: <?php echo $tutor; ?></h4>
		<?php endif; ?>
		<hr class="my-4">
		<?php if( $qtd_integrantes ): ?>
			<h5 style="color:#666666;font-size: 18px;">Quantidade de Membros: <?php echo $qtd_integrantes; ?> petianos</h5>
		<?php endif; ?>

		<?php if( $qtd_integrantes ): ?>
			<h5 style="color:#666666;font-size: 18px;"><?php echo $cidade; ?> - <?php echo $estado; ?></h5>
		<?php endif; ?>
		<p class="lead">
			<a class="btn btn-primary btn-lg" href="<?php echo $link_site; ?>" role="button" style="padding: 5px 10px;border-color: #1ccdca;">
			Venha Conferir
			</a>
 		</p>
</div>
<?php
if ( !function_exists( 'kyma_more_post_ajax' ) ) {
    function kyma_more_post_ajax(){
        $kyma_theme_options = kyma_theme_options();
        $ppp                 = (isset($_POST['ppp'])) ? $_POST['ppp'] : 3;
        $offset              = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
        
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => $ppp,
            'offset'         => $offset,
			'post_status' 	=> 'publish'
        );
        if (isset($kyma_theme_options['home_post_cat']) && !empty($kyma_theme_options['home_post_cat'])) {
            $args['category__in'] = $kyma_theme_options['home_post_cat'];
        }

        $loop = new WP_Query($args);
        $out  = '';
        $i    = 1;
        if ($loop->have_posts()):
            while ($loop->have_posts()):
                $loop->the_post();
				ob_start();
				$icon = '';
               ?>
				<li class="filter_item_block grid-item" data-animation-delay="<?php echo 300 * $i; ?>" data-animation="rotateInUpLeft">
					<div class="blog_grid_block">
						<div class="feature_inner">
							<div class="feature_inner_corners">
								<?php
								if (has_post_thumbnail()) {
									$icon = 'far fa-image';
									$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
									?>
									<div class="feature_inner_btns">
										<a href="<?php echo esc_url($url); ?>" class="expand_image"><i
												class="fa fa-expand"></i></a>
										<a href="<?php echo esc_url(get_the_permalink()); ?>"
										   class="icon_link"><i class="fa fa-link"></i></a>
									</div>
									<div class="porto_galla">
										<a href="<?php echo esc_url($url); ?>" class="feature_inner_ling"
									   data-rel="magnific-popup">
										<?php 
											if($kyma_theme_options['home_blog_layout'] == 'content'){
											   the_post_thumbnail('kyma_home_post_image');
											}else{
											   the_post_thumbnail('kyma_home_post_image_fluid');
											} ?>
										</a>
									</div>	
										<?php
								} ?>
							</div>
						</div>
						<div class="blog_grid_con">
							<?php if (isset($icon) && $icon!='') { ?>
							<a href="" class="blog_grid_format"><i class="<?php echo esc_attr($icon); ?>"></i></a>
							<?php } ?>
							<h6 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
						<span class="meta">
							<span
								class="meta_part"><?php echo esc_attr(get_the_date(get_option('date_format'), get_the_ID())); ?></span>
							<span class="meta_slash">/</span>
							<span
								class="meta_part"><?php esc_url(comments_popup_link(__('No Comments', 'kyma'), __('1 Comment', 'kyma'), __('% Comments', 'kyma'))); ?> <?php esc_url(edit_post_link(__('Edit', 'kyma'), ' &#124; ', '')); ?></span>
							<span class="meta_slash">/</span>
							<span class="meta_part"><?php echo get_the_category_list(','); ?></span>
						</span>
							<?php the_excerpt(); ?>
						</div>
					</div>
				</li>
               <?php $i != 3 ? $i++ : $i = 1;
            endwhile;
        endif;
        wp_reset_postdata();
		echo ob_get_clean();die;
    }
}
?>
		<?php if( $cursos_abrangentes ): ?>
		<div id="cursos_abrangentes" class="">
			<div class="marke" data-lat="<?php echo $cursos_abrangentes['lat']; ?>"><?php echo $cursos_abrangentes; ?></div>
		</div>
		<?php endif; ?>


		<?php if( $thumbnail ): ?>
			<img class="thumbnail" src="<?php echo $thumbnail['url']; ?>" alt="<?php echo $thumbnail['alt']; ?>" />
		<?php endif; ?>

		<?php if( $location ): ?>
		<div id="event-map" class="acf-map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
		</div>
		<?php endif; ?>
	
	</div>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php the_content(); ?>
		</main>
	</div>
</div>
<?php get_footer();?>