<?php
/**
 * Register the module's CSS file for Advanced Posts module
 *
 * @package XPRO Advanced Posts Module
 */

global $post;

$v_bb_check = '';
$converted  = '';

$settings->title_color              = XproBlogPostsModule::xpro_colorpicker( $settings, 'title_color' );
$settings->desc_color               = XproBlogPostsModule::xpro_colorpicker( $settings, 'desc_color' );
$settings->content_background_color = XproBlogPostsModule::xpro_colorpicker( $settings, 'content_background_color', true );

$settings->arrow_color            = XproBlogPostsModule::xpro_colorpicker( $settings, 'arrow_color' );
$settings->arrow_background_color = XproBlogPostsModule::xpro_colorpicker( $settings, 'arrow_background_color', true );
$settings->arrow_color_border     = XproBlogPostsModule::xpro_colorpicker( $settings, 'arrow_color_border' );

$settings->date_color            = XproBlogPostsModule::xpro_colorpicker( $settings, 'date_color' );
$settings->date_background_color = XproBlogPostsModule::xpro_colorpicker( $settings, 'date_background_color', true );
$settings->meta_color            = XproBlogPostsModule::xpro_colorpicker( $settings, 'meta_color' );
$settings->meta_text_color       = XproBlogPostsModule::xpro_colorpicker( $settings, 'meta_text_color' );
$settings->meta_hover_color      = XproBlogPostsModule::xpro_colorpicker( $settings, 'meta_hover_color' );

$settings->link_color            = XproBlogPostsModule::xpro_colorpicker( $settings, 'link_color' );
$settings->link_more_arrow_color = XproBlogPostsModule::xpro_colorpicker( $settings, 'link_more_arrow_color' );

$settings->masonary_text_color          = XproBlogPostsModule::xpro_colorpicker( $settings, 'masonary_text_color' );
$settings->taxonomy_filter_select_color = XproBlogPostsModule::xpro_colorpicker( $settings, 'taxonomy_filter_select_color' );
$settings->selfilter_background_color   = XproBlogPostsModule::xpro_colorpicker( $settings, 'selfilter_background_color' );
$settings->selfilter_color_border       = XproBlogPostsModule::xpro_colorpicker( $settings, 'selfilter_color_border' );
$settings->post_dots_color              = XproBlogPostsModule::xpro_colorpicker( $settings, 'post_dots_color' );

$settings->masonary_background_color        = XproBlogPostsModule::xpro_colorpicker( $settings, 'masonary_background_color', true );
$settings->masonary_text_hover_color        = XproBlogPostsModule::xpro_colorpicker( $settings, 'masonary_text_hover_color' );
$settings->masonary_background_hover_color  = XproBlogPostsModule::xpro_colorpicker( $settings, 'masonary_background_hover_color', true );
$settings->masonary_background_active_color = XproBlogPostsModule::xpro_colorpicker( $settings, 'masonary_background_active_color', true );
$settings->masonary_active_color            = XproBlogPostsModule::xpro_colorpicker( $settings, 'masonary_active_color' );

$settings->pagination_background_color        = XproBlogPostsModule::xpro_colorpicker( $settings, 'pagination_background_color', true );
$settings->pagination_color                   = XproBlogPostsModule::xpro_colorpicker( $settings, 'pagination_color' );
$settings->pagination_hover_color             = XproBlogPostsModule::xpro_colorpicker( $settings, 'pagination_hover_color' );
$settings->pagination_active_color            = XproBlogPostsModule::xpro_colorpicker( $settings, 'pagination_active_color' );
$settings->pagination_hover_background_color  = XproBlogPostsModule::xpro_colorpicker( $settings, 'pagination_hover_background_color', true );
$settings->pagination_active_background_color = XproBlogPostsModule::xpro_colorpicker( $settings, 'pagination_active_background_color', true );
$settings->pagination_active_color_border     = XproBlogPostsModule::xpro_colorpicker( $settings, 'pagination_active_color_border' );
$settings->masonary_border_size               = ( '' !== $settings->masonary_border_size ) ? $settings->masonary_border_size : '2';
$settings->masonary_color_border              = XproBlogPostsModule::xpro_colorpicker( $settings, 'masonary_color_border' );
$settings->masonary_active_color_border       = XproBlogPostsModule::xpro_colorpicker( $settings, 'masonary_active_color_border' );

$settings->overlay_color = XproBlogPostsModule::xpro_colorpicker( $settings, 'overlay_color', true );

$settings->title_margin_top    = ( isset( $settings->title_margin_top ) ) ? $settings->title_margin_top : '';
$settings->title_margin_bottom = ( isset( $settings->title_margin_bottom ) ) ? $settings->title_margin_bottom : '';

$settings->element_space = ( isset( $settings->element_space ) && '' !== $settings->element_space ) ? $settings->element_space : '15';

//content border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'content_area_border',
		'selector'     => ".fl-node-$id .xpro-post-wrapper .xpro-blog-post-content",
	)
);

if ( 'background' === $settings->blog_image_position ) {
	//if layout 4
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-post-wrapper .xpro-blog-post-content",
			'props'    => array(
				'padding-top' => '75px',
			),
		)
	);
}

//title typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_font_typo',
		'selector'     => ".fl-node-$id .xpro-post-heading, .fl-node-$id .xpro-post-heading a",
	)
);

//meta typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_font_typo',
		'selector'     => ".fl-node-$id .xpro-post-meta",
	)
);

//desc typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'desc_font_typo',
		'selector'     => ".fl-node-$id .xpro-blog-posts-description",
	)
);

//date typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'date_font_typo',
		'selector'     => ".fl-node-$id .xpro-posted-on",
	)
);

//cta read more typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'link_font_typo',
		'selector'     => ".fl-node-$id .xpro-read-more-text a",
	)
);

//cta btn typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'btn_font_typo',
		'selector'     => ".fl-node-$id .xpro-blog-btn-cls a",
	)
);

//box border settings
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'box_border_settings',
		'selector'     => ".fl-node-$id .xpro-blog-post-inner-wrap",
	)
);

//title padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_padding',
		'selector'     => ".fl-node-$id .xpro-post-heading",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'title_padding_top',
			'padding-right'  => 'title_padding_right',
			'padding-bottom' => 'title_padding_bottom',
			'padding-left'   => 'title_padding_left',
		),
	)
);

//title margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_margin',
		'selector'     => ".fl-node-$id .xpro-post-heading",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'title_margin_top',
			'margin-right'  => 'title_margin_right',
			'margin-bottom' => 'title_margin_bottom',
			'margin-left'   => 'title_margin_left',
		),
	)
);

//meta padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_padding',
		'selector'     => ".fl-node-$id .xpro-post-meta",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'meta_padding_top',
			'padding-right'  => 'meta_padding_right',
			'padding-bottom' => 'meta_padding_bottom',
			'padding-left'   => 'meta_padding_left',
		),
	)
);

//meta margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_margin',
		'selector'     => ".fl-node-$id .xpro-post-meta",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'meta_margin_top',
			'margin-right'  => 'meta_margin_right',
			'margin-bottom' => 'meta_margin_bottom',
			'margin-left'   => 'meta_margin_left',
		),
	)
);

//desc_content_padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'desc_content_padding',
		'selector'     => ".fl-node-$id .xpro-blog-posts-description",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'desc_content_padding_top',
			'padding-right'  => 'desc_content_padding_right',
			'padding-bottom' => 'desc_content_padding_bottom',
			'padding-left'   => 'desc_content_padding_left',
		),
	)
);

//desc_content margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'desc_content_margin',
		'selector'     => ".fl-node-$id .xpro-blog-posts-description",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'desc_content_margin_top',
			'margin-right'  => 'desc_content_margin_right',
			'margin-bottom' => 'desc_content_margin_bottom',
			'margin-left'   => 'desc_content_margin_left',
		),
	)
);

//cta padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'cta_padding',
		'selector'     => ".fl-node-$id .xpro-read-more-text, .fl-node-$id .xpro-blog-btn-cls a",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'cta_padding_top',
			'padding-right'  => 'cta_padding_right',
			'padding-bottom' => 'cta_padding_bottom',
			'padding-left'   => 'cta_padding_left',
		),
	)
);

//cta margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'cta_margin',
		'selector'     => ".fl-node-$id .xpro-read-more-text, .fl-node-$id .xpro-blog-btn-cls",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'cta_margin_top',
			'margin-right'  => 'cta_margin_right',
			'margin-bottom' => 'cta_margin_bottom',
			'margin-left'   => 'cta_margin_left',
		),
	)
);

//pagination padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'pagination_padding',
		'selector'     => ".fl-node-$id .xpro-blogs-pagination",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'pagination_padding_top',
			'padding-right'  => 'pagination_padding_right',
			'padding-bottom' => 'pagination_padding_bottom',
			'padding-left'   => 'pagination_padding_left',
		),
	)
);

//pagination margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'pagination_margin',
		'selector'     => ".fl-node-$id .xpro-blogs-pagination",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'pagination_margin_top',
			'margin-right'  => 'pagination_margin_right',
			'margin-bottom' => 'pagination_margin_bottom',
			'margin-left'   => 'pagination_margin_left',
		),
	)
);

// enable_order
if ( 'yes' === $settings->enable_sorting_order ) {
	//main class for enabling sorting css
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-blog-post-content",
			'props'    => array(
				'display'        => 'flex',
				'flex-direction' => 'column',
			),
		)
	);
	//title sort
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-post-heading",
			'props'    => array(
				'order' => $settings->title_sort,
			),
		)
	);
	//meta sort
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-post-meta",
			'props'    => array(
				'order' => $settings->meta_sort,
			),
		)
	);
	//content
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-blog-posts-description",
			'props'    => array(
				'order' => $settings->content_sort,
			),
		)
	);
	//cta
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-read-more-text, .fl-node-$id .xpro-blog-btn-cls, .fl-node-$id .xpro-blog-btn-sec ",
			'props'    => array(
				'order' => $settings->cta_sort,
			),
		)
	);
}

