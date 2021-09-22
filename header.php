<!DOCTYPE html>
<html lang="<?php echo substr(get_bloginfo ( 'language' ), 0, 2);?>">
<head>
	<meta charset="UTF-8">
	<title><?php
		global $page, $paged;
	
		wp_title( '|', true, 'right' );
		bloginfo( 'name' );
	
		$site_description = get_bloginfo( 'description', 'display' );
		
		if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
	?></title>

	<meta name="description" content="Te ofrecemos un servicio integral con todo lo necesario para ofrecer un Homenaje funerario a tu ser amado." />
	<meta name="keywords" content="Funeral,Funeraria,Homenaje,Cremación,in" />
	<meta name="author" content="<?php bloginfo('template_url'); ?>/humans.txt">

	<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('template_url'); ?>/images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_url'); ?>/images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link rel="icon" type="image/ico" href="<?php bloginfo('template_url'); ?>/images/favicon/favicon.ico">

	<!-- Facebook Metadata /-->
	
	<?php if ( 'valpa_trabajos_pt' == get_post_type() ): $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
		
			<meta property="fb:page_id" content="valparaisofunerales" />
			<meta property="og:image" content="<?php echo esc_url($featured_img_url); ?>" />
			<meta property="og:type" content="article" />
			<meta property="og:description" content="Ideal para personas con experiencia en <?php $experiencia_previa = get_post_meta( $post->ID,'experiencia_previa_meta', TRUE );echo $experiencia_previa;?>"/>
			<meta property="og:title" content="Bolsa de trabajo | <?php  echo $post->post_title; ?>"/>

			
	<?php elseif ( 'valpa_obituario_pt' == get_post_type()  ): ?>
			<meta property="fb:page_id" content="valparaisofunerales" />
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
                <?php $thumb_id = get_post_thumbnail_id($post->ID); ?>
                <?php $img_src = wp_get_attachment_image_src($thumb_id, 'thumbnail'); ?>
                <?php $img_src =  $img_src[0]; ?>
                <meta property="og:image" content="<?php echo $img_src; ?>" />
           <?php  else: ?>	
              	 <meta property="og:image" content="<?php bloginfo('template_url');?>/images/avatar.jpg" />
           	<?php  endif; ?>	
			<meta property="og:type" content="article" />
			<meta property="og:description" content="<?php  echo $post->post_content; ?>  "/>
			<meta property="og:title" content="Homenaje Memorial | <?php  echo $post->post_title; ?>"/>

	<?php else:  ?>
			<meta property="fb:page_id" content="valparaisofunerales" />
			<meta property="og:image" content="" />
			<meta property="og:description" content="Te ofrecemos un servicio integral con todo lo necesario para ofrecer un Homenaje funerario a tu ser amado."/>
			<meta property="og:title" content="Homenajes funerarios"/>
		<?php endif; ?>

	<!-- Google+ Metadata /-->
	<meta itemprop="name" content="">
	<meta itemprop="description" content="Te ofrecemos un servicio integral con todo lo necesario para ofrecer un Homenaje funerario a tu ser amado.">
	<meta itemprop="image" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

	<link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet" type="text/css" />

	<?php wp_head(); ?>
	<?php include_once('inc/analytics.php'); ?>
</head>
<body>
<div class="contacto-header">
	<div class="row contacto-botones desaparece-chico">
		 <?php if ('valpa_trabajos_pt' == get_post_type() || is_page('postulacion')):?>
		 <a href="https://api.whatsapp.com/send?phone=+52 1 7224592339&text=¡Hola%20Valparaíso!" target="_Blank">Whatsapp</a><a href="https://api.whatsapp.com/send?phone=+52 1 7224592339&text=¡Hola%20Valparaíso!" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/whatsapp.svg" class="icono-contacto"/></a>
		 <a href="tel:7224592339" target="_Blank">722 4592339</a><a href="tel:7224592339" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/telefono.svg" class="icono-contacto"/></a>
		<?php else: ?>
		 <a href="https://api.whatsapp.com/send?phone=+52 1 722 784 6600&text=¡Hola%20Valparaíso!" target="_Blank">Whatsapp</a><a href="https://api.whatsapp.com/send?phone=+52 1 722 784 6600&text=¡Hola%20Valparaíso!" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/whatsapp.svg" class="icono-contacto"/></a>
		 <a href="tel:7224378388" target="_Blank">722 4378388</a><a href="tel:7224378388" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/telefono.svg" class="icono-contacto"/></a>
		<?php endif; ?>
	</div>	
