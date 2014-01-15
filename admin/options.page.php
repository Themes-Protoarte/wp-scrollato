<style type="text/css">
	table .label {
		padding-right: 0.5rem;
		text-align: right;
		vertical-align: top;
	}

	#sent-msg {
		position: absolute;
		top: 1em;
		left: -25px;
		right: 0;

		margin: 0;
		padding: 0.5em;

		z-index: 2;

		background-color: rgba( 36, 138, 30, .6 );
		box-shadow: white 0 0 5px;
		
		color: white;
		text-align: center;
	}
</style>

<?php

function backgroundColorRow() {
	return "<td class='label'><label for='header-background-color'>Header background color: </label></td><td><input type='text' id='header-background-color' name='header-background-color' value='" . get_option( 'scrollato-header-background-color' ) . "' size='10' /></td>";
}

function backgroundImageRow() {
	if ( get_option( 'scrollato-header-background-image' ) != "" ) { $t = "<img src='" . get_option( 'scrollato-header-background-image' ) . "' style='padding: 2px; max-height: 150px; max-width: 500px; background-color: white; border: 1px solid #989898;' /><br />"; } else { $t = ''; }
	return "<td class='label'><label for='header-background-image-media'>Header background image: </label></td><td>$t<input type='text' id='header-background-image' name='header-background-image' size='30' value='" . get_option( 'scrollato-header-background-image' ) . "' /><input type='button' id='header-background-image-media' class='button action' name='header-background-image-media' value='" . __( 'Upload image', 'scrollato' ) . "' /></td>";
}

?>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		// Fade Out "Saved Option" message
		$("#sent-msg").delay(3000).fadeOut(800);

		// Change background options based on selected value
		$("#header-background-type").change(function() {
			if ( $("#header-background-type").val() == 'color' ) {
				$("#header-background-option").html("<?php echo backgroundColorRow(); ?>");
			} else if ( $("#header-background-type").val() == 'image' ) {
				$("#header-background-option").html("<?php echo backgroundImageRow(); ?>");
				$('#header-background-image-media').click(function() {  
					tb_show( 'Upload a logo', 'media-upload.php?type=image&TB_iframe=true' );  
					return false;  
				});  
			}
		});

		// Use Media Library to upload
		$('#header-background-image-media').click(function() {  
			tb_show( 'Upload a logo', 'media-upload.php?type=image&TB_iframe=true' );  
			return false;  
		});

		window.send_to_editor = function(html) {  
			var image_url = $('img',html).attr('src');  
			$('#header-background-image').val(image_url);  
			tb_remove();  
			$('#upload_logo_preview img').attr('src',image_url);  

			$('#submit_options_form').trigger('click');  
		}  
	});	
</script>

<?php 

// Save options
$opt_list = array( 'header-height', 'header-background-type', 'header-background-color', 'header-background-image', 'header-text-maxwidth', 'header-extra-content', 'footer-content', 'extra-css' );
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