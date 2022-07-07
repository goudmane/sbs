<?php
/**
 * The custom template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.50
 */

$lingvico_template_args = get_query_var( 'lingvico_template_args' );
if ( is_array( $lingvico_template_args ) ) {
	$lingvico_columns    = empty( $lingvico_template_args['columns'] ) ? 2 : max( 1, $lingvico_template_args['columns'] );
	$lingvico_blog_style = array( $lingvico_template_args['type'], $lingvico_columns );
} else {
	$lingvico_blog_style = explode( '_', lingvico_get_theme_option( 'blog_style' ) );
	$lingvico_columns    = empty( $lingvico_blog_style[1] ) ? 2 : max( 1, $lingvico_blog_style[1] );
}
$lingvico_blog_id       = lingvico_get_custom_blog_id( join( '_', $lingvico_blog_style ) );
$lingvico_blog_style[0] = str_replace( 'blog-custom-', '', $lingvico_blog_style[0] );
$lingvico_expanded      = ! lingvico_sidebar_present() && lingvico_is_on( lingvico_get_theme_option( 'expand_content' ) );
$lingvico_animation     = lingvico_get_theme_option( 'blog_animation' );
$lingvico_components    = lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'meta_parts' ) );
$lingvico_counters      = lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'counters' ) );

$lingvico_post_format   = get_post_format();
$lingvico_post_format   = empty( $lingvico_post_format ) ? 'standard' : str_replace( 'post-format-', '', $lingvico_post_format );

$lingvico_blog_meta     = lingvico_get_custom_layout_meta( $lingvico_blog_id );
$lingvico_custom_style  = ! empty( $lingvico_blog_meta['scripts_required'] ) ? $lingvico_blog_meta['scripts_required'] : 'none';

if ( ! empty( $lingvico_template_args['slider'] ) || $lingvico_columns > 1 || ! lingvico_is_off( $lingvico_custom_style ) ) {
	?><div class="
		<?php
		if ( ! empty( $lingvico_template_args['slider'] ) ) {
			echo 'slider-slide swiper-slide';
		} else {
			echo ( lingvico_is_off( $lingvico_custom_style ) ? 'column' : sprintf( '%1$s_item %1$s_item', $lingvico_custom_style ) ) . '-1_' . esc_attr( $lingvico_columns );
		}
		?>
	">
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" 
<?php
	post_class(
			'post_item post_format_' . esc_attr( $lingvico_post_format )
					. ' post_layout_custom post_layout_custom_' . esc_attr( $lingvico_columns )
					. ' post_layout_' . esc_attr( $lingvico_blog_style[0] )
					. ' post_layout_' . esc_attr( $lingvico_blog_style[0] ) . '_' . esc_attr( $lingvico_columns )
					. ( ! lingvico_is_off( $lingvico_custom_style )
						? ' post_layout_' . esc_attr( $lingvico_custom_style )
							. ' post_layout_' . esc_attr( $lingvico_custom_style ) . '_' . esc_attr( $lingvico_columns )
						: ''
						)
		);
	echo ( ! lingvico_is_off( $lingvico_animation ) && empty( $lingvico_template_args['slider'] ) ? ' data-animation="' . esc_attr( lingvico_get_animation_classes( $lingvico_animation ) ) . '"' : '' );
?>
>
	<?php
	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}
	// Custom header's layout
	do_action( 'lingvico_action_show_layout', $lingvico_blog_id );
	?>
</article><?php
if ( ! empty( $lingvico_template_args['slider'] ) || $lingvico_columns > 1 || ! lingvico_is_off( $lingvico_custom_style ) ) {
	?></div><?php
	// Need opening PHP-tag above just after </div>, because <div> is a inline-block element (used as column)!
}
