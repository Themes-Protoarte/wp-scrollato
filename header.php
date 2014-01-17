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
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	    <script type="text/javascript">
		    $(document).ready(function() {
		    	var s = skrollr.init({
		    		smoothScrolling: true,
		    		smoothScrollingDuration: 300,
		    		forceHeight: false,
		    		mobileDeceleration: 0.004
		    	});
		    });
	    </script>
	</head>
	<body <?php body_class(); ?>>