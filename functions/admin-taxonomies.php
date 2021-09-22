<?php

/**
 * En este archivo se incluyen las taxonomías personalizadas  
 *
 */

/** ==============================================================================================================
 *                                                  HOOKS
 *  ==============================================================================================================
 */

add_action( 'init', 'cltvo_custom_tax' ); // incluye las taxonomias personalizadas 


/** ==============================================================================================================
 *                                               TAXONOMÍAS
 *  ==============================================================================================================
 */

function cltvo_custom_tax(){
	//Nombre de la taxonomía
	$argumentos = array(						
		'labels' => array(
			'name'			=> 'Estatus',			//Nombre
			'add_new_item'	=> 'Nueva Estatus',		//Nombre del botón para agregar nuevo término
		//Asignar el término a un término padre
		),
		'hierarchical' => true
	);
	
	register_taxonomy(
		'inter_estatus_tax',						//nombre de la tax
		'valpa_solicitudes8_pt',							//a qué posttype pertenece
		$argumentos
	);	

	// agrega aquí ...
}



?>