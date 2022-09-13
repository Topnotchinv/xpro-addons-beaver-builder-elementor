<?php

/**
 *
 * @class XproBlogPostsModule
 */

if ( ! class_exists( 'XproBlogPostsModule' ) ) {

	class XproBlogPostsModule extends FLBuilderModule {


		/**
		 * Variable for editor
		 *
		 * @var null $_editor
		 */
		protected $_editor = null;
		/**
		 *
		 * @var array $xpro_args
		 */
		protected $xpro_args = array();

		/**
		 *
		 * @method __construct
		 */
		public function __construct() {
			parent::__construct(
				array(
					'name'            => __( 'Advanced Post', 'xpro-bb-addons' ),
					'description'     => __( 'An awesome addition by Xpro team!', 'xpro-bb-addons' ),
					'group'           => XPRO_Plugins_Helper::$branding_modules,
					'category'        => XPRO_Plugins_Helper::$creative_modules,
					'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-blog-posts/',
					'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-blog-posts/',
					'editor_export'   => true,
					'enabled'         => true,
					'partial_refresh' => true,
				)
			);

			$this->add_css( 'font-awesome-5' );
			add_filter( 'wp_footer', array( $this, 'enqueue_scripts' ) );
			add_filter( 'fl_builder_loop_query_args', array( $this, 'xpro_loop_query_args' ), 1 );
		}

		/**
		 * Filter to enqueue scripts
		 */
		public function enqueue_scripts() {
			 $this->add_js( 'jquery-infinitescroll' );
			$this->add_js( 'jquery-mosaicflow' );
			$this->add_js( 'isotope', XPRO_ADDONS_FOR_BB_URL . 'assets/js/global-scripts/jquery-masonary.js', array( 'jquery' ), '', true );
			$this->add_js( 'carousel', XPRO_ADDONS_FOR_BB_URL . 'assets/js/global-scripts/jquery-carousel.js', array( 'jquery' ), '', true );
		}

		/**
		 *
		 *  Get HEX color and return RGBA. Default return RGB color.
		 */
		public static function xpro_hex2rgba( $color, $opacity = false, $is_array = false ) {
			$default = $color;

			// Return default if no color provided.
			if ( empty( $color ) ) {
				return $default;
			}

			// Sanitize $color if "#" is provided.
			if ( '#' === $color[0] ) {
				$color = substr( $color, 1 );
			}

			// Check if color has 6 or 3 characters and get values.
			if ( strlen( $color ) === 6 ) {
				$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( strlen( $color ) === 3 ) {
				$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
				return $default;
			}

			// Convert hexadec to rgb.
			$rgb = array_map( 'hexdec', $hex );

			// Check if opacity is set(rgba or rgb).
			if ( false !== $opacity && '' !== $opacity ) {
				if ( abs( $opacity ) > 1 ) {
					$opacity = $opacity / 100;
				}
				$output = 'rgba(' . implode( ',', $rgb ) . ',' . $opacity . ')';
			} else {
				$output = 'rgb(' . implode( ',', $rgb ) . ')';
			}

			if ( $is_array ) {
				return $rgb;
			} else {
				// Return rgb(a) color string.
				return $output;
			}
		}

		/**
		 * function to get color
		 */
		public static function xpro_colorpicker( $settings, $name = '', $opc = false ) {
			$hex_color = '';
			$opacity   = '';
			$hex_color = $settings->$name;

			if ( '' !== $hex_color && 'r' !== $hex_color[0] && 'R' !== $hex_color[0] ) {

				if ( true === $opc && isset( $settings->{$name . '_opc'} ) ) {
					if ( '' !== $settings->{$name . '_opc'} ) {
						$opacity = $settings->{$name . '_opc'};
						$rgba    = self::xpro_hex2rgba( $hex_color, $opacity / 100 );
						return $rgba;
					}
				}

				if ( '#' !== $hex_color[0] ) {

					return '#' . $hex_color;
				}
			}

			return $hex_color;
		}


		/**
		 * function to render css styles for a selected font.
		 */
		public static function xpro_font_css( $font ) {
			 $css = '';

			if ( array_key_exists( $font['family'], FLBuilderFontFamilies::$system ) ) {
				$css .= 'font-family: ' . $font['family'] . ',' . FLBuilderFontFamilies::$system[ $font['family'] ]['fallback'] . ';';
			} else {
				$css .= 'font-family: ' . $font['family'] . ';';
			}

			if ( 'regular' === $font['weight'] ) {
				$css .= 'font-weight: normal;';
			} else {
				$css .= 'font-weight: ' . $font['weight'] . ';';
			}

			echo esc_attr( $css );
		}


		/**
		 * @return string - hex value for the color
		 */
		public static function xpro_text_color( $default ) {
			$color = '';

			if ( '' === $default ) {

				$color = apply_filters( 'xpro/global/text_color', $default ); //phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores

				if ( '' === $color ) {
					$color = apply_filters( 'xpro_text_color', $default );
				}
			} else {
				$color = $default;
			}

			return $color;
		}


		/**
		 * @return string - hex value for the color
		 */
		public static function xpro_base_color( $default ) {
			$color = '';

			if ( '' === $default || '#' === $default ) {

				$color = apply_filters( 'xpro/global/theme_color', $default ); //phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores

				if ( '' === $color ) {
					$color = apply_filters( 'xpro_theme_theme_color', $default );
				}
			} else {
				$color = $default;
			}

			return $color;
		}


		/**
		 *  Get link rel attribute function
		 */
		public static function get_link_rel( $target, $is_nofollow = 0, $echo = 0 ) {
			$attr = '';
			if ( '_blank' === $target ) {
				$attr .= 'noopener';
			}

			if ( 1 === $is_nofollow || 'yes' === $is_nofollow ) {
				$attr .= ' nofollow';
			}

			if ( '' === $attr ) {
				return;
			}

			$attr = trim( $attr );
			if ( ! $echo ) {
				return 'rel="' . $attr . '"';
			}
			echo 'rel="' . $attr . '"'; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}


		/**
		 * Function that updates the rewrite rules.
		 */
		public function update( $settings ) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules( false );
			return $settings;
		}

		/**
		 * Mutator function to update $xpro_args
		 */
		public function set_xpro_args( $args ) {
			$this->xpro_args = $args;
		}

		/**
		 * Accessor function to get $xpro_args
		 *
		 * @method Accessor function to get $xpro_args
		 * @public
		 */
		public function get_xpro_args() {
			return $this->xpro_args;
		}

		/**
		 * Filter to modify WP Query args
		 *
		 * @method Filter to modify WP Query args
		 * @public
		 */
		public function xpro_loop_query_args( $args ) {
			if ( is_array( $args ) && is_array( $this->xpro_args ) ) {
				$args = array_merge( $args, $this->xpro_args );
			}
			return $args;
		}

		/**
		 * Returns an array of data for post types supported.
		 */
		public static function post_types() {
			$post_types = get_post_types(
				array(
					'public'  => true,
					'show_ui' => true,
				),
				'objects'
			);

			unset( $post_types['attachment'] );
			unset( $post_types['fl-builder-template'] );
			unset( $post_types['fl-theme-layout'] );

			return $post_types;
		}

		/**
		 * Function that gets editor.
		 *
		 * @method _get_editor
		 */
		protected function _get_editor( $url ) {         // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore
			$url_path  = $url;
			$file_path = ABSPATH . 'wp-content' . str_replace( content_url(), '', $url_path );

			if ( file_exists( $file_path ) ) {
				$this->_editor = wp_get_image_editor( $file_path );
			} else {
				$this->_editor = wp_get_image_editor( $url_path );
			}

			return $this->_editor;
		}


		/**
		 * Function that gets the cropped path
		 *
		 * @method _get_cropped_path
		 */
		protected function _get_cropped_path( $i, $url ) {       // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore
			$crop      = 'custom_crop';
			$cache_dir = FLBuilderModel::get_cache_dir();

			if ( empty( $url ) ) {
				$filename = uniqid(); // Return a file that doesn't exist.
			} else {

				if ( stristr( $url, '?' ) ) {
					$parts = explode( '?', $url );
					$url   = $parts[0];
				}

				$pathinfo = pathinfo( $url );
				$dir      = $pathinfo['dirname'];
				$ext      = $pathinfo['extension'];
				$name     = wp_basename( $url, ".$ext" );
				$new_ext  = strtolower( $ext );
				$filename = "{$name}-{$crop}.{$new_ext}";
			}

			return array(
				'filename' => $filename,
				'path'     => $cache_dir['path'] . $filename,
				'url'      => $cache_dir['url'] . $filename,
			);
		}

		/**
		 * Function that deletes the cropped URL.
		 *
		 * @method delete
		 */
		public function deleteUrl( $i, $url ) {
			 $cropped_path = $this->_get_cropped_path( $i, $url );
			if ( file_exists( $cropped_path['path'] ) ) {
				unlink( $cropped_path['path'] );
			}
		}


		/**
		 * Function that crops the Image.
		 *
		 * @method crop
		 * @param int $i gets the id.
		 */
		public function crop( $i, $url, $width, $height ) {
			 // Delete an existing crop if it exists.
			$this->deleteUrl( $i, $url );

			$editor = $this->_get_editor( $url );

			if ( ! $editor || is_wp_error( $editor ) ) {
				return false;
			}

			$cropped_path = $this->_get_cropped_path( $i, $url );
			$new_width    = $width;
			$new_height   = $height;

			// Make sure we have enough memory to crop @ini_set( 'memory_limit', '300M' );.
			ini_set( 'memory_limit', '300M' ); // phpcs:ignore WordPress.PHP.IniSet.memory_limit_Blacklisted

			// Crop the photo.
			$editor->resize( $new_width, $new_height, true );

			// Save the photo.
			$editor->save( $cropped_path['path'] );
			// Return the new url.
			return $cropped_path['url'];
		}

		/**
		 * Add rewrite rules for pagination
		 *
		 * @return void
		 */
		public function xpro_init_rewrite_rules() {
			for ( $x = 2; $x <= 10; $x++ ) {
				add_rewrite_rule( 'paged-' . $x . '/([0-9]*)/?', 'index.php?page_id=' . get_option( 'page_on_front' ) . '&flpaged' . $x . '=$matches[1]', 'top' );
				add_rewrite_rule( 'paged-' . $x . '/?([0-9]{1,})/?$', 'index.php?&flpaged' . $x . '=$matches[1]', 'top' );
				add_rewrite_rule( '(.?.+?)/paged-' . $x . '/?([0-9]{1,})/?$', 'index.php?pagename=$matches[1]&flpaged' . $x . '=$matches[2]', 'top' );
				add_rewrite_rule( '([^/]+)/paged-' . $x . '/?([0-9]{1,})/?$', 'index.php?name=$matches[1]&flpaged' . $x . '=$matches[2]', 'top' );
				add_rewrite_tag( "%flpaged{$x}%", '([^&]+)' );
			}
		}

		/**
		 * Disable canonical redirection on the frontpage when query var 'flpaged' is found.
		 *
		 * @return bool|string
		 */
		public function xpro_override_canonical( $redirect_url, $requested_url ) {
			global $wp_the_query;

			if ( is_array( $wp_the_query->query ) ) {
				foreach ( $wp_the_query->query as $key => $value ) {
					if ( strpos( $key, 'flpaged' ) === 0 && is_page() && get_option( 'page_on_front' ) ) {
						$redirect_url = false;
						break;
					}
				}

				$supported_post_types = self::post_types();
				// Disable canonical on CPT single.
				if (
					isset( $wp_the_query->query_vars['post_type'] )
					&& ! is_array( $wp_the_query->query_vars['post_type'] )
					&& isset( $supported_post_types[ $wp_the_query->query_vars['post_type'] ] )
					&& true === $wp_the_query->is_singular
					&& -1 === $wp_the_query->current_post
					&& true === $wp_the_query->is_paged
				) {
					$redirect_url = false;
				}
			}
			return $redirect_url;
		}

		/**
		 * Function that renders pagination.
		 *
		 * @method render_pagination
		 */
		public function render_pagination( $query ) {
			// Get current page number.
			$permalink_structure = get_option( 'permalink_structure' );
			$base                = untrailingslashit( wp_specialchars_decode( get_pagenum_link() ) );
			$paged               = FLBuilderLoop::get_paged();

			$this->settings->total_posts_switch = ( isset( $this->settings->total_posts_switch ) ? $this->settings->total_posts_switch : 'all' );

			$this->settings->total_posts = ( isset( $this->settings->total_posts ) ? $this->settings->total_posts : $query->found_posts );

			// Get total number of posts from query.
			$total_posts = ( 'all' === $this->settings->total_posts_switch ) ? $query->found_posts : ( ( '' !== $this->settings->total_posts ) ? $this->settings->total_posts : '6' );

			$base   = FLBuilderLoop::build_base_url( $permalink_structure, $base );
			$format = FLBuilderLoop::paged_format( $permalink_structure, $base );

			// Offset value if any.
			$offset = ( ! isset( $this->settings->offset ) || ! is_int( (int) $this->settings->offset ) ) ? 0 : ( ( '' !== $this->settings->offset ) ? $this->settings->offset : 0 );

			$max = $query->found_posts - $offset;

			$max = ( $total_posts <= $max ) ? $total_posts : $max;

			if ( 'all' === $this->settings->total_posts_switch || ( isset( $this->settings->data_source ) && 'main_query' === $this->settings->data_source ) ) {
				$total_pages = $query->max_num_pages;
			} else {
				$posts_per_page = ( isset( $this->settings->posts_per_page ) ) ? ( ( '' !== $this->settings->posts_per_page ) ? $this->settings->posts_per_page : '10' ) : '10';
				$total_pages    = ceil( $max / $posts_per_page );
			}

			// Return pagination html.
			if ( $total_pages > 1 ) {

				$current_page = $paged;
				if ( ! $current_page ) {
					$current_page = 1;
				}
				echo wp_kses_post(
					paginate_links(
						array(
							'base'    => $base . '%_%',
							'format'  => $format,
							'current' => $current_page,
							'total'   => $total_pages,
							'type'    => 'list',
						)
					)
				);
			}
		}

		/**
		 * Function that renders args for pagination.
		 *
		 * @method render_args
		 */
		public function render_args() {
			$show_pagination = ( isset( $this->settings->show_pagination ) ) ? $this->settings->show_pagination : 'yes';

			$args['post_type'] = ( isset( $this->settings->post_type ) ) ? $this->settings->post_type : 'post';
			$args['orderby']   = ( isset( $this->settings->order_by ) ) ? $this->settings->order_by : '';

			$this->settings->total_posts_switch = ( isset( $this->settings->total_posts_switch ) ) ? $this->settings->total_posts_switch : 'custom';

			$this->settings->total_posts = ( isset( $this->settings->total_posts ) ? $this->settings->total_posts : '6' );

			// Order by meta value arg.
			if ( strstr( $args['orderby'], 'meta_value' ) ) {
				if ( isset( $this->settings->order_by_meta_key ) ) {
					$args['meta_key'] = $this->settings->order_by_meta_key;
				}
			}

			if ( 'carousel' !== $this->settings->is_carousel && 'yes' === $show_pagination ) {

				$cat           = 'masonary_filter_' . $args['post_type'];
				$do_pagination = ( isset( $this->settings->$cat ) ) ? ( ( -1 === (int) $this->settings->$cat ) ? true : false ) : true;

				if ( 'masonary' === $this->settings->is_carousel ) {
					if ( true === $do_pagination ) {
						$args['posts_per_page'] = ( isset( $this->settings->posts_per_page ) ) ? ( ( '' !== $this->settings->posts_per_page ) ? $this->settings->posts_per_page : '10' ) : '10';
					} else {
						$args['posts_per_page'] = ( 'all' === $this->settings->total_posts_switch ) ? '-1' : $this->settings->total_posts;
					}
				} else {
					$args['posts_per_page'] = ( isset( $this->settings->posts_per_page ) ) ? ( ( '' !== $this->settings->posts_per_page ) ? $this->settings->posts_per_page : '10' ) : '10';
				}
			} else {
				$args['posts_per_page'] = ( 'all' === $this->settings->total_posts_switch ) ? '-1' : $this->settings->total_posts;
			}
			return $args;
		}


		/**
		 * Function that renders the CTA Button
		 *
		 * @method render_button
		 */
		protected function render_button( $link = '', $link_target = '_blank' ) {
			// Return CTA.
			if ( 'button' === $this->settings->cta_type ) {
				echo '<div class="xpro-blog-post-section xpro-blog-btn-sec">';
				echo '<div class="xpro-blog-btn-cls"><a href="' . esc_url( $link ) . '" target="' . esc_attr( $link_target ) . '" ' . wp_kses_post( self::get_link_rel( $link_target, $nofollow, 0 ) ) . '>' . do_shortcode( $this->settings->btn_text ) . '</a></div>';
				echo '</div>';
			} elseif ( 'link' === $this->settings->cta_type ) {
				$nofollow = ( isset( $this->settings->link_nofollow ) ) ? $this->settings->link_nofollow : '0';
				echo '<span class="xpro-read-more-text xpro-blog-post-section xpro-blog-btn-sec"><a href="' . esc_url( $link ) . '" target="' . esc_attr( $link_target ) . '" ' . wp_kses_post( self::get_link_rel( $link_target, $nofollow, 0 ) ) . '>' . do_shortcode( $this->settings->cta_text ) . ' <span class="xpro-next-right-arrow">&#8594;</span></a></span>';
			}
		}

		/**
		 * Function that renders the Image URL
		 *
		 * @method render_image_url
		 */
		protected function render_image_url( $i, $post_attachment_id ) {
			// Predefined values.
			$id   = -1;
			$id   = get_post_thumbnail_id( $post_attachment_id );
			$alt  = get_post_meta( $id, '_wp_attachment_image_alt', true );
			$size = ( isset( $this->settings->featured_image_size ) ) ? $this->settings->featured_image_size : 'medium';

			$f_img_width  = ( ! empty( $this->settings->featured_image_size_width ) );
			$f_img_height = ( ! empty( $this->settings->featured_image_size_height ) );

			// Get attachment if any.
			if ( -1 !== $id && '' !== $id ) {
				if ( 'custom' !== $size ) {
					$temp  = wp_get_attachment_image_src( $id, $size );
					$image = ( isset( $temp[0] ) ) ? $temp[0] : null;
				} else {
					$temp  = wp_get_attachment_image_src( $id, 'full' );
					$img   = ( isset( $temp[0] ) ) ? $temp[0] : null;
					$image = $this->crop( $i, $img, $f_img_width, $f_img_height );
				}
			} else {
				$return_array = array(
					'image' => '',
					'alt'   => '',
				);
				return $return_array;
			}

			$return_array = array(
				'image' => $image,
				'alt'   => $alt,
			);
			return $return_array;
		}


		/**
		 * Function that renders Mansonry Filters
		 */
		public function render_masonary_filters( $query_posts ) {
			$post_type = ( isset( $this->settings->post_type ) ) ? $this->settings->post_type : 'post';

			// Get taxonomies for given custom/default post type.
			$taxonomies = get_object_taxonomies( $post_type, 'objects' );
			$data       = array();

			$post_ids = array_map(
				function ( $arr ) {
					return $arr->ID;
				},
				$query_posts
			);

			foreach ( $taxonomies as $tax_slug => $tax ) {

				if ( ! $tax->public || ! $tax->show_ui ) {
					continue;
				}
				$data[ $tax_slug ] = $tax;
			}

			$taxonomies = $data;
			$cat        = 'masonary_filter_' . $post_type;
			$tax_value  = '';

			// Parse the categories.
			if ( isset( $this->settings->$cat ) ) {
				if ( -1 != $this->settings->$cat ) { // phpcs:ignore WordPress.PHP.StrictComparisons.LooseComparison

					foreach ( $taxonomies as $tax_slug => $tax ) {

						$tax_value = '';
						if ( $this->settings->$cat === $tax_slug ) {
							// New settings slug.
							if ( isset( $this->settings->{'tax_' . $post_type . '_' . $tax_slug} ) ) {
								$tax_value = $this->settings->{'tax_' . $post_type . '_' . $tax_slug};
							} elseif ( isset( $this->settings->{'tax_' . $tax_slug} ) ) {
								// Legacy settings slug.
								$tax_value = $this->settings->{'tax_' . $tax_slug};
							}
							break;
						}
					}
					$tax_value = ( '' !== $tax_value ) ? explode( ',', $tax_value ) : array();

					$object_taxonomies = get_object_taxonomies( $post_type );

					if ( ! empty( $object_taxonomies ) ) {

						$category_detail = get_terms( $this->settings->$cat, array( 'object_ids' => $post_ids ) );

						if ( count( $category_detail ) > 0 ) {

							echo '<div class="xpro-masonary-filters-wrapper">';

							$all_text = 'xpro_masonary_filter_all_edit_' . $post_type;

							$filter_type = 'xpro_masonary_filter_type_' . $post_type;

							if ( isset( $this->settings->$filter_type ) && 'drop-down' === $this->settings->$filter_type ) {
								echo '<select class="xpro-masonary-filters">';
								echo '<option class="xpro-masonary-filter-' . esc_attr( $this->node ) . ' xpro-masonary-current" data-filter="*" value="all">' . ( isset( $this->settings->$all_text ) ? esc_attr( $this->settings->$all_text ) :
										esc_attr__( 'All', 'xpro-bb-addons' ) )
									. '</option>';

								foreach ( $category_detail as $cat_details ) {
									if ( ! empty( $tax_value ) ) {
										if ( isset( $this->settings->{'masonary_filter_' . $post_type} ) && $tax_slug === $this->settings->{'masonary_filter_' . $post_type} ) {
											if ( isset( $this->settings->{'tax_' . $post_type . '_' . $tax_slug . '_matching'} ) && '0' === $this->settings->{'tax_' . $post_type . '_' . $tax_slug . '_matching'} ) {
												if ( ! in_array( $cat_details->term_id, $tax_value ) ) { // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
													echo '<option class="xpro-masonary-filter-' . esc_attr( $this->node ) . '" data-filter=".xpro-masonary-cat-' . esc_attr( $cat_details->term_id ) . '">' . esc_attr( $cat_details->name ) . '</option>';
												}
											} else {
												if ( in_array( $cat_details->term_id, $tax_value ) ) { // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
													echo '<option class="xpro-masonary-filter-' . esc_attr( $this->node ) . '" data-filter=".xpro-masonary-cat-' . esc_attr( $cat_details->term_id ) . '">' . esc_attr( $cat_details->name ) . '</option>';
												}
											}
										}
									} else {
										echo '<option class="xpro-masonary-filter-' . esc_attr( $this->node ) . '" data-filter=".xpro-masonary-cat-' . esc_attr( $cat_details->term_id ) . '">' . esc_attr( $cat_details->name ) . '</option>';
									}
								}
								echo '</select>';
							} else {
								echo '<ul class="xpro-masonary-filters">';
								echo '<li class="xpro-masonary-filter-' . esc_attr( $this->node ) . ' xpro-masonary-current" data-filter="*">' . ( isset( $this->settings->$all_text ) ? esc_attr( $this->settings->$all_text ) :
										esc_attr__( 'All', 'xpro-bb-addons' ) )
									. '</li>';
								foreach ( $category_detail as $cat_details ) {
									if ( ! empty( $tax_value ) ) {
										if ( isset( $this->settings->{'masonary_filter_' . $post_type} ) && $tax_slug === $this->settings->{'masonary_filter_' . $post_type} ) {
											if ( isset( $this->settings->{'tax_' . $post_type . '_' . $tax_slug . '_matching'} ) && '0' === $this->settings->{'tax_' . $post_type . '_' . $tax_slug . '_matching'} ) {
												if ( ! in_array( $cat_details->term_id, $tax_value ) ) { // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
													echo '<li class="xpro-masonary-filter-' . esc_attr( $this->node ) . '" data-filter=".xpro-masonary-cat-' . esc_attr( $cat_details->term_id ) . '">' . esc_attr( $cat_details->name ) . '</li>';
												}
											} else {
												if ( in_array( $cat_details->term_id, $tax_value ) ) { // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
													echo '<li class="xpro-masonary-filter-' . esc_attr( $this->node ) . '" data-filter=".xpro-masonary-cat-' . esc_attr( $cat_details->term_id ) . '">' . esc_attr( $cat_details->name ) . '</li>';
												}
											}
										}
									} else {
										echo '<li class="xpro-masonary-filter-' . esc_attr( $this->node ) . '" data-filter=".xpro-masonary-cat-' . esc_attr( $cat_details->term_id ) . '">' . esc_attr( $cat_details->name ) . '</li>';
									}
								}
								echo '</ul>';
							}
							echo '</div>';
						}
					}
				}
			}
		}


		/**
		 * Function that renders Featured Image
		 *
		 * @method render_featured_image
		 */
		public function render_featured_image( $pos = 'top', $obj, $i ) {
			$html = '';
			// Match current Image position.
			if ( $pos === $this->settings->blog_image_position ) {

				$show_featured_image = ( isset( $this->settings->show_featured_image ) ) ? $this->settings->show_featured_image : 'yes';

				$link = apply_filters( 'xpro_blog_posts_link', get_permalink( $obj->ID ), $obj->ID, $this->settings );

				if ( 'yes' === $show_featured_image ) {

					// Get image url + alt.
					$img_data = $this->render_image_url( $i, $obj->ID );
					$img_url  = $img_data['image'];

					if ( $img_url == '' ) {
						$img_placeholder_url = XPRO_ADDONS_FOR_BB_URL . 'assets/images/placeholder-sm.jpg';
						$img_url             = $img_placeholder_url;
					}

					if ( '' !== $img_url ) {

						if ( 'carousel' === $this->settings->is_carousel && 'yes' === $this->settings->lazyload ) {
							$img_url = 'data-lazy="' . $img_url . '"';
						} else {
							$img_url = 'src="' . $img_url . '"';
						}

						ob_start();

						$spacing_class = ( substr( $this->settings->layout_sort_order, 0, 3 ) === 'img' && 'top' === $pos ) ? '' : ' xpro-blog-post-section';
						?>

					<div class="xpro-post-thumbnail <?php echo ( 'custom' === $this->settings->featured_image_size ) ? 'xpro-crop-thumbnail' : ''; ?> <?php echo esc_attr( $spacing_class ); ?>">

						<?php do_action( 'xpro_blog_posts_before_image', $obj->ID, $this->settings ); ?>
						<?php $nofollow = ( isset( $this->settings->link_nofollow ) ) ? $this->settings->link_nofollow : '0'; ?>
						<a href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $this->settings->link_target ); ?>" <?php self::get_link_rel( $this->settings->link_target, $nofollow, 1 ); ?> title="<?php the_title_attribute(); ?>">
							<img <?php echo wp_kses_post( $img_url ); ?> alt="<?php echo esc_attr( $img_data['alt'] ); ?>" />
						</a>

						<?php do_action( 'xpro_blog_posts_after_image', $obj->ID, $this->settings ); ?>
						<?php
						if ( 'yes' === $this->settings->show_date_box ) {
							$date_box_format = ( isset( $this->settings->date_box_format ) ) ? $this->settings->date_box_format : 'M j, Y';
							switch ( $date_box_format ) {

								case 'M j Y':
									$month = 'M';
									$day   = 'j';
									$year  = 'Y';
									break;

								case 'F j Y':
									$month = 'F';
									$day   = 'j';
									$year  = 'Y';
									break;

								case 'm d Y':
									$month = 'm';
									$day   = 'd';
									$year  = 'Y';
									break;

								case 'd m Y':
									$month = 'd';
									$day   = 'm';
									$year  = 'Y';
									break;

								case 'Y m d':
									$month = 'Y';
									$day   = 'm';
									$year  = 'd';
									break;

								default:
									$month = 'M';
									$day   = 'j';
									$year  = 'Y';
									break;
							}
							?>
							<div class="xpro-next-date-meta">
							<<?php echo esc_attr( $this->settings->date_tag_selection ); ?> class="xpro-posted-on">
							<time class="xpro-entry-date xpro-published xpro-updated" datetime="
							<?php
							echo wp_kses_post( date_i18n( 'c', strtotime( $obj->post_date ) ) );
							?>
							">
								<span class="xpro-date-month">
								<?php
								echo wp_kses_post( date_i18n( $month, strtotime( $obj->post_date ) ) );
								?>
								</span>
								<span class="xpro-date-day"><?php echo wp_kses_post( date_i18n( $day, strtotime( $obj->post_date ) ) ); ?></span>
								<span class="xpro-date-year"><?php echo wp_kses_post( date_i18n( $year, strtotime( $obj->post_date ) ) ); ?></span>
							</time>
							</<?php echo esc_attr( $this->settings->date_tag_selection ); ?>>
							</div>
							<?php
						}
						?>
						</div>

						<?php
						$html = ob_get_contents();
						ob_end_clean();
					}
				}
			}
			return $html;
		}


		/**
		 * Function that renders the Title section.
		 *
		 * @method render_title_section
		 */
		protected function render_title_section( $obj ) {
			$show_title = ( isset( $this->settings->show_title ) ) ? $this->settings->show_title : 'yes';
			if ( 'yes' === $show_title ) {

				$title_count = ( isset( $this->settings->title_count ) ) ? $this->settings->title_count : '';
				$txt         = $obj->post_title;

				if ( '' !== $title_count ) {
					$title_txt = mb_strimwidth( "$txt", 0, $title_count, ' ...' );
				} else {
					$title_txt = $obj->post_title;
				}

				?>
				<<?php echo esc_attr( $this->settings->title_tag_selection ); ?> class="xpro-post-heading xpro-blog-post-section">
				<?php
				$title = '<a href=' . apply_filters( 'xpro_blog_posts_link', get_permalink( $obj->ID ), $obj->ID ) . ' title="' . the_title_attribute( 'echo=0' ) . '" tabindex="0" class="">' . $title_txt . '</a>';
				echo apply_filters( 'xpro_advanced_post_title_link', $title, $title_txt, get_permalink( $obj->ID ), $obj->ID, $this->settings ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
				</<?php echo esc_attr( $this->settings->title_tag_selection ); ?>>
				<?php
			}
		}


		/**
		 * Function that renders content section
		 *
		 * @method render_content_section
		 */
		protected function render_content_section( $obj ) {

			// Predefined variables.
			$show_excerpt = ( isset( $this->settings->show_excerpt ) ) ? $this->settings->show_excerpt : 'yes';

			$content_type = ( isset( $this->settings->content_type ) ) ? $this->settings->content_type : 'excerpt';

			$excerpt_count = ( isset( $this->settings->excerpt_count ) ) ? $this->settings->excerpt_count : '';

			$strip_html = ( isset( $this->settings->strip_content_html ) ) ? $this->settings->strip_content_html : 'yes';

			$content = '';
			$txt     = '';

			if ( 'yes' === $show_excerpt ) {
				if ( 'excerpt' === $content_type ) {
					$content = get_the_excerpt( $obj->ID );
				} else {
					$txt = $obj->post_content;
					$txt = do_shortcode( $txt );

					if ( 'custom' === $content_type ) {
						if ( '' !== $excerpt_count ) {
							$content = wp_trim_words( $txt, $excerpt_count, ' ...' );
						} else {
							$content = wp_trim_words( $txt, 55, ' ...' );
						}
					} else {
						$content = $txt;
					}
				}
				$content_count = strlen( $content );

				if ( 0 !== $content_count ) {
					if ( 'excerpt' === $content_type && 'no' === $strip_html ) {
						?>
						<div class="xpro-blog-posts-description xpro-blog-post-section xpro-text-editor">
							<?php
							echo apply_filters( 'xpro_blog_posts_excerpt', the_excerpt(), $this->settings ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							?>
						</div>
						<?php
					} elseif ( 'content' === $content_type && 'no' === $strip_html ) {
						?>
						<div class="xpro-blog-posts-description xpro-blog-post-section xpro-text-editor"><?php echo apply_filters( 'xpro_blog_posts_excerpt', the_content(), $this->settings ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
						<?php
					} else {
						?>
						<div class="xpro-blog-posts-description xpro-blog-post-section xpro-text-editor"><?php echo apply_filters( 'xpro_blog_posts_excerpt', $content, $this->settings ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
						<?php
					}
				}
			}
		}


		/**
		 * Functoin that renders author section.
		 *
		 * @method render_author_section
		 */
		protected function render_author_section( $obj ) {
			$show_author = ( isset( $this->settings->show_author ) ) ? $this->settings->show_author : 'yes';
			ob_start();
			if ( 'yes' === $show_author ) {
				?>
				<?php esc_attr_e( 'By', 'xpro-bb-addons' ); ?>
				<span class="xpro-posted-by"> <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( $obj->post_author ) ); ?>">
					<?php

					$author = ( get_the_author_meta( 'display_name', $obj->post_author ) !== '' ) ? get_the_author_meta( 'display_name', $obj->post_author ) : get_the_author_meta( 'user_nicename', $obj->post_author );

					echo esc_attr( $author );
					?>
				</a>
			</span>
				<?php
			}
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}


		/**
		 * Function that renders the date section
		 *
		 * @method render_date_section
		 */
		protected function render_date_section( $obj ) {
			$show_date   = ( isset( $this->settings->show_date ) ) ? $this->settings->show_date : 'yes';
			$date_format = ( isset( $this->settings->date_format ) ) ? $this->settings->date_format : 'M j, Y';

			ob_start();

			if ( 'yes' === $show_date ) {
				?>
				<span class="xpro-meta-date">
				<?php

				echo wp_kses_post( date_i18n( $date_format, strtotime( $obj->post_date ) ) );
				?>
			</span>
				<?php
			}

			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}


		/**
		 * Function that renders Taxonomy section.
		 *
		 * @method render_taxonomy_section
		 */
		protected function render_taxonomy_section( $obj ) {
			$show_categories = ( isset( $this->settings->show_categories ) ) ? $this->settings->show_categories : 'no';
			$show_tags       = ( isset( $this->settings->show_tags ) ) ? $this->settings->show_tags : 'no';
			$category_detail = array();

			ob_start();

			if ( 'yes' === $show_categories ) {
				$post_type         = ( isset( $this->settings->post_type ) ) ? $this->settings->post_type : 'post';
				$object_taxonomies = get_object_taxonomies( $post_type );
				if ( ! empty( $object_taxonomies ) ) {
					$taxonomy        = ( 'product' === $this->settings->post_type && isset( $object_taxonomies[2] ) ) ? $object_taxonomies[2] : $object_taxonomies[0];
					$category_detail = wp_get_post_terms( $obj->ID, $taxonomy );

					if ( count( $category_detail ) > 0 ) {

						$count = count( $category_detail );
						for ( $j = 0; $j < $count; $j++ ) {
							?>
                            <span class="xpro-cat-links"><a href="<?php echo wp_kses_post( get_term_link( $category_detail[ $j ]->term_id ) ); ?>" rel="category tag"><?php echo esc_attr( $category_detail[ $j ]->name ); ?></a></span><?php echo wp_kses_post( ( count( $category_detail ) !== $j + 1 ) ? trim( ',&nbsp;' ) : '' ); // @codingStandardsIgnoreLine.
						}
					}
				}
			}

			if ( 'yes' === $show_tags ) {

				$tag_detail = get_the_tags( $obj->ID );
				if ( ! empty( $tag_detail ) ) {
					echo ( count( $category_detail ) > 0 ) ? ', ' : '';
					$count = count( $tag_detail );
					for ( $k = 0; $k < $count; $k++ ) {
						?>
                        <span class="xpro-tag-links"><a href="<?php echo wp_kses_post( get_tag_link( $tag_detail[ $k ]->term_id ) ); ?>" rel="category tag"><?php echo esc_attr( $tag_detail[ $k ]->name ); ?></a></span><?php echo wp_kses_post( ( count( $tag_detail ) !== $k + 1 ) ? trim( ',&nbsp;' ) : '' ); // @codingStandardsIgnoreLine.
					}
				}
			}

			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}

		/**
		 * Function that renders comment section.
		 *
		 * @method render_comment_section
		 */
		protected function render_comment_section( $obj ) {
			$show_comments = ( isset( $this->settings->show_comments ) ) ? $this->settings->show_comments : 'no';

			ob_start();

			if ( 'yes' === $show_comments ) {

				if ( $obj->comment_count > 0 ) {
					?>
					<span class="xpro-comments-link"><a href="
					<?php
						echo esc_url( get_permalink( $obj->ID ) );
					?>
			#comments"><?php echo esc_attr( $obj->comment_count ); ?> <?php echo ( esc_attr( $obj->comment_count ) > 1 ? __( 'Comments', 'xpro-bb-addons' ) : __( 'Comment', 'xpro-bb-addons' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a></span>
					<?php
				}
			}

			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}


		/**
		 * Function that renders meta section.
		 *
		 * @method render_meta_section
		 */
		protected function render_meta_section( $obj ) {

			$show_author     = ( isset( $this->settings->show_author ) ) ? $this->settings->show_author : 'yes';
			$show_meta       = ( isset( $this->settings->show_meta ) ) ? $this->settings->show_meta : 'yes';
			$show_categories = ( isset( $this->settings->show_categories ) ) ? $this->settings->show_categories : 'no';
			$show_tags       = ( isset( $this->settings->show_tags ) ) ? $this->settings->show_tags : 'no';
			$show_comments   = ( isset( $this->settings->show_comments ) ) ? $this->settings->show_comments : 'no';
			$show_date       = ( isset( $this->settings->show_date ) ) ? $this->settings->show_date : 'yes';

			$output         = '';
			$meta_separator = $this->settings->seprator_meta;

			if ( 'yes' === $show_meta ) {
				if ( 'yes' === $show_author || 'yes' === $show_categories || 'yes' === $show_tags || 'yes' === $show_comments || 'yes' === $show_date ) {
					?>
					<<?php echo esc_attr( $this->settings->meta_tag_selection ); ?> class="xpro-post-meta xpro-blog-post-section">
					<?php
					$meta_order = explode( ',', $this->settings->meta_sort_order );
					$count      = count( $meta_order );
					for ( $i = 0; $i < $count; $i++ ) {
						switch ( $meta_order[ $i ] ) {
							case 'author':
								$output = $this->render_author_section( $obj );
								break;

							case 'date':
								$output = $this->render_date_section( $obj );
								break;

							case 'taxonomy':
								$output = $this->render_taxonomy_section( $obj );
								break;

							case 'comment':
								$output = $this->render_comment_section( $obj );
								break;

							default:
								// Nothing to do here.
								break;
						}
						$output_array[] = $output;
					}
					$meta_html = implode( $meta_separator, array_filter( $output_array ) );
					echo wp_kses_post( $meta_html );
					?>
					</<?php echo esc_attr( $this->settings->meta_tag_selection ); ?>>
					<?php
				}
			}
		}

		/**
		 * Function that renders blog content
		 *
		 * @method render_blog_content
		 */
		public function render_blog_content( $obj, $i ) {

			$link            = apply_filters( 'xpro_blog_posts_link', get_permalink( $obj->ID ), $obj->ID, $this->settings );
			$show_title      = ( isset( $this->settings->show_title ) ) ? $this->settings->show_title : 'yes';
			$show_excerpt    = ( isset( $this->settings->show_excerpt ) ) ? $this->settings->show_excerpt : 'yes';
			$show_author     = ( isset( $this->settings->show_author ) ) ? $this->settings->show_author : 'yes';
			$show_meta       = ( isset( $this->settings->show_meta ) ) ? $this->settings->show_meta : 'yes';
			$show_categories = ( isset( $this->settings->show_categories ) ) ? $this->settings->show_categories : 'no';
			$show_tags       = ( isset( $this->settings->show_tags ) ) ? $this->settings->show_tags : 'no';
			$show_comments   = ( isset( $this->settings->show_comments ) ) ? $this->settings->show_comments : 'no';
			$show_date       = ( isset( $this->settings->show_date ) ) ? $this->settings->show_date : 'yes';

			if ( 'yes' === $show_meta && ( 'yes' === $show_author || 'yes' === $show_categories || 'yes' === $show_tags || 'yes' === $show_comments || 'yes' === $show_date ) ) {
				$meta_flag = true;
			} else {
				$meta_flag = false;
			}
			$img_html = '';
			if ( substr( $this->settings->layout_sort_order, 0, 3 ) !== 'img' && substr( $this->settings->layout_sort_order, -3 ) !== 'img' ) {
				$img_html = $this->render_featured_image( 'top', $obj, $i );
			}

			if ( 'yes' === $show_title || 'yes' === $show_excerpt || 'none' !== $this->settings->cta_type || $meta_flag || '' !== $img_html ) {
				?>
				<div class="xpro-blog-post-content">
					<?php
					$layout_sequence = explode( ',', $this->settings->layout_sort_order );

					foreach ( $layout_sequence as $sq ) {
						switch ( $sq ) {
							case 'img':
								if ( substr( $this->settings->layout_sort_order, 0, 3 ) !== 'img' && substr( $this->settings->layout_sort_order, -3 ) !== 'img' ) {
									echo wp_kses_post( $this->render_featured_image( 'top', $obj, $i ) );
								}
								break;
							case 'title':
								do_action( 'xpro_blog_posts_before_title', $obj->ID, $this->settings );
								$this->render_title_section( $obj );
								do_action( 'xpro_blog_posts_after_title', $obj->ID, $this->settings );
								break;

							case 'content':
								do_action( 'xpro_blog_posts_before_content', $obj->ID, $this->settings );
								$this->render_content_section( $obj );
								do_action( 'xpro_blog_posts_after_content', $obj->ID, $this->settings );
								break;

							case 'meta':
								do_action( 'xpro_blog_posts_before_meta', $obj->ID, $this->settings );
								$this->render_meta_section( $obj );
								do_action( 'xpro_blog_posts_after_meta', $obj->ID, $this->settings );
								break;

							case 'cta':
								$this->render_button( $link, $this->settings->link_target );
								break;

							default:
								// Nothing to do here.
								break;
						}
					}
					?>
				</div>
				<?php
			}
		}


	}



	require_once XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-blog-posts/xpro-blog-posts-fields.php';


}
