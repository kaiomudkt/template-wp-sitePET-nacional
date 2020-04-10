<div class="hcf_box">
    <style scoped>
        .hcf_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .hcf_field{
            display: contents;
        }
    </style>


<p class="meta-options hcf_field">
    <label for="tutor">Tutor</label>
    <input id="tutor"
    type="text"
    name="tutor"
    value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'tutor', true ) ); ?>">
</p>
<p class="meta-options hcf_field">
    <label for="data_criacao">Data de criação do PET</label>
    <input id="data_criacao"
    type="date"
    name="data_criacao"
    value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'data_criacao', true ) ); ?>">
</p>
<p class="meta-options hcf_field">
    <label for="qtd_integrantes">Quantidade de Integrantes Oficiais</label>
    <input id="qtd_integrantes"
    type="number"
    name="qtd_integrantes"
    value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'qtd_integrantes', true ) ); ?>">
</p>

<p class="meta-options hcf_field">
    <label for="instituicao_pertencente">Instituição que pertencente</label>
    <input id="instituicao_pertencente"
    type="text"
    name="instituicao_pertencente"
    value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'instituicao_pertencente', true ) ); ?>">
</p>

<p class="meta-options hcf_field">
    <label for="link_site">Link do site</label>
    <input id="link_site"
    type="text"
    name="link_site"
    value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'link_site', true ) ); ?>">
</p>




<p class="meta-options hcf_field">
    <label for="cidade">Cidade</label>
    <input id="cidade"
    type="text"
    name="cidade"
    value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cidade', true ) ); ?>">
</p>

<p class="meta-options hcf_field">
    <label for="campus">Campus</label>
    <input id="campus"
    type="text"
    name="campus"
    value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'campus', true ) ); ?>">
</p>



<p class="meta-options hcf_field">
    <label for="estado">Estado (Unidade Federativa)</label>
    <input id="estado" disabled
    type="text"
    name="estado"
    value="<?php 
    /**
     * get_the_ID () Recupere o ID do item atual no loop do WordPress.
    */
        //se o post ja tiver atributo 'estado'
        if(get_post_meta( get_the_ID(), 'estado', true ) != null){
            echo esc_attr( get_post_meta( get_the_ID(), 'estado', true ) ); 
        }else{
        //se nao tiver, usa o atributo 'estado' do user atual
            echo esc_attr( get_user_meta( get_current_user_id(),  'estado', true) );
        }?>">
</p>



    </div>