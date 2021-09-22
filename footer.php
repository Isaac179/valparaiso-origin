	<?php wp_footer(); ?>
	
		<div class="row footer-valparaiso">
			<div class=" mancha-empleo">
				<p>Únete a nuestro equipo. <a href="<?php echo get_post_type_archive_link( 'valpa_trabajos_pt' ); ?>">Consulta nuestra Bolsa de trabajo</a></p>
			</div>
			<div class=" mancha-footer">
				<div class="row ">
					<div class="columns grande-12 logo-valparaiso-footer">	
						<a href="<?php $url = home_url(); echo $url; ?>"  >
							<img src="<?php bloginfo('template_url');?>/images/valparaiso-blanco.svg" />
						</a>
					</div>
					
				</div>
				<div class="row ">
					<div class="cuadricula">
						<div class="cuadro chico-12 grande-8 links-footer">	
							<a href="#">
								Derechos reservados 
							</a><span>|</span>
							<?php 
							$term_page = get_page_by_path( 'empresa' );
							$terms_link = get_permalink($term_page);
							
				    	?>
						

							<a href="<?php echo $terms_link; ?>">
								Términos y condiciones
							</a><span>|</span>
							<a href="#">
								Preguntas frecuentes
							</a><span>|</span>
							<a href="<?php echo get_post_type_archive_link( 'valpa_trabajos_pt' ); ?>">
								Bolsa de trabajo
							</a><span>|</span>
							<a href="<?php echo get_permalink( get_page_by_title( 'recursos' ));?>">
								Recursos
							</a>
						</div>
						<div class="cuadro grande-4 chico-12 logo-periferico-footer">	
							<a href="http://periferico.info/" target="_Blank"  >
								<img src="<?php bloginfo('template_url');?>/images/periferico.svg" />
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>
