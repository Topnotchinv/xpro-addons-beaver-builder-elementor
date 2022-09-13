var XPROBlogPosts;

(function($) {

	/**
	 * Class for Blog Posts Module
	 *
	 * @since 1.6.1
	 */
	XPROBlogPosts = function( settings ){

		// set params
		this.nodeClass                 = '.fl-node-' + settings.id;
		this.id                        = settings.id;
		this.wrapperClass              = this.nodeClass + ' .xpro-blog-posts';
		this.postClass                 = this.nodeClass + ' .xpro-post-wrapper';
		this.pagination                = settings.pagination;
		this.is_carousel               = settings.is_carousel;
		this.infinite                  = settings.infinite;
		this.arrows                    = settings.arrows;
		this.desktop                   = settings.desktop;
		this.moduleUrl                 = settings.moduleUrl;
		this.loaderUrl                 = settings.loaderUrl;
		this.prevArrow                 = settings.prevArrow;
		this.nextArrow                 = settings.nextArrow;
		this.medium                    = settings.medium;
		this.small                     = settings.small;
		this.slidesToScroll            = settings.slidesToScroll;
		this.autoplay                  = settings.autoplay;
		this.autoplaySpeed             = settings.autoplaySpeed;
		this.dots                      = settings.dots;
		this.small_breakpoint          = settings.small_breakpoint;
		this.medium_breakpoint         = settings.medium_breakpoint;
		this.equal_height_box          = settings.equal_height_box;
		this.mesonry_equal_height      = settings.mesonry_equal_height;
		this.xpro_masonary_filter_type = settings.xpro_masonary_filter_type

		if ( this.is_carousel === 'carousel' ) {
			this._xproBlogPostCarousel();
			if ( this.equal_height_box === 'yes' ) {
				jQuery( this.nodeClass ).find( '.xpro-blog-posts-carousel' ).on( 'afterChange', this._xproBlogPostCarouselHeight );
				jQuery( this.nodeClass ).find( '.xpro-blog-posts-carousel' ).on( 'init', $.proxy( this._xproBlogPostCarouselEqualHeight, this ) );
			}
		} else if ( this.is_carousel === 'masonary' ) {
			this._xproBlogPostMasonary();
		} else if ( this.is_carousel === 'grid' ) {
			this._xproBlogPostGrid();
		}

		if ( settings.blog_image_position === 'background' ) {
			this._xproBlogPostImageResize();
		}

		if (this._hasPosts()) {
            this._initInfiniteScroll();
		}

		this._openOnLink();
	};

	XPROBlogPosts.prototype = {
		nodeClass               : '',
		wrapperClass            : '',
		is_carousel             : 'grid',
		infinite                : '',
		arrows                  : '',
		desktop                 : '',
		medium                  : '',
		small                   : '',
		slidesToScroll          : '',
		autoplay                : '',
		autoplaySpeed           : '',
		small_breakpoint        : '',
		medium_breakpoint       : '',
		equal_height_box        : 'yes',
		mesonry_equal_height    : 'no',
		xpro_masonary_filter_type : 'buttons',

		_hasPosts: function()
		{
			return $( this.postClass ).length > 0;
		},

		_initInfiniteScroll: function()
		{
			if (this.pagination === 'scroll' && typeof FLBuilder === 'undefined') {
				var $this = this;
				setTimeout(
					function(){
						$this._infiniteScroll();
					},
					500
				);
			}
		},

		_infiniteScroll: function(settings)
		{
			var path        = $( this.nodeClass + ' .xpro-blogs-pagination a.next' ).attr( 'href' );
				pagePattern = /(.*?(\/|\&|\?)paged-[0-9]{1,}(\/|=))([0-9]{1,})+(.*)/;
				wpPattern   = /^(.*?\/?page\/?)(?:\d+)(.*?$)/;
				pageMatched = null;

				scrollData = {
					navSelector     : this.nodeClass + ' .xpro-blogs-pagination',
					nextSelector    : this.nodeClass + ' .xpro-blogs-pagination a.next',
					itemSelector    : this.postClass,
					prefill         : true,
					bufferPx        : 200,
					loading         : {
						msgText         : 'Loading',
						finishedMsg     : '',
						img             : this.moduleUrl + '/img/ajax-loader-grey.gif',
						speed           : 10,
					}
			};
			if ( pagePattern.test( path ) ) {
				scrollData.path = function( currPage ){
					pageMatched = path.match( pagePattern );
					path        = pageMatched[1] + currPage + pageMatched[5];
					return path;
				}
			} else if ( wpPattern.test( path ) ) {
				scrollData.path = path.match( wpPattern ).slice( 1 );
			}

			$( this.wrapperClass ).infinitescroll( scrollData, $.proxy( this._infiniteScrollComplete, this ) );
		},

		_infiniteScrollComplete: function(elements)
		{
			var wrap = $( this.wrapperClass );
			elements = $( elements );
			if ( this.is_carousel === 'masonary' || this.is_carousel === 'grid' ) {
				wrap.isotope( 'appended', elements );
			}
		},

		_xproBlogPostCarousel: function() {
			if ( this.equal_height_box === 'yes' ) {
				this._xproBlogPostCarouselEqualHeight();
			}

			var grid = jQuery( this.nodeClass ).find( '.xpro-blog-posts-carousel' );

			jQuery( this.nodeClass ).find( '.xpro-blog-posts-carousel' ).xproslick(
				{
					dots: this.dots,
					infinite: this.infinite,
					arrows: this.arrows,
					lazyLoad: 'ondemand',
					slidesToShow: this.desktop,
					slidesToScroll: this.slidesToScroll,
					autoplay: this.autoplay,
					prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class=" ' + this.prevArrow + ' "></i></button>',
					nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="' + this.nextArrow + ' "></i></button>',
					autoplaySpeed: this.autoplaySpeed,
					adaptiveHeight: false,
					responsive: [
					{
						breakpoint: this.medium_breakpoint,
						settings: {
							slidesToShow: this.medium,
							slidesToScroll: this.medium,
						}
					},
					{
						breakpoint: this.small_breakpoint,
						settings: {
							slidesToShow: this.small,
							slidesToScroll: this.small,
						}
					}
					]
				}
			);
		},

		_xproBlogPostMasonary: function() {

			var id        = this.id,
				nodeClass = this.nodeClass;

			if ( this.mesonry_equal_height === 'yes' ) {
				LayoutMode = 'fitRows';
			} else {
				LayoutMode = 'masonry';
			}

			$grid = jQuery( nodeClass ).find( '.xpro-blog-posts-masonary' ).isotope(
				{
					layoutMode: LayoutMode,
					itemSelector: '.xpro-blog-posts-masonary-item-' + this.id,
					masonry: {
						columnWidth: '.xpro-blog-posts-masonary-item-' + this.id
					}
				}
			);

			if ( this.xpro_masonary_filter_type === 'drop-down' ) {

				jQuery( nodeClass ).find( '.xpro-masonary-filters' ).on(
					'change',
					function() {
						value = jQuery( nodeClass ).find( '.xpro-masonary-filters option:selected' ).data( 'filter' );
						jQuery( nodeClass + ' .xpro-blog-posts-masonary' ).isotope( { filter: value } )
					}
				);
			} else {
				jQuery( nodeClass ).find( '.xpro-masonary-filters .xpro-masonary-filter-' + id ).on(
					'click',
					function(){
						jQuery( this ).siblings().removeClass( 'xpro-masonary-current' );
						jQuery( this ).addClass( 'xpro-masonary-current' );
						var value = jQuery( this ).data( 'filter' );
						jQuery( nodeClass + ' .xpro-blog-posts-masonary' ).isotope( { filter: value } )
					}
				);
			}

			if ( this.mesonry_equal_height === 'yes' ) {
				this._xproBlogPostMesonryHeight();
			}
		},

		_xproBlogPostGrid: function() {

			var id         = this.id,
				nodeClass  = this.nodeClass,
				LayoutMode = 'fitRows';

			$grid = jQuery( nodeClass ).find( '.xpro-blog-posts-grid' ).isotope(
				{
					layoutMode: LayoutMode,
					itemSelector: '.xpro-blog-posts-grid-item-' + this.id,
					masonry: {
						columnWidth: '.xpro-blog-posts-grid-item-' + this.id
					}
				}
			);

			if ( this.xpro_masonary_filter_type === 'drop-down' ) {

				jQuery( nodeClass ).find( '.xpro-masonary-filters' ).on(
					'change',
					function() {
						value = jQuery( nodeClass ).find( '.xpro-masonary-filters option:selected' ).data( 'filter' );
						jQuery( nodeClass + ' .xpro-blog-posts-grid' ).isotope( { filter: value } )
					}
				);
			} else {
				jQuery( nodeClass ).find( '.xpro-masonary-filters .xpro-masonary-filter-' + id ).on(
					'click',
					function(){
						jQuery( this ).siblings().removeClass( 'xpro-masonary-current' );
						jQuery( this ).addClass( 'xpro-masonary-current' );
						var value = jQuery( this ).data( 'filter' );
						jQuery( nodeClass + ' .xpro-blog-posts-grid' ).isotope( { filter: value } )
					}
				);
			}
			if ( this.equal_height_box === 'yes' ) {
				this._xproBlogPostMesonryHeight();
			}
		},

		_openOnLink : function() {
			var nodeClass = jQuery( this.nodeClass );
			if ( this.is_carousel === 'masonary' ) {
				var layoutClass = '.xpro-blog-posts-masonary';
			} else if ( this.is_carousel === 'grid' ) {
				var layoutClass = '.xpro-blog-posts-grid';
			}

			// Regexp for validating user input as ID : https://regex101.com/r/KGj6I6/1
			var pattern = new RegExp( '^[\\w\\-]+$' );

				var id = window.location.hash.substring( 1 );

			if ( pattern.test( id ) ) {

				$( this.nodeClass + layoutClass ).each(
					function() {
						var selector = $( this );

						var filters = nodeClass.find( '.xpro-masonary-filters' );

						if ( filters.length > 0 ) {

							if ( '' !== id ) {

								id      = '.' + id.toLowerCase();
								def_cat = id;

								def_cat_sel = filters.find( '[data-filter="' + id + '"]' );

								if ( 0 === def_cat_sel.length ) {
                                    return;
								}

								if ( def_cat_sel.length > 0 ) {

									def_cat_sel.siblings().removeClass( 'xpro-masonary-current' );

									def_cat_sel.addClass( 'xpro-masonary-current' );
								}
							}
						}

						selector.isotope(
							{
								filter: def_cat,
							}
						);

					}
				);
			}
		},

		_xproBlogPostCarouselEqualHeight: function() {

			var id                = this.id,
				nodeClass         = this.nodeClass,
				small_breakpoint  = this.small_breakpoint,
				medium_breakpoint = this.medium_breakpoint,
				desktop           = this.desktop,
				medium            = this.medium,
				small             = this.small,
				node              = jQuery( nodeClass ),
				grid              = node.find( '.xpro-blog-posts' ),
				post_wrapper      = grid.find( '.xpro-post-wrapper' ),
				post_active       = grid.find( '.xpro-post-wrapper.slick-active' ),
				max_height        = -1,
				wrapper_height    = -1,
				i                 = 1,
				counter           = parseInt( desktop ),
				childEleCount     = post_wrapper.length,
				remainingNodes    = ( childEleCount % counter );

			if ( window.innerWidth <= small_breakpoint ) {
				counter = parseInt( small );
			} else if ( window.innerWidth > medium_breakpoint ) {
				counter = parseInt( desktop );
			} else {
				counter = parseInt( medium );
			}

				post_active.each(
					function() {
						var $this        = jQuery( this ),
						this_height      = $this.outerHeight(),
						selector         = $this.find( '.xpro-blog-posts-shadow' ),
						blog_post        = $this.find( '.xpro-blog-post-inner-wrap' ),
						selector_height  = selector.outerHeight(),
						blog_post_height = blog_post.outerHeight();

						if ( max_height < blog_post_height ) {
							max_height = blog_post_height;
						}

						if ( wrapper_height < this_height ) {
							wrapper_height = this_height
						}
					}
				);

				post_active.each(
					function() {
						var $this = jQuery( this );

						$this.find( '.xpro-blog-posts-shadow' ).css( 'height', max_height );
					}
				);

				grid.find( '.slick-list.draggable' ).animate( { height: max_height }, { duration: 200, easing: 'linear' } );

				max_height     = -1;
				wrapper_height = -1;

				post_wrapper.each(
					function() {
						$this           = jQuery( this ),
						selector        = $this.find( '.xpro-blog-posts-shadow' ),
						selector_height = selector.outerHeight();

						if ( $this.hasClass( 'slick-active' ) ) {
							return true;
						}

						selector.css( 'height', selector_height );
					}
				);
		},

		_xproBlogPostCarouselHeight: function( slick, currentSlide ) {

			var id             = $( this ).parents( '.fl-module-blog-posts' ).data( 'node' ),
				nodeClass      = '.fl-node-' + id,
				grid           = $( nodeClass ).find( '.xpro-blog-posts-carousel' ),
				post_wrapper   = grid.find( '.xpro-post-wrapper' ),
				post_active    = grid.find( '.xpro-post-wrapper.slick-active' ),
				max_height     = -1,
				wrapper_height = -1;

			post_active.each(
				function( i ) {
					var this_height  = $( this ).outerHeight(),
					blog_post        = $( this ).find( '.xpro-blog-post-inner-wrap' ),
					blog_post_height = blog_post.outerHeight();

					if ( max_height < blog_post_height ) {
						max_height = blog_post_height;
					}

					if ( wrapper_height < this_height ) {
						wrapper_height = this_height
					}
				}
			);

			post_active.each(
				function( i ) {
					var selector = jQuery( this ).find( '.xpro-blog-posts-shadow' );
					selector.css( "height", max_height );
				}
			);

			grid.find( '.slick-list.draggable' ).animate( { height: max_height }, { duration: 200, easing: 'linear' } );

			max_height     = -1;
			wrapper_height = -1;

			post_wrapper.each(
				function() {
					var $this        = jQuery( this ),
					selector         = $this.find( '.xpro-blog-posts-shadow' ),
					blog_post        = $this.find( '.xpro-blog-post-inner-wrap' ),
					blog_post_height = blog_post.outerHeight();

					if ( $this.hasClass( 'slick-active' ) ) {
						return true;
					}

					selector.css( 'height', blog_post_height );
				}
			);
		},

		_xproBlogPostMesonryHeight: function() {

			var id             = this.id,
				nodeClass      = '.fl-node-' + id,
				max_height     = -1,
				wrapper_height = -1;

			if ( this.is_carousel === 'masonary' ) {
				var grid = $( nodeClass ).find( '.xpro-blog-posts-masonary' );
			} else if ( this.is_carousel === 'grid' ) {
				var grid = $( nodeClass ).find( '.xpro-blog-posts-grid' );
			}
			var post_wrapper = grid.find( '.xpro-post-wrapper' );

			post_wrapper.each(
				function( i ) {
					var this_height  = $( this ).outerHeight(),
					blog_post        = $( this ).find( '.xpro-blog-post-inner-wrap' ),
					blog_post_height = blog_post.outerHeight();

					if ( max_height < blog_post_height ) {
						max_height = blog_post_height;
					}

					if ( wrapper_height < this_height ) {
						wrapper_height = this_height
					}

				}
			);

			post_wrapper.each(
				function( i ) {
					var selector = jQuery( this ).find( '.xpro-blog-posts-shadow' );
					selector.css( "height", max_height );
				}
			);
		},

		_xproBlogPostImageResize: function() {
			var id                = this.id,
				nodeClass         = this.nodeClass,
				small_breakpoint  = this.small_breakpoint,
				medium_breakpoint = this.medium_breakpoint,
				node              = jQuery( nodeClass ),
				grid              = node.find( '.xpro-blog-posts' );

			grid.find( '.xpro-post-wrapper' ).each(
				function() {
					var img_selector = jQuery( this ).find( '.xpro-post-thumbnail' ),
					img_wrap_height  = parseInt( img_selector.height() ),
					img_height       = parseInt( img_selector.find( 'img' ).height() );

					if ( ! isNaN( img_wrap_height ) && ! isNaN( img_height ) ) {
						if ( img_wrap_height >= img_height ) {
							img_selector.find( 'img' ).css( 'min-height', '100%' );

						} else {
							img_selector.find( 'img' ).css( 'min-height', '' );
						}
					}
				}
			);
		}
	};

})( jQuery );


