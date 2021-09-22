<div class="registro-accion formulario-obituario" id="formulario-obituario" >
	<div class="titulo-formulario">	
		<div class="row  ">
			<div class="columns grande-3 chico-2 cerrar-formulario">
				Cancelar
			</div>
			<div class="columns grande-6 chico-8 encabezado">
				NUEVO RECUERDO
			</div>
		</div>
		
	</div>
	<div class="centrar-formulario">
		

		<form method="POST" id="ofrenda-form_JS">
			<div class="row  ">
				<h4>Selecciona una imagen</h4>
				<div class="cuadricula ">
						<div class="cuadro grande-3 medio-6">
						<input type="file" name="file" id="file-1" class="inputfile inputfile-1 file-input"  />
						<label for="file-1" id="file-label"> <span>Sube una foto</span></label>	
					
					</div>
			  

					<div class="cuadro grande-3 medio-6">
						<input type="radio"  id="imagen-predefinida-1" name="imagen-predefinida" form="ofrenda-form_JS"   value="1" class="desaparece-linea" >
		                 <label for="imagen-predefinida-1" identificador="" style="background-image:url(<?php bloginfo('template_url');?>/images/memorial/1-valparaiso-funerales.jpg)" class="desaparece-linea"></label>
		                         
						
					</div>
					<div class="cuadro grande-3 medio-6">
						<input type="radio"  id="imagen-predefinida-2" name="imagen-predefinida" form="ofrenda-form_JS"   value="2" class="desaparece-linea"  >
		                 <label for="imagen-predefinida-2" identificador="" style="background-image:url(<?php bloginfo('template_url');?>/images/memorial/2-valparaiso-funerales.jpg)" class="desaparece-linea"></label>
		                   
						
					</div>
					<div class="cuadro grande-3 medio-6">
						<input type="radio"  id="imagen-predefinida-3" name="imagen-predefinida" form="ofrenda-form_JS"   value="3" class="desaparece-linea" >
		                 <label for="imagen-predefinida-3" identificador="" style="background-image:url(<?php bloginfo('template_url');?>/images/memorial/3-valparaiso-funerales.jpg)" class="desaparece-linea"></label>
					</div>
				</div>
		    </div> 
		    <div class="row  ">
		    	<textarea placeholder="Honra con un pensamiento positivo la memoria de <?php  echo $post->post_title; ?>" name="texto" id="ofrenda_texto_JS"   style="width:100%"  rows="3" maxlength="200"></textarea>   
			    <input type="text"  id="ofrenda_nombre_JS" value=""  name="nombre" form="ofrenda-form_JS" required="" placeholder="Nombre">
			    <input type="text" id="ofrenda_telefono_JS" value=""  name="telefono" form="ofrenda-form_JS" required="" placeholder="Teléfono">
			    <input type="text" id="ofrenda_mail_JS" value=""  name="E-mail" form="ofrenda-form_JS" required="" placeholder="E-mail">
			    <input type="text"  id="ofrenda_obituariorelacionado_JS" value="<?php  echo $post->ID; ?>"  name="obiturariorelacionado" form="ofrenda-form_JS" required="" placeholder="<?php  echo $post->ID; ?>" style="visibility:hidden" >
			    <input type="hidden" name="file2" id="file-2"  />
			</div>

			<div class="row  ">
				<?php 
							$term_page = get_page_by_path( 'politica-privacidad' );
							$terms_link = get_permalink($term_page);
							
				    	?>
				<p class="terminos_condiciones">al crear un recuerdo aceptas nuestros <a href="<?php echo $terms_link; ?>">Términos y condiciones</a></p>
				<?php wp_nonce_field( 'wps_mandar_ofrenda' ); ?>
		        <input type="submit" value="Crear recuerdo" class="finaliza-solicitud" id="contact_ofrenda_JS" name="submit"/>
			</div>

		</form>    
		<div class="respuesta-ofrenda"></div>
	</div>
	        	
</div>