<?php

/**
 * En este archivo se incluyen los post type personalizados  y las columnas personalizadas 
 *
 */

/** ==============================================================================================================
 *                                                  HOOKS
 *  ==============================================================================================================
 */

// ------------ post type ---------------------------

add_action( 'init', 'cltvo_posttypes' ); // incluye los post types personalizados 


// ------------ colunmas  ---------------------------

// add_action( 'manage_posts_custom_column' , 'cltvo_tax_col', 10, 2 ); 
// add_action( 'manage_crdmn_proyecto_pt_posts_custom_column' , 'cltvo_tax_col', 10, 2 );

// add_filter( 'manage_edit-post_columns', 'cltvo_nueva_col_post' );
// add_filter( 'manage_edit-crdmn_proyecto_pt_columns', 'cltvo_nueva_col_proy' );



/** ==============================================================================================================
 *                                                TIPOS DE POSTS   
 *  ==============================================================================================================
 */

function cltvo_posttypes(){
	//Diseno
	
	register_post_type(
        'valpa_obituario_pt'
    ,   array (
           'has_archive'         => TRUE
        ,   'label'              => 'Obituario'
        ,	'singular_name'		 => 'Homenaje'
    	,	'capability_type' => 'post'
        ,   'menu_position'      => 9
        ,   'public'             => TRUE
        ,   'rewrite'            => array ( 'slug' => 'obituario' )
        ,   'supports'           => array ( 'editor', 'title', 'thumbnail','comments')
        )
    );

    //puestos
	register_post_type(
        'valpa_trabajos_pt'
    ,   array (
           'has_archive'         => TRUE
        ,   'label'              => 'Vacantes'
        ,	'singular_name'		 => 'vacante'    
    	,	'capability_type' => 'page'
        ,   'menu_position'      => 2
        ,   'public'             => TRUE
        ,   'rewrite'            => array ( 'slug' => 'bolsadetrabajo' )
        ,   'supports'           => array ( 'editor', 'title', 'thumbnail' )
        )
    );
    register_post_type(
        'valpa_preguntas_pt'
    ,   array (
           'has_archive'         => TRUE
        ,   'label'              => 'Cuestionario'
        ,	'singular_name'		 => 'Pregunta'
    	,	'capability_type' => 'page'
        ,   'menu_position'      => 3
        ,   'public'             => TRUE
        )
    );
    register_post_type(
        'valpa_documentos_pt'
    ,   array (
           'has_archive'         => TRUE
        ,   'label'              => 'Documentos'
        ,	'singular_name'		 => 'Documento'
    	,	'capability_type' => 'page'
        ,   'menu_position'      => 5
        ,   'public'             => TRUE
        ,   'rewrite'            => array ( 'slug' => 'documentos' )
        ,   'supports'           => array ( 'editor', 'title' )
        )
    );
    register_post_type(
        'valpa_sucursales_pt'
    ,   array (
           'has_archive'         => TRUE
        ,   'label'              => 'Sucursales'
        ,	'singular_name'		 => 'Sucursal'
    	,	'capability_type' => 'page'
        ,   'menu_position'      => 4
        ,   'public'             => TRUE
    
        ,   'supports'           => array ( 'editor', 'title' )
        )
    );
    register_post_type(
        'valpa_ofrenda_pt'
    ,   array (
           'has_archive'         => TRUE
        ,   'label'              => 'Ofrendas'
        ,   'singular_name'      => 'ofrenda'
        ,   'capability_type' => 'post'
        ,   'menu_position'      => 4
        ,   'taxonomies'          => array('category','velas', 'recuerdos' )
        ,   'public'             => TRUE
        ,   'supports'           => array ( 'editor', 'title','thumbnail', 'taxonomies', 'excerpt' )
        )
    );
}


/** ==============================================================================================================
 *                                                  Columnas en PT 
 *  ==============================================================================================================
 */


