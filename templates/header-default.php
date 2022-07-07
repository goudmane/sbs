<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */

$lingvico_header_css   = '';
$lingvico_header_image = get_header_image();
$lingvico_header_video = lingvico_get_header_video();
if ( ! empty( $lingvico_header_image ) && lingvico_trx_addons_featured_image_override( is_singular() || lingvico_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$lingvico_header_image = lingvico_get_current_mode_image( $lingvico_header_image );
}

?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $lingvico_header_image ) || ! empty( $lingvico_header_video ) ? ' with_bg_image' : ' without_bg_image';
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

	// Main menu
	if ( lingvico_get_theme_option( 'menu_style' ) == 'top' ) {
		get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'templates/header-navi' ) );
	}

	// Mobile header
	if ( lingvico_is_on( lingvico_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'templates/header-mobile' ) );
	}

	// Page title and breadcrumbs area
	get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'templates/header-title' ) );

	// Header widgets area
	get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'templates/header-widgets' ) );

	// Display featured image in the header on the single posts
	// Comment next line to prevent show featured image in the header area
	// and display it in the post's content
	get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'templates/header-single' ) );

	?>
</header>
