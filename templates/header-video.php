<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.14
 */
$lingvico_header_video = lingvico_get_header_video();
$lingvico_embed_video  = '';
if ( ! empty( $lingvico_header_video ) && ! lingvico_is_from_uploads( $lingvico_header_video ) ) {
	if ( lingvico_is_youtube_url( $lingvico_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $lingvico_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		?>
		<div id="background_video"><?php lingvico_show_layout( lingvico_get_embed_video( $lingvico_header_video ) ); ?></div>
		<?php
	}
}
