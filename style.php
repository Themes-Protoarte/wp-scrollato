<?php
header("Content-type: text/css; charset: UTF-8");
?>

/* FRONT HEADER */

#site-head {
	<?php if ( '0' == get_option( 'scrollato-header-display' ) ) { echo 'display: none;'; } ?>
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
    -webkit-background-size: 2000px auto;
    -moz-background-size: 2000px auto;
    -o-background-size: 2000px auto;
    background-size: 2000px auto;
	<?php
			break;
		}
	}
	?>
}

#site-head-content {
	max-width: <?php echo get_option( 'scrollato-header-text-maxwidth', 0 ); ?>;
}

/* FRONT BLOCKS & PAGE */

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
	color: <?php echo get_option( 'scrollato-block-even-a-hover-color' ); ?>
}

.single-page-post.block a:link,
.single-page-post.block a:visited,
.front-block.odd .block a:link,
.front-block.odd .block a:visited {
	color: <?php echo get_option( 'scrollato-block-odd-a-color' ); ?>
}

.single-page-post.block a:hover,
.front-block.odd .block a:hover {
	color: <?php echo get_option( 'scrollato-block-odd-a-hover-color' ); ?>
}

/* FRONT NAV */

#front-nav {
	background-color: <?php echo get_option( 'scrollato-nav-bgcolor' ); ?>;
	box-shadow: <?php echo get_option( 'scrollato-nav-box-shadow' ); ?>;
}

#front-nav a:link,
#front-nav a:visited {
	color: <?php echo get_option( 'scrollato-nav-a-color' ); ?>;
}

#front-nav a:hover {
	color: <?php echo get_option( 'scrollato-nav-a-hover-color' ); ?>;
}

/* EXTRA CSS */

<?php echo get_option( 'scrollato-extra-css' ); ?>