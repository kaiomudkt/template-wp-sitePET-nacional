<?php
/**
 * function to return a custom field value.
 */
function alep_get_custom_field( $value ) {
    global $post;

    $custom_field = get_post_meta( $post->ID, $value, true );
    if ( !empty( $custom_field ) )
        return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );

    return false;
}

/**
 * Register the Meta box
 */
function alep_add_custom_meta_box() {
    add_meta_box( 'alep-meta-box', __( 'Metabox Example', 'alep' ), 'alep_meta_box_output', 'post', 'normal', 'high' );
    add_meta_box( 'alep-meta-box', __( 'Metabox Example', 'alep' ), 'alep_meta_box_output', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'alep_add_custom_meta_box' );


/**
 * Output the Meta box
 */
function alep_meta_box_output( $post ) {
    // create a nonce field
    wp_nonce_field( 'my_alep_meta_box_nonce', 'alep_meta_box_nonce' ); ?>

    <p>
        <label for="alep_textfield1"><?php _e( 'Textfield 1', 'alep' ); ?>:</label>
        <input type="text" name="alep_textfield1" id="alep_textfield1" value="<?php echo alep_get_custom_field( 'alep_textfield1' ); ?>" size="70" />
    </p>

    <p>
        <label for="alep_textfield2"><?php _e( 'Textfield 2', 'alep' ); ?>:</label>
        <input type="text" name="alep_textfield2" id="alep_textfield2" value="<?php echo alep_get_custom_field( 'alep_textfield2' ); ?>" size="70" />
    </p>

    <p>
        <label for="alep_textfield3"><?php _e( 'Textfield 3', 'alep' ); ?>:</label>
        <input type="text" name="alep_textfield3" id="alep_textfield3" value="<?php echo alep_get_custom_field( 'alep_textfield3' ); ?>" size="70" />
    </p>

    <p>
        <label for="alep_textfield4"><?php _e( 'Textfield 4', 'alep' ); ?>:</label>
        <input type="text" name="alep_textfield4" id="alep_textfield4" value="<?php echo alep_get_custom_field( 'alep_textfield4' ); ?>" size="70" />
    </p>

    <p>
        <label for="alep_textfield5"><?php _e( 'Textfield 5', 'alep' ); ?>:</label>
        <input type="text" name="alep_textfield5" id="alep_textfield5" value="<?php echo alep_get_custom_field( 'alep_textfield5' ); ?>" size="70" />
    </p>

    <?php
}


/**
 * Save the Meta box values
 */
function alep_meta_box_save( $post_id ) {
    // Stop the script when doing autosave
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // Verify the nonce. If insn't there, stop the script
    if( !isset( $_POST['alep_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['alep_meta_box_nonce'], 'my_alep_meta_box_nonce' ) ) return;

    // Stop the script if the user does not have edit permissions
    if( !current_user_can( 'edit_post', get_the_id() ) ) return;

    // Save the textfield
    if( isset( $_POST['alep_textfield1'] ) )
        update_post_meta( $post_id, 'alep_textfield1', esc_attr( $_POST['alep_textfield1'] ) );

    // Save the textfield
    if( isset( $_POST['alep_textfield2'] ) )
        update_post_meta( $post_id, 'alep_textfield2', esc_attr( $_POST['alep_textfield2'] ) );

    // Save the textfield
    if( isset( $_POST['alep_textfield3'] ) )
        update_post_meta( $post_id, 'alep_textfield3', esc_attr( $_POST['alep_textfield3'] ) );

    // Save the textfield
    if( isset( $_POST['alep_textfield4'] ) )
        update_post_meta( $post_id, 'alep_textfield4', esc_attr( $_POST['alep_textfield4'] ) );

    // Save the textfield
    if( isset( $_POST['alep_textfield5'] ) )
        update_post_meta( $post_id, 'alep_textfield5', esc_attr( $_POST['alep_textfield5'] ) );
}
add_action( 'save_post', 'alep_meta_box_save' );