// ???
function cltvo_nueva_col_post($columns) {
	//este call back se tiene que repetir por cada
	//Post Type que se quiera afectar
	$unsets = array('author', 'categories', 'tags', 'comments', 'date');
	foreach ($unsets as $unset) unset($columns[$unset]);
	$columns['crdmn_proyecto_tax'] = 'Proyecto';
	$columns['tags'] = 'Etiquetas';
	$columns['date'] = 'Fecha';

	return $columns;
}

// ???
function cltvo_nueva_col_proy($columns) {
	//cambiar el sufijo dependiendo de el nombre del Post Type
	$unsets = array('tags', 'date');
	foreach ($unsets as $unset) unset($columns[$unset]);
	$columns['crdmn_cliente_tax'] = 'Cliente';
	$columns['crdmn_servicio_tax'] = 'Servicio';
	$columns['crdmn_proyecto_tax'] = 'Proyecto';
	$columns['tags'] = 'Etiquetas';
	$columns['date'] = 'Fecha';

	return $columns;
}

// ???
function cltvo_tax_col( $column_name, $post_id ) {
	//Muestra en la columna el nombre
	//de las taxonomías de ese post con su link
	$taxonomy = $column_name;
	$post_type = get_post_type($post_id);
	$terms = get_the_terms($post_id, $taxonomy);

	if (!empty($terms) ) {
		foreach ( $terms as $term )
			//$post_terms[] = $term->name;
			$post_terms[] ="<a href='edit.php?post_type={$post_type}&{$taxonomy}={$term->slug}'> " .esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
		echo join('', $post_terms );
	}
}

// Add the custom columns to the book post type:
add_filter( 'manage_edit-valpa_solicitudes_pt_columns', 'set_valpa_postulantes_pt_columns' );
function set_valpa_postulantes_pt_columns($columns) {
    unset( $columns['author'] );
    $columns['codigo'] = __( 'Codigo');

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_valpa_solicitudes_pt_posts_custom_column' , 'custom_book_column', 10, 2 );
function custom_book_column( $column, $post_id ) {
    switch ( $column ) {
        case 'codigo' :
            echo get_post_meta( $post_id , 'solicitud_codigo_meta' , true ); 
            break;

    }
}

//Renombrar el nombre de menú post o entradas por Noticias
function modificar_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Solicitudes';
    $submenu['edit.php'][5][0] = 'Solicitudes';
    $submenu['edit.php'][10][0] = 'A&ntilde;adir Solicitudes';
   
    echo '';
}
 
 
function modificar_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Solicitudes';
    $labels->singular_name = 'Solicitud';
    $labels->add_new = 'A&ntilde;adir Nueva';
    $labels->add_new_item = 'A&ntilde;adir Nueva Solicitud';
    $labels->edit_item = 'Editar Solicitud';
    $labels->new_item = 'Nueva Solicitud';
    $labels->view_item = 'Ver Solicitud';
    $labels->search_items = 'Buscar Solicitud';
    $labels->not_found = 'No se han encontrado Solicitud';
    $labels->not_found_in_trash = 'No se han encontrado Solicitud en la papelera';
    $labels->all_items = 'Todas las Solicitud';
    $labels->menu_name = 'Solicitud';
    $labels->name_admin_bar = 'Solicitud';
}
 
add_action( 'admin_menu', 'modificar_post_label' );
add_action( 'init', 'modificar_post_object' );


// add_filter(
//     'manage_post_posts_columns',
//     'wpse152971_replace_column_title_method_c'
// );
// function wpse152971_replace_column_title_method_c( $posts_columns ) {

//     $posts_columns[ 'title' ] = __( 'Nombre' );
//     $posts_columns[ 'puesto' ] =  __( 'Puesto');
//     $posts_columns[ 'codigo' ] =  __( 'Codigo' );  
//     $posts_columns[ 'sucursal' ] =  __( 'Sucursal' );     
//     $posts_columns[ 'categories' ] = __( 'Estatus' );

