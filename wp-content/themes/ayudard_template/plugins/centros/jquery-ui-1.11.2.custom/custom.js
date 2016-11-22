jQuery( document ).ready(function() {

	//Agregar un nuevo Centro
	jQuery("#agregar").bind('click',function(){
		var donacion = jQuery('#donacion').val();
		var postID = jQuery('#postID').val();
		if(donacion != "" && postID != ""){
			jQuery.ajax({
				type: 'POST',
				url: 'http://ayudard.com/wp-admin/admin-ajax.php',
				data: {
				  action: 'agrega_una_donacion',
				  donacion: donacion,
				  postID: postID
				},
				success: function(data){
					jQuery("#listado_donaciones").append(data);
					jQuery('#donacion').val("");
				},
				error: function(MLHttpRequest, textStatus, errorThrown){
					alert("Hubo algun fallo por favor refresque la pagina");
				}
			});
		}
		else{
			alert("Hay algun campo vacio en el evento");
		}
	});
	
	//Agregar un nuevo Damnificado
	jQuery("#guardar").bind('click',function(){
		var nombre = jQuery('#nombre').val();
		var edad = jQuery('#edad').val();
		var genero = jQuery("input[name=genero]:checked").val();
		var localidad = jQuery("#localidad").val();
		var postID = jQuery('#postID').val();
		if(nombre != "" && postID != "" && edad != "" && localidad != "" && genero != ""){
			jQuery.ajax({
				type: 'POST',
				url: 'http://ayudard.com/wp-admin/admin-ajax.php',
				data: {
				  action: 'guarda_un_damnificado',
				  nombre: nombre,
				  edad: edad,
				  genero: genero,
				  localidad: localidad,
				  postID: postID
				},
				success: function(data){
					jQuery("#listado_personas").append(data);
					jQuery('#nombre').val("");
					jQuery('#edad').val("");
					jQuery("#localidad").val("");
				},
				error: function(MLHttpRequest, textStatus, errorThrown){
					alert("Hubo algun fallo por favor refresque la pagina");
				}
			});
		}
		else{
			alert("Hay algun campo vacio en el evento");
		}
	});
	
});

//Editar un Centro
function edita(id){
	var donacion=jQuery("#donacion_"+id).val();
	var donacion_id = id;
	var postID = jQuery("#postID").val();
	if(donacion != "" && donacion_id != "" && postID != ""){
			jQuery.ajax({
				type: 'POST',
				url: 'http://ayudard.com/wp-admin/admin-ajax.php',
				data: {
				  action: 'actualiza_una_donacion',
				  donacion: donacion,
				  donacion_id: donacion_id,
				  postID: postID
				},
				success: function(data){
					jQuery(".confirmacion").append('<div id="message" class="updated fade"><p>Informacion actualizada correctamente!</p></div>');
					setTimeout(function() {
					  jQuery("#message").remove();
					}, 5000);
				},
				error: function(MLHttpRequest, textStatus, errorThrown){
					alert("Hubo algun fallo por favor refresque la pagina");
				}
			});
		}
		else{
			alert("Hay algun campo vacio en el evento");
		}
}


function borra(id){
	var donacion_id = id;
	var confirmacion = confirm("Seguro desea borrar esta necesidad?");
	if(confirmacion == true && donacion_id != ""){
		jQuery.ajax({
				type: 'POST',
				url: 'http://ayudard.com/wp-admin/admin-ajax.php',
				data: {
				  action: 'borra_una_donacion',
				  donacion_id: donacion_id
				},
				success: function(data){
					jQuery(".donacion_"+id).remove();
					jQuery(".confirmacion").append('<div id="message" class="updated fade"><p>Informacion actualizada correctamente!</p></div>');
					setTimeout(function() {
					  jQuery("#message").remove();
					}, 5000);
				},
				error: function(MLHttpRequest, textStatus, errorThrown){
					alert("Hubo algun fallo por favor refresque la pagina");
				}
			});
	}
};


//Editar un Damnificado
function edita_damnificado(id){
	var nombre = jQuery("#nombre_"+id).val();
	var edad = jQuery("#edad_"+id).val();
	var genero = jQuery("input[name=genero_"+id+"]:checked").val();
	var localidad = jQuery("#localidad_"+id).val();
	var damnificado_id = id;
	var postID = jQuery("#postID").val();
	if(nombre != "" && damnificado_id != "" && postID != "" && edad != "" && localidad != "" && genero != ""){
			jQuery.ajax({
				type: 'POST',
				url: 'http://ayudard.com/wp-admin/admin-ajax.php',
				data: {
				  action: 'actualiza_un_damnificado',
				  nombre: nombre,
				  edad: edad,
				  genero: genero,
				  localidad: localidad,
				  damnificado_id: damnificado_id,
				  postID: postID
				},
				success: function(data){
					jQuery(".confirmacion_personas").append('<div id="message" class="updated fade"><p>Informacion actualizada correctamente!</p></div>');
					setTimeout(function() {
					  jQuery("#message").remove();
					}, 5000);
				},
				error: function(MLHttpRequest, textStatus, errorThrown){
					alert("Hubo algun fallo por favor refresque la pagina");
				}
			});
		}
		else{
			alert("Hay algun campo vacio en el evento");
		}
}


function borra_damnificado(id){
	var damnificado_id = id;
	var confirmacion = confirm("Seguro desea borrar esta necesidad?");
	if(confirmacion == true && damnificado_id != ""){
		jQuery.ajax({
				type: 'POST',
				url: 'http://ayudard.com/wp-admin/admin-ajax.php',
				data: {
				  action: 'borra_un_damnificado',
				  damnificado_id: damnificado_id
				},
				success: function(data){
					jQuery(".damnificado_"+id).remove();
					jQuery(".confirmacion_personas").append('<div id="message" class="updated fade"><p>Informacion actualizada correctamente!</p></div>');
					setTimeout(function() {
					  jQuery("#message").remove();
					}, 5000);
				},
				error: function(MLHttpRequest, textStatus, errorThrown){
					alert("Hubo algun fallo por favor refresque la pagina");
				}
			});
	}
};