<?php
/**
 * Override Theme Options on a posts and pages
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.29
 */


// -----------------------------------------------------------------
// -- Override Theme Options
// -----------------------------------------------------------------

if ( ! function_exists( 'lingvico_options_override_init' ) ) {
	add_action( 'after_setup_theme', 'lingvico_options_override_init' );
	function lingvico_options_override_init() {
		if ( is_admin() ) {
			add_action( 'admin_enqueue_scripts', 'lingvico_options_override_add_scripts' );
			add_action( 'save_post', 'lingvico_options_override_save_options' );
			add_filter( 'lingvico_filter_override_options', 'lingvico_options_override_add_options' );
		}
	}
}


// Check if override options is allowed for specified post type
if ( ! function_exists( 'lingvico_options_allow_override' ) ) {
	function lingvico_options_allow_override( $post_type ) {
		return apply_filters( 'lingvico_filter_allow_override_options', in_array( $post_type, array( 'page', 'post' ) ), $post_type );
	}
}

// Load required styles and scripts for admin mode
if ( ! function_exists( 'lingvico_options_override_add_scripts' ) ) {
	
	function lingvico_options_override_add_scripts() {
		// If current screen is 'Edit Page' - load font icons
		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : false;
		if ( is_object( $screen ) && lingvico_options_allow_override( ! empty( $screen->post_type ) ? $screen->post_type : $screen->id ) ) {
			wp_enqueue_style( 'lingvico-icons', lingvico_get_file_url( 'css/font-icons/css/fontello-embedded.css' ), array(), null );
			wp_enqueue_script( 'jquery-ui-tabs', false, array( 'jquery', 'jquery-ui-core' ), null, true );
			wp_enqueue_script( 'jquery-ui-accordion', false, array( 'jquery', 'jquery-ui-core' ), null, true );
			wp_enqueue_script( 'lingvico-options', lingvico_get_file_url( 'theme-options/theme-options.js' ), array( 'jquery' ), null, true );
			wp_localize_script( 'lingvico-options', 'lingvico_dependencies', lingvico_get_theme_dependencies() );
		}
	}
}

// Add overriden options
if ( ! function_exists( 'lingvico_options_override_add_options' ) ) {
	
	function lingvico_options_override_add_options( $list ) {
		global $post_type;
		if ( lingvico_options_allow_override( $post_type ) ) {
			$list[] = array(
				sprintf( 'lingvico_override_options_%s', $post_type ),
				esc_html__( 'Theme Options', 'lingvico' ),
				'lingvico_options_override_show',
				$post_type,
				'post' == $post_type ? 'side' : 'advanced',
				'default',
			);
		}
		return $list;
	}
}

