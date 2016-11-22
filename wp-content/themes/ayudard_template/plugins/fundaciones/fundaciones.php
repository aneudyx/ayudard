<?php
	add_action('init', 'fundaciones_init');
        function fundaciones_init() {
            $labels = array(
                            'name' => _x('Centros De Acopio', 'post type general name'),
                            'singular_name' => _x('Centro De Acopio', 'post type singular name'),
                            'add_new' => _x('Agregar Centro De Acopio', ''),
                            'add_new_item' => __('Agregar Nuevo Centros De Acopio'),
                            'edit_item' => __('Editar Centro De Acopio'),
                            'new_item' => __('Nuevo Centro De Acopio'),
                            'view_item' => __('Ver Centro De Acopio'),
                            'search_items' => __('Buscar '),
                            'not_found' => __('Centros De Acopio no econtrado'),
                            'not_found_in_trash' => __('No se encontraron centros de acopio'),
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
						'taxonomies'  => array( 'municipios', 'category' ),
                        'supports' => array('title','editor','thumbnail')
                    );
            register_post_type('fundaciones',$args);
        }
	
	if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_informacion-fundacion',
		'title' => 'Informacion Fundacion',
		'fields' => array (
			array (
				'key' => 'field_58307e4e567de',
				'label' => 'Direccion',
				'name' => 'direccion',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_58307e571cde4',
				'label' => 'Telefonos',
				'name' => 'telefonos',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_58307e641cde5',
				'label' => 'Email',
				'name' => 'email',
				'type' => 'email',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'fundaciones',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}



?>