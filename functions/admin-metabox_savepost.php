<?php

/**
 * En este archivo se incluyen los meta box y las funciones de save post. 
 *
 */

/** ==============================================================================================================
 *                                                  HOOKS
 *  ==============================================================================================================
 */

add_action( 'add_meta_boxes', 'cltvo_metaboxes' ); // agrega las metabox
add_action( 'save_post', 'cltvo_save_post' ); // guarda el valor de las metabox 
add_filter( 'attachment_fields_to_edit', 'daniel_edit_tamano_img', null, 2 );
add_filter( 'attachment_fields_to_save', 'daniel_save_tamano_img', null, 2 );




/** ==============================================================================================================
 *                                                Meta box
 *  ==============================================================================================================
 */
function getShortMonthNameByNumber($monthNum){
    switch ($monthNum) {
        case 1:
            return "Enero";
        case 2:
            return "Febrero";
        case 3:
            return "Marzo";
        case 4:
            return "Abril";
        case 5:
            return "Mayo";
        case 6:
            return "Junio";
        case 7:
            return "Julio";
        case 8:
            return "Agosto";
        case 9:
            return "Septiembre";
        case 10:
            return "Octubre";
        case 11:
            return "Noviembre";
        case 12:
            return "Diciembre";
        // etc
    };
}
function daniel_edit_tamano_img( $form_fields, $post ) {
	$tamano_guardado = get_post_meta($post->ID, 'daniel_tamano_img_meta', true);
	$tamanos = array('animacion', 'thumbnail', 'portada', 'galeria');
	$html = "<select name='attachments[{$post->ID}][daniel_tamano_img_in]' id='attachments[{$post->ID}][daniel_tamano_img_in]' >";
	$html .= "<option value='0'>Selecciona</option>";
	foreach ($tamanos as $tamano) {
		$tamano_impreso = ucfirst(str_replace("_", " ", $tamano));
		$selected = $tamano == $tamano_guardado ? 'selected' : '';
		$html .= "<option value=\"$tamano\" $selected >$tamano_impreso</option>";
	}
	$html .= "</select>";


	 $form_fields = array(
        'daniel_tamano_img_in'   => array(
            'label' => 'Tamaño a mostrar',
			'input' => 'html',
			'html' => $html,
        )
    );
    return $form_fields;
}

function daniel_save_tamano_img($post, $attachment) {
	$post_id = $post['ID'];
	if ( isset( $attachment['daniel_tamano_img_in'] ) ) 
		update_post_meta( $post['ID'], 'daniel_tamano_img_meta', $attachment['daniel_tamano_img_in'] );	

	

	return $post;
}


// ---------------------- agrega el meta box ---------------------- 
function cltvo_metaboxes(){

	$post_types = array( 'daniel_proyectos_pt' );
	foreach( $post_types as $post_type )
    {
    	add_meta_box(
			'valpa_telefono_solicitante_mb',		//id
			'Contacto',				//título
			'valpa_telefono_solicitante_mb',		//callback function
			'post',			//post type
			'side'						//posición
		);
		add_meta_box(
			'valpa_telefono_prospecto_mb',		//id
			'Contacto',				//título
			'valpa_telefono_prospecto_mb',		//callback function
			'valpa_ofrenda_pt',			//post type
			'side'						//posición
		);
		add_meta_box(
			'valpa_obituariorelacionado_mb',		//id
			'Homenaje relacionado',				//título
			'valpa_obituariorelacionado_mb',		//callback function
			'valpa_ofrenda_pt',			//post type
			'side'						//posición
		);
		add_meta_box(
			'valpa_no_homenaje_mb',		//id
			'Número de homenaje',				//título
			'valpa_no_homenaje_mb',		//callback function
			'valpa_obituario_pt',			//post type
			'side'						//posición
		);
		add_meta_box(
			'valpa_fechas_mb',		//id
			'Fechas',				//título
			'valpa_fechas_mb',		//callback function
			'valpa_obituario_pt',			//post type
			'side'						//posición
		);
	 	add_meta_box(
			'sucursal_relacionada_mb',		//id
			'Sucursal',				//título
			'sucursal_relacionada_mb',		//callback function
			array('valpa_trabajos_pt','valpa_obituario_pt'),			//post type
			'side'						//posición
		);
		add_meta_box(
			'servicio_relacionado_mb',		//id
			'servicio',				//título
			'servicio_relacionado_mb',		//callback function
			'valpa_obituario_pt',			//post type
			'side'						//posición
		);
	 	add_meta_box(
			'documentos_necesarios_mb',		//id
			'Documentos obligatorios',				//título
			'documentos_necesarios_mb',		//callback function
			'valpa_trabajos_pt',			//post type
			'side'						//posición
		);
		add_meta_box(
			'experiencia_previa_mb',		//id
			'Experiencia previa',				//título
			'experiencia_previa_mb',		//callback function
			'valpa_trabajos_pt',			//post type
			'normal'						//posición
		);
		add_meta_box(
			'informacion_puesto_mb',		//id
			'Información del Puesto',				//título
			'valpa_info_puesto_fc',		//callback function
			'valpa_trabajos_pt',			//post type
			'normal'						//posición
		);
		add_meta_box(
			'tareas_puesto_mb',		//id
			'Tareas del Puesto',				//título
			'tareas_puesto_mb',		//callback function
			'valpa_trabajos_pt',			//post type
			'normal'						//posición
		);
		add_meta_box(
			'preguntas_puesto_mb',		//id
			'Cuestionario',				//título
			'preguntas_puesto_mb',		//callback function
			'valpa_trabajos_pt',			//post type
			'normal'						//posición
		);
	 
		add_meta_box(
			'configuracion_pregunta_mb',		//id
			'Configuracion pregunta',				//título
			'configuracion_pregunta_mb',		//callback function
			'valpa_preguntas_pt',			//post type
			'normal'						//posición
		);
		add_meta_box(
			'solicitud_codigo_mb',		//id
			'Codigo de solicitud',				//título
			'solicitud_codigo_mb',		//callback function
			'post',			//post type
			'side'						//posición
		);
		add_meta_box(
			'folio_global_mb',		//id
			'Folio de  solicitud',				//título
			'folio_global_mb',		//callback function
			'post',			//post type
			'side'						//posición
		);
	    add_meta_box(
			'publico_objetivo_mb',		//id
			'Publico objetivo',				//título
			'publico_objetivo_mb',		//callback function
			'valpa_trabajos_pt',			//post type
			'side'						//posición
		);
		add_meta_box(
			'valpa_log_links_fc',		//id
			'Actividad de post',				//título
			'valpa_log_links_fc',		//callback function
			'valpa_trabajos_pt',			//post type
			'normal'						//posición
		);
		add_meta_box(
			'valpa_linkgoogle_mb',		//id
			'Link Google Maps',				//título
			'valpa_linkgoogle_mb',		//callback function
			'valpa_sucursales_pt',			//post type
			'normal'						//posición
		);

	}
		
	// agrega aqui ...
}

