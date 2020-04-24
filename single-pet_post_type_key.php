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
	
	<div class="jumbotron" style="padding: 10px 20px;background-color: #0000;">
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