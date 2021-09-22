<?php get_header(); ?>
<div class="row cuerpo" >
    <div class="row portada">    
        <div class="blanco-slide"></div>
        <img class="desaparece-chico"src="<?php bloginfo('template_url');?>/images/portada.jpg" >
        <img class="desaparece-grande"src="<?php bloginfo('template_url');?>/images/portada-2.jpg" >
    </div> 

    <div class="row" id="obituario" data-scroll-index="obituario">
        <div class="columns grande-10 centered">
            <h2>
                Obituario
            </h2>
        </div>
    </div>
    <div class="row obituario" >
        <div class="columns grande-10 centered obiturio-color">
            <div class="row2 obituario-busqueda">
                <div class="links-grandes row">
                    
                    <div class="contenedor-link ">
                        <form  action="<?php echo home_url( '/' ); ?>" class="aparece-formulario">
                                    <input type="text" name="s" id="input-js" placeholder="Búsqueda"  value="<?php echo get_search_query() ?>"> 
                                </form>
                        <div class="link-centrado desaparece-link">
                            <a href="#" target="_Blank" class="busqueda-js"><img src="<?php bloginfo('template_url');?>/images/busqueda.svg" class="icono-footer "/></a><a href="#" target="_Blank" class="busqueda-js">Busca en nuestro obituario</a>
                        </div>
                    </div>
                </div>
                
            </div>


    <?php if( is_search() ):?> 

        <?php if( have_posts() ): ?>
            <div class="row">
                <h2>
                    Resultados de estudios para <span>"<?php echo $s ?>"</span>
                </h2>
            </div>

            <div class="cuadricula  centered">
                    <?php while(have_posts()): the_post();?> 
                        <div class="cuadro grande-3 chico-12 medio-6 avatar-obituario">
                            <a href="<?php echo get_permalink($post->ID);?>" >
                                
                                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                        <?php $thumb_id = get_post_thumbnail_id($post->ID); ?>
                                        <?php $img_src = wp_get_attachment_image_src($thumb_id, 'thumbnail'); ?>
                                        <?php $img_src =  $img_src[0]; ?>
                                            <div class="cuadro-avatar "  style=" background-image: url('<?php echo $img_src; ?>');">
                                            </div>
                                        
                                   <?php  else: ?>  
                                            <div class="cuadro-avatar abrir-slider "  style=" background-image: url('<?php bloginfo('template_url');?>/images/avatar.jpg');">
                                            </div>

                                    <?php  endif; ?>    
                                
                                <h3><?php  echo $post->post_title; ?> </h3>
                             </a>
                        </div>  
                    <?php endwhile; ?>
            </div>

        <?php else: ?>  
            <div class="row resultado-busqueda">
                <h2>No se encontraron resultados para <span>"<?php echo $s ?>"</span>. Intente otra búsqueda.</h2>
            </div>
        <?php endif; ?>
    <?php endif?>




            <div class="row">
                <h2>
                    Últimos homenajes
                </h2>
            </div>

            <div class=" slider-obituarios desaparece-grande">

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php 
                            $args = array(
                                    'post_type'=> 'valpa_obituario_pt',
                                    'order'    => 'ASC',
                                    'posts_per_page' => 20,
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                );              

                            $the_query = new WP_Query( $args );
                            if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
                            ?>    
                            
                                <div class="swiper-slide avatar-obituario">
                                    <a href="<?php echo get_permalink($post->ID);?>" >
                                
                                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                                <?php $thumb_id = get_post_thumbnail_id($post->ID); ?>
                                                <?php $img_src = wp_get_attachment_image_src($thumb_id, 'thumbnail'); ?>
                                                <?php $img_src =  $img_src[0]; ?>
                                                    <div class="cuadro-avatar "  style=" background-image: url('<?php echo $img_src; ?>');">
                                                    </div>
                                                
                                           <?php  else: ?>  
                                                    <div class="cuadro-avatar abrir-slider "  style=" background-image: url('<?php bloginfo('template_url');?>/images/avatar.jpg');">
                                                    </div>

                                            <?php  endif; ?>    
                                        
                                        <h3><?php  echo $post->post_title; ?> </h3>
                                     </a>
                                </div>  
                            <?php endwhile; ?>
                            <?php endif?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="cuadricula desaparece-chico ">
                    <?php 
                    $args = array(
                            'post_type'=> 'valpa_obituario_pt',
                            'order'    => 'ASC',
                            'posts_per_page' => 20,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        );              

                    $the_query = new WP_Query( $args );
                    if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
                    ?>    
                        <div class="cuadro grande-3 chico-12 medio-6 avatar-obituario">
                            <a href="<?php echo get_permalink($post->ID);?>" >
                                
                                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                        <?php $thumb_id = get_post_thumbnail_id($post->ID); ?>
                                        <?php $img_src = wp_get_attachment_image_src($thumb_id, 'thumbnail'); ?>
                                        <?php $img_src =  $img_src[0]; ?>
                                            <div class="cuadro-avatar "  style=" background-image: url('<?php echo $img_src; ?>');">
                                            </div>
                                        
                                   <?php  else: ?>  
                                            <div class="cuadro-avatar abrir-slider "  style=" background-image: url('<?php bloginfo('template_url');?>/images/avatar.jpg');">
                                            </div>

                                    <?php  endif; ?>    
                                
                                <h3><?php  echo $post->post_title; ?> </h3>
                             </a>
                        </div>  
                    <?php endwhile; ?>

                    <?php endif?>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="columns grande-10 centered contacto-facebook ">
            <div class="links-grandes row ">
                <div class="contenedor-link">
                    <div class="link-centrado">
                        <a href="https://www.facebook.com/valparaisofunerales" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/facebook.svg" class="icono-footer"/></a><a href="https://www.facebook.com/valparaisofunerales" target="_Blank"><em>Siguenos en Facebook </em>para recibir post especializados sobre el duelo.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row plan-eliseo promo-eliseo" >
        <div class="columns grande-10 medio-10 chico-10 centered ">
            <div >
                <div class="imagen-promo-eliseo">
                    <img class="imagen-eliseo" src="<?php bloginfo('template_url');?>/images/asociada.jpg"/>
                </div>
                <div class="contenedor-promo">
                    <div class="centrado-promo">
                        <h5>Con Homenaje a futuro  de Valparaíso Previenes a tus seres queridos de improvistos</h5>
                        <div class="links-grandes ">
                            <div class="contenedor-link">
                                <div class="link-centrado">
                                    <a href="https://api.whatsapp.com/send?phone=+52 1 722 784 6600&text=¡Hola%20valparaiso!" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/telefono.svg" class="icono-footer"/></a><a href="https://api.whatsapp.com/send?phone=+52 1 722 784 6600&text=¡Hola%20valparaiso!" target="_Blank">llama a un asesor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
       </div>
    </div>

</div>
       

        
<?php get_footer(); ?>