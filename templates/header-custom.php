<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.06
 */

$lingvico_header_css   = '';
$lingvico_header_image = get_header_image();
$lingvico_header_video = lingvico_get_header_video();
if ( ! empty( $lingvico_header_image ) && lingvico_trx_addons_featured_image_override( is_singular() || lingvico_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$lingvico_header_image = lingvico_get_current_mode_image( $lingvico_header_image );
}

$lingvico_header_id = lingvico_get_custom_header_id();
$lingvico_header_meta = get_post_meta( $lingvico_header_id, 'trx_addons_options', true );
if ( ! empty( $lingvico_header_meta['margin'] ) ) {
	lingvico_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( lingvico_prepare_css_value( $lingvico_header_meta['margin'] ) ) ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $lingvico_header_id ); ?> top_panel_custom_<?php echo esc_attr( sanitize_title( get_the_title( $lingvico_header_id ) ) ); ?>
				<?php
				echo ! empty( $lingvico_header_image ) || ! empty( $lingvico_header_video )
					? ' with_bg_image'
					: ' without_bg_image';
				if ( '' != $lingvico_header_video ) {
					echo ' with_bg_video';
				}
				if ( '' != $lingvico_header_image ) {
					echo ' ' . esc_attr( lingvico_add_inline_css_class( 'background-image: url(' . esc_url( $lingvico_header_image ) . ');' ) );
				}
				if ( is_single() && has_post_thumbnail() ) {
					echo ' with_featured_image';
				}
				if ( lingvico_is_on( lingvico_get_theme_option( 'header_fullheight' ) ) ) {
					echo ' header_fullheight lingvico-full-height';
				}
				if ( ! lingvico_is_inherit( lingvico_get_theme_option( 'header_scheme' ) ) ) {
					echo ' scheme_' . esc_attr( lingvico_get_theme_option( 'header_scheme' ) );
				}
				?>
">
	<?php

	// Background video
	if ( ! empty( $lingvico_header_video ) ) {
		get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'templates/header-video' ) );
	}

	// Custom header's layout
	do_action( 'lingvico_action_show_layout', $lingvico_header_id );

	// Header widgets area
	get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'templates/header-widgets' ) );

	?>
</header>
