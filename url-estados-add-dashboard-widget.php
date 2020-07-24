<?php
//https://developer.wordpress.org/reference/functions/wp_add_dashboard_widget/
//https://www.cssigniter.com/make-wordpress-dashboard-widget/

function registrar_url_estado_add_dashboard_widget(){
    wp_add_dashboard_widget(  
        'id_widget_url_estado',
        'URL de cada site estadual',
        esc_html__('html_callback_url_estados'),
        recupera_post_dashboard_widget_news_config_handler,
        $callback_args = null
    ); 

}

add_action( 'wp_dashboard_setup', 'registrar_url_estado_add_dashboard_widget' );

function html_callback_url_estados($var){
    // $options = get_option( 'MS' );
    
    // 
    //     <div>    
    //         <table style="width:100%">
    //             <tr>
    //                 <th>Estado</th>
    //                 <th>URL</th>
    //             </tr>
    //             <tr>
    //                 <td>MS</td>
    //                 <td><input type="text" name="MS" value="<php echo esc_attr( $options['items'] ); ? "></td>
    //             </tr>
    //             <tr>
    //                 <td>AM</td>
    //                 <td><input type="text"></td>
    //             </tr>
                
    //         </table>
    //     </div>
    // 
    //__FILE__ = /var/www/html/wp-content/themes/template-wp-sitePET-nacional/url-estados-add-dashboard-widget.php
    
    // remove_action( 'welcome_panel', 'wp_welcome_panel' );
    // // Remove all Dashboard widgets.
    // global $wp_meta_boxes;
    // unset( $wp_meta_boxes['dashboard'] );
 
    // // Add custom dashbboard widget.
    // add_meta_box( 
    //     'dashboard_widget_example',
    //     __( 'Example Widget', 'example-text-domain' ),
    //     __NAMESPACE__ . 'render_example_widget',
    //     'dashboard',
    //     'column3',  // $context: 'advanced', 'normal', 'side', 'column3', 'column4'
    //     'high'     // $priority: 'high', 'core', 'default', 'low'
    // );
    // if ( array_key_exists( 'support-request-submitted', $_GET ) && true == $_GET[ 'support-request-submitted' ] ) {
    //     $now = date( get_option( 'time_format' ) );
    //     echo '<div class="updated inline"><p><strong>Support Request Submitted at '.$now.'</strong></p></div>';
    // }
    
    // $current_user = wp_get_current_user();
    
    // // Exclude the user first and last name only if set.
    // $name_from = '';
    // if ( strlen( $current_user->user_firstname ) && strlen( $current_user->user_lastname ) ) {
    //     $name_from = $current_user->user_firstname . ' ' . $current_user->user_lastname;
    // }
    
    
    
    //add_meta_box( 'id', 'Dashboard Widget Title', 'dash_widget', 'dashboard', 'side', 'high' );

    ?>

<form method="post" action="<?php echo get_template_directory_uri(); ?>dcwd-support-request.php">
<p>If you are having problems with your site or need some changes made, please describe them below.</p>
<p>A support request will be opened and Damien will respond.</p>
<textarea name="support_issue" rows="10" cols="50" id="support_issue" class="large-text code"></textarea>
<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Submit Support Request" /></p>
<input type="hidden" name="support-request-nonce" value="<?php echo wp_create_nonce('support-request-nonce'); ?>" />
<input type="hidden" name="email_from" value="<?php echo $current_user->user_email; ?>" />
<?php if ( strlen( $name_from ) ) { ?>
<input type="hidden" name="name_from" value="<?php echo $current_user->user_firstname, ' ', $current_user->user_lastname; ?>" />
<?php } ?>
</form>

<php?
}

function render_example_widget() {
    ?>
        <p>Do something.</p>
    <?php
}





function recupera_post_dashboard_widget_news_config_handler() {
	$options = get_option( 'MS' );

	if ( isset( $_POST['submit'] ) ) {
		if ( isset( $_POST['rss_items'] ) && intval( $_POST['rss_items'] ) > 0 ) {
			$options['items'] = intval( $_POST['rss_items'] );
		}

		update_option( 'MS', 'http://172.16.28.2' );
	}

    ?>
	<p>
		<label><?php _e( 'Numberrr of RSS articles:', 'dw' ); ?>
			<input type="text" name="rss_items" value="<?php echo esc_attr( $options['items'] ); ?>" />
		</label>
	</p>
	<?php
}

add_action( 'admin_enqueue_scripts', 'dw_scripts' );
function dw_scripts( $hook ) {
	$screen = get_current_screen();
	if ( 'dashboard' === $screen->id ) {
		wp_enqueue_script( 'dw_script', plugin_dir_url( __FILE__ ) . 'path/to/script.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_style( 'dw_style', plugin_dir_url( __FILE__ ) . 'path/to/style.css', array(), '1.0' );
	}
}












//salvar dados do input digitado pelo usuario 
function salva_url_estado_add_dashboard_widget( $post_id ) {
    //if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    if( !$widget_options = get_option( 'my_dashboard_widget_options' ) ){
        $widget_options = array( );
    }
    $estados = [
        'MS',
        'MT', 
        'data_criacao', 
    ];

    /*
    'foreach percorre o vetor 'estados'
    sendo que cada item do vetor é um parametro/field */
    foreach ( $estados as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {/*existe esse elemento no na estrutura de dados (array) ? */
            /* salva dados na tabela wp-options, 
            'chave': 'valor' */
            // Create an option to the database
            add_option( $option, $value = '', $deprecated = '', $autoload = 'yes' );
            //update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }else{
            // echo 'nao exite esse parameto' . $field;
        }
    }
}

add_action( '', 'salva_url_estado_add_dashboard_widget' );



?>
