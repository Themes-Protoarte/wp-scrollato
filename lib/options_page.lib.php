<?php

# HTML of header-background-color form
function backgroundColorRow() {
	$s = "<td class='label'>";
	$s .= "<label for='header-background-color'>" . __( 'Header background color', 'scrollato' ) . ": </label>";
	$s .= "</td><td>";
	$s .= "<input type='text' id='header-background-color' class='color-input' name='header-background-color' value='" . get_option( 'scrollato-header-background-color' ) . "' size='10' />";
	$s .= "<div class='color-sample'></div>";
	$s .= "</td>";

	return $s;
}

# HTML of header-background-image form
function backgroundImageRow() {
	if ( get_option( 'scrollato-header-background-image' ) != "" ) {
		$t = "<img id='upload_logo_preview' src='" . get_option( 'scrollato-header-background-image' ) . "' style='padding: 2px; max-height: 150px; max-width: 500px; background-color: white; border: 1px solid #989898;' /><br />";
	} else { $t = ''; }

	$s = "<td class='label'>";
	$s .= "<label for='header-background-image-media'>" . __( 'Header background image', 'scrollato' ) . ": </label>";
	$s .= "</td><td>";
	$s .= "$t<input type='text' id='header-background-image' name='header-background-image' size='30' value='" . get_option( 'scrollato-header-background-image' ) . "' />";
	$s .= " <input type='button' id='header-background-image-media' class='button action upload_image_button' name='header-background-image-media' value='" . __( 'Upload image', 'scrollato' ) . "' />";
	$s .= " <input type='button' class='button action' id='header-background-image-default' value='" . __( 'Default', 'scrollato' ) . "' />";
	$s .= "</td>";

	return $s;
}

?>