<?php

/**
 * En este archivo se incluyen los scripts
 *
 */


/** ==============================================================================================================
 *                                                HOOKS
 *  ==============================================================================================================
 */


 add_action( 'wp_enqueue_scripts', 'cltvo_js' ); // incluye el functions.js
 add_action( 'admin_enqueue_scripts', 'cltvo_admin_js' ); // incluye el admin-functions.js. Descomentar para tener JS en admin (no olvidar crear el file [admin-functions.js])


/** ==============================================================================================================
 *                                               SCRIPTS
 *  ==============================================================================================================
 */

// incluye el functions.js
function cltvo_js(){
	wp_register_script( 'cltvo_functions_js', JSPATH.'functions.js', array('jquery','scrollIt','swiper','validate','qrcode'), false, true );
	wp_localize_script( 'cltvo_functions_js', 'cltvo_js_vars', cltvo_js_vars() );
	wp_register_script( 'swiper', JSPATH.'swiper.min.js', array('jquery'), false, true );
	wp_register_script( 'scrollIt', JSPATH.'scrollIt.js', array('jquery'), false, true );
	wp_register_script( 'validate', JSPATH.'jquery.validate.js', array('jquery'), false, true );
	wp_register_script( 'qrcode', JSPATH.'qrcode.min.js', array('jquery'), false, false );

	wp_enqueue_script('jquery');

	wp_enqueue_script('cltvo_functions_js');
}

// incluye el admin-functions.js

function cltvo_admin_js(){
	wp_register_script( 'cltvo_admin_functions_js', JSPATH.'admin-functions.js', array('jquery'), false, false );
	wp_localize_script( 'cltvo_admin_functions_js', 'cltvo_js_vars', cltvo_js_vars() );
	wp_enqueue_script('cltvo_admin_functions_js');
}

// genera el site_url y template_url para javascript  

function cltvo_js_vars(){
	$php2js_vars = array(
		'site_url'     => home_url('/'),
		'template_url' => get_bloginfo('template_url')
	);
	return $php2js_vars;
}


?>