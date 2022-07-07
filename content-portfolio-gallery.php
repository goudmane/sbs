<?php
/**
 * The Gallery template to display posts
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
$lingvico_image       = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

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
		. ' post_layout_gallery'
		. ' post_layout_gallery_' . esc_attr( $lingvico_columns )
	);
	echo ( ! lingvico_is_off( $lingvico_animation ) && empty( $lingvico_template_args['slider'] ) ? ' data-animation="' . esc_attr( lingvico_get_animation_classes( $lingvico_animation ) ) . '"' : '' );
	?>
	data-size="
		<?php
		if ( ! empty( $lingvico_image[1] ) && ! empty( $lingvico_image[2] ) ) {
			echo intval( $lingvico_image[1] ) . 'x' . intval( $lingvico_image[2] );}
		?>
	"
	data-src="
		<?php
		if ( ! empty( $lingvico_image[0] ) ) {
			echo esc_url( $lingvico_image[0] );}
		?>
	"
>
<?php

	// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	// Featured image
	$lingvico_image_hover = 'icon';  
if ( in_array( $lingvico_image_hover, array( 'icons', 'zoom' ) ) ) {
	$lingvico_image_hover = 'dots';
}
$lingvico_components = lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'meta_parts' ) );
$lingvico_counters   = lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'counters' ) );
lingvico_show_post_featured(
	array(
		'hover'         => $lingvico_image_hover,
		'singular'      => false,
		'no_links'      => ! empty( $lingvico_template_args['no_links'] ),
		'thumb_size'    => lingvico_get_thumb_size( strpos( lingvico_get_theme_option( 'body_style' ), 'full' ) !== false || $lingvico_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only'    => true,
		'show_no_image' => true,
		'post_info'     => '<div class="post_details">'
						. '<h2 class="post_title">'
							. ( empty( $lingvico_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>'
								: esc_html( get_the_title() )
								)
						. '</h2>'
						. '<div class="post_description">'
							. ( ! empty( $lingvico_components )
								? lingvico_show_post_meta(
									apply_filters(
										'lingvico_filter_post_meta_args', array(
											'components' => $lingvico_components,
											'counters' => $lingvico_counters,
											'seo'      => false,
											'echo'     => false,
										), $lingvico_blog_style[0], $lingvico_columns
									)
								)
								: ''
								)
							. ( empty( $lingvico_template_args['hide_excerpt'] )
								? '<div class="post_description_content">' . get_the_excerpt() . '</div>'
								: ''
								)
							. ( empty( $lingvico_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__( 'Learn more', 'lingvico' ) . '</span></a>'
								: ''
								)
						. '</div>'
					. '</div>',
	)
);
?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
