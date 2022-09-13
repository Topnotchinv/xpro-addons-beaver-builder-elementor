<?php

/**
 * @package XPRO Advanced Posts Module
 */

FLBuilder::register_module(
	'XproBlogPostsModule',
	array(
		'general'          => array(
			'title'    => __( 'General', 'xpro-bb-addons' ),
			'sections' => array(
				'general'         => array(
					'title'  => 'General',
					'fields' => array(
						'is_carousel'         => array(
							'type'    => 'select',
							'label'   => __( 'Select Post Type', 'xpro-bb-addons' ),
							'default' => 'grid',
							'help'    => __( 'Select your post type', 'xpro-bb-addons' ),
							'options' => array(
								'carousel' => __( 'Carousel', 'xpro-bb-addons' ),
								'grid'     => __( 'Grid', 'xpro-bb-addons' ),
								'feed'     => __( 'Feeds', 'xpro-bb-addons' ),
								'masonary' => __( 'Masonry', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'masonary' => array(
									'fields' => array( 'mesonry_equal_height', 'post_per_grid' ),
								),
								'carousel' => array(
									'sections' => array( 'carousel_filter' ),
									'fields'   => array( 'post_per_grid' ),
								),
								'grid'     => array(
									'fields' => array( 'post_per_grid' ),
								),
							),
						),

						'post_per_grid'       => array(
							'type'       => 'unit',
							'label'      => __( 'Columns', 'xpro-bb-addons' ),
							'help'       => __( 'This is how many columns you want to show.', 'xpro-bb-addons' ),
							'responsive' => array(
								'default' => array(
									'default'    => '3',
									'medium'     => '2',
									'responsive' => '1',
								),
							),
						),
						'blog_image_position' => array(
							'type'    => 'select',
							'label'   => __( 'Select Post Layout', 'xpro-bb-addons' ),
							'help'    => __( 'Select your post layout', 'xpro-bb-addons' ),
							'default' => 'top',
							'options' => array(
								'top'        => __( 'Layout 1', 'xpro-bb-addons' ),
								'left'       => __( 'Layout 2', 'xpro-bb-addons' ),
								'right'      => __( 'Layout 3', 'xpro-bb-addons' ),
								'background' => __( 'Layout 4', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'background' => array(
									'fields' => array( 'overlay_color', 'overlay_color_opc' ),
								),
								'top'        => array(
									'fields' => array( 'img_sorting_order' ),
								),
							),
						),
						'overlay_color'       => array(
							'type'        => 'color',
							'label'       => __( 'Overlay Color', 'xpro-bb-addons' ),
							'default'     => '',
							'connections' => array( 'color' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
					),
				),
				'carousel_filter' => array(
					'title'  => __( 'Carousel Settings', 'xpro-bb-addons' ),
					'fields' => array(
						'slides_to_scroll'       => array(
							'type'        => 'unit',
							'label'       => __( 'Posts to Scroll', 'xpro-bb-addons' ),
							'help'        => __( 'This is how many posts you want to scroll at a time.', 'xpro-bb-addons' ),
							'placeholder' => '1',
							'units'       => array( 'posts' ),
							'slider'      => array(
								'' => array(
									'min'  => 0,
									'max'  => 100,
									'step' => 10,
								),
							),
						),
						'autoplay'               => array(
							'type'    => 'select',
							'label'   => __( 'Autoplay Post Scroll', 'xpro-bb-addons' ),
							'help'    => __( 'Enables auto play of posts.', 'xpro-bb-addons' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'animation_speed' ),
								),
							),
						),
						'animation_speed'        => array(
							'type'        => 'unit',
							'label'       => __( 'Autoplay Speed', 'xpro-bb-addons' ),
							'help'        => __( 'Enter the time interval to scroll post automatically.', 'xpro-bb-addons' ),
							'placeholder' => '1000',
							'slider'      => true,
							'units'       => array( 'ms' ),
						),
						'infinite_loop'          => array(
							'type'    => 'select',
							'label'   => __( 'Infinite Loop', 'xpro-bb-addons' ),
							'help'    => __( 'Enable this to scroll posts in infinite loop.', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
						),
						'lazyload'               => array(
							'type'    => 'select',
							'label'   => __( 'Enable Lazy Load', 'xpro-bb-addons' ),
							'help'    => __( 'Enable this to load the image as soon as user slide to it.', 'xpro-bb-addons' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
						),
						'enable_arrow'           => array(
							'type'    => 'select',
							'label'   => __( 'Enable Arrows', 'xpro-bb-addons' ),
							'help'    => __( 'Enable Next/Prev arrows to your carousel slider.', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
						),
						'enable_dots'            => array(
							'type'    => 'select',
							'label'   => __( 'Enable Dots', 'xpro-bb-addons' ),
							'help'    => __( 'Enable Dots for the navigation', 'xpro-bb-addons' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'post_dots_size', 'post_dots_color' ),
								),
							),
						),
						'arrow_position'         => array(
							'type'    => 'select',
							'label'   => __( 'Arrow Position', 'xpro-bb-addons' ),
							'default' => 'outside',
							'options' => array(
								'outside' => __( 'Outside', 'xpro-bb-addons' ),
								'inside'  => __( 'Inside', 'xpro-bb-addons' ),
							),
						),
						'icon_left'              => array(
							'type'        => 'icon',
							'label'       => __( 'Left Arrow Icon', 'xpro-bb-addons' ),
							'show_remove' => true,
						),
						'icon_right'             => array(
							'type'        => 'icon',
							'label'       => __( 'Right Arrow Icon', 'xpro-bb-addons' ),
							'show_remove' => true,
						),
						'arrow_style'            => array(
							'type'    => 'select',
							'label'   => __( 'Arrow Style', 'xpro-bb-addons' ),
							'default' => 'circle',
							'options' => array(
								'square'        => __( 'Square Background', 'xpro-bb-addons' ),
								'circle'        => __( 'Circle Background', 'xpro-bb-addons' ),
								'square-border' => __( 'Square Border', 'xpro-bb-addons' ),
								'circle-border' => __( 'Circle Border', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'square-border' => array(
									'fields' => array( 'arrow_color', 'arrow_color_border', 'arrow_border_size' ),
								),
								'circle-border' => array(
									'fields' => array( 'arrow_color', 'arrow_color_border', 'arrow_border_size' ),
								),
								'square'        => array(
									'fields' => array( 'arrow_color', 'arrow_background_color' ),
								),
								'circle'        => array(
									'fields' => array( 'arrow_color', 'arrow_background_color' ),
								),
							),
						),
						'arrow_color'            => array(
							'type'        => 'color',
							'label'       => __( 'Arrow Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'arrow_background_color' => array(
							'type'        => 'color',
							'label'       => __( 'Arrow Background Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'arrow_color_border'     => array(
							'type'        => 'color',
							'label'       => __( 'Arrow Border Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'arrow_border_size'      => array(
							'type'       => 'unit',
							'label'      => __( 'Border Size', 'xpro-bb-addons' ),
							'default'    => '1',
							'units'      => array( 'px' ),
							'size'       => '8',
							'max_length' => '3',
							'slider'     => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'post_dots_size'         => array(
							'type'    => 'unit',
							'label'   => __( 'Dots Size', 'xpro-bb-addons' ),
							'units'   => array( 'px' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.xpro-blog-posts .slick-dots li button:before',
								'property' => 'font-size',
								'unit'     => 'px',
							),
							'slider'  => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'post_dots_color'        => array(
							'type'        => 'color',
							'label'       => __( 'Dots Color', 'xpro-bb-addons' ),
							'show_alpha'  => 'true',
							'show_reset'  => 'true',
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.xpro-blog-posts ul.slick-dots li button:before, .xpro-blog-post ul.slick-dots li.slick-active button:before',
								'property' => 'color',
							),
						),
					),
				),
				'xpro_message'    => array(
					'title'  => __( 'Message', 'xpro-bb-addons' ),
					'fields' => array(
						'no_results_message' => array(
							'type'    => 'text',
							'label'   => __( 'No Results Message', 'xpro-bb-addons' ),
							'default' => __( "Sorry, we couldn't find any posts. Please try a different search.", 'xpro-bb-addons' ),
						),
						'show_search'        => array(
							'type'    => 'select',
							'label'   => __( 'Show Search', 'xpro-bb-addons' ),
							'default' => '1',
							'options' => array(
								'1' => __( 'Show', 'xpro-bb-addons' ),
								'0' => __( 'Hide', 'xpro-bb-addons' ),
							),
							'help'    => __( 'Shows the search form if no posts are found.', 'xpro-bb-addons' ),
						),
					),
				),
			),
		),
		'post_type_filter' => array(
			'title' => __( 'Query', 'xpro-bb-addons' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'xpro_controls'    => array(
			'title'    => __( 'Display', 'xpro-bb-addons' ),
			'sections' => array(
				'image_settings'     => array(
					'title'  => __( 'Featured Image', 'xpro-bb-addons' ),
					'fields' => array(
						'show_featured_image'      => array(
							'type'    => 'select',
							'label'   => __( 'Display Featured Image', 'xpro-bb-addons' ),
							'help'    => __( 'Enable this to display featured image of posts in a module.', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'featured_image_size', 'featured_image_size_width', 'featured_image_size_height', 'custom_image_box_height', 'custom_image_size_height', 'custom_image_size_width', 'custom_image_type', 'img_box_bg_color', 'custom_image_width_type', 'img_sorting_order' ),
								),
							),
						),
						'featured_image_size'      => array(
							'type'    => 'select',
							'label'   => __( 'Featured Image Size', 'xpro-bb-addons' ),
							'default' => 'custom',
							'options' => apply_filters(
								'xpro_blog_posts_featured_image_sizes',
								array(
									'full'      => __( 'Full', 'xpro-bb-addons' ),
									'large'     => __( 'Large', 'xpro-bb-addons' ),
									'medium'    => __( 'Medium', 'xpro-bb-addons' ),
									'thumbnail' => __( 'Thumbnail', 'xpro-bb-addons' ),
									'custom'    => __( 'Custom', 'xpro-bb-addons' ),
								)
							),
							'toggle'  => array(
								'custom' => array(
									'fields' => array( 'custom_image_type', 'img_box_bg_color', 'custom_image_size_height', 'custom_image_size_width', 'custom_image_box_height', 'custom_image_width_type' ),
								),
							),
						),
						'custom_image_box_height'  => array(
							'type'        => 'unit',
							'label'       => __( 'Custom Image Box Height', 'xpro-bb-addons' ),
							'help'        => __( 'Custom Image Box height will be effective vertically & will increase box height of image', '' ),
							'units'       => array( 'px' ),
							'placeholder' => '300',
							'default'     => '300',
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'custom_image_size_height' => array(
							'type'    => 'unit',
							'label'   => __( 'Custom Image Height', 'xpro-bb-addons' ),
							'units'   => array( 'px' ),
							'default' => '300',
							'slider'  => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'custom_image_width_type'  => array(
							'type'    => 'select',
							'label'   => __( 'Custom Image Width Type', 'xpro-bb-addons' ),
							'help'    => __( 'Select Custom Image width type to percent or pixel', 'xpro-bb-addons' ),
							'default' => '%',
							'options' => array(
								'px' => __( 'Pixel', 'xpro-bb-addons' ),
								'%'  => __( 'Percent', 'xpro-bb-addons' ),
							),
						),
						'custom_image_size_width'  => array(
							'type'    => 'unit',
							'label'   => __( 'Custom Image Width', 'xpro-bb-addons' ),
							'default' => '100',
							'slider'  => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'custom_image_type'        => array(
							'type'    => 'select',
							'label'   => __( 'Select Image Type', 'xpro-bb-addons' ),
							'help'    => __( 'Image type will work on custom image size', 'xpro-bb-addons' ),
							'default' => 'cover',
							'options' => array(
								'cover'   => __( 'Cover', 'xpro-bb-addons' ),
								'contain' => __( 'Contain', 'xpro-bb-addons' ),
								'fill'    => __( 'Fill', 'xpro-bb-addons' ),
							),
						),
						'img_box_bg_color'         => array(
							'type'        => 'color',
							'label'       => __( 'Image box background color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'img_box_border'           => array(
							'type'    => 'border',
							'label'   => 'Image Box Border',
							'preview' => array(
								'type'      => 'css',
								'selector'  => '{node} .xpro-post-wrapper .xpro-post-thumbnail',
								'property'  => 'border',
								'unit'      => 'px',
								'important' => true,
							),
						),
					),
				),
				'title_settings'     => array(
					'title'  => __( 'Title', 'xpro-bb-addons' ),
					'fields' => array(
						'show_title'  => array(
							'type'    => 'select',
							'label'   => __( 'Display Title', 'xpro-bb-addons' ),
							'help'    => __( 'Enable this to display title of posts in a module.', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields'   => array( 'title_count', 'title_sort', 'title_padding', 'title_margin' ),
									'sections' => array( 'title_typography' ),
								),
							),
						),
						'title_count' => array(
							'type'    => 'unit',
							'label'   => __( 'Title Count', 'xpro-bb-addons' ),
							'help'    => __( 'Enter the value to limit post title characters.', 'xpro-bb-addons' ),
							'default' => '25',
							'slider'  => true,
						),

					),
				),
				'meta_settings'      => array(
					'title'  => __( 'Post Meta', 'xpro-bb-addons' ),
					'fields' => array(
						'show_meta'       => array(
							'type'    => 'select',
							'label'   => __( 'Display Meta Information', 'xpro-bb-addons' ),
							'help'    => __( 'Enable this to display post meta information in a module.', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'yes' => array(
									'sections' => array( 'meta_typography', 'meta_styling' ),
									'fields'   => array( 'show_author', 'show_date', 'date_format', 'seprator_meta', 'show_categories', 'show_tags', 'show_comments', 'meta_sort', 'meta_padding', 'meta_margin' ),
								),
							),
						),
						'show_author'     => array(
							'type'    => 'select',
							'label'   => __( 'Show Author', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
						),
						'show_date'       => array(
							'type'    => 'select',
							'label'   => __( 'Show Date', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'date_format' ),
								),
							),
						),
						'date_format'     => array(
							'type'    => 'select',
							'label'   => __( 'Date Format', 'xpro-bb-addons' ),
							'default' => 'M j, Y',
							'options' => array(
								'M j, Y' => date_i18n( 'M j, Y' ),
								'F j, Y' => date_i18n( 'F j, Y' ),
								'm/d/Y'  => date_i18n( 'm/d/Y' ),
								'm-d-Y'  => date_i18n( 'm-d-Y' ),
								'm.d.Y'  => date_i18n( 'm.d.Y' ),
								'd M Y'  => date_i18n( 'd M Y' ),
								'd F Y'  => date_i18n( 'd F Y' ),
								'd-m-Y'  => date_i18n( 'd-m-Y' ),
								'd.m.Y'  => date_i18n( 'd.m.Y' ),
								'd/m/Y'  => date_i18n( 'd/m/Y' ),
								'Y-m-d'  => date_i18n( 'Y-m-d' ),
								'Y.m.d'  => date_i18n( 'Y.m.d' ),
								'Y/m/d'  => date_i18n( 'Y/m/d' ),
								'M, Y'   => date_i18n( 'M, Y' ),
								'M Y'    => date_i18n( 'M Y' ),
								'F, Y'   => date_i18n( 'F, Y' ),
								'F Y'    => date_i18n( 'F Y' ),
							),
						),
						'seprator_meta'   => array(
							'type'    => 'text',
							'label'   => __( 'Meta Separator', 'xpro-bb-addons' ),
							'default' => ' | ',
							'size'    => 4,
						),
						'show_categories' => array(
							'type'    => 'select',
							'label'   => __( 'Show Categories', 'xpro-bb-addons' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
						),
						'show_tags'       => array(
							'type'    => 'select',
							'label'   => __( 'Show Tags', 'xpro-bb-addons' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
						),
						'show_comments'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Comments', 'xpro-bb-addons' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
						),
					),
				),
				'date_box_section'   => array(
					'title'  => __( 'Date Box', 'xpro-bb-addons' ),
					'fields' => array(
						'show_date_box'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Date Box', 'xpro-bb-addons' ),
							'help'    => __( 'Enable this to display date box at top left corner of each individual post.', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields'   => array( 'date_box_format' ),
									'sections' => array( 'date_typography' ),
								),
							),
						),
						'date_box_format' => array(
							'type'    => 'select',
							'label'   => __( 'Date Format', 'xpro-bb-addons' ),
							'default' => 'M j, Y',
							'options' => array(
								'M j Y' => date_i18n( 'M j Y' ),
								'F j Y' => date_i18n( 'F j Y' ),
								'm d Y' => date_i18n( 'm d Y' ),
								'd m Y' => date_i18n( 'd m Y' ),
								'Y m d' => date_i18n( 'Y m d' ),
							),
						),
					),
				),
				'excerpt_settings'   => array(
					'title'  => __( 'Content', 'xpro-bb-addons' ),
					'fields' => array(
						'show_excerpt'       => array(
							'type'    => 'select',
							'label'   => __( 'Display Content', 'xpro-bb-addons' ),
							'help'    => __( 'Enable this to display content of posts in a module.', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'content_type', 'strip_content_html', 'excerpt_count', 'content_sort', 'desc_content_padding', 'desc_content_margin' ),
								),
							),
						),
						'content_type'       => array(
							'type'    => 'select',
							'label'   => __( 'Content Type', 'xpro-bb-addons' ),
							'default' => 'custom',
							'options' => array(
								'excerpt' => __( 'Excerpt', 'xpro-bb-addons' ),
								'content' => __( 'Full Content', 'xpro-bb-addons' ),
								'custom'  => __( 'Custom Word Count', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'excerpt' => array(
									'fields' => array( 'strip_content_html' ),
								),
								'content' => array(
									'fields' => array( 'strip_content_html' ),
								),
								'custom'  => array(
									'fields' => array( 'excerpt_count' ),
								),
							),
						),
						'strip_content_html' => array(
							'type'    => 'select',
							'label'   => __( 'Remove Line Breaks', 'xpro-bb-addons' ),
							'help'    => __( 'Enable this to display content without paragraphs and line breaks.', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
						),
						'excerpt_count'      => array(
							'type'    => 'unit',
							'label'   => __( 'Excerpt Count', 'xpro-bb-addons' ),
							'help'    => __( 'Enter the value to limit post content words. Keep it empty for default excerpt', 'xpro-bb-addons' ),
							'default' => '25',
							'slider'  => true,
						),
					),
				),
				'pagination_setting' => array(
					'title'  => __( 'Pagination', 'xpro-bb-addons' ),
					'fields' => array(
						'show_pagination'      => array(
							'type'    => 'select',
							'label'   => __( 'Show Pagination', 'xpro-bb-addons' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields'   => array( 'pagination', 'pagination_margin', 'pagination_padding' ),
									'sections' => array( 'pagination_style' ),
								),
							),
						),
						'pagination'           => array(
							'type'    => 'select',
							'label'   => __( 'Pagination Style', 'xpro-bb-addons' ),
							'default' => 'numbers',
							'options' => array(
								'numbers' => __( 'Numbers', 'xpro-bb-addons' ),
								'scroll'  => __( 'Scroll', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'numbers' => array(
									'sections' => array( 'pagination_style' ),
								),
								'scroll'  => array(
									'fields' => array( 'show_paginate_loader' ),
								),
							),
						),
						'show_paginate_loader' => array(
							'type'    => 'select',
							'label'   => __( 'Show Loader', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
						),
						'posts_per_page' => array(
							'type'        => 'unit',
							'label'       => __( 'Posts Per Page', 'xpro-bb-addons' ),
							'placeholder' => '10',
							'units'       => array( 'posts' ),
							'slider'      => array(
								'' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
					),
				),
				'cta'                => array(
					'title'  => __( 'Call to Action', 'xpro-bb-addons' ),
					'fields' => array(
						'cta_type'      => array(
							'type'    => 'select',
							'label'   => __( 'Type', 'xpro-bb-addons' ),
							'help'    => __( 'Select the call to action type for your posts.', 'xpro-bb-addons' ),
							'default' => 'link',
							'options' => array(
								'none'   => _x( 'None', 'Call to action.', 'xpro-bb-addons' ),
								'link'   => __( 'Text', 'xpro-bb-addons' ),
								'button' => __( 'Button', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'none'   => array(),
								'link'   => array(
									'fields'   => array( 'cta_text', 'link_target', 'cta_sort', 'cta_padding', 'cta_margin' ),
									'sections' => array( 'link_typography' ),
								),
								'button' => array(
									'sections' => array( 'btn-colors', 'btn-icon', 'btn-style', 'btn-structure', 'btn_typography' ),
									'fields'   => array( 'btn_text', 'link_target', 'cta_sort', 'cta_padding', 'cta_margin' ),
								),
							),
						),
						'cta_text'      => array(
							'type'    => 'text',
							'label'   => __( 'Enter Text', 'xpro-bb-addons' ),
							'help'    => __( 'Enter the text for your call to action link.', 'xpro-bb-addons' ),
							'default' => __( 'Read More', 'xpro-bb-addons' ),
						),
						'btn_text'      => array(
							'type'    => 'text',
							'label'   => __( 'Enter Text', 'xpro-bb-addons' ),
							'help'    => __( 'Enter the text for your call to action button.', 'xpro-bb-addons' ),
							'default' => __( 'Click Here', 'xpro-bb-addons' ),
						),
						'link_target'   => array(
							'type'    => 'select',
							'label'   => __( 'Link Target', 'xpro-bb-addons' ),
							'help'    => __( 'Controls where CTA link will open after click.', 'xpro-bb-addons' ),
							'default' => '_self',
							'options' => array(
								'_self'  => __( 'Same Window', 'xpro-bb-addons' ),
								'_blank' => __( 'New Window', 'xpro-bb-addons' ),
							),
							'preview' => array(
								'type' => 'none',
							),
						),
						'link_nofollow' => array(
							'type'        => 'select',
							'label'       => __( 'Link nofollow', 'xpro-bb-addons' ),
							'description' => '',
							'default'     => '0',
							'help'        => __( 'Enable this to make this link nofollow', 'xpro-bb-addons' ),
							'options'     => array(
								'1' => __( 'Yes', 'xpro-bb-addons' ),
								'0' => __( 'No', 'xpro-bb-addons' ),
							),
						),
					),
				),
			),
		),
		'layout'           => array(
			'title'    => __( 'Sorting', 'xpro-bb-addons' ),
			'sections' => array(
				'post_styles' => array(
					'title'  => __( 'Post Layout Sort Order', 'xpro-bb-addons' ),
					'fields' => array(
						'layout_sort_order'    => array(
							'type'    => 'xpro-sortable',
							'label'   => __( 'Layout Sort', 'xpro-bb-addons' ),
							'help'    => __( 'Layout Sorting will work after saving the module', 'xpro-bb-addons' ),
							'default' => 'img,title,meta,content,cta',
							'options' => array(
								'img'     => __( 'Featured Image', 'xpro-bb-addons' ),
								'title'   => __( 'Title', 'xpro-bb-addons' ),
								'meta'    => __( 'Meta', 'xpro-bb-addons' ),
								'content' => __( 'Content', 'xpro-bb-addons' ),
								'cta'     => __( 'CTA', 'xpro-bb-addons' ),
							),
						),
						'enable_sorting_order' => array(
							'type'    => 'select',
							'label'   => __( 'Enable Sorting Order?', 'xpro-bb-addons' ),
							'help'    => __( 'Enable/disable sorting order. give the priority by giving the numbers. minimum number field will display on top', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'title_sort', 'meta_sort', 'content_sort', 'cta_sort' ),
								),
							),
						),
						'title_sort'           => array(
							'type'    => 'unit',
							'label'   => __( 'Title Order', 'xpro-bb-addons' ),
							'slider'  => true,
							'default' => '1',
							'help'    => __( 'Give the priority by giving the number. minimum number field will display on top', 'xpro-bb-addons' ),
						),
						'meta_sort'            => array(
							'type'    => 'unit',
							'label'   => __( 'Meta Order', 'xpro-bb-addons' ),
							'slider'  => true,
							'default' => '2',
							'help'    => __( 'Give the priority by giving the number. minimum number field will display on top', 'xpro-bb-addons' ),
						),
						'content_sort'         => array(
							'type'    => 'unit',
							'label'   => __( 'Content Order', 'xpro-bb-addons' ),
							'slider'  => true,
							'default' => '3',
							'help'    => __( 'Give the priority by giving the number. minimum number field will display on top', 'xpro-bb-addons' ),
						),
						'cta_sort'             => array(
							'type'    => 'unit',
							'label'   => __( 'CTA Order', 'xpro-bb-addons' ),
							'slider'  => true,
							'default' => '4',
							'help'    => __( 'Give the priority by giving the number. minimum number field will display on top', 'xpro-bb-addons' ),
						),
						'meta_sort_order'      => array(
							'type'    => 'xpro-sortable',
							'label'   => __( 'Meta Layout Sort', 'xpro-bb-addons' ),
							'default' => 'author,date,taxonomy,comment',
							'options' => array(
								'author'   => __( 'Author', 'xpro-bb-addons' ),
								'date'     => __( 'Date', 'xpro-bb-addons' ),
								'taxonomy' => __( 'Taxonomy', 'xpro-bb-addons' ),
								'comment'  => __( 'Comment', 'xpro-bb-addons' ),
							),
						),
					),
				),
			),
		),
		'style'            => array(
			'title'    => __( 'Style', 'xpro-bb-addons' ),
			'sections' => array(
				'alignment'             => array(
					'title'  => __( 'Content Basic Styling', 'xpro-bb-addons' ),
					'fields' => array(
						'overall_alignment'         => array(
							'type'    => 'align',
							'label'   => __( 'Overall Alignment', 'xpro-bb-addons' ),
							'help'    => __( 'Controls the content alignment of each individual post.', 'xpro-bb-addons' ),
							'default' => 'center',
							'preview' => array(
								'type'      => 'css',
								'selector'  => '.xpro-blog-post-content',
								'property'  => 'text-align',
								'important' => true,
							),
						),
						'overall_padding_dimension' => array(
							'type'       => 'dimension',
							'label'      => __( 'Overall Padding', 'xpro-bb-addons' ),
							'help'       => __( 'Manage the outside spacing of entire area of post.', 'xpro-bb-addons' ),
							'units'      => array( 'px' ),
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-blog-post-inner-wrap',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
							'responsive' => array(
								'placeholder' => array(
									'default'    => '0',
									'medium'     => '',
									'responsive' => '',
								),
							),
							'slider'     => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'element_space'             => array(
							'type'        => 'unit',
							'label'       => __( 'Space Between Posts', 'xpro-bb-addons' ),
							'size'        => '8',
							'placeholder' => '15',
							'units'       => array( 'px' ),
							'help'        => __( 'Manage the spacing between two posts from left, right', 'xpro-bb-addons' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'below_element_space'       => array(
							'type'        => 'unit',
							'label'       => __( 'Bottom Spacing', 'xpro-bb-addons' ),
							'size'        => '8',
							'placeholder' => '30',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'equal_height_box'          => array(
							'type'    => 'select',
							'label'   => __( 'Equal Height Boxes', 'xpro-bb-addons' ),
							'help'    => __( 'Enable this to display all posts with same height.', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
						),
						'mesonry_equal_height'      => array(
							'type'    => 'select',
							'label'   => __( 'Masonry Equal Height', 'xpro-bb-addons' ),
							'help'    => __( 'Enable this to display all posts with same height.', 'xpro-bb-addons' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
						),
						'box_border_settings'       => array(
							'type'       => 'border',
							'label'      => 'Box Border Settings',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-blog-post-inner-wrap',
								'property'  => 'border',
								'unit'      => 'px',
								'important' => true,
							),
						),
					),
				),
				'title_styling'         => array(
					'title'  => __( 'Title Styling', 'xpro-bb-addons' ),
					'fields' => array(
						'title_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Title Padding', 'xpro-bb-addons' ),
							'slider'     => true,
							'units'      => array( 'px' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '{node} .xpro-post-heading',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'title_margin'  => array(
							'type'       => 'dimension',
							'label'      => __( 'Title Margin', 'xpro-bb-addons' ),
							'slider'     => true,
							'units'      => array( 'px' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '{node} .xpro-post-heading',
								'property'  => 'margin',
								'unit'      => 'px',
								'important' => true,
							),
						),
					),
				),
				'meta_styling'          => array(
					'title'  => __( 'Meta Styling', 'xpro-bb-addons' ),
					'fields' => array(
						'meta_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Meta Padding', 'xpro-bb-addons' ),
							'slider'     => true,
							'units'      => array( 'px' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '{node} .xpro-post-meta',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'meta_margin'  => array(
							'type'       => 'dimension',
							'label'      => __( 'Meta Margin', 'xpro-bb-addons' ),
							'slider'     => true,
							'units'      => array( 'px' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '{node} .xpro-post-meta',
								'property'  => 'margin',
								'unit'      => 'px',
								'important' => true,
							),
						),
					),
				),
				'content_styling'       => array(
					'title'  => __( 'Content Styling', 'xpro-bb-addons' ),
					'fields' => array(
						'desc_content_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Content Padding', 'xpro-bb-addons' ),
							'slider'     => true,
							'units'      => array( 'px' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '{node} .xpro-blog-posts-description',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'desc_content_margin'  => array(
							'type'       => 'dimension',
							'label'      => __( 'Content Margin', 'xpro-bb-addons' ),
							'slider'     => true,
							'units'      => array( 'px' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '{node} .xpro-blog-posts-description',
								'property'  => 'margin',
								'unit'      => 'px',
								'important' => true,
							),
						),
					),
				),
				'style'                 => array(
					'title'     => __( 'Content Area Styling', 'xpro-bb-addons' ),
					'collapsed' => true,
					'fields'    => array(
						'content_padding_dimension' => array(
							'type'       => 'dimension',
							'label'      => __( 'Content Padding', 'xpro-bb-addons' ),
							'help'       => __( 'Manage the outside spacing of content area of post.', 'xpro-bb-addons' ),
							'units'      => array( 'px' ),
							'responsive' => array(
								'placeholder' => array(
									'default'    => '25',
									'medium'     => '',
									'responsive' => '',
								),
							),
							'slider'     => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'content_background_color'  => array(
							'type'        => 'color',
							'label'       => __( 'Content Background Color', 'xpro-bb-addons' ),
							'default'     => 'f6f6f6',
							'help'        => __( 'Controls the background color of content area (Area below the featured image).', 'xpro-bb-addons' ),
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'content_area_border'       => array(
							'type'       => 'border',
							'label'      => __( 'Content Border', 'xpro-bb-addons' ),
							'slider'     => true,
							'units'      => array( 'px' ),
							'responsive' => true,
						),
					),
				),
				'btn-colors'            => array(
					'title'     => __( 'Button Style', 'xpro-bb-addons' ),
					'collapsed' => true,
					'fields'    => array(
						'btn_text_color'                => array(
							'type'        => 'color',
							'label'       => __( 'Text Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'btn_text_hover_color'          => array(
							'type'        => 'color',
							'label'       => __( 'Text Hover Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type' => 'none',
							),
						),
						'btn_bg_type'                   => array(
							'type'    => 'select',
							'label'   => __( 'Toggle Background Type', 'xpro-bb-addons' ),
							'default' => 'bg-color',
							'options' => array(
								'none'        => __( 'None', 'xpro-bb-addons' ),
								'bg-color'    => __( 'Background Color', 'xpro-bb-addons' ),
								'bg-gradient' => __( 'Background Gradient', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'bg-color'    => array(
									'fields' => array( 'btn_bg_color' ),
								),
								'bg-gradient' => array(
									'fields' => array( 'btn_background_gradient' ),
								),
							),
						),
						'btn_bg_color'                  => array(
							'type'        => 'color',
							'label'       => __( 'Background Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'btn_background_gradient'       => array(
							'type'       => 'gradient',
							'label'      => __( 'Background Gradient', 'xpro-bb-addons' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'btn_bg_hv_type'                => array(
							'type'    => 'select',
							'label'   => __( 'Button Background Type', 'xpro-bb-addons' ),
							'default' => 'bg-color',
							'options' => array(
								'none'        => __( 'None', 'xpro-bb-addons' ),
								'bg-color'    => __( 'Background Hover Color', 'xpro-bb-addons' ),
								'bg-gradient' => __( 'Background Hover Gradient', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'bg-color'    => array(
									'fields' => array( 'btn_bg_hover_color' ),
								),
								'bg-gradient' => array(
									'fields' => array( 'btn_background_hover_gradient' ),
								),
							),
						),
						'btn_bg_hover_color'            => array(
							'type'        => 'color',
							'label'       => __( 'Background Hover Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'btn_background_hover_gradient' => array(
							'type'       => 'gradient',
							'label'      => __( 'Background Hover Gradient', 'xpro-bb-addons' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'button_border'                 => array(
							'type'    => 'border',
							'label'   => __( 'Border', 'xpro-bb-addons' ),
							'slider'  => true,
							'units'   => array( 'px' ),
							'preview' => array(
								'type'      => 'css',
								'selector'  => '.xpro-blog-btn-cls a',
								'property'  => 'border',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'border_hover_color'            => array(
							'type'        => 'color',
							'label'       => __( 'Border Hover Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
						),
						'cta_padding'                   => array(
							'type'       => 'dimension',
							'label'      => __( 'Cta Padding', 'xpro-bb-addons' ),
							'slider'     => true,
							'units'      => array( 'px' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '{node} .xpro-read-more-text, {node} .xpro-blog-btn-cls a',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'cta_margin'                    => array(
							'type'       => 'dimension',
							'label'      => __( 'Cta Margin', 'xpro-bb-addons' ),
							'slider'     => true,
							'units'      => array( 'px' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '{node} .xpro-read-more-text, {node} .xpro-blog-btn-cls',
								'property'  => 'margin',
								'unit'      => 'px',
								'important' => true,
							),
						),
					),
				),
				'pagination_style'      => array(
					'title'     => __( 'Pagination Style', 'xpro-bb-addons' ),
					'collapsed' => true,
					'fields'    => array(
						'pagination_alignment'           => array(
							'type'       => 'align',
							'label'      => __( 'Pagination Alignment', 'xpro-bb-addons' ),
							'default'    => 'center',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-blogs-pagination ul',
								'property'  => 'text-align',
								'important' => true,
							),
						),
						'pagination_style'               => array(
							'type'    => 'select',
							'label'   => __( 'Pagination Button Style', 'xpro-bb-addons' ),
							'default' => 'circle',
							'options' => array(
								'square'        => __( 'Flat', 'xpro-bb-addons' ),
								'square-border' => __( 'Transparent', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'square-border' => array(
									'fields' => array( 'pagination_border_param' ),
								),
								'square'        => array(
									'fields' => array(
										'pagination_color',
										'pagination_hover_color',
										'pagination_active_color',
										'pagination_background_color',
										'pagination_background_color_opc',
										'pagination_hover_background_color',
										'pagination_hover_background_color_opc',
										'pagination_active_background_color',
										'pagination_active_background_color_opc',
									),
								),
							),
						),
						'pagination_border_param'        => array(
							'type'       => 'border',
							'label'      => __( 'Item Border', 'xpro-bb-addons' ),
							'responsive' => true,
							'default'    => array(
								'style' => 'none',
								'color' => '',
								'width' => array(
									'top'    => '1',
									'right'  => '1',
									'bottom' => '1',
									'left'   => '1',
								),
							),
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-blogs-pagination li a.page-numbers',
								'important' => true,
							),
						),
						'pagination_color'               => array(
							'type'        => 'color',
							'label'       => __( 'Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.xpro-blogs-pagination li a.page-numbers',
								'property'  => 'color',
								'important' => true,
							),
						),
						'pagination_hover_color'         => array(
							'type'        => 'color',
							'label'       => __( 'Hover Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'pagination_active_color'        => array(
							'type'        => 'color',
							'label'       => __( 'Active Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.xpro-blogs-pagination li span.page-numbers.current',
								'property'  => 'color',
								'important' => true,
							),
						),
						'pagination_background_color'    => array(
							'type'        => 'color',
							'label'       => __( 'Background Color', 'xpro-bb-addons' ),
							'default'     => '',
							'connections' => array( 'color' ),
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.xpro-blogs-pagination li a.page-numbers',
								'property'  => 'background',
								'important' => true,
							),
						),
						'pagination_hover_background_color' => array(
							'type'        => 'color',
							'label'       => __( 'Background Hover Color', 'xpro-bb-addons' ),
							'default'     => '',
							'connections' => array( 'color' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'pagination_active_background_color' => array(
							'type'        => 'color',
							'label'       => __( 'Background Active Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.xpro-blogs-pagination li span.page-numbers.current',
								'property'  => 'background',
								'important' => true,
							),
						),
						'pagination_active_color_border' => array(
							'type'        => 'color',
							'label'       => __( 'Border Active Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'pagination_padding'             => array(
							'type'       => 'dimension',
							'label'      => __( 'Pagination Padding', 'xpro-bb-addons' ),
							'slider'     => true,
							'units'      => array( 'px' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '{node} .xpro-blogs-pagination',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'pagination_margin'              => array(
							'type'       => 'dimension',
							'label'      => __( 'Pagination Margin', 'xpro-bb-addons' ),
							'slider'     => true,
							'units'      => array( 'px' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '{node} .xpro-blogs-pagination',
								'property'  => 'margin',
								'unit'      => 'px',
								'important' => true,
							),
						),
					),
				),
				'masonary_style'        => array(
					'title'     => __( 'Taxonomy Filter Button Styling', 'xpro-bb-addons' ),
					'collapsed' => true,
					'fields'    => array(
						'masonary_overall_alignment'       => array(
							'type'       => 'align',
							'label'      => __( 'Alignment', 'xpro-bb-addons' ),
							'default'    => 'center',
							'responsive' => true,
							'help'       => __( 'Controls the alignment of filter button\'s section.', 'xpro-bb-addons' ),
						),
						'masonary_bottom_spacing'          => array(
							'type'        => 'unit',
							'label'       => __( 'Bottom Spacing', 'xpro-bb-addons' ),
							'units'       => array( 'px' ),
							'placeholder' => '40',
							'size'        => '8',
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'help'        => __( 'Use this setting to manage the space between filters and post.', 'xpro-bb-addons' ),
						),
						'masonary_padding_dimension'       => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Padding', 'xpro-bb-addons' ),
							'units'      => array( 'px' ),
							'slider'     => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'responsive' => array(
								'placeholder' => array(
									'default'    => '12',
									'medium'     => '',
									'responsive' => '',
								),
							),
						),
						'masonary_button_style'            => array(
							'type'    => 'select',
							'label'   => __( 'Button Style', 'xpro-bb-addons' ),
							'default' => 'circle',
							'options' => array(
								'square'        => __( 'Flat', 'xpro-bb-addons' ),
								'square-border' => __( 'Transparent', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'square-border' => array(
									'fields' => array( 'masonary_text_color', 'masonary_color_border', 'masonary_active_color_border', 'masonary_active_color', 'masonary_border_size', 'masonary_border_style' ),
								),
								'square'        => array(
									'fields' => array(
										'masonary_text_color',
										'masonary_text_hover_color',
										'masonary_active_color',
										'masonary_background_color',
										'masonary_background_color_opc',
										'masonary_background_hover_color',
										'masonary_background_hover_color_opc',
										'masonary_background_active_color',
										'masonary_background_active_color_opc',
									),
								),
							),
						),
						'masonary_border_style'            => array(
							'type'    => 'select',
							'label'   => __( 'Border Style', 'xpro-bb-addons' ),
							'default' => 'solid',
							'help'    => __( 'The type of border to use. Double borders must have a height of at least 3px to render properly.', 'xpro-bb-addons' ),
							'options' => array(
								'solid'  => __( 'Solid', 'xpro-bb-addons' ),
								'dotted' => __( 'Dotted', 'xpro-bb-addons' ),
								'dashed' => __( 'Dashed', 'xpro-bb-addons' ),
								'double' => __( 'Double', 'xpro-bb-addons' ),
							),
						),
						'masonary_border_size'             => array(
							'type'        => 'unit',
							'label'       => __( 'Border Size', 'xpro-bb-addons' ),
							'description' => __( 'px', 'xpro-bb-addons' ),
							'placeholder' => '2',
							'size'        => '8',
						),
						'masonary_border_radius'           => array(
							'type'        => 'unit',
							'label'       => __( 'Border Radius', 'xpro-bb-addons' ),
							'description' => __( 'px', 'xpro-bb-addons' ),
							'placeholder' => '2',
							'size'        => '8',
						),
						'masonary_text_color'              => array(
							'type'        => 'color',
							'label'       => __( 'Text Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
						'masonary_text_hover_color'        => array(
							'type'        => 'color',
							'label'       => __( 'Hover Text Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
						'masonary_active_color'            => array(
							'type'        => 'color',
							'label'       => __( 'Active Text Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
						'masonary_background_color'        => array(
							'type'        => 'color',
							'label'       => __( 'Background Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
						'masonary_background_hover_color'  => array(
							'type'        => 'color',
							'label'       => __( 'Hover Background Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'masonary_background_active_color' => array(
							'type'        => 'color',
							'label'       => __( 'Active Background Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'masonary_color_border'            => array(
							'type'        => 'color',
							'label'       => __( 'Border Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
						'masonary_active_color_border'     => array(
							'type'        => 'color',
							'label'       => __( 'Border Active Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
					),
				),
				'masonary_select_style' => array(
					'title'     => __( 'Drop-down Taxonomy Filter Styling', 'xpro-bb-addons' ),
					'collapsed' => true,
					'fields'    => array(
						'selfilter_width'             => array(
							'type'    => 'unit',
							'label'   => __( 'Width', 'xpro-bb-addons' ),
							'units'   => array( 'px' ),
							'size'    => '8',
							'preview' => array(
								'type'      => 'css',
								'selector'  => 'select.xpro-masonary-filters',
								'property'  => 'width',
								'important' => true,
								'unit'      => 'px',
							),
							'slider'  => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'selfilter_overall_alignment' => array(
							'type'       => 'align',
							'label'      => __( 'Alignment', 'xpro-bb-addons' ),
							'default'    => 'center',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-masonary-filters-wrapper',
								'property'  => 'text-align',
								'important' => true,
							),
						),
						'selfilter_bottom_spacing'    => array(
							'type'        => 'unit',
							'label'       => __( 'Bottom Spacing', 'xpro-bb-addons' ),
							'units'       => array( 'px' ),
							'placeholder' => '40',
							'size'        => '8',
							'help'        => __( 'Use this setting to manage the space between filters and post.', 'xpro-bb-addons' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => 'select.xpro-masonary-filters',
								'property'  => 'margin-bottom',
								'important' => true,
								'unit'      => 'px',
							),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'selfilter_border_enable'     => array(
							'type'    => 'select',
							'label'   => __( 'Show Border', 'xpro-bb-addons' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'xpro-bb-addons' ),
								'no'  => __( 'No', 'xpro-bb-addons' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'selfilter_border_style', 'selfilter_border_size', 'selfilter_border_radius', 'selfilter_color_border' ),
								),
							),
						),
						'selfilter_border_style'      => array(
							'type'    => 'select',
							'label'   => __( 'Border Style', 'xpro-bb-addons' ),
							'default' => 'solid',
							'help'    => __( 'The type of border to use. Double borders must have a height of at least 3px to render properly.', 'xpro-bb-addons' ),
							'options' => array(
								'solid'  => __( 'Solid', 'xpro-bb-addons' ),
								'dotted' => __( 'Dotted', 'xpro-bb-addons' ),
								'dashed' => __( 'Dashed', 'xpro-bb-addons' ),
								'double' => __( 'Double', 'xpro-bb-addons' ),
							),
							'preview' => array(
								'type'      => 'css',
								'selector'  => 'select.xpro-masonary-filters',
								'property'  => 'border-style',
								'important' => true,
							),
						),
						'selfilter_border_size'       => array(
							'type'        => 'unit',
							'label'       => __( 'Border Size', 'xpro-bb-addons' ),
							'placeholder' => '1',
							'slider'      => true,
							'units'       => array( 'px' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => 'select.xpro-masonary-filters',
								'property'  => 'border-width',
								'important' => true,
								'unit'      => 'px',
							),
						),
						'selfilter_border_radius'     => array(
							'type'        => 'unit',
							'label'       => __( 'Border Radius', 'xpro-bb-addons' ),
							'placeholder' => '2',
							'slider'      => true,
							'units'       => array( 'px' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => 'select.xpro-masonary-filters',
								'property'  => 'border-radius',
								'important' => true,
								'unit'      => 'px',
							),
						),
						'selfilter_color_border'      => array(
							'type'       => 'color',
							'label'      => __( 'Border Color', 'xpro-bb-addons' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => 'select.xpro-masonary-filters',
								'property'  => 'border-color',
								'important' => true,
							),
						),
						'selfilter_background_color'  => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'xpro-bb-addons' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => 'select.xpro-masonary-filters',
								'property'  => 'background',
								'important' => true,
							),
						),
					),
				),
			),
		),
		'typography'       => array(
			'title'    => __( 'Typography', 'xpro-bb-addons' ),
			'sections' => array(
				'title_typography'                        => array(
					'title'  => __( 'Title', 'xpro-bb-addons' ),
					'fields' => array(
						'title_tag_selection' => array(
							'type'    => 'select',
							'label'   => __( 'Tag', 'xpro-bb-addons' ),
							'default' => 'h3',
							'options' => array(
								'h1'   => __( 'H1', 'xpro-bb-addons' ),
								'h2'   => __( 'H2', 'xpro-bb-addons' ),
								'h3'   => __( 'H3', 'xpro-bb-addons' ),
								'h4'   => __( 'H4', 'xpro-bb-addons' ),
								'h5'   => __( 'H5', 'xpro-bb-addons' ),
								'h6'   => __( 'H6', 'xpro-bb-addons' ),
								'div'  => __( 'Div', 'xpro-bb-addons' ),
								'p'    => __( 'p', 'xpro-bb-addons' ),
								'span' => __( 'span', 'xpro-bb-addons' ),
							),
						),
						'title_font_typo'     => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'xpro-bb-addons' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-post-heading a',
								'important' => true,
							),
						),
						'title_color'         => array(
							'type'        => 'color',
							'label'       => __( 'Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.xpro-post-heading a',
								'property'  => 'color',
								'important' => true,
							),
						),
					),
				),
				'desc_typography'                         => array(
					'title'     => __( 'Description / Excerpt / Content', 'xpro-bb-addons' ),
					'collapsed' => true,
					'fields'    => array(
						'desc_font_typo' => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'xpro-bb-addons' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-blog-posts-description',
								'important' => true,
							),
						),
						'desc_color'     => array(
							'type'        => 'color',
							'label'       => __( 'Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.xpro-blog-posts-description',
								'property'  => 'color',
								'important' => true,
							),
						),
					),
				),
				'meta_typography'                         => array(
					'title'     => __( 'Post Meta', 'xpro-bb-addons' ),
					'collapsed' => true,
					'fields'    => array(
						'meta_tag_selection' => array(
							'type'    => 'select',
							'label'   => __( 'Meta Tag', 'xpro-bb-addons' ),
							'default' => 'h5',
							'options' => array(
								'h1'   => __( 'H1', 'xpro-bb-addons' ),
								'h2'   => __( 'H2', 'xpro-bb-addons' ),
								'h3'   => __( 'H3', 'xpro-bb-addons' ),
								'h4'   => __( 'H4', 'xpro-bb-addons' ),
								'h5'   => __( 'H5', 'xpro-bb-addons' ),
								'h6'   => __( 'H6', 'xpro-bb-addons' ),
								'div'  => __( 'Div', 'xpro-bb-addons' ),
								'p'    => __( 'p', 'xpro-bb-addons' ),
								'span' => __( 'span', 'xpro-bb-addons' ),
							),
						),
						'meta_font_typo'     => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'xpro-bb-addons' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-post-meta',
								'important' => true,
							),
						),
						'meta_text_color'    => array(
							'type'        => 'color',
							'label'       => __( 'Meta Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.xpro-post-meta',
								'property'  => 'color',
								'important' => true,
							),
						),
						'meta_color'         => array(
							'type'        => 'color',
							'label'       => __( 'Meta Link Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.xpro-post-meta a',
								'property'  => 'color',
								'important' => true,
							),
						),
						'meta_hover_color'   => array(
							'type'        => 'color',
							'label'       => __( 'Meta Link Hover Color', 'xpro-bb-addons' ),
							'default'     => '',
							'connections' => array( 'color' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
					),
				),
				'date_typography'                         => array(
					'title'     => __( 'Date Box', 'xpro-bb-addons' ),
					'collapsed' => true,
					'fields'    => array(
						'date_tag_selection'    => array(
							'type'    => 'select',
							'label'   => __( 'Tag', 'xpro-bb-addons' ),
							'default' => 'h2',
							'options' => array(
								'h1'   => __( 'H1', 'xpro-bb-addons' ),
								'h2'   => __( 'H2', 'xpro-bb-addons' ),
								'h3'   => __( 'H3', 'xpro-bb-addons' ),
								'h4'   => __( 'H4', 'xpro-bb-addons' ),
								'h5'   => __( 'H5', 'xpro-bb-addons' ),
								'h6'   => __( 'H6', 'xpro-bb-addons' ),
								'div'  => __( 'Div', 'xpro-bb-addons' ),
								'p'    => __( 'p', 'xpro-bb-addons' ),
								'span' => __( 'span', 'xpro-bb-addons' ),
							),
						),
						'date_font_typo'        => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'xpro-bb-addons' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-posted-on',
								'important' => true,
							),
						),
						'date_color'            => array(
							'type'        => 'color',
							'label'       => __( 'Date Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.xpro-posted-on',
								'property'  => 'color',
								'important' => true,
							),
						),
						'date_background_color' => array(
							'type'        => 'color',
							'label'       => __( 'Date Background Color', 'xpro-bb-addons' ),
							'default'     => '',
							'connections' => array( 'color' ),
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.xpro-posted-on',
								'property'  => 'background',
								'important' => true,
							),
						),
					),
				),
				'link_typography'                         => array(
					'title'     => __( 'Call to Action', 'xpro-bb-addons' ),
					'collapsed' => true,
					'fields'    => array(
						'link_font_typo'        => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'xpro-bb-addons' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-read-more-text a',
								'important' => true,
							),
						),
						'link_color'            => array(
							'type'        => 'color',
							'label'       => __( 'Link Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.xpro-blog-post-content .xpro-read-more-text a',
								'property'  => 'color',
								'important' => true,
							),
						),
						'link_more_arrow_color' => array(
							'type'        => 'color',
							'label'       => __( 'Arrow Color', 'xpro-bb-addons' ),
							'default'     => '',
							'connections' => array( 'color' ),
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.xpro-blog-post-content .xpro-read-more-text span',
								'property'  => 'color',
								'important' => true,
							),
						),
					),
				),
				'btn_typography'                          => array(
					'title'     => __( 'CTA Button', 'xpro-bb-addons' ),
					'collapsed' => true,
					'fields'    => array(
						'btn_font_typo' => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'xpro-bb-addons' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-blog-btn-cls a',
								'important' => true,
							),
						),
					),
				),
				'taxonomy_filter_select_field_typography' => array(
					'title'     => __( 'Taxonomy Filter', 'xpro-bb-addons' ),
					'collapsed' => true,
					'fields'    => array(
						'taxonomy_filter_font_typo'    => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'xpro-bb-addons' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => 'select.xpro-masonary-filters, ul.xpro-masonary-filters',
								'important' => true,
							),
						),
						'taxonomy_filter_select_color' => array(
							'type'        => 'color',
							'label'       => __( 'Text Color', 'xpro-bb-addons' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => 'select.xpro-masonary-filters, ul.xpro-masonary-filters li',
								'property'  => 'color',
								'important' => true,
							),
						),
					),
				),
			),
		),
	),
);
