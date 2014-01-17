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
				$("#header-background-option .color-input").siblings('.color-sample').css( { 'background-color' : $("#header-background-option .color-input").val() } );
				$("#header-background-option .color-input").change(function() {
					$("#header-background-option .color-input").siblings('.color-sample').css( { 'background-color' : $("#header-background-option .color-input").val() } );
				});
				$('#header-background-option .color-input').wpColorPicker();

			} else if ( $("#header-background-type").val() == 'image' ) {
				$("#header-background-option").html("<?php echo backgroundImageRow(); ?>");

				$('#header-background-image-media').click(function() {  
					tb_show( 'Upload a logo', 'media-upload.php?type=image&TB_iframe=true' );  
					return false;  
				});  
			}
			
		});


		var upload_image_button = false;
		jQuery('.upload_image_button').click(function() {
			upload_image_button = true;
			formfieldID = jQuery(this).prev().attr( "id" );
			formfield = jQuery( "#" + formfieldID ).attr( 'name' );
			tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			if( upload_image_button == true ) {

				var oldFunc = window.send_to_editor;
				window.send_to_editor = function(html) {

					imgurl = jQuery( 'img', html ).attr( 'src' );
					jQuery( "#" + formfieldID ).val( imgurl );
					jQuery( "#" + formfieldID ).siblings('#upload_logo_preview').attr('src',imgurl);  
					tb_remove();
					window.send_to_editor = oldFunc;
				}
			}
			upload_image_button=false;
		});

		// Restore Default Image
		$("#header-background-image-default").click(function() {
			$("#header-background-image").siblings('#upload_logo_preview').attr( 'src', "<?php echo get_template_directory_uri() . '/imgs/Red_geranium_by_qerubin.jpg'; ?>" );
			$("#header-background-image").val("<?php echo get_template_directory_uri() . '/imgs/Red_geranium_by_qerubin.jpg'; ?>");
		});
		$("#favicon-default").click(function() {
			$("#favicon").siblings('#upload_logo_preview').attr( 'src', "<?php echo get_template_directory_uri() . '/favicon.ico'; ?>" );
			$("#favicon").val("<?php echo get_template_directory_uri() . '/favicon.ico'; ?>");
		});

		// Color sampling
		$(".color-input").each(function() {
			$(this).siblings('.color-sample').css( { 'background-color' : $(this).val() } );
			$(this).change(function() {
				$(this).siblings('.color-sample').css( { 'background-color' : $(this).val() } );
			});
		});
	});	
</script>