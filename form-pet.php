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
        <label for="estado">Estado (Unidade Federativa)</label>
        <input id="estado"
            type="text"
            name="estado"
            value="<?php 
            if(get_post_meta( get_the_ID(), 'estado', true ) != null){
                echo esc_attr( get_post_meta( get_the_ID(), 'estado', true ) ); 
            }else{
                echo esc_attr( get_post_meta( get_current_user_id(),  'estado', true) );
            }
            ?>">
    </p>
    



    <p class="meta-options hcf_field">
        <label for="hcf_price">Price</label>
        <input id="hcf_price"
            type="number"
            name="hcf_price"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'hcf_price', true ) ); ?>">
    </p>
</div>