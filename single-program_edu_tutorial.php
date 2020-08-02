<?php
/*
Este arquivo é especialmente para mostrar um unico poste do tipo PET,
as postagens normais são mostradas pelo o arquivo "single.php",
e as portagens personzalidas do C-P-T sao mostrada neste arquivo "single-program_edu_tutorial.php"
*/

get_header();

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

			<h2 class="display-4" ><?php the_title(); ?> </h2>

			<hr class="my-4">
			
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

			<?php if( $thumbnail ): ?>
				<img class="thumbnail" src="<?php echo $thumbnail['url']; ?>" alt="<?php echo $thumbnail['alt']; ?>" />
			<?php endif; ?>

			<?php if( $location ): ?>
				<div id="event-map" class="">
					<div class="" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>
<?php get_footer();?>