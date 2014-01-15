<?php

# Add Theme Support to Additional Functions
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );


# Add Blocks for Front-page
function scrollato_reg_blocks() {
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
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
	);

	register_post_type( 'block', $args );
}
add_action( 'init', 'scrollato_reg_blocks' );



# Rearrange Admin Menu
function scrollato_admin_menu() {
	remove_menu_page( 'edit.php' );
	remove_menu_page( 'upload.php' );
	remove_menu_page( 'edit.php?post_type=block' );

	add_menu_page( __( 'Media', 'scrollato' ), __( 'Media', 'scrollato' ), 'manage_options', 'upload.php', '', '', 21 );
	add_menu_page( __( 'Blocks', 'scrollato' ), __( 'Blocks', 'scrollato' ), 'manage_options', 'edit.php?post_type=block', '', 'dashicons-screenoptions', 19 );
	add_submenu_page( 'themes.php', __( 'Theme Options', '' ), __( 'Theme Option', '' ), 'manage_options', 'theme_opt', 'scrollato_opt_page' );
	add_submenu_page( 'edit.php?post_type=block', __( 'Order&Style', '' ), __( 'Order&Style', '' ), 'manage_options', 'themes_opt', 'scrollato_order_page' );
}
add_action( 'admin_menu', 'scrollato_admin_menu' );
function scrollato_opt_page() {
	include( 'admin/options.page.php' );
}
function scrollato_order_page() {
	include( 'admin/order.page.php' );
}



# Options
$opt_list = array(
	'header-height' => '800px',
	'header-background-type' => 'image',
	'header-background-color' => '#000000',
	'header-background-image' => '',
	'header-text-maxwidth' => '700px',
	'header-extra-content' => '',
	'footer-content' => '<a href="http://filopoe.it/Scrollato/">Scrollato</a> theme by <a href="http://filopoe.it/">Gabriele Girelli</a>',
	'extra-css' => ''
);
foreach ( $opt_list as $opt => $val ) {

	if ( get_option( 'scrollato-' . $opt, 0 ) === 0 ) {
		add_option( 'scrollato-' . $opt, esc_sql( $val ) );
	}

}



# Use Media Library
function scrollato_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery');
}
function scrollato_admin_styles() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'scrollato_admin_scripts');
add_action('admin_print_styles', 'scrollato_admin_styles');

?>
