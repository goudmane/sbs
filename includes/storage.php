<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

// Get theme variable
if ( ! function_exists( 'lingvico_storage_get' ) ) {
	function lingvico_storage_get( $var_name, $default = '' ) {
		global $LINGVICO_STORAGE;
		return isset( $LINGVICO_STORAGE[ $var_name ] ) ? $LINGVICO_STORAGE[ $var_name ] : $default;
	}
}

// Set theme variable
if ( ! function_exists( 'lingvico_storage_set' ) ) {
	function lingvico_storage_set( $var_name, $value ) {
		global $LINGVICO_STORAGE;
		$LINGVICO_STORAGE[ $var_name ] = $value;
	}
}

// Check if theme variable is empty
if ( ! function_exists( 'lingvico_storage_empty' ) ) {
	function lingvico_storage_empty( $var_name, $key = '', $key2 = '' ) {
		global $LINGVICO_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return empty( $LINGVICO_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return empty( $LINGVICO_STORAGE[ $var_name ][ $key ] );
		} else {
			return empty( $LINGVICO_STORAGE[ $var_name ] );
		}
	}
}

// Check if theme variable is set
if ( ! function_exists( 'lingvico_storage_isset' ) ) {
	function lingvico_storage_isset( $var_name, $key = '', $key2 = '' ) {
		global $LINGVICO_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return isset( $LINGVICO_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return isset( $LINGVICO_STORAGE[ $var_name ][ $key ] );
		} else {
			return isset( $LINGVICO_STORAGE[ $var_name ] );
		}
	}
}

// Inc/Dec theme variable with specified value
if ( ! function_exists( 'lingvico_storage_inc' ) ) {
	function lingvico_storage_inc( $var_name, $value = 1 ) {
		global $LINGVICO_STORAGE;
		if ( empty( $LINGVICO_STORAGE[ $var_name ] ) ) {
			$LINGVICO_STORAGE[ $var_name ] = 0;
		}
		$LINGVICO_STORAGE[ $var_name ] += $value;
	}
}

// Concatenate theme variable with specified value
if ( ! function_exists( 'lingvico_storage_concat' ) ) {
	function lingvico_storage_concat( $var_name, $value ) {
		global $LINGVICO_STORAGE;
		if ( empty( $LINGVICO_STORAGE[ $var_name ] ) ) {
			$LINGVICO_STORAGE[ $var_name ] = '';
		}
		$LINGVICO_STORAGE[ $var_name ] .= $value;
	}
}

// Get array (one or two dim) element
if ( ! function_exists( 'lingvico_storage_get_array' ) ) {
	function lingvico_storage_get_array( $var_name, $key, $key2 = '', $default = '' ) {
		global $LINGVICO_STORAGE;
		if ( empty( $key2 ) ) {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $LINGVICO_STORAGE[ $var_name ][ $key ] ) ? $LINGVICO_STORAGE[ $var_name ][ $key ] : $default;
		} else {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $LINGVICO_STORAGE[ $var_name ][ $key ][ $key2 ] ) ? $LINGVICO_STORAGE[ $var_name ][ $key ][ $key2 ] : $default;
		}
	}
}

// Set array element
if ( ! function_exists( 'lingvico_storage_set_array' ) ) {
	function lingvico_storage_set_array( $var_name, $key, $value ) {
		global $LINGVICO_STORAGE;
		if ( ! isset( $LINGVICO_STORAGE[ $var_name ] ) ) {
			$LINGVICO_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$LINGVICO_STORAGE[ $var_name ][] = $value;
		} else {
			$LINGVICO_STORAGE[ $var_name ][ $key ] = $value;
		}
	}
}

// Set two-dim array element
if ( ! function_exists( 'lingvico_storage_set_array2' ) ) {
	function lingvico_storage_set_array2( $var_name, $key, $key2, $value ) {
		global $LINGVICO_STORAGE;
		if ( ! isset( $LINGVICO_STORAGE[ $var_name ] ) ) {
			$LINGVICO_STORAGE[ $var_name ] = array();
		}
		if ( ! isset( $LINGVICO_STORAGE[ $var_name ][ $key ] ) ) {
			$LINGVICO_STORAGE[ $var_name ][ $key ] = array();
		}
		if ( '' === $key2 ) {
			$LINGVICO_STORAGE[ $var_name ][ $key ][] = $value;
		} else {
			$LINGVICO_STORAGE[ $var_name ][ $key ][ $key2 ] = $value;
		}
	}
}

