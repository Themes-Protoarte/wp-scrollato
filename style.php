<?php
header("Content-type: text/css; charset: UTF-8");
?>

/* FRONT HEADER */

#site-head {
	height: <?php echo get_option( 'scrollato-header-height', 0 ); ?>;

	<?php
	switch ( get_option( 'scrollato-header-background-type' ) ) {
		case 'color': {
	?>background-color: <?php echo get_option( 'scrollato-header-background-color' ); ?>;<?php
			break;
		}
		case 'image': {
	?>background-image: url('<?php echo get_option( 'scrollato-header-background-image' ); ?>');
	background-attachment: scroll;
	background-position: center center;
	background-size: cover;
	<?php
			break;
		}
	}
	?>
}

#site-head-content {
	max-width: <?php echo get_option( 'scrollato-header-text-maxwidth', 0 ); ?>;
}