if ( 'custom' === $settings->featured_image_size ) {

	if ( $settings->blog_image_position !== 'background' ) {
		if ( $settings->custom_image_box_height ) {
			//img box height
			FLBuilderCSS::rule(
				array(
					'selector' => ".fl-node-$id .xpro-post-wrapper .xpro-post-thumbnail",
					'props'    => array(
						'height' => $settings->custom_image_box_height . 'px',
					),
				)
			);
		}
	}

	if ( $settings->custom_image_size_height ) {
		//custom img height
		FLBuilderCSS::rule(
			array(
				'selector' => ".fl-node-$id .xpro-blog-posts .xpro-post-thumbnail img",
				'props'    => array(
					'height' => $settings->custom_image_size_height . 'px',
				),
			)
		);
	}

	( ! empty( $settings->custom_image_width_type ) ? $img_width_type = $settings->custom_image_width_type : '' );

	if ( $settings->custom_image_size_width ) {
		//custom img width
		FLBuilderCSS::rule(
			array(
				'selector' => ".fl-node-$id .xpro-blog-posts .xpro-post-thumbnail img",
				'props'    => array(
					'width' => $settings->custom_image_size_width . $img_width_type,
				),
			)
		);
	}

	if ( $settings->custom_image_type ) {
		//image type
		FLBuilderCSS::rule(
			array(
				'selector' => ".fl-node-$id .xpro-blog-posts .xpro-post-thumbnail img",
				'props'    => array(
					'object-fit' => $settings->custom_image_type,
				),
			)
		);
	}

	if ( $settings->img_box_bg_color ) {
		//bg color option of container
		FLBuilderCSS::rule(
			array(
				'selector' => ".fl-node-$id .xpro-post-wrapper .xpro-post-thumbnail",
				'props'    => array(
					'background-color' => $settings->img_box_bg_color,
				),
			)
		);
	}

	//img box border
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'img_box_border',
			'selector'     => ".fl-node-$id .xpro-post-wrapper .xpro-post-thumbnail",
		)
	);

}


$settings->show_meta = ( isset( $settings->show_meta ) ) ? $settings->show_meta : 'yes';
if ( ! $v_bb_check ) {
	$settings->pagination_color_border = XproBlogPostsModule::xpro_colorpicker( $settings, 'pagination_color_border' );
	$settings->pagination_border_size  = ( '' !== $settings->pagination_border_size ) ? $settings->pagination_border_size : '2';
}
if ( 'grid' === $settings->is_carousel ) {
	if ( 'yes' === $settings->equal_height_box ) {
		?>
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-ms-flex-wrap: wrap;
		flex-wrap: wrap;
}

.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-post-wrapper {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
}
		<?php
	}
}

if ( 'top' === $settings->blog_image_position ) {
	?>
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-post-thumbnail img {
	display: inline-block;
}
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-wrapper .xpro-post-thumbnail {
	text-align: <?php echo esc_attr( $settings->overall_alignment ); ?>;
}
	<?php
}

if ( 'yes' === $settings->equal_height_box && 'background' === $settings->blog_image_position ) {
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-thumbnail-position-background {
		height: 100%;
	}
	<?php
}

if ( 'background' === $settings->blog_image_position ) {
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-thumbnail:before {
		content: '';
	<?php echo ( '' !== $settings->overlay_color ) ? 'background: ' . esc_attr( $settings->overlay_color ) . ';' : ''; ?>
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		z-index: 1;
	}
	<?php
}

// nouman changes
if ( 'button' === $settings->cta_type ) {

	//btn bg color / gradient
	if ( 'bg-color' === $settings->btn_bg_type ) {
		$btn_bg_type = $settings->btn_bg_color;
	} elseif ( 'bg-gradient' === $settings->btn_bg_type ) {
		$btn_bg_type = FLBuilderColor::gradient( $settings->btn_background_gradient );
	}

	//btn txt color/bg color
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-blog-btn-cls a",
			'props'    => array(
				'color'            => $settings->btn_text_color,
				'background-color' => $btn_bg_type,
				'background-image' => $btn_bg_type,
			),
		)
	);

	if ( 'bg-color' === $settings->btn_bg_hv_type ) {
		$btn_bg_hv_type = $settings->btn_bg_hover_color;
	} elseif ( 'bg-gradient' === $settings->btn_bg_type ) {
		$btn_bg_hv_type = FLBuilderColor::gradient( $settings->btn_background_hover_gradient );
	}

	//btn bg txt hv color/bg hover color
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-blog-btn-cls a:hover",
			'props'    => array(
				'color'            => $settings->btn_text_hover_color,
				'background-color' => $btn_bg_hv_type,
				'background-image' => $btn_bg_hv_type,
			),
		)
	);

	//btn padding
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'button_padding_dimension',
			'selector'     => ".fl-node-$id .xpro-blog-btn-cls a",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'button_padding_dimension_top',
				'padding-right'  => 'button_padding_dimension_right',
				'padding-bottom' => 'button_padding_dimension_bottom',
				'padding-left'   => 'button_padding_dimension_left',
			),
		)
	);

	//btn border
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'button_border',
			'selector'     => ".fl-node-$id .xpro-blog-btn-cls a",
		)
	);

	//btn border hover color
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-blog-btn-cls a:hover",
			'props'    => array(
				'border-color' => $settings->border_hover_color,
			),
		)
	);

	//btn top spacing
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-blog-btn-cls",
			'props'    => array(
				'margin-top' => $settings->button_top_margin . 'px',
			),
		)
	);

}

if ( 'left' === $settings->blog_image_position || 'right' === $settings->blog_image_position ) {
	if ( 'custom' === $settings->featured_image_size ) {
		?>
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-inner-wrap .xpro-blog-post-content {
	width: calc( 100% - <?php echo esc_attr( $settings->featured_image_size_width ); ?>px );
}
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-inner-wrap .xpro-post-thumbnail {
	width: <?php echo esc_attr( $settings->featured_image_size_width ); ?>px;
}
		<?php
	}
}

if ( 'top' !== $settings->blog_image_position && 'background' !== $settings->blog_image_position ) {
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-blog-post-inner-wrap {
		<?php
		if ( 'yes' === $converted || isset( $settings->overall_padding_dimension_top ) && '' !== $settings->overall_padding_dimension_top && isset( $settings->overall_padding_dimension_bottom ) && '' !== $settings->overall_padding_dimension_bottom && isset( $settings->overall_padding_dimension_left ) && '' !== $settings->overall_padding_dimension_left && isset( $settings->overall_padding_dimension_right ) && '' !== $settings->overall_padding_dimension_right ) {
			if ( isset( $settings->overall_padding_dimension_top ) ) {
				echo ( '' !== $settings->overall_padding_dimension_top ) ? 'padding-top:' . esc_attr( $settings->overall_padding_dimension_top ) . 'px;' : 'padding-top: 0;';
			}
			if ( isset( $settings->overall_padding_dimension_bottom ) ) {
				echo ( '' !== $settings->overall_padding_dimension_bottom ) ? 'padding-bottom:' . esc_attr( $settings->overall_padding_dimension_bottom ) . 'px;' : 'padding-bottom: 0;';
			}
			if ( isset( $settings->overall_padding_dimension_left ) ) {
				echo ( '' !== $settings->overall_padding_dimension_left ) ? 'padding-left:' . esc_attr( $settings->overall_padding_dimension_left ) . 'px;' : 'padding-left: 0;';
			}
			if ( isset( $settings->overall_padding_dimension_right ) ) {
				echo ( '' !== $settings->overall_padding_dimension_right ) ? 'padding-right:' . esc_attr( $settings->overall_padding_dimension_right ) . 'px;' : 'padding-right: 0;';
			}
		} elseif ( isset( $settings->overall_padding ) && '' !== $settings->overall_padding && isset( $settings->overall_padding_dimension_top ) && '' === $settings->overall_padding_dimension_top && isset( $settings->overall_padding_dimension_bottom ) && '' === $settings->overall_padding_dimension_bottom && isset( $settings->overall_padding_dimension_left ) && '' === $settings->overall_padding_dimension_left && isset( $settings->overall_padding_dimension_right ) && '' === $settings->overall_padding_dimension_right ) {
			echo esc_attr( $settings->overall_padding );
			?>
			;
		<?php } ?>
	}
	<?php
} else {
	if ( 'top' === $settings->blog_image_position ) {
		if ( 'img' === substr( $settings->layout_sort_order, 0, 3 ) || 'img' === substr( $settings->layout_sort_order, -3 ) ) {
			?>
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-blog-post-inner-wrap {
				<?php
				if ( 'yes' === $converted || isset( $settings->overall_padding_dimension_top ) && '' !== $settings->overall_padding_dimension_top && isset( $settings->overall_padding_dimension_bottom ) && '' !== $settings->overall_padding_dimension_bottom && isset( $settings->overall_padding_dimension_left ) && '' !== $settings->overall_padding_dimension_left && isset( $settings->overall_padding_dimension_right ) && '' !== $settings->overall_padding_dimension_right ) {
					if ( isset( $settings->overall_padding_dimension_top ) ) {
						echo ( '' !== $settings->overall_padding_dimension_top ) ? 'padding-top:' . esc_attr( $settings->overall_padding_dimension_top ) . 'px;' : 'padding-top: 0;';
					}
					if ( isset( $settings->overall_padding_dimension_bottom ) ) {
						echo ( '' !== $settings->overall_padding_dimension_bottom ) ? 'padding-bottom:' . esc_attr( $settings->overall_padding_dimension_bottom ) . 'px;' : 'padding-bottom: 0;';
					}
					if ( isset( $settings->overall_padding_dimension_left ) ) {
						echo ( '' !== $settings->overall_padding_dimension_left ) ? 'padding-left:' . esc_attr( $settings->overall_padding_dimension_left ) . 'px;' : 'padding-left: 0;';
					}
					if ( isset( $settings->overall_padding_dimension_right ) ) {
						echo ( '' !== $settings->overall_padding_dimension_right ) ? 'padding-right:' . esc_attr( $settings->overall_padding_dimension_right ) . 'px;' : 'padding-right: 0;';
					}
				} elseif ( isset( $settings->overall_padding ) && '' !== $settings->overall_padding && isset( $settings->overall_padding_dimension_top ) && '' === $settings->overall_padding_dimension_top && isset( $settings->overall_padding_dimension_bottom ) && '' === $settings->overall_padding_dimension_bottom && isset( $settings->overall_padding_dimension_left ) && '' === $settings->overall_padding_dimension_left && isset( $settings->overall_padding_dimension_right ) && '' === $settings->overall_padding_dimension_right ) {
					echo esc_attr( $settings->overall_padding );
					?>
					;
				<?php } ?>
			}
			<?php
		}
	}
}

if ( 'feed' === $settings->is_carousel ) {
	if ( 'custom' !== $settings->featured_image_size ) {
		?>
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-post-thumbnail img {
	width: 100%;
}
		<?php
	} else {
		?>
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-post-thumbnail img {
		<?php
		echo esc_attr( ( 'left' === $settings->overall_alignment ) ? 'margin: 0;margin-right: auto;' : ( ( 'right' === $settings->overall_alignment ) ? 'margin: 0;margin-left: auto;' : '' ) );
		?>
}
		<?php
	}
}