// ---------------------- funcion del meta box ---------------------- 

function valpa_create_info($prefix,$con,$desc,$link) {

	echo '<div id="div_'.$prefix.'['.$con.']" >
				<p>
					<label>Descripción:</label>
					<textarea placeholder="Ej. Edad" name="'.$prefix.'['.$con.'][desc]" id="'.$prefix.'['.$con.'][desc]" style="width:100%"  rows="1">'.$desc.'</textarea>
					<label>Contenido:</label></th>
					<input type="text" placeholder="Ej. 25 años" name="'.$prefix.'['.$con.'][link]" id="'.$prefix.'['.$con.'][link]" value="'.$link.'" style="width:100%" />
				</p>
		</div >';
}


function valpa_create_link($prefix,$con,$desc,$link) {

	if ($desc == '' || $link == '') {
		echo '
					<p>Descripción:</p>
					<input type="text" placeholder="Descripción:" name="'.$prefix.'['.$con.'][desc]" id="'.$prefix.'['.$con.'][desc]" value="'.$desc.'" style=" width:100%" />
					<label>Link:</label>
					<input type="text" placeholder="http://" name="'.$prefix.'['.$con.'][link]" id="'.$prefix.'['.$con.'][link]" value="'.$link.'" style="width:100%" />
				
		';
	} else {
		echo '
					<p>Descripción: <strong>'.$desc.'</strong></p>
					<input type="text" placeholder="Descripción:" name="'.$prefix.'['.$con.'][desc]" id="'.$prefix.'['.$con.'][desc]" value="'.$desc.'" style=" display: none; width:100%" />
					<label>Link:</label>
					<a href="'.$link.'">'.$link.'</a>
					<input type="text" placeholder="http://" name="'.$prefix.'['.$con.'][link]" id="'.$prefix.'['.$con.'][link]" value="'.$link.'" style=" display: none; width:100%" />
				
		';
	}

	
}




function valpa_log_links_fc($object) {

	$prefix="valpa_log_links_";

	$total=4;
	$plus=0;
    $meta = get_post_meta($object->ID, $prefix, true);

    if ( !is_array($meta) ){
    	for ($i=1;$i<=$total;$i++){	
    	$meta[$i]=array('desc'=> '', 'link'=> '');
    	}
    }
    $total=count($meta);
    print_r($meta);

// Use nonce for verification  
    
	//echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
    
    //var_dump($meta);

    //echo '<div id="a_plus_'.$prefix.'">';

    for ($i=1;$i<=$total;$i++){
    	valpa_create_link($prefix, $i, $meta[$i]['desc'], $meta[$i]['link']);
	    if (strlen($meta[$i]['desc'].$meta[$i]['link'])>0){
	    	$plus++;
	    }

	    if($i<>$total){
	    	echo '</br>';    	
    	}
    }

    if ($plus==$total){
    	echo '</br>';
    	valpa_create_link($prefix,($total+1), '', '');
    }

    //echo '</div>';

    //var_dump($object);

    //echo '<p align="center"><a id="a_plus_'.$prefix.'" class="a_plus_'.$prefix.'" > Agregar Link </a></p>';
	
	/**/
}

function valpa_info_puesto_fc($object) {

	$prefix="valpa_info_puesto_";

	$total=4;
	$plus=0;
    $meta = get_post_meta($object->ID, $prefix, true);
    if ( !is_array($meta) ){
    	for ($i=1;$i<=$total;$i++){	
    	$meta[$i]=array('desc'=> '', 'link'=> '');
    	}
    }
    $total=count($meta);

// Use nonce for verification  
    
	//echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
    
    //var_dump($meta);

    //echo '<div id="a_plus_'.$prefix.'">';

    for ($i=1;$i<=$total;$i++){
    	valpa_create_info($prefix, $i, $meta[$i]['desc'], $meta[$i]['link']);
	    if (strlen($meta[$i]['desc'].$meta[$i]['link'])>0){
	    	$plus++;
	    }

	    if($i<>$total){
	    	echo '</br>';    	
    	}
    }

    if ($plus==$total){
    	echo '</br>';
    	valpa_create_info($prefix,($total+1), '', '');
    }

    //echo '</div>';

    //var_dump($object);

    //echo '<p align="center"><a id="a_plus_'.$prefix.'" class="a_plus_'.$prefix.'" > Agregar Link </a></p>';
	
	/**/
}
function valpa_linkgoogle_mb($object){
	
	echo '<textarea name="valpa_linkgoogle_in" style="width:100%"  rows="1">';
	echo get_post_meta($object->ID, 'valpa_linkgoogle_meta', true);
	echo '</textarea>';
}
function servicio_relacionado_mb($object) {
	
	

    $tipos = array ("Domicilio", "Sucursal");

	 wp_nonce_field( basename(__FILE__), 'mam_nonce' );

    // How to use 'get_post_meta()' for multiple checkboxes as array?
    $postmeta = maybe_unserialize( get_post_meta( $object->ID, 'servicio_relacionado_meta', true ) );

    foreach ( $tipos as $tipo) {

        // If the postmeta for checkboxes exist and 
        // this element is part of saved meta check it.
        if ( is_array( $postmeta ) && in_array( $tipo, $postmeta ) ) {
            $checked = 'checked';
        } else {
            $checked = null;
        }
        ?>

        <p>
        	<input type="radio" id="tipo-pregunta" name="servicio_relacionado_in[]" value="<?php echo $tipo;?>"  <?php echo $checked; ?>>
    		<label for="<?php echo $tipo;?>"><?php echo $tipo;?></label>

        </p>

    <?php

    }

}

