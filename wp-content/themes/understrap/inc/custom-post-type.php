<?php
add_action( 'init', 'pits_post_type_register' );
add_action( 'init', 'landscaping_post_type_register' );
/**
 * Register a hostings post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function pits_post_type_register() {
	$labels = array(
		'name'               => _x( 'Pits', 'post type general name', 'understrap' ),
		'singular_name'      => _x( 'Pit', 'post type singular name', 'understrap' ),
		'menu_name'          => _x( 'Pits', 'admin menu', 'understrap' ),
		'name_admin_bar'     => _x( 'Pits', 'add new on admin bar', 'understrap' ),
		'add_new'            => _x( 'Add new Pit', 'pit', 'understrap' ),
		'add_new_item'       => __( 'Add new Pit', 'understrap' ),
		'new_item'           => __( 'New Pit', 'understrap' ),
		'edit_item'          => __( 'Edit Pit', 'understrap' ),
		'view_item'          => __( 'View Pit', 'understrap' ),
		'all_items'          => __( 'All Pits', 'understrap' ),
		'search_items'       => __( 'Search Pits', 'understrap' ),
		'parent_item_colon'  => __( 'Parent Pits:', 'understrap' ),
		'not_found'          => __( 'No Pits found', 'understrap' ),
		'not_found_in_trash' => __( 'No Pits found in Trash', 'understrap' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Here you can see a list of pits', 'understrap' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'pits' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'page-attributes', 'editor', 'thumbnail', 'custom-fields', 'comments', 'revisions')
	);

	register_post_type( 'pits', $args );
}


function landscaping_post_type_register() {
	$labels = array(
		'name'               => _x( 'Landscaping', 'post type general name', 'understrap' ),
		'singular_name'      => _x( 'Landscaping', 'post type singular name', 'understrap' ),
		'menu_name'          => _x( 'Landscaping', 'admin menu', 'understrap' ),
		'name_admin_bar'     => _x( 'Landscaping', 'add new on admin bar', 'understrap' ),
		'add_new'            => _x( 'Add new Landscaping item', 'pit', 'understrap' ),
		'add_new_item'       => __( 'Add new Landscaping item', 'understrap' ),
		'new_item'           => __( 'New Landscaping item', 'understrap' ),
		'edit_item'          => __( 'Edit Landscaping item', 'understrap' ),
		'view_item'          => __( 'View Landscaping item', 'understrap' ),
		'all_items'          => __( 'All Landscaping items', 'understrap' ),
		'search_items'       => __( 'Search Landscaping item', 'understrap' ),
		'parent_item_colon'  => __( 'Parent Landscaping item:', 'understrap' ),
		'not_found'          => __( 'No Landscaping item found', 'understrap' ),
		'not_found_in_trash' => __( 'No Landscaping item found in Trash', 'understrap' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Here you can see a list of Landscaping items', 'understrap' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'landscaping' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'page-attributes', 'editor', 'thumbnail', 'custom-fields', 'comments', 'revisions')
	);

	register_post_type( 'landscaping', $args );
}