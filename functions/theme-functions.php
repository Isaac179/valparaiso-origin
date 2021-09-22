<?php

/**
 * En este archivo se incluyen las funciones del tema 
 *
 */


/** ==============================================================================================================
 *                                              FUNCIONES DEL TEMA
 *  ==============================================================================================================
 */
function default_comments_on( $data ) {
    if( $data['post_type'] == 'valpa_obituario_pt' ) {
        $data['comment_status'] = 'open';
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'default_comments_on' );

if (!is_admin()) {
function wpb_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'valpa_obituario_pt');
}
return $query;
}
add_filter('pre_get_posts','wpb_search_filter');
}

// add_filter('pre_get_posts', 'filter_search');
 function cltvo_imagen_titular($parent_id, $tipo_de_imagen, $tamano_de_imagen ) { 
 	//imageb con meta value: imagen_titular
	$img_tam_compl_args = array(
		'posts_per_page' => 1,
		'post_parent' => $parent_id,
		'post_type' => 'attachment',
		'post_status' => 'inherit',
		'post_mime_type' => 'image',
		'meta_key' => 'daniel_tamano_img_meta',
		'meta_value' => $tipo_de_imagen,
	);

	$img_tam_compls = get_posts($img_tam_compl_args);

	if (!is_array($img_tam_compls)) //Si no existe regresa falso
		return false;

	$img_tam_compl = reset($img_tam_compls);
	$src = wp_get_attachment_image_src($img_tam_compl->ID, $tamano_de_imagen, true);
	$alt = get_post_meta($img_tam_compl->ID, '_wp_attachment_image_alt', true);
	$respuesta = array(
		'src' => $src[0], 
		'alt' => $alt
	);
	return $respuesta;//regresa un arreglo con src la direccion de la imagen
   };

   

// funciones aqui ...
   function dnl_imagenes_dailywork($parent_id, $tipo_de_imagen ) { 
 	//imageb con meta value: imagen_titular
	$img_tam_compl_args = array(
		'posts_per_page' => -1,
		'post_parent' => $parent_id,
		'post_type' => 'attachment',
		'post_status' => 'inherit',
		'post_mime_type' => 'image',
		'meta_key' => 'daniel_tamano_img_meta',
		'meta_value' => $tipo_de_imagen,
	);

	$img_tam_compls = get_posts($img_tam_compl_args);

	return $img_tam_compls;//regresa un arreglo con src la direccion de la imagen
   };

function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
        
        <?php printf( __( '<span class="fn">%s</span> ' ), get_comment_author_link() ); ?> <?php comment_text(); ?>
    </div>
    

    


    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
}
remove_filter('comment_text','wpautop',30);

function bac_PostViews($post_ID) {
 
    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count'; 
     
    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta($post_ID, $count_key, true);
     
    //If the the Post Custom Field value is empty. 
    if($count == ''){
        $count = 0; // set the counter to zero.
         
        //Delete all custom fields with the specified key from the specified post. 
        delete_post_meta($post_ID, $count_key);
         
        //Add a custom (meta) field (Name/value)to the specified post.
        add_post_meta($post_ID, $count_key, '0');
        return $count . ' Visitas';
     
    //If the the Post Custom Field value is NOT empty.
    }else{
        $count++; //increment the counter by 1.
        //Update the value of an existing meta key (custom field) for the specified post.
        update_post_meta($post_ID, $count_key, $count);
         
        //If statement, is just to have the singular form 'View' for the value '1'
        if($count == '1'){
        return $count . ' Visita';
        }
        //In all other cases return (count) Views
        else {
        return $count . ' Visitas';
        }
    }
}



add_action('init', 'my_rem_editor_from_post_type');
function my_rem_editor_from_post_type() {
    remove_post_type_support( 'valpa_preguntas_pt', 'editor' );
}



/**
 * Add label to post thumbnail meta box
 */
function swd_admin_post_thumbnail_add_label($content, $post_id, $thumbnail_id)
{
    $post = get_post($post_id);
    if ($post->post_type == 'valpa_trabajos_pt') {
        $content .= '<strong><i>La imagen debe medir 1200 x 628 px</strong></i>';
        return $content;
    }

    return $content;
}
add_filter('admin_post_thumbnail_html', 'swd_admin_post_thumbnail_add_label', 10, 3);

add_action('wp_body_open', 'add_code_on_body_open');
function add_code_on_body_open() {
    echo '<div id="fb-root"></div><script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="JwwXnb1z"></script>';
}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "No hay visitas";
    }
    return $count.' visitas';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// add_filter('next_post_link', 'post_link_attributes');
// add_filter('previous_post_link', 'post_link_attributes');

// function post_link_attributes($output) {
//     $code = 'href="#"';
//     $linkpost = str_replace('<a href=', '<a '.$code.' linksingle=', $output);
//     $linkpost = str_replace('rel="prev">', '>', $linkpost);
//     $linkpost = str_replace('rel="next">', '>', $linkpost);

//     return $linkpost;
// }
?>