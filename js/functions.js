(function($) {
	function obtener_get(){ 
              var $_GET = {}; // Creamos un arreglo del get de nuestra url
              document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
                    function decode(s) {
                        return decodeURIComponent(s.split("+").join(" "));
                    }
                    $_GET[decode(arguments[1])] = decode(arguments[2]);
              }); //
              return $_GET;
            }
	
	function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();
           
            reader.onload = function (readerEvent) {
            	var image = new Image();
	            image.onload = function (imageEvent) {

	                // Resize the image
	                var canvas = document.createElement('canvas'),
	                    max_size = 544,// TODO : pull max size from a site config
	                    width = image.width,
	                    height = image.height;
	                if (width > height) {
	                    if (width > max_size) {
	                        height *= max_size / width;
	                        width = max_size;
	                    }
	                } else {
	                    if (height > max_size) {
	                        width *= max_size / height;
	                        height = max_size;
	                    }
	                }
	                canvas.width = width;
	                canvas.height = height;
	                canvas.getContext('2d').drawImage(image, 0, 0, width, height);
	                var dataUrl = canvas.toDataURL('image/jpeg');
	                
	                $("#file-2").val(dataUrl);
	                $("#file-label").css("background-image", "url("+dataUrl+")");
	                $('.desaparece-linea').prop('checked', false);
	                $('.desaparece-linea').addClass('unselected-form');
	                $("#file-label").addClass('selected-form');
	            }
	            image.src = readerEvent.target.result;
            	
               

            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    var dataURLToBlob = function(dataURL) {
	    var BASE64_MARKER = ';base64,';
	    if (dataURL.indexOf(BASE64_MARKER) == -1) {
	        var parts = dataURL.split(',');
	        var contentType = parts[0].split(':')[1];
	        var raw = parts[1];

	        return new Blob([raw], {type: contentType});
	    }

	    var parts = dataURL.split(BASE64_MARKER);
	    var contentType = parts[0].split(':')[1];
	    var raw = window.atob(parts[1]);
	    var rawLength = raw.length;

	    var uInt8Array = new Uint8Array(rawLength);

	    for (var i = 0; i < rawLength; ++i) {
	        uInt8Array[i] = raw.charCodeAt(i);
	    }

	    return new Blob([uInt8Array], {type: contentType});
	}
	function b64toBlob(b64Data, contentType, sliceSize) {
        contentType = contentType || '';
        sliceSize = sliceSize || 512;

        var byteCharacters = atob(b64Data);
        var byteArrays = [];

        for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
            var slice = byteCharacters.slice(offset, offset + sliceSize);

            var byteNumbers = new Array(slice.length);
            for (var i = 0; i < slice.length; i++) {
                byteNumbers[i] = slice.charCodeAt(i);
            }

            var byteArray = new Uint8Array(byteNumbers);

            byteArrays.push(byteArray);
        }

      var blob = new Blob(byteArrays, {type: contentType});
      return blob;
}



	$(window).scroll(function(){
		if ($(window).width() <= 568) {
			var fixmeTop = $(document).height()- $(window).height() - $('.footer-valparaiso').height() + 70 ;
	           	var diferencia = ($('.footer-valparaiso').height()- 70) -(($(document).height() - $(window).height()) - $(window).scrollTop())
		}else{
			var fixmeTop = $(document).height()- $(window).height() - $('.footer-valparaiso').height() ;
	           	var diferencia = $('.footer-valparaiso').height() -(($(document).height() - $(window).height()) - $(window).scrollTop())
		}
	           

	        if($(window).scrollTop() > 10){
	        	  $( ".header" ).addClass('mover-header');
	        	  $( ".logo-valparaiso" ).addClass('shrink');
	        	  $( ".texto-valparaiso" ).addClass('desaparece');
	        	  $( ".contacto-logo" ).addClass('contacto-logo-animacion');
	        } 
	        else {
	            $( ".header" ).removeClass('mover-header');
	            $( ".texto-valparaiso" ).removeClass('desaparece');
	            $( ".logo-valparaiso" ).removeClass('shrink');
	             $( ".contacto-logo" ).removeClass('contacto-logo-animacion');
	        }   

	        if( $(window).scrollTop()  < fixmeTop ){
	        	 
	        	  $( ".contenedor-logo-movimiento" ).addClass('contenedor-logo-fixed');
	        	  $( ".contenedor-logo-movimiento" ).removeClass('contenedor-logo-static');
	      			$( ".contenedor-logo-movimiento" ).css({'bottom' : 0});
	        } 
	        else {
	        	$( ".contenedor-logo-movimiento" ).removeClass('contenedor-logo-fixed');
	        	$( ".contenedor-logo-movimiento" ).addClass('contenedor-logo-static');
	        	$( ".contenedor-logo-movimiento" ).css({'bottom' : diferencia});
	        }  



	});	

	$(document).ready(function(){


		$("[href='#']").click(function(e){
	      e.preventDefault();
	    });

	    $( '.inputfile' ).each( function()
			{
			var $input	 = $( this ),
				$label	 = $input.next( 'label' ),
				labelVal = $label.html();

			$input.on( 'change', function( e )
			{
				var fileName = '';

				if( this.files && this.files.length > 1 )
					fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
				else if( e.target.value )
					fileName = e.target.value.split( '\\' ).pop();

				if( fileName )
					$label.find( 'span' ).html( fileName );
					
				else
					$label.html( labelVal );
			});

			// Firefox bug fix
			$input
			.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
			.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
		});

	        $("#file-1").change(function(){
	        	
		        readURL(this);
		        
		    });		
		$(".cerrar-formulario").click(function() {
			$('.registro-accion').css('visibility','hidden'); 
			$('.registro-accion-vela').css('visibility','hidden');     
		});
		$(".desaparece-linea").click(function() {
			$('#file-label').removeClass('selected-form');   
			$('.desaparece-linea').removeClass('unselected-form');   
		});
		$(".dar-flor").click(function() {
			$('.registro-accion').css('visibility','visible');   
		});
		$(".encender-vela").click(function() {
			$('.registro-accion-vela').css('visibility','visible');   
		});


		 if ( $( "[data-scroll-index]" ).length ) {
				$(function(){
				  $.scrollIt();
				});
			};

		

	    if ( $('.s1').length ) {
 	  		
				var mySwiper = new Swiper('.s1', {
				  loop:true,
				  speed: 6000,
				  
				 
				});
				var $_GET =  obtener_get();// obtenemos el get de la URL
		        var get_sucursal = $_GET['int']; 
		        if (get_sucursal == 'on') {
		        	mySwiper.autoplay.start();
	          	} else if (get_sucursal == 'off'){
	          		mySwiper.autoplay.stop();
	          	};

			$('.homenaje-interactivo').click(mySwiper,function(){
				$('.slider-interactivo').css('visibility','visible');
			    mySwiper.slideTo(1);
    			mySwiper.autoplay.start();
    			var status = 'on' ;
	            var $_GET =  obtener_get();// obtenemos el get de la URL
	          	var get_sucursal = $_GET['int']; 
	              	
	              	var link = window.location.href;
	              	if (get_sucursal == 'off') {
	              		link = link.replace('int='+get_sucursal, 'int='+status); // obtenemos el contenido del atributo href del boton next post 

	              	}
	              	else if (isNaN(get_sucursal) || get_sucursal == null) {
	              		link = link+'?int=on'; // obtenemos el contenido del atributo href del boton next post 

	              	}else{
	              		link = link.replace('int='+get_sucursal, 'int='+status); // obtenemos el contenido del atributo href del boton next post 

	              	}
	             
					window.history.replaceState( {} , '', link); //cambia la direccion del post a travez del historial 
	        	

			});
			
			$(".cerrar-slider-interactivo").click(function() {
				mySwiper.autoplay.stop();
				$('.slider-interactivo').css('visibility','hidden');
				var status = 'off' ;
	            var $_GET =  obtener_get();// obtenemos el get de la URL
	          	var get_sucursal = $_GET['int'];
	              	console.log(get_sucursal);
	              	var link = window.location.href;
	              	
	              		link = link.replace('int='+get_sucursal, 'int='+status); // obtenemos el contenido del atributo href del boton next post 

	              	
	             
					window.history.replaceState( {} , '', link); //cambia la direccion del post a travez del historial 
	        	
	           
			});
			mySwiper.on('toEdge', function () {
			  location.reload();
			});

		};

		
		if ( $('.s4').length ) {
 	  		$(".cerrar-slider-vela").click(function() {
			
				$('.slider-interactivo-vela').css('visibility','hidden');
	           
			});
				var mySwiper4 = new Swiper('.s4', {
				  loop:true,
				  speed: 700,
				  autoplay: {
				    delay: 6000,
				  },
				   pagination: {
			        el: '.swiper-pagination',
			        clickable: false,
			        
			    },
				});
		};

		

		
		if ( $('.s2').length ) {
 	  		$(".cerrar-slider-memorial").click(function() {
			
				$('.slider-memorial').css('visibility','hidden');
	           
			});
				var mySwiper2 = new Swiper('.s2', {
				  loop:true,
				  speed: 700,
				  autoplay: {
				    delay: 3000,
				  },
				   pagination: {
			        el: '.swiper-pagination',
			        clickable: false,
			        
			    },
				});
		};

		if ( $('.s3').length ) {
 	  		
			var swiper = new Swiper('.s3', {
		      pagination: {
		        el: '.swiper-pagination',
		      },
		  });

		};

		$('[diapositiva]').click(mySwiper2,function(){
			$('[diapositiva]').removeClass('seleccionado');
			var numero = $(this).attr("diapositiva");
			$('.slider-memorial').css('visibility','visible');
		    mySwiper2.slideTo(numero);
		    mySwiper2.autoplay.start();
		});
		$('[diapositiva-vela]').click(mySwiper2,function(){
			$('[diapositiva-vela]').removeClass('seleccionado');
			var numero = $(this).attr("diapositiva-vela");
			$('.slider-interactivo-vela').css('visibility','visible');
		    mySwiper4.slideTo(numero);
		    mySwiper4.autoplay.start();
		});
	    //.........................validacion y envio ...................................

		
		if( $('#contact-form_JS').length > 0) {
			var ajax_mail_url = cltvo_js_vars.template_url + '/ajax/ajax-mail.php'; //aca_js_vars is never defined
			var ajax_resultado_url = cltvo_js_vars.template_url + '/ajax/resultado.php'; 
			$("#contact-form_JS").validate({

				submitHandler:function(form){ // envia via post

					$('#contact_sub_JS').val('...enviando');
					$('#contact_sub_JS').attr('disabled', 'disabled');

					var datos = $(form).serialize();
					$.post(ajax_mail_url,
						datos,
						function(data) {
							$('#formulario-solicitud').empty();
							$('.recibibo-solicitud').show();
							$('.mensaje-recibido').append(data);
							// $("#contact-form_JS")[0].reset();
							
						}
					);
				},
				errorPlacement: function(error, element) {
				    error.insertBefore(element);
				}
			});

			
			// .......................relgas de validacion....................
			$("#cont_mail_JS").rules( "add", {
				email: true
			});

			$("#cont_telefono_JS").rules( "add", {
				number: true,
				minlength:10,
				maxlength:10,
				messages:{ // mensajes personalizados 
					number: "Sólo ingresa números",
					minlength:"El número debe incluir la lada (10 dígitos)",
					maxlength:"El número debe incluir la lada (10 dígitos)",
				}	
			});	

			jQuery.extend(jQuery.validator.messages, { // validacion mensajes generales
				required: 'Este campo es obligatorio.',
				email: 'El E-mail debe tener un formato válido',
			});

			$('select[id="cont_puesto_JS"]').change(function(){
            var status = $(this).attr('value');
            var $_GET =  obtener_get();// obtenemos el get de la URL
          	var get_puesto = $_GET['puesto'];
              	get_puesto = parseInt(get_puesto); 
              	 if (isNaN(get_puesto)) {
              	 	get_puesto = status;
              	 	get_puesto= get_puesto.toString();
              	 	var link = window.location.href;
		         	link = link+'?sucursal=0&puesto='+ get_puesto;
              	 } else{
		          	 var link = window.location.href;
		         	link = link.replace('puesto='+get_puesto, 'puesto='+status); // obtenemos el contenido del atributo href del boton next post 
              	 };

            
             window.history.replaceState( {} , '', link); //cambia la direccion del post a travez del historial 
        		
             	$('#formulario-2').show();

        		$('[identificador]').hide();

        		$('[identificador*="'+get_puesto+',"]').show();
        		

        });

 		$('input:radio[name="contact-form_JS[sucursal]"]').change(function(){
            var status = $(this).attr('sucursal');
            var $_GET =  obtener_get();// obtenemos el get de la URL
          	var get_sucursal = $_GET['sucursal'];
              	get_sucursal = parseInt(get_sucursal); 
             var link = window.location.href;
             	link = link.replace('sucursal='+get_sucursal, 'sucursal='+status); // obtenemos el contenido del atributo href del boton next post 
				window.history.replaceState( {} , '', link); //cambia la direccion del post a travez del historial 
        	$('.formulario-3').show();

        });


		};

// Formulario OFRENDA

		if( $('#ofrenda-form_JS').length > 0) {

			var ajax_ofrenda_url = cltvo_js_vars.template_url + '/ajax/ajax-ofrenda.php'; //aca_js_vars is never defined
			$("#ofrenda-form_JS").validate({

				submitHandler:function(form){ // envia via post
					var $form = $(this);
			    	// Previene hacer submit más de una vez
			    	$(".finaliza-solicitud").prop("disabled", true);
				    var form = $("#ofrenda-form_JS").get(0); 

				   	var ajax_url_quotation = cltvo_js_vars.template_url + '/ajax/ajax-ofrenda.php';
					
					var form_data = new FormData(form);  

					var selImg = document.querySelector("[name=imagen-predefinida]:checked");
					 
					 if (!selImg ){
					 	var file_data = $('#file-2').val();   
						var block = file_data.split(";");
		                // Get the content type
		                var contentType = block[0].split(":")[1];// In this case "image/gif"
		                // get the real base64 content of the file
		                var realData = block[1].split(",")[1];// In this case "iVBORw0KGg...."

		                // Convert to blob
		                var blob = b64toBlob(realData, contentType);
		                
					    
					    console.log(form_data);             
					    form_data.set('file', blob);
					 }
					
					


			        $.ajax({
			            url: ajax_url_quotation, // point to server-side PHP script 
				        dataType: 'text',  // what to expect back from the PHP script, if anything
				        cache: false,
				        contentType: false,
				        processData: false,
				        data: form_data,                         
				        type: 'post',
			        }).done(function( response ) {
					    $('.respuesta-ofrenda').html(response);
					    location.reload();
					});
				},
				errorPlacement: function(error, element) {
				    error.insertBefore(element);
				}
			});

			
			// .......................relgas de validacion....................
			$("#ofrenda_mail_JS").rules( "add", {
				email: true
			});

			$("#ofrenda_telefono_JS").rules( "add", {
				number: true,
				minlength:10,
				maxlength:10,
				messages:{ // mensajes personalizados 
					number: "Sólo ingresa números",
					minlength:"El número debe incluir la lada (10 dígitos)",
					maxlength:"El número debe incluir la lada (10 dígitos)",
				}	
			});	

			jQuery.extend(jQuery.validator.messages, { // validacion mensajes generales
				required: 'Este campo es obligatorio.',
				email: 'El E-mail debe tener un formato válido',
			});

		
 		

		};

		if( $('#vela-form_JS').length > 0) {
			 var placeHolder = ['Ej: Gracias por ser un gran maestr@ de vida','Ej: Gracias por este año tan maravilloso','Ej: Gracias por darme la vida','Ej: Gracias por ser un gran ser humano '];
		    var ii=0;
		    var loopLength=placeHolder.length;

		    setInterval(function(){
		       if(ii<loopLength){
		          var newPlaceholder = placeHolder[ii];
		          ii++;
		          $('#vela_texto_JS').attr('placeholder',newPlaceholder);
		       } else {
		          $('#vela_texto_JS').attr('placeholder',placeHolder[0]);
		          ii=0;
		       }
		    },2000);

			
			$("#vela-form_JS").validate({

				submitHandler:function(form){ // envia via post

					var $form = $(this);
					
			    	// Previene hacer submit más de una vez
			    	$(".finaliza-solicitud-vela").prop("disabled", true);
			    	
				    var form = $("#vela-form_JS").get(0); 

				   	var ajax_url_vela = cltvo_js_vars.template_url + '/ajax/ajax-vela.php';
					console.log(ajax_url_vela);
				    var form_data = new FormData(form); 

			        $.ajax({
			            url: ajax_url_vela, // point to server-side PHP script 
				        dataType: 'text',  // what to expect back from the PHP script, if anything
				        cache: false,
				        contentType: false,
				        processData: false,
				        data: form_data,                         
				        type: 'post',
			        }).done(function( response ) {
					    $('.respuesta-vela').html(response);
					    location.reload();
					});
				},
				errorPlacement: function(error, element) {
				    error.insertBefore(element);
				}
			});

			
			// .......................relgas de validacion....................
			$("#vela_mail_JS").rules( "add", {
				email: true
			});

			$("#vela_telefono_JS").rules( "add", {
				number: true,
				minlength:10,
				maxlength:10,
				messages:{ // mensajes personalizados 
					number: "Sólo ingresa números",
					minlength:"El número debe incluir la lada (10 dígitos)",
					maxlength:"El número debe incluir la lada (10 dígitos)",
				}	
			});	

			jQuery.extend(jQuery.validator.messages, { // validacion mensajes generales
				required: 'Este campo es obligatorio.',
				email: 'El E-mail debe tener un formato válido',
			});

		
 		

		};
	  	

	    $(".busqueda-js").click(function () {
					$(".desaparece-link").hide();
					$(".aparece-formulario").show();
				  	$("input#input-js").focus();

			 		
			});
		// if ( $( ".storage-posts-JS" ).length ) {
		// 	 if (localStorage["myKey"] != null) {
		// 	      var contentsOfOldDiv = JSON.parse(localStorage["myKey"]); 
		// 	      $(".storage-posts-JS").html(contentsOfOldDiv);
		//      } 
				
		// 	if(localStorage.scrollPosition) {
		// 		$(document).scrollTop(localStorage.getItem("scrollPosition"));
		// 	}
		// }
		 if( $('#qrcode').length > 0) {
		 
			
			var divs = document.getElementsByClassName( 'qrcode' );
			var elText = $('#qrcode').attr('link-ofrenda');
			[].slice.call( divs ).forEach(function ( div ) {
			    new QRCode(div, {
			    	text: elText,
				  width : 200,
				  height : 200,
				  useSVG: true
				});
			});
		 
		}

			


var tiempo_inicio_anim = 200;
		var tiempo_entre_img = 100;
		var tiempo_logos = 8000;
		var tiempo_cursor = 450;
		var pausa_borrar = 2000;

		function animacion_simple() {
			var i = 0
			var i = pausa_borrar
			
			// Mostramos la foto 1
			$(".valpa-blanco").show();

			

		//cursor
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-blanco").hide();
				// Mostramos la foto 2
				$(".valpa-1").show();
			}, i);
			
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-1").hide();
				// Mostramos la foto 2
				$(".valpa-2").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-2").hide();
				// Mostramos leda foto 2
				$(".valpa-3").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-3").hide();
				// Mostramos la foto 2
				$(".valpa-4").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-4").hide();
				// Mostramos leda foto 2
				$(".valpa-5").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-5").hide();
				// Mostramos la foto 2
				$(".valpa-6").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-6").hide();
				// Mostramos la foto 2
				$(".valpa-7").show();
			}, i);
		//termina cursor

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-7").hide();
				// Mostramos la foto 2
				$(".valpa-8").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-8").hide();
				// Mostramos la foto 2
				$(".valpa-9").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-9").hide();
				// Mostramos la foto 2
				$(".valpa-10").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-10").hide();
				// Mostramos la foto 2
				$(".valpa-11").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-11").hide();
				// Mostramos la foto 2
				$(".valpa-12").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-12").hide();
				// Mostramos la foto 2
				$(".valpa-13").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-13").hide();
				// Mostramos la foto 2
				$(".valpa-14").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-14").hide();
				// Mostramos la foto 2
				$(".valpa-15").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-15").hide();
				// Mostramos la foto 2
				$(".valpa-16").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-16").hide();
				// Mostramos la foto 2
				$(".valpa-17").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-17").hide();
				// Mostramos la foto 2
				$(".valpa-18").show();
			}, i);

			//cursor
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-18").hide();
				// Mostramos la foto 2
				$(".valpa-19").show();
			}, i);
			
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-19").hide();
				// Mostramos leda foto 2
				$(".valpa-20").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-20").hide();
				// Mostramos la foto 2
				$(".valpa-21").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-21").hide();
				// Mostramos leda foto 2
				$(".valpa-22").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-22").hide();
				// Mostramos la foto 2
				$(".valpa-23").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-23").hide();
				// Mostramos la foto 2
				$(".valpa-24").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-24").hide();
				// Mostramos la foto 2
				$(".valpa-25").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-25").hide();
				// Mostramos leda foto 2
				$(".valpa-26").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-26").hide();
				// Mostramos la foto 2
				$(".valpa-27").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-27").hide();
				// Mostramos leda foto 2
				$(".valpa-28").show();
			}, i);
			var i = i + tiempo_logos;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-28").hide();
				// Mostramos la foto 2
				$(".valpa-29").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-29").hide();
				// Mostramos la foto 2
				$(".valpa-30").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-30").hide();
				// Mostramos la foto 2
				$(".valpa-31").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-31").hide();
				// Mostramos la foto 2
				$(".valpa-32").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-32").hide();
				// Mostramos la foto 2
				$(".valpa-33").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-33").hide();
				// Mostramos la foto 2
				$(".valpa-34").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-34").hide();
				// Mostramos la foto 2
				$(".valpa-35").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-35").hide();
				// Mostramos leda foto 2
				$(".valpa-36").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-36").hide();
				// Mostramos la foto 2
				$(".valpa-37").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-37").hide();
				// Mostramos leda foto 2
				$(".valpa-38").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-38").hide();
				// Mostramos la foto 2
				$(".valpa-39").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-39").hide();
				// Mostramos la foto 2
				$(".valpa-40").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-40").hide();
				// Mostramos la foto 2
				$(".valpa-41").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-41").hide();
				// Mostramos la foto 2
				$(".valpa-42").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-42").hide();
				// Mostramos la foto 2
				$(".valpa-43").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-43").hide();
				// Mostramos la foto 2
				$(".valpa-44").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-44").hide();
				// Mostramos la foto 2
				$(".valpa-45").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-45").hide();
				// Mostramos leda foto 2
				$(".valpa-46").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-46").hide();
				// Mostramos la foto 2
				$(".valpa-47").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-47").hide();
				// Mostramos leda foto 2
				$(".valpa-48").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-48").hide();
				// Mostramos la foto 2
				$(".valpa-49").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-49").hide();
				// Mostramos la foto 2
				$(".valpa-50").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-50").hide();
				// Mostramos la foto 2
				$(".valpa-51").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-51").hide();
				// Mostramos la foto 2
				$(".valpa-52").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-52").hide();
				// Mostramos la foto 2
				$(".valpa-53").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-53").hide();
				// Mostramos la foto 2
				$(".valpa-54").show();
			}, i);
			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-54").hide();
				// Mostramos la foto 2
				$(".valpa-55").show();
			}, i);

			var i = i + tiempo_entre_img;
			setTimeout(function() {
				// Ocultamos la foto 1
				$(".valpa-55").hide();
				// Mostramos la foto 2
				$(".valpa-blanco").show();
			}, i);

			
		//termina cursor


			// Cuando pasen otros 3000 milisegundos, ocultamos la foto 3 y volvemos a iniciar la animación
			setTimeout(function() {
				animacion_simple();
			}, i);
		}
		//Empezamos la animación a los 200 milisegundos
		setTimeout(function() {
				animacion_simple();
			}, tiempo_inicio_anim);


	
	//Empezamos la animación a los 200 milisegundos
	
	
	});
})(jQuery);
function share_fb(url) {
  window.open('https://www.facebook.com/sharer/sharer.php?u='+url,'facebook-share-dialog',"width=626, height=436")
}