</div>
<div class="header">
	<div class=" row contenedor-header">
		
		<div class="contacto-logo">
			
				<a href="<?php $url = home_url(); echo $url; ?>"  >
					<img class="logo-valparaiso" src="<?php bloginfo('template_url');?>/images/valparaiso.svg"/>
				</a>
			
			
		</div>	
		<div class="row ">
			<div class=" menu-header">	
				<?php if( is_home()) :?>
				 	<a href="#" data-scroll-nav="servicios">Funerales</a>
				<?php else:?>
					<a href="<?php $url = home_url(); echo $url; ?>#servicios">Funerales</a>
				<?php endif;?>
				
				<a href="<?php bloginfo('url'); ?>/page-recursos.php">Boletín</a>
				
					<a href="<?php echo get_post_type_archive_link( 'valpa_obituario_pt' ); ?>" class="nosotros-chico">Obiturario</a>
				
				
				 <?php if( is_home()) : ?>
				 	<a href="#" data-scroll-nav="plan-eliseo" class="desaparece-chico"  class="nosotros-chico">Homenaje futuro</a>
				 	<a href="#" data-scroll-nav="nosotros" class="contacto-chico">Nosotros</a>
				<?php else:?>
					<a  href="<?php $url = home_url(); echo $url; ?>#plan-eliseo" class="desaparece-chico"  class="nosotros-chico">Homenaje futuro</a>
				 	<a  href="<?php $url = home_url(); echo $url; ?>#nosotros" class="contacto-chico">Nosotros</a>
				 <?php endif ;?>

				 <?php if( is_home()) : ?>
							 <a class="plan-eliseo desaparece-chico" href="#" target="_Blank">Consulta tu plan</a><a href="#" data-scroll-nav="plan-eliseo" ><img src="<?php bloginfo('template_url');?>/images/resultados.svg" class="icono-contacto desaparece-chico"/></a>
				 <?php endif ;?>
				
				 
			</div>	
		</div>	
	</div>	
</div>



<div class="contenedor-submenu ">
	<div class="row row-submenu">
		<?php if (is_singular('valpa_obituario_pt')):?>
		<div class="submenu-obituario">
			<div class="row levanta-row">
				<div class="divisiones-submenu">
					<div class="encender-vela ">
						<img src="<?php bloginfo('template_url');?>/images/memorial/vela.svg" class="icono-footer"/>
					</div>
	      			<div class="funcion-texto">
						ENCENDER VELA 
					</div>
				</div>
				<div class="divisiones-submenu">
					<div class="dar-flor ">
						<img src="<?php bloginfo('template_url');?>/images/memorial/memoria.svg" class="icono-footer"/>
					</div>
          			<div class="funcion-texto">
						CREAR RECUERDO<br>
						
					</div> 

				</div>
			</div>
			<div class="row redes-submenu">
										
					
						<a href="#" onclick="share_fb('<?php echo get_permalink($post->ID);?>');return false;" rel="nofollow" share_url="<?php echo get_permalink($post->ID);?>" target="_blank" class="obituario-facebook"><img src="<?php bloginfo('template_url');?>/images/facebook-blanco.svg" />Facebook</a>
					
						<a href="whatsapp://send?text=<?php echo get_permalink($post->ID);?>" data-action="share/whatsapp/share" class="obituario-whatsapp" target="_blank"><img src="<?php bloginfo('template_url');?>/images/whatsapp-blanco.svg" class="icono-footer"/>Whatsapp</a>
				
			</div>
		</div>
		<?php else: ?>
		<div class="menu-submenu">	
			<div class="row">
				<?php if ('valpa_trabajos_pt' == get_post_type() || is_page('postulacion')):?>		
					
					<div class="columns grande-4 submenu-telefono">
						<a href="tel:7224592339" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/telefono-blanco.svg" class="iconos-generales"/><br>LLÁMANOS </a> 

					</div>
					<div class="columns grande-4 submenu-resultados">
						<a href="#" data-scroll-nav="plan-eliseo"><img src="<?php bloginfo('template_url');?>/images/resultados-blanco.svg" class="iconos-generales"/><br>HOMENAJE A FUTURO </a> 
					</div>
					<div class="columns grande-4 submenu-whatsapp">
						<a href="https://api.whatsapp.com/send?phone=+52 1 7224592339&text=¡Hola%20Valparaíso!" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/whatsapp-blanco.svg"class="iconos-generales"/><br>WHATSAPP</a>

					</div>
				<?php else: ?>
					<div class="columns grande-4 submenu-telefono">
						<a href="tel:7224378388" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/telefono-blanco.svg" class="iconos-generales"/><br>LLÁMANOS </a> 

					</div>
					<div class="columns grande-4 submenu-resultados">
						<a href="#" data-scroll-nav="plan-eliseo"><img src="<?php bloginfo('template_url');?>/images/resultados-blanco.svg" class="iconos-generales"/><br>HOMENAJE A FUTURO </a> 

					</div>
					<div class="columns grande-4 submenu-whatsapp">
						<a href="https://api.whatsapp.com/send?phone=+52 1 722 784 6600&text=¡Hola%20Valparaíso!" target="_Blank"><img src="<?php bloginfo('template_url');?>/images/whatsapp-blanco.svg"class="iconos-generales"/><br>WHATSAPP</a>

					</div>
				<?php endif; ?>
			</div>	
		</div>
		<?php endif; ?>
	</div>