function configuracion_pregunta_mb($object) {
	
	

    $tipos = array ("Buleano", "Texto","Parrafo", "Numerico", "Opcion multiple");

	 wp_nonce_field( basename(__FILE__), 'mam_nonce' );

    // How to use 'get_post_meta()' for multiple checkboxes as array?
    $postmeta = maybe_unserialize( get_post_meta( $object->ID, 'tipo_pregunta_puesto_meta', true ) );

	?>

        <p>
        	<strong>Tipo de pregunta</strong>
        </p>

        <?php
    foreach ( $tipos as $tipo) {

        // If the postmeta for checkboxes exist and 
        // this element is part of saved meta check it.
        if ( is_array( $postmeta ) && in_array( $tipo, $postmeta ) ) {
            $checked = 'checked';
        } else {
            $checked = null;
        }
        ?>

        <p>
        	<input type="radio" id="tipo-pregunta" name="tipo_pregunta_puesto_in[]" value="<?php echo $tipo;?>"  <?php echo $checked; ?>>
    		<label for="<?php echo $tipo;?>"><?php echo $tipo;?></label>

        </p>

        <?php
    }

    
	$caracteres = maybe_unserialize( get_post_meta( $object->ID, 'caracteres_input_meta', true ) );
	$opciones =  get_post_meta( $object->ID, 'opciones_input_meta', true );
	?>

       <p>
    	<strong>Opciones</strong>
    </p>
    <p>
    	(separadas por una coma)
    </p>
    <textarea name="opciones_input_in" style="width:100%"  rows="10"><?php echo $opciones;?></textarea>

    <?php



}
function valpa_telefono_solicitante_mb($object) {
			$day = get_post_meta($object->ID, '_start_day', true); 
            $month = get_post_meta($object->ID, '_start_month', true); 
            $year = get_post_meta($object->ID, '_start_year', true); 
            $hour = get_post_meta($object->ID, '_start_hour', true); 
            $minute = get_post_meta($object->ID, '_start_minute', true); 
            if ($day == null ) {
               $cita = "Sin cita";
            }else{
              $cita = $day.' '.getShortMonthNameByNumber($month).' '.$year.' a las '.$hour.':'.$minute;  
            }

            $puesto = get_post_meta($object->ID, 'puesto_relacionado_meta', true);
           	$id_puesto= get_page_by_title( $puesto, OBJECT, 'valpa_trabajos_pt');
            $documentos  = get_post_meta( $id_puesto->ID, 'documentos_necesarios_meta', true);
             $num_of_items = count($documentos);
  			$num_count = 0;

            $titulo_documentos = "";
            foreach ($documentos as $documento ) {
            	$titulo_documentos .= get_the_title($documento);
			        
			    $num_count = $num_count + 1;
			    if ($num_count < $num_of_items) {
			      $titulo_documentos .= ", ";
			    }
            }

        ?>
        <label>Alias</label>
        <p>
        	<input type="text"  name="valpa_alias_solicitante_in" value="<?php echo get_post_meta($object->ID, 'valpa_alias_solicitante_meta', true);?>">
        </p>
        <label>Mail</label>
        <p>
        	<input type="text"  name="valpa_mail_solicitante_in" value="<?php echo get_post_meta($object->ID, 'valpa_mail_solicitante_meta', true);?>">
        </p>
        <p>
			<a href="mailto:<?php echo get_post_meta($object->ID, 'valpa_mail_solicitante_meta', true);?>" target="_Blank">Enviar Mail</a>
		</p>
        <label>Telefono</label>
        <p>
        	<input type="text"  name="valpa_telefono_solicitante_in" value="<?php echo get_post_meta($object->ID, 'valpa_telefono_solicitante_meta', true);?>">
        </p>

        <label>Celular  </label>
         <p>
        	<input type="text"  name="valpa_celular_solicitante_in" value="<?php echo get_post_meta($object->ID, 'valpa_celular_solicitante_meta', true);?>">
        </p>
        <p>
        	
        	<a href="https://api.whatsapp.com/send?phone=+521<?php echo get_post_meta($object->ID, 'valpa_celular_solicitante_meta', true);?>&text=¡Hola <?php echo get_post_meta($object->ID, 'valpa_alias_solicitante_meta', true);?>!. Soy del equipo de Recursos humanos de Valparaíso. Hemos recibido tu solicitud a través de nuestra página y nos interesa conocerte más ya que pensamos que eres un buen candidato para trabajar con nosotros por lo que nos gustaría agendar una cita. ¿Podríamos hacer una llamada?" target="_Blank">Enviar Whatsapp</a><br>
        	<a href="https://api.whatsapp.com/send?phone=+521<?php echo get_post_meta($object->ID, 'valpa_celular_solicitante_meta', true);?>&text=<?php echo get_post_meta($object->ID, 'valpa_alias_solicitante_meta', true);?>. Tu cita para dar continuación con la solicitud para la vacante de <?php echo get_post_meta($object->ID, 'puesto_relacionado_meta', true);?> es el <?php echo $cita;?>. Te recordamos presentarte 15 minutos antes con los documentos necesarios: <?php echo $titulo_documentos  ;?>. Nuestra dirección es Nezahualcóyotl 503 Col. San Sebastián, Toluca. Ver dirección en mapas: https://goo.gl/maps/tAaeUhJoFWCKSfnHA" target="_Blank">Enviar recibo cita</a><br>
        	<a href="https://api.whatsapp.com/send?phone=+521<?php echo get_post_meta($object->ID, 'valpa_celular_solicitante_meta', true);?>&text=<?php echo get_post_meta($object->ID, 'valpa_alias_solicitante_meta', true);?>. Nuestra dirección es Nezahualcóyotl 503 Col. San Sebastián, Toluca. Ver dirección en mapas: https://goo.gl/maps/tAaeUhJoFWCKSfnHA" target="_Blank">Enviar dirección</a>

        </p>

        <?php
   

}
function valpa_telefono_prospecto_mb($object) {
		$day = get_post_meta($object->ID, '_start_day', true); 
        $month = get_post_meta($object->ID, '_start_month', true); 
        $year = get_post_meta($object->ID, '_start_year', true); 
        $hour = get_post_meta($object->ID, '_start_hour', true); 
        $minute = get_post_meta($object->ID, '_start_minute', true); 
        if ($day == null ) {
           $cita = "Sin cita";
        }else{
          $cita = $day.' '.getShortMonthNameByNumber($month).' '.$year.' a las '.$hour.':'.$minute;  
        }

        ?>
        <label>Alias</label>
        <p>
        	<input type="text"  name="valpa_alias_in" value="<?php echo get_post_meta($object->ID, 'valpa_alias_meta', true);?>">
        </p>
        <label>Mail</label>
        <p>
        	<input type="text"  name="valpa_mail_in" value="<?php echo get_post_meta($object->ID, 'valpa_mail_meta', true);?>">
        </p>
        <p>
			<a href="mailto:<?php echo get_post_meta($object->ID, 'valpa_mail_meta', true);?>" target="_Blank">Enviar Mail</a>
		</p>
        <label>Telefono</label>
        <p>
        	<input type="text"  name="valpa_tel_in" value="<?php echo get_post_meta($object->ID, 'valpa_tel_meta', true);?>">
        </p>

        <label>Celular</label>
         <p>
        	<input type="text"  name="valpa_telefono_in" value="<?php echo get_post_meta($object->ID, 'valpa_telefono_meta', true);?>">
        </p>
        <label>Dirección</label>
         <p>
        	<input type="text"  name="valpa_direccion_in" value="<?php echo get_post_meta($object->ID, 'valpa_direccion_meta', true);?>">
        </p>
        <label>CP</label>
         <p>
        	<input type="text"  name="valpa_cp_in" value="<?php echo get_post_meta($object->ID, 'valpa_cp_meta', true);?>">
        </p>
        <p>
        	
        	<a href="https://api.whatsapp.com/send?phone=+521<?php echo get_post_meta($object->ID, 'valpa_telefono_meta', true);?>&text=¡Hola <?php echo get_post_meta($object->ID, 'valpa_alias_meta', true);?>!. Soy del equipo de Recursos humanos de Valparaíso. Hemos recibido tu solicitud a través de nuestra página y nos interesa conocerte más ya que pensamos que eres un buen candidato para trabajar con nosotros por lo que nos gustaría agendar una cita. ¿Podríamos hacer una llamada?" target="_Blank">Enviar Whatsapp</a><br>
        	<a href="https://api.whatsapp.com/send?phone=+521<?php echo get_post_meta($object->ID, 'valpa_telefono_meta', true);?>&text=<?php echo get_post_meta($object->ID, 'valpa_alias_meta', true);?>. Tu cita para dar continuación con la solicitud para la vacante de es el . Te recordamos presentarte 15 minutos antes con los documentos necesarios: . Nuestra dirección es Nezahualcóyotl 503 Col. San Sebastián, Toluca. Ver dirección en mapas: https://goo.gl/maps/tAaeUhJoFWCKSfnHA" target="_Blank">Enviar recibo cita</a><br>
        	<a href="https://api.whatsapp.com/send?phone=+521<?php echo get_post_meta($object->ID, 'valpa_telefono_meta', true);?>&text=<?php echo get_post_meta($object->ID, 'valpa_alias_meta', true);?>. Nuestra dirección es Nezahualcóyotl 503 Col. San Sebastián, Toluca. Ver dirección en mapas: https://goo.gl/maps/tAaeUhJoFWCKSfnHA" target="_Blank">Enviar dirección</a>

        </p>

        <?php
   

}
function valpa_no_homenaje_mb($object) {

        ?>
        <label></label>
        <p>
        	<input type="text"  name="valpa_no_homenaje_in" value="<?php echo get_post_meta($object->ID, 'valpa_no_homenaje_meta', true);?>">
        </p>
        

        <?php
   

}
function valpa_obituariorelacionado_mb($object) {

        ?>
        <label></label>
        <p>
        	<a href="<?php echo get_permalink(get_post_meta($object->ID, 'valpa_obiturariorelacionado_ofrenda_meta', true));?>" ><?php echo get_the_title(get_post_meta($object->ID, 'valpa_obiturariorelacionado_ofrenda_meta', true));?></a>
        </p>
        

        <?php
   

}
function valpa_fechas_mb($object) {
        ?>
        <label>Nacimiento</label>
        <p>
        	<input type="number" placeholder="día" name="valpa_nacimiento_dia_in" value="<?php echo get_post_meta($object->ID, 'valpa_nacimiento_dia_meta', true);?>">
        	 <input type="number" placeholder="mes" name="valpa_nacimiento_mes_in" value="<?php echo get_post_meta($object->ID, 'valpa_nacimiento_mes_meta', true);?>">
        	<input type="number" placeholder="año" name="valpa_nacimiento_ano_in" value="<?php echo get_post_meta($object->ID, 'valpa_nacimiento_ano_meta', true);?>">

        </p>
     
        <?php
   

}
function sucursal_relacionada_mb($object) {
	
	$args = array( 
		'post_status' => get_post_stati(),
		'posts_per_page' => -1,
		'post_type'        => 'valpa_sucursales_pt',
		'order_by' => 'post_title',
		'order'=>'ASC'
	);


	$proyectos = get_posts( $args );

	 wp_nonce_field( basename(__FILE__), 'mam_nonce' );

    // How to use 'get_post_meta()' for multiple checkboxes as array?
    $postmeta = maybe_unserialize( get_post_meta( $object->ID, 'sucursal_relacionada_meta', true ) );

    // Our associative array here. id = value
    $sucursal_relacionada_meta = array();

	foreach ( $proyectos as $proyecto ) :
		$sucursal_relacionada_meta[$proyecto->ID] = $proyecto->post_title ;
	endforeach; 
    // Loop through array and make a checkbox for each element
    foreach ( $sucursal_relacionada_meta as $id => $element) {

        // If the postmeta for checkboxes exist and 
        // this element is part of saved meta check it.
        if ( is_array( $postmeta ) && in_array( $id, $postmeta ) ) {
            $checked = 'checked="checked"';
        } else {
            $checked = null;
        }
        ?>

        <p>
            <input  type="checkbox" name="sucursal_relacionada_in[]" value="<?php echo $id;?>" <?php echo $checked; ?> />
            <?php echo $element;?>
        </p>

        <?php
    }
	

}
function preguntas_puesto_mb($object) {
	
	$args = array( 
		'post_status' => get_post_stati(),
		'posts_per_page' => -1,
		'post_type'        => 'valpa_preguntas_pt',
		'order_by' => 'post_title',
		'order'=>'ASC'
	);


	$preguntas = get_posts( $args );

	 wp_nonce_field( basename(__FILE__), 'mam_nonce' );

    // How to use 'get_post_meta()' for multiple checkboxes as array?
    $postmeta = maybe_unserialize( get_post_meta( $object->ID, 'preguntas_puesto_meta', true ) );

    // Our associative array here. id = value
    $preguntas_puesto_meta = array();

	foreach ( $preguntas as $pregunta ) :
		$preguntas_puesto_meta[$pregunta->ID] = $pregunta->post_title ;
	endforeach; 
    // Loop through array and make a checkbox for each element
    foreach ( $preguntas_puesto_meta as $id => $element) {

        // If the postmeta for checkboxes exist and 
        // this element is part of saved meta check it.
        if ( is_array( $postmeta ) && in_array( $id, $postmeta ) ) {
            $checked = 'checked="checked"';
        } else {
            $checked = null;
        }
        ?>

        <p>
            <input  type="checkbox" name="preguntas_puesto_in[]" value="<?php echo $id;?>" <?php echo $checked; ?> />
            <?php echo $element;?>
        </p>

        <?php
    }
	

}

