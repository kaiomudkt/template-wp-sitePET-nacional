<div class="hcf_box">
    <style scoped>
        .hcf_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .campos{
            display: contents;
        }
    </style>

    <div class="meta-options campos">
        <label for="tutor">Tutor</label>
        <input id="tutor"
        type="text"
        name="tutor"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'tutor', true ) ); ?>">
    </div>

    <div class="meta-options campos">
        <label for="data_criacao">Data de criação do PET</label>
        <input id="data_criacao"
        type="date"
        name="data_criacao"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'data_criacao', true ) ); ?>">
    </div>
    
    <div class="meta-options campos">
        <label for="qtd_integrantes">Quantidade de Integrantes Oficiais</label>
        <input id="qtd_integrantes"
        type="number"
        name="qtd_integrantes"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'qtd_integrantes', true ) ); ?>">
    </div>

    <div class="meta-options campos">
        <label for="instituicao_pertencente">Instituição que pertencente</label>
        <input id="instituicao_pertencente"
        type="text"
        name="instituicao_pertencente"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'instituicao_pertencente', true ) ); ?>">
    </div>

    <div class="meta-options campos">
        <label for="link_site">Link do site</label>
        <input id="link_site"
        type="text"
        name="link_site"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'link_site', true ) ); ?>">
    </div>

    <div class="meta-options campos">
        <label for="cidade">Cidade (listar por API)</label>
        <input id="cidade"
        type="text"
        name="cidade"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cidade', true ) ); ?>">
    </div>

    <div class="meta-options campos">
        <label for="campus">Campus</label>
        <input id="campus"
        type="text"
        name="campus"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'campus', true ) ); ?>">
    </div>

    <div class="meta-options campos">
        <label for="estado">Estado (Unidade Federativa)</label>
        <input id="estado" readonly=“true”
        type="text"
        name="estado"
        value="<?php 
        //se o post ja tiver atributo 'estado'
        if(get_post_meta( get_the_ID(), 'estado', true ) != null){
            echo esc_attr( get_post_meta( get_the_ID(), 'estado', true ) ); 
        }else{
        //se nao tiver, usa o atributo 'estado' do user atual
            echo esc_attr( get_user_meta( get_current_user_id(),  'estado', true) );
        }?>">
    </div>

    <div class="meta-options campos">
        <label>Localização (iframe do google maps)</label>
        <input type="text" name="localizacao" id="localizacao" >
    </div>


    <script>
        /*
        function geolocalizacao(){
            navigator.geolocation.getCurrentPosition(function(position) {
            console.log(position.coords.latitude, position.coords.longitude);
        });
        }
        geolocalizacao();   
         */    
    </script>
</div>
<!--
<div>
        <iframe 
          width="800" 
          height="800" 
          frameborder="0" 
          scrolling="no" 
          marginheight="0" 
          marginwidth="0" 
          src="https://maps.google.com/maps?q=-15.9130368,-52.6643678&hl=pt-BR&z=4&amp;output=embed"
         >
     </iframe>
</div>
-->