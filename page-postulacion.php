<?php
/*
Template Name: postulacion Page
*/
?>
<?php get_header(); 
 
  if (!isset($_GET['sucursal'])) {
        $id_sucursal_get = "0";
    } else{
            $id_sucursal_get = $_GET['sucursal'];
    };
if (!isset($_GET['puesto'])) {
        $id_puesto_get = "0";
    } else{
            $id_puesto_get = $_GET['puesto'];
    };
?>

<div class="row cuerpo" >
    <div class="row postulacion" >
        <div class="columns grande-12 centered postulacion-color">
            <div class="row " >
                <div class="columns grande-10 centered">
                    <h2 >
                        Solicitud de empleo 
                    </h2>
                </div>
            </div>
            <div class="row recibibo-solicitud" style="display:none">
                <div class="row">
                     <div class="columns grande-6 centered">
                        <img class="imagen-eliseo" src="<?php bloginfo('template_url');?>/images/recibido.png"/>
                    </div>
                </div>
                <div class="row">
                     <div class="columns grande-10 centered mensaje-recibido">
                    </div>
                </div>
            </div>
            <div class="row formulario-solicitud" id="formulario-solicitud" >

                 <form   id="contact-form_JS">

                    <div class="columns grande-8 centered">
                        <div class="row formulario-seccion" >
                            <h3 for="puesto_postulante">1. Selecciona el puesto al que te quieres postular</h3>
                            <select id="cont_puesto_JS" name="contact-form_JS[puesto]" form="contact-form_JS" required="" type="text">
                                <option value="0">Selecciona un puesto </option>
                                <?php 
                                 $puestos = array(
                                    'post_type'=> 'valpa_trabajos_pt',
                                    'order'    => 'ASC',
                                    'posts_per_page' => -1,
                                    
                                );  



                                $puestos_query = new WP_Query( $puestos );
                                if($puestos_query->have_posts() ) : while ( $puestos_query->have_posts() ) : $puestos_query->the_post(); 
                                ?>                                   
                                        <?php if ($id_puesto_get == $post->ID ) : ?>
                                           <option value="<?php  echo $post->ID ?>" selected><?php  echo $post->post_title; ?></option> 
                                         <?php else: ?>
                                            <option value="<?php  echo $post->ID ?>" ><?php  echo $post->post_title; ?></option> 
                                         <?php endif;?>

                                <?php endwhile; ?>
                                <?php else: ?>
                                Por el momento no tenemos puestos de trabajo en esta sucursal
                                <?php endif; ?>
                           </select>
                        </div>


                       <div class="row formulario-seccion">
                            <h3 for="sucursales_relacionadas">2. Verifica la sucursal de postulación</h3>
                            <div id="formulario-2" <?php if ($id_sucursal_get == 0 ) echo 'style="display: none;"'; ?>>
                                <?php 
                                 $sucursales = array(
                                    'post_type'=> 'valpa_sucursales_pt',
                                    'order'    => 'ASC',
                                    'posts_per_page' => -1,
                                    
                                );  
                                $sucursales_query = new WP_Query( $sucursales );
                                if($sucursales_query->have_posts() ) : while ( $sucursales_query->have_posts() ) : $sucursales_query->the_post(); 
                                
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
                                    $puestos_query = new WP_Query( $puestos ); $post_ids = wp_list_pluck( $puestos_query->posts, 'ID' );?>



                                <input type="radio"  id="contact-form_JS[sucursal<?php  echo $post->ID; ?>]" name="contact-form_JS[sucursal]" form="contact-form_JS"   value="<?php  echo get_the_title( $post->ID ); ?>" sucursal="<?php  echo  $post->ID ; ?>" <?php if ($id_sucursal_get == $post->ID ) echo 'checked'; ?>>
                                <label for="contact-form_JS[sucursal<?php  echo $post->ID; ?>]" identificador="<?php foreach ($post_ids as $post_id): echo $post_id . ', ' ; endforeach ?>"><?php  echo get_the_title( $post->ID ); ?></label>
                               
                                <?php endwhile; ?>
                                <?php endif;?>
                            </div>
                        </div>        

                        <div class="row formulario-seccion">
                            <h3 for="puesto_postulante">3. Selecciona los documentos con los que cuentas actualmente.</h3>
                            <div class="formulario-3" <?php if ($id_sucursal_get == 0 ) echo 'style="display: none;"'; ?>>

                         <?php  
                            $i = 1;
                                $documentos = array(
                                    'post_type'=> 'valpa_documentos_pt',
                                    'order'    => 'ASC',
                                    'posts_per_page' => -1,
                                    
                                );  
                                $documentos_query = new WP_Query( $documentos );
                                if($documentos_query->have_posts() ) : while ( $documentos_query->have_posts() ) : $documentos_query->the_post(); 
                                
                                $puestos = array(
                                    'post_type'=> 'valpa_trabajos_pt',
                                    'order'    => 'ASC',
                                    'posts_per_page' => -1,
                                    'order' => 'DESC',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'documentos_necesarios_meta',
                                            'value' => $post->ID,
                                            'compare' => 'LIKE',

                                        ),
                                      ),
                                ); 

                             $puestos_query = new WP_Query( $puestos ); $post_ids = wp_list_pluck( $puestos_query->posts, 'ID' );?>


                                <input type="checkbox" name="contact-form_JS[documento-<?php echo $i;?>]" id="contact-form_JS[documentos<?php  echo $post->ID ; ?>]"  value="<?php  echo get_the_title( $post->ID ); ?>"  >
                                <label for="contact-form_JS[documentos<?php  echo $post->ID ; ?>]" identificador="<?php foreach ($post_ids as $post_id): echo $post_id . ', ' ; endforeach; ?>"><?php  echo get_the_title( $post->ID ); ?></label>
                                    
                                <?php 
                                $i++;
                                endwhile; ?>
                                <?php endif;?>
                            </div>     
                        </div>     

                        <div class="row formulario-seccion">
            
                            <h3 for="puesto_postulante">4. Información del solicitante</h3>
                                
                                <div class="cuadricula formulario-3" <?php if ($id_sucursal_get == 0 ) echo 'style="display: none;"'; ?>>

                                     <div class="cuadro grande-4 chico-12"> 
                                        <input type="text"  id="cont_nombre_JS" value=""  name="contact-form_JS[Nombre]" form="contact-form_JS" required="" placeholder="Nombre">
                                    </div>  
                                    <div class="cuadro grande-4 chico-12"> 
                                        <input type="text" id="cont_apellidopaterno_JS" value=""  name="contact-form_JS[ApellidoPaterno]" form="contact-form_JS" required="" placeholder="Apellido paterno">
                                    </div>  
                                    <div class="cuadro grande-4 chico-12"> 
                                        <input type="text" id="cont_apellidomaterno_JS" value=""  name="contact-form_JS[ApellidoMaterno]" form="contact-form_JS"  placeholder="Apellido materno">
                                    </div>  
                                    <div class="cuadro grande-4 chico-12"> 
                                        <input type="text" id="cont_fecha_JS" value=""  name="contact-form_JS[Edad]" form="contact-form_JS" required="" placeholder="Edad">
                                    </div> 
                                    <div class="cuadro grande-8 chico-12"> 
                                        <input type="text" id="cont_curp_JS" value=""  name="contact-form_JS[CURP]" form="contact-form_JS" required="" placeholder="CURP">
                                    </div> 
                                    <div class="cuadro grande-12 chico-12"> 
                                        <input type="text" id="cont_nss_JS" value=""  name="contact-form_JS[NSS]" form="contact-form_JS" required="" placeholder="Número de Seguro Social">
                                    </div>  
                                    <div class="cuadro grande-12 chico-12"> 
                                        <h4>Dirección<h4>
                                    </div>  
                                    <div class="cuadro grande-4 chico-12"> 
                                        <input type="text" id="cont_direccion_JS" value=""  name="contact-form_JS[Direccion]" form="contact-form_JS" required="" placeholder="Calle y número">
                                    </div>  
                                    <div class="cuadro grande-3 chico-12"> 
                                        <input type="text" id="cont_ciudad_JS" value=""  name="contact-form_JS[Ciudad]" form="contact-form_JS" required="" placeholder="Ciudad">
                                    </div> 
                                    <div class="cuadro grande-3 chico-12"> 
                                        <input type="text" id="cont_colonia_JS" value=""  name="contact-form_JS[Colonia]" form="contact-form_JS" required="" placeholder="Colonia">
                                    </div>  
                                    <div class="cuadro grande-2 chico-12"> 
                                        <input type="text" id="cont_cp_JS" value=""  name="contact-form_JS[CP]" form="contact-form_JS" required="" placeholder="CP">
                                    </div>  
                                    <div class="cuadro grande-12 chico-12"> 
                                        <h4>Contacto<h4>
                                    </div>  
                                    <div class="cuadro grande-6 chico-12"> 
                                        <input type="text" id="cont_mail_JS" value=""  placeholder="E-mail" name="contact-form_JS[E-mail]" form="contact-form_JS" required >
                                    </div>  
                                    <div class="cuadro grande-3 chico-12"> 
                                        <input type="text" id="cont_celular_JS" value=""  name="contact-form_JS[celular]" form="contact-form_JS" required="" placeholder="Celular">
                                    </div>  
                                    <div class="cuadro grande-3 chico-12"> 
                                        <input type="text" id="cont_telefono_JS" value=""  name="contact-form_JS[telefono]" form="contact-form_JS" required="" placeholder="Teléfono">
                                    </div>  
                                    <div class="cuadro grande-12 chico-12"> 
                                        <h4>Referencias laborales<h4>
                                    </div>  
                                    <div class="cuadro grande-6 chico-12"> 
                                        <input type="text" id="cont_referencia1_JS" value=""  name="contact-form_JS[Referencia1]" form="contact-form_JS" required="" placeholder="Nombre">
                                    </div>  
                                    <div class="cuadro grande-3 chico-12"> 
                                        <input type="text" id="cont_referencia1empresa_JS" value=""  name="contact-form_JS[Referencia1empresa]" form="contact-form_JS" required="" placeholder="Empresa">
                                    </div>  
                                    <div class="cuadro grande-3 chico-12"> 
                                        <input type="text" id="cont_referencia1telefono_JS" value=""  name="contact-form_JS[Referencia1telefono]" form="contact-form_JS" required="" placeholder="Teléfono de contacto">
                                    </div>  
                                    <div class="cuadro grande-6 chico-12"> 
                                        <input type="text" id="cont_referencia2_JS" value=""  name="contact-form_JS[Referencia2]" form="contact-form_JS" required="" placeholder="Nombre">
                                    </div>  
                                    <div class="cuadro grande-3 chico-12"> 
                                        <input type="text" id="cont_referencia2empresa_JS" value=""  name="contact-form_JS[Referencia2empresa]" form="contact-form_JS" required="" placeholder="Empresa">
                                    </div>  
                                    <div class="cuadro grande-3 chico-12"> 
                                        <input type="text" id="cont_referencia2telefono_JS" value=""  name="contact-form_JS[Referencia2telefono]" form="contact-form_JS" required="" placeholder="Teléfono de contacto">
                                    </div>  
                                    <div class="cuadro grande-6 chico-12"> 
                                        <input type="text" id="cont_referencia3_JS" value=""  name="contact-form_JS[Referencia3]" form="contact-form_JS" required="" placeholder="Nombre">
                                    </div>  
                                    <div class="cuadro grande-3 chico-12"> 
                                        <input type="text" id="cont_referencia3empresa_JS" value=""  name="contact-form_JS[Referencia3empresa]" form="contact-form_JS" required="" placeholder="Empresa">
                                    </div>  
                                    <div class="cuadro grande-3 chico-12"> 
                                        <input type="text" id="cont_referencia3telefono_JS" value=""  name="contact-form_JS[Referencia3telefono]" form="contact-form_JS" required="" placeholder="Teléfono de contacto">
                                    </div>  
                                </div>    
                        </div>                                           
                        <div class="row formulario-seccion">                                 
                            <h3 for="puesto_postulante">5. Cuestionario</h3>
                            <div class="formulario-3" <?php if ($id_sucursal_get == 0 ) echo 'style="display: none;"'; ?>>

                            <?php
                                $preguntas = array(
                                    'post_type'=> 'valpa_preguntas_pt',
                                    'order'    => 'ASC',
                                    'posts_per_page' => -1,
                                    
                                );  
                                $preguntas_query = new WP_Query( $preguntas );
                                if($preguntas_query->have_posts() ) : while ( $preguntas_query->have_posts() ) : $preguntas_query->the_post(); 
                                 $puestos = array(
                                    'post_type'=> 'valpa_trabajos_pt',
                                    'order'    => 'ASC',
                                    'posts_per_page' => -1,
                                    'order' => 'DESC',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'preguntas_puesto_meta',
                                            'value' => $post->ID,
                                            'compare' => 'LIKE',
                                        ),
                                      ),
                                ); 
                                $puestos_query = new WP_Query( $puestos ); $post_ids = wp_list_pluck( $puestos_query->posts, 'ID' );?>

                                 
                                    <?php  $tipo_pregunta = get_post_meta( $post->ID,'tipo_pregunta_puesto_meta', TRUE ); $tipo_pregunta = $tipo_pregunta[0]; 
                                          $caracteres_pregunta = get_post_meta( $post->ID,'tipo_pregunta_puesto_meta', TRUE ); $caracteres_pregunta = $caracteres_pregunta;                                           
                                          $opciones_pregunta = get_post_meta( $post->ID,'opciones_input_meta', TRUE ); $opciones_pregunta = explode(",",$opciones_pregunta); 

                                    if ( $tipo_pregunta == "Texto"): ?>
                                        <div identificador="<?php foreach ($post_ids as $post_id): echo $post_id . ', ' ; endforeach; ?>" <?php  if (!in_array($id_puesto_get, $post_ids ))  echo "style='display:none;'"; ?>>
                                            <h4><?php  echo $post->post_title; ?></h4>
                                            <input type="text" id="cont_<?php  echo $post->post_title; ?>_JS"  name="contact-form_JS[<?php  echo $post->post_title; ?>]" placeholder="<?php  echo get_the_title( $post->ID ); ?>">
                                        </div> 
                                    <?php elseif ( $tipo_pregunta == "Parrafo"): ?>
                                        <div identificador="<?php foreach ($post_ids as $post_id): echo $post_id . ', ' ; endforeach; ?>" <?php  if (!in_array($id_puesto_get, $post_ids ))  echo "style='display:none;'"; ?>>
                                            <h4><?php  echo $post->post_title; ?></h4>
                                            <textarea placeholder="Ej. Edad" name="contact-form_JS[<?php  echo $post->post_title; ?>]" id="pregunta-<?php echo $post->ID; ?>"  style="width:100%"  rows="10"><?php  echo get_the_title( $post->ID ); ?></textarea>     
                                        </div>                
                                    <?php elseif ( $tipo_pregunta == "Numerico"): ?>
                                        <div identificador="<?php foreach ($post_ids as $post_id): echo $post_id . ', ' ; endforeach; ?>" <?php  if (!in_array($id_puesto_get, $post_ids ))  echo "style='display:none;'"; ?>>
                                            <h4><?php  echo $post->post_title; ?></h4>
                                            <input type="text" id="pregunta-<?php echo $post->ID; ?>"  name="contact-form_JS[<?php  echo $post->post_title; ?>]" placeholder="<?php  echo get_the_title( $post->ID ); ?>">
                                        </div>
                                    <?php elseif ( $tipo_pregunta == "Buleano"): ?>
                                         <div identificador="<?php foreach ($post_ids as $post_id): echo $post_id . ', ' ; endforeach; ?>" <?php  if (!in_array($id_puesto_get, $post_ids ))  echo "style='display:none;'"; ?>>
                                                <h4><?php  echo $post->post_title; ?></h4>
                                            <?php foreach ($opciones_pregunta as $opcion): ?>
                                                <input type="radio" id="<?php  echo $opcion; ?>-<?php  echo $post->ID; ?>" name="contact-form_JS[<?php  echo $post->post_title; ?>]" value="<?php  echo $opcion; ?>" >
                                                <label for="<?php  echo $opcion; ?>-<?php  echo $post->ID; ?>"><?php  echo $opcion; ?></label>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php elseif ( $tipo_pregunta == "Opcion multiple"): ?>
                                        <div identificador="<?php foreach ($post_ids as $post_id): echo $post_id . ', ' ; endforeach; ?>" <?php  if (!in_array($id_puesto_get, $post_ids ))  echo "style='display:none;'"; ?>>
                                            <h4><?php  echo $post->post_title; ?></h4>
                                            <?php foreach ($opciones_pregunta as $opcion): ?>
                                                <input type="checkbox" id="<?php echo $opcion; ?>-<?php  echo $post->ID; ?>" name="contact-form_JS[<?php  echo $post->post_title; ?>]"  value="pregunta-<?php echo $opcion; ?>" >
                                                <label for="<?php echo $opcion; ?>-<?php  echo $post->ID; ?>" ><?php  echo $opcion; ?></label>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif;?>
                                <?php endwhile; ?>
                            <?php endif;?>
                            </div>
                        </div>
                </div>
            
            
                 <div class="columns grande-10 centered boton-submit">
                    <?php wp_nonce_field( 'wps_mandar_foto' ); ?>

                <input type="submit" value="Finaliza tu solicitud" class="finaliza-solicitud" id="contact_sub_JS" name="submit"/>
                

                </div>   
            </form>
            </div>
           
        </div>
    </div>

    <?php include_once('inc/cerca.php'); ?>
    <?php include_once('inc/asociado-bolsa.php'); ?>

</div>
       

        
<?php get_footer(); ?>
