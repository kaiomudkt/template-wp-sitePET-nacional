<?php

// Register Custom Post Type
//funcao que gera meno de adm do custom-post-type
// Register Custom Post Type
//https://generatewp.com/post-type/
function pet_post_type() {

	$labels = array(
		'name'                  => _x( 'Programa de Educação Tutorial', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'pet', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Gerenciador PET', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Lista PETs', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos os PETs', 'text_domain' ),
		'add_new_item'          => __( 'Adicionando novo PET no sistema', 'text_domain' ),
		'add_new'               => __( 'Adicionar novo PET', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Editar PET', 'text_domain' ),
		'update_item'           => __( 'Atualizar PET', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'PET', 'text_domain' ),
		'description'           => __( 'Tipo PET, destinado categorizar PET.', 'text_domain' ),
		'labels'                => $labels,
		//'supports'              => array( 'title', 'thumbnail', 'excerpt', 'custom-fields','comments' ),//'custom-fields' no momento q for add novo pet, parece a opção de fild customizado
		'supports'              => array( 'title', 'thumbnail', 'excerpt', 'comments' ),//exemplo de parametros
		'taxonomies'            => array( 'category'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'			=> true,
		'rest_base'          	=> 'Pets',
		'menu_position'         => 5,
		'show_in_rest'		 	=> true,
		'rest_base'             => 'pets',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'menu_icon'				=> 'dashicons-groups',
		'rewrite' => array('slug' => false, 'with_front' => false),
		'query_var' => true,
	);
	register_post_type( 'program_edu_tutorial', $args );//program_edu_tutorial é a chave identificadora do C-P-T PET

}
add_action( 'init', 'pet_post_type');





//esse metodo permite que o CPT-PET seja listado por categoria
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'post', 'program_edu_tutorial'); // don't forget nav_menu_item to allow menus to work!
    $query->set('post_type',$post_type);
    return $query;
    }
}