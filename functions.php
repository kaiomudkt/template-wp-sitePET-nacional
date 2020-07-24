<?php


// carrega os arquivos css do tema pai
function carrega_estilos(){
    //nome da folha de estilo = estilo-pai
    //fica nesse endereco =  get_template_directory_uri() . '/style.css'
    wp_enqueue_style('estilos-pai', get_template_directory_uri() . '/style.css');
    //adiciona novos estilos
    wp_enqueue_style('estilo_filho_2', get_stylesheet_directory_uri() . '/css/estilo2.css');
    wp_enqueue_style('estilo_filho_3', get_stylesheet_directory_uri() . '/css/estilo3.css');
    wp_enqueue_style('estilo_filho_4', get_stylesheet_directory_uri() . '/css/estilo4.css');
    
}
//acao que vai chamar a funcao
//momendo em que essa funcao vai ser executada = wp_enqueue_scripts
//funcao que vai ser executada = carrega_estilos
add_action('wp_enqueue_scripts' , 'carrega_estilos');

/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

//se for de tema pai, carrega desse caminho o custom-post-type
//$template_diretorio = get_template_directory_uri();
//require_once($template_diretorio . "/custom-post-type/pet.php");

//se for de tema filho, carrega desse caminho o custom-post-type
//caminho (/var/www/html/wp-content/themes/GruposPET)
$template_diretorio_filho = get_stylesheet_directory();
//echo $template_diretorio_filho;
require_once($template_diretorio_filho . "/cria-custom-post-type-pet.php");

/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

//endpoints
//api rest wp filtrando por metadata fields, TO DO , terminar de implementando
require_once($template_diretorio_filho . "/endpoints/versao1/pet_get.php");


/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

//tempo que demora para expira o token
//https://wordpress.org/plugins/jwt-authentication-for-wp-rest-api/
// function expire_token() {
//   return time() + (60 * 60);//1 hora
// }
// add_action('jwt_auth_expire', 'expire_token');

/////////////////////////////////////////////////////////////////////////////////
/*
O arquivo 'meta_boxes.php' vai cuidar dos metadados,
do custom-Post-Type do tipo PET
*/
require_once($template_diretorio_filho . "/meta_boxes_pet.php");

/*
criar arquivo que add metadado no USER, para saber de qual estado esse USER vai gerenciar
https://developer.wordpress.org/reference/functions/add_user_meta/
add_user_meta( int $user_id, string $meta_key, mixed $meta_value, bool $unique = false )
*/

require_once($template_diretorio_filho . "/user-meta.php");

//Registra um tamanho de imagem para a miniatura da postagem.
set_post_thumbnail_size(1280, 720, true);

//registrar wp_add_dashboard_widget das URLs dos estados(UF), local->"work area"
require_once($template_diretorio_filho . "/url-estados-add-dashboard-widget.php");

//