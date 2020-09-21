<?php
//https://developer.wordpress.org/reference/functions/wp_add_dashboard_widget/
//https://rudrastyh.com/wordpress/dashboard-widgets-with-options.html

function registrar_url_estado_add_dashboard_widget(){
    wp_add_dashboard_widget(  
        'id_widget_url_estado',
        'URL de cada site estadual',
        esc_html__('callback_lista_URLs_estados'),
        esc_html__('callback_form_CRUD_URLs_estados'),
        $callback_args = null
    ); 
}

add_action( 'wp_dashboard_setup', 'registrar_url_estado_add_dashboard_widget' );

function callback_lista_URLs_estados(){
    ?>
    <p>
        Faz a solicitação GET para o endereço.
        Esse caminho '/wp-json/wp/v2/posts' acessa a API REST do WP esse parametro '?per_page=1' pede somente 1 poste.
        Pode acontecer de dar problema com '/wp-json/wp/v2/posts', se der, use '?rest_route=/wp/v2/posts'
        <br>Coloque o endereço neste padrão: "https://www.ufms.br"        
   </p>
    <?php
    $estados = [
        'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG','PA',
        'PB', 'PR','PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF',
    ];
    foreach ($estados as $estado) {
    ?>
        <p class="meta-options campos">
            <label for="estado"><?php echo $estado; ?></label>
            <input 
                id="<?php echo $estado; ?>"
                Disabled
                type="text"
                name="<?php $estado ?>"
                value="<?php echo esc_attr( get_option($estado) ); ?>"
            >
        </p>

    <?php
    }
}

//salvar dados do input digitado pelo usuario 
function callback_form_CRUD_URLs_estados() {
    ?>
    <p>
        Faz a solicitação GET para o endereço.
        Esse caminho '/wp-json/wp/v2/posts' acessa a API REST do WP esse parametro '?per_page=1' pede somente 1 poste.
        Pode acontecer de dar problema com '/wp-json/wp/v2/posts', se der, use '?rest_route=/wp/v2/posts'
        <br>Coloque o endereço neste padrão: "https://www.ufms.br"        
   </p>

   <input 
        id="link_nacional"
        name="link_nacional" 
        type="hidden" 
        value="<?php echo esc_attr( get_option('link_nacional') ); ?>"
    >
    <?php
    $estados = [
        'link_nacional', 'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG','PA', 'PB', 'PR','PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF'];
    foreach ($estados as $estado) {
        if ( isset( $_POST['submit'] ) ) {
            if ( isset($_POST[$estado]) ) {
                update_option($estado, sanitize_text_field($_POST[$estado]) );
            }
        }
        ?>
        <p class="meta-options campos">
            <label for="estado"><?php echo $estado; ?></label>
            <input 
                id="<?php echo $estado; ?>"
                type="text"
                name="<?php echo $estado ?>"
                value="<?php echo esc_attr( get_option($estado) ); ?>"
            >
        </p>
        <?php
    }
}

?>
