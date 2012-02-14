<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );
add_action( 'admin_bar_menu', 'theme_options_nav' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'konax_options', 'konax_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'konaxtheme' ), __( 'Theme Options', 'konaxtheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}


function theme_options_nav() {
 global $wp_admin_bar;
 $wp_admin_bar->add_menu( array(
 'parent' => 'appearance',
 'id' => 'theme-options',
 'title' => 'Theme Options',
 'href' => admin_url('themes.php?page=theme_options')
 ) );
}


/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'default' => array(
		'value' =>	'default',
		'label' => __( 'Default', 'konaxtheme' )
	),
	'green' => array(
		'value' =>	'green',
		'label' => __( 'Green', 'konaxtheme' )
	),
	'orange' => array(
		'value' => 'orange',
		'label' => __( 'Orange', 'konaxtheme' )
	),
	'yellow' => array(
		'value' => 'yellow',
		'label' => __( 'Yellow', 'konaxtheme' )
	),
	'grey' => array(
		'value' => 'grey',
		'label' => __( 'Grey', 'konaxtheme' )
	),
	'purple' => array(
		'value' => 'purple',
		'label' => __( 'Purple', 'konaxtheme' )
	),
	'defaultnborders' => array(
		'value' => 'defaultnborders',
		'label' => __( 'Default No Boarders', 'konaxtheme' )
	),
	'greennborders' => array(
		'value' => 'greennborders',
		'label' => __( 'Green No Borders', 'konaxtheme' )
	),
	'orangenborders' => array(
		'value' => 'orangenborders',
		'label' => __( 'Orange No Boaders', 'konaxtheme' )
	),
	'yellownborders' => array(
		'value' => 'yellownborders',
		'label' => __( 'Yellow No Boaders', 'konaxtheme' )
	),
	'greynborders' => array(
		'value' => 'greynborders',
		'label' => __( 'Grey No Borders', 'konaxtheme' )
	),
	'purplenborders' => array(
		'value' => 'purplenborders',
		'label' => __( 'Purple No Borders', 'konaxtheme' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'konaxtheme' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'konaxtheme' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe', 'konaxtheme' )
	)
);

