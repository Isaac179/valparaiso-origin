<div class="registro-accion-vela formulario-obituario" id="formulario-obituario" >
	<div class="titulo-formulario">	
		<div class="row  ">
			<div class="columns grande-3 chico-2 cerrar-formulario">
				Cancelar
			</div>
			<div class="columns grande-6 chico-8 encabezado">
				NUEVA VELA
			</div>
		</div>
		
	</div>
	<div class="centrar-formulario">
		<form method="POST" id="vela-form_JS">
			<h4>Añade un agradecimiento que honre a  <?php  echo $post->post_title; ?> </h4>
		    <div class="row  ">
		    	<textarea placeholder="" name="texto" id="vela_texto_JS"   style="width:100%"  rows="3" maxlength="60"></textarea>   
			    <input type="text"  id="vela_nombre_JS" value=""  name="nombre" form="vela-form_JS" required="" placeholder="Nombre">
			    <input type="text" id="vela_telefono_JS" value=""  name="telefono" form="vela-form_JS" required="" placeholder="Teléfono">
			    <input type="text" id="vela_mail_JS" value=""  name="E-mail" form="vela-form_JS" required="" placeholder="E-mail">
			    <input type="text"  id="vela_obituariorelacionado_JS" value="<?php  echo $post->ID; ?>"  name="obiturariorelacionado" form="vela-form_JS" required="" placeholder="<?php  echo $post->ID; ?>" style="visibility:hidden" >

			</div>

			<div class="row  ">
				<?php 
							$term_page = get_page_by_path( 'politica-privacidad' );
							$terms_link = get_permalink($term_page);
							
				    	?>
				<p class="terminos_condiciones">Al crear un recuerdo aceptas nuestros <a href="<?php echo $terms_link; ?>">Términos y condiciones</a></p>

				<?php wp_nonce_field( 'wps_mandar_vela' ); ?>
		        <input type="submit" value="encender" class="finaliza-solicitud-vela" id="contact_vela_JS" name="submit"/>
			</div>

		</form>    
		<div class="respuesta-vela"></div>
	</div>
	        	
</div>