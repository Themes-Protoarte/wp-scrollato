<?php

########################
# Rearrange Admin Menu #
########################

function scrollato_admin_menu() {
	remove_menu_page( 'edit.php' );
	remove_menu_page( 'upload.php' );
	remove_menu_page( 'edit.php?post_type=block' );

	add_menu_page( __( 'Media', 'scrollato' ), __( 'Media', 'scrollato' ), 'read', 'upload.php', '', '', 21 );
	add_menu_page( __( 'Blocks', 'scrollato' ), __( 'Blocks', 'scrollato' ), 'edit_posts', 'edit.php?post_type=block', '', 'dashicons-screenoptions', 19 );
	add_submenu_page( 'themes.php', __( 'Theme Options', '' ), __( 'Theme Option', '' ), 'manage_options', 'theme_opt', 'scrollato_opt_page' );
}
add_action( 'admin_menu', 'scrollato_admin_menu' );
function scrollato_opt_page() {
	include( dirname(dirname(__FILE__)) . '/admin/options.page.php' );
}


##########
# BLOCKS #
##########

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


###################
# BLOCK DASHBOARD #
###################

function scrollato_edit_block_columns($columns) {
	print_r($columns);
	$columns2 = array();
	$columns2['cb'] = $columns['cb'];
	$columns2['position'] = __( '#', 'scrollato' );
	$columns2['title'] = $columns['title'];
    $columns2['skrollr-start'] = __( 'Skrollr start', 'scrollato' );
    $columns2['skrollr-end'] = __( 'Skrollr end', 'scrollato' );
    $columns2['author'] = $columns['author'];
    $columns2['date'] = $columns['date'];
   
    return $columns2;
}
add_filter( 'manage_edit-block_columns', 'scrollato_edit_block_columns' );

function scrollato_block_column( $column, $post_id ) {
    switch ( $column ) {

        case 'skrollr-start':
            the_field( 'data-start', $post_id );
            break;

        case 'skrollr-end':
            the_field( 'data-end', $post_id );
            break;

        case 'position':
            the_field( 'position', $post_id );
            break;

    }
}
add_action( 'manage_block_posts_custom_column' , 'scrollato_block_column', 10, 2 );

// Set 'position' column as sortable
function scrollato_block_sortable_columns( $columns ) {
	$columns['position'] = 'position';

	return $columns;
}
add_filter( 'manage_edit-block_sortable_columns', 'scrollato_block_sortable_columns' );

// Set default sorted table and allow sorting of 'position' column
function scrollato_edit_block_load() {
	add_filter( 'request', 'scrollato_sort_blocks' );
}
function scrollato_sort_blocks( $vars ) {
	if ( isset( $vars['post_type'] ) && 'block' == $vars['post_type'] ) {

		if ( isset( $vars['orderby'] ) && 'position' == $vars['orderby'] ) {
			// Order position if asked
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => 'position',
					'orderby' => 'meta_value_num'
				)
			);

		} elseif ( !isset( $vars['orderby'] ) ) {
			// Basic ascendent position order
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => 'position',
					'orderby' => 'meta_value'
				)
			);

		}
	}

	return $vars;
}
add_action( 'load-edit.php', 'scrollato_edit_block_load' );


##############
# QUICK EDIT #
##############

// Customize quick edit
function display_custom_quickedit_block( $column_name, $post_type ) {
	static $printNonce = TRUE;
	if ( $printNonce ) {
		$printNonce = FALSE;
		wp_nonce_field( plugin_basename( __FILE__ ), 'block_edit_nonce' );
	}

	switch ( $column_name ) {
		case 'position':
			?>
	<fieldset class="inline-edit-col-right">
		<div class="inline-edit-col">
			<label>
				<span class="title"><?php _e( 'Position', 'scrollato' ); ?></span><span class="input-text-wrap"><input type="text" name="position" /></span>
			</label><?php
			break;
		case 'skrollr-start':
			?><label>
				<span class="title"><?php _e( 'S.start', 'scrollato' ); ?></span><span class="input-text-wrap"><input type="text" name="skrollr-start" /></span>
			</label><?php
			break;
		case 'skrollr-end':
			?><label>
				<span class="title"><?php _e( 'S.end', 'scrollato' ); ?></span><span class="input-text-wrap"><input type="text" name="skrollr-end" /></span>
			</label>
		</div>
	</fieldset><?php
			break;
	}
}
add_action( 'quick_edit_custom_box', 'display_custom_quickedit_block', 10, 2 );

// Load existing data
function scrollato_edit_block_foot() {
    $slug = 'block';
    # load only when editing a book
    if (   (isset($_GET['page']) && $_GET['page'] == $slug)
        || (isset($_GET['post_type']) && $_GET['post_type'] == $slug))
    {
        echo '<script type="text/javascript" src="', get_template_directory_uri() . '/js/admin_edit.js', '"></script>';
    }
}
add_action('admin_footer-edit.php', 'scrollato_edit_block_foot', 11);

// Save data
function scrollato_save_block_meta( $post_id ) {
    $slug = 'block';
    if ( $slug !== $_POST['post_type'] ) {
        return;
    }
    if ( !current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    $_POST += array("{$slug}_edit_nonce" => '');
    if ( !wp_verify_nonce( $_POST["{$slug}_edit_nonce"],
                           plugin_basename( __FILE__ ) ) )
    {
        return;
    }

    if ( isset( $_REQUEST['position'] ) ) {
        update_post_meta( $post_id, 'position', $_REQUEST['position'] );
    }
    if ( isset( $_REQUEST['skrollr-start'] ) ) {
        update_post_meta( $post_id, 'data-start', $_REQUEST['skrollr-start'] );
    }
    if ( isset( $_REQUEST['skrollr-end'] ) ) {
        update_post_meta( $post_id, 'data-end', $_REQUEST['skrollr-end'] );
    }

}
add_action( 'save_post', 'scrollato_save_block_meta' );


###########
# ENQUEUE #
###########

function scrollato_admin_enqueue()
{
    wp_register_style( 'scrollato_admin_style', get_template_directory_uri() . '/css/block_edit.css', null, null, 'all' );
    wp_enqueue_style( 'scrollato_admin_style' );

    // Color picker
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'scrollato-color-picker-handle', get_template_directory_uri() . '/js/color-picker.js', array( 'wp-color-picker' ), false, true );
}
add_action( 'admin_enqueue_scripts', 'scrollato_admin_enqueue' );

?>
