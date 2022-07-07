<?php
/* Search Field support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('lingvico_searchfilter_theme_setup9')) {
	add_action( 'after_setup_theme', 'lingvico_searchfilter_theme_setup9', 9 );
	function lingvico_searchfilter_theme_setup9() {
		if (lingvico_exists_searchfilter()) {
            add_action( 'wp_enqueue_scripts', 'lingvico_select2', 1100 );
		}
		if (is_admin()) {
			add_filter( 'lingvico_filter_tgmpa_required_plugins',		'lingvico_searchfilter_tgmpa_required_plugins' );
		}
	}
}

function lingvico_select2(){
    $lingvico_url = lingvico_get_file_url( 'js/select2.min.js' );
    if ( '' != $lingvico_url ) {
        wp_enqueue_script( 'select2', $lingvico_url, array( 'jquery' ), null, true );
    }
}

// Filter to add in the required plugins list
if ( !function_exists( 'lingvico_searchfilter_tgmpa_required_plugins' ) ) {
	
	function lingvico_searchfilter_tgmpa_required_plugins($list=array()) {
		if (lingvico_storage_isset('required_plugins', 'search-filter')) {
			$list[] = array(
				'name' 		=> lingvico_storage_get_array('required_plugins', 'search-filter'),
				'slug' 		=> 'search-filter',
				'required' 	=> false
			);
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'lingvico_exists_searchfilter' ) ) {
	function lingvico_exists_searchfilter() {
		return class_exists('SearchAndFilter');
	}
}


?>