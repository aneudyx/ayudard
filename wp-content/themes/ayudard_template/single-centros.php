<?php get_header(); ?>

<header class="main-header">
    <div class="container">
        <h1 class="page-title"><?php echo get_the_title() ?></h1>
        <ol class="breadcrumb pull-right">
            <li><a href="<?php echo site_url(); ?>">Inicio</a></li>
            <li><a href="<?php echo site_url(); ?>/centros">Centros De Damnificado</a></li>
            <li class="active"><?php echo get_the_title() ?></li>
        </ol>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <section>
				<?php if ( has_post_thumbnail() ) {
						$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );	?>
						<img src="<?php echo $url; ?>" class="img-responsive imageborder" alt="Image">
				<?php } ?>
				<br />
				<span><b>Direcci&oacute;n: </b><?php echo get_field('direccion')?></span><br/>
				<span><b>Tel&eacute;fonos: </b><?php echo get_field('telefono')?></span><br/>
				<br />
                <?php echo $post->post_content; ?> 
				<h2 class="section-title">Donaciones Necesitadas</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Artículo</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
					global $post,$wpdb;
					$consulta = "select * from donaciones_requeridas where centro_id='".$post->ID."'";
					$resultado = $wpdb->get_results( $consulta );
					if($wpdb->num_rows > 0){
						foreach($resultado as $row):				
							echo '<tr><td>'.$row->donacion.'</td></tr>'; 
						endforeach;
					}
				  ?>
                  </tbody>
                </table>
            </section>
            <section>
                <h2 class="section-title">Damnificados Alojados En Este Centro:</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Edad</th>
                      <th>Sexo</th>
                      <th>Localidad</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
					global $wpdb;
					$consulta = "select * from daminificados where centro_id='".$post->ID."'";
					$resultado = $wpdb->get_results( $consulta );
					if($wpdb->num_rows > 0){
						foreach($resultado as $row):				
							echo '<tr>
								  <td>'.$row->Nombre.'</td>
								  <td>'.$row->Edad.'</td>
								  <td>'.$row->Genero.'</td>
								  <td>'.$row->Localidad.'</td>
								</tr>'; 
						endforeach;
					}
				  ?>
                    
                  </tbody>
                </table>
            </section>
        </div>

        <div class="col-md-4">
            <aside class="sidebar">

            </aside> <!-- Sidebar -->
        </div>
    </div>
</div> <!-- container  -->
<?php get_footer(); ?>