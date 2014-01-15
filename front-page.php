<?php get_header(); ?>

		<header id="site-head" data-0="opacity: 1;" data-500="opacity: 0.5;">
			<div class="vertical">
				<div id="site-head-content">
					<h1 id="site-name"><?php bloginfo( 'name' ); ?></h1>
					<h3 id="site-tagline"><?php bloginfo( 'description' ); ?></h3>
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
				<article class="block">
					<?php the_content(); ?>
				</article>
				<div class="next-block"></div>
			</div>
			<?php

				$k++;
				$navlist .= "<a class='nav-list' data-ind='$k'>" . get_the_title() . "</a>\n";

			endwhile;  else:  endif; ?>
			
			<div id="front-nav"><?php echo $navlist; ?></div>
		</main>

		<footer id="site-footer"><a href="http://filopoe.it/Scrollato/">Scrollato</a> theme by <a href="http://filopoe.it/">Gabriele Girelli</a></footer>

<?php get_footer(); ?>
