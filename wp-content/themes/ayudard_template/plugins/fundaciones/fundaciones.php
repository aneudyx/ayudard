<?php
	add_action('init', 'fundaciones_init');
        function fundaciones_init() {
            $labels = array(
                            'name' => _x('Fundaciones', 'post type general name'),
                            'singular_name' => _x('Fundacion', 'post type singular name'),
                            'add_new' => _x('Agregar Fundacion', ''),
                            'add_new_item' => __('Agregar Nueva Fundacion'),
                            'edit_item' => __('Editar Fundacion'),
                            'new_item' => __('Nuevo Fundacion'),
                            'view_item' => __('Ver Fundacion'),
                            'search_items' => __('Buscar '),
                            'not_found' => __('Fundacion no econtrada'),
                            'not_found_in_trash' => __('No se encontraron fundaciones'),
                        );
            $args = array(
                        'labels' => $labels,
                        'public' => true,
                        'publicly_queryable' => true,
                        'query_var' => true,
                        'rewrite' => array('slug' => 'fundaciones'),
                        'capability_type' => 'post',
						'has_archive' => true,
                        'hierarchical' => false,
                        'menu_position' => null,
                        'supports' => array('title','editor','thumbnail','author')
                    );
            register_post_type('fundaciones',$args);
        }
	
	/*if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_equipo',
		'title' => 'Equipo',
		'fields' => array (
			array (
				'key' => 'field_55dfbd5ea0341',
				'label' => 'Rol',
				'name' => 'rol',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'equipo',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}*/


?>