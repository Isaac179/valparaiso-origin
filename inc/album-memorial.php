
<div  class="slider-memorial" >
    <div class="cerrar-slider-memorial">
    
            Cerrar
          
    </div>
  <div class="swiper-container s2" >
    <div class="swiper-wrapper">
        
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
        <div class="swiper-slide">
          <div class="swiper-slide-container">
                    <img  alt="<?php echo $alt; ?>" src="<?php echo $thumbimg; ?>"   >
              </div>
         
        </div>
        <?php endforeach; ?>

      
     
    </div>
    <!-- Add Pagination -->

  </div>
</div>