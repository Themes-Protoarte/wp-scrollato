<?php get_header(); ?>

<!--Image attachment template. Used when viewing a single image attachment. If not present, attachment.php will be used.-->
<?php
get_header();
?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<div <?php post_class( array( "single-page-post", "block" ) ); ?>>
					<span class="title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</span><br />
					<small>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_time('F jS, Y') ?></a> by <?php the_author_posts_link() ?>.
					</small>
					<div class="attachment image">
						<a href="<?php $img = wp_get_attachment_image_src( $post->ID,"full" ); echo $img[0]; ?>">
							<?php echo wp_get_attachment_image( $post->ID , 'full'); ?>
						</a>
					</div>
					<div class="description">
						<?php the_content(); ?>
					</div>
				</div>

			<?php endwhile; else: ?>

				<p>Sorry, no posts matched your criteria.</p>

			<?php endif; ?>

<?php get_footer(); ?>

<?php get_footer(); ?>