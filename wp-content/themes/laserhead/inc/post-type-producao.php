<?php 
// Register Custom Post Type
function custom_post_type_producao() {

	$labels = array(
		'name'                => _x( 'Em produção', 'Post Type General Name', 'producao' ),
		'singular_name'       => _x( 'Produção', 'Post Type Singular Name', 'producao' ),
		'menu_name'           => __( 'Em produção', 'producao' ),
		'parent_item_colon'   => __( 'Em produção', 'producao' ),
		'all_items'           => __( 'Todos em produção', 'producao' ),
		'view_item'           => __( 'Ver produção', 'producao' ),
		'add_new_item'        => __( 'Adicionar produção', 'producao' ),
		'add_new'             => __( 'Adicionar produção', 'producao' ),
		'edit_item'           => __( 'Editar produção', 'producao' ),
		'update_item'         => __( 'Atualizar produção', 'producao' ),
		'search_items'        => __( 'Procurar produção', 'producao' ),
		'not_found'           => __( 'Produção não existe', 'producao' ),
		'not_found_in_trash'  => __( 'Não existe produção na lixeira', 'producao' ),
	);
	
	$args = array(
		'label'               => __( 'producao', 'producao' ),
		'description'         => __( 'Em Produção', 'producao' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-hammer',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite' => array('with_front' => false, 'slug' => 'producao'),
		'capability_type'    => 'page',

	);
	register_post_type( 'producao', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_producao', 0 );
?>