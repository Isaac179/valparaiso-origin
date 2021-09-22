<?php get_header(); ?>
<div class="row informacion-homenaje">
	<div class="cuadricula">
		
			<?php 
			 $ofrendas_relacionadas = get_posts( array(
	            'post_type'=> 'valpa_ofrenda_pt',
				'orderby' => 'date',
				'order'   => 'DESC',
                'posts_per_page' => 20,
                'meta_query'  => array(
		            array(
		                'key' => 'valpa_obiturariorelacionado_ofrenda_meta',
		                'value' => $post->ID
		            )
		        )
	        ) );
           	foreach ( $ofrendas_relacionadas as $ofrenda ):
            ?>   
            	<div class="cuadro grande-12">
            			<?php $thumb_id = get_post_thumbnail_id($ofrenda->ID); ?>
                        <?php $img_src = wp_get_attachment_image_src($thumb_id, 'thumbnail'); ?>
                        <?php $img_src =  $img_src[0]; ?>
                        <img src="<?php echo $img_src; ?>"  >
            			<?php  echo $ofrenda->post_title; ?>
            			<?php echo $ofrenda->post_content; ?>
            	</div>	

            <?php endforeach?>
		
	
	</div>
</div>
<?php get_footer(); ?>
