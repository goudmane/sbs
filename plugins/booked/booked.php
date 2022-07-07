<?php
/* Booked Appointments support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'lingvico_booked_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'lingvico_booked_theme_setup9', 9 );
	function lingvico_booked_theme_setup9() {
		add_filter( 'lingvico_filter_merge_styles', 'lingvico_booked_merge_styles' );
		if ( is_admin() ) {
			add_filter( 'lingvico_filter_tgmpa_required_plugins', 'lingvico_booked_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'lingvico_booked_tgmpa_required_plugins' ) ) {
	
	function lingvico_booked_tgmpa_required_plugins( $list = array() ) {
		if ( lingvico_storage_isset( 'required_plugins', 'booked' ) && lingvico_is_theme_activated() ) {
			$path = lingvico_get_plugin_source_path( 'plugins/booked/booked.zip' );
			if ( ! empty( $path ) || lingvico_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => lingvico_storage_get_array( 'required_plugins', 'booked' ),
					'slug'     => 'booked',
					'source'   => ! empty( $path ) ? $path : 'upload://booked.zip',
					'version'  => '2.3.5',
					'required' => false,
				);
			}
		}
		return $list;
	}
}


// Check if plugin installed and activated
if ( ! function_exists( 'lingvico_exists_booked' ) ) {
	function lingvico_exists_booked() {
		return class_exists( 'booked_plugin' );
	}
}

// Merge custom styles
if ( ! function_exists( 'lingvico_booked_merge_styles' ) ) {
	
	function lingvico_booked_merge_styles( $list ) {
		if ( lingvico_exists_booked() ) {
			$list[] = 'plugins/booked/_booked.scss';
		}
		return $list;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( lingvico_exists_booked() ) {
	require_once LINGVICO_THEME_DIR . 'plugins/booked/booked-styles.php'; }

