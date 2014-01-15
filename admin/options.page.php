<style type="text/css">
	table .label {
		text-align: right;
		vertical-align: top;
	}
</style>

<div class="wrap"><form action="">
	<h2><?php _e( 'Theme Options', 'scrollato' ); ?></h2>

	<table>
		<tr>
			<td colspan="2"><h3><?php _e( 'Header Options', 'scrollato' ); ?></h3></td>
		</tr>
		<tr>
			<td class="label"><label for="header-height"><?php _e( 'Header height', 'scrollato' ); ?>: </label></td>
			<td><input type="text" id="header-height" name="header-height" value="800px" size="5" /></td>
		</tr>
		<tr>
			<td class="label"><label for="header-background-type"><?php _e( 'Header background type', 'scrollato' ); ?>: </label></td>
			<td>
				<select name="header-background-type" id="header-background-type">
					<option value="color"><?php _e( 'Color', 'scrollato' ); ?></option>
					<option value="image"><?php _e( 'Image', 'scrollato' ); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"><div id="header-background-option"></div></td>
		</tr>
		<tr>
			<td class="label"><label for="header-text-maxwidth"><?php _e( 'Header text max-width', 'scrollato' ); ?>: </label></td>
			<td><input type="text" size="5" id="header-text-maxwidth" name="header-text-maxwidth" value="700px" /></td>
		</tr>
		<tr>
			<td class="label"><label for="header-extra-content" style="vertical-align: top;"><?php _e( 'Header extra content', 'scrollato' ); ?>: </label></td>
			<td><textarea name="header-extra-content" id="header-extra-content" cols="80" rows="6"></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><h3><?php _e( 'Footer Options', 'scrollato' ); ?></h3></td>
		</tr>
		<tr>
			<td class="label"><label for="footer-content" style="vertical-align: top;"><?php _e( 'Footer content', 'scrollato' ); ?>: </label></td>
			<td><textarea name="footer-content" id="footer-content" cols="80" rows="6"></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><h3><?php _e( 'Extra options', 'scrollato' ); ?></h3></td>
		</tr>
		<tr>
			<td class="label"><label for="extra-css" style="vertical-align: top;"><?php _e( 'Extra css', 'scrollato' ); ?>: </label></td>
			<td><textarea name="extra-css" id="extra-css" cols="80" rows="6"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" class="label"><input type="submit" class="button action" value="<?php _e( 'Save', 'scrollato' ); ?>"></td>
		</tr>
	</table>

</form></div>