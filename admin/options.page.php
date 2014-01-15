<link rel="stylesheet" href="<?php echo get_template_directory_uri() . "/css/options_page.css"; ?>" />
<?php
require_once( dirname(dirname(__FILE__)) . "/lib/options_page.lib.php" );
require_once( dirname(dirname(__FILE__)) . "/js/options_page.js.php" );

// Save options
$opt_list = array(
	'header-height',
	'header-background-type',
	'header-background-color',
	'header-background-image',
	'header-text-maxwidth',
	'header-text-color',
	'header-extra-content',
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
			<td><label for="header-text-color">Header text color: </label></td>
			<td><input type="text" id="header-text-color" name="header-text-color" size="10" value="<?php echo get_option( 'scrollato-header-text-color' ); ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="header-extra-content" style="vertical-align: top;"><?php _e( 'Header extra content', 'scrollato' ); ?>: </label></td>
			<td><textarea name="header-extra-content" id="header-extra-content" cols="80" rows="6"><?php echo stripslashes( get_option( 'scrollato-header-extra-content' ) ); ?></textarea></td>
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