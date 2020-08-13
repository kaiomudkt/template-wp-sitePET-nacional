<?php
function registrar_api_pet_get() {/*registra rota da API para ser acessana na URL*/
  register_rest_route('api', '/pet', array(/*http://dominioMeuWordPress/wp-json/api/pet*/
    array(
      'methods' => WP_REST_Server::READABLE,/*GET*/
      'callback' => 'api_pet_get',/*chama o metodo*/
    ),
  ));
}
add_action('rest_api_init', 'registrar_api_pet_get');

/*
  url: 'http://dominio/wp-json/api/pet?estado='+estado,
  Pega o valor do parametro 'estado'
*/
function api_pet_get() {
  $estado = $_GET["estado"]; 
  $response = consulta_pets($estado);
  return $response;
  //return json_encode($response);  
}

/* metodo que consulta no BD os PETs pertecentes ao um estado*/
function consulta_pets($estado_selecionado){
  //https://www.billerickson.net/code/wp_query-arguments/
  $query_pet = new WP_Query(
    [
    //'posts_per_page' => 10, 
    //'author' =>  1,
    //'meta_compare' => 'not like'
    //'paged' => $currentPage,
      'post_type' => 'program_edu_tutorial', 
      'meta_key' => 'estado',
      'meta_value' => $estado_selecionado
    ]
  );
  return $query_pet->get_posts(); //pega só os POSTs da query
}
?>