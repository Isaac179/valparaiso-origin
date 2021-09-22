<?php
    require_once("../../../../wp-load.php");
    require_once( '../../../../wp-admin/includes/image.php' );
    require_once( '../../../../wp-admin/includes/file.php' );
    require_once( '../../../../wp-admin/includes/media.php' );

     if( !wp_verify_nonce($_POST['_wpnonce'], 'wps_mandar_vela') ) {
        echo 'Tuvimos un problema con su solicitud.';
        return;
    } 

    // información de la impresión


    //----------------------------envió de los correos --------------------------------

   

if (isset($_POST['nombre'])) { // en esta función se envía la información  solo en caso de que la información llegue correctamente
   

    $nombrerela = $_POST['nombre']; 
    $mail = $_POST['E-mail']; 
    $telefono = $_POST['telefono'];
    $contenido = $_POST['texto'];
    $obiturariorelacionado = $_POST['obiturariorelacionado'];
    $numvelas = get_post_meta($obiturariorelacionado, 'num_velas_meta', true);
    if( !isset($numvelas) || empty($numvelas)  ){
            $numvelas = 0;
    };
    $cat_name = "vela"; 

  

    $post = array(
        'post_title'    => $nombrerela,
        'post_content'  => $contenido,
        'post_status'   => 'publish',   // Could be: publish
        'post_type'     => 'valpa_ofrenda_pt', // Could be: `page` or your CPT
       
    );
         
    $result = wp_insert_post( $post ,  true);

    add_post_meta( $result, 'valpa_telefono_meta', $telefono );
    add_post_meta( $result, 'valpa_mail_meta', $mail );
    add_post_meta( $result, 'valpa_obiturariorelacionado_ofrenda_meta', $obiturariorelacionado );
    add_post_meta( $result, 'valpa_tipoofrenda_meta', $cat_name );
    

    $numvelas = $numvelas + 1;
    update_post_meta( $obiturariorelacionado, 'num_velas_meta', $numvelas );
    $respuesta = "su vela ha sido encendida";


    
  
   
    // if ($primer_mail && $segundo_mail) {
    //     if (mailchip == true) { // solo en caso de que quieran registrarse en mailchimp

    //         $mergevars_val = array(); // inicia si campos extra en para mailchimp
    //         if (mailchip_mergevar_on == true) { // solo en caso de que quieran registrarse campos extra en mailchimp
    //             $mailchimp_mergevars = merge_vars_gen($_POST[id_form]); // función para definir el valor de los campos extra

    //             foreach ($mailchip_merge_array as $key => $value) { // asigna el valor correspondiente a campo extra
    //                 if (isset($mailchimp_mergevars[$value])) {
    //                     $mergevars_val[$key] = $mailchimp_mergevars[$value];
    //                 } else {
    //                     $mergevars_val[$key] = ""; // en caso de que el input no llegara lo marca como vació
    //                 }
    //             }

    //         }
    //         mailchimp_reg($mergevars_val, $cabeza); // función para enviar a mailchimp
    //     }
    echo $respuesta;
} else { // o regresa un error en caso de que exista un problema con los form
    echo "Error en envío";
    exit;

};


 

?>