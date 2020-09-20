<?php
function registrar_api_get_links_estados() {
  register_rest_route('api', '/links_estados', 
  	array(
      'methods' => WP_REST_Server::READABLE,/*GET*/
      'callback' => 'api_links_estados_get',
      'permission_callback' => '__return_true'
  	)
  );
}
add_action('rest_api_init', 'registrar_api_get_links_estados');

/*
  url: http://localhost:8089/wp-json/api/links_estados
*/
function api_links_estados_get() {
  $response = consulta_links_estadoss();
  return $response;
  //return json_encode($response);  
}

/* 
	metodo que consulta no BD os links_estadoss pertecentes 
	https://www.billerickson.net/code/wp_query-arguments/
*/
function consulta_links_estadoss(){
	$estados = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG','PA', 'PB', 'PR','PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF'];
    $urls = [];
	foreach($estados as $estado){
		$url = esc_url(get_option($estado));
		if ($url != "") {
      $urls[$estado] = $url ;
    }
	}
	return $urls;
}
?>