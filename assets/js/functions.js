/**
 * Theme functions file.
 *
 */

(function($) {
	$(document).ready(function() {
	/**
	 * Quick links at the header.
	 */
		(function() {
			// Toggle the primary sidebar and secondary sidebar.
			$( '.sq-primary-sidebar .button-toggle, .active-primary-sidebar' ).on( 'click keypress', function(e) {
				if ( e.which == 13 || e.type == 'click' ) {
					if ( ! isLgScreen() ) {
						$( '#secondary-sidebar' ).removeClass( 'secondary-sidebar-expand' );
						$( '#primary-sidebar-content' ).addClass( 'primary-sidebar-content-expand' );
						$('body').addClass( 'covered-body' );
						
						if ( e.which == 13 ) {
							setTimeout( function(){ $('.close-primary-sidebar').focus(); }, 500 );
						}						
					}
				}
			});
			
			$( '.sq-secondary-sidebar .button-toggle, .active-secondary-sidebar' ).on( 'click keypress', function(e) {
				if ( e.which == 13 || e.type == 'click' ) {
					if ( isLgScreen() ) {
						$( '#primary-sidebar' ).removeClass( 'primary-sidebar-expand' );
						$( '#secondary-sidebar' ).addClass( 'secondary-sidebar-expand' );
					} else {
						$( '#secondary-sidebar' ).addClass( 'secondary-sidebar-expand' );
						$( '#primary-sidebar-content' ).removeClass( 'primary-sidebar-content-expand' );
						$('body').addClass( 'covered-body' );				
					}
					
					if ( e.which == 13 ) {
						setTimeout( function(){ $('.close-secondary-sidebar').focus(); }, 500 );
					}				
				}
			});
			
			$( '.close-primary-sidebar' ).click(function() {
				if ( ! isLgScreen() ) {
					$( '#primary-sidebar-content' ).removeClass( 'primary-sidebar-content-expand' );
					$('body').removeClass( 'covered-body' );
				}
			});
			
			$( '.close-primary-sidebar' ).keypress(function(e) {
				if ( e.which == 13 ) {
					setTimeout( function(){ $( '.sq-primary-sidebar .button-toggle' ).focus(); }, 500 );
				}			
			});
			
			$( '.close-secondary-sidebar' ).click(function() {
				if ( isLgScreen() ) {
					$( '#secondary-sidebar' ).removeClass( 'secondary-sidebar-expand' );
					$( '#primary-sidebar' ).addClass( 'primary-sidebar-expand' );
				} else {
					$( '#secondary-sidebar' ).removeClass( 'secondary-sidebar-expand' );
					$('body').removeClass( 'covered-body' );
				}
			});
			
			$( '.close-secondary-sidebar' ).keypress(function(e) {
				if ( e.which == 13 ) {
					setTimeout( function(){ $( '.sq-secondary-sidebar .button-toggle' ).focus(); }, 500 );
				}			
			});		
			
			$(window).resize(function() {
				// Fix that the primary sidebar disappears sometimes.
				if ( isLgScreen() ) {
					if ( ! $( '#secondary-sidebar' ).hasClass( 'secondary-sidebar-expand' ) ) {
						$( '#primary-sidebar' ).addClass( 'primary-sidebar-expand' );
					}
					
					$( 'body' ).removeClass( 'covered-body' );
				} else {
					if ( $( '#secondary-sidebar' ).hasClass( 'secondary-sidebar-expand' ) || $( '#primary-sidebar-content' ).hasClass( 'primary-sidebar-content-expand' ) ) {
						$( 'body' ).addClass( 'covered-body' );
					}
				}
			});	
			
			// Toggle the search form
			$( '.sq-search .button-toggle' ).on( 'click keypress', function(e) {
				if ( e.which == 13 || e.type == 'click' ) {
					$( '#popup-search' ).addClass( 'site-search-open' ).find( '.search-field' ).focus();
				}
			});	
			 
			$( '.close-search-form' ).click(function() {
				$( '#popup-search' ).removeClass( 'site-search-open' );
			});
			
			$( '.close-search-form' ).keypress(function(e) {
				if ( e.which == 13 ) {
					setTimeout( function(){ $( '.sq-search .button-toggle' ).focus(); }, 500 );
				}
			});		
					
		})();
	
	
		/**
		 * Primary nav menu.
		 */
		(function() {
			$( '#navigation .current-menu-item' ).parents( '.sub-menu' ).show()
				.prev( '.submenu-switch' ).find( '.fa' ).removeClass( 'fa-angle-down' ).addClass( 'fa-angle-up' );
			
			$( '#navigation .submenu-switch' ).click(function() {
				var $switch = $(this);
				$switch.next( '.sub-menu' ).toggle( 500, function() {
					$switch.find( '.fa' ).toggleClass( 'fa-angle-down fa-angle-up' );
					
					if ( 'true' == $switch.attr( 'aria-expanded' ) ) {
						$switch.attr( 'aria-expanded', 'false' );
					} else {
						$switch.attr( 'aria-expanded', 'true' );
					}
					
					$screenReader = $switch.find( '.screen-reader-text' );
					if ( dethrives.expandMenu == $screenReader.text() ) {
						$screenReader.text( dethrives.collapseMenu );
					} else {
						$screenReader.text( dethrives.expandMenu );
					}
				});
			});
			
		})();
	
		
		/**
		 * Widgets.
		 */
		(function() {
			// Add widget titles icons and lists icons.
			$( '.widget_recent_entries li' ).prepend( '<span class="fa fa-file-text-o"></span>' );
			$( '.widget_categories li' ).prepend( '<span class="fa fa-folder-o"></span>' );
			$( '.widget_pages li' ).prepend( '<span class="fa fa-file-o"></span>' );
			$( '.widget_recent_comments li' ).prepend( '<span class="fa fa-comment-o"></span>' );
			$( '.widget_meta li' ).prepend( '<span class="fa fa-gear"></span>' );
			$( '.widget_archive li' ).prepend( '<span class="fa fa-calendar"></span>' );
			$( '.widget_rss li' ).prepend( '<span class="fa fa-rss"></span>' );
			$( '.widget_nav_menu li' ).prepend( '<span class="fa fa-chain"></span>' );
		})();
	
	
		/**
		 * Post content header.
		 */
		(function() {
			// Hide the featured label and the post format icon.
			if ( isLgScreen() ) {
				$( '.post-thumbnail img' ).hover(function() {
					$( '.has-post-thumbnail .sticky-post, .has-post-thumbnail .entry-format' ).addClass( 'meta-hide' );
				}, function() {
					$( '.has-post-thumbnail .sticky-post, .has-post-thumbnail .entry-format' ).removeClass( 'meta-hide' );
				});
			}
		})();
		
		
		/**
		 * Make video responsive
		 */
		(function() {
			if ( '16:9' == dethrives.videoResponsive ) {
				var container = '<div class="dethrives-video-container"></div>';
				$( '.entry-content iframe, .entry-content object, .entry-content video, .entry-content embed, .textwidget iframe, .textwidget object, .textwidget video, .textwidget embed' )
					.wrap( container );
				
				$( '.wp-video-shortcode' ).unwrap( container );
			}
		})();
		
		/**
		 * Always put the footer at the bottom of page.
		 */
		(function() {
			FooterToBottom();
			$(window).resize(function() {
				FooterToBottom();
			});
			
			function FooterToBottom() {
				if ( ! isLgScreen() ) {
					return;
				}
				
				var mainHeight = $( '.site-main' ).innerHeight();
				var adminbarHeight = $( '#wpadminbar' ).height();
				var windowHeight = $( window ).height();
				var footHeight = $( '#colophon' ).innerHeight();
				var containerHeight = mainHeight + adminbarHeight + footHeight;
				if ( containerHeight < windowHeight ) {
					$( '.site-main' ).css( 'min-height', ( windowHeight - containerHeight + mainHeight ) + 'px' );
				}			
			}
		})();	
	
	});	
	
	
	/** -------------------------------------------------------------------------------------------------------------------------------
	 * Functions.
	 *  -------------------------------------------------------------------------------------------------------------------------------
	 */
	
	/**
	 * Media screen ( max-width: 600px ).
	 */	
	function isSmScreen() {
		if ( 'block' == $( '.site-description' ).css( 'display' ) ) {
			return false;
		} else {
			return true;
		}
	}
	
	/**
	 * Media screen ( min-width: 600px and max-width: 991px ).
	 */	
	function isMdScreen() {
		if ( 'fixed' == $( '#primary-sidebar' ).css( 'position' ) ) {
			return false;
		} else {
			if ( isSmScreen() ) {
				return false;
			} else {
				return true;
			}
		}
	}
	
	/**
	 * Media screen ( mim-width: 992px ).
	 */	
	function isLgScreen() {
		if ( isMdScreen() || isSmScreen() ) {
			return false;
		} else {
			return true;
		}
	}					
	
})(jQuery)