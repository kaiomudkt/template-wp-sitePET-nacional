<?php
/*
Este arquivo é especialmente para mostrar um unico poste do tipo PET,
as postagens normais são mostradas pelo o arquivo "single.php",
e as portagens personzalidas do C-P-T sao mostrada neste arquivo "single-pet_post_type_key.php"
*/

//https://www.advancedcustomfields.com/resources/adding-fields-posts/
/*
    $fields_pet2 = [
        'tutor',
        'qtd_integrantes', 
        'data_criacao', 
        'instituicao_pertencente', 
        'cursos_abrangentes',
        'link_site',
        'estado',
        'cidade',
        'campus',
        'maps' => array(
            'longitude',
            'latitude',
            'zoom'
        )
    ];
*/
get_header();
the_post();

// vars
$location = get_field('location');
$thumbnail = get_field('thumbnail');
$tutor = get_field('tutor');
$qtd_integrantes = get_field('qtd_integrantes');
$data_criacao = get_field('data_criacao');
$instituicao_pertencente = get_field('instituicao_pertencente');
$cursos_abrangentes = get_field('cursos_abrangentes');
$link_site = get_field('link_site');
$estado = get_field('estado');
$cidade = get_field('cidade');
$campus = get_field('campus');


?>

<div class="wrap">
	
	<div id="event-hero">
		
		
		
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
		
		<h2><?php the_title(); ?></h2>
		<h3><?php the_field('date'); ?> from <?php the_field('start_time'); ?> to <?php the_field('end_time'); ?></h3>
		<h4><?php echo $location['address']; ?></h4>
		<?php echo get_post_meta($post->ID, 'nome_tutor', true); /* nao sei pq isso n funciona*/?>

		
	</div>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php the_content(); ?>
		</main>
	</div>
	
</div>

<?php get_footer(); ?>