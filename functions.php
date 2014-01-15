<?php

#Add Theme Support to Additional Functions
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );

$defaults = array(
	'default-color' => 'f0f0f0',
	'default-image'          => '',
);
add_theme_support( 'custom-background', $defaults );

$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '000000',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );


#Add Blocks for Front-page
function codex_custom_init() {
	$labels = array(
		'name'               => __( 'Blocks', 'scrollato' ),
		'singular_name'      => __( 'Block', 'scrollato' ),
		'add_new'            => __( 'Add New', 'scrollato' ),
		'add_new_item'       => __( 'Add New Block', 'scrollato' ),
		'edit_item'          => __( 'Edit Block', 'scrollato' ),
		'new_item'           => __( 'New Block', 'scrollato' ),
		'all_items'          => __( 'All Blocks', 'scrollato' ),
		'view_item'          => __( 'View Block', 'scrollato' ),
		'search_items'       => __( 'Search Blocks', 'scrollato' ),
		'not_found'          => __( 'No blocks found', 'scrollato' ),
		'not_found_in_trash' => __( 'No blocks found in Trash', 'scrollato' ),
		'parent_item_colon'  => '',
		'menu_name'          => __( 'Blocks', 'scrollato' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'block' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
	);

	register_post_type( 'book', $args );
}
add_action( 'init', 'codex_custom_init' );


#Rearrange Adming Menu
function remove_menus() {
	remove_menu_page( 'edit.php' );
	remove_menu_page( 'upload.php' );
	remove_menu_page( 'edit.php?post_type=book' );

	add_menu_page( __( 'Media', 'scrollato' ), __( 'Media', 'scrollato' ), 'manage_options', 'upload.php', '', '', 21 );
	add_menu_page( __( 'Blocks', 'scrollato' ), __( 'Blocks', 'scrollato' ), 'manage_options', 'edit.php?post_type=book', '', 'dashicons-screenoptions', 19 );
}
add_action( 'admin_menu', 'remove_menus' );


?>
