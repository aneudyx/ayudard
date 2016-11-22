<?php get_header(); ?>

<header class="main-header">
    <div class="container">
        <h1 class="page-title">Centros De Acopio</h1>

        <ol class="breadcrumb pull-right">
            <li><a href="<?php echo site_url(); ?>">Inicio</a></li>
            <li class="active">Centros De Acopio</li>
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
                        <h3 class="post-title"><a href="#" class="transicion"><?php echo get_the_title(); ?></a></h3>
                        <div class="row">
							<div class="col-lg-6">
							<?php if ( has_post_thumbnail() ) {
										$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );	?>
										<img src="<?php echo $url; ?>" class="img-post img-responsive" alt="Image">
							<?php } ?>
                            </div>
                            
                            <div class="col-lg-6 post-content">
								<?php if(get_field('direccion')){ ?>
									<span><b>Direcci&oacute;n: </b><?php echo get_field('direccion')?></span><br/>
								<?php } ?>
								<?php if(get_field('telefono')){ ?>
									<span><b>Tel&eacute;fonos: </b><?php echo get_field('telefono')?></span>
								<?php } ?>
								<?php if(get_field('correo')){ ?>
									<span><b>Correo: </b><?php echo get_field('correo')?></span>
								<?php } ?>
								<hr/>
								<p><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </article> <!-- post -->
			<?php endwhile; else:  ?>
				<p><?php _e("No Se Han registrados Fundaciones"); ?></p>
			<?php endif; ?>  

            <section class="text-center">
				<ul class="pagination pagination-lg pagination-border">
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
				</ul>
            </section>
        </div> <!-- col-md-8 -->
        <div class="col-md-4">
            <aside class="sidebar">
				<?php 
					if ( function_exists ( dynamic_sidebar('main_sidebar') ) ) : 
						dynamic_sidebar('main_sidebar'); 
					endif; 
				?>
            </aside> <!-- Sidebar -->
        </div>
    </div> <!-- row -->
</div> <!-- container  -->
<?php get_footer(); ?>