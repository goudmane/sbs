<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'lingvico_revslider_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'lingvico_revslider_theme_setup9', 9 );
	function lingvico_revslider_theme_setup9() {

		add_filter( 'lingvico_filter_merge_styles', 'lingvico_revslider_merge_styles' );

		if ( is_admin() ) {
			add_filter( 'lingvico_filter_tgmpa_required_plugins', 'lingvico_revslider_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'lingvico_revslider_tgmpa_required_plugins' ) ) {
	
	function lingvico_revslider_tgmpa_required_plugins( $list = array() ) {
		if ( lingvico_storage_isset( 'required_plugins', 'revslider' ) && lingvico_is_theme_activated() ) {
			$path = lingvico_get_plugin_source_path( 'plugins/revslider/revslider.zip' );
			if ( ! empty( $path ) || lingvico_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => lingvico_storage_get_array( 'required_plugins', 'revslider' ),
					'slug'     => 'revslider',
					'source'   => ! empty( $path ) ? $path : 'upload://revslider.zip',
					'version'  => '6.5.25',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if RevSlider installed and activated
if ( ! function_exists( 'lingvico_exists_revslider' ) ) {
	function lingvico_exists_revslider() {
		return function_exists( 'rev_slider_shortcode' );
	}
}

// Merge custom styles
if ( ! function_exists( 'lingvico_revslider_merge_styles' ) ) {
	
	function lingvico_revslider_merge_styles( $list ) {
		if ( lingvico_exists_revslider() ) {
			$list[] = 'plugins/revslider/_revslider.scss';
		}
		return $list;
	}
}

