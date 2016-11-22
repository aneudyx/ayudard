<?php get_header(); ?>
<header class="main-header">
    <div class="container">
        <h1 class="page-title">Registro De Centro De Acopio</h1>

        <ol class="breadcrumb pull-right">
            <li><a href="<?php echo site_url(); ?>">Inicio</a></li>
            <li><a href="<?php echo site_url(); ?>/fundaciones">Centros De Acopio</a></li>
            <li class="active">Registro De Centro De Acopio</li>
        </ol>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h2 class="section-title no-margin-top">Registra Tu Centro</h2>
            <div class="panel panel-success-dark animated fadeInDown">
                <div class="panel-heading">Formulario De Registro</div>
                <div class="panel-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="nombre">Nombre<sup>*</sup></label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Direccion<sup>*</sup>:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>
						<div class="form-group">
                            <label for="imagen">Flyer/Imagen/Logo<sup>*</sup></label>
                            <input type="file" class="form-control" id="imagen" name="imagen">
                        </div>
                        <div class="form-group">
                            <label for="provincia">Provincia<sup>*</sup></label>
                            <input type="text" class="form-control" id="provincia" name="provincia">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion<sup>*</sup></label><br />
                            <textarea class="form-control" id="description" name="descripcion" rows="5"></textarea>
                        </div>
						<div class="form-group">
                            <label for="telefono">Tel&eacute;fono<sup>*</sup></label>
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
						<div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="text" class="form-control" id="correo" name="correo">
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-ar btn-primary pull-right">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container  -->
<?php get_footer(); ?>