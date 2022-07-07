<?php
/**
 * The Portfolio template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */

$lingvico_template_args = get_query_var( 'lingvico_template_args' );
if ( is_array( $lingvico_template_args ) ) {
	$lingvico_columns    = empty( $lingvico_template_args['columns'] ) ? 2 : max( 1, $lingvico_template_args['columns'] );
	$lingvico_blog_style = array( $lingvico_template_args['type'], $lingvico_columns );
} else {
	$lingvico_blog_style = explode( '_', lingvico_get_theme_option( 'blog_style' ) );
	$lingvico_columns    = empty( $lingvico_blog_style[1] ) ? 2 : max( 1, $lingvico_blog_style[1] );
}
$lingvico_post_format = get_post_format();
$lingvico_post_format = empty( $lingvico_post_format ) ? 'standard' : str_replace( 'post-format-', '', $lingvico_post_format );
$lingvico_animation   = lingvico_get_theme_option( 'blog_animation' );

?><div class="
<?php
if ( ! empty( $lingvico_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo 'masonry_item masonry_item-1_' . esc_attr( $lingvico_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class(
		'post_item post_format_' . esc_attr( $lingvico_post_format )
		. ' post_layout_portfolio'
		. ' post_layout_portfolio_' . esc_attr( $lingvico_columns )
		. ( is_sticky() && ! is_paged() ? ' sticky' : '' )
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

	$lingvico_image_hover = ! empty( $lingvico_template_args['hover'] ) && ! lingvico_is_inherit( $lingvico_template_args['hover'] )
								? $lingvico_template_args['hover']
								: lingvico_get_theme_option( 'image_hover' );
	// Featured image
	lingvico_show_post_featured(
		array(
			'singular'      => false,
			'hover'         => $lingvico_image_hover,
			'no_links'      => ! empty( $lingvico_template_args['no_links'] ),
			'thumb_size'    => lingvico_get_thumb_size(
				strpos( lingvico_get_theme_option( 'body_style' ), 'full' ) !== false || $lingvico_columns < 3
								? 'masonry-big'
				: 'masonry'
			),
			'show_no_image' => true,
			'class'         => 'dots' == $lingvico_image_hover ? 'hover_with_info' : '',
			'post_info'     => 'dots' == $lingvico_image_hover ? '<div class="post_info">' . esc_html( get_the_title() ) . '</div>' : '',
		)
	);
	?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!