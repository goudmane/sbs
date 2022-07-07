<?php
/* Strong Testimonials support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('lingvico_testimonials_theme_setup9')) {
	add_action( 'after_setup_theme', 'lingvico_testimonials_theme_setup9', 9 );
	function lingvico_testimonials_theme_setup9() {
		if (lingvico_exists_testimonials()) {

		}
		if (is_admin()) {
			add_filter( 'lingvico_filter_tgmpa_required_plugins',		'lingvico_testimonials_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lingvico_testimonials_tgmpa_required_plugins' ) ) {
	
	function lingvico_testimonials_tgmpa_required_plugins($list=array()) {
		if (lingvico_storage_isset('required_plugins', 'strong-testimonials')) {
			$list[] = array(
				'name' 		=> lingvico_storage_get_array('required_plugins', 'strong-testimonials'),
				'slug' 		=> 'strong-testimonials',
				'required' 	=> false
			);
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'lingvico_exists_testimonials' ) ) {
	function lingvico_exists_testimonials() {
		return function_exists('cp_shortcode_widget_init');
	}
}


?>