</div>	
<div class=" contenedor-logo-movimiento">
	<div class="row">
		<div class=" contenedor-logo ">
			<?php if(is_home()):?>
			<a href="#" class="periferico-logo" data-scroll-nav="inicio">
			<?php else:?>
			<a href="<?php $url = home_url(); echo $url;?>" >
			<?php endif;?>
				<div class="animacionportada" >
				    <div class="animacionportada_img logo-ini ">
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/02.svg" class="valpa-1"/>
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/03.svg" class="valpa-2" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/04.svg" class="valpa-3" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/05.svg" class="valpa-4" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/06.svg" class="valpa-5" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/07.svg" class="valpa-6" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/08.svg" class="valpa-7" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/09.svg" class="valpa-8" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/10.svg" class="valpa-9" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/11.svg" class="valpa-10" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/12.svg" class="valpa-11"  />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/13.svg" class="valpa-12" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/14.svg" class="valpa-13" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/15.svg" class="valpa-14" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/16.svg" class="valpa-15" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/17.svg" class="valpa-16" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/18.svg" class="valpa-17" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/19.svg" class="valpa-18" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/20.svg" class="valpa-19" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/21.svg" class="valpa-20" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/22.svg" class="valpa-21" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/23.svg" class="valpa-22" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/24.svg" class="valpa-23" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/25.svg" class="valpa-24" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/26.svg" class="valpa-25" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/27.svg" class="valpa-26" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/28.svg" class="valpa-27" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/29.svg"class="valpa-28"  />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/30.svg"class="valpa-29"  />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/31.svg"class="valpa-30"  />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/32.svg" class="valpa-31" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/33.svg"class="valpa-32"  />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/34.svg"class="valpa-33"  />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/35.svg" class="valpa-34" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/36.svg" class="valpa-35" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/37.svg" class="valpa-36" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/38.svg" class="valpa-37" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/39.svg" class="valpa-38" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/40.svg" class="valpa-39" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/41.svg" class="valpa-40" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/42.svg" class="valpa-41" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/43.svg" class="valpa-42" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/44.svg" class="valpa-43" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/45.svg" class="valpa-44" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/46.svg" class="valpa-45" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/47.svg"class="valpa-46"  />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/48.svg"class="valpa-47"  />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/49.svg"class="valpa-48"  />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/50.svg" class="valpa-49" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/51.svg"class="valpa-50"  />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/52.svg"class="valpa-51"  />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/53.svg" class="valpa-52" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/54.svg" class="valpa-53" />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/55.svg"class="valpa-54"  />
				          <img src="<?php bloginfo('template_url');?>/images/logo-animado/56.svg"class="valpa-55"  />

				           <img src="<?php bloginfo('template_url');?>/images/logo-animado/blanco.svg"class="valpa-blanco"  />
				    </div>
				     
				</div>
				
			</a> 
			
		</div>
	</div>



</div>
