<?php   	
	register_nav_menus( array(
		'menu_principal'   => __( 'Menu Principal', 'ayudard' )
	) );
	
	if ( function_exists('register_sidebar') ){
        register_sidebar(
			array(
				'name'=>'Main Sidebar',
				'id'=>'main_sidebar',
				'before_widget' => '',
				'after_widget' => '<hr>',
				'before_title' => '<h4 class="header_widget">',
				'after_title' => '</h4>',
			)
		);
    }
	
	if ( function_exists( 'add_theme_support' ) ) {
            add_theme_support( 'post-thumbnails' );
            set_post_thumbnail_size( 140, 140,false);
        }

	add_filter('nav_menu_css_class' , 'agrega_clases' , 10 , 2);
	function agrega_clases($classes, $item){
		 if(is_home() && $item->title == "inicio"){
			$classes[] = "active nav-item";
		 }elseif(in_array('current-menu-item', $classes)){
			 $classes[] = "active nav-item";
		 }
		 else{
			$classes[] = "nav-item";
		 }
		 return $classes;
	}
	
	function set_per_page( $query ) {
		global $wp_the_query;
		if($query->is_post_type_archive()&&($query === $wp_the_query)){
		$query->set( 'posts_per_page', 2);
		}
	  return $query;
	}
	
	function new_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	###### Including php file ################
	include_once('plugins/advanced-custom-fields/acf.php');
    //include 'plugins/informaciones/informaciones_generales.php';
    include 'plugins/centros/centro.php';
    include 'plugins/fundaciones/fundaciones.php';
    include 'plugins/functions_taxonomies.php';
    #####  End Including php file ############
	
		

?>