<?php   

	
	register_nav_menus( array(
		'menu_principal'   => __( 'Menu Principal', 'ayudard' )
	) );
	
	if ( function_exists( 'add_theme_support' ) ) {
            add_theme_support( 'post-thumbnails' );
            set_post_thumbnail_size( 140, 140,false);
        }

	###### Including php file ################
	include_once('plugins/advanced-custom-fields/acf.php');
    include 'plugins/informaciones/informaciones_generales.php';
    #####  End Including php file ############
	
	/* Agregando subtitulo a la pagina contactos */
		

?>