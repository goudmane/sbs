<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.10
 */

$lingvico_footer_id = lingvico_get_custom_footer_id();
$lingvico_footer_meta = get_post_meta( $lingvico_footer_id, 'trx_addons_options', true );
if ( ! empty( $lingvico_footer_meta['margin'] ) ) {
	lingvico_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( lingvico_prepare_css_value( $lingvico_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $lingvico_footer_id ); ?> footer_custom_<?php echo esc_attr( sanitize_title( get_the_title( $lingvico_footer_id ) ) ); ?>
						<?php
						if ( ! lingvico_is_inherit( lingvico_get_theme_option( 'footer_scheme' ) ) ) {
							echo ' scheme_' . esc_attr( lingvico_get_theme_option( 'footer_scheme' ) );
						}
						?>
						">
	<?php
	// Custom footer's layout
	do_action( 'lingvico_action_show_layout', $lingvico_footer_id );
	?>
</footer><!-- /.footer_wrap -->
