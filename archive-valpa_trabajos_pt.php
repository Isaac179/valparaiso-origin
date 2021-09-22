<?php if(!isset($_POST['is_ajax'])):?>
<?php get_header(); ?>
<div class="row cuerpo" >
   

    <div class="row bolsa" >
        <div class="columns grande-12 centered bolsa-color">
           

             <div class="columns grande-10 centered">
                <h2>
                    Bolsa de trabajo
                </h2>
            </div>
            <?php 
                    $sucursales = array(
                            'post_type'=> 'valpa_sucursales_pt',
                            'order'    => 'ASC',
                            'posts_per_page' => -1,
                            'order' => 'DESC',
                        );              
                 

                    $sucursales_query = new WP_Query( $sucursales );
                    if($sucursales_query->have_posts() ) : while ( $sucursales_query->have_posts() ) : $sucursales_query->the_post(); 
                    ?>   

                        <div class="columns grande-8 centered sucursal-bolsa">
                            <h2> 
                                <?php  echo $post->post_title; ?> <span><?php  echo $post->post_content; ?></span>
                            </h2>
                             <?php 
                                $id_sucursal = $post->ID;
                                 $puestos = array(
                                    'post_type'=> 'valpa_trabajos_pt',
                                    'order'    => 'ASC',
                                    'posts_per_page' => -1,
                                    'order' => 'DESC',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'sucursal_relacionada_meta',
                                            'value' => $post->ID,
                                            'compare' => 'LIKE',

                                        ),
                                      ),
                                );  
    


                                $the_query = new WP_Query( $puestos );
                                if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
                                ?>   


                                    <a href="<?php echo get_permalink();?>?sucursal=<?php echo $id_sucursal;?>&puesto=<?php echo $post->ID;?>" class="boton-bolsa centered" > 
                                
                                       
                                            <?php  echo $post->post_title; ?>
                                         
                                   
                                    </a>


                                <?php endwhile; ?>
                            <?php else: ?>
                                Por el momento no tenemos puestos de trabajo en esta sucursal

                                <?php endif?>
                             
                        </div>
                    <?php endwhile; ?>

                    <?php endif?>


           
                   
                  
                
           
        </div>
    </div>
    <? endif;?>
    <?php include_once('inc/cerca.php'); ?>

   
   <?php include_once('inc/asociado-bolsa.php'); ?>

</div>
       

        
<?php get_footer(); ?>