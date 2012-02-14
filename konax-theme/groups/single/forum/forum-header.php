<div id="forum-header">
	
	<div id="item-actions">
		<?php if ( bp_group_is_visible() ) : ?>
	
			<div id="group-admins">
			<h3><?php _e( 'Administrators', 'buddypress' ) ?></h3>
			<?php bp_group_admin_memberlist( false ) ?>
	
			<?php do_action( 'bp_after_group_menu_admins' ) ?>
			</div>
	
			<?php if ( bp_group_has_moderators() ) : ?>
				<div id="group-mods">
				<?php do_action( 'bp_before_group_menu_mods' ) ?>
	
				<h3><?php _e( 'Moderators' , 'buddypress' ) ?></h3>
				<?php bp_group_mod_memberlist( false ) ?>
	
				<?php do_action( 'bp_after_group_menu_mods' ) ?>
				</div>
			<?php endif; ?>
	
		<?php endif; ?>
	</div><!-- #item-actions -->
	
	<a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>">
			<?php bp_group_avatar() ?>
	</a>
	
	<?php if ( bp_is_group_forum_topic() ) : ?>
	
		<h3><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a> &raquo; <a href="<?php bp_forum_permalink() ?>/">Forum</a> &raquo; <?php bp_the_topic_title() ?></h3>
		<span class="group-type"><?php bp_group_type() ?></span>	
		
		<div id="topic-meta">
			<div class="admin-links">
				<?php if ( bp_group_is_admin() || bp_group_is_mod() || bp_get_the_topic_is_mine() ) : ?>
					<?php bp_the_topic_admin_links() ?>
				<?php endif; ?>

				<?php do_action( 'bp_group_forum_topic_meta' ); ?>
			</div>
		</div>
	
	<?php else : ?>
		
		<h3><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a> &raquo; Forum</h3>
		<span class="group-type"><?php bp_group_type() ?></span>
		
	<?php endif; ?>
			
</div>