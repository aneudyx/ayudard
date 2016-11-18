		<?php get_header(); ?>
		<!-- ******CONTENT****** --> 
        <div class="content container">
            <div id="promo-slider" class="slider flexslider">
                <ul class="slides">
					<?php query_posts('post_type=slides'); ?>				
					<?php while (have_posts()) : the_post(); ?>	
						<li>
							<?php 
								if ( has_post_thumbnail() ) {	
									$feature_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID),'thumbnail');
								}
							?>
							<div class="attachment-slide">
								<img src="<?php echo $feature_image; ?>" width="1400" alt="<?php the_title();?>" />
							</div>
							<p class="flex-caption">
								<?php if(get_the_title() != "" ){?>
									<span class="main" ><?php the_title();?></span>
								<?php } ?>
								<br />
								<?php if(get_the_content() != "" ){?>
									<span class="secondary clearfix" ><?php echo get_the_content();?></span>
								<?php } ?>
							</p>
						</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
                </ul><!--//slides-->
            </div><!--//flexslider-->
            <section class="promo box box-dark">        
                <div class="col-md-9">
                <h1 class="section-heading"><?php echo get_option('titulo');?></h1>
                    <p><?php echo get_option('mensaje');?></p>   
                </div>  
                <div class="col-md-3">
                    <a class="btn btn-cta" href="<?php bloginfo('url'); ?>/contactos"><i class="fa fa-play-circle"></i>Aplicar Ahora</a>  
                </div>
            </section><!--//promo-->
            <section class="news">
                <h1 class="section-heading text-highlight"><span class="line">Noticias y Circulares</span></h1>     
                <div class="carousel-controls">
                    <a class="prev" href="#news-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
                    <a class="next" href="#news-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
                </div><!--//carousel-controls--> 
                <div class="section-content clearfix">
                    <div id="news-carousel" class="news-carousel carousel slide">
                        <div class="carousel-inner">
							<?php $contador=1;?>
							<div class="item active">
							<?php query_posts('post_type=noticias&posts_per_page=6'); ?>
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<div class="col-md-4 news-item">
                                    <h2 class="title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title()?></a></h2>
									<?php							
										if ( has_post_thumbnail() ) {
											$default_attr = array(
												'class' => "thumb",
												'alt'   => get_the_title()
											);
											the_post_thumbnail( array(100,100),$default_attr );						
										}						
									?>	
                                    <p><?php echo substr(get_the_excerpt(), 0,100); ?></p>
                                    <a class="read-more" href="<?php echo get_permalink(); ?>">Leer Mas<i class="fa fa-chevron-right"></i></a>                
                                </div><!--//news-item-->
							<?php
								if($contador==3){
									echo '</div><!--//item--><div class="item">';
								}
								$contador++;
							?>
							<?php endwhile; else:  ?>
								<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
							<?php endif; ?>
							</div>
                        </div><!--//carousel-inner-->
                    </div><!--//news-carousel-->  
                </div><!--//section-content-->     
            </section><!--//news-->
            <div class="row cols-wrapper">
                <div class="col-md-3">
					<section class="events">
                        <h1 class="section-heading text-highlight"><span class="line">Eventos</span></h1>
                        <div class="section-content">
					<?php 
						$today = date('Ymd');
						$posts = get_posts(array(
							'post_type' => 'eventos',
							'meta_query' => array(
								array(
									'key'		=> 'fecha',
									'value'		=> $today,
									'compare'	=> '>='
									
								)
							),
							'posts_per_page'=> 4,
							'orderby' => 'meta_value_num',
							'order' => 'ASC'
						));

						if( $posts )
						{
							foreach( $posts as $post )
							{
								setup_postdata( $post ); 
								$get_month_format = "M";
								$get_day_format = "d";
								$unixtimestamp = strtotime(get_field('fecha'));
					?>		
								<div class="event-item">
                                <p class="date-label">
                                    <span class="month"><?php echo date_i18n($get_month_format, $unixtimestamp);?></span>
                                    <span class="date-number"><?php echo date_i18n($get_day_format, $unixtimestamp); ?></span>
                                </p>
                                <div class="details">
                                    <h2 class="title"><?php echo get_the_title(); ?></h2>
                                    <p class="time"><i class="fa fa-clock-o"></i><?php echo get_field('hora');?></p>
                                    <p class="location"><i class="fa fa-map-marker"></i><?php echo get_field('lugar') ?></p>                            
                                </div><!--//details-->
                            </div><!--event-item--> 
							
			<?php				
							}
						}
						wp_reset_postdata();
					
					?>                            
							<a class="read-more" href="<?php echo get_site_url(); ?>/eventos">Todos los eventos<i class="fa fa-chevron-right"></i></a>
                        </div><!--//section-content-->
                    </section><!--//events-->
                    
                </div><!--//col-md-3-->
                <div class="col-md-6">
                    <section class="video">
                        <h1 class="section-heading text-highlight"><span class="line">Galer&iacute;as</span></h1>
                        <div class="carousel-controls">
                            <a class="prev" href="#videos-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
                            <a class="next" href="#videos-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
                        </div><!--//carousel-controls-->
                        <div class="section-content">    
                           <div id="videos-carousel" class="videos-carousel carousel slide">
								<div class="carousel-inner">
								<?php $contadorEntradas=0; ?>
								<?php query_posts('post_type=galeria'); ?>
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                    <div class="item <?php if($contadorEntradas==0){ echo 'active';} ?>">            
                                        <?php if ( has_post_thumbnail() ) {
											$default_attr = array(
												'class' => "video-iframe",
												'alt'   => get_the_title()
											);
											the_post_thumbnail('full',$default_attr );						
										}?>
										<p class="description"><?php echo substr(get_the_excerpt(), 0,250);?> <a href="<?php echo get_permalink(); ?>" rel="ver galeria">Ver Mas</a></p>
                                    </div><!--//item-->
							<?php
								$contadorEntradas++;
							?>
							<?php endwhile; else:  ?>
								<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
							<?php endif; ?>
                                </div><!--//carousel-inner-->
                           </div><!--//videos-carousel-->                            
                           
                        </div><!--//section-content-->
                    </section><!--//video-->
                </div>
                <div class="col-md-3">
					<section class="links">
                        <h1 class="section-heading text-highlight"><span class="line">Descargas</span></h1>
                        <div class="section-content">
							<p><a href="<?php echo get_option('solicitud');?>" target="_blank"><i class="fa fa-caret-right"></i>Solicitud de Inscripci&oacute;n</a></p>
							<p><a href="<?php echo get_option('requisitos');?>" target="_blank"><i class="fa fa-caret-right"></i>Requisitos para inscripci&oacute;n</a></p>
							<p><a href="<?php echo get_option('formulario');?>" target="_blank"><i class="fa fa-caret-right"></i>Formulario de Referencia</a></p>
						</div><!--//section-content-->
                    </section><!--//links-->
					<section class="testimonials">
							<h1 class="section-heading text-highlight"><span class="line"> Testimonios</span></h1>
							<div class="carousel-controls">
								<a class="prev" href="#testimonials-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
								<a class="next" href="#testimonials-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
							</div><!--//carousel-controls-->
							<div class="section-content">
								<div id="testimonials-carousel" class="testimonials-carousel carousel slide">
									<div class="carousel-inner">
					<?php
							$control_activo = 0;
							query_posts('post_type=testimonio');
							if ( have_posts() ) : while ( have_posts() ) : the_post(); 
								if ( has_post_thumbnail() ) {
									$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );					
								}
								echo '
										<div class="item'; 
								if(	$control_activo == 0){
									echo	' active';
									$control_activo++;
								}		
								echo		'">
											<blockquote class="quote">                                  
												<p><i class="fa fa-quote-left"></i>'.substr(get_the_excerpt(), 0,250).'</p>
											</blockquote>                
											<div class="row">
												<p class="people col-md-8 col-sm-3 col-xs-8"><span class="name">'.get_the_title().'</span><br /><span class="title">'.get_field('rol').'</span></p>';
												if($url) echo '<img class="profile col-md-4 pull-right" src="'.$url.'"  alt="'.get_the_title().'" />';
											echo '</div>                               
										</div><!--//item-->';
								
							endwhile; else:
								_e('Sorry, no posts matched your criteria.'); 
							endif;
							wp_reset_postdata();
					?>
								</div><!--//carousel-inner-->
								</div><!--//testimonials-carousel-->
							</div><!--//section-content-->
						</section><!--//testimonials-->
                </div><!--//col-md-3-->
            </div><!--//cols-wrapper-->
        </div><!--//content-->
    </div><!--//wrapper-->
    
	<?php get_footer(); ?>