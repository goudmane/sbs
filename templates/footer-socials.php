<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.10
 */


// Socials
if ( lingvico_is_on( lingvico_get_theme_option( 'socials_in_footer' ) ) ) {
	$lingvico_output = lingvico_get_socials_links();
	if ( '' != $lingvico_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php lingvico_show_layout( $lingvico_output ); ?>
			</div>
		</div>
		<?php
	}
}