function documentos_necesarios_mb($object) {
	
	$args = array( 
		'post_status' => get_post_stati(),
		'posts_per_page' => -1,
		'post_type'        => 'valpa_documentos_pt',
		'order_by' => 'post_title',
		'order'=>'ASC'
	);


	$proyectos = get_posts( $args );

	 wp_nonce_field( basename(__FILE__), 'mam_nonce' );

    // How to use 'get_post_meta()' for multiple checkboxes as array?
    $postmeta = maybe_unserialize( get_post_meta( $object->ID, 'documentos_necesarios_meta', true ) );

    // Our associative array here. id = value
    $documentos_necesarios_meta = array();

	foreach ( $proyectos as $proyecto ) :
		$documentos_necesarios_meta[$proyecto->ID] = $proyecto->post_title ;
	endforeach; 
    // Loop through array and make a checkbox for each element
    foreach ( $documentos_necesarios_meta as $id => $element) {

        // If the postmeta for checkboxes exist and 
        // this element is part of saved meta check it.
        if ( is_array( $postmeta ) && in_array( $id, $postmeta ) ) {
            $checked = 'checked="checked"';
        } else {
            $checked = null;
        }
        ?>

        <p>
            <input  type="checkbox" name="documentos_necesarios_in[]" value="<?php echo $id;?>" <?php echo $checked; ?> />
            <?php echo $element;?>
        </p>
        <?php
    }
	

}