if ( 'grid' === $settings->is_carousel || 'masonary' === $settings->is_carousel ) {
	?>
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-grid,
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-masonary {
	<?php $grid_margin = ( '' !== $settings->element_space ) ? ( $settings->element_space / 2 ) : 7.5; ?>
	margin: 0 -<?php echo esc_attr( $grid_margin ); ?>px;
}
	<?php

	if ( isset( $settings->selfilter_border_enable ) && 'yes' === $settings->selfilter_border_enable ) {
		$border_style = $settings->selfilter_border_style;
	} else {
		$border_style = 'none';
	}
	?>
	<?php if ( ! $v_bb_check ) { ?>
	.fl-node-<?php echo esc_attr( $id ); ?> select.xpro-masonary-filters {
		<?php
		if ( 'Default' !== $settings->taxonomy_filter_select_font_family['family'] ) {
			XproBlogPostsModule::xpro_font_css( $settings->taxonomy_filter_select_font_family );
		}
		?>
		<?php if ( isset( $settings->taxonomy_filter_select_font_size_unit ) && '' !== $settings->taxonomy_filter_select_font_size_unit ) : ?>
			font-size: <?php echo esc_attr( $settings->taxonomy_filter_select_font_size_unit ); ?>px;
		<?php endif; ?>
	}
		<?php
	} else {
		if ( class_exists( 'FLBuilderCSS' ) ) {
			FLBuilderCSS::typography_field_rule(
				array(
					'settings'     => $settings,
					'setting_name' => 'taxonomy_filter_font_typo',
					'selector'     => ".fl-node-$id select.xpro-masonary-filters",
				)
			);
		}
	}
	?>
.fl-node-<?php echo esc_attr( $id ); ?> select.xpro-masonary-filters {
	width: <?php echo ( '' !== $settings->selfilter_width ) ? esc_attr( $settings->selfilter_width ) : '200'; ?>px;
	<?php
	echo ( XproBlogPostsModule::xpro_text_color( '' !== $settings->taxonomy_filter_select_color ) ) ? 'color: ' . esc_attr( XproBlogPostsModule::xpro_text_color( $settings->taxonomy_filter_select_color ) ) . ';' : '';

	echo ( '' !== $settings->selfilter_background_color ) ? 'background: ' . esc_attr( $settings->selfilter_background_color ) . ';' : 'background: #EFEFEF;';
	?>
	border-radius: <?php echo ( '' !== $settings->selfilter_border_radius ) ? esc_attr( $settings->selfilter_border_radius ) : '0'; ?>px;
	margin-bottom: <?php echo ( '' !== $settings->selfilter_bottom_spacing ) ? esc_attr( $settings->selfilter_bottom_spacing ) : '40'; ?>px;
	border: <?php echo esc_attr( $settings->selfilter_border_size ) . 'px ' . esc_attr( $border_style ) . ' ' . esc_attr( XproBlogPostsModule::xpro_base_color( $settings->selfilter_color_border ) ); ?>;
}
	<?php if ( ! $v_bb_check ) { ?>
		.fl-node-<?php echo esc_attr( $id ); ?> ul.xpro-masonary-filters {

			<?php
			if ( 'Default' !== $settings->taxonomy_filter_select_font_family['family'] ) {
				XproBlogPostsModule::xpro_font_css( $settings->taxonomy_filter_select_font_family );
			}
			?>

			<?php if ( isset( $settings->taxonomy_filter_select_font_size_unit ) && '' !== $settings->taxonomy_filter_select_font_size_unit ) : ?>
				font-size: <?php echo esc_attr( $settings->taxonomy_filter_select_font_size_unit ); ?>px;
			<?php endif; ?>

			<?php if ( 'none' !== $settings->taxonomy_transform ) : ?>
				text-transform: <?php echo esc_attr( $settings->taxonomy_transform ); ?>;
			<?php endif; ?>

			<?php if ( '' !== $settings->taxonomy_letter_spacing ) : ?>
				letter-spacing: <?php echo esc_attr( $settings->taxonomy_letter_spacing ); ?>px;
			<?php endif; ?>

		}
		<?php
	} else {
		if ( class_exists( 'FLBuilderCSS' ) ) {
			FLBuilderCSS::typography_field_rule(
				array(
					'settings'     => $settings,
					'setting_name' => 'taxonomy_filter_font_typo',
					'selector'     => ".fl-node-$id ul.xpro-masonary-filters",
				)
			);
		}
	}
	?>
.fl-node-<?php echo esc_attr( $id ); ?> ul.xpro-masonary-filters li {
	<?php echo ( '' !== XproBlogPostsModule::xpro_text_color( $settings->taxonomy_filter_select_color ) ) ? 'color: ' . esc_attr( XproBlogPostsModule::xpro_text_color( $settings->taxonomy_filter_select_color ) ) . ';' : ''; ?>
}

.fl-node-<?php echo esc_attr( $id ); ?> .xpro-masonary-filters-wrapper {
	text-align: <?php echo esc_attr( $settings->selfilter_overall_alignment ); ?>;
}

.fl-node-<?php echo esc_attr( $id ); ?> ul.xpro-masonary-filters > li {
	<?php
	if ( 'square' === $settings->masonary_button_style ) {
		echo ( '' !== $settings->masonary_background_color ) ? 'background: ' . esc_attr( $settings->masonary_background_color ) . ';' : 'background: #EFEFEF;';
	} else {
		echo ( '' !== XproBlogPostsModule::xpro_base_color( $settings->masonary_color_border ) ) ? 'border: ' . esc_attr( $settings->masonary_border_size ) . 'px ' . esc_attr( $settings->masonary_border_style ) . ' ' . esc_attr( XproBlogPostsModule::xpro_base_color( $settings->masonary_color_border ) ) . ';' : '';
	}

	echo ( '' !== XproBlogPostsModule::xpro_text_color( $settings->masonary_text_color ) ) ? 'color: ' . esc_attr( XproBlogPostsModule::xpro_text_color( $settings->masonary_text_color ) ) . ';' : '';
		echo esc_attr( ( 'left' === $settings->masonary_overall_alignment ) ? 'margin-right: 10px;' : ( ( 'right' === $settings->masonary_overall_alignment ) ? 'margin-left: 10px;' : 'margin-right: 5px; margin-left: 5px;' ) );
	?>

	<?php
	if ( 'yes' === $converted || isset( $settings->masonary_padding_dimension_top ) && isset( $settings->masonary_padding_dimension_bottom ) && isset( $settings->masonary_padding_dimension_left ) && isset( $settings->masonary_padding_dimension_right ) ) {
		if ( isset( $settings->masonary_padding_dimension_top ) ) {
			echo ( '' !== $settings->masonary_padding_dimension_top ) ? 'padding-top:' . esc_attr( $settings->masonary_padding_dimension_top ) . 'px;' : 'padding-top: 12px;';
		}
		if ( isset( $settings->masonary_padding_dimension_bottom ) ) {
			echo ( '' !== $settings->masonary_padding_dimension_bottom ) ? 'padding-bottom:' . esc_attr( $settings->masonary_padding_dimension_bottom ) . 'px;' : 'padding-bottom: 12px;';
		}
		if ( isset( $settings->masonary_padding_dimension_left ) ) {
			echo ( '' !== $settings->masonary_padding_dimension_left ) ? 'padding-left:' . esc_attr( $settings->masonary_padding_dimension_left ) . 'px;' : 'padding-left: 12px;';
		}
		if ( isset( $settings->masonary_padding_dimension_right ) ) {
			echo ( '' !== $settings->masonary_padding_dimension_right ) ? 'padding-right:' . esc_attr( $settings->masonary_padding_dimension_right ) . 'px;' : 'padding-right: 12px;';
		}
	} elseif ( isset( $settings->masonary_padding ) && '' !== $settings->masonary_padding && isset( $settings->masonary_padding_dimension_top ) && '' === $settings->masonary_padding_dimension_top && isset( $settings->masonary_padding_dimension_bottom ) && '' === $settings->masonary_padding_dimension_bottom && isset( $settings->masonary_padding_dimension_left ) && '' === $settings->masonary_padding_dimension_left && isset( $settings->masonary_padding_dimension_right ) && '' === $settings->masonary_padding_dimension_right ) {
		echo esc_attr( $settings->masonary_padding );
		?>
		;
		<?php } ?>

	border-radius: <?php echo ( '' !== $settings->masonary_border_radius ) ? esc_attr( $settings->masonary_border_radius ) : '2'; ?>px;
}

.fl-node-<?php echo esc_attr( $id ); ?> ul.xpro-masonary-filters > li:hover {
	<?php
	if ( 'square' === $settings->masonary_button_style ) {
		echo ( '' !== $settings->masonary_background_hover_color ) ? 'background: ' . esc_attr( $settings->masonary_background_hover_color ) . ';' : '';

		echo ( '' !== $settings->masonary_text_hover_color ) ? 'color: ' . esc_attr( $settings->masonary_text_hover_color ) . ';' : '';

	}
	?>
}

.fl-node-<?php echo esc_attr( $id ); ?> ul.xpro-masonary-filters > li.xpro-masonary-current {
	<?php
	echo ( '' !== XproBlogPostsModule::xpro_text_color( $settings->masonary_active_color ) ) ? 'color: ' . esc_attr( XproBlogPostsModule::xpro_text_color( $settings->masonary_active_color ) ) . ';' : '';
	if ( 'square' === $settings->masonary_button_style ) {
		echo ( '' !== XproBlogPostsModule::xpro_base_color( $settings->masonary_background_active_color ) ) ? 'background: ' . esc_attr( XproBlogPostsModule::xpro_base_color( $settings->masonary_background_active_color ) ) . ';' : '';

	} else {
		echo ( '' !== XproBlogPostsModule::xpro_base_color( $settings->masonary_active_color_border ) ) ? 'border: ' . esc_attr( $settings->masonary_border_size ) . 'px ' . esc_attr( $settings->masonary_border_style ) . ' ' . esc_attr( XproBlogPostsModule::xpro_base_color( $settings->masonary_active_color_border ) ) . '; !important' : '';
	}
	?>
}

.fl-node-<?php echo esc_attr( $id ); ?> ul.xpro-masonary-filters {
	text-align: <?php echo esc_attr( $settings->masonary_overall_alignment ); ?>;
	margin-bottom: <?php echo ( '' !== $settings->masonary_bottom_spacing ) ? esc_attr( $settings->masonary_bottom_spacing ) : '40'; ?>px;
}
	<?php
}
?>

.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-post-wrapper {
	<?php
	if ( 'feed' === $settings->is_carousel ) {
		echo ( '' !== $settings->element_space ) ? 'margin-bottom: ' . esc_attr( $settings->element_space ) . 'px;' : 'margin-bottom: 15px;';
	} else {
		if ( 1 === $settings->post_per_grid ) {
			echo 'padding: 0;';
		} else {
			echo ( '' !== $settings->element_space ) ? 'padding-left: ' . esc_attr( $settings->element_space / 2 ) . 'px;' : 'padding-left: 7.5px;';
			echo ( '' !== $settings->element_space ) ? 'padding-right: ' . esc_attr( $settings->element_space / 2 ) . 'px;' : 'padding-right: 7.5px;';
		}
	}

	if ( 'grid' === $settings->is_carousel || 'masonary' === $settings->is_carousel ) {
		?>
	margin-bottom: <?php echo ( '' !== $settings->below_element_space ) ? esc_attr( $settings->below_element_space ) : '30'; ?>px;
		<?php
	}
	?>
}

