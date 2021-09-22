<?php get_header(); ?>

<div class="row cuerpo" >
	 
	<div class="row portada">    
	   		<div class="blanco-slide"></div>
		 	 <img class="desaparece-chico"src="<?php bloginfo('template_url');?>/images/memorial/portada.jpg" >
		     <img class="desaparece-grande"src="<?php bloginfo('template_url');?>/images/memorial/portada-2.jpg" >

	</div>  
	<div class="row redes-homenaje-single desaparece-chico">
		<div class="columns grande-11 centered ">						
			<div class="links-compartir face">
				<a href="#" onclick="share_fb('<?php echo get_permalink($post->ID);?>');return false;" rel="nofollow" share_url="<?php echo get_permalink($post->ID);?>" target="_blank"><img src="<?php bloginfo('template_url');?>/images/facebook-blanco.svg" class="icono-footer"/></a><a href="#" onclick="share_fb('<?php echo get_permalink($post->ID);?>');return false;" rel="nofollow" share_url="<?php echo get_permalink($post->ID);?>" target="_blank"><em>Comparte en Facebook</em></a>
			</div>
			<div class="links-compartir whats">
				<a href="whatsapp://send?text=<?php echo get_permalink($post->ID);?>" data-action="share/whatsapp/share"><img src="<?php bloginfo('template_url');?>/images/whatsapp-blanco.svg" class="icono-footer"/></a><a href="whatsapp://send?text=<?php echo get_permalink($post->ID);?>" data-action="share/whatsapp/share"><em>Comparte en whatsapp</em></a>
			</div>
		</div>
	</div>
	<div class="row obituario-funciones" >
		<div class="columns grande-10 centered ">
			<div class="cuadricula  ">
					<div class="cuadro grande-4 chico-3 desaparece-chico  ">
                    		<div class="contenedor-funcion">
                    			<div class="encender-vela ">
									<img src="<?php bloginfo('template_url');?>/images/memorial/vela.svg" class="icono-footer"/>
								</div>
                      			<div class="funcion-texto">
									ENCENDER<br> VELA <br>
									<span><?php $numvelas = get_post_meta($post->ID, 'num_velas_meta', true); 
									if( !isset($numvelas) || empty($numvelas)  ){
											echo 0;
									}else{echo $numvelas;} ?></span>
								</div>

                     		</div>
                     
                      </div>
                      
                       <div class="cuadro  grande-4 chico-12 ">
                       		<div class="avatar-imagen">
		                    	<?php if (has_post_thumbnail( $post->ID ) ): ?>
		                            <?php $thumb_id = get_post_thumbnail_id($post->ID); ?>
		                            <?php $img_src = wp_get_attachment_image_src($thumb_id, 'thumbnail_perfil'); ?>
		                            <?php $img_src =  $img_src[0]; ?>
		                            <img src="<?php echo $img_src; ?>" >
		                       <?php  else: ?>	
		                          	<img src="<?php bloginfo('template_url');?>/images/avatar.jpg" d/>

		                       	<?php  endif; ?>	
                     		</div>
                      </div>
                       <div class="cuadro grande-4 chico-3 desaparece-chico">
                      		<div class="contenedor-funcion">
                    			<div class="dar-flor ">
									<img src="<?php bloginfo('template_url');?>/images/memorial/memoria.svg" class="icono-footer"/>
								</div>
                      			<div class="funcion-texto">
									CREAR<br>RECUERDO<br>
									<span><?php $numrecuerdos = get_post_meta($post->ID, 'num_recuerdos_meta', true); 
									if( !isset($numrecuerdos) || empty($numrecuerdos)  ){
											echo 0;
									}else{echo $numrecuerdos;} ?></span>
								</div>

                     		</div>
                      </div>
                      
		 	</div>
		</div>
	</div>

	<div class="row obituario-single" >
		<div class="columns grande-10 centered obiturio-color">
			<div class="cuadricula informacion-finado ">
			    <div class="cuadro grande-12  titulos">
		    		<h1><?php  echo $post->post_title; ?> </h1>
					<h4><?php  echo get_post_meta($post->ID, 'valpa_nacimiento_ano_meta', true); ?> - <?php echo get_the_date('Y'); ?></h4> 
					<p><?php echo $post->post_content; ?></p>
					<?php $query = $_GET; 
					    if (isset($query['int'])) {
					        if ($query['int'] == 'on' ) {
					            setPostViews(get_the_ID());
					        } elseif ( $query['int'] == 'off') {
					           
					        }
					    } else {
					      	setPostViews(get_the_ID());
					    }; ?>
							    		<h2><img src="<?php bloginfo('template_url');?>/images/memorial/ojo.svg" class="icono-ver"  /> <strong><?php echo getPostViews(get_the_ID()); ?> </strong> </h2>
			    		
						<?php $servicio = get_post_meta($post->ID, 'servicio_relacionado_meta', true); if (!empty($servicio)):   
														
						if ($servicio[0] == 'Domicilio'):
						?>

			    		<h2><img src="<?php bloginfo('template_url');?>/images/logo-animado/29.svg" class="icono-obituario"  />Velación: <strong>En Domicilio</strong>   </h2>
			    		<?php  elseif ($servicio[0] == 'Sucursal'):
			    			$sucursal_ralacionada = get_post_meta($post->ID, 'sucursal_relacionada_meta', true);
			    				
			    			$sucursal = get_post($sucursal_ralacionada[0]);
			    		
			    		?>
			    		
			    			<a href="<?php  echo  get_post_meta($sucursal->ID, 'valpa_linkgoogle_meta', true);?>" target="_Blank"><h2><img src="<?php bloginfo('template_url');?>/images/logo-animado/29.svg" class="icono-obituario"  />Velación: <strong><?php  echo  $sucursal->post_title;?></strong> <?php  echo  $sucursal->post_content;?> </h2></a>


			    		<?php  endif;endif;?>
					 
			    </div>
			    <div class="cuadro grande-12  velas">
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
						 ?> 
						<div >
			    			<p> <strong><?php echo count($velas_relacionadas); ?></strong>  velas prendidas en las 
			    			útimas 24 horas </p>
			    		</div>
			    	<div class="contenedor-vela">

			    		
						<?php 
						$i = 1;
	                   	foreach ( $velas_relacionadas as $vela_relacionada ):
	                    ?>   
			    		<div class="vela abrir-slider-vela <?php if ($i == 0){ echo 'seleccionado';};?>" diapositiva-vela="<?php echo $i; $i++;  ?>">
			    			<div class="  vela-container ">
								<img src="<?php bloginfo('template_url');?>/images/memorial/vela-miniatura.jpg" class="icono-vela"/>
							</div>
							<div class="  vela-texto ">
									
									<p><?php  echo $vela_relacionada->post_title; ?></p>
							</div>
							
			    		</div>
			    		
			    		<?php endforeach; ?>
			    	</div>
			    </div>
			   
	            <div class="cuadro grande-5 chico-12 medio-6 ">
	              	<div class="row">
	              		<div class="contenido-qr" id="qrcode" link-ofrenda="<?php echo get_permalink($post->ID);?>"></div>
	              		 
	              		<div class="homenaje-interactivo">
	              			<h5><img src="<?php bloginfo('template_url');?>/images/memorial/play.svg" class="icono-interactivo"  />  HOMENAJE INTERACTIVO </h5>
	              		</div>
	              	</div> 
	                	<div class="row">
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
							        if (!empty($attachments)):

							        ?>
				                		<h3> Album memorial</h3>
				                		<div class="cuadricula galeria-miniatura">
				                			<?php 
										 			$i = 1;
										            foreach ( $attachments as $attachment ):
										        	$info_foto = wp_get_attachment_metadata($attachment->ID);
										            $thumbimg = wp_get_attachment_image_src( $attachment->ID , 'thumbnail_perfil' );
										            $thumbimg = $thumbimg[0];
													$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
													$art_year = $attachment->post_excerpt;
										    		$art_desc = $attachment->post_content;
											?>
											 
												<div class="cuadro grande-4 medio-6 chico-4 ">
														<div class="cuadro-galeria abrir-slider <?php if ($i == 0){ echo 'seleccionado';};?>" diapositiva="<?php echo $i; $i++;  ?>" style=" background-image: url('<?php echo $thumbimg; ?>);">

														</div>
												</div>	
										
											<?php endforeach; ?>
										</div>   
									<?php else: ?>	
										<div class="mensajes-usuarios">
											<p>Para activar este album memorial comuníquese al <a href="tel:7224592339" target="_Blank">7224592339 </a> o a nuestro <a href="https://api.whatsapp.com/send?phone=+52 1 7224592339&text=¡Hola%20Valparaíso!, quiero subir fotos al homenaje memorial de mi ser amado" target="_Blank">Whatsapp</a></p>
										</div>
								<?php endif; ?>	
	                	</div>	
	            </div>
	                       
	                       
					
	                      <div class="cuadro grande-7 chico-12 medio-6 ">
	                      		<h3>Recuerdos</h3>
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
										            ),
										            array(
										                'key' => 'valpa_tipoofrenda_meta',
										                'value' => 'recuerdo'
										            ),
										        )
									        ) );

											  if (!empty($ofrendas_relacionadas)):
									        ?>
								
								
								<div class="row informacion-homenaje">
									<div class="cuadricula">
										
											<?php 
						                   	foreach ( $ofrendas_relacionadas as $ofrenda ):
						                    ?>   
						                    	<div class="cuadro grande-12 ofrenda-relacionada">

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
							                           
						                    			
						                    			<div class="texto-ofrenda-relacionada">"<?php echo $ofrenda->post_content; ?>"</div>
						                    				<div class="quien-ofrenda-relacionada"><?php  echo $ofrenda->post_title; ?></div>
						                    			
						                    	</div>	

						                    <?php endforeach?>
										
									
									</div>
								</div>
							<?php else:?>
								<div class=" mensajes-usuarios">
									<p>Todavía no se han subido recuerdos de <?php  echo $post->post_title; ?>, para ser el primero da click aquí:
									<div class="dar-flor ">
										<img src="<?php bloginfo('template_url');?>/images/memorial/memoria.svg" class="icono-footer"/>
									</div></p>
								</div>
							<?php endif;?>
	                      </div>
		 	</div>
		</div>
	</div>

	<div class="row ">
		<div class="columns grande-10 centered contacto-facebook ">
			<div class="links-grandes row ">
				<div class="contenedor-link">
					<div class="link-centrado">
						<a href="https://www.facebook.com/valparaisofunerales" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/facebook.svg" class="icono-footer"/></a><a href="https://www.facebook.com/valparaisofunerales" target="_Blank"><em>Siguenos en Facebook </em><span class="desaparece-chico">para recibir post especializados sobre el duelo.</span></a>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div class="row plan-eliseo promo-eliseo" >
		<div class="columns grande-10 medio-10 chico-10 centered ">
			<div >
				<div class="imagen-promo-eliseo">
					<img class="imagen-eliseo" src="<?php bloginfo('template_url');?>/images/asociada.jpg"/>
				</div>
				<div class="contenedor-promo">
					<div class="centrado-promo">
						<h5>Con Homenaje a futuro de Valparaíso Previenes a tus seres queridos de improvistos</h5>
						<div class="links-grandes ">
							<div class="contenedor-link">
								<div class="link-centrado">
									<a href="https://api.whatsapp.com/send?phone=+52 1 722 784 6600&text=¡Hola%20valparaiso!" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/telefono.svg" class="icono-footer"/></a><a href="https://api.whatsapp.com/send?phone=+52 1 722 784 6600&text=¡Hola%20valparaiso!" target="_Blank">llama a un asesor</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
	   </div>
	</div>
</div>
<?php include_once('inc/formulario-vela.php'); ?>
<?php include_once('inc/formulario-obituario.php'); ?>
<?php include_once('inc/homenaje-interactivo.php'); ?>
<?php include_once('inc/homenaje-interactivo-vela.php'); ?>
<?php include_once('inc/album-memorial.php'); ?>
 
<?php get_footer(); ?>