function expo_relacionada_mb($object) {

	$args = array( 
		'post_status' => get_post_stati(),
		'posts_per_page' => -1,
		'post_type'        => 'post',
		'order_by' => 'post_title',
		'order'=>'ASC',
		'category' =>  get_cat_ID( 'exhibitions' ) ,
	);


	$exposiciones = get_posts( $args );

	 wp_nonce_field( basename(__FILE__), 'mam_nonce' );

    // How to use 'get_post_meta()' for multiple checkboxes as array?
    $postmeta = maybe_unserialize( get_post_meta( $object->ID, 'expo_relacionada_meta', true ) );

    // Our associative array here. id = value
    $expo_relacionada_meta = array();

	foreach ( $exposiciones as $exposicion ) :
		$expo_relacionada_meta[$exposicion->ID] = $exposicion->post_title ;
	endforeach; 
    // Loop through array and make a checkbox for each element
    foreach ( $expo_relacionada_meta as $id => $element) {

        // If the postmeta for checkboxes exist and 
        // this element is part of saved meta check it.
        if ( is_array( $postmeta ) && in_array( $id, $postmeta ) ) {
            $checked = 'checked="checked"';
        } else {
            $checked = null;
        }
        ?>

        <p>
            <input  type="checkbox" name="expo_relacionada_in[]" value="<?php echo $id;?>" <?php echo $checked; ?> />
            <?php echo $element;?>
        </p>

        <?php
    }
	

}