$select_font_options = array(
	'Lobster Two' => array(
		'value' =>	'Lobster Two',
		'label' => __( 'Lobster Two', 'konaxtheme' )
	),
	'Quattrocento' => array(
		'value' =>	'Quattrocento',
		'label' => __( 'Quattrocento', 'konaxtheme' )
	),
	'Droid Sans' => array(
		'value' => 'Droid Sans',
		'label' => __( 'Droid Sans', 'konaxtheme' )
	),
	'PT Sans' => array(
		'value' => 'PT Sans',
		'label' => __( 'PT Sans', 'konaxtheme' )
	),
	'Yanone Kaffeesatz' => array(
		'value' => 'Yanone Kaffeesatz',
		'label' => __( 'Yanone Kaffeesatz', 'konaxtheme' )
	),
	'Cabin' => array(
		'value' => 'Cabin',
		'label' => __( 'Cabin', 'konaxtheme' )
	),
	'Black Ops One' => array(
		'value' => 'Black Ops One',
		'label' => __( 'Black Ops One', 'konaxtheme' )
	),
	'Nixie One' => array(
		'value' => 'Nixie One',
		'label' => __( 'Nixie One', 'konaxtheme' )
	),
	'Bangers' => array(
		'value' => 'Bangers',
		'label' => __( 'Bangers', 'konaxtheme' )
	),
	'Monofett' => array(
		'value' => 'Monofett',
		'label' => __( 'Monofett', 'konaxtheme' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options, $select_font_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'konaxtheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'konaxtheme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'konax_options' ); ?>
			<?php $options = get_option( 'konax_theme_options' ); ?>

			<table class="form-table">




				<?php
				/**
				 * Custom Logo
				 */
				?>
				<tr valign="top">
<th scope="row"><?php _e( 'Custom Logo', 'konaxtheme' ); ?></th>
<td><input id="konax_theme_options[custom_logo]" type="text" size="36" name="konax_theme_options[custom_logo]" value="<?php esc_attr_e( $options['custom_logo'] ); ?>" />
<label for="konax_theme_options[custom_logo]"><?php _e( 'Enter the URL to your custom logo size - 600x45px', 'konaxtheme' ); ?></label></td>
</tr>



				<?php
				/**
				 * Welcome Image
				 */
				?>
				<tr valign="top">
<th scope="row"><?php _e( 'Welcome Image', 'konaxtheme' ); ?></th>
<td><input id="konax_theme_options[welcome_image]" type="text" size="36" name="konax_theme_options[welcome_image]" value="<?php esc_attr_e( $options['welcome_image'] ); ?>" />
<label for="konax_theme_options[welcome_image]"><?php _e( 'Enter the URL to your welcome image - size 300x200px', 'konaxtheme' ); ?></label></td>
</tr>



				<?php
				/**
				 * Welcome title
				 */
				?>
				<tr valign="top">
<th scope="row"><?php _e( 'Welcome title', 'konaxtheme' ); ?></th>
<td><input id="konax_theme_options[welcome_title]" type="text" size="36" name="konax_theme_options[welcome_title]" value="<?php esc_attr_e( $options['welcome_title'] ); ?>" />
<label for="konax_theme_options[welcome_title]"><?php _e( 'Enter your welcome title here', 'konaxtheme' ); ?></label></td>
</tr>



				<?php
				/**
				 * Welcome message
				 */
				?>
				<tr valign="top">
<th scope="row"><?php _e( 'Welcome message', 'konaxtheme' ); ?></th>
<td><input id="konax_theme_options[welcome_message]" type="text" size="36" name="konax_theme_options[welcome_message]" value="<?php esc_attr_e( $options['welcome_message'] ); ?>" />
<label for="konax_theme_options[welcome_message]"><?php _e( 'Enter your welcome message here', 'konaxtheme' ); ?></label></td>
</tr>

			
			
				<?php
				/**
				 * Color Choices
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Select Theme Color', 'konaxtheme' ); ?></th>
					<td>
						<select name="konax_theme_options[themecolor]">
							<?php
								$selected = $options['themecolor'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="konax_theme_options[themecolor]"><?php _e( 'Choose color and style of the theme.', 'konaxtheme' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Font Choices
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Select Google Font', 'konaxtheme' ); ?></th>
					<td>
						<select name="konax_theme_options[googlefont]">
							<?php
								$selected = $options['googlefont'];
								$p = '';
								$r = '';

								foreach ( $select_font_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="konax_theme_options[googlefont]"><?php _e( 'Choose a font for the welcome title.', 'konaxtheme' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Use custom.css? 
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Custom Stylesheet', 'konaxtheme' ); ?></th>
					<td>
						<input id="konax_theme_options[customcss]" name="konax_theme_options[customcss]" type="checkbox" value="1" <?php checked( '1', $options['customcss'] ); ?> />
						<label class="description" for="konax_theme_options[customcss]"><?php _e( 'Check this box to use a custom stylesheet. Create <code>custom.css</code> in the main theme directory.', 'konaxtheme' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Use functions-custom.php? 
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Custom Functions', 'konaxtheme' ); ?></th>
					<td>
						<input id="konax_theme_options[customphp]" name="konax_theme_options[customphp]" type="checkbox" value="1" <?php checked( '1', $options['customphp'] ); ?> />
						<label class="description" for="konax_theme_options[customphp]"><?php _e( 'Check this box to use a custom functions file. Create <code>functions-custom.php</code> in the main theme directory.', 'konaxtheme' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Tracking code 
				 */
				?>
<tr valign="top">
<th scope="row"><?php _e( 'Tracking Code', 'konaxtheme' ); ?></th>
<td><label for="konax_theme_options[tracking]"><?php _e( 'Enter your analytics tracking code', 'konaxtheme' ); ?></label>
<br />
<textarea id="konax_theme_options[tracking]" name="konax_theme_options[tracking]" rows="5" cols="36"><?php esc_attr_e( $options['tracking'] ); ?></textarea></td>
</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'konaxtheme' ); ?>" />
			</p>
		</form>		
		
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options, $select_font_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['customcss'] ) )
		$input['customcss'] = null;
	$input['customcss'] = ( $input['customcss'] == 1 ? 1 : 0 );

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['customphp'] ) )
		$input['customphp'] = null;
	$input['customphp'] = ( $input['customphp'] == 1 ? 1 : 0 );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['themecolor'], $select_options ) )
		$input['themecolor'] = null;
		
	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['googlefont'], $select_font_options ) )
		$input['googlefont'] = null;

		if ( ! isset( $input['option1'] ) )
        $input['option1'] = null;
    $input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
    $input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );
    if ( ! isset( $input['radioinput'] ) )
        $input['radioinput'] = null;
    if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
        $input['radioinput'] = null;
    $input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/