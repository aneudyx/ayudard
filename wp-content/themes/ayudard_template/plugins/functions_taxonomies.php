<?php
	/*add_action('admin_menu', 'remove_tag_categories');
	function remove_tag_categories(){
		remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
		remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
	}*/
	
	function municipio_init() {
		
		$labels = array(
			'name'              => _x( 'Municipio', 'taxonomy para Municipio' ),
			'singular_name'     => _x( 'Municipio', 'taxonomy para Municipio' ),
			'search_items'      => __( 'Buscar Municipio' ),
			'all_items'         => __( 'Todos las municipios' ),
			'parent_item'       => __( 'Parent Municipio' ),
			'parent_item_colon' => __( 'Parent Municipio:' ),
			'edit_item'         => __( 'Editar Municipio' ),
			'update_item'       => __( 'Actualizar Municipio' ),
			'add_new_item'      => __( 'Agregar Nueva Municipio' ),
			'new_item_name'     => __( 'Nuevo Nombre de Municipio' ),
			'menu_name'         => __( 'Municipio' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'municipios' ),
		);
		register_taxonomy( 'municipios', array('post', 'fundaciones', 'centros'), $args );
		
	}
	add_action( 'init', 'municipio_init' );
?>