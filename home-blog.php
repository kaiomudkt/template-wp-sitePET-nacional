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

/**
 * adicionar a URL de cada site estadual nesse Array,
 * lembre de colocar nesse formato
 * 1º o dominio: http://meuDominio.com.br
 */
$estados = [
    'MS' => 'https://www.facom.ufms.br',
    'MT' => 'https://www.ufms.br',
    'GO' => 'https://br.wordpress.org',
    'RR' => 'https://br.wordpress.org',
    'AM' => 'https://br.wordpress.org',
    'AP' => 'https://br.wordpress.org',
    'AC' => 'https://br.wordpress.org',
    'RO' => 'https://br.wordpress.org',
    'MA' => 'https://br.wordpress.org',
];
?>

<section class="content_section bg_gray">
    <div class="content row_spacer no_padding">
        <div class="main_title centered upper">
            <h2 id='blog-heading'>Últimas postagens
                <span class="line">
                    <i class="fa fa-edit"></i>
                </span>
            </h2>
        </div>
        <div class="centro">
            <div class="hm_blog_grid">
                <ul class="estouro">
                    <?php 
                        foreach($estados as $estado => $url){
                            ?>
                            <li class=" animated grid-item" data-animation-delay="<?php echo 300 * $i; ?>" data-animation="rotateInUpLeft">
                                <div class="blog_grid_con">
                                    <?php

                                    /* Faz a solicitação GET para o endereço.
                                     Esse caminho '/wp-json/wp/v2/posts' acessa a API REST do WP esse parametro '?per_page=1' pede somente 1 poste,
                                       acredito que seja o ultimo
                                    */
                                    $request = wp_remote_get( $url."/wp-json/wp/v2/posts?per_page=1", $arguments);
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
                                                    echo '<a href="'.$url.'">' 
                                                        .'<h5>'. $estado .'</h5>'.
                                                    '</a>';
                                                    echo '<a href="' . esc_url( $rest_post->link ) . '">' . $rest_post->title->rendered . '</a>';
                                                echo '</li>';
                                            }
                                            echo '</ul>';
                                        }else{
                                            echo 'erro: is_wp_error( $data)';
                                            // em produção tem que tirar o echo, para n mostrar pro usuario final se der erro
                                        }
                                    }else{
                                        $error_msg = $request->get_error_message();
                                            // em produção tem que tirar o echo, para n mostrar pro usuario final se der erro
                                            echo "error: request = wp_remote_get(): $error_msg";
                                    }
                                    ?>
                                </div>
                            </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>