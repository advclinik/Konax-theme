<?php /* Querystring is set via AJAX in _inc/ajax.php - bp_dtheme_object_filter() */ ?>

<?php do_action( 'bp_before_groups_loop' ) ?>

<?php if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : ?>

	<div id="pag-top" class="pagination">

		<div class="pag-count" id="group-dir-count-top">
			<?php bp_groups_pagination_count() ?>
		</div>

		<div class="pagination-links" id="group-dir-pag-top">
			<?php bp_groups_pagination_links() ?>
		</div>

	</div>

	<?php do_action( 'bp_before_directory_groups_list' ) ?>

	<ul id="groups-list" class="item-list">
	<?php while ( bp_groups() ) : bp_the_group(); ?>

		<li>
			<div class="item-avatar">
				<a href="<?php bp_group_permalink() ?>"><?php bp_group_avatar('type=full&width=100&height=100') ?></a>
			</div>

			<div class="item">
				<div class="item-title"><a href="<?php bp_group_permalink() ?>"><?php bp_group_name() ?></a></div>
				<div class="item-meta"><span class="activity"><?php printf( __( 'active %s ago', 'buddypress' ), bp_get_group_last_active() ) ?></span></div>

				<div class="item-desc"><?php bp_group_description_excerpt() ?></div>

				<?php do_action( 'bp_directory_groups_item' ) ?>

			</div>

			<div class="action">
			
				<?php do_action( 'bp_directory_groups_actions' ) ?>

				<div class="meta">

					<?php bp_group_type() ?> / <?php bp_group_member_count() ?>

				</div>

			</div>

			<div class="clear"></div>
		</li>

	<?php endwhile; ?>
	</ul>

	<?php do_action( 'bp_after_directory_groups_list' ) ?>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'There were no groups found.', 'buddypress' ) ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_groups_loop' ) ?>
