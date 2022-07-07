<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.10
 */

// Footer sidebar
$lingvico_footer_name    = lingvico_get_theme_option( 'footer_widgets' );
$lingvico_footer_present = ! lingvico_is_off( $lingvico_footer_name ) && is_active_sidebar( $lingvico_footer_name );
if ( $lingvico_footer_present ) {
	lingvico_storage_set( 'current_sidebar', 'footer' );
	$lingvico_footer_wide = lingvico_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $lingvico_footer_name ) ) {
		dynamic_sidebar( $lingvico_footer_name );
	}
	$lingvico_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $lingvico_out ) ) {
		$lingvico_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $lingvico_out );
		$lingvico_need_columns = true;   //or check: strpos($lingvico_out, 'columns_wrap')===false;
		if ( $lingvico_need_columns ) {
			$lingvico_columns = max( 0, (int) lingvico_get_theme_option( 'footer_columns' ) );
			if ( 0 == $lingvico_columns ) {
				$lingvico_columns = min( 4, max( 1, substr_count( $lingvico_out, '<aside ' ) ) );
			}
			if ( $lingvico_columns > 1 ) {
				$lingvico_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $lingvico_columns ) . ' widget', $lingvico_out );
			} else {
				$lingvico_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $lingvico_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $lingvico_footer_wide ) {
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
				lingvico_show_layout( $lingvico_out );
				do_action( 'lingvico_action_after_sidebar' );
				if ( $lingvico_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $lingvico_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
