<?php
	add_action('init', 'centros_init');
	function centros_init() {
		$labels = array(
						'name' => _x('Centros De Damnificados', 'centros de damnificados'),
						'singular_name' => _x('Centro De Damnificado', 'Centro de Damnificados'),
						'add_new' => _x('Agregar Nuevo', ''),
						'add_new_item' => __('Agregar Nuevo Centro De Damnificado'),
						'edit_item' => __('Editar Centro De Damnificado'),
						'new_item' => __('Nuevo Centro De Damnificado'),
						'view_item' => __('Ver Centro De Damnificado'),
						'search_items' => __('Buscar '),
						'not_found' => __('Centro De Damnificado no econtrado'),
						'not_found_in_trash' => __('No se encontraron Centros De Damnificado'),
					);
		$args = array(
					'labels' => $labels,
					'public' => true,
					'publicly_queryable' => true,
					'query_var' => true,
					'rewrite' => array('slug' => 'centros'),
					'capability_type' => 'post',
					'has_archive' => true,
					'hierarchical' => false,
					'menu_position' => null,
					'supports' => array('title','editor','thumbnail','municipios')
				);
		register_post_type('centros',$args);
	}
		
	//Se trabaja todo lo concerniente a Donaciones
	
	function add_custom_meta_box_donaciones() {
		wp_enqueue_script('jquery', get_template_directory_uri().'/plugins/centros/jquery-ui-1.11.2.custom/jquery-1.11.1.min.js');
		wp_enqueue_script('custom-js', get_template_directory_uri().'/plugins/centros/jquery-ui-1.11.2.custom/custom.js');  
		wp_enqueue_style( 'custom-css' );
		$post_type = array('centros');
		foreach($post_type as $post){
			add_meta_box(  
				'custom_meta_box_donaciones',
				'Donaciones Necesitadas',  
				'show_custom_meta_box_donaciones',  
				$post,  
				'normal',  
				'default');
		}
	}
	add_action('add_meta_boxes', 'add_custom_meta_box_donaciones');
	
	function show_custom_meta_box_donaciones(){
		global $post,$wpdb;
		echo '<table>
					<tr><td>Donacion:</td><td><input type="text" size="40" name="donacion" id="donacion"></td><td><input type="button" id="agregar" value="Agregar" /></td></tr>
					<input type="hidden" name="postID" value="'.$post->ID.'" id="postID"/>
				</table>
			<hr>';
		echo "
		<h4>Lista Donaciones Necesitadas:</h4>";
		echo '<table id="listado_donaciones">
					';
		$consulta = "select * from donaciones_requeridas where centro_id='".$post->ID."'";
		$resultado = $wpdb->get_results( $consulta );
        if($wpdb->num_rows > 0){
			foreach($resultado as $row):				
				echo '<tr class="donacion_'.$row->donacion_id.'"><td><input type="text" id="donacion_'.$row->donacion_id.'" value="'.$row->donacion.'"/></td><td><input type="button" value="Actualizar" onClick="edita('.$row->donacion_id.')"/><input type="button" value="Borrar" onClick="borra('.$row->donacion_id.')"/></td></tr>'; 
			endforeach;
		}
		echo'</table>
			<div class="confirmacion"></div>
		';
	}
	
	
	function agrega_una_donacion(){
		global $wpdb;
		if($_POST['donacion'] != "" && $_POST['postID'] != "" ){
			$donacion = $_POST['donacion'];
			$post_id =  $_POST['postID'];
			$wpdb->insert('donaciones_requeridas', 
				array( 
						'centro_id' => $post_id, 
						'donacion' => $donacion,
				)
			);
			$consulta = "select * from donaciones_requeridas where centro_id='".$post_id."' AND donacion='".$donacion."'";
			$resultado = $wpdb->get_results( $consulta );
			if($wpdb->num_rows > 0){
				foreach($resultado as $row):				
					echo '<tr class="donacion_'.$row->donacion_id.'"><td><input type="text" id="donacion_'.$row->donacion_id.'" value="'.$row->donacion.'"/></td><td><input type="button" value="Actualizar" onClick="edita('.$row->donacion_id.')"/><input type="button" value="Borrar" onClick="borra('.$row->donacion_id.')"/></td></tr>';
				endforeach;
			}
		}
	   die();
	}
   add_action( 'wp_ajax_nopriv_agrega_una_donacion', 'agrega_una_donacion' );
   add_action( 'wp_ajax_agrega_una_donacion', 'agrega_una_donacion' );

      function actualiza_una_donacion(){
		global $wpdb;
		if($_POST['donacion'] != "" && $_POST['donacion_id'] != "" && $_POST['postID'] != "" ){
			$donacion = $_POST['donacion'];
			$donacion_id = $_POST['donacion_id'];
			$centro_id =  $_POST['postID'];
			$resultado = $wpdb->update('donaciones_requeridas', 
				array( 
						'donacion' => $donacion
				),
				array( 'donacion_id' => $donacion_id )
			);
			echo $data;
		}
	   die();
	}
   add_action( 'wp_ajax_nopriv_actualiza_una_donacion', 'actualiza_una_donacion' );
   add_action( 'wp_ajax_actualiza_una_donacion', 'actualiza_una_donacion' );
   
   function borra_una_donacion(){
		global $wpdb;
		if($_POST['donacion_id'] != "" ){
			$donacion_id = $_POST['donacion_id'];
			$wpdb->delete('donaciones_requeridas', array( 'donacion_id' => $donacion_id ));
		}
	   die();
	}
   add_action( 'wp_ajax_nopriv_borra_una_donacion', 'borra_una_donacion' );
   add_action( 'wp_ajax_borra_una_donacion', 'borra_una_donacion' );
   
   //Se trabaja todo lo concerniente a Damnificados
	
	function add_custom_meta_box_damnificados() {
		wp_enqueue_script('jquery', get_template_directory_uri().'/plugins/centros/jquery-ui-1.11.2.custom/jquery-1.11.1.min.js'); 
		wp_enqueue_script('custom-js', get_template_directory_uri().'/plugins/centros/jquery-ui-1.11.2.custom/custom.js');		
		wp_register_style( 'custom-style', get_template_directory_uri().'/plugins/centros/css/custom.css');
		wp_enqueue_style( 'custom-style' ); 
		$post_type = array('centros');
		foreach($post_type as $post){
			add_meta_box(  
				'custom_meta_box_damnificados',
				'Lista De Damnificado En Este Centro',  
				'show_custom_meta_box_damnificados',  
				$post,  
				'normal',  
				'default');
		}
	}
	add_action('add_meta_boxes', 'add_custom_meta_box_damnificados');
	
	function show_custom_meta_box_damnificados(){
		global $post,$wpdb;
		echo '<table>
					<tr><td>Nombre:</td><td><input type="text" size="40" name="nombre" id="nombre"></td></tr>
					<tr><td>Edad:</td><td><input type="number" size="3" name="edad" id="edad"></td></tr>
					<tr>
						<td>Genero:</td>
						<td> 
							<input type="radio" name="genero" value="m" checked> Masculino<br>
							<input type="radio" name="genero" value="f"> Femenino<br>
						</td>
					</tr>
					<tr><td>Localidad:</td><td><input type="text" size="20" name="localidad" id="localidad"></td></tr>
					<tr><td><input type="button" id="guardar" value="Guardar" /></td></tr>
					<input type="hidden" name="postID" value="'.$post->ID.'" id="postID"/>
				</table>
			<hr>';
		echo "
		<h4>Listado De Personas Alojada En Este Centro:</h4>";
		echo '
			<div id="listado_personas">
		';
		
		$consulta = "select * from daminificados where centro_id='".$post->ID."'";
		$resultado = $wpdb->get_results( $consulta );
        if($wpdb->num_rows > 0){
			foreach($resultado as $row):
					echo '	<fieldset class="damnificado_'.$row->damnificado_id.'">
							<table>
								<tr><td>Nombre:</td><td><input type="text" size="40" name="nombre" value="'.$row->Nombre.'" id="nombre_'.$row->damnificado_id.'"></td>
								<td>Edad:</td><td><input type="number" size="3" name="edad" value="'.$row->Edad.'" id="edad_'.$row->damnificado_id.'"></td></tr>
								<tr>
									<td>Genero</td>
									<td> ';
									if($row->Genero == "m"){
										echo '<input type="radio" name="genero_'.$row->damnificado_id.'" value="m" checked> Masculino
										<input type="radio" name="genero_'.$row->damnificado_id.'" value="f"> Femenino';
									}else{
										echo '<input type="radio" name="genero_'.$row->damnificado_id.'" value="m" > Masculino
										<input type="radio" name="genero_'.$row->damnificado_id.'" value="f" checked> Femenino';	
									}
								echo	'</td><td>Localidad:</td><td><input type="text" size="20" name="localidad" value="'.$row->Localidad.'" id="localidad_'.$row->damnificado_id.'"></td></tr>
							<tr><td></td><td><input type="button" value="Actualizar" onClick="edita_damnificado('.$row->damnificado_id.')"/><input type="button" value="Borrar" onClick="borra_damnificado('.$row->damnificado_id.')"/></td></tr>
						</table>
					  </fieldset>';
			endforeach;
		}
		echo'</div>
			<div class="confirmacion_personas"></div>
		';
	}
	
	function guarda_un_damnificado(){
		global $wpdb;
		if($_POST['nombre'] != "" && $_POST['postID'] != "" && $_POST['edad'] != "" && $_POST['localidad'] != "" && $_POST['genero'] != "" ){
			$nombre = $_POST['nombre'];
			$edad = $_POST['edad'];
			$localidad = $_POST['localidad'];
			$genero = $_POST['genero'];
			$post_id =  $_POST['postID'];
			$wpdb->insert('daminificados', 
				array( 
						'centro_id' => $post_id, 
						'nombre' => $nombre,
						'edad' => $edad,
						'localidad' => $localidad,
						'genero' => $genero,
				)
			);
			$consulta = "select * from daminificados where centro_id='".$post_id."' AND nombre='".$nombre."' AND edad='".$edad."' AND localidad='".$localidad."'";
			$resultado = $wpdb->get_results( $consulta );
			if($wpdb->num_rows > 0){
				foreach($resultado as $row):				
					echo '<fieldset class="damnificado_'.$row->damnificado_id.'">
							<table>
								<tr><td>Nombre:</td><td><input type="text" size="40" name="nombre" value="'.$row->Nombre.'" id="nombre_'.$row->damnificado_id.'"></td></tr>
								<tr><td>Edad:</td><td><input type="number" size="3" name="edad" value="'.$row->Edad.'" id="edad_'.$row->damnificado_id.'"></td></tr>
								<tr>
									<td>Genero</td>
									<td> ';
									if($row->Genero == "m"){
										echo '<input type="radio" name="genero_'.$row->damnificado_id.'" value="m" checked> Masculino<br>
										<input type="radio" name="genero_'.$row->damnificado_id.'" value="f"> Femenino<br>';
									}else{
										echo '<input type="radio" name="genero_'.$row->damnificado_id.'" value="m" > Masculino<br>
										<input type="radio" name="genero_'.$row->damnificado_id.'" value="f" checked> Femenino<br>';	
									}
								echo	'</td></tr>
							<tr><td>Localidad:</td><td><input type="text" size="20" name="localidad" value="'.$row->Localidad.'" id="localidad_'.$row->damnificado_id.'"></td></tr>
							<tr><td></td><td><input type="button" value="Actualizar" onClick="edita_damnificado('.$row->damnificado_id.')"/><input type="button" value="Borrar" onClick="borra_damnificado('.$row->damnificado_id.')"/></td></tr>
						</table>
					  </fieldset>';
				endforeach;
			}
		}
	   die();
	}
   add_action( 'wp_ajax_nopriv_guarda_un_damnificado', 'guarda_un_damnificado' );
   add_action( 'wp_ajax_guarda_un_damnificado', 'guarda_un_damnificado' );
   
   function actualiza_un_damnificado(){
		global $wpdb;
		if($_POST['nombre'] != "" && $_POST['postID'] != "" && $_POST['edad'] != "" && $_POST['localidad'] != "" && $_POST['genero'] != "" && $_POST['damnificado_id'] != "" ){
			$nombre = $_POST['nombre'];
			$edad = $_POST['edad'];
			$localidad = $_POST['localidad'];
			$genero = $_POST['genero'];
			$post_id =  $_POST['postID'];
			$damnificado_id =  $_POST['damnificado_id'];
			$resultado = $wpdb->update('daminificados', 
				array( 
						'nombre' => $nombre,
						'edad' => $edad,
						'localidad' => $localidad,
						'genero' => $genero
				),
				array( 'damnificado_id' => $damnificado_id )
			);
		}
	   die();
	}
   add_action( 'wp_ajax_nopriv_actualiza_un_damnificado', 'actualiza_un_damnificado' );
   add_action( 'wp_ajax_actualiza_un_damnificado', 'actualiza_un_damnificado' );
   
   function borra_un_damnificado(){
		global $wpdb;
		if($_POST['damnificado_id'] != "" ){
			$damnificado_id = $_POST['damnificado_id'];
			$wpdb->delete('daminificados', array( 'damnificado_id' => $damnificado_id ));
		}
	   die();
	}
   add_action( 'wp_ajax_nopriv_borra_un_damnificado', 'borra_un_damnificado' );
   add_action( 'wp_ajax_borra_un_damnificado', 'borra_un_damnificado' );
   
   //Informacion Del Centro De Damnificado
   if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_informacion-centros',
		'title' => 'Informacion Centros',
		'fields' => array (
			array (
				'key' => 'field_58307c882c9b1',
				'label' => 'Direccion',
				'name' => 'direccion',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_58307ce886f6c',
				'label' => 'Telefono',
				'name' => 'telefono',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'centros',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

?>