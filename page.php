<?php get_header(); ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<style type="text/css">
					body.page {
						background-color: <?php echo get_field( 'bgcolor' ); ?>;
					}

					.single-page-post {
						color: <?php echo get_field( 'text_color' ); ?>;
					}

					.single-page-post.block a:link,
					.single-page-post.block a:visited {
						color: <?php echo get_field( 'link_color' ); ?>;
					}

					.single-page-post.block a:hover {
						color: <?php echo get_field( 'link_color_hover' ); ?>;
					}

					#front-nav {
						background-color: <?php echo get_field( 'nav_bgcolor' ); ?>;
					}

					#front-nav a:link,
					#front-nav a:visited {
						color: <?php echo get_field( 'nav_link_color' ); ?>;
					}

					#front-nav a:hover {
						color: <?php echo get_field( 'nav_link_color_hover' ); ?>;
					}
				</style>

				<div <?php post_class( array( "block", "single-page-post" ) ); ?>>
					<span class="title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</span><br />
					<small>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_time('F jS, Y') ?></a> by <?php the_author_posts_link() ?>.
					</small>
					<div class="entry">
						<?php the_content(); ?>
					</div>
				</div>

			<?php endwhile; ?>

					<div id="front-nav"><a class="no-scroll" href="<?php bloginfo( 'wpurl' ); ?>/"><?php bloginfo( 'name' ); ?></a></div>

			<?php else: ?>

				<p>Sorry, no posts matched your criteria.</p>

			<?php endif; ?>

<?php get_footer(); ?>