function inter_descripcion_fc($object){
	echo '<p><input type="checkbox" name="inter_descripcion_in" ';
	if( get_post_meta($object->ID, 'inter_descripcion_meta') )echo "checked";
	echo '> Descripción de sección</p>';
}
function experiencia_previa_mb($object){
	
	echo '<textarea name="experiencia_previa_in" style="width:100%"  rows="10">';
	echo get_post_meta($object->ID, 'experiencia_previa_meta', true);
	echo '</textarea>';
}

function tareas_puesto_mb($object){
	echo 'Separar tareas con un guion';
	echo '<textarea name="tareas_puesto_in" style="width:100%"  rows="10">';
	echo get_post_meta($object->ID, 'tareas_puesto_meta', true);
	echo '</textarea>';
}

function publico_objetivo_mb($object){
	
	echo '<textarea name="publico_objetivo_in" style="width:100%"  rows="10">';
	echo get_post_meta($object->ID, 'publico_objetivo_meta', true);
	echo '</textarea>';
}


function solicitud_codigo_mb($object){
	
	echo get_post_meta($object->ID, 'solicitud_codigo_meta', true);
}
function folio_global_mb($object){
	
	echo get_post_meta($object->ID, 'folio_global_meta', true);
}
function crdmn_equipo_fc($object){?>
	<div class="cltvo_multi_mb">
		<div class="cltvo_multi_papa">
			<?php $crdmn_equipo_arr = get_post_meta($object->ID, 'crdmn_equipo_meta', true) ? get_post_meta($object->ID, 'crdmn_equipo_meta', true) : array(''=>'');?>
			<?php $i=1;?>
			<?php foreach ($crdmn_equipo_arr as $nombre => $link):?>
			<div class="cltvo_multi_hijo cltvo_multi_hijo<?php echo $i;?>">
				<p>
					<label>Nombre </label>
					<input name="crdmn_equipo_nom<?php echo $i;?>" type="text" value="<?php echo $nombre;?>" />
				</p>
				<p>
					<label>Link </label>
					<input name="crdmn_equipo_link<?php echo $i;?>" type="text" value="<?php echo $link;?>" />
				</p>
				<hr>
			</div>
			<?php $i++;?>
			<?php endforeach;?>
		</div>
		<a href="#" class="nuevo-equipo-JS">+ agregar otro miembro de equipo</a>
	</div>
<?php
}

// funciones aqui ...


/** ==============================================================================================================
 *                                                Save post
 *  ==============================================================================================================
 */

