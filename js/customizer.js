( function( $ ) {
	// Site title and description
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Logo
	wp.customize( 'logo', function( value ) {
		value.bind( function( to ) {
			$( '.logo img' ).attr( 'src', to );
		} );
	} );

	// Font color
	wp.customize( 'font_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'color', to );
			$( '.hentry .entry-title a' ).css( 'color', to );
		} );
	} );

	// Link color
	wp.customize( 'link_color', function( value ) {
		value.bind( function( to ) {
			$( 'a:not( .global-nav a, #footer a, .hentry .entry-title a, .bread-crumb a )' ).css( 'color', to );
			$( '.entries .hentry .entry-thumbnail a' ).css( 'backgroundColor', to );
		} );
	} );

	// Global Navigation
	wp.customize( 'gnav_color', function( value ) {
		value.bind( function( to ) {
			$( '.global-nav, .global-nav ul li a' ).css( 'backgroundColor', to );
		} );
	} );
	wp.customize( 'gnav_rollover_color', function( value ) {
		value.bind( function( to ) {
			$( '.global-nav ul li.current-menu-ancestor > a, .global-nav ul li.current-menu-item > a, .global-nav ul li.current_page_item > a' ).css( 'backgroundColor', to );
		} );
	} );
} )( jQuery );