<?php get_header(); ?>
<div class="row cuerpo" id="inicio" >
	
	<div class="row portada" data-scroll-index="inicio">    
	   		<div class="blanco-slide"></div>
		 	 <img class="desaparece-chico"src="<?php bloginfo('template_url');?>/images/portada.jpg" >
		     <img class="desaparece-grande"src="<?php bloginfo('template_url');?>/images/portada-2.jpg" >

	</div>  
	<div class="row frase-portada">
		<div class="columns grande-5 empuja-grande-1 medio-7 chico-8 centered">
			
			<h1>Somos los <em>Servicios Funerales</em> que Honran a quien amas en nuestras sucursales o en tu domicilio. </h1>
			<hr> 
		</div>	
	</div>  
	<div class="row" id="obituario" >
			<div class="columns grande-10 centered">
			
				<h2>
					Obituario
				</h2>
				
			</div>

	    </div>
	<div class="row obituario" >
		<div class="columns grande-10 centered obiturio-color">
			<div class=" slider-obituarios desaparece-grande">

				<div class="swiper-container s3">
			    	<div class="swiper-wrapper">
						<?php 
						
				        $obituario = get_posts( array(
				            'post_type' => 'valpa_obituario_pt',
				            'posts_per_page' => 4,
				            'orderby' => 'post_date', 
				            'order' => 'DESC',
				        ) );
				 			
				            foreach ( $obituario as $homenaje ):
								
						?>
			  			<div class="swiper-slide avatar-obituario">
							<a href="<?php echo get_permalink($homenaje->ID);?>" >
                                
                                    <?php if (has_post_thumbnail( $homenaje->ID ) ): ?>
                                        <?php $thumb_id = get_post_thumbnail_id($homenaje->ID); ?>
                                        <?php $img_src = wp_get_attachment_image_src($thumb_id, 'thumbnail'); ?>
                                        <?php $img_src =  $img_src[0]; ?>
                                            <div class="cuadro-avatar "  style=" background-image: url('<?php echo $img_src; ?>');">
                                            </div>
                                        
                                   <?php  else: ?>  
                                            <div class="cuadro-avatar abrir-slider "  style=" background-image: url('<?php bloginfo('template_url');?>/images/avatar.jpg');">
                                            </div>

                                    <?php  endif; ?>    
                                
                                <h3><?php  echo $homenaje->post_title; ?> </h3>
                             </a>
			            </div>  
			           	<?php endforeach; ?> 
			        </div>
			       
			    </div>
			    <div class="swiper-pagination"></div>
			</div>
			<div class="cuadricula desaparece-chico ">
						<?php 
						
						 			
						            foreach ( $obituario as $homenaje ):
										
								?>
										
								<div class="cuadro grande-3 chico-12 medio-6 avatar-obituario">
				                      <a href="<?php echo get_permalink($homenaje->ID);?>" >
	                                
		                                    <?php if (has_post_thumbnail( $homenaje->ID ) ): ?>
		                                        <?php $thumb_id = get_post_thumbnail_id($homenaje->ID); ?>
		                                        <?php $img_src = wp_get_attachment_image_src($thumb_id, 'thumbnail'); ?>
		                                        <?php $img_src =  $img_src[0]; ?>
		                                            <div class="cuadro-avatar "  style=" background-image: url('<?php echo $img_src; ?>');">
		                                            </div>
		                                        
		                                   <?php  else: ?>  
		                                            <div class="cuadro-avatar abrir-slider "  style=" background-image: url('<?php bloginfo('template_url');?>/images/avatar.jpg');">
		                                            </div>

		                                    <?php  endif; ?>    
		                                
		                                <h3><?php  echo $homenaje->post_title; ?> </h3>
		                             </a>
			                      </div>


								<?php endforeach; ?> 
                     
               		

		    	
				
		    </div>
		    <div class="row2 obituario-busqueda">
                       	<div class="links-grandes row">
                       		
							<div class="contenedor-link ">
								<form  action="<?php echo home_url( '/' ); ?>" class="aparece-formulario">
									<input type="text" name="s" id="input-js" placeholder="Búsqueda"  value="<?php echo get_search_query() ?>"> 
								</form>
								<div class="link-centrado desaparece-link">

									<a href="#" target="_Blank" class="busqueda-js"><img src="<?php bloginfo('template_url');?>/images/busqueda.svg" class="icono-footer "/></a><a href="#" target="_Blank" class="busqueda-js"><em>Busca en Homenaje memorial</a>
								</div>
							</div>
						</div>
                       	
                    </div>
	    </div>
	</div>
	
	<div class="row ">
		<div class="columns grande-10 centered contacto-facebook">
			<div class="links-grandes row">
				<div class="contenedor-link">
					<div class="link-centrado">
						<a href="https://www.facebook.com/valparaisofunerales" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/facebook.svg" class="icono-footer"/></a><a href="https://www.facebook.com/valparaisofunerales" target="_Blank"><em>Siguenos en Facebook </em>para recibir post especializados sobre el duelo.</a>
					</div>
				</div>
			</div>
			
		</div>
    </div>

	<div id="servicios" class="row servicios-funerales" data-scroll-index="servicios">
		<div class="row">
			<div class="columns grande-10 centered">
			
				<h2>
					Servicios Funerales
				</h2>
				
			</div>

	    </div>
	    <div class="row ">
	    	<div class="columns grande-10 medio-10 chico-10 centered funerales-overflow ">
	    		<div class=" servicios-funerales-info ">
	    			
	    				<div class="funerales-texto">
	    					<p>
	    						Traslados nacionales e internacionales 
	    					</p>
	    					-
	    					<p>
	    						Homenajes funerarios de Necesidad inmediata
	    					</p>
							-
							<p>
	    						Homenajes a domicilio
	    					</p>
							-
							<p>
	    						Asesoría en trámites legales
	    					</p>
							-
							<p>
								Servicio funeral integral (incluye cafetería, carpa y sillas)
	    					</p>
							-
							<p>
								Convenios con instituciones y empresas
	    					</p>
							-
							<p>
								Cafetería
	    					</p>
							
	    				</div>

						
					<div class="funerales-imagen">
						<img src="<?php bloginfo('template_url');?>/images/flor.png"/>
					</div>
					
				</div>
		   </div>
		</div>

	</div>


	<div id="plan-eliseo" class="row plan-eliseo" >
		<div class="row">
			<div class="columns grande-10 centered">
			
				<h2 data-scroll-index="plan-eliseo">
					Homenaje a futuro de Valparaíso
				</h2>
				
			</div>

	    </div>
	    <div class="row ">
	    	<div class="columns grande-10 medio-10 chico-10 centered ">
	    		<div class=" row ">
	    				<div class="columns grande-5 desaparece-chico">
							<img src="<?php bloginfo('template_url');?>/images/asociada.jpg"/>
	    				</div>

						
					<div class="columns grande-7 chico-12 ">
						<p>Honramos a quien amas protegiendolo de eventualidades con nuestro Homenaje a futuro </p>
						
						<div class="row plan-resumen">
							<div class="columns grande-6 chico-12 ">
								<div class=" row descripcion-icono">
									<div class= "columns grande-2 "><img src="<?php bloginfo('template_url');?>/images/iconos-eliseo/6.svg"/></div><div class= "columns grande-10"><h4>100% transferible</h4></div>
								</div>
								<div class=" row descripcion-icono">
									<div class= "columns grande-2"><img src="<?php bloginfo('template_url');?>/images/iconos-eliseo/5.svg"/></div><div class= "columns grande-10"><h4>0% intereses</h4></div>
								</div>
								<div class=" row descripcion-icono">
									<div class= "columns grande-2"><img src="<?php bloginfo('template_url');?>/images/iconos-eliseo/3.svg"/></div><div class= "columns grande-10"><h4>Pagos accesibles</h4></div>
								</div>
			                </div>
			                <div class="columns grande-6  chico-12">
			                	<div class=" row descripcion-icono">
									<div class= "columns grande-2"><img src="<?php bloginfo('template_url');?>/images/iconos-eliseo/2.svg"/></div><div class= "columns grande-10"><h4>99 años de vigencia</h4></div>
								</div>
								<div class=" row descripcion-icono">
									<div class= "columns grande-2"><img src="<?php bloginfo('template_url');?>/images/iconos-eliseo/3.svg"/></div><div class= "columns grande-10"><h4>Flexibilidad </h4></div>
								</div>
								<div class=" row descripcion-icono">
									<div class= "columns grande-2"><img src="<?php bloginfo('template_url');?>/images/iconos-eliseo/4.svg"/></div><div class= "columns grande-10"><h4>Mas económico </h4></div>
								</div>
			                </div>   
						</div>
						<div class="row">
							<img class="desaparece-grande" src="<?php bloginfo('template_url');?>/images/asociada.jpg"/>
	    				</div>
						<div class="row consulta-estado">
							
		                    <form id="futuro-form_JS">
		                        <div>
		                            <input id="cont_nombre_JS" value="" placeholder="Nombre" name="contact-form_JS[Nombre]" form="contact-form_JS" required="" type="text">

		                        </div>
		                        <div>
		                            <input type="text" id="cont_mail_JS" value=""  placeholder="Contraseña" name = "contact-form_JS[E-mail]" form = "contact-form_JS" required >
		                        </div>
		                        <div class="g-recaptcha" data-sitekey="6Lf8zQQTAAAAAHEuAajIZuEUIvUnZBH2FNizpMxM"></div> 
		                        
		                        <input type="submit" value="ENTRAR" id="contact_sub_JS" form = "contact-form_JS" >
		                    </form>
						</div>
						 
					</div>
					
				</div>
		   </div>
		</div>

	</div>
	<div class="row servicios-funerales" id="nosotros" data-scroll-index="nosotros">
		<div class="row">
			<div class="columns grande-10 centered">
			
				<h2>
					Nosotros 
				</h2>
				
			</div>

	    </div>
	    <div class="row ">
	    	<div class="columns grande-10 medio-10 chico-10 centered funerales-overflow ">
	    		<div class=" servicios-funerales-info ">
	    			
	    				<div class="nosotros-texto ">
	    					<p>
	    						 <em>Somos</em> una empresa dedicada a los servicios funerales a través de homenajes a futuros y homenajes inmediatos.
	    					</p>
	    					-
	    					<p>
	    						Nuestra <em>Misión</em> es gestionar servicios funerales con respeto, inspirando tranquilidad y bienestar siendo solidarios con los seres queridos.
	    					</p>
	    					-
	    					<p>
	    						Nuestra <em>Visión</em> es ser la empresa lider en innovación funeraria para realizar  un homenaje de vida al ser querido
	    					</p>
							
	    				</div>

						
					<div class="nosotros-imagen">
						<div class=" slider-home">
		
							<div class="swiper-container s1">
						    	<div class="swiper-wrapper">
									<div class="swiper-slide">    
						            	<img src="<?php bloginfo('template_url');?>/images/1.jpg"/>
						           	</div> 
						           	<div class="swiper-slide">    
						            	<img src="<?php bloginfo('template_url');?>/images/2.jpg"/>
						           	</div> 
						           	<div class="swiper-slide">    
						            	<img src="<?php bloginfo('template_url');?>/images/3.jpg"/>
						           	</div> 
						           	<div class="swiper-slide">    
						            	<img src="<?php bloginfo('template_url');?>/images/4.jpg"/>
						           	</div> 
						           	<div class="swiper-slide">    
						            	<img src="<?php bloginfo('template_url');?>/images/lincoln-mkz-carroza.jpg"/>
						           	</div> 
						           	<div class="swiper-slide">    
						            	<img src="<?php bloginfo('template_url');?>/images/mercedes-CLA-carroza.jpg"/>
						           	</div> 
						  			<div class="swiper-slide">
						  				<img src="<?php bloginfo('template_url');?>/images/fachada.jpg"/>

						            </div>  
						            
						        </div>
						        <div class="swiper-pagination"></div>
						    </div>
						   
						</div>


					</div>
					
				</div>
		   </div>
		</div>

	</div>
	<div class="row ">
   		<div class="columns grande-10 medio-10 chico-10 centered ubicacion ">
    		
    		<div class=" row ">
    			<div class="columns grande-6 chico-12">
					<img src="<?php bloginfo('template_url');?>/images/mapa.svg"/>
				</div>
				<div class="columns grande-6 chico-12">
					<div class="row informacion-ubicacion">

						<p>
		    				<em>Casa Homenaje</em><br>
		    				Netzahualcóyotl 503
							Col. San Sebastián, Toluca.
		    			</p>
		    			<div class="links-grandes ">
							<div class="contenedor-link">
								<div class="link-centrado">
									<a href="https://goo.gl/maps/tAaeUhJoFWCKSfnHA" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/direcciones.svg" class="icono-footer"/></a><a href="https://goo.gl/maps/tAaeUhJoFWCKSfnHA" target="_Blank">Como llegar</a>
								</div>
							</div>
						</div>
		    				
				
						<p class="cobertura">
		    				<em>Cobertura</em><br>
							Toluca, Metepec, Mexicaltzingo, Zinacantepec, San Mateo Atenco, Lerma , Almoloya de Juarez, Calimaya, Ocoyoacac, San Antonio la isla, Tenango del Valle, Chapultepec.
		    			</p> 
						<div class="links-grandes ">
							<div class="contenedor-link">
								<div class="link-centrado">
									<a href="tel:7224378388" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/telefono.svg" class="icono-footer"/></a><a href="tel:7224378388" target="_Blank">Asesoria 24/7</a>
								</div>
							</div>
						</div>		    				    			
					</div>
					
				</div>
			</div>
	   </div>
	</div>

						
</div>

<?php get_footer(); ?>