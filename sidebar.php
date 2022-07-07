<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */

if ( lingvico_sidebar_present() ) {
	ob_start();
	$lingvico_sidebar_name = lingvico_get_theme_option( 'sidebar_widgets' . ( is_single() ? '_single' : '' ) );
	lingvico_storage_set( 'current_sidebar', 'sidebar' );
	if ( is_active_sidebar( $lingvico_sidebar_name ) ) {
		dynamic_sidebar( $lingvico_sidebar_name );
	}
	$lingvico_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $lingvico_out ) ) {
		$lingvico_sidebar_position = lingvico_get_theme_option( 'sidebar_position' . ( is_single() ? '_single' : '' ) );
		$lingvico_sidebar_mobile   = lingvico_get_theme_option( 'sidebar_position_mobile' . ( is_single() ? '_single' : '' ) );
		?>
		<div class="sidebar widget_area
			<?php
			echo ' ' . esc_attr( $lingvico_sidebar_position );
			echo ' sidebar_' . esc_attr( $lingvico_sidebar_mobile );

			if ( 'above' == $lingvico_sidebar_mobile ) {
			} else if ( 'float' == $lingvico_sidebar_mobile ) {
				echo ' sidebar_float';
			}
			if ( ! lingvico_is_inherit( lingvico_get_theme_option( 'sidebar_scheme' ) ) ) {
				echo ' scheme_' . esc_attr( lingvico_get_theme_option( 'sidebar_scheme' ) );
			}
			?>
		" role="complementary">
			<?php
			// Single posts banner before sidebar
			lingvico_show_post_banner( 'sidebar' );
			// Button to show/hide sidebar on mobile
			if ( in_array( $lingvico_sidebar_mobile, array( 'above', 'float' ) ) ) {
				$lingvico_title = apply_filters( 'lingvico_filter_sidebar_control_title', 'float' == $lingvico_sidebar_mobile ? esc_html__( 'Show Sidebar', 'lingvico' ) : '' );
				$lingvico_text  = apply_filters( 'lingvico_filter_sidebar_control_text', 'above' == $lingvico_sidebar_mobile ? esc_html__( 'Show Sidebar', 'lingvico' ) : '' );
				?>
				<a href="#" class="sidebar_control" title="<?php echo esc_attr( $lingvico_title ); ?>"><?php echo esc_html( $lingvico_text ); ?></a>
				<?php
			}
			?>
			<div class="sidebar_inner">
				<?php
				do_action( 'lingvico_action_before_sidebar' );
				lingvico_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $lingvico_out ) );
				do_action( 'lingvico_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<div class="clearfix"></div>
		<?php
	}
}
