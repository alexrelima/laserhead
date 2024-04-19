<?php 
// Register Custom Post Type
function custom_post_type_banners() {

	$labels = array(
		'name'                => _x( 'Banners', 'Post Type General Name', 'banners' ),
		'singular_name'       => _x( 'Banner', 'Post Type Singular Name', 'banners' ),
		'menu_name'           => __( 'Banners', 'banners' ),
		'parent_item_colon'   => __( 'Banners', 'banners' ),
		'all_items'           => __( 'Todos os Banners', 'banners' ),
		'view_item'           => __( 'Ver Banner', 'banners' ),
		'add_new_item'        => __( 'Adicionar Banner', 'banners' ),
		'add_new'             => __( 'Adicionar Banner', 'banners' ),
		'edit_item'           => __( 'Editar Banner', 'banners' ),
		'update_item'         => __( 'Atualizar Banner', 'banners' ),
		'search_items'        => __( 'Procurar Banner', 'banners' ),
		'not_found'           => __( 'Banner não existe', 'banners' ),
		'not_found_in_trash'  => __( 'Não existe Banners na lixeira', 'banners' ),
	);
	$args = array(
		'label'               => __( 'banners', 'banners' ),
		'description'         => __( 'Banners', 'banners' ),
		'labels'              => $labels,
		'supports'            => array( 'title', ),
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
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite' => array('with_front' => false, 'slug' => 'banners'),
		'capability_type'    => 'page',

	);
	register_post_type( 'banners', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_banners', 0 );
?>