<?php
header("Content-type: text/js; charset: UTF-8");
?>

jQuery(document).ready(function($) {
	$("#front-nav a").each(function() {
		$(this).click(function(e) {
			e.preventDefault();
			$.scrollTo( $("#block-" + $(this).attr('data-ind') ) );
		});
	});
});