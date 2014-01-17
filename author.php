<?php get_header(); ?>
			<div class="single-page-post author block">
				<?php
				$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
				?>

				<style type="text/css">
					body.author {
						background-color: <?php echo get_field( 'bgcolor', "user_" . $curauth->ID ); ?>;
					}

					.single-page-post {
						color: <?php echo get_field( 'text_color', "user_" . $curauth->ID ); ?>;
					}

					.single-page-post.block a:link,
					.single-page-post.block a:visited {
						color: <?php echo get_field( 'link_color', "user_" . $curauth->ID ); ?>;
					}

					.single-page-post.block a:hover {
						color: <?php echo get_field( 'link_color_hover', "user_" . $curauth->ID ); ?>;
					}

					.author .avatar .avatar {
						border-color: <?php echo get_field( 'text_color', "user_" . $curauth->ID ); ?>;
					}
				</style>

				<div class="title">
					About: <?php echo $curauth->nickname; ?>
				</div>
				<div class="avatar">
					<?php echo get_avatar($curauth->ID); ?>
				</div>
				<div class="website">
					<span class="label">Website</span>
					<span class="info"><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></span>
				</div>
				<div class="profile">
					<span class="label">Profile</span>
					<span class="info"><?php echo $curauth->user_description; ?></span>
				</div>
				
				<div class="post-list">
					<span class="label">Posts by <?php echo $curauth->nickname; ?>:</span>

					<!-- The Loop -->
					<?php if ( have_posts() ) : ?>
						<ul>
						<?php while ( have_posts() ) : the_post(); ?>
							<li class="info">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
								<?php the_title(); ?></a>,
								<?php the_time('d M Y'); ?>.
							</li>
						<?php endwhile; ?>
						</ul>
					<?php else: ?>
						<p><?php _e('No posts by this author.', 'scrollato'); ?></p>
					<?php endif; ?>
				</div>
			</div>

<?php get_footer(); ?>