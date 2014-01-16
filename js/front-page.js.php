<?php
header("Content-type: text/js; charset: UTF-8");
?>

function onCSSchange( obj, css, time ) {
    var getCSSvalue = function() {
        return $(obj).css( css );
    }
        var lastCss = getCSSvalue();
    ( function listenCSS() {
        var css = getCSSvalue();
        if ( css !== lastCss ) {
            $(obj).children('.next-block').css( { 'border-top-color' : $(obj).css( 'background-color' ) } );
            lastCss = css;
        }
        var t = setTimeout(listenCSS, time);
    } )();
}

jQuery(document).ready(function($) {
	// Solve problem with next-block when changing background-color with skrollr
	$(".front-block").each( function() {
		onCSSchange( $(this), 'background-color', 50 );
	});

	// Front nav
	$("#front-nav a").each(function() {
		$(this).click(function(e) {
			e.preventDefault();
			$.scrollTo( $("#block-" + $(this).attr('data-ind') ), 800 );
		});
	});
});