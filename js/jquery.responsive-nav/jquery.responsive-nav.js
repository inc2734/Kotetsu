/**
 * jquery.responsive-nav
 * Description: レスポンシブなナビゲーションを実装。プルダウンナビ <=> オフキャンバスナビ
 * Version: 1.0.2
 * Author: Takashi Kitajima
 * Autho URI: http://2inc.org
 * created : February 20, 2014
 * modified: June 21, 2014
 * License: GPL2
 *
 * Copyright 2014 Takashi Kitajima (email : inc@2inc.org)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
;( function( $ ) {
	$.fn.responsive_nav = function( config ) {
		var is_open = false;
		var container, wrapper, global_nav;
		var _global_nav = this;

		return this.each( function( i, e ) {
			global_nav = _global_nav.clone( true );
			_global_nav.addClass( 'responsive-nav' );

			if ( $( '#responsive-btn' ).css( 'display' ) !== 'none' ) {
				wrap_all();
				set_off_canvas_nav();
			}

			var menu = $( this ).find( 'ul:first-child' );
			menu.children( 'li' ).children( 'ul' ).children( 'li' ).hover( function() {
				var children = $( this ).children( 'ul' );
				if ( children.length ) {
					if ( $( window ).width() < ( children.width() + children.offset().left ) ) {
						children.addClass( 'reverse-pulldown' );
						children.find( 'ul' ).addClass( 'reverse-pulldown' );
					}
				}
			} );

			$( window ).resize( function() {
				var children = menu.children( 'li' ).children( 'ul' ).children( 'li' );
						children.removeClass( 'reverse-pulldown' );
						children.find( 'ul' ).removeClass( 'reverse-pulldown' );
				if ( $( '#responsive-btn' ).css( 'display' ) !== 'none' ) {
					wrap_all();
					set_off_canvas_nav();
					if ( is_open ) {
						container.css( 'marginLeft', get_slide_width() );
						var height = $( window ).height();
						global_nav.css( {
							height: height
						} );
						wrapper.css( {
							height: height,
							overflow: 'hidden'
						} );
					}
				} else {
					unwrap();
					unset_off_canvas_nav();
				}
			} );

			$( '#responsive-btn' ).click( function() {
				if ( is_open ) {
					nav_close();
				} else {
					nav_open();
				}
			} );
			$( 'body' ).click( function() {
				if ( is_open ) {
					nav_close();
				}
			} );
		} );

		function get_slide_width() {
			return global_nav.width();
		}

		function nav_open() {
			var height = $( window ).height();
			global_nav.css( {
				height: height
			} );
			global_nav.show();
			container.css( 'width', container.width() );
			container.animate( {
				marginLeft: get_slide_width()
			}, 200, function() {
				is_open = true;
				wrapper.css( {
					height: height,
					overflow: 'hidden'
				} );
			} );
		}

		function nav_close() {
			container.animate( {
				marginLeft: 0
			}, 200, function() {
				unwrap();
				wrap_all();
			} );
		}

		function unwrap() {
			is_open = false;
			if ( container ) {
				container.children().unwrap();
				wrapper.children().unwrap();
				container = '';
				console.log( _global_nav.length );
				_global_nav.show();
				global_nav.remove();
			}
		}

		function wrap_all() {
			if ( !container ) {
				$( 'body' ).children( '*:not(#wpadminbar)' ).wrapAll( '<div id="responsive-nav-container" />' );
				container = $( '#responsive-nav-container' );
				container.wrapAll( '<div id="responsive-nav-wrapper" />' );
				wrapper = $( '#responsive-nav-wrapper' );
				container.css( 'position', 'relative' );
				container.prepend( global_nav );
				_global_nav.hide();
			}
		}

		function set_off_canvas_nav() {
			global_nav.addClass( 'off-canvas-nav' );
			global_nav.css( 'display', 'none' );
		}

		function unset_off_canvas_nav() {
			global_nav.removeClass( 'off-canvas-nav' );
			global_nav.css( 'display', 'block' );
		}
	}
} )( jQuery );