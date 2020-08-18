<?php 
//remove niveis de acessos que nao estao sendo usados
function remover_funcao() {
    remove_role( 'editor' );
    remove_role( 'contributor' );
    remove_role( 'subscriber' );
}
add_action( 'init', 'remover_funcao' );
?>