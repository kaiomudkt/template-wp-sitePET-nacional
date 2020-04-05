<?php
/*
Este arquivo substitui o arquivo "home-blog.php" do tema Pai "Kyma"
que esta sendo usado para realizar as postagens dos ultimos post feito nesta instalacao do WP.

Ja este arquivo atual "home-blog.php" do tema filho "gruposPET" esta pegando as postagens do site estadual via API,
ainda falta fazer o desinger, ou aproveitar o designer do "home-blog.php" do tema "Kyma"
*/



//https://developer.wordpress.org/reference/functions/rest_url/
//https://github.com/WP-API/client-js/blob/master/client-js.php
//https://github.com/oskarrough/ember-wordpress
//https://codex.wordpress.org/Function_Reference/wp_remote_get


$arguments = array('method' => 'GET');
/* esse caminho '/wp-json/wp/v2/posts' acessa a API REST do WP
   esse parametro '?per_page=1' pede somente 1 poste,
   acredito que seja o ultimo
*/
/* o objetivo agora é pegar de diversos sites diferentes a ultima postagem de cada Estado do BR */
$url = 'https://www.facom.ufms.br/wp-json/wp/v2/posts?per_page=1';

// Faz a solicitação GET para o endereço.
$request = wp_remote_get( $url, $arguments);
// Se não houve erro...
if ( ! is_wp_error( $request ) ) {
    // pegamos o "corpo" da resposta recebida...
    $body = wp_remote_retrieve_body( $request );
    // e transformamos de JSON em um array PHP normal.
    $data = json_decode( $body );
 
    // Se não houve erro nesta etapa, iteramos pelo array
    // e montamos uma lista com título e link.
    if ( ! is_wp_error( $data ) ) {
	    echo '<ul>';
	    foreach( $data as $rest_post ) {
		    echo '<li>';
			    echo '<a href="' . esc_url( $rest_post->link ) . '">' . $rest_post->title->rendered . '</a>';
		    echo '</li>';
	    }
	    echo '</ul>';
    }else{
    	echo 'erro: is_wp_error( $data)';
    }
}else{
	$error_msg = $request->get_error_message();
	echo "error: request = wp_remote_get(): $error_msg";
}