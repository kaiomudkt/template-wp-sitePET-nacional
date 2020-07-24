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

function callback_lista_URLs_estados($var){
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
function callback_form_CRUD_URLs_estados( $post_id ) {
    ?>
    <p>
        Faz a solicitação GET para o endereço.
        Esse caminho '/wp-json/wp/v2/posts' acessa a API REST do WP esse parametro '?per_page=1' pede somente 1 poste.
        Pode acontecer de dar problema com '/wp-json/wp/v2/posts', se der, use '?rest_route=/wp/v2/posts'
        Coloque o endereço neste padrão: "https://www.ufms.br"        
   </p>
    <?php
    $estados = [
        'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG','PA',
        'PB', 'PR','PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF',
    ];
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







function misha_process_my_dashboard_widget() {
 
    // basic checks and save the widget settings here
    if( 'POST' == $_SERVER['REQUEST_METHOD'] 
     && isset( $_POST['my_custom_post'] ) ) {
        update_option( 'custom_post', absint($_POST['my_custom_post']) );
    }
 
    echo '<h3>Select a page that will be displayed in this widget</h3>'
    . wp_dropdown_pages( array(
        'post_type' => 'page',
        'selected' => get_option( 'custom_post' ),
        'name' => 'my_custom_post',
        'id' => 'my_custom_post',
        'show_option_none' => '- Select -',
        'echo' => false
    ) );
 
}
?>
