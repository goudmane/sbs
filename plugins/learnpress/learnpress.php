<?php
/* Mail Chimp support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('lingvico_learnpress_theme_setup9')) {
	add_action( 'after_setup_theme', 'lingvico_learnpress_theme_setup9', 9 );
	function lingvico_learnpress_theme_setup9() {
		if (lingvico_exists_learnpress()) {

		}
		if (is_admin()) {
			add_filter( 'lingvico_filter_tgmpa_required_plugins',		'lingvico_learnpress_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lingvico_learnpress_tgmpa_required_plugins' ) ) {
	
	function lingvico_learnpress_tgmpa_required_plugins($list=array()) {
		if (lingvico_storage_isset('required_plugins', 'learnpress')) {
			$list[] = array(
				'name' 		=> lingvico_storage_get_array('required_plugins', 'learnpress'),
				'slug' 		=> 'learnpress',
				'required' 	=> false
			);
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'lingvico_exists_learnpress' ) ) {
	function lingvico_exists_learnpress() {
		return defined('LP_PLUGIN_FILE');
	}
}


?>