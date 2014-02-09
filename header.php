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
		<link rel="shortcut icon" href="<?php echo get_option( 'scrollato-favicon' ); ?>" />
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" type="text/css" media="screen" />
	</head>
	<body id="skrollr-body" <?php body_class(); ?>>
		<a href="<?php echo wp_login_url(); ?>" id="meta-access"></a>