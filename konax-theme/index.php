<?php get_header() ?>

	<?php
$options = get_option( 'konax_theme_options' ); ?>

	<div id="content">
		<div class="homepage">

		<?php do_action( 'bp_before_blog_home' ) ?>

		<div id="home-banner">
			<div class="box1">
				<img src="<?php echo ($options['welcome_image']); ?>" alt="welcome" />
			</div><!-- .box1-->
			<div class="box2">
				<div class="boxlogin">
					<?php include_once('login.php'); ?>
				</div><!-- .boxlogin-->
				<div class="boxwelcome">
					<h1 class="welcome-ti">
						<a><?php echo ($options['welcome_title']); ?></a>
					</h1><!-- .welcome-ti-->
					<div class="welcome-mes">
						<a><?php echo ($options['welcome_message']); ?></a>
					</div><!-- .welcome-mes-->
				</div><!-- .boxwelcome-->
			</div><!-- .box2-->
		</div><!-- #home-banner -->

		<div id="home-center">
		</div><!-- #home-center -->

		<div id="home-bottom-sidebar">

			<div id="home-bottom1">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home bottom 1') ) : ?> <?php endif; ?>
			</div><!-- #home-bottom2 -->

			<div id="home-bottom2">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home bottom 2') ) : ?> <?php endif; ?>
			</div><!-- #home-bottom2 -->

			<div id="home-bottom3">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home bottom 3') ) : ?> <?php endif; ?>
			</div><!-- #home-bottom3 -->

		</div><!-- #home-bottom-sidebar -->

		<?php do_action( 'template_notices' ) ?>

		<?php do_action( 'bp_after_blog_home' ) ?>

		</div><!-- . homepage -->
	</div><!-- #content -->

<?php get_footer() ?>
