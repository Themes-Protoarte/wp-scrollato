<link rel="stylesheet" href="<?php echo get_template_directory_uri() . "/css/options_page.css"; ?>" />
<?php
require_once( dirname(dirname(__FILE__)) . "/lib/options_page.lib.php" );
require_once( dirname(dirname(__FILE__)) . "/js/options_page.js.php" );

// Save options
$opt_list = array(
	'header-display',
	'header-height',
	'header-background-type',
	'header-background-color',
	'header-background-image',
	'header-text-maxwidth',
	'header-text-color',
	'header-extra-content',
	'header-skrollr-start',
	'header-skrollr-end',
	'block-even-bgcolor',
	'block-odd-bgcolor',
	'block-even-color',
	'block-odd-color',
	'block-even-a-color',
	'block-odd-a-color',
	'block-even-a-hover-color',
	'block-odd-a-hover-color',
	'nav-bgcolor',
	'nav-box-shadow',
	'nav-a-color',
	'nav-a-hover-color',
	'footer-content',
	'extra-css'
);
if ( isset( $_POST[ 'saving' ] ) and @$_POST[ 'saving' ] == "y" ) {
	foreach( $opt_list as $opt ) {
			update_option( 'scrollato-' . $opt, $_POST[ $opt ] );
	}
	echo "<h2 id='sent-msg'>" . __( 'Options saved', 'scrollato' ) . "</h2>";
}

?>

