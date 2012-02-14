<?php do_action( 'bp_before_group_forum_edit_form' ) ?>

<?php if ( bp_has_forum_topic_posts() ) : ?>

	<form action="<?php bp_forum_topic_action() ?>" method="post" id="forum-topic-form" class="standard-form">

	<?php locate_template( array( 'groups/single/forum/forum-header.php' ), true ) ?>

		<?php if ( bp_group_is_member() ) : ?>

			<?php if ( bp_is_edit_topic() ) : ?>

				<div id="edit-topic">

					<?php do_action( 'bp_group_before_edit_forum_topic' ) ?>

					<p><strong><?php _e( 'Edit Topic:', 'buddypress' ) ?></strong></p>

					<label for="topic_title"><?php _e( 'Title:', 'buddypress' ) ?></label>
					<input type="text" name="topic_title" id="topic_title" value="<?php bp_the_topic_title() ?>" />

					<label for="topic_text"><?php _e( 'Content:', 'buddypress' ) ?></label>
					<textarea name="topic_text" id="topic_text"><?php bp_the_topic_text() ?></textarea>

					<?php do_action( 'bp_group_after_edit_forum_topic' ) ?>

					<p class="submit"><input type="submit" name="save_changes" id="save_changes" value="<?php _e( 'Save Changes', 'buddypress' ) ?>" /></p>

					<?php wp_nonce_field( 'bp_forums_edit_topic' ) ?>

				</div>

			<?php else : ?>

				<div id="edit-post">

					<?php do_action( 'bp_group_before_edit_forum_post' ) ?>

					<p><strong><?php _e( 'Edit Post:', 'buddypress' ) ?></strong></p>

					<textarea name="post_text" id="post_text"><?php bp_the_topic_post_edit_text() ?></textarea>

					<?php do_action( 'bp_group_after_edit_forum_post' ) ?>

					<p class="submit"><input type="submit" name="save_changes" id="save_changes" value="<?php _e( 'Save Changes', 'buddypress' ) ?>" /></p>

					<?php wp_nonce_field( 'bp_forums_edit_post' ) ?>

				</div>

			<?php endif; ?>

		<?php endif; ?>

	</form><!-- #forum-topic-form -->

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'This topic does not exist.', 'buddypress' ) ?></p>
	</div>

<?php endif;?>

<?php do_action( 'bp_after_group_forum_edit_form' ) ?>
