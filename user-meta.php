<?php
/**
 * https://wpshout.com/how-to-create-and-use-wordpress-user-metadata-user-meta/
 * https://wordpress.stackexchange.com/questions/
 */

add_action('init', function() {
  /**
   * Add new fields above 'Update' button.
   *
   * @param WP_User $user User object.
   */
  function additional_profile_fields( $user ) {

    //$departments = get_terms(['taxonomy' => 'department', 'hide_empty' => false]);
    $estados = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 
    'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS',
    'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF'];
?>
      <table class="form-table">
       <tr>
         <th><label for="estado">Sigla do Estado</label></th>
         <td>
           <?php $estadoAtual = get_user_meta( get_current_user_id(),  'estado', true); 
           //TODO 
           //FAZER ISSO FUNCIONAR
           ?>
           <select id="estado" name="estado" >
             <option value="<?php $estadoAtual ?>" selected> <?php $estadoAtual ?> </option>
             <?php
             /* quando ja salvo, e quiser mostrar, iniciar o select com valor atual */
             // get_user_meta( get_current_user_id(),  'estado', true)
             foreach ( $estados as $estado ) {
               printf( '<option value=" %1$s "> %1$s </option>', $estado,$estado );
              }
              ?>
          </select>
         </td>
       </tr>
      </table>

<?php
  }
  function save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
    update_user_meta( $user_id, 'estado', $_POST['estado'] );
  }
  add_action( 'user_register', 'save_extra_profile_fields', 10, 1 );

  add_action('user_new_form', 'additional_profile_fields');
  add_action('edit_user_profile', 'additional_profile_fields');
  add_action('show_user_profile', 'additional_profile_fields');
  add_action( 'personal_options_update', 'save_extra_profile_fields' );
  add_action( 'edit_user_profile_update', 'save_extra_profile_fields' );
});