<div class="wrap"><form method="post"><input type="hidden" id="saving" name="saving" value="y" />
	<h2><?php _e( 'Theme Options', 'scrollato' ); ?></h2>
	<table>
		<tr>
			<td colspan="2"><h3><?php _e( 'Header Options', 'scrollato' ); ?></h3></td>
		</tr>
		<tr>
			<td class="label"><label for="header-display"><?php _e( 'Header display', 'scrollato' ); ?>: </label></td>
			<td>
				<select name="header-display" id="header-display">
					<option value="0"<?php
						if ( "0" == get_option( 'scrollato-header-display' ) ) { echo ' selected'; }
					?>><?php _e( 'Hidden', 'scrollato' ); ?></option>
					<option value="1"<?php
						if ( "1" == get_option( 'scrollato-header-display' ) ) { echo ' selected'; }
					?>><?php _e( 'Normal', 'scrollato' ); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="label"><label for="header-height"><?php _e( 'Header height', 'scrollato' ); ?>: </label></td>
			<td><input type="text" id="header-height" name="header-height" value="<?php echo get_option( 'scrollato-header-height' ); ?>" size="5" /></td>
		</tr>
		<tr>
			<td class="label"><label for="header-background-type"><?php _e( 'Header background type', 'scrollato' ); ?>: </label></td>
			<td>
				<select name="header-background-type" id="header-background-type">
					<option value="color"<?php if( get_option( 'scrollato-header-background-type' ) == 'color' ) { echo " selected"; } ?>><?php _e( 'Color', 'scrollato' ); ?></option>
					<option value="image"<?php if( get_option( 'scrollato-header-background-type' ) == 'image' ) { echo " selected"; } ?>><?php _e( 'Image', 'scrollato' ); ?></option>
				</select>
			</td>
		</tr>
		<tr id="header-background-option">
				<?php switch ( get_option( 'scrollato-header-background-type' ) ) {

					case 'color': {
						echo backgroundColorRow();
						break;
					}

					case 'image': {
						echo backgroundImageRow();
						break;
					}

				} ?>
		</tr>
		<tr>
			<td class="label"><label for="header-text-maxwidth"><?php _e( 'Header text max-width', 'scrollato' ); ?>: </label></td>
			<td><input type="text" size="5" id="header-text-maxwidth" name="header-text-maxwidth" value="<?php echo get_option( 'scrollato-header-text-maxwidth' ); ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="header-text-color">Header text color: </label></td>
			<td><input type="text" class="color-input" id="header-text-color" name="header-text-color" size="10" value="<?php echo get_option( 'scrollato-header-text-color' ); ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="header-extra-content" style="vertical-align: top;"><?php _e( 'Header extra content', 'scrollato' ); ?>: </label></td>
			<td><textarea name="header-extra-content" id="header-extra-content" cols="80" rows="6"><?php echo stripslashes( get_option( 'scrollato-header-extra-content' ) ); ?></textarea></td>
		</tr>
		<tr>
			<td class="label"><label for="header-skrollr-start"><?php _e( 'Header skrollr start', 'scrollato' ); ?>: </label></td>
			<td><input type="text" id="header-skrollr-start" name="header-skrollr-start" size="100" value="<?php echo get_option( 'scrollato-header-skrollr-start' ); ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="header-skrollr-end"><?php _e( 'Header skrollr end', 'scrollato' ); ?>: </label></td>
			<td><input type="text" id="header-skrollr-end" name="header-skrollr-end" size="100" value="<?php echo get_option( 'scrollato-header-skrollr-end' ); ?>" /></td>
		</tr>
		<tr>
			<td colspan="2"><h3><?php _e( 'Blocks Options', 'scrollato' ); ?></h3></td>
		</tr>
		<tr>
			<td colspan="2">
				<table width="100%">
					<tr>
						<td colspan="2" style="text-align: left; font-size: 1.15em; padding: 0.1em; padding-left: 5em;"><b>Even blocks</b></td>
						<td colspan="2" style="text-align: left; font-size: 1.15em; padding: 0.1em; padding-left: 5em;"><b>Odd blocks</b></td>
					</tr>
					<tr>
						<td class="label"><label for="block-even-bgcolor"><?php _e( 'Bgcolor', 'scrollato' ); ?>: </label></td>
						<td class="color-input-wrap"><input type="text" id="block-even-bgcolor" class="color-input" name="block-even-bgcolor" value="<?php echo get_option( 'scrollato-block-even-bgcolor' ); ?>" size="10"></td>
						<td class="label"><label for="block-odd-bgcolor"><?php _e( 'Bgcolor', 'scrollato' ); ?>: </label></td>
						<td class="color-input-wrap"><input type="text" id="block-odd-bgcolor" class="color-input" name="block-odd-bgcolor" value="<?php echo get_option( 'scrollato-block-odd-bgcolor' ); ?>" size="10"></td>
					</tr>
					<tr>
						<td class="label"><label for="block-even-color"><?php _e( 'Color', 'scrollato' ); ?>: </label></td>
						<td class="color-input-wrap"><input type="text" class="color-input" id="block-even-color" name="block-even-color" value="<?php echo get_option( 'scrollato-block-even-color' ); ?>" size="10"></td>
						<td class="label"><label for="block-odd-color"><?php _e( 'Color', 'scrollato' ); ?>: </label></td>
						<td class="color-input-wrap"><input type="text" class="color-input" id="block-odd-color" name="block-odd-color" value="<?php echo get_option( 'scrollato-block-odd-color' ); ?>" size="10"></td>
					</tr>
					<tr>
						<td class="label"><label for="block-even-a-color"><?php _e( 'Link color', 'scrollato' ); ?>: </label></td>
						<td class="color-input-wrap"><input type="text" class="color-input" id="block-even-a-color" name="block-even-a-color" value="<?php echo get_option( 'scrollato-block-even-a-color' ); ?>" size="10" /></td>
						<td class="label"><label for="block-odd-a-color"><?php _e( 'Link color', 'scrollato' ); ?>: </label></td>
						<td class="color-input-wrap"><input type="text" class="color-input" id="block-odd-a-color" name="block-odd-a-color" value="<?php echo get_option( 'scrollato-block-odd-a-color' ); ?>" size="10" /></td>
					</tr>
					<tr>
						<td class="label"><label for="block-even-a-hover-color"><?php _e( 'Link-hover color', 'scrollato' ); ?>: </label></td>
						<td class="color-input-wrap"><input type="text" class="color-input" id="block-even-a-hover-color" name="block-even-a-hover-color" value="<?php echo get_option( 'scrollato-block-even-a-hover-color' ); ?>" size="10" /></td>
						<td class="label"><label for="block-odd-a-hover-color"><?php _e( 'Link-hover color', 'scrollato' ); ?>: </label></td>
						<td class="color-input-wrap"><input type="text" class="color-input" id="block-odd-a-hover-color" name="block-odd-a-hover-color" value="<?php echo get_option( 'scrollato-block-odd-a-hover-color' ); ?>" size="10" /></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2"><h3><?php _e( 'Nav Options', 'scrollato' ); ?></h3></td>
		</tr>
		<tr>
			<td class="label"><label for="nav-bgcolor"><?php _e( 'Nav background', 'scrollato' ); ?>: </label></td>
			<td><input type="text" id="nav-bgcolor" name="nav-bgcolor" class="color-input" value="<?php echo get_option( 'scrollato-nav-bgcolor' ); ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="nav-box-shadow"><?php _e( 'Nav shadow', 'scrollato' ); ?>: </label></td>
			<td><input type="text" id="nav-box-shadow" name="nav-box-shadow" value="<?php echo get_option( 'scrollato-nav-box-shadow' ); ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="nav-a-color"><?php _e( 'Nav link color', 'scrollato' ); ?>: </label></td>
			<td><input type="text" id="nav-a-color" class="color-input" name="nav-a-color" value="<?php echo get_option( 'scrollato-nav-a-color' ); ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="nav-a-hover-color"><?php _e( 'Nav link-hover color', 'scrollato' ); ?>: </label></td>
			<td><input type="text" id="nav-a-hover-color" class="color-input" name="nav-a-hover-color" value="<?php echo get_option( 'scrollato-nav-a-hover-color' ); ?>" /></td>
		</tr>
		<tr>
			<td colspan="2"><h3><?php _e( 'Footer Options', 'scrollato' ); ?></h3></td>
		</tr>
		<tr>
			<td class="label"><label for="footer-content" style="vertical-align: top;"><?php _e( 'Footer content', 'scrollato' ); ?>: </label></td>
			<td><textarea name="footer-content" id="footer-content" cols="80" rows="6"><?php echo stripslashes( get_option( 'scrollato-footer-content' ) ); ?></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><h3><?php _e( 'Extra options', 'scrollato' ); ?></h3></td>
		</tr>
		<tr>
			<td class="label"><label for="extra-css" style="vertical-align: top;"><?php _e( 'Extra css', 'scrollato' ); ?>: </label></td>
			<td><textarea name="extra-css" id="extra-css" cols="80" rows="6"><?php echo stripslashes( get_option( 'scrollato-extra-css' ) ); ?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" class="label"><input type="submit" class="button action" value="<?php _e( 'Save options', 'scrollato' ); ?>"></td>
		</tr>
	</table>

</form></div>