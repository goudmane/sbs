<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'lingvico_cf7_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'lingvico_cf7_theme_setup9', 9 );
	function lingvico_cf7_theme_setup9() {

		add_filter( 'lingvico_filter_merge_scripts', 'lingvico_cf7_merge_scripts' );
		add_filter( 'lingvico_filter_merge_styles', 'lingvico_cf7_merge_styles' );

		if ( lingvico_exists_cf7() ) {
			add_action( 'wp_enqueue_scripts', 'lingvico_cf7_frontend_scripts', 1100 );
		}

		if ( is_admin() ) {
			add_filter( 'lingvico_filter_tgmpa_required_plugins', 'lingvico_cf7_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'lingvico_cf7_tgmpa_required_plugins' ) ) {
	
	function lingvico_cf7_tgmpa_required_plugins( $list = array() ) {
		if ( lingvico_storage_isset( 'required_plugins', 'contact-form-7' ) ) {
			// CF7 plugin
			$list[] = array(
				'name'     => lingvico_storage_get_array( 'required_plugins', 'contact-form-7' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			);
		}
		return $list;
	}
}



// Check if cf7 installed and activated
if ( ! function_exists( 'lingvico_exists_cf7' ) ) {
	function lingvico_exists_cf7() {
		return class_exists( 'WPCF7' );
	}
}

// Enqueue custom scripts
if ( ! function_exists( 'lingvico_cf7_frontend_scripts' ) ) {
	
	function lingvico_cf7_frontend_scripts() {
		if ( lingvico_exists_cf7() ) {
			if ( lingvico_is_on( lingvico_get_theme_option( 'debug_mode' ) ) ) {
				$lingvico_url = lingvico_get_file_url( 'plugins/contact-form-7/contact-form-7.js' );
				if ( '' != $lingvico_url ) {
					wp_enqueue_script( 'lingvico-cf7', $lingvico_url, array( 'jquery' ), null, true );
				}
			}
		}
	}
}

// Merge custom scripts
if ( ! function_exists( 'lingvico_cf7_merge_scripts' ) ) {
	
	function lingvico_cf7_merge_scripts( $list ) {
		if ( lingvico_exists_cf7() ) {
			$list[] = 'plugins/contact-form-7/contact-form-7.js';
		}
		return $list;
	}
}

// Merge custom styles
if ( ! function_exists( 'lingvico_cf7_merge_styles' ) ) {
	
	function lingvico_cf7_merge_styles( $list ) {
		if ( lingvico_exists_cf7() ) {
			$list[] = 'plugins/contact-form-7/_contact-form-7.scss';
		}
		return $list;
	}
}

