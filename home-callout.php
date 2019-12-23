	
<!-- MAPA BRASIL -->
<div id="mapa_pets_brasil">
    <div style="">
        <div id="mapa_brasil">
        <?php
            include('Mapa+do+Brasil+SVGa.html');
        ?>
    </div>

    </div>

    <div id="lista_pet_estado">
        <?php 
            /*listar todos os pets desse estado
https://www.youtube.com/watch?v=Roz4nx5bcmU&t=590s
            */
            query_posts('post_type=pet_post_type_key');

            /*
            loop que exibir tudo  que tem dentro post_type = pet_post_type_key

            */
            if(have_posts()): while (have_posts()): the_post();
                ?>
                <ul>
                    <li><?php the_title(); ?> </li>
                </ul>
                <?php  
                endwhile;
            else:
                ?>
                <p>não há pet cadastrado neste estado...</p>
            <?php
            endif;
        ?>
        
        
    </div>
</div>
