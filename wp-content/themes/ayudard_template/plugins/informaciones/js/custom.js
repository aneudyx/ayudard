jQuery(document).ready(function(){
	jQuery("body").on("click","#guardar",function(){
		var wrapper = $(".input_fields_wrap div");
		var documentos = [];
		wrapper.each(function(){
			var documento = $(this).find("input").val();
			documentos.push(documento);
		});
		if(jQuery("#infogenerales").valid()){
			jQuery.ajax({
				type: 'POST',
				url: '../wp-admin/admin-ajax.php',
				data: {
						action: 'update_informaciones',
						correo: $('#correo').val(),
						telefono: $('#telefono').val(),
						calle: $('#calle').val(),
						sector: $('#sector').val(),
						provincia: $('#provincia').val(),
						facebook: $('#facebook').val(),
						twitter: $('#twitter').val(),
						titulo: $('#titulo').val(),
						mensaje: $('#mensaje').val(),
						mision: $('#mision').val(),
						vision: $('#vision').val(),
						solicitud: $('#solicitud').val(),
						requisitos: $('#requisitos').val(),
						formulario: $('#formulario').val(),
						instagram: $('#instagram').val(),
						documentos: documentos
					  },
					  success: function(data){
						$('.confirmacion').text('');
						$('.confirmacion').append(data);
						$('html,body').scrollTop(0);
					  },
					error: function(MLHttpRequest, textStatus, errorThrown){
						alert("Your data could not be load. Please refresh and try again");
					}
			});
		}
		else{
			$('.confirmacion').text('');
			$('.confirmacion').append('<div id="message" class="error fade"><p>Hay algun campo incompleto!</p></div>');
			$('html,body').scrollTop(0);
		}
	 });
	 
	 $(document).ready(function() {
		var max_fields      = 10; //maximum input boxes allowed
		var wrapper         = $(".input_fields_wrap"); //Fields wrapper
		var add_button      = $(".add_field_button"); //Add button ID
		
		var x = 1; //initlal text box count
		$(add_button).click(function(e){ //on add input button click
			e.preventDefault();
				x++; //text box increment
				$(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Quitar</a></div>'); //add input box
			
		});
		
		$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
			e.preventDefault(); $(this).parent('div').remove(); x--;
		})
	});
});

 
