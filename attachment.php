<?php get_header(); ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<div <?php post_class( array( "single-page-post", "block" ) ); ?>>
					<div class="attachment link">
						<?php the_attachment_link( $post->ID,1 ); ?>
					</div>
					<small>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_time('F jS, Y') ?></a> by <?php the_author_posts_link() ?>.
					</small>
				</div>

			<?php endwhile; else: ?>

				<p>Sorry, no posts matched your criteria.</p>

			<?php endif; ?>

<?php get_footer(); ?>