.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-wrapper .xpro-blog-post-content {
	<?php
	if ( 'yes' === $converted || isset( $settings->content_padding_dimension_top ) && isset( $settings->content_padding_dimension_bottom ) && isset( $settings->content_padding_dimension_left ) && isset( $settings->content_padding_dimension_right ) ) {
		if ( isset( $settings->content_padding_dimension_top ) ) {
			echo ( '' !== $settings->content_padding_dimension_top ) ? 'padding-top:' . esc_attr( $settings->content_padding_dimension_top ) . 'px;' : 'padding-top: 25px;';
		}
		if ( isset( $settings->content_padding_dimension_bottom ) ) {
			echo ( '' !== $settings->content_padding_dimension_bottom ) ? 'padding-bottom:' . esc_attr( $settings->content_padding_dimension_bottom ) . 'px;' : 'padding-bottom: 25px;';
		}
		if ( isset( $settings->content_padding_dimension_left ) ) {
			echo ( '' !== $settings->content_padding_dimension_left ) ? 'padding-left:' . esc_attr( $settings->content_padding_dimension_left ) . 'px;' : 'padding-left: 25px;';
		}
		if ( isset( $settings->content_padding_dimension_right ) ) {
			echo ( '' !== $settings->content_padding_dimension_right ) ? 'padding-right:' . esc_attr( $settings->content_padding_dimension_right ) . 'px;' : 'padding-right: 25px;';
		}
	} elseif ( isset( $settings->content_padding ) && '' !== $settings->content_padding && isset( $settings->content_padding_dimension_top ) && '' === $settings->content_padding_dimension_top && isset( $settings->content_padding_dimension_bottom ) && '' === $settings->content_padding_dimension_bottom && isset( $settings->content_padding_dimension_left ) && '' === $settings->content_padding_dimension_left && isset( $settings->content_padding_dimension_right ) && '' === $settings->content_padding_dimension_right ) {
		echo esc_attr( $settings->content_padding );
		?>
		;
	<?php } ?>
}
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-posted-on {
	<?php
		$color                 = XproBlogPostsModule::xpro_base_color( $settings->date_background_color );
		$date_background_color = ( '' !== $color ) ? $color : '#E6E3E3';
		echo 'color: ' . esc_attr( $settings->date_color ) . ';';
	?>
	background: <?php echo esc_attr( $date_background_color ); ?>;
	left: 0;
}

<?php
if ( '' !== $settings->meta_color || '' !== $settings->meta_hover_color ) {
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-post-meta a,
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-post-meta a:hover,
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-post-meta a:focus,
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-post-meta a:active {
		color: <?php echo esc_attr( $settings->meta_color ); ?>;
	}

	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-post-meta a:hover {
		color: <?php echo esc_attr( $settings->meta_hover_color ); ?>;
	}
	<?php
}

if ( 'yes' === $settings->show_meta ) {
	?>

	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-meta a,
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-post-meta {
		<?php echo ( '' !== $settings->meta_text_color ) ? 'color: ' . esc_attr( $settings->meta_text_color ) . ';' : ''; ?>
	}

	<?php
}
?>

.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-shadow {
	<?php if ( 'yes' === $settings->show_box_shadow ) { ?>
	box-shadow: 0 4px 1px rgba(197, 197, 197, 0.2);
	<?php } ?>
	<?php echo ( '' !== $settings->content_background_color ) ? 'background: ' . esc_attr( $settings->content_background_color ) : ''; ?>;
	transition: all 0.3s linear;
	width: 100%;
}

<?php
if ( ! $v_bb_check ) {
	$settings->content_border_color = XproBlogPostsModule::xpro_colorpicker( $settings, 'content_border_color', true );
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-shadow,
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-blog-posts-shadow {
	<?php
	if ( isset( $settings->content_border_type ) ) {
		echo ( '' !== $settings->content_border_type ) ? 'border-style:' . esc_attr( $settings->content_border_type ) . ';' : '';
	}
	if ( isset( $settings->content_border_width ) ) {
		echo ( '' !== $settings->content_border_width ) ? 'border-width:' . esc_attr( $settings->content_border_width ) . 'px;' : '';
	}
	if ( isset( $settings->content_border_radius ) ) {
		echo ( '' !== $settings->content_border_radius ) ? 'border-radius:' . esc_attr( $settings->content_border_radius ) . 'px;' : '';
	}
	if ( isset( $settings->content_border_color ) ) {
		echo ( '' !== $settings->content_border_color ) ? 'border-color:' . esc_attr( $settings->content_border_color ) . ';' : '';
	}
	?>
	}
	<?php
} else {
	if ( class_exists( 'FLBuilderCSS' ) ) {
		// Border - Settings.
		FLBuilderCSS::border_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'content_border',
				'selector'     => ".fl-node-$id .xpro-blog-posts-shadow,.fl-node-$id .xpro-blog-posts .xpro-blog-posts-shadow",
			)
		);
	}
}
?>

<?php
if ( 'grid' === $settings->is_carousel ) {
	?>
@media all and ( min-width: <?php echo esc_attr( $global_settings->medium_breakpoint ); ?>px ) {
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-wrapper:nth-child(<?php echo esc_attr( $settings->post_per_grid ); ?>n+1){
		<!-- clear: left; -->
	}
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-wrapper:nth-child(<?php echo esc_attr( $settings->post_per_grid ); ?>n+0) {
		clear: right;
	}
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-wrapper:nth-child(<?php echo esc_attr( $settings->post_per_grid ); ?>n+1) .xpro-posted-on {
		left: 0;
	}
}

	<?php
}
?>

.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text span,
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text:visited * {
	color: 
	<?php
	echo esc_attr( ( '' === XproBlogPostsModule::xpro_base_color( $settings->link_more_arrow_color ) ) ? '#f7f7f7' : XproBlogPostsModule::xpro_base_color( $settings->link_more_arrow_color ) );
	?>
	;
}

<?php
if ( 'carousel' === $settings->is_carousel ) {

	if ( FLBuilder::fa5_pro_enabled() ) {
		?>
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts ul.slick-dots li button:before {
	font-family: 'Font Awesome 5 Pro';
}
	<?php } ?>

.fl-node-<?php echo esc_attr( $id ); ?> .slick-prev i,
.fl-node-<?php echo esc_attr( $id ); ?> .slick-next i,
.fl-node-<?php echo esc_attr( $id ); ?> .slick-prev i:hover,
.fl-node-<?php echo esc_attr( $id ); ?> .slick-next i:hover,
.fl-node-<?php echo esc_attr( $id ); ?> .slick-prev i:focus,
.fl-node-<?php echo esc_attr( $id ); ?> .slick-next i:focus {
	outline: none;
	<?php
	$color       = XproBlogPostsModule::xpro_base_color( $settings->arrow_color );
	$arrow_color = ( '' !== $color ) ? $color : '#fff';
	?>
	color: <?php echo esc_attr( $arrow_color ); ?>;
	<?php
	switch ( $settings->arrow_style ) {
		case 'square':
			?>
	background: <?php echo ( '' !== $settings->arrow_background_color ) ? esc_attr( $settings->arrow_background_color ) : '#efefef'; ?>;
			<?php
			break;

		case 'circle':
			?>
	border-radius: 50%;
	background: <?php echo ( '' !== $settings->arrow_background_color ) ? esc_attr( $settings->arrow_background_color ) : '#efefef'; ?>;
			<?php
			break;

		case 'square-border':
			?>
	border: <?php echo esc_attr( $settings->arrow_border_size ); ?>px solid <?php echo esc_attr( $settings->arrow_color_border ); ?>;
			<?php
			break;

		case 'circle-border':
			?>
	border: <?php echo esc_attr( $settings->arrow_border_size ); ?>px solid <?php echo esc_attr( $settings->arrow_color_border ); ?>;
	border-radius: 50%;
			<?php
			break;
	}
	?>
}

	<?php
	if ( 'outside' !== $settings->arrow_position ) {
		?>
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-prev,
	.fl-node-<?php echo esc_attr( $id ); ?> [dir='rtl'] .xpro-blog-posts .slick-next
	{
		left: -15px;
	}
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-next,
	.fl-node-<?php echo esc_attr( $id ); ?> [dir='rtl'] .xpro-blog-posts .slick-prev
	{
		right: -15px;
	}
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-prev i,
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-next i,
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-prev i:hover,
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-prev i:focus,
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-next i:focus,
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-next i:hover {
		width: 30px;
		height: 30px;
		line-height: 30px;
	}
		<?php
	}
	?>

.fl-node-<?php echo esc_attr( $id ); ?> .fl-node-content .slick-list {
	<?php
	if ( 1 === $settings->post_per_grid ) {
		?>
	margin: 0;
		<?php
	} else {
		?>
	margin: 0 -<?php echo ( '' !== $settings->element_space ) ? ( esc_attr( $settings->element_space / 2 ) ) : '7.5'; ?>px;
		<?php
	}
	?>
}

	<?php

	if ( 'yes' === $settings->enable_dots ) {
		if ( '' !== $settings->post_dots_size && isset( $settings->post_dots_size ) ) {
			?>
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-dots li button:before {
				<?php echo ( '' !== $settings->post_dots_size ) ? 'font-size:' . esc_attr( $settings->post_dots_size ) . 'px;' : ''; ?>
		}
				<?php
		}

		if ( '' !== $settings->post_dots_color && isset( $settings->post_dots_color ) ) {
			?>
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts ul.slick-dots li button:before {
				<?php echo ( '' !== $settings->post_dots_color ) ? 'color:' . esc_attr( $settings->post_dots_color ) . ';' : ''; ?>
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts ul.slick-dots li.slick-active button:before {
				<?php echo ( '' !== $settings->post_dots_color ) ? 'color:' . esc_attr( $settings->post_dots_color ) . ';' : ''; ?>
			opacity:1;
		}
				<?php
		}
	}
}
?>

.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content {
	text-align: <?php echo esc_attr( $settings->overall_alignment ); ?>;
}
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text,
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text a,
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text a:visited,
.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text a:hover {
	<?php
		echo 'color: ' . esc_attr( XproBlogPostsModule::xpro_text_color( $settings->link_color ) ) . ';';
	?>
}

	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-text-editor {
		<?php
			echo 'color: ' . esc_attr( XproBlogPostsModule::xpro_text_color( $settings->desc_color ) ) . ';';
		?>
	}
<?php
if ( isset( $settings->post_layout ) && 'custom' !== $settings->post_layout ) {
	?>
		.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading,
		.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading a,
		.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading a:hover,
		.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading a:focus,
		.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading a:visited {
		<?php
			echo ( '' !== $settings->title_color ) ? 'color: ' . esc_attr( $settings->title_color ) . ';' : '';
			echo ( '' !== $settings->title_margin_top ) ? 'margin-top: ' . esc_attr( $settings->title_margin_top ) . 'px;' : '';
			echo ( '' !== $settings->title_margin_bottom ) ? 'margin-bottom: ' . esc_attr( $settings->title_margin_bottom ) . 'px;' : '';
		?>
		}
	<?php
} else {
	?>
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading,
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading a,
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading a:hover,
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading a:focus,
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading a:visited {
			<?php
			echo ( '' !== $settings->title_color ) ? 'color: ' . esc_attr( $settings->title_color ) . ';' : '';
			echo ( '' !== $settings->title_margin_top ) ? 'margin-top: ' . esc_attr( $settings->title_margin_top ) . 'px;' : '';
			echo ( '' !== $settings->title_margin_bottom ) ? 'margin-bottom: ' . esc_attr( $settings->title_margin_bottom ) . 'px;' : '';
			?>
		}

<?php } ?>

<?php
$show_pagination = ( isset( $settings->show_pagination ) ) ? $settings->show_pagination : 'no';
$pagination      = ( isset( $settings->pagination ) ) ? $settings->pagination : 'numbers';
$show_loader     = ( isset( $settings->show_paginate_loader ) ) ? $settings->show_paginate_loader : 'yes';

if ( 'yes' === $show_pagination && 'scroll' === $pagination && 'no' === $show_loader ) {
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts #infscr-loading {
		display: none !important;
	}
<?php } ?>

