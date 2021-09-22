<?php get_header(); 
  
  if (!isset($_GET['sucursal'])) {
        $id_sucursal_get = "0";
    } else{
            $id_sucursal_get = $_GET['sucursal'];
    };
     if (!isset($_GET['puesto'])) {
        $id_puesto_get = $post->ID;
    } else{
            $id_puesto_get = $_GET['puesto'];
    };

?>

<div class="row cuerpo" >
   

    <div class="row puesto-single" >
        <div class="columns grande-12 centered puesto-single-color">
            <div class="columns grande-1 ">
            <?php echo $id_sucursal_get; ?>
                    <?php
                        $prev_post = get_previous_post();
                        if($prev_post) {
                           $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
                           echo "\t" . '<div class="boton-prev"><a rel="prev" href="' . get_permalink($prev_post->ID) . '?sucursal='.$id_sucursal_get.'&puesto='.$prev_post->ID.'" class=" "><strong><<</strong></a> </div>' . "\n";
                                        }
                        ?>
               
              
              
            </div>
            <div class="columns grande-10 centered">
                <div class="columns grande-12 ">
                    <h2>
                        <?php  echo $post->post_title; ?>
                    </h2>
                </div>
             

                    <div class="columns grande-10 centered">
                       
                        <div class="row seccion-puesto">
                            <p>
                                <?php  echo $post->post_content; ?>
                            </p>
                        </div>
                        <div class="row imagen-destacada-puesto">
                            <?php $thumb_id = get_post_thumbnail_id($post->ID); ?>
                            <?php $img_src = wp_get_attachment_image_src($thumb_id, 'thumbnail'); ?>
                            <?php $img_src =  $img_src[0]; ?>
                            <img src="<?php echo $img_src; ?>"  >
                        </div>
                        <div class="row seccion-puesto">
                            <h3> Experiencia previa</h3>
                            <p><?php $experiencia_previa = get_post_meta( $post->ID,'experiencia_previa_meta', TRUE );
                                echo $experiencia_previa;?>
                            </p>
                        </div>
                        <div class="row">
                            <div class="columns grande-6 chico-12 seccion-puesto">
                                <h3>Informacion</h3>

                                <?php 

                                    $pags_rel = get_post_meta( $post->ID, 'valpa_info_puesto_', true);  

                                    if (is_array($pags_rel)){

                                        foreach( $pags_rel as $pags_link ){
                                            echo '<h4>'.$pags_link['desc'].'</h4>';
                                            echo '<p>'.$pags_link['link'].'</p>';      
                                        }

                                    }

                                ?>
                            </div>
                            <div class="columns grande-6 chico-12 seccion-puesto">
                               


                                <h3> Tareas</h3>
                                <p><?php $tareaspuesto = get_post_meta( $post->ID,'tareas_puesto_meta', TRUE );
                                    $tareaspuesto = explode ("-", $tareaspuesto);
                                    foreach ($tareaspuesto as $tareapuesto) {
                                        if (!$tareapuesto=="" || !$tareapuesto==NULL) {
                                            echo '-'.$tareapuesto.'<br>';
                                        }
                                       
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="row seccion-puesto">
                         

                            <h3> Documentos indispensables</h3>
                             <table style="width:100%">
                              
                                <?php $documentospuesto = get_post_meta( $post->ID,'documentos_necesarios_meta', TRUE );
                                    foreach ($documentospuesto as $documentopuesto) {
                                        echo '<tr><td>'.get_the_title( $documentopuesto ).'</td></tr>';
                                    }
                                    ?>
                              
                            </table> 
                             
                           
                        </div>
                        

                    </div>
               <div class="columns grande-10 centered">
                     <a href="<?php echo get_permalink( get_page_by_title( 'postulacion' ));?>?sucursal=<?php echo $id_sucursal_get;?>&puesto=<?php echo $id_puesto_get;?>" class="boton-bolsa centered" >Aplica ahora a este puesto</a>

                </div>
            </div>
            <div class="columns grande-1 ">
                
               <?php
                    $next_post = get_next_post();
                    if($next_post) {
                       $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
                       
                       echo "\t" . '<div class="boton-next"><a rel="next" href="' . get_permalink($next_post->ID) . '?sucursal='.$id_sucursal_get.'&puesto='.$next_post->ID.'" class=" "><strong>>></strong></a></div>' . "\n";
                                    }
                    ?>
            </div>

            
             
            
        </div>
    </div>

    <?php include_once('inc/cerca.php'); ?>

   
   <?php include_once('inc/asociado-bolsa.php'); ?>

</div>
       

        
<?php get_footer(); ?>