<?php 
	/*
		Template Name: Registrar
	*/

	get_header(); ?>

	<style type="text/css">
		.vlz_parte{
		    position: relative;
		    padding: 0px 10px;
		    border: solid 3px #87b8ab;
		    border-radius: 0px 3px 3px 3px;
		    margin-top: 50px;
		}

		.vlz_titulo_parte{
			position: absolute;
			top: -32px;
	    	left: -3px;
		    background: #87b8ab;
		    padding: 5px 50px 5px 10px;
		    border-radius: 3px 3px 0px 0px;
		    color: #FFF;
		    font-size: 16px;
		}

		.vlz_form div{ vertical-align: top; }

		.vlz_titulo{
		    text-align: center;
		    font-size: 36px;
		    margin-top: 20px;
	   	 	margin-bottom: 20px;
		}
		.vlz_sub_titulo{
			font-size: 18px;
			color: #555555 !important;
			margin-bottom: 20px !important;
			text-align: center;
		}

		.vlz_titulo_interno{
		    color: #87B8AB;
		    font-size: 18px;
		    font-weight: 500;
		    border-bottom: 2px solid #87B8AB;
		    margin-bottom: 20px;
		    padding-bottom: 10px;
		}

		.vlz_cell20  { position: relative; margin: 0px 3px; display: inline-block; width: calc( 20% - 9px ); }
		.vlz_cell25  { position: relative; margin: 0px 3px; display: inline-block; width: calc( 25% - 9px ); }
		.vlz_cell33  { position: relative; margin: 0px 3px; display: inline-block; width: calc( 33.333333333% - 9px ); }
		.vlz_cell50  { position: relative; margin: 0px 3px; display: inline-block; width: calc( 50% - 9px ); }
		.vlz_cell66  { position: relative; margin: 0px 3px; display: inline-block; width: calc( 66.666666666% - 9px ); }
		.vlz_cell75  { position: relative; margin: 0px 3px; display: inline-block; width: calc( 75% - 9px ); }
		.vlz_cell100 { position: relative; margin: 0px 3px; display: inline-block; width: calc( 100% - 9px ); }

		.vlz_seccion{
		    margin-bottom: 3rem !important;
		    overflow: hidden;
		}

		.vlz_sub_seccion{
	        margin-bottom: 15px;
		}

		.vlz_input{
			display: block;
		    width: 100%;
		    height: 34px;
		    padding: 6px 12px;
		    font-size: 14px;
		    line-height: 1.42857;
		    color: #6F7272;
		    background-color: #fff;
		    background-image: none;
		    border: 1px solid #ccc;
		    border-radius: 4px;
		    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
		    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
		    -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
		    -o-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
		    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
		}

		.vlz_input:focus{
			outline: 0px;
		}

		textarea.vlz_input{
			resize: none;
			height: 153px;
		}

		.vlz_check, .vlz_no_check{
			cursor: pointer; 
			position: relative;
			background-color: #EEE;
			font-size: 12px;
		    padding: 8px 12px;
		}

		.vlz_check{
			background-color: #a8d8c9;
			border: 1px solid #87b8ab;
		}

		.vlz_no_check:after{
			content: ' ';
		    position: absolute;
		    top: 8px;
		    right: 8px;
		    width: 15px;
		    height: 15px;
		    border: solid 1px #CCC;
		    border-radius: 2px;
		}

		.vlz_check:after{
			content: ' ';
		    position: absolute;
		    top: 8px;
		    right: 8px;
		    width: 15px;
		    height: 15px;
		    border: 1px solid #87b8ab;
		    border-radius: 2px;
		    background-image: url(<?php echo get_template_directory_uri()."/vlz/img/iconos/new_check.png"; ?>);
		    background-size: 11px;
		    background-repeat: no-repeat;
		    background-position: 1px 1px;
		}

		#vlz_mapa{
			height: 400px;
		}

		.vlz_img_portada{ position: relative; height: 250px; overflow: hidden; border: solid 1px #ccc; background: #EEE; }
		.vlz_img_portada_fondo{ position: absolute; top: 0px; left: 0px; width: 100%; height: 250px; z-index: 50; background-size: cover; background-position: center; background-repeat: no-repeat; background-color: transparent; filter: blur(2px); transition: all .5s ease; }
		.vlz_img_portada_normal{ position: absolute; top: 0px; left: 0px; width: 100%; height: 225px; z-index: 100; background-size: contain; background-position: center; background-repeat: no-repeat; background-color: transparent; margin: 10px 0px; transition: all .5s ease; }
		.vlz_cambiar_portada{ position: absolute; bottom: 10px; right: 10px; width: auto; padding: 10px; font-size: 16px; color: #FFF; background: #23475e; border: solid 1px #fff; z-index: 200; }
		.vlz_cambiar_portada input{ position: absolute; top: -24px; left: 0px; width: 100%; height: 167%; z-index: 100; opacity: 0; cursor: pointer; }
		
		.vlz_contenedor_botones_footer{
			position: relative;
			overflow: hidden;
			padding: 20px 0px;
			border-top: solid 3px #2ca683;
		}

		.vlz_boton_siguiente{
		    padding: 10px 50px;
		    background-color: #a8d8c9;
		    display: inline-block;
		    font-size: 16px;
		    border: solid 1px #2ca683;
		    border-radius: 3px;
		    float: right;
		    cursor: pointer;
		}   

		.vlz_boton_agregar{
		    padding: 5px 25px;
		    background-color: #a8d8c9;
		    display: inline-block;
		    font-size: 14px;
		    border: solid 1px #2ca683;
		    border-radius: 3px;
		    cursor: pointer;
		    float: right;
		}

		.vlz_boton_quitar{
			position: relative;
		    padding: 12px;
		    background: #c79797;
		    margin: 5px 0px;
		    border-radius: 3px;
		}  

		.vlz_boton_quitar:after{
			content: ' ';
		    position: absolute;
	        top: 9px;
			right: calc( 50% - 8px );
		    width: 15px;
		    height: 15px;
		    border-radius: 2px;
		    background-image: url(<?php echo get_template_directory_uri()."/vlz/img/iconos/quitar_5.png"; ?>);
		    background-size: 11px;
		    background-repeat: no-repeat;
		    background-position: 1px 1px;
		    cursor: pointer;
		}

		.vlz_bloqueador{
			position: absolute;
			top: 0px;
			left: 0px;
			width: 100%;
			height: 100%;
			z-index: 1000;
			display: none;
		} 

		#vlz_boton_registrar{
			width: 130px;
		    padding: 7px 0px;
		}

		.vlz_val{
			display: none;
		    position: absolute;
		    top: 0px;
		    right: 0px;
		    background: #da2d2d;
		    padding: 0px 5px;
		    color: #FFF;
		    font-size: 12px;
		    font-weight: 600;
		    border-radius: 0px 0px 0px 3px;
		}

		.vlz_modal{
			position: fixed;
			top: 0px;
			left: 0px;
			width: 100%;
			height: 100%;
			display: table;
			z-index: 10000;
			background: rgba(0, 0, 0, 0.8);
			vertical-align: middle !important;
			display: none;
		}

		.vlz_modal_interno{
			display: table-cell;
			text-align: center;
			vertical-align: middle !important;
		}

		.vlz_modal_ventana{
		    position: relative;
		    display: inline-block;
		    width: 80%;
		    text-align: left;
		    box-shadow: 0px 0px 4px #FFF;
	        border-radius: 5px;
	        z-index: 1000;
		}

		.vlz_modal_titulo{
		    background: #FFF;
		    padding: 15px 10px;
		    font-size: 18px;
		    color: #52c8b6;
		    font-weight: 600;
		    border-radius: 5px 5px 0px 0px;
		}

		.vlz_modal_contenido{
		    background: #FFF;
		    height: 450px;
		    box-sizing: border-box;
		    padding: 5px 15px;
		    border-top: solid 1px #d6d6d6;
		    border-bottom: solid 1px #d6d6d6;
		    overflow: auto;
		    text-align: justify;
		}

		.vlz_modal_pie{
    		background: #FFF;
		    padding: 15px 10px;
		    border-radius: 0px 0px 5px 5px;
		}

		.vlz_modal_fondo{
			position: fixed;
			top: 0px;
			left: 0px;
			width: 100%;
			height: 100%;
	        z-index: 500;
		}

		.vlz_titulo_interno span {
		    color: #d80606;
		    font-size: 11px;
		    vertical-align: middle;
		    float: none;
		    display: block;
		    line-height: 1.2;
		    margin-top: 0px;
		}
		label{
		    display: block;
		}
		.no_error{
			display: none;
		}
		.error{
			display: block;
		    font-size: 10px;
		    border: solid 1px #CCC;
		    padding: 3px;
		    border-radius: 0px 0px 3px 3px;
		    background: #ffdcdc;
		    line-height: 1.2;
		    font-weight: 600;
		}
		.vlz_input_error{
		    border-radius: 3px 3px 0px 0px !important;
			border-bottom: 0px !important;
		}
		.vlz_contenedor_listados {
		    width: calc( 50% - 2px );
		    display: inline-block;
		    margin-bottom: 5px;
		}
		.vlz_img_portada{
		    position: relative;
		    height: 250px;
		    overflow: hidden;
		    border: solid 1px #ccc;
		    background: #EEE;
		    margin: 27px 6px 0px 3px;
		    border-radius: 5px;
		}
		.vlz_seccion {
		    margin-bottom: 0 !important;
		}
		#vlz_contenedor_selector_img .error{
		    z-index: 200;
		    position: absolute;
		    width: 100%;
		    border-radius: 5px 5px 0px 0px;
		    top: 0px;
		    font-size: 11px;
		}
		textarea.vlz_input {
		    resize: none;
		    height: 155px;
		}
		@media screen and (max-width: 750px){
			.vlz_modal_ventana{
				width: 90% !important;
			}
		}
		@media screen and (max-width: 568px){
			.vlz_seccion{
			    margin-bottom: 5px;
			}
			.vlz_sub_seccion {
			    margin-bottom: 0px;
			}
			.vlz_cell50{
		        width: calc( 100% - 9px ) !important;
			    margin-bottom: 5px;
			}
			.vlz_img_portada {
			    margin: 0px 6px 0px 3px;
			}

			.vlz_img_portada {
			    position: relative;
			    height: 200px;
			    overflow: hidden;
			    border: solid 1px #ccc;
			    background: #EEE;
			    margin: 0px 6px 0px 3px;
			    border-radius: 5px;
			}

			.vlz_img_portada_fondo {
			    position: absolute;
			    top: 0px;
			    left: 0px;
			    width: 100%;
			    height: 100%;
			    z-index: 50;
			    background-size: cover;
			    background-position: center;
			    background-repeat: no-repeat;
			    background-color: transparent;
			    filter: blur(2px);
			    transition: all .5s ease;
			}

			.vlz_img_portada_normal {
			    position: absolute;
			    top: 0px;
			    left: 10px;
			    width: calc( 100% - 20px );
			    height: 180px;
			    z-index: 100;
			    background-size: contain;
			    background-position: center;
			    background-repeat: no-repeat;
			    background-color: transparent;
			    margin: 10px 0px;
			    transition: all .5s ease;
			}

			#check_term{
			    display: block;
			    padding-right: 30px;
			    font-size: 12px !important;
			    height: auto !important;
			}
			#boton_registrar_modal{
		        display: inline-block;
			    font-size: 13px;
			    margin-top: 5px;
			}
			.vlz_modal_contenido {
			    height: 320px !important;
			}

			.vlz_contenedor_listados, .vlz_contenedor_dir{
		        width: calc( 100% - 9px ) !important;
				margin-bottom: 5px;
			}

		}	
	</style>

	<div class="container">
    	<div class="row">
			<div class="col-md-12">
				<form id="vlz_form_nuevo_cliente" class="vlz_form" enctype="multipart/form-data" method="POST">

					<div class="vlz_parte">
						<div class="vlz_titulo_parte">Registro de usuario</div>

						<div class="vlz_seccion">

							<div class="vlz_cell50 jj_input_cell00"><h2 class="vlz_titulo_interno">Datos Personales</h2>

								<div class="vlz_sub_seccion">
									<div class="vlz_cell50">
										<input data-title="El nombre no debe tener números y debe ser minimo de 2 caracteres."  type='text' id='nombres' name='nombres' class='vlz_input' placeholder='Nombres' required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,25}">
									</div>
									
									<div class="vlz_cell50">
										<input data-title="Debes ingresar tu apellido<br>Este debe tener mínimo 3 caracteres." type='text' id='apellidos' name='apellidos' class='vlz_input' placeholder='Apellidos' required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,25}" >
									</div>
								</div>

								<div class="vlz_sub_seccion">
									<div class="vlz_cell50">
										<input data-title="Debes ingresar tu número móvil<br>Este debe tener entre 10 y 11 dígitos." type='number' id='movil' maxlength="11" name='movil' class='vlz_input' placeholder='M&oacute;vil' required pattern="[0-9]{11}">
									</div>
									
									<div class="vlz_cell50">
										<input data-title="Debes ingresar tu número telefónico<br>Este debe tener entre 10 y 11 dígitos." type='number' id='telefono' maxlength="11" name='telefono' class='vlz_input' placeholder='Tel&eacute;fono' required pattern="[0-9]{11}">
									</div>
								</div>

								<h2 class="vlz_titulo_interno">¿Cómo nos conoció?</h2>

								<div class="vlz_sub_seccion">
									<select id="referido" name="referido" class="vlz_input" data-title="Debes seleccionar una opción" required>
										<option value="">Selecciona una opción</option>
										<?php
											$referidos = get_referred_list_options();
											foreach ($referidos as $key => $value) {
												echo "<option value='{$key}'>{$value}</option>";
											}
										?>
                                    </select>
								</div>

								<h2 class="vlz_titulo_interno">Datos de Acceso</h2>

								<div class="vlz_sub_seccion">
									<div class="vlz_cell50">
										<input data-title="Formato Invalido<br>Ej: xxxx@mail.com" onpaste="return false;" autocomplete="off" type='text' id='email_1' name='email_1' class='vlz_input' placeholder='Ingresa tu e-mail' required pattern="^[\w._%-]+@[\w.-]+\.[a-zA-Z]{2,4}$" title="Ej. xxxx@xxxxx.xx">
									</div>

									<div class="vlz_cell50">
										<input data-title="Formato Invalido<br>Ej: xxxx@mail.com" onpaste="return false;" autocomplete="off" type='text' id='email_2' name='email_2' class='vlz_input' placeholder='Vuelve a ingresa tu e-mail' required pattern="^[\w._%-]+@[\w.-]+\.[a-zA-Z]{2,4}$" title="Ej. xxxx@xxxxx.xx">
									</div>
								</div>
											
								<div class="vlz_sub_seccion">							
									<div class="vlz_cell50">
										<input 
											type='password' 
											id='clave' 
											name='clave' 
											data-title="
												<strong>
													Las contraseñas son requeridas
												</strong>" 
											class='vlz_input'
											placeholder='Contraseña' 
											required 
											autocomplete="off"
										>
									</div>
									
									<div class="vlz_cell50">
										<input 
											type='password' 
											id='clave2' 
											name='clave2' 
											data-title="
												<strong>
													Las contraseñas son requeridas
												</strong>" 
											class='vlz_input'
											placeholder='Contraseña' 
											required 
											autocomplete="off"
										>
									</div>
								</div>
							</div>
						
							<div class="vlz_cell50 jj_input_cell00">

								<div class="vlz_seccion">
									<div class="vlz_img_portada">
		                                <div class="vlz_img_portada_fondo" style="background-image: url(<?php echo get_template_directory_uri()."/images/noimg.png"; ?>);"></div>
		                                <div class="vlz_img_portada_normal" style="background-image: url(<?php echo get_template_directory_uri()."/images/noimg.png"; ?>);"></div>
		                                <div class="vlz_cambiar_portada">
		                                	Subir Foto
		                                	<input type="file" id="portada" name="portada" accept="image/*" />
										</div>
										<div id='vlz_contenedor_selector_img'>
											<input type="text" id="vlz_img_perfil" name="vlz_img_perfil" class="vlz_input" style="visibility: hidden; height: 0px !important; margin: 0px; padding: 0px;" value="" data-title="Debes cargar una foto. Fomatos aceptados: png, jpg, jpeg, gif"  />
                                		</div>
                                	</div>
								</div>

								<div class="vlz_sub_seccion" style="margin-top: 8px;">
									<div class="vlz_cell100">
										<textarea class='vlz_input jj_desc' id='descripcion' name='descripcion' placeholder='Información biográfica'></textarea>
									</div>
								</div>

							</div>

						</div>

						<?php include("vlz_terminos.php"); ?>

						<div class="vlz_contenedor_botones_footer">
							<div class="vlz_bloqueador"></div>
							<input type='button' id="vlz_boton_modal_terminos" class="vlz_boton_siguiente" value='Registrarme' onclick="vlz_validar()" />
						</div>

					</div>

				</form>
   			</div>
   		</div>
   	</div>

	<script>

		var form = document.getElementById('vlz_form_nuevo_cliente');
		form.addEventListener( 'invalid', function(event){
	        event.preventDefault();
	        jQuery("#error_"+event.target.id).html( jQuery("#error_"+event.target.id).attr("data-title") );

	        jQuery("#error_"+event.target.id).removeClass("no_error");
	        jQuery("#error_"+event.target.id).addClass("error");
	        jQuery("#"+event.target.id).addClass("vlz_input_error");
		}, true);

		function especiales(id){
			switch(id){
				case "movil":
		      		var telefono = jQuery( "#movil" ).val();

		      		if( telefono.length >= 10 && telefono.length <= 11 ){
		      			return true;
		      		}else{
		      			return false;
		      		}
				break;
				case "telefono":
		      		var telefono = jQuery( "#telefono" ).val();

		      		if( telefono.length >= 10 && telefono.length <= 11 ){
		      			return true;
		      		}else{
		      			return false;
		      		}
				break;
				case "email_2":
		      		var clv1 = jQuery("#email_1").attr("value");
		      		var clv2 = jQuery("#email_2").attr("value");
		      		return ( clv1 == clv2 );
				break;
				default:
					return true;
				break;
			}
		}

		form.addEventListener( 'keypress', function(event){
	        if ( event.target.validity.valid && especiales(event.target.id) ) {
	        	if( jQuery("#error_"+event.target.id).hasClass( "error" ) ){
	        		jQuery("#error_"+event.target.id).removeClass("error");
		        	jQuery("#error_"+event.target.id).addClass("no_error");
		        	jQuery("#"+event.target.id).removeClass("vlz_input_error");
	        	}
		    } else {
	        	if( jQuery("#error_"+event.target.id).hasClass( "no_error" ) ){
	        		jQuery("#error_"+event.target.id).html( jQuery("#error_"+event.target.id).attr("data-title") );
	        		jQuery("#error_"+event.target.id).removeClass("no_error");
		        	jQuery("#error_"+event.target.id).addClass("error");
		        	jQuery("#"+event.target.id).addClass("vlz_input_error");
	        	} 
		    }
		}, true);

		form.addEventListener( 'change', function(event){
	        if ( event.target.validity.valid && especiales(event.target.id) ) {
	        	if( jQuery("#error_"+event.target.id).hasClass( "error" ) ){
	        		jQuery("#error_"+event.target.id).removeClass("error");
		        	jQuery("#error_"+event.target.id).addClass("no_error");
		        	jQuery("#"+event.target.id).removeClass("vlz_input_error");
	        	}
		    } else {
	        	if( jQuery("#error_"+event.target.id).hasClass( "no_error" ) ){
	        		jQuery("#error_"+event.target.id).html( jQuery("#error_"+event.target.id).attr("data-title") );
	        		jQuery("#error_"+event.target.id).removeClass("no_error");
		        	jQuery("#error_"+event.target.id).addClass("error");
		        	jQuery("#"+event.target.id).addClass("vlz_input_error");
	        	} 
		    }

		}, true);

		jQuery(".vlz_input").each(function( index ) {
		  	var error = jQuery("<div class='no_error' id='error_"+( jQuery( this ).attr('id') )+"' data-id='"+( jQuery( this ).attr('id') )+"'></div>");
		  	var txt = jQuery( this ).attr("data-title");
		  	if( txt == "" || txt == undefined ){ txt = "Completa este campo."; }
		  	error.attr( "data-title", txt );
		  	error.html( txt );
		  	jQuery( this ).parent().append( error );
		});

      	function vista_previa(evt) {
	      	var files = evt.target.files;
	      	for (var i = 0, f; f = files[i]; i++) {  
	           	if (!f.type.match("image.*")) {
	                continue;
	           	}
	           	var reader = new FileReader();
	           	reader.onload = (function(theFile) {
	               return function(e) {
            			jQuery(".vlz_img_portada_fondo").css("background-image", "url("+e.target.result+")");
            			jQuery(".vlz_img_portada_normal").css("background-image", "url("+e.target.result+")");
            			jQuery("#vlz_img_perfil").attr("value", e.target.result);
            			jQuery("#error_vlz_img_perfil").css("display", "none");
	               };
	           })(f);
	           reader.readAsDataURL(f);
	       	}
		}      
      	document.getElementById("portada").addEventListener("change", vista_previa, false);

      	jQuery(".vlz_pin_check").on("click", function(){
      		if( jQuery("input", this).attr("value") == "0" ){
      			jQuery("input", this).attr("value", "1");
      			jQuery(this).removeClass("vlz_no_check");
      			jQuery(this).addClass("vlz_check");
      		}else{
      			jQuery("input", this).attr("value", "0");
      			jQuery(this).removeClass("vlz_check");
      			jQuery(this).addClass("vlz_no_check");
      		}
      	});

      	function mail_ext_temp(id){
      		jQuery(".vlz_modal_contenido").css("display", "none");
      		jQuery("#vlz_cargando").css("display", "block");

      		// jQuery("#vlz_cargando").html("<h2>Enviando Informaci&oacute;n al correo...</h2>");

      		jQuery.ajax({
			    url: '<?php echo get_template_directory_uri()."/vlz/form/vlz_mail_cliente.php"; ?>',
			    type: "post",
			    data: {
					nombre: jQuery("#nombres").attr("value")+" "+jQuery("#apellidos").attr("value"),
					clave:   jQuery("#clave").attr("value"),
					email: 	 jQuery("#email_1").attr("value")
				},
			    success: function (r) {
		      		data = eval(r);
		      		if( data.error == "SI" ){
		      			alert(data.msg);
		      		}else{
		      			location.href = "<?php echo get_home_url(); ?>/?init="+id;
		      		}
			    }
			});
      	}

      	jQuery("#vlz_form_nuevo_cliente").submit(function(e){

      		e.preventDefault();

      		jQuery("#vlz_modal_cerrar_registrar").attr("onclick", "");

      		if( form.checkValidity() ){

	            var terminos = jQuery("#terminos").attr("value");
	      		if( terminos == 1){

	      			var a = "<?php echo get_template_directory_uri()."/vlz/form/vlz_registrar.php"; ?>";

		      		jQuery("#vlz_contenedor_botones").css("display", "none");
		      		jQuery(".vlz_modal_contenido").css("display", "none");
		      		jQuery("#vlz_cargando").css("display", "block");
		      		jQuery("#vlz_cargando").css("height", "auto");
		      		jQuery("#vlz_cargando").css("text-align", "center");
		      		jQuery("#vlz_cargando").html("<h2>Registrando, por favor espere...</h2>");
		      		jQuery("#vlz_titulo_registro").html("Registrando, por favor espere...");
	             	
		      		jQuery.post( a, jQuery("#vlz_form_nuevo_cliente").serialize(), function( data ) {
		      			// console.log(data);
			      		mail_ext_temp(data);
					});

	      		}else{
		      		alert("Debe aceptar los términos y condiciones.");
      				vlz_modal('terminos', 'Términos y Condiciones');
	      		}

      		}

      	});

      	function clvs_iguales(e){
      		if( e.currentTarget.name == 'clave' || e.currentTarget.name == 'clave' ){
	      		var clv1 = jQuery("#clave").attr("value");
	      		var clv2 = jQuery("#clave2").attr("value");
	      		if( clv1 != clv2 ){
	      			jQuery("#error_clave2").html("Las contraseñas deben ser iguales");
	      			jQuery("#error_clave2").removeClass("no_error");
		        	jQuery("#error_clave2").addClass("error");
		        	jQuery("#clave2").addClass("vlz_input_error");
	      		}else{
	      			jQuery("#error_clave2").removeClass("error");
		        	jQuery("#error_clave2").addClass("no_error");
		        	jQuery("#clave2").removeClass("vlz_input_error");
	      		}
      		}
      		if( e.currentTarget.name == 'email_1' || e.currentTarget.name == 'email_2' ){
	      		var clv1 = jQuery("#email_1").attr("value");
	      		var clv2 = jQuery("#email_2").attr("value");
	      		if( clv1 != clv2 ){
	      			jQuery("#error_email_2").html("Los emails deben ser iguales");
	      			jQuery("#error_email_2").removeClass("no_error");
		        	jQuery("#error_email_2").addClass("error");
		        	jQuery("#email_2").addClass("vlz_input_error");
	      		}else{
	      			jQuery("#error_email_2").removeClass("error");
		        	jQuery("#error_email_2").addClass("no_error");
		        	jQuery("#email_2").removeClass("vlz_input_error");
	      		}
      		}
      	}

      	jQuery( "#clave" ).keyup(clvs_iguales);
      	jQuery( "#clave2" ).keyup(clvs_iguales);
      	jQuery( "#email_1" ).keyup(clvs_iguales);
      	jQuery( "#email_2" ).keyup(clvs_iguales);


      	jQuery( "#email_1" ).blur(function(){
      		var a = "<?php echo get_template_directory_uri()."/vlz/form/vlz_verificar_email.php"; ?>";
  			jQuery.post( a, {email: jQuery("#email_1").attr("value")}, function( data ) {
	      		data = eval(data);
	      		if( data.error == "SI" ){
	      			jQuery("#error_email_1").html("Este email ya esta en uso");
	      			jQuery("#error_email_1").removeClass("no_error");
		        	jQuery("#error_email_1").addClass("error");
		        	jQuery("#email_1").addClass("vlz_input_error");
	      			jQuery('html, body').animate({ scrollTop: jQuery("#email_1").offset().top-75 }, 2000);
	      		}else{
	      			jQuery("#error_email_1").html("Formato Invalido<br>Ej: xxxx@mail.com");
	      		}
			});
      	});

      	function vlz_validar(){
      		var error = 0;
      		var campos = ["movil", "telefono", "email_1", "email_2"];
      		campos.forEach(function(item, index){
      			if( !especiales(item) ){
      				console.log(item);
      				error++;
      			}
      		});
				console.log(error);
      		if( !form.checkValidity() || error > 0 ){
      			var primer_error = ""; var z = true;
      			jQuery( ".error" ).each(function() {
				  	if( jQuery( this ).css( "display" ) == "block" ){
				  		if( z ){
				  			primer_error = "#"+jQuery( this ).attr("data-id");
				  			z = false;
				  		}
				  	}
				});
      			jQuery('html, body').animate({ scrollTop: jQuery(primer_error).offset().top-75 }, 2000);
      		}else{
      			console.log("Hola 2");
	      		var a = "<?php echo get_template_directory_uri()."/vlz/form/vlz_verificar_email.php"; ?>";
      			jQuery.post( a, {email: jQuery("#email_1").attr("value")}, function( data ) {
		      		data = eval(data);
		      		if( data.error == "SI" ){
		      			jQuery("#error_email_1").html("Este email ya esta en uso");
		      			jQuery("#error_email_1").removeClass("no_error");
			        	jQuery("#error_email_1").addClass("error");
			        	jQuery("#email_1").addClass("vlz_input_error");
		      			jQuery('html, body').animate({ scrollTop: jQuery("#email_1").offset().top-75 }, 2000);
		      		}else{
      					console.log("Hola 3");
		      			vlz_modal('terminos', 'Términos y Condiciones');
		      		}
				});
      		}
      	}

      	function vlz_modal(tipo, titulo, contenido){
      		switch(tipo){
      			case "terminos":
      				jQuery("#vlz_titulo_registro").html(titulo);
      				jQuery("#terminos_y_condiciones").css("display", "table");
      				jQuery("#boton_registrar_modal").css("display", "inline-block");
      			break;
      		}
      	}

  	</script> 


<?php get_footer(); ?>
