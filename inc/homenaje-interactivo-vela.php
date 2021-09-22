

<div  class="slider-interactivo-vela"  >
	<div class="cerrar-slider-vela">
		detener  
	</div>
  <div class="swiper-container s4" >
    <div class="swiper-wrapper">
        <?php 
             $velas_relacionadas = get_posts( array(
                'post_type'=> 'valpa_ofrenda_pt',
                'orderby' => 'date',
                'order'   => 'DESC',
                'posts_per_page' => 200,
                
                'meta_query'  => array(
                    array(
                        'key' => 'valpa_obiturariorelacionado_ofrenda_meta',
                        'value' => $post->ID
                    ),
                    array(
                        'key' => 'valpa_tipoofrenda_meta',
                        'value' => 'vela'
                    ),
                )
            ) );
             foreach ( $velas_relacionadas as $vela_relacionada ):
             ?> 
            <div class="swiper-slide interactivo-vela">
              
           
                    <div class="imagen-vela">
                        <img src="<?php bloginfo('template_url');?>/images/memorial/vela-grande.jpg" class="icono-vela"/>
                    </div>
             
                    <div class="texto-vela">
                        
                        
                        <p>"<?php echo $vela_relacionada->post_content; ?>"<span><?php  echo $vela_relacionada->post_title; ?><span></p>
                        

                            
                    </div>
                                   
            </div>

          
        <?php endforeach?>

        

      
     
    </div>
    <!-- Add Pagination -->

  </div> 
  
</div>