// Callback function to show override options
if ( ! function_exists( 'lingvico_options_override_show' ) ) {
	function lingvico_options_override_show( $post = false, $args = false ) {
		if ( empty( $post ) || ! is_object( $post ) || empty( $post->ID ) ) {
			global $post, $post_type;
			$mb_post_id   = $post->ID;
			$mb_post_type = $post_type;
		} else {
			$mb_post_id   = $post->ID;
			$mb_post_type = $post->post_type;
		}
		if ( lingvico_options_allow_override( $mb_post_type ) ) {
			// Load saved options
			$meta         = get_post_meta( $mb_post_id, 'lingvico_options', true );
			$tabs_titles  = array();
			$tabs_content = array();
			global $LINGVICO_STORAGE;
			// Refresh linked data if this field is controller for the another (linked) field
			// Do this before show fields to refresh data in the $LINGVICO_STORAGE
			foreach ( $LINGVICO_STORAGE['options'] as $k => $v ) {
				if ( ! isset( $v['override'] ) || strpos( $v['override']['mode'], $mb_post_type ) === false ) {
					continue;
				}
				if ( ! empty( $v['linked'] ) ) {
					$v['val'] = isset( $meta[ $k ] ) ? $meta[ $k ] : 'inherit';
					if ( ! empty( $v['val'] ) && ! lingvico_is_inherit( $v['val'] ) ) {
						lingvico_refresh_linked_data( $v['val'], $v['linked'] );
					}
				}
			}
			// Show fields
			foreach ( $LINGVICO_STORAGE['options'] as $k => $v ) {
				if ( ! isset( $v['override'] ) || strpos( $v['override']['mode'], $mb_post_type ) === false || 'hidden' == $v['type'] ) {
					continue;
				}
				if ( empty( $v['override']['section'] ) ) {
					$v['override']['section'] = esc_html__( 'General', 'lingvico' );
				}
				if ( ! isset( $tabs_titles[ $v['override']['section'] ] ) ) {
					$tabs_titles[ $v['override']['section'] ]  = $v['override']['section'];
					$tabs_content[ $v['override']['section'] ] = '';
				}
				$v['val']                                   = isset( $meta[ $k ] ) ? $meta[ $k ] : 'inherit';
				$tabs_content[ $v['override']['section'] ] .= lingvico_options_show_field( $k, $v, $mb_post_type );
			}
			if ( count( $tabs_titles ) > 0 ) {
				?>
				<div class="lingvico_options lingvico_options_override">
					<input type="hidden" name="override_options_nonce" value="<?php echo esc_attr( wp_create_nonce( admin_url() ) ); ?>" />
					<input type="hidden" name="override_options_post_type" value="<?php echo esc_attr( $mb_post_type ); ?>" />
					<div id="lingvico_options_tabs" class="lingvico_tabs">
						<ul>
							<?php
							$cnt = 0;
							foreach ( $tabs_titles as $k => $v ) {
								$cnt++;
								?>
								<li><a href="#lingvico_options_<?php echo esc_attr( $cnt ); ?>"><?php echo esc_html( $v ); ?></a></li>
								<?php
							}
							?>
						</ul>
						<?php
						$cnt = 0;
						foreach ( $tabs_content as $k => $v ) {
							$cnt++;
							?>
							<div id="lingvico_options_<?php echo esc_attr( $cnt ); ?>" class="lingvico_tabs_section lingvico_options_section">
								<?php lingvico_show_layout( $v ); ?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
				<?php
			}
		}
	}
}


// Save overriden options
if ( ! function_exists( 'lingvico_options_override_save_options' ) ) {
	
	function lingvico_options_override_save_options( $post_id ) {
		// verify nonce
		if ( ! wp_verify_nonce( lingvico_get_value_gp( 'override_options_nonce' ), admin_url() ) ) {
			return $post_id;
		}

		// check autosave
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		$post_type = wp_kses_data( wp_unslash( isset( $_POST['override_options_post_type'] ) ? sanitize_text_field($_POST['override_options_post_type']) : sanitize_text_field($_POST['post_type']) ) );

		// check permissions
		$capability = 'page';
		$post_types = get_post_types( array( 'name' => $post_type ), 'objects' );
		if ( ! empty( $post_types ) && is_array( $post_types ) ) {
			foreach ( $post_types  as $type ) {
				$capability = $type->capability_type;
				break;
			}
		}
		if ( ! current_user_can( 'edit_' . ( $capability ), $post_id ) ) {
			return $post_id;
		}

		// Save options
		$meta    = array();
		$options = lingvico_storage_get( 'options' );
		foreach ( $options as $k => $v ) {
			// Skip not overriden options
			if ( ! isset( $v['override'] ) || strpos( $v['override']['mode'], $post_type ) === false ) {
				continue;
			}
			// Skip inherited options
			if ( ! empty( $_POST[ "lingvico_options_inherit_{$k}" ] ) ) {
				continue;
			}
			// Skip hidden options
			if ( ! isset( $_POST[ "lingvico_options_field_{$k}" ] ) && 'hidden' == $v['type'] ) {
				continue;
			}
			// Get option value from POST
			$meta[ $k ] = isset( $_POST[ "lingvico_options_field_{$k}" ] )
							? lingvico_get_value_gp( "lingvico_options_field_{$k}" )
							: ( 'checkbox' == $v['type'] ? 0 : '' );
		}
		$meta = apply_filters( 'lingvico_filter_update_post_options', $meta, $post_id );

		update_post_meta( $post_id, 'lingvico_options', $meta );

		// Save separate meta options to search template pages
		if ( 'page' == $post_type && ! empty( $_POST['page_template'] ) && 'blog.php' == $_POST['page_template'] ) {
			update_post_meta( $post_id, 'lingvico_options_post_type', isset( $meta['post_type'] ) ? $meta['post_type'] : 'post' );
			update_post_meta( $post_id, 'lingvico_options_parent_cat', isset( $meta['parent_cat'] ) ? $meta['parent_cat'] : 0 );
		}
	}
}
