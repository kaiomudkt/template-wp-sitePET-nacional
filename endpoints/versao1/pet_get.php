<?php
function api_pet_get() {
    $estado = $_GET["estado"]; //url: 'http://localhost:8083/wp-json/api/pet?estado='+estado,
    //preciso pegar o parametro estado, nao estou conseguindo
    $response = consulta_pets($estado);
    return $response;
  }
  
  function registrar_api_pet_get() {
    register_rest_route('api', '/pet', array(
      array(
        'methods' => WP_REST_Server::READABLE,/*GET*/
        'callback' => 'api_pet_get',
      ),
    ));
  }
  add_action('rest_api_init', 'registrar_api_pet_get');

/* metodo que consulta no BD os PETs pertecentes ao um estado,
posteriormente, provavelmente, podemos precisar que alem do nome do PET que pertence a esse estado,
talvez tb precisemos do metadados tb, e provavelmente seja aqui a mudança,
algo do tipo, passando como mais um parametro, outro array, com os meta dados esperados a ser retornado, algo assim  */
function consulta_pets($estado_selecionado){
    $estado_ = 'MG';
    $query_pet = new WP_Query(array(
        'post_type' => 'pet_post_type_key', 
        //'posts_per_page' => 10, 
        'meta_key' => 'estado',
        'meta_value' => "'$estado_'"
        //'author' =>  1,
        //'meta_compare' => 'not like'
        //'paged' => $currentPage
    ));
    $posts = $query_pet->get_posts();
    return $posts;
  
  }
  add_action('rest_api_init', 'consulta_pets');
  //add_action( 'wp_footer', 'consulta_pets' );
?>