function cltvo_save_post($id){
	// Permisos
	if( !current_user_can('edit_post', $id) ) return $id;

	// Vs Autosave
	if( defined('DOING_AUTOSAVE') AND DOING_AUTOSAVE ) return $id;
	if( wp_is_post_revision($id) OR wp_is_post_autosave($id) ) return $id;

	// ---------------------- salva el meta box ----------------------  

	// coloca el meta del metabox en el array 

	$meta_data_array = array( 
								'inter_descripcion_meta', 
								'inter_colaborador_meta'
							);

	foreach ( $meta_data_array as $meta_data ) {
		cltvo_save_metabox($id,$meta_data);
	}

	// ---------------------- funciones interiores del save ---------------------- 

	if(isset($_POST['fecha_dia_in'])){
		$fecha = $_POST['fecha_dia_in'].'-'.$_POST['fecha_mes_in'].'-'.$_POST['fecha_ano_in'];
		update_post_meta($id, 'fecha_meta', $fecha);
	}
	if( isset( $_POST[ 'valpa_info_puesto_' ] ) ) {
	    update_post_meta( $id, 'valpa_info_puesto_', $_POST[ 'valpa_info_puesto_' ] );
	}
	if( isset( $_POST[ 'sucursal_relacionada_in' ] ) ) {
	    update_post_meta( $id, 'sucursal_relacionada_meta', $_POST[ 'sucursal_relacionada_in' ] );
	}
	if( isset( $_POST[ 'valpa_log_links_' ] ) ) {
	    update_post_meta( $id, 'valpa_log_links_', $_POST[ 'valpa_log_links_' ] );
	}
	if( isset( $_POST[ 'valpa_no_homenaje_in' ] ) ) {
	    update_post_meta( $id, 'valpa_no_homenaje_meta', $_POST[ 'valpa_no_homenaje_in' ] );
	}
	if( isset( $_POST[ 'tipo_pregunta_puesto_in' ] ) ) {
	    update_post_meta( $id, 'tipo_pregunta_puesto_meta', $_POST[ 'tipo_pregunta_puesto_in' ] );
	}
	if( isset( $_POST[ 'servicio_relacionado_in' ] ) ) {
	    update_post_meta( $id, 'servicio_relacionado_meta', $_POST[ 'servicio_relacionado_in' ] );
	}
	if( isset( $_POST[ 'tipo_campo_puesto_in' ] ) ) {
	    update_post_meta( $id, 'tipo_campo_puesto_meta', $_POST[ 'tipo_campo_puesto_in' ] );
	}
	if( isset( $_POST[ 'valpa_telefono_solicitante_in' ] ) ) {
	    update_post_meta( $id, 'valpa_telefono_solicitante_meta', $_POST[ 'valpa_telefono_solicitante_in' ] );
	}
	if( isset( $_POST[ 'valpa_celular_solicitante_in' ] ) ) {
	    update_post_meta( $id, 'valpa_celular_solicitante_meta', $_POST[ 'valpa_celular_solicitante_in' ] );
	}
	if( isset( $_POST[ 'valpa_alias_solicitante_in' ] ) ) {
	    update_post_meta( $id, 'valpa_alias_solicitante_meta', $_POST[ 'valpa_alias_solicitante_in' ] );
	}
	if( isset( $_POST[ 'valpa_mail_solicitante_in' ] ) ) {
	    update_post_meta( $id, 'valpa_mail_solicitante_meta', $_POST[ 'valpa_mail_solicitante_in' ] );
	}
	if( isset( $_POST[ 'valpa_cp_in' ] ) ) {
	    update_post_meta( $id, 'valpa_cp_meta', $_POST[ 'valpa_cp_in' ] );
	}
	if( isset( $_POST[ 'valpa_direccion_in' ] ) ) {
	    update_post_meta( $id, 'valpa_direccion_meta', $_POST[ 'valpa_direccion_in' ] );
	}

	if( isset( $_POST[ 'valpa_telefono_in' ] ) ) {
	    update_post_meta( $id, 'valpa_telefono_meta', $_POST[ 'valpa_telefono_in' ] );
	}
	if( isset( $_POST[ 'valpa_tel_in' ] ) ) {
	    update_post_meta( $id, 'valpa_tel_meta', $_POST[ 'valpa_tel_in' ] );
	}
	if( isset( $_POST[ 'valpa_alias_in' ] ) ) {
	    update_post_meta( $id, 'valpa_alias_meta', $_POST[ 'valpa_alias_in' ] );
	}
	if( isset( $_POST[ 'valpa_mail_in' ] ) ) {
	    update_post_meta( $id, 'valpa_mail_meta', $_POST[ 'valpa_mail_in' ] );
	}
	if( isset( $_POST[ 'valpa_nacimiento_dia_in' ] ) ) {
	    update_post_meta( $id, 'valpa_nacimiento_dia_meta', $_POST[ 'valpa_nacimiento_dia_in' ] );
	}
	if( isset( $_POST[ 'valpa_nacimiento_mes_in' ] ) ) {
	    update_post_meta( $id, 'valpa_nacimiento_mes_meta', $_POST[ 'valpa_nacimiento_mes_in' ] );
	}
	if( isset( $_POST[ 'valpa_nacimiento_ano_in' ] ) ) {
	    update_post_meta( $id, 'valpa_nacimiento_ano_meta', $_POST[ 'valpa_nacimiento_ano_in' ] );
	}
	if( isset( $_POST[ 'valpa_defuncion_dia_in' ] ) ) {
	    update_post_meta( $id, 'valpa_defuncion_dia_meta', $_POST[ 'valpa_defuncion_dia_in' ] );
	}
	if( isset( $_POST[ 'valpa_defuncion_mes_in' ] ) ) {
	    update_post_meta( $id, 'valpa_defuncion_mes_meta', $_POST[ 'valpa_defuncion_mes_in' ] );
	}
	if( isset( $_POST[ 'valpa_defuncion_ano_in' ] ) ) {
	    update_post_meta( $id, 'valpa_defuncion_ano_meta', $_POST[ 'valpa_defuncion_ano_in' ] );
	}
	if( isset( $_POST[ 'caracteres_input_in' ] ) ) {
	    update_post_meta( $id, 'caracteres_input_meta', $_POST[ 'caracteres_input_in' ] );
	}
	if( isset( $_POST[ 'opciones_input_in' ] ) ) {
	    update_post_meta( $id, 'opciones_input_meta', $_POST[ 'opciones_input_in' ] );
	}
	if( isset( $_POST[ 'preguntas_puesto_in' ] ) ) {
	    update_post_meta( $id, 'preguntas_puesto_meta', $_POST[ 'preguntas_puesto_in' ] );
	}
	if( isset( $_POST[ 'documentos_necesarios_in' ] ) ) {
	    update_post_meta( $id, 'documentos_necesarios_meta', $_POST[ 'documentos_necesarios_in' ] );
	}
	if( isset( $_POST[ 'tareas_puesto_in' ] ) ) {
	    update_post_meta( $id, 'tareas_puesto_meta', $_POST[ 'tareas_puesto_in' ] );
	}
	if( isset( $_POST[ 'experiencia_previa_in' ] ) ) {
	    update_post_meta( $id, 'experiencia_previa_meta', $_POST[ 'experiencia_previa_in' ] );
	}
	if( isset( $_POST[ 'pause_first_in' ] ) ) {
	    update_post_meta( $id, 'pause_first_meta', $_POST[ 'pause_first_in' ] );
	}
	if( isset( $_POST[ 'backguards_in' ] ) ) {
	    update_post_meta( $id, 'backguards_meta', $_POST[ 'backguards_in' ] );
	}
	if( isset( $_POST[ 'frame_time_in' ] ) ) {
	    update_post_meta( $id, 'frame_time_meta', $_POST[ 'frame_time_in' ] );
	}
	if( isset( $_POST[ 'publico_objetivo_in' ] ) ) {
	    update_post_meta( $id, 'publico_objetivo_meta', $_POST[ 'publico_objetivo_in' ] );
	}
	if( isset( $_POST[ 'valpa_linkgoogle_in' ] ) ) {
	    update_post_meta( $id, 'valpa_linkgoogle_meta', $_POST[ 'valpa_linkgoogle_in' ] );
	}
	if ( ! empty( $_POST['expo_relacionada_in'] ) ) {
        update_post_meta( $id, 'expo_relacionada_meta', $_POST['expo_relacionada_in'] );

    // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $id, 'expo_relacionada_meta' );
    }
	
}

/** ==============================================================================================================
 *                               funciones adicionales de los metabox o del save post
 *  ==============================================================================================================
 */

/**
 * Guarda o actulaliza el valor de un meta data 
 * 
 * Parametros:
 *
 * @param string $meta_data nombre del meta data 
 *
 */

function cltvo_save_metabox($id,$meta_data){

		if( isset( $_POST[ $meta_data ] ) ) {
	    update_post_meta( $id, $meta_data , $_POST[ $meta_data ] );
	}

}