(function($){
	XPROTrigger = {

		/**
		 * Trigger a hook.
		 *
		 * @since 1.1.0.3
		 * @method triggerHook
		 * @param {String} hook The hook to trigger.
		 * @param {Array} args An array of args to pass to the hook.
		 */
		triggerHook: function( hook, args )
		{
			$( 'body' ).trigger( 'xpro-trigger.' + hook, args );
		},

		/**
		 * Add a hook.
		 *
		 * @since 1.1.0.3
		 * @method addHook
		 * @param {String} hook The hook to add.
		 * @param {Function} callback A function to call when the hook is triggered.
		 */
		addHook: function( hook, callback )
		{
			$( 'body' ).on( 'xpro-trigger.' + hook, callback );
		},

		/**
		 * Remove a hook.
		 *
		 * @since 1.1.0.3
		 * @method removeHook
		 * @param {String} hook The hook to remove.
		 * @param {Function} callback The callback function to remove.
		 */
		removeHook: function( hook, callback )
		{
			$( 'body' ).off( 'xpro-trigger.' + hook, callback );
		},
	};
})( jQuery );

jQuery( document ).ready(
	function( $ ) {

		if ( typeof bowser !== 'undefined' && bowser !== null ) {

				var xpro_browser = bowser.name,
			xpro_browser_v       = bowser.version,
			xpro_browser_class   = xpro_browser.replace( /\s+/g, '-' ).toLowerCase(),
			xpro_browser_v_class = xpro_browser_class + parseInt( xpro_browser_v );

				$( 'html' ).addClass( xpro_browser_class ).addClass( xpro_browser_v_class );

		}

		$( '.xpro-row-separator' ).parents( 'html' ).css( 'overflow-x', 'hidden' );
	}
);
