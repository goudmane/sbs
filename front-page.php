<?php
/**
 * The Front Page template file.
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.31
 */

get_header();

// If front-page is a static page
if ( get_option( 'show_on_front' ) == 'page' ) {

	// If Front Page Builder is enabled - display sections
	if ( lingvico_is_on( lingvico_get_theme_option( 'front_page_enabled' ) ) ) {

		if ( have_posts() ) {
			the_post();
		}

		$lingvico_sections = lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'front_page_sections' ), 1, false );
		if ( is_array( $lingvico_sections ) ) {
			foreach ( $lingvico_sections as $lingvico_section ) {
				get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'front-page/section', $lingvico_section ), $lingvico_section );
			}
		}

		// Else if this page is blog archive
	} elseif ( is_page_template( 'blog.php' ) ) {
		get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'blog' ) );

		// Else - display native page content
	} else {
		get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'page' ) );
	}

	// Else get index template to show posts
} else {
	get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'index' ) );
}

get_footer();