<?php
if ( 'carousel' !== $settings->is_carousel && 'yes' === $show_pagination && 'numbers' === $pagination ) {
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blogs-pagination ul  {
		text-align: <?php echo esc_attr( $settings->pagination_alignment ); ?>;
	}

	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blogs-pagination li:hover a.page-numbers {
		<?php
		if ( 'square' === $settings->pagination_style ) {
			echo ( '' !== $settings->pagination_hover_background_color ) ? 'background: ' . esc_attr( $settings->pagination_hover_background_color ) . ';' : '';
			echo ( '' !== $settings->pagination_hover_color ) ? 'color: ' . esc_attr( $settings->pagination_hover_color ) . ';' : '';
		}
		?>
	}

	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blogs-pagination li a.page-numbers,
	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blogs-pagination li span.page-numbers {
		outline: none;
		color: <?php echo esc_attr( XproBlogPostsModule::xpro_text_color( $settings->pagination_color ) ); ?>;
		<?php
		switch ( $settings->pagination_style ) {
			case 'square':
				?>
		background: <?php echo ( '' !== $settings->pagination_background_color ) ? esc_attr( $settings->pagination_background_color ) : '#efefef'; ?>;
				<?php
				break;

			case 'square-border':
				?>
				<?php if ( ! $v_bb_check ) { ?>
			border: <?php echo esc_attr( $settings->pagination_border_size ); ?>px <?php echo esc_attr( $settings->pagination_border_style ); ?> <?php echo esc_attr( $settings->pagination_color_border ); ?>;
		<?php } ?>
				<?php
				break;
		}
		?>
	}
	<?php
	if ( $v_bb_check ) {
		switch ( $settings->pagination_style ) {
			case 'square-border':
				FLBuilderCSS::border_field_rule(
					array(
						'settings'     => $settings,
						'setting_name' => 'pagination_border_param',
						'selector'     => ".fl-node-$id .xpro-blogs-pagination li a.page-numbers,.fl-node-$id .xpro-blogs-pagination li span.page-numbers",
					)
				);
				break;
		}
	}
	?>

	.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blogs-pagination li span.page-numbers.current {
		color: <?php echo esc_attr( XproBlogPostsModule::xpro_text_color( $settings->pagination_active_color ) ); ?>;
		<?php
		switch ( $settings->pagination_style ) {
			case 'square':
				?>
		background: <?php echo esc_attr( XproBlogPostsModule::xpro_base_color( $settings->pagination_active_background_color ) ); ?>;
				<?php
				break;

			case 'square-border':
				$border_color = XproBlogPostsModule::xpro_base_color( $settings->pagination_active_color_border );
				?>
		color: <?php echo esc_attr( XproBlogPostsModule::xpro_base_color( $settings->pagination_active_color ) ); ?>;
				<?php if ( ! $v_bb_check ) { ?>
			border: <?php echo esc_attr( $settings->pagination_border_size ); ?>px <?php echo esc_attr( $settings->pagination_border_style ); ?> <?php echo esc_attr( $border_color ); ?>;
		<?php } ?>
				<?php
				break;
		}
		?>
	}
	<?php
	if ( $v_bb_check ) {
		switch ( $settings->pagination_style ) {
			case 'square-border':
				?>

			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blogs-pagination li span.page-numbers.current {
				border-color:<?php echo esc_attr( $border_color ); ?>!important;
			}
				<?php
				FLBuilderCSS::border_field_rule(
					array(
						'settings'     => $settings,
						'setting_name' => 'pagination_border_param',
						'selector'     => ".fl-node-$id .xpro-blogs-pagination li span.page-numbers",
					)
				);
				break;
		}
	}
	?>

	<?php
}
?>

