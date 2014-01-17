<?php if ( ! post_password_required() ) { ?>

<!--The comments template.-->
<center>
	<div id="comments-wrap">
		<div id="comments">
			<?php
			$args = array(
				'walker'            => null,
				'max_depth'         => '',
				'style'             => 'div',
				'callback'          => null,
				'end-callback'      => null,
				'type'              => 'all',
				'reply_text'        => __( 'Reply', 'scrollato' ),
				'page'              => '',
				'per_page'          => '',
				'avatar_size'       => 32,
				'reverse_top_level' => null,
				'reverse_children'  => '',
				'format'            => 'xhtml', //or html5 @since 3.6
				'short_ping'        => false // @since 3.6
			);

			wp_list_comments( $args );
			?>
			<p class="next">
				<?php next_comments_link(); ?>
			</p>
			<p class="prev">
				<?php previous_comments_link(); ?>
			</p>
		</div>
		<?php if ( comments_open() ) { ?>
		
		<div id="comments-form">
			<?php
			$comments_args = array(
			        // change the title of send button 
			        'label_submit' => __( 'Send', 'scrollato '),
			        // change the title of the reply section
			        'title_reply'=> __( 'Write a Reply or Comment', 'scrollato' ),
			        // remove "Text or HTML to be displayed after the set of comment fields"
			        'comment_notes_after' => '',
			        // redefine your own textarea (the comment body)
			        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'scrollato' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
			);

			comment_form($comments_args);
			?>
		</div>

		<?php } ?>
	</div>
</center>

<?php } ?>