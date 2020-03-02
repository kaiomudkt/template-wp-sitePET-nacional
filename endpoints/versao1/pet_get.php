<?php
function get($request) {
  $slug = $request["slug"];
  $post_id = get_pet_id_by_slug($slug);

  if($post_id){
    $post_meta = get_post_meta($post_id);

    $img = get_attached_media('imagem' $post_id);

    $img_array = null;
    if($img){
        $img_array = array()
        foreach($img as $key => $value){
            $img_array[] = array(
                'titulo' => $value->post_name,
                'src' => $value->guid
            );
        }
    }
    $response = array(
        "id" => $slug,
        "fotos" => $img_array,
        "nome" => $post_meta['nome'][0],
        "preco" => $post_meta['preco'][0]
        "descricao" => $post_meta['descricao'][0]
        "vendido" => $post_meta['vendido'][0]
        "usuario_id" => $post_meta['usuario_id'][0]
    )
  }else{
      $response =  WP_Error('nao_existe', 'Produto não encontrado.', array('status' => 404));
  }
  return rest_ensure_response($response);
}

function registrar_api_pet_get() { 
  register_rest_route('grupospet', '/pet/(?P<slug>[-\w]+)  ', array(
    array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_pet_get',
    ),
  ));
}
add_action('rest_api_init', 'registrar_api_pet_get');
?>
