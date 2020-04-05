	
<!-- MAPA BRASIL -->
<div id="mapa_pets_brasil">
    <div class="div_problema">
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
                    <li>
                        <a href=" <?php the_permalink(); ?> ">
                            <?php the_title(); ?>
                        </a>
                            <?php echo get_post_meta($post->ID, 'nome_tutor', true); ?>
                     </li>
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



    <?php 
        $args = get_posts(array(
            'numberposts'	=> 2,
            'post_type'		=> 'pet_post_type_key',
            'meta_key'		=> 'tutor',
            'meta_value'	=> 'renato'
        ));
        // query
        $the_query = new WP_Query( $args );
    ?>
    <?php if( $the_query->have_posts() ): ?>
        <ul>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php the_field('event_thumbnail'); ?>" />
                    <?php the_title(); ?>
                </a>
            </li>
        <?php endwhile; ?>
        </ul>
    <?php endif; ?>

    <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

        
</div>




