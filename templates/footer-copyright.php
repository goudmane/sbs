<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
if ( ! lingvico_is_inherit( lingvico_get_theme_option( 'copyright_scheme' ) ) ) {
	echo ' scheme_' . esc_attr( lingvico_get_theme_option( 'copyright_scheme' ) );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$lingvico_copyright = lingvico_get_theme_option( 'copyright' );
			if ( ! empty( $lingvico_copyright ) ) {
				// Replace {{Y}} or {Y} with the current year
				$lingvico_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $lingvico_copyright );
				// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
				$lingvico_copyright = lingvico_prepare_macros( $lingvico_copyright );
				// Display copyright
				echo wp_kses_post( nl2br( $lingvico_copyright ) );
			}
			?>
			</div>
		</div>
	</div>
</div>
