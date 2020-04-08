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

echo "$tutor";
echo "$qtd_integrantes";
echo "$data_criacao";
echo "$instituicao_pertencente";
echo "$cursos_abrangentes";
echo "$link_site";
echo "$estado";
echo "$cidade";
echo "$campus";
?>

<div class="wrap">
	
	<div id="event-hero">
		
		<?php if( $location ): ?>
		<div id="event-map" class="acf-map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
		</div>
		<?php endif; ?>
		
		<?php if( $tutor ): ?>
		<div id="tutor" class="">
			<div class="marke" data-lat="<?php echo $tutor; /*nao sei pq isso funciona*/?>"></div>
		</div>
		<?php endif; ?>

		<?php if( $tutor ): ?>
		<div id="tutor" class="">
			<div class="marke" data-lat="<?php echo $tutor['lat']; /*nao sei pq isso funciona*/?>"></div>
		</div>
		<?php endif; ?>

		<?php if( $thumbnail ): ?>
			<img class="thumbnail" src="<?php echo $thumbnail['url']; ?>" alt="<?php echo $thumbnail['alt']; ?>" />
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