<?php

function pet_scheme($slug) {
  $post_id = get_pet_id_by_slug($slug);
  if($post_id) {
    $post_meta = get_post_meta($post_id);

    $images = get_attached_media('image', $post_id);
    $images_array = null;

    if($images) {
      $images_array = array();
      foreach($images as $key => $value) {
        $images_array[] = array(
          'titulo' => $value->post_name,
          'src' => $value->guid,
        );
      }
    }
    //possivelmente vai estar errado isso
    $response = array(
      "id" => $slug, 
      "fotos" => $images_array,
      "qtd_integrantes" => $post_meta['qtd_integrantes'][0],
      "data_criacao" => $post_meta['data_criacao'][0],
      "instituicao" => $post_meta['instituicao'][0],
      "cursos_abrangentes" => $post_meta['cursos_abrangentes'][0],
      "link" => $post_meta['link'][0],
      "estado" => $post_meta['estado'][0],
      "cidade" => $post_meta['cidade'][0],
      "campus" => $post_meta['campus'][0],
      "maps" => $post_meta['maps'][0],
    );

  } else {
    $response = new WP_Error('naoexiste', 'PET não encontrado.', array('status' => 404));
  }
  return $response;
}

function api_produto_get($request) {
  $response = produto_scheme($request["slug"]);
  return rest_ensure_response($response);
}

function registrar_api_produto_get() {
  register_rest_route('api', '/produto/(?P<slug>[-\w]+)', array(
    array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_produto_get',
    ),
  ));
}
add_action('rest_api_init', 'registrar_api_produto_get');

// API PRODUTOS
function api_produtos_get($request) {

  $q = sanitize_text_field($request['q']) ?: '';
  $_page = sanitize_text_field($request['_page']) ?: 0;
  $_limit = sanitize_text_field($request['_limit']) ?: 9;
  $usuario_id = sanitize_text_field($request['usuario_id']);

  $usuario_id_query = null;
  if($usuario_id) {
    $usuario_id_query = array(
      'key' => 'usuario_id',
      'value' => $usuario_id,
      'compare' => '='
    );
  }

  $vendido = array(
    'key' => 'vendido',
    'value' => 'false',
    'compare' => '='
  );

  $query = array(
    'post_type' => 'produto',
    'posts_per_page' => $_limit,
    'paged' => $_page,
    's' => $q,
    'meta_query' => array(
      $usuario_id_query,
      $vendido,
    )
  );

  $loop = new WP_Query($query);
  $posts = $loop->posts;
  $total = $loop->found_posts;

  $produtos = array();
  foreach ($posts as $key => $value) {
    $produtos[] = produto_scheme($value->post_name);
  }

  $response = rest_ensure_response($produtos);
  $response->header('X-Total-Count', $total);

  return $response;
}

function registrar_api_produtos_get() {
  register_rest_route('api', '/produto', array(
    array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_produtos_get',
    ),
  ));
}
add_action('rest_api_init', 'registrar_api_produtos_get');


//////////////////////////////////////////////////////
function consulta_pets($estado_selecionado){
  $query_pet = new WP_Query(array(
    'post_type' => 'pet_post_type_key', 
    'posts_per_page' => 10, 
    'meta_key' => 'estado',
    'meta_value' => 'MS'
    /*'author' =>  1,
    /*'meta_compare' => 'not like',
    'paged' => $currentPage*/
  ));
  var_dump(json_encode($query_pet));
  return rest_ensure_response($query_pet);

}
add_action('rest_api_init', 'consulta_pets');
//add_action( 'wp_footer', 'consulta_pets' );


?>