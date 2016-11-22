<?php get_header(); ?>
<header class="main-header">
    <div class="container">
        <h1 class="page-title">Contactanos</h1>

        <ol class="breadcrumb pull-right">
            <li><a href="<?php echo site_url(); ?>">Inicio</a></li>
            <li class="active">Contactos</li>
        </ol>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="section-title no-margin-top">Escr&iacute;benos</h2>
        </div>
        <div class="col-md-8">
            <section>
                <p>Nos gustaria saber tus feedback, que cosas debemos mejorar? Como podemos ayudar mas? De igual forma si hay alg&uacute;n que no est&eacute; en este portal dejanos saber. Con tu ayuda podemos ayudar mas!</p>
				
                <form role="form" method="POST" action="<?php echo site_url(); ?>/contactos">
                    <div class="form-group">
                        <label for="InputName">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="InputName">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail1">Correo</label>
                        <input type="email" class="form-control" name="correo" id="InputEmail1">
                    </div>
					<div class="form-group">
                        <label for="InputSubject">Asunto</label>
                        <input type="text" class="form-control" name="asunto" id="InputSubject">
                    </div>
                    <div class="form-group">
                        <label for="InputMessage">Mensaje</label>
                        <textarea class="form-control" id="InputMessage" name="mensaje" rows="8"></textarea>
                    </div>
                    <button type="submit" name="enviar" class="btn btn-ar btn-primary">Enviar</button>
                    <div class="clearfix"></div>
                </form>
				<?php
					if(isset($_POST['enviar']) ){
						if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['mensaje'])){
							$message = "Nombre: ".$_POST['nombre']."; Correo:".$_POST['correo']."; Asunto: ".$_POST['asunto']."; Mensaje:".$_POST['mensaje'];
							$response = wp_mail( 'acaceres@intellisys.com.do', 'Mensaje de Ayuda RD', $message );
							if ($response) echo '<div class="alert alert-success"><strong>Felicidades!</strong> Su mensaje ha sido enviado exitosamente!</div>' ;  			  
							else echo '<div class="alert alert-danger"><strong>Lo Sentimos!</strong> Por favor verifique los campos e intente de nuevo!</div>';
						}
						else{
							echo '<div class="alert alert-warning"><strong>Lo Sentimos!</strong> Algun campo no fue llenado correctamente!</div>';
						}
					}
				?>
            </section>
        </div>

        <div class="col-md-4">
            <section>
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-envelope-o"></i> Informacion Adicional</div>
                    <div class="panel-body">
                        <h4 class="section-title no-margin-top">Contactos</h4>
                        <address>
                            <strong>Aneudy Caceres</strong><br>
                            Correo: <a href="#">acaceres@intellisys.com.do</a>
                        </address>

                        <!-- Business Hours -->
                        <h4 class="section-title no-margin-top">Centros De Acopio</h4>
						Por favor dejenos saber de usted, envienos sus datos para publicarlos al correo antes mencionado. Por favor incluya en el correo:
                        <ul class="list-unstyled">
                            <li><strong>Direccion:</strong> Lugar del centro</li>
                            <li><strong>Descripcion:</strong> Pequeña descripcion de lo que esta recibiendo y que tiempo lo estar&aacute; recibiendo</li>
                            <li><strong>Nombre Del Centro:</strong> Nombre de su centro de acopio</li>
                            <li><strong>Telefono y/o Correo(opcional):</strong> Si desea ser contactado por una de estas vias</li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>

</div> <!-- container -->
<?php get_footer(); ?>