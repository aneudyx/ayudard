<?php

	add_action( 'admin_menu', 'registrar_informaciones_generales' );

	function registrar_informaciones_generales(){
		add_menu_page( 'Informaciones Generales', 'Inf. General', 'manage_options', 'custompage', 'informaciones_generales','dashicons-list-view', 6 ); 
		
	}

	function informaciones_generales(){
		echo '<script src="'.get_template_directory_uri().'/assets/plugins/jquery-1.11.2.min.js"></script>
         <script src="'.get_template_directory_uri().'/plugins/informaciones/js/jquery.validate.min.js"></script>
         <script src="'.get_template_directory_uri().'/plugins/informaciones/js/custom.js"></script>
         <link rel="stylesheet" href="'.get_template_directory_uri().'/plugins/informaciones/css/custom.css" />';   
		echo '
			<div class="wrap">
				<div class="confirmacion"></div>
				<h3>Informacion Basica del Colegio</h3>
				<form method="post" action="options.php" id="infogenerales">
					<fieldset>
						<legend>Informaciones Generales:</legend>
						<table>
							<tr><td>Correo:</td><td><input type="email" required name="correo" id="correo" size="30" value="'.get_option('correo').'"/></td></tr>
							<tr><td>Telefono:</td><td><input type="text" required name="telefono" id="telefono" value="'.get_option('telefono').'"/></td></tr>
							<tr><td>Calle:</td><td><input type="text" required name="calle" id="calle" value="'.get_option('calle').'"/></td></tr>
							<tr><td>Sector:</td><td><input type="text"  required name="sector" id="sector" value="'.get_option('sector').'"/></td></tr>
							<tr><td>Provincia:</td><td><input type="text" required name="provincia" id="provincia" value="'.get_option('provincia').'"/></td></tr>
						</table>
					</fieldset>
					<fieldset>
						<legend>Enlaces Sociales:</legend>
						<table>
							<tr><td>Facebook:</td><td><input type="url" required  name="facebook" id="facebook" size="30" value="'.get_option('facebook').'"/></td></tr>
							<tr><td>Twitter:</td><td><input type="url" required name="twitter" id="twitter" size="30" value="'.get_option('twitter').'"/></td></tr>
							<tr><td>Instagram:</td><td><input type="url" required name="instagram" id="instagram" size="30" value="'.get_option('instagram').'"/></td></tr>
						</table>
					</fieldset>
					<fieldset>
						<legend>Mensaje Bienvenida:</legend>
						<table>
							<tr><td>Titulo:</td><td><input type="text" required name="titulo" id="titulo" size="30" minlength="2" value="'.get_option('titulo').'"/></td></tr>
							<tr><td>Mensaje:</td><td><textarea required name="mensaje" id="mensaje" cols="100" rows="5" maxlength="250" >'.get_option('mensaje').'</textarea></td></tr>
						</table>
					</fieldset>
					<fieldset>
						<legend>Mision y Vision:</legend>
						<table>
							<tr><td>Mision:</td><td><textarea required name="mision" id="mision" cols="100" rows="5" >'.get_option('mision').'</textarea></td></tr>
							<tr><td>Vision:</td><td><textarea required name="vision" id="vision" cols="100" rows="5" >'.get_option('vision').'</textarea></td></tr>
						</table>
					</fieldset>
					<fieldset>
						<legend>Enlaces Descargas:</legend>
						<table>
							<tr><td>Solicitud de Inscripci&oacute;n:</td><td><input type="url" name="solicitud" id="solicitud" size="30" minlength="2" value="'.get_option('solicitud').'"/></td></tr>
							<tr><td>Requisitos para inscripci&oacute;n:</td><td><input type="url" name="requisitos" id="requisitos" size="30" minlength="2" value="'.get_option('requisitos').'"/></td></tr>
							<tr><td>Formulario de Referencia:</td><td><input type="url" name="formulario" id="formulario" size="30" minlength="2" value="'.get_option('formulario').'"/></td></tr>
						</table>
					</fieldset>
					<fieldset>
						<legend>Documentos A Solicitar:</legend>
						<table id="listado-documentos">
							<button class="add_field_button">Agregar Documento</button>
							<div class="input_fields_wrap">';
							$lista_documentos = get_option('documentos');
							foreach($lista_documentos as $documento){
								
								echo '<div><input type="text" name="mytext[]" value="'.$documento.'" /><a href="#" class="remove_field">Quitar</a></div>';
							}
							
						echo	'</div>
						</table>
					</fieldset>
					<input type="button" id="guardar" value="Guardar Cambios" class="button button-primary"/>
					<div class="confirmacion"></div>
			';
		echo '</form>
			</div>';
			
	}
	
	function registrar_campos() {
		add_option( 'correo' );
		add_option( 'telefono' );
		add_option( 'calle' );
		add_option( 'sector' );
		add_option( 'provincia' );
		add_option( 'facebook' );
		add_option( 'twitter' );
		add_option( 'titulo' );
		add_option( 'mensaje' );
		add_option( 'mision' );
		add_option( 'vision' );
		add_option( 'solicitud' );
		add_option( 'requisitos' );
		add_option( 'formulario' );
		add_option( 'instagram' );
		add_option( 'documentos' );
	}
	add_action( 'admin_menu', 'registrar_campos' );
	
	 function mensaje_exito(){
        echo '<div id="message" class="updated fade">';
        echo '<p>Informacion actualizada correctamente!</p>';
        echo '</div>';
    }
	
	
	function update_informaciones(){
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $calle = $_POST['calle'];
            $sector = $_POST['sector'];
            $provincia = $_POST['provincia'];
            $facebook = $_POST['facebook'];
            $twitter = $_POST['twitter'];
            $titulo = $_POST['titulo'];
            $mensaje = $_POST['mensaje'];
            $mision = $_POST['mision'];
            $vision = $_POST['vision']; 
			$solicitud = $_POST['solicitud'];
            $requisitos = $_POST['requisitos'];
            $formulario = $_POST['formulario'];
            $instagram = $_POST['instagram'];
            $documentos = $_POST['documentos'];
            update_option('correo', $correo);
            update_option('telefono', $telefono);
            update_option('calle', $calle);
            update_option('sector', $sector);
            update_option('provincia', $provincia);
            update_option('facebook', $facebook);
            update_option('twitter', $twitter);
            update_option('titulo', $titulo);
            update_option('mensaje', $mensaje);
            update_option('mision', $mision);
            update_option('vision', $vision);
            update_option('solicitud', $solicitud);
            update_option('requisitos', $requisitos);
            update_option('formulario', $formulario);
            update_option('instagram', $instagram);
            update_option('documentos', $documentos);
            mensaje_exito();
        die();
    }
	
	// creating Ajax call for WordPress
   add_action( 'wp_ajax_nopriv_update_informaciones', 'update_informaciones' );
   add_action( 'wp_ajax_update_informaciones', 'update_informaciones' );

?>