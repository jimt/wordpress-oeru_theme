( function( $ ) {

	wp.customize('site_allsite_background_colour',function( value ) {
        value.bind(function(to) {
            $('html').css('background-color', to );
        });
    });
	
	wp.customize('site_menu_background_colour',function( value ) {
        value.bind(function(to) {
            $('.greenbg').css('background-color', to );
            $('nav .dropdown-menu').css('background-color', to );
            $('nav').css('background-color', to );
        });
    });
	
	wp.customize('site_menu_background_hover_colour',function( value ) {
        value.bind(function(to) {
            $('body .nav > li > a:hover').css('background-color', to );
            $('body .nav > li > a:focus').css('background-color', to );
            $('body .nav .current a').css('background-color', to );
        });
    });
	
	wp.customize('site_menu_text_hover_colour',function( value ) {
        value.bind(function(to) {
            $('body .nav > li > a:hover').css('color', to );
            $('body .nav > li > a:focus').css('color', to );
            $('body .nav .current a').css('color', to );
			$('.dropdown-menu > li > a:hover').css('color', to );
			$('.dropdown-menu > li > a:focus').css('color', to );
        });
    });
	
	wp.customize('site_menu_text_colour',function( value ) {
        value.bind(function(to) {
            $('nav a').css('color', to );
			$('.navbar-toggle .icon-bar').css('background-color', to);
        });
    });
	
	wp.customize('site_content_background_colour',function( value ) {
        value.bind(function(to) {
			$('article .container').css('background-color', to);
        });
    });
	
	wp.customize('site_alllink_colour',function( value ) {
        value.bind(function(to) {
            $('a').css('color', to );
        });
    });
	
	wp.customize('site_alllink_hover_colour',function( value ) {
        value.bind(function(to) {
            $('a:hover').css('color', to );
			$('a:focus').css('color', to );
        });
    });
	
	wp.customize('site_header_colour',function( value ) {
        value.bind(function(to) {
            $('header').css('background-color', to );
            $('.panel-heading').css('background-color', to );
		    $('.faqnav .nav > .active > a').css('background-color', to );
            $('.faqnav .nav > li >a:hover').css('background-color', to );
			$('.brandtext > h1 a:hover').css('color', to );
			$('a:focus').css('color', to );
			$('summary').css('color', to );
			$('.brandtext > h1 a').css('color', to );
			$('.panel-default > .panel-heading').css('background-color', to );
			$('.button').css('background-color', to );
			$('.pager li > a').css('border: 1px solid' + to); 
			$('.pager li > a').css('color: ' + to + ' !important'); 
			$('.pager li > span').css('border: 1px solid' + to); 
			$('.pager li > span').css('color: ' + to + ' !important'); 
        });
    });
	
	wp.customize('site_top_background_colour',function( value ) {
        value.bind(function(to) {
            $('header > div:first-child').css('background-color', to );
        });
    });
	
	wp.customize('site_footer_colour',function( value ) {
        value.bind(function(to) {
            $('footer').css('color', to );
        });
    });
	
	wp.customize('site_footer_background_colour',function( value ) {
        value.bind(function(to) {
            $('footer').css('background-color', to );
        });
    });

} )( jQuery )