//     return $posts_columns;//print_r($posts_columns);
   
// }
// add_action( 'manage_post_posts_custom_column' , 'custom_post_column', 10, 2 );
// function custom_post_column( $column, $post_id ) {
//     switch ( $column ) {
//         case 'Sucursal' :
//              $sucursal = get_post_meta( $post_id , 'sucursal_relacionada_meta' , true ); 
//              $nombre = get_post( $sucursal ); 
//             $nombre = $nombre->post_title;
//              echo $sucursal;
//             break;

//         case 'Puesto' :
//              $puesto = get_post_meta( $post_id , 'puesto_relacionado_meta' , true ); 
//              $nombrepuesto = get_post( $puesto ); 
//             $nombrepuesto = $nombrepuesto->post_title;
//              echo $puesto;
//             break;
      
//         case 'Codigo' :
//             echo get_post_meta( $post_id , 'solicitud_codigo_meta' , true ); 
//             break;

//     }
// }
// Add the custom columns to the book post type:
add_filter( 'manage_post_posts_columns', 'set_custom_edit_post_columns' );
function set_custom_edit_post_columns($columns) {
    unset( $columns['author'] );
    $columns[ 'title' ] = __( 'Nombre' );
    $columns['sucursal'] = __( 'Sucursal');
    $columns[ 'codigo' ] =  __( 'Codigo');
    $columns[ 'folio' ] =  __( 'Folio');
    $columns[ 'cita' ] =  __( 'Cita');
    $columns[ 'categories' ] = __( 'Estatus' );
    $columns[ 'tags' ] = __( 'Vacante' );

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_post_posts_custom_column' , 'custom_post_column', 10, 2 );
function custom_post_column( $column, $post_id ) {
    switch ( $column ) {

        case 'sucursal' :
            echo get_post_meta( $post_id , 'sucursal_relacionada_meta' , true ); 
            break;

        case 'codigo' :
            echo get_post_meta( $post_id , 'solicitud_codigo_meta' , true ); 
            break;
        case 'folio' :
            echo get_post_meta( $post_id , 'folio_global_meta' , true ); 
            break;
        case 'cita' :
            $day = get_post_meta($post_id, '_start_day', true); 
            $month = get_post_meta($post_id, '_start_month', true); 
            $year = get_post_meta($post_id, '_start_year', true); 
            $hour = get_post_meta($post_id, '_start_hour', true); 
            $minute = get_post_meta($post_id, '_start_minute', true); 
            if ($day == null ) {
               echo "Sin cita";
            }else{
              echo $day.' '.$month.' '.$year.' '.$hour.':'.$minute;  
            }
            break;

    }
}
add_filter( 'manage_valpa_ofrenda_pt_posts_columns', 'set_custom_edit_post_columns_ofrenda' );
function set_custom_edit_post_columns_ofrenda($columns) {
    unset( $columns['author'] );
    $columns[ 'title' ] = __( 'Nombre' );
   
    $columns[ 'cita' ] =  __( 'Cita');
    $columns[ 'categories' ] = __( 'Estatus' );

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_valpa_ofrenda_pt_posts_custom_column' , 'custom_post_column_ofrenda', 10, 2 );
function custom_post_column_ofrenda( $column, $post_id ) {
    switch ( $column ) {

        case 'cita' :
            $day = get_post_meta($post_id, '_start_day', true); 
            $month = get_post_meta($post_id, '_start_month', true); 
            $year = get_post_meta($post_id, '_start_year', true); 
            $hour = get_post_meta($post_id, '_start_hour', true); 
            $minute = get_post_meta($post_id, '_start_minute', true); 
            if ($day == null ) {
               echo "Sin cita";
            }else{
              echo $day.' '.$month.' '.$year.' '.$hour.':'.$minute;  
            }
            break;

    }
}

?>