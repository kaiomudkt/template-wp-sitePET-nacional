<?php

function api_pet_post($request) {
  $user = wp_get_current_user();
  $user_id = $user->ID;

  if($user_id > 0) {
    $nome = sanitize_text_field($request['nome']);
    $unidade_da_federacao = sanitize_text_field($request['unidade_da_federacao']);
    $campus = sanitize_text_field($request['campus']);
    //criar mais itens
    $descricao = sanitize_text_field($request['descricao']);
    $usuario_id = $user->user_login;

    $response = array(
      'post_author' => $user_id,
      'post_type' => 'pet',//acho q esta certo
      'post_title' => $nome,
      'post_status' => 'publish',
      'meta_input' => array(
        'nome' => $nome,
        'unidade_da_federacao' => $unidade_da_federacao,
        'campus' => $campus,
        'descricao' => $descricao,
        'usuario_id' => $usuario_id,
        'ativo' => 'false',
      ),
    );

    //
    $pet_id = wp_insert_post($response);
    $response['id'] = get_post_field('post_name', $pet_id);

    $files = $request->get_file_params();

    if($files) {
      require_once(ABSPATH . 'wp-admin/includes/image.php');
      require_once(ABSPATH . 'wp-admin/includes/file.php');
      require_once(ABSPATH . 'wp-admin/includes/media.php');

      foreach ($files as $file => $array) {
        media_handle_upload($file, $pet_id);
      }
    }
  } else {
    $response = new WP_Error('permissao', 'Usuário não possui permissão.', array('status' => 401));
  }
  return rest_ensure_response($response);
}

function registrar_api_produto_post() {
  register_rest_route('grupospet', '/produto', array(//acho q é assim
    array(
      'methods' => WP_REST_Server::CREATABLE,
      'callback' => 'api_pet_post',
    ),
  ));
}

add_action('rest_api_init', 'registrar_api_produto_post');

