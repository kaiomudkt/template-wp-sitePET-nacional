<?php

function pet($slug) {
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

    $response = array(
      "id" => $slug, 
      "fotos" => $images_array,
      "nome" => $post_meta['nome'][0],
      "descricao" => $post_meta['descricao'][0],
      "postado" => $post_meta['postado'][0],
      "usuario_id" => $post_meta['usuario_id'][0],
    );

  } else {
    $response = new WP_Error('nao_existe', 'PET não encontrado.', array('status' => 404));
  }
  return $response;
}

function api_pet_get($request) {
  $response = pet_scheme($request["slug"]);
  return rest_ensure_response($response);
}

function registrar_api_pet_get() {
  register_rest_route('api', '/pet/(?P<slug>[-\w]+)', array(
    array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_pet_get',
    ),
  ));
}
add_action('rest_api_init', 'registrar_api_pet_get');

// API PETS
function api_pets_get($request) {

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

  $postado = array(
    'key' => 'postado',
    'value' => 'false',
    'compare' => '='
  );

  $query = array(
    'post_type' => 'pet',
    'posts_per_page' => $_limit,
    'paged' => $_page,
    's' => $q,
    'meta_query' => array(
      $usuario_id_query,
      $postado,
    )
  );

  $loop = new WP_Query($query);
  $posts = $loop->posts;
  $total = $loop->found_posts;

  $pets = array();
  foreach ($posts as $key => $value) {
    $pet[] = pet_scheme($value->post_name);
  }

  $response = rest_ensure_response($pets);
  $response->header('X-Total-Count', $total);

  return $response;
}

function registrar_api_pets_get() {
  register_rest_route('api', '/pet', array(
    array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_pets_get',
    ),
  ));
}
add_action('rest_api_init', 'registrar_api_pets_get');


?>