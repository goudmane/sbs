<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.10
 */

// Logo
if ( lingvico_is_on( lingvico_get_theme_option( 'logo_in_footer' ) ) ) {
	$lingvico_logo_image = lingvico_get_logo_image( 'footer' );
	$lingvico_logo_text  = get_bloginfo( 'name' );
	if ( ! empty( $lingvico_logo_image ) || ! empty( $lingvico_logo_text ) ) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if ( ! empty( $lingvico_logo_image ) ) {
					$lingvico_attr = lingvico_getimagesize( $lingvico_logo_image );
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">'
							. '<img src="' . esc_url( $lingvico_logo_image ) . '"'
								. ' class="logo_footer_image"'
								. ' alt="' . esc_attr__( 'Site logo', 'lingvico' ) . '"'
								. ( ! empty( $lingvico_attr[3] ) ? ' ' . wp_kses_data( $lingvico_attr[3] ) : '' )
							. '>'
						. '</a>';
				} elseif ( ! empty( $lingvico_logo_text ) ) {
					echo '<h1 class="logo_footer_text">'
							. '<a href="' . esc_url( home_url( '/' ) ) . '">'
								. esc_html( $lingvico_logo_text )
							. '</a>'
						. '</h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