function ep_eventposts_metaboxes() {
    add_meta_box( 'ept_event_date_start', 'Cita', 'ept_event_date', array( 'post') , 'side', 'default', array( 'id' => '_start') );
    add_meta_box( 'ept_event_date_start', 'Cita', 'ept_event_date', array( 'valpa_ofrenda_pt') , 'side', 'default', array( 'id' => '_start') );

}
add_action( 'admin_init', 'ep_eventposts_metaboxes' );
  
// Metabox HTML
  
function ept_event_date($post, $args) {
    $metabox_id = $args['args']['id'];
    global $post, $wp_locale;
  
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'ep_eventposts_nonce' );
  
    $time_adj = current_time( 'timestamp' );
    $month = get_post_meta( $post->ID, $metabox_id . '_month', true );
  
    if ( empty( $month ) ) {
        $month = gmdate( 'm', $time_adj );
    }
  
    $day = get_post_meta( $post->ID, $metabox_id . '_day', true );
  
    if ( empty( $day ) ) {
        $day = gmdate( 'd', $time_adj );
    }
  
    $year = get_post_meta( $post->ID, $metabox_id . '_year', true );
  
    if ( empty( $year ) ) {
        $year = gmdate( 'Y', $time_adj );
    }
  
    $hour = get_post_meta($post->ID, $metabox_id . '_hour', true);
  
    if ( empty($hour) ) {
        $hour = gmdate( 'H', $time_adj );
    }
  
    $min = get_post_meta($post->ID, $metabox_id . '_minute', true);
  
    if ( empty($min) ) {
        $min = '00';
    }
  
    $month_s = '<select name="' . $metabox_id . '_month">';
    for ( $i = 1; $i < 13; $i = $i +1 ) {
        $month_s .= "\t\t\t" . '<option value="' . zeroise( $i, 2 ) . '"';
        if ( $i == $month )
            $month_s .= ' selected="selected"';
        $month_s .= '>' . $wp_locale->get_month_abbrev( $wp_locale->get_month( $i ) ) . "</option>\n";
    }
    $month_s .= '</select>';
  
    echo $month_s;
    echo '<input type="text" name="' . $metabox_id . '_day" value="' . $day  . '" size="2" maxlength="2" />';
    echo '<input type="text" name="' . $metabox_id . '_year" value="' . $year . '" size="4" maxlength="4" /> @ ';
    echo '<input type="text" name="' . $metabox_id . '_hour" value="' . $hour . '" size="2" maxlength="2"/>:';
    echo '<input type="text" name="' . $metabox_id . '_minute" value="' . $min . '" size="2" maxlength="2" />';
  
}
  
function ept_event_location() {
    global $post;
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'ep_eventposts_nonce' );
    // The metabox HTML
    $event_location = get_post_meta( $post->ID, '_event_location', true );
    echo '<label for="_event_location">Location:</label>';
    echo '<input type="text" name="_event_location" value="' . $event_location  . '" />';
}
  
// Save the Metabox Data
  
function ep_eventposts_save_meta( $post_id, $post ) {
   global $post;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;
  
    if ( !isset( $_POST['ep_eventposts_nonce'] ) )
        return;
  
    if ( !wp_verify_nonce( $_POST['ep_eventposts_nonce'], plugin_basename( __FILE__ ) ) )
        return;
  
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ) )
        return;
  
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though
  
    $metabox_ids = array( '_start' );
  
    foreach ($metabox_ids as $key ) {
        $events_meta[$key . '_month'] = $_POST[$key . '_month'];
        $events_meta[$key . '_day'] = $_POST[$key . '_day'];
            if($_POST[$key . '_hour']<10){
                 $events_meta[$key . '_hour'] = '0'.$_POST[$key . '_hour'];
             } else {
                   $events_meta[$key . '_hour'] = $_POST[$key . '_hour'];
             }
        $events_meta[$key . '_year'] = $_POST[$key . '_year'];
        $events_meta[$key . '_hour'] = $_POST[$key . '_hour'];
        $events_meta[$key . '_minute'] = $_POST[$key . '_minute'];
        $events_meta[$key . '_eventtimestamp'] = $events_meta[$key . '_year'] . $events_meta[$key . '_month'] . $events_meta[$key . '_day'] . $events_meta[$key . '_hour'] . $events_meta[$key . '_minute'];
    }
  
    // Add values of $events_meta as custom fields
  
    foreach ( $events_meta as $key => $value ) { // Cycle through the $events_meta array!
        if ( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode( ',', (array)$value ); // If $value is an array, make it a CSV (unlikely)
        if ( get_post_meta( $post->ID, $key, FALSE ) ) { // If the custom field already has a value
            update_post_meta( $post->ID, $key, $value );
        } else { // If the custom field doesn't have a value
            add_post_meta( $post->ID, $key, $value );
        }
        if ( !$value ) delete_post_meta( $post->ID, $key ); // Delete if blank
    }
  
}
  
add_action( 'save_post', 'ep_eventposts_save_meta', 1, 2 );
  
/**
 * Helpers to display the date on the front end
 */
  
// Get the Month Abbreviation
  
function eventposttype_get_the_month_abbr($month) {
    global $wp_locale;
    for ( $i = 1; $i < 13; $i = $i +1 ) {
                if ( $i == $month )
                    $monthabbr = $wp_locale->get_month_abbrev( $wp_locale->get_month( $i ) );
                }
    return $monthabbr;
}
  
// Display the date
  
function eventposttype_get_the_event_date() {
    global $post;
    $eventdate = '';
    $month = get_post_meta($post->ID, '_month', true);
    $eventdate = eventposttype_get_the_month_abbr($month);
    $eventdate .= ' ' . get_post_meta($post->ID, '_day', true) . ',';
    $eventdate .= ' ' . get_post_meta($post->ID, '_year', true);
    $eventdate .= ' at ' . get_post_meta($post->ID, '_hour', true);
    $eventdate .= ':' . get_post_meta($post->ID, '_minute', true);
    echo $eventdate;
}




?>