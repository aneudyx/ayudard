<?php get_header(); ?>
<header class="main-header">
    <div class="container">
        <h1 class="page-title">Centro De Damnificados</h1>

        <ol class="breadcrumb pull-right">
            <li><a href="<?php echo site_url(); ?>">Inicio</a></li>
            <li class="active">Centro De Damnificados</li>
        </ol>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="post animated fadeInLeft animation-delay-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="post-title"><a href="<?php echo get_permalink(); ?>" class="transicion"><?php echo get_the_title(); ?></a></h3>
                        <div class="row">
							<div class="col-lg-6">
							<?php if ( has_post_thumbnail() ) {
										$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );	?>
										<img src="<?php echo $url; ?>" class="img-post img-responsive" alt="Image">
							<?php } ?>
                            </div>
                            
                            <div class="col-lg-6 post-content">
								<span><b>Direcci&oacute;n: </b><?php echo get_field('direccion')?></span><br/>
								<span><b>Tel&eacute;fonos: </b><?php echo get_field('telefono')?></span>
								<p><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer post-info-b">
                        <div class="row">
                            <div class="col-lg-10 col-md-9 col-sm-8">
                
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4">
                                <a href="<?php echo get_permalink(); ?>" class="pull-right">Leer Mas &raquo;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article> <!-- post -->
			<?php endwhile; else:  ?>
				<p><?php _e("No Se Han registrados Centros De Damnificados"); ?></p>
			<?php endif; ?>  

            <section class="text-center">
                <!--<ul class="pagination pagination-lg pagination-border">
                  <li class="disabled"><a href="#">&laquo;</a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">6</a></li>
                  <li><a href="#">7</a></li>
                  <li><a href="#">8</a></li>
                  <li><a href="#">9</a></li>
                  <li><a href="#">10</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>-->
				<?php $args = array(
						'prev_text'          => __('&laquo;'),
						'next_text'          => __('&raquo;'),
						'type'               => 'array',
					); ?>
					<?php $paginacion = paginate_links( $args );  
					if($paginacion){
						foreach($paginacion as $valor){
							if(strpos($valor, 'current') === false){ 
								echo '<li>'.$valor.'</li>';
							}else{
								echo '<li class="active">'.$valor.'</li>';
							}
						}
					}
					?>
            </section>
        </div> <!-- col-md-8 -->
        <div class="col-md-4">
            <aside class="sidebar">
            </aside> <!-- Sidebar -->
        </div>
    </div> <!-- row -->
</div> <!-- container  -->
<?php get_footer(); ?>