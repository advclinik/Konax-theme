<?php do_action( 'bp_before_group_forum_topic' ) ?>

<?php if ( bp_has_forum_topic_posts() ) : ?>

	<form action="<?php bp_forum_topic_action() ?>" method="post" id="forum-topic-form" class="standard-form">

	<?php locate_template( array( 'groups/single/forum/forum-header.php' ), true ) ?>

		<?php do_action( 'bp_before_group_forum_topic_posts' ) ?>

		<ul id="topic-post-list" class="item-list">
			<?php while ( bp_forum_topic_posts() ) : bp_the_forum_topic_post(); ?>

				<li id="post-<?php bp_the_topic_post_id() ?>" class="<?php bp_the_topic_post_css_class() ?>">
					<div class="poster-meta">
						<a href="<?php bp_the_topic_post_poster_link() ?>">
							<?php bp_the_topic_post_poster_avatar( 'width=40&height=40' ) ?>
						</a>
						<?php echo sprintf( __( '%s said %s ago:', 'buddypress' ), bp_get_the_topic_post_poster_name(), bp_get_the_topic_post_time_since() ) ?>
					</div>


					<div class="post-content">
						<?php bp_the_topic_post_content() ?>
					</div>

					<div class="admin-links">
						<?php if ( bp_group_is_admin() || bp_group_is_mod() || bp_get_the_topic_post_is_mine() ) : ?>
							<?php bp_the_topic_post_admin_links() ?>
						<?php endif; ?>

						<?php do_action( 'bp_group_forum_post_meta' ); ?>

						<a href="#post-<?php bp_the_topic_post_id() ?>" title="<?php _e( 'Permanent link to this post', 'buddypress' ) ?>">#</a>
					</div>
					
					<div class="clear"></div>
				</li>

			<?php endwhile; ?>
		</ul><!-- #topic-post-list -->

		<?php do_action( 'bp_after_group_forum_topic_posts' ) ?>

		<?php if ( ( is_user_logged_in() && 'public' == bp_get_group_status() ) || bp_group_is_member() ) : ?>

			<?php if ( bp_get_the_topic_is_last_page() ) : ?>

				<?php if ( bp_get_the_topic_is_topic_open() ) : ?>

					<div id="post-topic-reply">
						<p id="post-reply"></p>

						<?php if ( bp_groups_auto_join() && !bp_group_is_member() ) : ?>
							<p><?php _e( 'You will auto join this group when you reply to this topic.', 'buddypress' ) ?></p>
						<?php endif; ?>

						<?php do_action( 'groups_forum_new_reply_before' ) ?>

						<h4><?php _e( 'Add a reply:', 'buddypress' ) ?></h4>

						<textarea name="reply_text" id="reply_text"></textarea>

						<div class="submit">
							<input type="submit" name="submit_reply" id="submit" value="<?php _e( 'Post Reply', 'buddypress' ) ?>" />
						</div>

						<?php do_action( 'groups_forum_new_reply_after' ) ?>

						<?php wp_nonce_field( 'bp_forums_new_reply' ) ?>
					</div>

				<?php else : ?>

					<div id="message" class="info">
						<p><?php _e( 'This topic is closed, replies are no longer accepted.', 'buddypress' ) ?></p>
					</div>

				<?php endif; ?>

			<?php endif; ?>

		<?php else: ?>
		
			<div id="message">
				<p>You need to <a href="<?php echo site_url( 'wp-login.php' ) ?>">log in</a> <?php if ( bp_get_signup_allowed() ) : ?> or <?php printf( __( ' <a class="create-account" href="%s" title="Create an account">create an account</a>', 'buddypress' ), site_url( BP_REGISTER_SLUG . '/' ) ) ?><?php endif; ?> to participate in this forum topic.</p>
			</div>
		
		<?php endif; ?>

	</form><!-- #forum-topic-form -->
<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'There are no posts for this topic.', 'buddypress' ) ?></p>
	</div>

<?php endif;?>

		<div id="counts" class="pagination no-ajax">

			<div id="post-count" class="pag-count">
				<?php bp_the_topic_pagination_count() ?>
			</div>

			<div class="pagination-links" id="topic-pag">
				<?php bp_the_topic_pagination() ?>
			</div>

		</div>

<?php do_action( 'bp_after_group_forum_topic' ) ?>
