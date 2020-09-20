<?php
/*
  registra rota da API para ser acessana na URL
  methods: GET
*/
function registrar_api_pet_get() {
  register_rest_route('api', '/pet',
    array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_pet_get',
      'permission_callback' => '__return_true'
    )
  );
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

/* 
  metodo que consulta no BD os PETs pertecentes ao um estado
  https://www.billerickson.net/code/wp_query-arguments/
*/
function consulta_pets($estado_selecionado){
  $query_pet = new WP_Query(
    [
      'post_type' => 'program_edu_tutorial', 
      'meta_key' => 'estado',
      'meta_value' => $estado_selecionado
    ]
  );
  return $query_pet->get_posts(); //pega só os POSTs da query
}
?>