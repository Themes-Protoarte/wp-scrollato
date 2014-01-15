<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php
			#Get title
			$title = wp_title( '', false );
			if ( $title == '' ) {
				$title = get_bloginfo( 'name' );
			}
			echo $title;
		?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/skrollr.js"></script>
	    <script type="text/javascript">
	    $(document).ready(function() {
	    	var s = skrollr.init();
	    });
	    </script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>