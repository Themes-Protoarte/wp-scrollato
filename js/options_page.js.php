<?php
require_once( dirname(dirname(__FILE__)) . "/lib/options_page.lib.php" );
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

		// Send chosen uri to correct input
		window.send_to_editor = function(html) {  
			var image_url = $('img',html).attr('src');  
			$('#header-background-image').val(image_url);  
			tb_remove();  
			$('#upload_logo_preview img').attr('src',image_url);  

			$('#submit_options_form').trigger('click');  
		}  
	});	
</script>