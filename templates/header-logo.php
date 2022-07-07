<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */

$lingvico_args = get_query_var( 'lingvico_logo_args' );

// Site logo
$lingvico_logo_type   = isset( $lingvico_args['type'] ) ? $lingvico_args['type'] : '';
$lingvico_logo_image  = lingvico_get_logo_image( $lingvico_logo_type );
$lingvico_logo_text   = lingvico_is_on( lingvico_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$lingvico_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $lingvico_logo_image ) || ! empty( $lingvico_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $lingvico_logo_image ) ) {
			if ( empty( $lingvico_logo_type ) && function_exists( 'the_custom_logo' ) && is_numeric( $lingvico_logo_image['logo'] ) && (int) $lingvico_logo_image['logo'] > 0 ) {
				the_custom_logo();
			} else {
				$lingvico_attr = lingvico_getimagesize( $lingvico_logo_image );
				echo '<img src="' . esc_url( $lingvico_logo_image ) . '" alt="' . esc_attr( $lingvico_logo_text ) . '"' . ( ! empty( $lingvico_attr[3] ) ? ' ' . wp_kses_data( $lingvico_attr[3] ) : '' ) . '>';
			}
		} else {
			lingvico_show_layout( lingvico_prepare_macros( $lingvico_logo_text ), '<span class="logo_text">', '</span>' );
			lingvico_show_layout( lingvico_prepare_macros( $lingvico_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}
