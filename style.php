<?php
header("Content-type: text/css; charset: UTF-8");
?>

/* FRONT HEADER */

#site-head {
	height: <?php echo get_option( 'scrollato-header-height' ); ?>;

	color: <?php echo get_option( 'scrollato-header-text-color' ); ?>;

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

/* FRONT BLOCKS */

.front-block:not(.odd) {
	background: <?php echo get_option( 'scrollato-block-even-bgcolor' ); ?>;
	color: <?php echo get_option( 'scrollato-block-even-color' ); ?>;
}

.front-block.odd {
	background: <?php echo get_option( 'scrollato-block-odd-bgcolor' ); ?>;
	color: <?php echo get_option( 'scrollato-block-odd-color' ); ?>;
}

.front-block:not(.odd) .next-block {
	border-top-color: <?php echo get_option( 'scrollato-block-even-bgcolor' ); ?>;
}

.front-block.odd .next-block {
	border-top-color: <?php echo get_option( 'scrollato-block-odd-bgcolor' ); ?>;
}

.front-block:not(.odd) .block a:link,
.front-block:not(.odd) .block a:visited {
	color: <?php echo get_option( 'scrollato-block-even-a-color' ); ?>
}

.front-block:not(.odd) .block a:hover {
	color: <?php echo get_option( 'scrollato-block-odd-a-hover-color' ); ?>
}

.front-block.odd .block a:link,
.front-block.odd .block a:visited {
	color: <?php echo get_option( 'scrollato-block-even-a-color' ); ?>
}

.front-block.odd .block a:hover {
	color: <?php echo get_option( 'scrollato-block-odd-a-hover-color' ); ?>
}

/* FRONT NAV */

#front-nav a:link,
#front-nav a:visited {
	color: <?php echo get_option( 'scrollato-nav-a-color' ); ?>;
}

#front-nav a:hover {
	color: <?php echo get_option( 'scrollato-nav-a-hover-color' ); ?>;
}