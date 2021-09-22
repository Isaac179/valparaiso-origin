<?php $query = $_GET; 
    if (isset($query['int'])) {
        if ($query['int'] == 'on' ) {
            $visibilidad = 'style="visibility:visible"';
        } elseif ( $query['int'] == 'off') {
           $visibilidad = 'style="visibility:hidden"';
        }
    } else {
       $visibilidad = 'style="visibility:hidden"';
    }; ?>

<div  class="slider-interactivo" <?php  echo $visibilidad; ?> >
	<div class="cerrar-slider-interactivo">
		detener  
	</div>
  <div class="swiper-container s1" >
    <div class="swiper-wrapper">
        <div class="swiper-slide interactivo-persona">
            <div class="">
                <div class="avatar-imagen">
                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                        <?php $thumb_id = get_post_thumbnail_id($post->ID); ?>
                        <?php $img_src = wp_get_attachment_image_src($thumb_id, 'thumbnail'); ?>
                        <?php $img_src =  $img_src[0]; ?>
                        <img src="<?php echo $img_src; ?>" class="avatar-interactivo" >
                   <?php  else: ?>  
                        <img src="<?php bloginfo('template_url');?>/images/avatar.jpg"  class="avatar-interactivo"/>

                    <?php  endif; ?>   
                </div>
                <h1><?php  echo $post->post_title; ?> </h1>
                    <h4><?php  echo get_post_meta($post->ID, 'valpa_nacimiento_ano_meta', true); ?>-<?php echo get_the_date('Y'); ?></h4> 
            </div>
             
        </div>
        <?php 
        $unsupported_mimes  = array( 'application/pdf' );
        $all_mimes          = get_allowed_mime_types();
        $accepted_mimes     = array_diff( $all_mimes, $unsupported_mimes );
        
        $attachments = get_posts( array(
            'post_type' => 'attachment',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'title',
            'post_parent' => $post->ID,
            'exclude'     => get_post_thumbnail_id(),
            'post_mime_type'    => $accepted_mimes,
        ) );
            $i = 1;
            foreach ( $attachments as $attachment ):
            $info_foto = wp_get_attachment_metadata($attachment->ID);
            $thumbimg = wp_get_attachment_image_src( $attachment->ID, 'thumbnail_perfil' );
            $thumbimg = $thumbimg[0];
            $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
            
        ?>
        <div class="swiper-slide interactivo-foto">
          
                    <img  alt="<?php echo $alt; ?>" src="<?php echo $thumbimg; ?>"   >
              
         
        </div>
        <?php endforeach; ?>

        <?php 

         $ofrendas_relacionadas = get_posts( array(
            'post_type'=> 'valpa_ofrenda_pt',
            'orderby' => 'date',
            'order'   => 'DESC',
            'posts_per_page' => 200,
            'meta_query'  => array(
                array(
                    'key' => 'valpa_obiturariorelacionado_ofrenda_meta',
                    'value' => $post->ID
                )
            )
        ) );
        foreach ( $ofrendas_relacionadas as $ofrenda ):
            $tipo_ofrenda = get_post_meta($ofrenda->ID, 'valpa_tipoofrenda_meta', true);
            if ($tipo_ofrenda == 'vela') :
        ?>  
            <div class="swiper-slide interactivo-vela">
              
           
                    <div class="imagen-vela">
                        <img src="<?php bloginfo('template_url');?>/images/memorial/vela-grande.jpg" class="icono-vela"/>
                    </div>
             
                    <div class="texto-vela">
                        
                        
                        <p>"<?php echo $ofrenda->post_content; ?>"<span><?php  echo $ofrenda->post_title; ?><span></p>
                        

                            
                    </div>
                    <div class="qrcode-ofrenda">
                        <div class="qrcode" ></div>
                        <div class="contenido-qr" > <p>Escanea y honra la memoria de <strong><?php  echo $post->post_title; ?></strong> con un agradecimiento
                                                    o ingresa a www.valparaiso.com.mx y busca en nuestro obituario</p></div>
                    </div>
                                   
            </div>

            <?php elseif ($tipo_ofrenda == 'recuerdo') :?>
                <div class="swiper-slide interactivo-recuerdo">
              
           
                    <div class="imagen-recuerdo">
                        <?php if(empty( get_post_meta($ofrenda->ID, 'valpa_imagenpredefinida_ofrenda_meta', true) ) === false) :
                            $img_meta = get_post_meta($ofrenda->ID, 'valpa_imagenpredefinida_ofrenda_meta', true);
                            
                            $img_src = '/images/memorial/'.$img_meta.'-valparaiso-funerales.jpg';
                            ?>
                            <img src="<?php bloginfo('template_url');?><?php echo $img_src; ?>"  >

                        <?php else:
                            $thumb_id = get_post_thumbnail_id($ofrenda->ID); 
                            $img_src = wp_get_attachment_image_src($thumb_id, 'thumbnail_perfil'); 
                            $img_src =  $img_src[0]; ?>
                           
                            <img src="<?php echo $img_src; ?>"  >
                        <?php endif;?>
                       
                    </div>
             
                    <div class="texto-recuerdo">
                        
                        
                        <p>"<?php echo $ofrenda->post_content; ?>"<span><?php  echo $ofrenda->post_title; ?><span></p>
                        

                            
                    </div>
                    <div class="qrcode-ofrenda">
                        <div class="qrcode" ></div>
                        <div class="contenido-qr" > <p>Escanea y honra la memoria de <strong><?php  echo $post->post_title; ?></strong> con un agradecimiento
                                                    o ingresa a www.valparaiso.com.mx y busca en nuestro obituario</p></div>
                    </div>
                                   
                </div>

               

            <?php endif;?>
        <?php endforeach?>

        

      
     
    </div>
    <!-- Add Pagination -->

  </div> 
  
</div>