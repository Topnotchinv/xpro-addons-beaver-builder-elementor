<?php
/**
 * Render JavaScript to check function the various settings of module
 *
 * @package XPRO Blog Posts Module
 */

?>

(function($) {

	var document_width, document_height;
	<?php
		$adv_post_type = empty( $settings->post_type ) ? 'post' : $settings->post_type;
		$filter_type   = 'xpro_masonary_filter_type_' . $adv_post_type;
	?>
	var args = {
		id: '<?php echo esc_attr( $id ); ?>',
		pagination: '<?php echo isset( $settings->pagination ) ? esc_attr( $settings->pagination ) : 'numbers'; ?>',
		is_carousel: '<?php echo isset( $settings->is_carousel ) ? esc_attr( $settings->is_carousel ) : 'grid'; ?>',
		infinite: <?php echo ( 'yes' === $settings->infinite_loop ) ? 'true' : 'false'; ?>,
		arrows: <?php echo ( 'yes' === $settings->enable_arrow ) ? 'true' : 'false'; ?>,
		desktop: <?php echo ( '' !== $settings->post_per_grid ) ? esc_attr( $settings->post_per_grid ) : 1; ?>,
		moduleUrl: '<?php echo esc_url( XPRO_ADDONS_FOR_BB_URL ) . 'modules/' . esc_attr( $settings->type ); ?>',
		medium: <?php echo ( '' !== $settings->post_per_grid_medium ) ? esc_attr( $settings->post_per_grid_medium ) : 1; ?>,
		small: <?php echo ( '' !== $settings->post_per_grid_responsive ) ? esc_attr( $settings->post_per_grid_responsive ) : 1; ?>,
		slidesToScroll: <?php echo ( '' !== $settings->slides_to_scroll ) ? esc_attr( $settings->slides_to_scroll ) : 1; ?>,
		prevArrow: '<?php echo ( isset( $settings->icon_left ) && '' !== $settings->icon_left ) ? esc_attr( $settings->icon_left ) : 'fas fa-angle-left'; ?>',
		nextArrow: '<?php echo ( isset( $settings->icon_right ) && '' !== $settings->icon_right ) ? esc_attr( $settings->icon_right ) : 'fas fa-angle-right'; ?>',
		autoplay: <?php echo ( 'yes' === $settings->autoplay ) ? 'true' : 'false'; ?>,
		autoplaySpeed: <?php echo ( '' !== $settings->animation_speed ) ? esc_attr( $settings->animation_speed ) : '1000'; ?>,
		dots:<?php echo ( 'yes' === $settings->enable_dots ) ? 'true' : 'false'; ?>,
		small_breakpoint: <?php echo esc_attr( $global_settings->responsive_breakpoint ); ?>,
		medium_breakpoint: <?php echo esc_attr( $global_settings->medium_breakpoint ); ?>,
		equal_height_box: '<?php echo esc_attr( $settings->equal_height_box ); ?>',
		xpro_masonary_filter_type: '<?php echo isset( $settings->$filter_type ) ? esc_attr( $settings->$filter_type ) : 'buttons'; ?>',
		mesonry_equal_height: '<?php echo isset( $settings->mesonry_equal_height ) ? esc_attr( $settings->mesonry_equal_height ) : 'no'; ?>',
		blog_image_position: '<?php echo esc_attr( $settings->blog_image_position ); ?>'
	};

	jQuery(document).ready( function() {

		jQuery( '.xpro-masonary-filters .xpro-masonary-current' ).trigger('click');

		var pattern = new RegExp('^\\d+$');

		var hashval = window.location.hash.substring(1);

		if ( pattern.test( hashval ) ) {


			if( hashval !== '' ) {

				jQuery('.fl-node-<?php echo esc_attr( $id ); ?> .xpro-masonary-filters li').removeClass('xpro-masonary-current');

				jQuery('.fl-node-<?php echo esc_attr( $id ); ?> .xpro-masonary-filters li[data-filter=".xpro-masonary-cat-' + hashval + '"]').addClass('xpro-masonary-current');

				jQuery( '.fl-node-<?php echo esc_attr( $id ); ?> .xpro-masonary-filters .xpro-masonary-filter-<?php echo esc_attr( $id ); ?>.xpro-masonary-current' ).trigger('click');
			}
		}


		document_width = $( document ).width();
		document_height = $( document ).height();

		/* Accordion Click Trigger */
		XPROTrigger.addHook( 'xpro-accordion-click', function( argument, selector ) {

			var is_carousel = '<?php echo isset( $settings->is_carousel ) ? esc_attr( $settings->is_carousel ) : 'grid'; ?>';

			var child_id = jQuery(selector+' .fl-module-blog-posts').data('node');
			if( child_id !== null ) {

				if( is_carousel === 'carousel' ) {
					jQuery( '.fl-node-' + child_id ).find( '.xpro-blog-posts-carousel' ).xproslick('unslick');
				}

				var child_args = {
					id: child_id,
					is_carousel: '<?php echo isset( $settings->is_carousel ) ? esc_attr( $settings->is_carousel ) : 'grid'; ?>',
					infinite: <?php echo ( 'yes' === $settings->infinite_loop ) ? 'true' : 'false'; ?>,
					arrows: <?php echo ( 'yes' === $settings->enable_arrow ) ? 'true' : 'false'; ?>,
					desktop: <?php echo ( '' !== $settings->post_per_grid ) ? esc_attr( $settings->post_per_grid ) : 1; ?>,
					medium: <?php echo ( '' !== $settings->post_per_grid_medium ) ? esc_attr( $settings->post_per_grid_medium ) : 1; ?>,
					small: <?php echo ( '' !== $settings->post_per_grid_responsive ) ? esc_attr( $settings->post_per_grid_responsive ) : 1; ?>,
					slidesToScroll: <?php echo ( '' !== $settings->slides_to_scroll ) ? esc_attr( $settings->slides_to_scroll ) : 1; ?>,
					autoplay: <?php echo ( 'yes' === $settings->autoplay ) ? 'true' : 'false'; ?>,
					autoplaySpeed: <?php echo ( '' !== $settings->animation_speed ) ? esc_attr( $settings->animation_speed ) : '1000'; ?>,
					small_breakpoint: <?php echo esc_attr( $global_settings->responsive_breakpoint ); ?>,
					medium_breakpoint: <?php echo esc_attr( $global_settings->medium_breakpoint ); ?>,
					equal_height_box: '<?php echo esc_attr( $settings->equal_height_box ); ?>',
					blog_image_position: '<?php echo esc_attr( $settings->blog_image_position ); ?>'
				};
				new XPROBlogPosts( child_args );
			}
		});

		/* Accordion Click Trigger */
		XPROTrigger.addHook( 'xpro-modal-click', function( argument, selector ) {

			var is_carousel = '<?php echo isset( $settings->is_carousel ) ? esc_attr( $settings->is_carousel ) : 'grid'; ?>';

			var child_id = jQuery(selector+' .fl-module-blog-posts').data('node');
			if( child_id !== null ) {

				if( is_carousel === 'carousel' ) {
					jQuery( '.fl-node-' + child_id ).find( '.xpro-blog-posts-carousel' ).xproslick('unslick');
				}

				var child_args = {
					id: child_id,
					is_carousel: '<?php echo isset( $settings->is_carousel ) ? esc_attr( $settings->is_carousel ) : 'grid'; ?>',
					infinite: <?php echo ( 'yes' === $settings->infinite_loop ) ? 'true' : 'false'; ?>,
					arrows: <?php echo ( 'yes' === $settings->enable_arrow ) ? 'true' : 'false'; ?>,
					desktop: <?php echo ( '' !== $settings->post_per_grid ) ? esc_attr( $settings->post_per_grid ) : 1; ?>,
					medium: <?php echo ( '' !== $settings->post_per_grid_medium ) ? esc_attr( $settings->post_per_grid_medium ) : 1; ?>,
					small: <?php echo ( '' !== $settings->post_per_grid_responsive ) ? esc_attr( $settings->post_per_grid_responsive ) : 1; ?>,
					slidesToScroll: <?php echo ( '' !== $settings->slides_to_scroll ) ? esc_attr( $settings->slides_to_scroll ) : 1; ?>,
					autoplay: <?php echo ( 'yes' === $settings->autoplay ) ? 'true' : 'false'; ?>,
					autoplaySpeed: <?php echo ( '' !== $settings->animation_speed ) ? esc_attr( $settings->animation_speed ) : '1000'; ?>,
					small_breakpoint: <?php echo esc_attr( $global_settings->responsive_breakpoint ); ?>,
					medium_breakpoint: <?php echo esc_attr( $global_settings->medium_breakpoint ); ?>,
					equal_height_box: '<?php echo esc_attr( $settings->equal_height_box ); ?>',
					blog_image_position: '<?php echo esc_attr( $settings->blog_image_position ); ?>'
				};
				new XPROBlogPosts( child_args );
			}
		});

		/* Tab Click Trigger */
		XPROTrigger.addHook( 'xpro-tab-click', function( argument, selector ) {
			var is_carousel = '<?php echo isset( $settings->is_carousel ) ? esc_attr( $settings->is_carousel ) : 'grid'; ?>';

			var child_id = jQuery(selector+' .fl-module-blog-posts').data('node');
			if( child_id !== null ) {

				if( is_carousel === 'carousel' ) {
					jQuery( '.fl-node-' + child_id ).find( '.xpro-blog-posts-carousel' ).xproslick('unslick');
				}

				var child_args = {
					id: child_id,
					is_carousel: '<?php echo isset( $settings->is_carousel ) ? esc_attr( $settings->is_carousel ) : 'grid'; ?>',
					infinite: <?php echo ( 'yes' === $settings->infinite_loop ) ? 'true' : 'false'; ?>,
					arrows: <?php echo ( 'yes' === $settings->enable_arrow ) ? 'true' : 'false'; ?>,
					desktop: <?php echo ( '' !== $settings->post_per_grid ) ? esc_attr( $settings->post_per_grid ) : 1; ?>,
					medium: <?php echo ( '' !== $settings->post_per_grid_medium ) ? esc_attr( $settings->post_per_grid_medium ) : 1; ?>,
					small: <?php echo ( '' !== $settings->post_per_grid_responsive ) ? esc_attr( $settings->post_per_grid_responsive ) : 1; ?>,
					slidesToScroll: <?php echo ( '' !== $settings->slides_to_scroll ) ? esc_attr( $settings->slides_to_scroll ) : 1; ?>,
					autoplay: <?php echo ( 'yes' === $settings->autoplay ) ? 'true' : 'false'; ?>,
					autoplaySpeed: <?php echo ( '' !== $settings->animation_speed ) ? esc_attr( $settings->animation_speed ) : '1000'; ?>,
					small_breakpoint: <?php echo esc_attr( $global_settings->responsive_breakpoint ); ?>,
					medium_breakpoint: <?php echo esc_attr( $global_settings->medium_breakpoint ); ?>,
					equal_height_box: '<?php echo esc_attr( $settings->equal_height_box ); ?>',
					blog_image_position: '<?php echo esc_attr( $settings->blog_image_position ); ?>'
				};
				new XPROBlogPosts( child_args );
			}

		});

	});

	jQuery(window).on("load", function() {

		new XPROBlogPosts( args );
	});

	jQuery(window).resize( function() {
		if( document_width !== $( document ).width() || document_height !== $( document ).height() ) {
			document_width = $( document ).width();
			document_height = $( document ).height();
			new XPROBlogPosts( args );
		}
	});

	new XPROBlogPosts( args );

})(jQuery);