// Merge array elements
if ( ! function_exists( 'lingvico_storage_merge_array' ) ) {
	function lingvico_storage_merge_array( $var_name, $key, $value ) {
		global $LINGVICO_STORAGE;
		if ( ! isset( $LINGVICO_STORAGE[ $var_name ] ) ) {
			$LINGVICO_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$LINGVICO_STORAGE[ $var_name ] = array_merge( $LINGVICO_STORAGE[ $var_name ], $value );
		} else {
			$LINGVICO_STORAGE[ $var_name ][ $key ] = array_merge( $LINGVICO_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Add array element after the key
if ( ! function_exists( 'lingvico_storage_set_array_after' ) ) {
	function lingvico_storage_set_array_after( $var_name, $after, $key, $value = '' ) {
		global $LINGVICO_STORAGE;
		if ( ! isset( $LINGVICO_STORAGE[ $var_name ] ) ) {
			$LINGVICO_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			lingvico_array_insert_after( $LINGVICO_STORAGE[ $var_name ], $after, $key );
		} else {
			lingvico_array_insert_after( $LINGVICO_STORAGE[ $var_name ], $after, array( $key => $value ) );
		}
	}
}

// Add array element before the key
if ( ! function_exists( 'lingvico_storage_set_array_before' ) ) {
	function lingvico_storage_set_array_before( $var_name, $before, $key, $value = '' ) {
		global $LINGVICO_STORAGE;
		if ( ! isset( $LINGVICO_STORAGE[ $var_name ] ) ) {
			$LINGVICO_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			lingvico_array_insert_before( $LINGVICO_STORAGE[ $var_name ], $before, $key );
		} else {
			lingvico_array_insert_before( $LINGVICO_STORAGE[ $var_name ], $before, array( $key => $value ) );
		}
	}
}

// Push element into array
if ( ! function_exists( 'lingvico_storage_push_array' ) ) {
	function lingvico_storage_push_array( $var_name, $key, $value ) {
		global $LINGVICO_STORAGE;
		if ( ! isset( $LINGVICO_STORAGE[ $var_name ] ) ) {
			$LINGVICO_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			array_push( $LINGVICO_STORAGE[ $var_name ], $value );
		} else {
			if ( ! isset( $LINGVICO_STORAGE[ $var_name ][ $key ] ) ) {
				$LINGVICO_STORAGE[ $var_name ][ $key ] = array();
			}
			array_push( $LINGVICO_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Pop element from array
if ( ! function_exists( 'lingvico_storage_pop_array' ) ) {
	function lingvico_storage_pop_array( $var_name, $key = '', $defa = '' ) {
		global $LINGVICO_STORAGE;
		$rez = $defa;
		if ( '' === $key ) {
			if ( isset( $LINGVICO_STORAGE[ $var_name ] ) && is_array( $LINGVICO_STORAGE[ $var_name ] ) && count( $LINGVICO_STORAGE[ $var_name ] ) > 0 ) {
				$rez = array_pop( $LINGVICO_STORAGE[ $var_name ] );
			}
		} else {
			if ( isset( $LINGVICO_STORAGE[ $var_name ][ $key ] ) && is_array( $LINGVICO_STORAGE[ $var_name ][ $key ] ) && count( $LINGVICO_STORAGE[ $var_name ][ $key ] ) > 0 ) {
				$rez = array_pop( $LINGVICO_STORAGE[ $var_name ][ $key ] );
			}
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if ( ! function_exists( 'lingvico_storage_inc_array' ) ) {
	function lingvico_storage_inc_array( $var_name, $key, $value = 1 ) {
		global $LINGVICO_STORAGE;
		if ( ! isset( $LINGVICO_STORAGE[ $var_name ] ) ) {
			$LINGVICO_STORAGE[ $var_name ] = array();
		}
		if ( empty( $LINGVICO_STORAGE[ $var_name ][ $key ] ) ) {
			$LINGVICO_STORAGE[ $var_name ][ $key ] = 0;
		}
		$LINGVICO_STORAGE[ $var_name ][ $key ] += $value;
	}
}

// Concatenate array element with specified value
if ( ! function_exists( 'lingvico_storage_concat_array' ) ) {
	function lingvico_storage_concat_array( $var_name, $key, $value ) {
		global $LINGVICO_STORAGE;
		if ( ! isset( $LINGVICO_STORAGE[ $var_name ] ) ) {
			$LINGVICO_STORAGE[ $var_name ] = array();
		}
		if ( empty( $LINGVICO_STORAGE[ $var_name ][ $key ] ) ) {
			$LINGVICO_STORAGE[ $var_name ][ $key ] = '';
		}
		$LINGVICO_STORAGE[ $var_name ][ $key ] .= $value;
	}
}

// Call object's method
if ( ! function_exists( 'lingvico_storage_call_obj_method' ) ) {
	function lingvico_storage_call_obj_method( $var_name, $method, $param = null ) {
		global $LINGVICO_STORAGE;
		if ( null === $param ) {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $LINGVICO_STORAGE[ $var_name ] ) ? $LINGVICO_STORAGE[ $var_name ]->$method() : '';
		} else {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $LINGVICO_STORAGE[ $var_name ] ) ? $LINGVICO_STORAGE[ $var_name ]->$method( $param ) : '';
		}
	}
}

// Get object's property
if ( ! function_exists( 'lingvico_storage_get_obj_property' ) ) {
	function lingvico_storage_get_obj_property( $var_name, $prop, $default = '' ) {
		global $LINGVICO_STORAGE;
		return ! empty( $var_name ) && ! empty( $prop ) && isset( $LINGVICO_STORAGE[ $var_name ]->$prop ) ? $LINGVICO_STORAGE[ $var_name ]->$prop : $default;
	}
}
