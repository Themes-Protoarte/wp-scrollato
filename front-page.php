<?php get_header(); ?>

		<header id="site-head" data-0="opacity: 1;" data-500="opacity: 0.5;">
			<div class="vertical">
				<div id="site-head-content">
					<h1 id="site-name"><?php bloginfo( 'name' ); ?></h1>
					<h3 id="site-tagline"><?php bloginfo( 'description' ); ?></h3>
					<div class="extra"><?php echo get_option( 'scrollato-header-extra-content' ); ?></div>
				</div>
			</div>
		</header>

		<main>
			<?php
			# Post Query
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$query = new WP_Query( array(
				'post_type' => 'block',
				'order' => 'ASC'
			));

			#Counter and nav items
			$k = 1;
			$navlist = "";

			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

			?>
			<div id="" class="front-block<?php if ( $k % 2 == 0 ) { echo " odd"; } ?>">
				<article id="block-<?php echo $k; ?>" class="block">
					<?php the_content(); ?>
				</article>
				<div class="next-block"></div>
			</div>
			<?php

				$navlist .= "<a href='#' class='nav-list' data-ind='$k'>" . get_the_title() . "</a>\n";
				$k++;

			endwhile;  else:  endif; ?>
			
			<div id="front-nav" data-0="opacity: 0;" data-<?php echo ((int) get_option( 'scrollato-header-height' )) / 2; ?>="opacity: 0;" data-<?php echo (int) get_option( 'scrollato-header-height' ); ?>="opacity: 1;"><?php echo $navlist; ?></div>
		</main>

		<footer id="site-footer"><?php echo get_option( 'scrollato-footer-content' ); ?></footer>

<?php get_footer(); ?>
