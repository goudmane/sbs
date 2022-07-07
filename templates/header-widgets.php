<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */

// Header sidebar
$lingvico_header_name    = lingvico_get_theme_option( 'header_widgets' );
$lingvico_header_present = ! lingvico_is_off( $lingvico_header_name ) && is_active_sidebar( $lingvico_header_name );
if ( $lingvico_header_present ) {
	lingvico_storage_set( 'current_sidebar', 'header' );
	$lingvico_header_wide = lingvico_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $lingvico_header_name ) ) {
		dynamic_sidebar( $lingvico_header_name );
	}
	$lingvico_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $lingvico_widgets_output ) ) {
		$lingvico_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $lingvico_widgets_output );
		$lingvico_need_columns   = strpos( $lingvico_widgets_output, 'columns_wrap' ) === false;
		if ( $lingvico_need_columns ) {
			$lingvico_columns = max( 0, (int) lingvico_get_theme_option( 'header_columns' ) );
			if ( 0 == $lingvico_columns ) {
				$lingvico_columns = min( 6, max( 1, substr_count( $lingvico_widgets_output, '<aside ' ) ) );
			}
			if ( $lingvico_columns > 1 ) {
				$lingvico_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $lingvico_columns ) . ' widget', $lingvico_widgets_output );
			} else {
				$lingvico_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $lingvico_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $lingvico_header_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $lingvico_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'lingvico_action_before_sidebar' );
				lingvico_show_layout( $lingvico_widgets_output );
				do_action( 'lingvico_action_after_sidebar' );
				if ( $lingvico_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $lingvico_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