<?php
if ( $global_settings->responsive_enabled ) { // Global Setting If started.
	?>
	@media ( max-width: <?php echo esc_attr( $global_settings->medium_breakpoint ); ?>px ) {

		.fl-node-<?php echo esc_attr( $id ); ?> ul.xpro-masonary-filters > li {
			<?php
			if ( isset( $settings->masonary_padding_dimension_top_medium ) ) {
				echo ( '' !== $settings->masonary_padding_dimension_top_medium ) ? 'padding-top:' . esc_attr( $settings->masonary_padding_dimension_top_medium ) . 'px;' : '';
			}
			if ( isset( $settings->masonary_padding_dimension_bottom_medium ) ) {
				echo ( '' !== $settings->masonary_padding_dimension_bottom_medium ) ? 'padding-bottom:' . esc_attr( $settings->masonary_padding_dimension_bottom_medium ) . 'px;' : '';
			}
			if ( isset( $settings->masonary_padding_dimension_left_medium ) ) {
				echo ( '' !== $settings->masonary_padding_dimension_left_medium ) ? 'padding-left:' . esc_attr( $settings->masonary_padding_dimension_left_medium ) . 'px;' : '';
			}
			if ( isset( $settings->masonary_padding_dimension_right_medium ) ) {
				echo ( '' !== $settings->masonary_padding_dimension_right_medium ) ? 'padding-right:' . esc_attr( $settings->masonary_padding_dimension_right_medium ) . 'px;' : '';
			}
			?>
		}

		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-wrapper .xpro-blog-post-content {
			<?php
			if ( isset( $settings->content_padding_dimension_top_medium ) ) {
				echo ( '' !== $settings->content_padding_dimension_top_medium ) ? 'padding-top:' . esc_attr( $settings->content_padding_dimension_top_medium ) . 'px;' : '';
			}
			if ( isset( $settings->content_padding_dimension_bottom_medium ) ) {
				echo ( '' !== $settings->content_padding_dimension_bottom_medium ) ? 'padding-bottom:' . esc_attr( $settings->content_padding_dimension_bottom_medium ) . 'px;' : '';
			}
			if ( isset( $settings->content_padding_dimension_left_medium ) ) {
				echo ( '' !== $settings->content_padding_dimension_left_medium ) ? 'padding-left:' . esc_attr( $settings->content_padding_dimension_left_medium ) . 'px;' : '';
			}
			if ( isset( $settings->content_padding_dimension_right_medium ) ) {
				echo ( '' !== $settings->content_padding_dimension_right_medium ) ? 'padding-right:' . esc_attr( $settings->content_padding_dimension_right_medium ) . 'px;' : '';
			}
			?>
		}

		<?php
		if ( 'top' !== $settings->blog_image_position && 'background' !== $settings->blog_image_position ) {
			?>
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-blog-post-inner-wrap {
			<?php
			if ( isset( $settings->overall_padding_dimension_top_medium ) ) {
				echo ( '' !== $settings->overall_padding_dimension_top_medium ) ? 'padding-top:' . esc_attr( $settings->overall_padding_dimension_top_medium ) . 'px;' : '';
			}
			if ( isset( $settings->overall_padding_dimension_bottom_medium ) ) {
				echo ( '' !== $settings->overall_padding_dimension_bottom_medium ) ? 'padding-bottom:' . esc_attr( $settings->overall_padding_dimension_bottom_medium ) . 'px;' : '';
			}
			if ( isset( $settings->overall_padding_dimension_left_medium ) ) {
				echo ( '' !== $settings->overall_padding_dimension_left_medium ) ? 'padding-left:' . esc_attr( $settings->overall_padding_dimension_left_medium ) . 'px;' : '';
			}
			if ( isset( $settings->overall_padding_dimension_right_medium ) ) {
				echo ( '' !== $settings->overall_padding_dimension_right_medium ) ? 'padding-right:' . esc_attr( $settings->overall_padding_dimension_right_medium ) . 'px;' : '';
			}
			?>
		}
			<?php
		} else {
			if ( 'top' === $settings->blog_image_position ) {
				if ( 'img' === substr( $settings->layout_sort_order, 0, 3 ) || 'img' === substr( $settings->layout_sort_order, -3 ) ) {
					?>
					.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-blog-post-inner-wrap {
					<?php
					if ( isset( $settings->overall_padding_dimension_top_medium ) ) {
						echo ( '' !== $settings->overall_padding_dimension_top_medium ) ? 'padding-top:' . esc_attr( $settings->overall_padding_dimension_top_medium ) . 'px;' : '';
					}
					if ( isset( $settings->overall_padding_dimension_bottom_medium ) ) {
						echo ( '' !== $settings->overall_padding_dimension_bottom_medium ) ? 'padding-bottom:' . esc_attr( $settings->overall_padding_dimension_bottom_medium ) . 'px;' : '';
					}
					if ( isset( $settings->overall_padding_dimension_left_medium ) ) {
						echo ( '' !== $settings->overall_padding_dimension_left_medium ) ? 'padding-left:' . esc_attr( $settings->overall_padding_dimension_left_medium ) . 'px;' : '';
					}
					if ( isset( $settings->overall_padding_dimension_right_medium ) ) {
						echo ( '' !== $settings->overall_padding_dimension_right_medium ) ? 'padding-right:' . esc_attr( $settings->overall_padding_dimension_right_medium ) . 'px;' : '';
					}
					?>
					}
					<?php
				}
			}
		}
		?>

		<?php
		if ( 'masonary' === $settings->is_carousel || 'grid' === $settings->is_carousel ) {
			?>
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-8,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-7,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-6,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-5,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-4,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-3,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-2,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-1 {
				width: <?php echo esc_attr( ( 100 / $settings->post_per_grid_medium ) ); ?>%;
			}

			<?php
		}
		if ( ! $v_bb_check ) {
			if ( isset( $settings->link_line_height['medium'] ) || isset( $settings->link_font_size['medium'] ) || isset( $settings->link_line_height_unit_medium ) || isset( $settings->link_font_size_unit_medium ) || isset( $settings->link_line_height_unit ) ) {
				?>

				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text,
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text a,
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text a:visited,
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text a:hover {
					<?php if ( 'yes' === $converted || isset( $settings->link_font_size_unit_medium ) && '' !== $settings->link_font_size_unit_medium ) { ?>
						font-size: <?php echo esc_attr( $settings->link_font_size_unit_medium ); ?>px;
					<?php } elseif ( isset( $settings->link_font_size_unit_medium ) && '' === $settings->link_font_size_unit_medium && isset( $settings->link_font_size['medium'] ) && '' !== $settings->link_font_size['medium'] ) { ?>
						font-size: <?php echo esc_attr( $settings->link_font_size['medium'] ); ?>px;
						<?php } ?>

					<?php if ( isset( $settings->link_font_size['medium'] ) && '' === $settings->link_font_size['medium'] && isset( $settings->link_line_height['medium'] ) && '' !== $settings->link_line_height['medium'] && '' === $settings->link_line_height_unit_medium && '' === $settings->link_line_height_unit ) { ?>
						line-height: <?php echo esc_attr( $settings->link_line_height['medium'] ); ?>px;
					<?php } ?>

					<?php if ( 'yes' === $converted || isset( $settings->link_line_height_unit_medium ) && '' !== $settings->link_line_height_unit_medium ) { ?>
						line-height: <?php echo esc_attr( $settings->link_line_height_unit_medium ); ?>em;
					<?php } elseif ( isset( $settings->link_line_height_unit_medium ) && '' === $settings->link_line_height_unit_medium && isset( $settings->link_line_height['medium'] ) && '' !== $settings->link_line_height['medium'] ) { ?>
						line-height: <?php echo esc_attr( $settings->link_line_height['medium'] ); ?>px;
						<?php } ?>
				}
				<?php
			}
		}
		if ( 'yes' === $settings->show_meta ) {
			?>
			<?php if ( ! $v_bb_check ) { ?>
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-post-meta {

				<?php if ( 'yes' === $converted || isset( $settings->meta_font_size_unit_medium ) && '' !== $settings->meta_font_size_unit_medium ) { ?>
					font-size: <?php echo esc_attr( $settings->meta_font_size_unit_medium ); ?>px;
				<?php } elseif ( isset( $settings->meta_font_size_unit_medium ) && '' === $settings->meta_font_size_unit_medium && isset( $settings->meta_font_size['medium'] ) && '' !== $settings->meta_font_size['medium'] ) { ?>
					font-size: <?php echo esc_attr( $settings->meta_font_size['medium'] ); ?>px;
					<?php } ?>

				<?php if ( isset( $settings->meta_font_size['medium'] ) && '' === $settings->meta_font_size['medium'] && isset( $settings->meta_line_height['medium'] ) && '' !== $settings->meta_line_height['medium'] && '' === $settings->meta_line_height_unit_medium && '' === $settings->meta_line_height_unit ) { ?>
					line-height: <?php echo esc_attr( $settings->meta_line_height['medium'] ); ?>px;
				<?php } ?>

				<?php if ( 'yes' === $converted || isset( $settings->meta_line_height_unit_medium ) && '' !== $settings->meta_line_height_unit_medium ) { ?>
					line-height: <?php echo esc_attr( $settings->meta_line_height_unit_medium ); ?>em;
				<?php } elseif ( isset( $settings->meta_line_height_unit_medium ) && '' === $settings->meta_line_height_unit_medium && isset( $settings->meta_line_height['medium'] ) && '' !== $settings->meta_line_height['medium'] ) { ?>
					line-height: <?php echo esc_attr( $settings->meta_line_height['medium'] ); ?>px;
					<?php } ?>
			}
		<?php } ?>
			<?php
		}

		if ( 'yes' === $settings->show_date_box ) {
			?>
			<?php if ( ! $v_bb_check ) { ?>
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-posted-on {

					<?php if ( 'yes' === $converted || isset( $settings->date_font_size_unit_medium ) && '' !== $settings->date_font_size_unit_medium ) { ?>
						font-size: <?php echo esc_attr( $settings->date_font_size_unit_medium ); ?>px;
					<?php } elseif ( isset( $settings->date_font_size_unit_medium ) && '' === $settings->date_font_size_unit_medium && isset( $settings->date_font_size['medium'] ) && '' !== $settings->date_font_size['medium'] ) { ?>
						font-size: <?php echo esc_attr( $settings->date_font_size['medium'] ); ?>px;
					<?php } ?>
				}
			<?php } ?>
			<?php
		}
		if ( ! $v_bb_check ) {
			if ( isset( $settings->desc_line_height['medium'] ) || isset( $settings->desc_font_size['medium'] ) || isset( $settings->desc_line_height_unit_medium ) || isset( $settings->desc_font_size_unit_medium ) || isset( $settings->desc_line_height_unit ) ) {
				?>

			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-text-editor {

				<?php if ( 'yes' === $converted || isset( $settings->desc_font_size_unit_medium ) && '' !== $settings->desc_font_size_unit_medium ) { ?>
					font-size: <?php echo esc_attr( $settings->desc_font_size_unit_medium ); ?>px;
				<?php } elseif ( isset( $settings->desc_font_size_unit_medium ) && '' === $settings->desc_font_size_unit_medium && isset( $settings->desc_font_size['medium'] ) && '' !== $settings->desc_font_size['medium'] ) { ?>
					font-size: <?php echo esc_attr( $settings->desc_font_size['medium'] ); ?>px;
				<?php } ?>

				<?php if ( isset( $settings->desc_font_size['medium'] ) && '' === $settings->desc_font_size['medium'] && isset( $settings->desc_line_height['medium'] ) && '' !== $settings->desc_line_height['medium'] && '' === $settings->desc_line_height_unit_medium && '' === $settings->desc_line_height_unit ) { ?>
					line-height: <?php echo esc_attr( $settings->desc_line_height['medium'] ); ?>px;
				<?php } ?>

				<?php if ( 'yes' === $converted || isset( $settings->desc_line_height_unit_medium ) && '' !== $settings->desc_line_height_unit_medium ) { ?>
					line-height: <?php echo esc_attr( $settings->desc_line_height_unit_medium ); ?>em;
				<?php } elseif ( isset( $settings->desc_line_height_unit_medium ) && '' === $settings->desc_line_height_unit_medium && isset( $settings->desc_line_height['medium'] ) && '' !== $settings->desc_line_height['medium'] ) { ?>
					line-height: <?php echo esc_attr( $settings->desc_line_height['medium'] ); ?>px;
				<?php } ?>

			}

				<?php
			}
		}
		if ( ! $v_bb_check ) {
			if ( ( isset( $settings->title_line_height['medium'] ) || isset( $settings->title_font_size['medium'] ) || isset( $settings->title_line_height_unit_medium ) || isset( $settings->title_font_size_unit_medium ) ) || isset( $settings->title_font_size_unit ) && ( isset( $settings->post_layout ) && 'custom' !== $settings->post_layout ) ) {
				?>
			.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading,
			.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading a,
			.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading a:hover,
			.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading a:focus,
			.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading a:visited {

				<?php if ( 'yes' === $converted || isset( $settings->title_font_size_unit_medium ) && '' !== $settings->title_font_size_unit_medium ) { ?>
					font-size: <?php echo esc_attr( $settings->title_font_size_unit_medium ); ?>px;
				<?php } elseif ( isset( $settings->title_font_size_unit_medium ) && '' === $settings->title_font_size_unit_medium && isset( $settings->title_font_size['medium'] ) && '' !== $settings->title_font_size['medium'] ) { ?>
					font-size: <?php echo esc_attr( $settings->title_font_size['medium'] ); ?>px;
				<?php } ?>

				<?php if ( isset( $settings->title_font_size['medium'] ) && '' === $settings->title_font_size['medium'] && isset( $settings->title_line_height['medium'] ) && '' !== $settings->title_line_height['medium'] && '' === $settings->title_line_height_unit_medium && '' === $settings->title_line_height_unit ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height['medium'] ); ?>px;
				<?php } ?>

				<?php if ( 'yes' === $converted || isset( $settings->title_line_height_unit_medium ) && '' !== $settings->title_line_height_unit_medium ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height_unit_medium ); ?>em;
				<?php } elseif ( isset( $settings->title_line_height_unit_medium ) && '' === $settings->title_line_height_unit_medium && isset( $settings->title_line_height['medium'] ) && '' !== $settings->title_line_height['medium'] ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height['medium'] ); ?>px;
				<?php } ?>
			}

				<?php
			} else {
				?>
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading,
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading a,
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading a:hover,
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading a:focus,
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading a:visited {

					<?php if ( 'yes' === $converted || isset( $settings->title_font_size_unit_medium ) && '' !== $settings->title_font_size_unit_medium ) { ?>
						font-size: <?php echo esc_attr( $settings->title_font_size_unit_medium ); ?>px;
					<?php } elseif ( isset( $settings->title_font_size_unit_medium ) && '' === $settings->title_font_size_unit_medium && isset( $settings->title_font_size['medium'] ) && '' !== $settings->title_font_size['medium'] ) { ?>
						font-size: <?php echo esc_attr( $settings->title_font_size['medium'] ); ?>px;
					<?php } ?>

					<?php if ( isset( $settings->title_font_size['medium'] ) && '' === $settings->title_font_size['medium'] && isset( $settings->title_line_height['medium'] ) && '' !== $settings->title_line_height['medium'] && '' === $settings->title_line_height_unit_medium && '' === $settings->title_line_height_unit ) { ?>
						line-height: <?php echo esc_attr( $settings->title_line_height['medium'] ); ?>px;
					<?php } ?>

					<?php if ( 'yes' === $converted || isset( $settings->title_line_height_unit_medium ) && '' !== $settings->title_line_height_unit_medium ) { ?>
						line-height: <?php echo esc_attr( $settings->title_line_height_unit_medium ); ?>em;
					<?php } elseif ( isset( $settings->title_line_height_unit_medium ) && '' === $settings->title_line_height_unit_medium && isset( $settings->title_line_height['medium'] ) && '' !== $settings->title_line_height['medium'] ) { ?>
						line-height: <?php echo esc_attr( $settings->title_line_height['medium'] ); ?>px;
					<?php } ?>
				}
				<?php
			}
		}

		if ( 'carousel' === $settings->is_carousel ) {
			?>
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-prev,
		.fl-node-<?php echo esc_attr( $id ); ?> [dir='rtl'] .xpro-blog-posts .slick-next
		{
			left: -15px;
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-next,
		.fl-node-<?php echo esc_attr( $id ); ?> [dir='rtl'] .xpro-blog-posts .slick-prev
		{
			right: -15px;
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-prev i,
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-next i,
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-prev i:hover,
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-prev i:focus,
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-next i:focus,
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .slick-next i:hover {
			width: 25px;
			height: 25px;
			line-height: 25px;
		}
			<?php
		}

		if ( 1 === $settings->post_per_grid_medium ) {
			?>
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-post-wrapper {
			padding: 0;
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .fl-node-content .slick-list {
			margin: 0;
		}
			<?php
		} else {
			?>
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-post-wrapper {
			<?php
			echo ( '' !== $settings->element_space ) ? 'padding-left: ' . esc_attr( $settings->element_space / 2 ) . 'px;' : 'padding-left: 7.5px;';
			echo ( '' !== $settings->element_space ) ? 'padding-right: ' . esc_attr( $settings->element_space / 2 ) . 'px;' : 'padding-right: 7.5px;';
			?>
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .fl-node-content .slick-list {
			margin: 0 -<?php echo ( '' !== $settings->element_space ) ? esc_attr( $settings->element_space / 2 ) : '7.5'; ?>px;
		}
			<?php
		}
		?>
		<?php if ( ! $v_bb_check ) { ?>
			.fl-node-<?php echo esc_attr( $id ); ?> select.xpro-masonary-filters,
			.fl-node-<?php echo esc_attr( $id ); ?> ul.xpro-masonary-filters {
				<?php if ( isset( $settings->taxonomy_filter_select_font_size_unit_medium ) && '' !== $settings->taxonomy_filter_select_font_size_unit_medium ) : ?>
					font-size: <?php echo esc_attr( $settings->taxonomy_filter_select_font_size_unit_medium ); ?>px;
				<?php endif; ?>
			}
		<?php } ?>
	}

	@media ( max-width: <?php echo esc_attr( $global_settings->responsive_breakpoint ); ?>px ) {

		.fl-node-<?php echo esc_attr( $id ); ?> ul.xpro-masonary-filters > li {
		<?php
		if ( isset( $settings->masonary_padding_dimension_top_responsive ) ) {
			echo ( '' !== $settings->masonary_padding_dimension_top_responsive ) ? 'padding-top:' . esc_attr( $settings->masonary_padding_dimension_top_responsive ) . 'px;' : '';
		}
		if ( isset( $settings->masonary_padding_dimension_bottom_responsive ) ) {
			echo ( '' !== $settings->masonary_padding_dimension_bottom_responsive ) ? 'padding-bottom:' . esc_attr( $settings->masonary_padding_dimension_bottom_responsive ) . 'px;' : '';
		}
		if ( isset( $settings->masonary_padding_dimension_left_responsive ) ) {
			echo ( '' !== $settings->masonary_padding_dimension_left_responsive ) ? 'padding-left:' . esc_attr( $settings->masonary_padding_dimension_left_responsive ) . 'px;' : '';
		}
		if ( isset( $settings->masonary_padding_dimension_right_responsive ) ) {
			echo ( '' !== $settings->masonary_padding_dimension_right_responsive ) ? 'padding-right:' . esc_attr( $settings->masonary_padding_dimension_right_responsive ) . 'px;' : '';
		}
		?>
		}

		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-wrapper .xpro-blog-post-content {
			<?php
			if ( isset( $settings->content_padding_dimension_top_responsive ) ) {
				echo ( '' !== $settings->content_padding_dimension_top_responsive ) ? 'padding-top:' . esc_attr( $settings->content_padding_dimension_top_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->content_padding_dimension_bottom_responsive ) ) {
				echo ( '' !== $settings->content_padding_dimension_bottom_responsive ) ? 'padding-bottom:' . esc_attr( $settings->content_padding_dimension_bottom_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->content_padding_dimension_left_responsive ) ) {
				echo ( '' !== $settings->content_padding_dimension_left_responsive ) ? 'padding-left:' . esc_attr( $settings->content_padding_dimension_left_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->content_padding_dimension_right_responsive ) ) {
				echo ( '' !== $settings->content_padding_dimension_right_responsive ) ? 'padding-right:' . esc_attr( $settings->content_padding_dimension_right_responsive ) . 'px;' : '';
			}
			?>
		}

		<?php
		if ( 'top' !== $settings->blog_image_position && 'background' !== $settings->blog_image_position ) {
			?>
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-blog-post-inner-wrap {
			<?php
			if ( isset( $settings->overall_padding_dimension_top_responsive ) ) {
				echo ( '' !== $settings->overall_padding_dimension_top_responsive ) ? 'padding-top:' . esc_attr( $settings->overall_padding_dimension_top_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->overall_padding_dimension_bottom_responsive ) ) {
				echo ( '' !== $settings->overall_padding_dimension_bottom_responsive ) ? 'padding-bottom:' . esc_attr( $settings->overall_padding_dimension_bottom_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->overall_padding_dimension_left_responsive ) ) {
				echo ( '' !== $settings->overall_padding_dimension_left_responsive ) ? 'padding-left:' . esc_attr( $settings->overall_padding_dimension_left_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->overall_padding_dimension_right_responsive ) ) {
				echo ( '' !== $settings->overall_padding_dimension_right_responsive ) ? 'padding-right:' . esc_attr( $settings->overall_padding_dimension_right_responsive ) . 'px;' : '';
			}
			?>
		}
			<?php
		} else {
			if ( 'top' === $settings->blog_image_position ) {
				if ( 'img' === substr( $settings->layout_sort_order, 0, 3 ) || 'img' === substr( $settings->layout_sort_order, -3 ) ) {
					?>
					.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-blog-post-inner-wrap {
					<?php
					if ( isset( $settings->overall_padding_dimension_top_responsive ) ) {
						echo ( '' !== $settings->overall_padding_dimension_top_responsive ) ? 'padding-top:' . esc_attr( $settings->overall_padding_dimension_top_responsive ) . 'px;' : '';
					}
					if ( isset( $settings->overall_padding_dimension_bottom_responsive ) ) {
						echo ( '' !== $settings->overall_padding_dimension_bottom_responsive ) ? 'padding-bottom:' . esc_attr( $settings->overall_padding_dimension_bottom_responsive ) . 'px;' : '';
					}
					if ( isset( $settings->overall_padding_dimension_left_responsive ) ) {
						echo ( '' !== $settings->overall_padding_dimension_left_responsive ) ? 'padding-left:' . esc_attr( $settings->overall_padding_dimension_left_responsive ) . 'px;' : '';
					}
					if ( isset( $settings->overall_padding_dimension_right_responsive ) ) {
						echo ( '' !== $settings->overall_padding_dimension_right_responsive ) ? 'padding-right:' . esc_attr( $settings->overall_padding_dimension_right_responsive ) . 'px;' : '';
					}
					?>
					}
					<?php
				}
			}
		}
		?>

		<?php
		if ( 'left' === $settings->blog_image_position || 'right' === $settings->blog_image_position ) {
			if ( 'stack' === $settings->mobile_structure ) {
				?>
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-thumbnail-position-right .xpro-post-thumbnail,
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-thumbnail-position-left .xpro-post-thumbnail,
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-thumbnail-position-right .xpro-blog-post-content,
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-thumbnail-position-left .xpro-blog-post-content {
			width: 100%;
			float: none;
		}
				<?php
			}
		}

		if ( 'grid' === $settings->is_carousel || 'masonary' === $settings->is_carousel ) {
			if ( 1 === $settings->post_per_grid_responsive ) {
				?>
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-grid,
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-masonary {
			margin: 0;
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-post-wrapper {
			padding-right: 0;
			padding-left: 0;
		}
				<?php
			} else {
				?>
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-post-wrapper {
				<?php
				echo ( '' !== $settings->element_space ) ? 'padding-left: ' . esc_attr( $settings->element_space / 2 ) . 'px;' : 'padding-left: 7.5px;';
				echo ( '' !== $settings->element_space ) ? 'padding-right: ' . esc_attr( $settings->element_space / 2 ) . 'px;' : 'padding-right: 7.5px;';
				?>
			}
			.fl-node-<?php echo esc_attr( $id ); ?> .fl-node-content .slick-list {
				margin: 0 -<?php echo ( '' !== $settings->element_space ) ? ( esc_attr( $settings->element_space / 2 ) ) : '7.5'; ?>px;
			}
				<?php
			}
		}

		if ( 'masonary' === $settings->is_carousel || 'grid' === $settings->is_carousel ) {
			?>
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-8,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-7,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-6,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-5,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-4,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-3,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-2,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts-col-1 {
				width: <?php echo ( esc_attr( 100 / $settings->post_per_grid_responsive ) ); ?>%;
			}
			<?php
		}
		if ( ! $v_bb_check ) {
			if ( isset( $settings->link_line_height['small'] ) || isset( $settings->link_font_size['small'] ) || isset( $settings->link_line_height_unit_responsive ) || isset( $settings->link_font_size_unit_responsive ) || isset( $settings->link_line_height_unit_medium ) || isset( $settings->link_line_height_unit ) || isset( $settings->link_font_size_unit_medium ) || isset( $settings->link_font_size_unit ) ) {
				?>
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text a,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text a:visited,
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-read-more-text a:hover {

				<?php if ( 'yes' === $converted || isset( $settings->link_font_size_unit_responsive ) && '' !== $settings->link_font_size_unit_responsive ) { ?>
					font-size: <?php echo esc_attr( $settings->link_font_size_unit_responsive ); ?>px;
				<?php } elseif ( isset( $settings->link_font_size_unit_responsive ) && '' === $settings->link_font_size_unit_responsive && isset( $settings->link_font_size['small'] ) && '' !== $settings->link_font_size['small'] ) { ?>
					font-size: <?php echo esc_attr( $settings->link_font_size['small'] ); ?>px;
				<?php } ?>

				<?php if ( isset( $settings->link_font_size['small'] ) && '' === $settings->link_font_size['small'] && isset( $settings->link_line_height['small'] ) && '' !== $settings->link_line_height['small'] && '' === $settings->link_line_height_unit_responsive && '' === $settings->link_line_height_unit_medium && '' === $settings->link_line_height_unit ) : ?>
						line-height: <?php echo esc_attr( $settings->link_line_height['small'] ); ?>px;
				<?php endif; ?>

				<?php if ( 'yes' === $converted || isset( $settings->link_line_height_unit_responsive ) && '' !== $settings->link_line_height_unit_responsive ) { ?>
					line-height: <?php echo esc_attr( $settings->link_line_height_unit_responsive ); ?>em;
				<?php } elseif ( isset( $settings->link_line_height_unit_responsive ) && '' === $settings->link_line_height_unit_responsive && isset( $settings->link_line_height['small'] ) && '' !== $settings->link_line_height['small'] ) { ?>
					line-height: <?php echo esc_attr( $settings->link_line_height['small'] ); ?>px;
				<?php } ?>

			}
				<?php
			}
		}
		if ( ! $v_bb_check ) {
			if ( isset( $settings->desc_line_height['small'] ) || isset( $settings->desc_font_size['small'] ) || isset( $settings->desc_line_height_unit_responsive ) || isset( $settings->desc_font_size_unit_responsive ) || isset( $settings->desc_line_height_unit_medium ) || isset( $settings->desc_line_height_unit ) ) {
				?>

				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-text-editor {

					<?php if ( 'yes' === $converted || isset( $settings->desc_font_size_unit_responsive ) && '' !== $settings->desc_font_size_unit_responsive ) { ?>
						font-size: <?php echo esc_attr( $settings->desc_font_size_unit_responsive ); ?>px;
					<?php } elseif ( isset( $settings->desc_font_size_unit_responsive ) && '' === $settings->desc_font_size_unit_responsive && isset( $settings->desc_font_size['small'] ) && '' !== $settings->desc_font_size['small'] ) { ?>
						font-size: <?php echo esc_attr( $settings->desc_font_size['small'] ); ?>px;
					<?php } ?>

					<?php if ( isset( $settings->desc_font_size['small'] ) && '' === $settings->desc_font_size['small'] && isset( $settings->desc_line_height['small'] ) && '' !== $settings->desc_line_height['small'] && '' === $settings->desc_line_height_unit_responsive && '' === $settings->desc_line_height_unit_medium && '' === $settings->desc_line_height_unit ) : ?>
						line-height: <?php echo esc_attr( $settings->desc_line_height['small'] ); ?>px;
					<?php endif; ?>

					<?php if ( 'yes' === $converted || isset( $settings->desc_line_height_unit_responsive ) && '' !== $settings->desc_line_height_unit_responsive ) { ?>
						line-height: <?php echo esc_attr( $settings->desc_line_height_unit_responsive ); ?>em;
					<?php } elseif ( isset( $settings->desc_line_height_unit_responsive ) && '' === $settings->desc_line_height_unit_responsive && isset( $settings->desc_line_height['small'] ) && '' !== $settings->desc_line_height['small'] ) { ?>
						line-height: <?php echo esc_attr( $settings->desc_line_height['small'] ); ?>px;
					<?php } ?>

				}

				<?php
			}
		}

		if ( 'yes' === $settings->show_meta ) {
			?>

			<?php if ( ! $v_bb_check ) { ?>
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-post-content .xpro-post-meta {

					<?php if ( 'yes' === $converted || isset( $settings->meta_font_size_unit_responsive ) && '' !== $settings->meta_font_size_unit_responsive ) { ?>
						font-size: <?php echo esc_attr( $settings->meta_font_size_unit_responsive ); ?>px;
					<?php } elseif ( isset( $settings->meta_font_size_unit_responsive ) && '' === $settings->meta_font_size_unit_responsive && isset( $settings->meta_font_size['small'] ) && '' !== $settings->meta_font_size['small'] ) { ?>
						font-size: <?php echo esc_attr( $settings->meta_font_size['small'] ); ?>px;
					<?php } ?>

					<?php if ( isset( $settings->meta_font_size['small'] ) && '' === $settings->meta_font_size['small'] && isset( $settings->meta_line_height['small'] ) && '' !== $settings->meta_line_height['small'] && '' === $settings->meta_line_height_unit_responsive && '' === $settings->meta_line_height_unit_medium && '' === $settings->meta_line_height_unit ) : ?>
						line-height: <?php echo esc_attr( $settings->meta_line_height['small'] ); ?>px;
					<?php endif; ?>

					<?php if ( 'yes' === $converted || isset( $settings->meta_line_height_unit_responsive ) && '' !== $settings->meta_line_height_unit_responsive ) { ?>
						line-height: <?php echo esc_attr( $settings->meta_line_height_unit_responsive ); ?>em;
					<?php } elseif ( isset( $settings->meta_line_height_unit_responsive ) && '' === $settings->meta_line_height_unit_responsive && isset( $settings->meta_line_height['small'] ) && '' !== $settings->meta_line_height['small'] ) { ?>
						line-height: <?php echo esc_attr( $settings->meta_line_height['small'] ); ?>px;
					<?php } ?>
				}
			<?php } ?>
			<?php
		}

		if ( 'yes' === $settings->show_date_box ) {
			?>
			<?php if ( ! $v_bb_check ) { ?>
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-posted-on {
					<?php if ( 'yes' === $converted || isset( $settings->date_font_size_unit_responsive ) && '' !== $settings->date_font_size_unit_responsive ) { ?>
						font-size: <?php echo esc_attr( $settings->date_font_size_unit_responsive ); ?>px;
					<?php } elseif ( isset( $settings->date_font_size_unit_responsive ) && '' === $settings->date_font_size_unit_responsive && isset( $settings->date_font_size['small'] ) && '' !== $settings->date_font_size['small'] ) { ?>
						font-size: <?php echo esc_attr( $settings->date_font_size['small'] ); ?>px;
					<?php } ?>
				}
			<?php } ?>
			<?php
		}
		if ( ! $v_bb_check ) {
			if ( isset( $settings->title_line_height['small'] ) || isset( $settings->title_font_size['small'] ) || isset( $settings->title_line_height_unit_responsive ) || isset( $settings->title_font_size_unit_responsive ) || isset( $settings->title_line_height_unit_medium ) || isset( $settings->title_line_height_unit ) && ( isset( $settings->post_layout ) && 'custom' !== $settings->post_layout ) ) {
				?>
			.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading,
			.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading a,
			.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading a:hover,
			.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading a:focus,
			.fl-node-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $settings->title_tag_selection ); ?>.xpro-post-heading a:visited {

				<?php if ( 'yes' === $converted || isset( $settings->title_font_size_unit_responsive ) && '' !== $settings->title_font_size_unit_responsive ) { ?>
					font-size: <?php echo esc_attr( $settings->title_font_size_unit_responsive ); ?>px;
				<?php } elseif ( isset( $settings->title_font_size_unit_responsive ) && '' === $settings->title_font_size_unit_responsive && isset( $settings->title_font_size['small'] ) && '' !== $settings->title_font_size['small'] ) { ?>
					font-size: <?php echo esc_attr( $settings->title_font_size['small'] ); ?>px;
				<?php } ?>

				<?php if ( isset( $settings->title_font_size['small'] ) && '' === $settings->title_font_size['small'] && isset( $settings->title_line_height['small'] ) && '' !== $settings->title_line_height['small'] && '' === $settings->title_line_height_unit_responsive && '' === $settings->title_line_height_unit_medium && '' === $settings->title_line_height_unit ) : ?>
						line-height: <?php echo esc_attr( $settings->title_line_height['small'] ); ?>px;
				<?php endif; ?>

				<?php if ( 'yes' === $converted || isset( $settings->title_line_height_unit_responsive ) && '' !== $settings->title_line_height_unit_responsive ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height_unit_responsive ); ?>em;
				<?php } elseif ( isset( $settings->title_line_height_unit_responsive ) && '' === $settings->title_line_height_unit_responsive && isset( $settings->title_line_height['small'] ) && '' !== $settings->title_line_height['small'] ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height['small'] ); ?>px;
				<?php } ?>
			}

				<?php
			} else {
				?>
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading,
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading a,
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading a:hover,
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading a:focus,
				.fl-node-<?php echo esc_attr( $id ); ?> .xpro-post-heading a:visited {

					<?php if ( 'yes' === $converted || isset( $settings->title_font_size_unit_responsive ) && '' !== $settings->title_font_size_unit_responsive ) { ?>
						font-size: <?php echo esc_attr( $settings->title_font_size_unit_responsive ); ?>px;
					<?php } elseif ( isset( $settings->title_font_size_unit_responsive ) && '' === $settings->title_font_size_unit_responsive && isset( $settings->title_font_size['small'] ) && '' !== $settings->title_font_size['small'] ) { ?>
						font-size: <?php echo esc_attr( $settings->title_font_size['small'] ); ?>px;
					<?php } ?>

					<?php if ( isset( $settings->title_font_size['small'] ) && '' === $settings->title_font_size['small'] && isset( $settings->title_line_height['small'] ) && '' !== $settings->title_line_height['small'] && '' === $settings->title_line_height_unit_responsive && '' === $settings->title_line_height_unit_medium && '' === $settings->title_line_height_unit ) : ?>
						line-height: <?php echo esc_attr( $settings->title_line_height['small'] ); ?>px;
					<?php endif; ?>

					<?php if ( 'yes' === $converted || isset( $settings->title_line_height_unit_responsive ) && '' !== $settings->title_line_height_unit_responsive ) { ?>
						line-height: <?php echo esc_attr( $settings->title_line_height_unit_responsive ); ?>em;
					<?php } elseif ( isset( $settings->title_line_height_unit_responsive ) && '' === $settings->title_line_height_unit_responsive && isset( $settings->title_line_height['small'] ) && '' !== $settings->title_line_height['small'] ) { ?>
						line-height: <?php echo esc_attr( $settings->title_line_height['small'] ); ?>px;
					<?php } ?>
				}
				<?php
			}
		}

		if ( 'carousel' === $settings->is_carousel ) {
			if ( 1 === $settings->post_per_grid_responsive ) {
				?>
			/*.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-post-wrapper {
				padding: 0;
			}*/
			.fl-node-<?php echo esc_attr( $id ); ?> .fl-node-content .slick-list {
				margin: 0;
			}
				<?php
			} else {
				?>
			.fl-node-<?php echo esc_attr( $id ); ?> .fl-node-content .slick-list {
				margin: 0 -<?php echo ( '' !== $settings->element_space ) ? ( esc_attr( $settings->element_space / 2 ) ) : '7.5'; ?>px;
			}
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-post-wrapper {
				<?php
				echo ( '' !== $settings->element_space ) ? 'padding-left: ' . esc_attr( $settings->element_space / 2 ) . 'px;' : 'padding-left: 7.5px;';
				echo ( '' !== $settings->element_space ) ? 'padding-right: ' . esc_attr( $settings->element_space / 2 ) . 'px;' : 'padding-right: 7.5px;';
				?>
			}
				<?php
			}
		}
		?>
		<?php if ( ! $v_bb_check ) { ?>
			.fl-node-<?php echo esc_attr( $id ); ?> select.xpro-masonary-filters,
			.fl-node-<?php echo esc_attr( $id ); ?> ul.xpro-masonary-filters {
				<?php if ( isset( $settings->taxonomy_filter_select_font_size_unit_responsive ) && '' !== $settings->taxonomy_filter_select_font_size_unit_responsive ) : ?>
				font-size: <?php echo esc_attr( $settings->taxonomy_filter_select_font_size_unit_responsive ); ?>px;
				<?php endif; ?>
			}
		<?php } ?>
	}

	@media ( max-width: <?php echo ( esc_attr( $global_settings->responsive_breakpoint - 1 ) ); ?>px ) {
		<?php
		if ( 'carousel' === $settings->is_carousel ) {
			if ( 1 === $settings->post_per_grid_responsive ) {
				?>
			.fl-node-<?php echo esc_attr( $id ); ?> .xpro-blog-posts .xpro-post-wrapper {
				padding: 0;
			}
				<?php
			}
		}
		?>
	}
	<?php
}
?>
