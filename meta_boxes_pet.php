<?php
    /**
 * Register meta boxes.
 */
function registrar_meta_boxes_pet() {
    add_meta_box( 
        'id_meta_box_pet',
        'Dados do PET', 
        'pet_display_callback', 
        'program_edu_tutorial', 
        'normal', 
        'high' 
    );
}
add_action( 'add_meta_boxes', 'registrar_meta_boxes_pet' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function pet_display_callback( $post ) {
    require_once("form-pet.php");
}


/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function salva_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields_pet = [
        'tutor',
        'qtd_integrantes', 
        'data_criacao', 
        'instituicao_pertencente', 
        'cursos_abrangentes',
        'link_site',
        'cidade',
        'campus',
        'estado',
        'longitude',
        'latitude',
        'zoom',
        'localizacao'
    ];
    /*
    'foreach percorre o vetor 'fields_pet'
    sendo que cada item do vetor é um parametro/field */
    foreach ( $fields_pet as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {/*existe esse elemento no na estrutura de dados (array) ? */
            /* salva no post deste '$post_id',
            chave: valor */
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }else{
            // echo 'nao exite esse parameto' . $field;
        }
    }
}
add_action( 'save_post', 'salva_meta_box' );

?>