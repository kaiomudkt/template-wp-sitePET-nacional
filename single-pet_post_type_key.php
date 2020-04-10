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
		<h2><?php the_title(); ?></h2>
		<?php if( $tutor): ?>
		<div id="tutor" class="">

			<div class="marke" data-lat="<?php echo $tutor['lat'];?>"> <?php echo $tutor; ?></div>
		</div>
		<?php endif; ?>

		<?php if( $qtd_integrantes ): ?>
		<div id="qtd_integrantes" class="">
			<div class="marke" data-lat="<?php echo $qtd_integrantes['lat']; ?>"><?php echo $qtd_integrantes; ?></div>
		</div>
		<?php endif; ?>

		<?php if( $instituicao_pertencente ): ?>
		<div id="instituicao_pertencente" class="">
			<div class="marke" data-lat="<?php echo $instituicao_pertencente['lat']; ?>"><?php echo $instituicao_pertencente; ?></div>
		</div>
		<?php endif; ?>

		<?php if( $cursos_abrangentes ): ?>
		<div id="cursos_abrangentes" class="">
			<div class="marke" data-lat="<?php echo $cursos_abrangentes['lat']; ?>"><?php echo $cursos_abrangentes; ?></div>
		</div>
		<?php endif; ?>

		<?php if( $link_site ): ?>
		<div id="link_site" class="">
			<div class="marke" data-lat="<?php echo $link_site['lat']; ?>"><?php echo $link_site; ?></div>
		</div>
		<?php endif; ?>

		<?php if( $estado ): ?>
		<div id="estado" class="">
			<div class="marke" data-lat="<?php echo $estado['lat']; ?>"><?php echo $estado; ?></div>
		</div>
		<?php endif; ?>

		<?php if( $cidade ): ?>
		<div id="cidade" class="">
			<div class="marke" data-lat="<?php echo $cidade['lat']; ?>"><?php echo $cidade; ?></div>
		</div>
		<?php endif; ?>

		<?php if( $campus ): ?>
		<div id="campus" class="">
			<div class="marke" data-lat="<?php echo $campus['lat']; ?>"><?php echo $cidade; ?></div>
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