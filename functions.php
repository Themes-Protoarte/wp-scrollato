<?php

#############################################
# Add Theme Support to Additional Functions #
#############################################

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );

#############################
# Add Blocks for Front-page #
#############################

define( 'ACF_LITE', true );
include_once( 'acf/acf.php' );
require_once( 'lib/acf.inc.php' );

require_once( 'lib/admin.functions.php' );


###########
# Options #
###########

$opt_list = array(
	'favicon' => get_template_directory_uri() . '/favicon.ico',
	'header-display' => '1',
	'header-height' => '800px',
	'header-background-type' => 'image',
	'header-background-color' => '#000000',
	'header-background-image' => get_bloginfo('wpurl') . '/wp-content/themes/Scrollato1/imgs/Red_geranium_by_qerubin.jpg',
	'header-text-maxwidth' => '700px',
	'header-text-color' => '#ffffff',
	'header-extra-content' => '',
	'header-skrollr-start' => 'opacity: 1; background-position: 0px -160px;',
	'header-skrollr-end' => 'opacity: 0.5; background-position: 0px -210px;',
	'block-even-bgcolor' => '#aa1e14',
	'block-odd-bgcolor' => '#ededed',
	'block-even-color' => '#ffffff',
	'block-odd-color' => '#443535',
	'block-even-a-color' => '#ededed',
	'block-odd-a-color' => '#656565',
	'block-even-a-hover-color' => '#630303',
	'block-odd-a-hover-color' => '#443535',
	'nav-bgcolor' => '#ededed',
	'nav-box-shadow' => '1px 1px 2px #323232',
	'nav-a-color' => '#121212',
	'nav-a-hover-color' => '#aa1e14',
	'footer-content' => '<a href="http://filopoe.it/themes/Scrollato/">Scrollato</a> theme by <a href="http://filopoe.it/chi-sono/">Gabriele Girelli</a>',
	'extra-css' => ''
);
foreach ( $opt_list as $opt => $val ) {

	if ( get_option( 'scrollato-' . $opt, 0 ) === 0 ) {
		add_option( 'scrollato-' . $opt, esc_sql( $val ) );
	}

}


#####################
# Use Media Library #
#####################

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


####################
# PHP Style/Script #
####################

wp_enqueue_style('dynamic-css', admin_url('admin-ajax.php') . '?action=dynamic_css', $deps, $ver, $media);
function dynamic_css() {
  require( get_template_directory() . '/style.php' );
  exit;
}
add_action('wp_ajax_dynamic_css', 'dynamic_css');
add_action('wp_ajax_nopriv_dynamic_css', 'dynamic_css');

function scrollato_dynamic_js() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-latest.min.js", false, null);
	wp_enqueue_script('jquery');

    wp_register_script( 'dynamic-js', get_template_directory_uri() . "/js/front-page.js.php" );
    wp_register_script( 'skrollr', get_template_directory_uri() . "/js/skrollr.js" );
    wp_register_script( 'scrollto', get_template_directory_uri() . "/js/scrollto.min.js" );
    wp_enqueue_script( 'dynamic-js' );
    wp_enqueue_script( 'skrollr' );
    wp_enqueue_script( 'scrollto' );
}
add_action('wp_enqueue_scripts', 'scrollato_dynamic_js');


if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {

}

?>
