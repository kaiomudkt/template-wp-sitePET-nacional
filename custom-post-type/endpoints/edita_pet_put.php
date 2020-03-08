<?php


// nao fiz esse arquivo ainda
//copia do arquivo usuario_put.php
function api_pet_put($request) {
  $user = wp_get_current_user();
  $user_id = $user->ID;

  if($user_id > 0) {
    $email = sanitize_email($request['email']);
    $senha = $request['senha'];
    $nome = sanitize_text_field($request['nome']);
    $rua = sanitize_text_field($request['rua']);
    $cep = sanitize_text_field($request['cep']);
    $numero = sanitize_text_field($request['numero']);
    $bairro = sanitize_text_field($request['bairro']);
    $cidade = sanitize_text_field($request['cidade']);
    $estado = sanitize_text_field($request['estado']);

    $email_exists = email_exists($email);

    if(!$email_exists || $email_exists === $user_id) {
      $response = array(
        'ID' => $user_id,
        'user_pass' => $senha,
        'user_email' => $email,
        'display_name' => $nome,
        'first_name' => $nome,
      );
/*
	nao sei se tem isso aqui pra metodo PUT
	algo do tipo
	wp_update_custom_post_type($response);
	

	//////////////////////////////
		//https://developer.wordpress.org/reference/functions/wp_update_post/
      wp_update_user($response);

		//https://developer.wordpress.org/reference/functions/update_post_meta/
      update_user_meta($user_id, 'cep', $cep);
      update_user_meta($user_id, 'rua', $rua);
      update_user_meta($user_id, 'numero', $numero);
      update_user_meta($user_id, 'bairro', $bairro);
      update_user_meta($user_id, 'cidade', $cidade);
      update_user_meta($user_id, 'estado', $estado);
*/
      ////////


    } else {
      $response = new WP_Error('email', 'Email já cadastrado.', array('status' => 403));
    }
  } else {
    $response = new WP_Error('permissao', 'Usuário não possui permissão.', array('status' => 401));
  }
  return rest_ensure_response($response);
}

function registrar_api_pet_put() {
  register_rest_route('grupospet', '/pet', array(
    array(
      'methods' => WP_REST_Server::EDITABLE,
      'callback' => 'api_pet_put',
    ),
  ));
}

add_action('rest_api_init', 'registrar_api_pet_put');


?>