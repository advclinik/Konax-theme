<?php get_header() ?>

	<div id="content">

<div id="side-profile">

		<div id="item-header-avatar">
	<a href="<?php bp_user_link(); ?>">

		<?php bp_displayed_user_avatar( 'type=full' ); ?>

	</a>
</div><!-- #item-header-avatar -->

		<div id="item-nav">
				<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
					<ul>

						<?php bp_get_displayed_user_nav(); ?>

						<?php do_action( 'bp_member_options_nav' ); ?>

					</ul>
				</div>
			</div><!-- #item-nav -->

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Profilesidebar') ) : ?> <?php endif; ?>
		</div>

		<div class="activi">

			<div id="item-header">
				<?php locate_template( array( 'members/single/member-header.php' ), true ) ?>
			</div><!-- #item-header -->

			<div id="item-body">
				<div class="activity no-ajax">
					<?php if ( bp_has_activities( 'display_comments=threaded&include=' . bp_current_action() ) ) : ?>
				
						<ul id="activity-stream" class="activity-list item-list">
						<?php while ( bp_activities() ) : bp_the_activity(); ?>
				
							<?php locate_template( array( 'activity/entry.php' ), true ) ?>
				
						<?php endwhile; ?>
						</ul>
				
					<?php endif; ?>
				</div>
			</div><!-- #item-body -->

		</div><!-- .padder -->
	</div><!-- #content -->

	<?php locate_template( array( 'sidebar.php' ), true ) ?>

<?php get_footer() ?>