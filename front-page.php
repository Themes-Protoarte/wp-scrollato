<?php get_header(); ?>

		<header id="site-head" data-0-top-top="<?php echo get_option( 'scrollato-header-skrollr-start' ); ?>" data-top-bottom="<?php echo get_option( 'scrollato-header-skrollr-end' ); ?>">
			<div class="vertical">
				<div id="site-head-content">
					<h1 id="site-name"><?php bloginfo( 'name' ); ?></h1>
					<h3 id="site-tagline"><?php bloginfo( 'description' ); ?></h3>
					<div class="extra"><?php echo stripslashes( get_option( 'scrollato-header-extra-content' ) ); ?></div>
				</div>
			</div>
		</header>

		<main>
			<?php
			# Post Query
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$query = new WP_Query( array(
				'post_type' => 'block',
				'meta_key' => 'position',
				'orderby' => 'meta_value_num',
				'order' => 'ASC'
			));

			#Counter and nav items
			$k = 1;
			$navlist = "";

			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

				if ( ( $query->current_post + 1 ) == $query->post_count ) {
			?>
			<div id="front-block-<?php the_ID(); ?>" class="front-block<?php if ( $k % 2 == 0 ) { echo " odd"; } ?>">
				<article id="block-<?php echo $k; ?>" class="block">
					<?php the_content(); ?>
				</article>
				<div class="next-block"></div>
			</div>
			<?php

				} else {

			?>
			<div id="front-block-<?php the_ID(); ?>" class="front-block<?php if ( $k % 2 == 0 ) { echo " odd"; } ?>" data-300-top="<?php the_field( 'data-start' ); ?>" data-300-top-bottom="<?php the_field( 'data-end' ); ?>">
				<article id="block-<?php echo $k; ?>" class="block">
					<?php the_content(); ?>
				</article>
				<div class="next-block"></div>
			</div>
			<?php

				}

				$navlist .= "<a href='#' class='nav-list' data-ind='$k'>" . get_the_title() . "</a>\n";
				$k++;

			endwhile;  else:  endif; ?>
			
			<div id="front-nav" data-0="opacity: 0;" data-<?php echo ((int) get_option( 'scrollato-header-height' )) / 2; ?>="opacity: 0;" data-<?php echo (int) get_option( 'scrollato-header-height' ); ?>="opacity: 1;"><?php echo $navlist; ?></div>
		</main>

		<footer id="site-footer"><?php echo stripslashes( get_option( 'scrollato-footer-content' ) ); ?></footer>

	    <script type="text/javascript">
		    $(document).ready(function() {
		    	var s = skrollr.init({
		    		smoothScrolling: true,
		    		smoothScrollingDuration: 300,
		    		forceHeight: false,
		    	});
		    });
	    </script>
	    
<?php get_footer(); ?>
