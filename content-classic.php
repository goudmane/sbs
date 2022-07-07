<?php
/**
 * The Classic template to display the content
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
$lingvico_expanded   = ! lingvico_sidebar_present() && lingvico_is_on( lingvico_get_theme_option( 'expand_content' ) );
$lingvico_animation  = lingvico_get_theme_option( 'blog_animation' );
$lingvico_components = lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'meta_parts' ) );
$lingvico_counters   = lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'counters' ) );

$lingvico_post_format = get_post_format();
$lingvico_post_format = empty( $lingvico_post_format ) ? 'standard' : str_replace( 'post-format-', '', $lingvico_post_format );

?><div class="
<?php
if ( ! empty( $lingvico_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo ( 'classic' == $lingvico_blog_style[0] ? 'column' : 'masonry_item masonry_item' ) . '-1_' . esc_attr( $lingvico_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
		post_class(
			'post_item post_format_' . esc_attr( $lingvico_post_format )
					. ' post_layout_classic post_layout_classic_' . esc_attr( $lingvico_columns )
					. ' post_layout_' . esc_attr( $lingvico_blog_style[0] )
					. ' post_layout_' . esc_attr( $lingvico_blog_style[0] ) . '_' . esc_attr( $lingvico_columns )
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

	// Featured image
	$lingvico_hover = ! empty( $lingvico_template_args['hover'] ) && ! lingvico_is_inherit( $lingvico_template_args['hover'] )
						? $lingvico_template_args['hover']
						: lingvico_get_theme_option( 'image_hover' );
	lingvico_show_post_featured(
		array(
			'thumb_size' => lingvico_get_thumb_size(
				'classic' == $lingvico_blog_style[0]
						? ( strpos( lingvico_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $lingvico_columns > 2 ? 'big' : 'huge' )
								: ( $lingvico_columns > 2
									? ( $lingvico_expanded ? 'med' : 'small' )
									: ( $lingvico_expanded ? 'big' : 'med' )
									)
							)
						: ( strpos( lingvico_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $lingvico_columns > 2 ? 'masonry-big' : 'full' )
								: ( $lingvico_columns <= 2 && $lingvico_expanded ? 'masonry-big' : 'masonry' )
							)
			),
			'hover'      => $lingvico_hover,
			'no_links'   => ! empty( $lingvico_template_args['no_links'] ),
			'singular'   => false,
		)
	);

	if ( ! in_array( $lingvico_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			do_action( 'lingvico_action_before_post_title' );

			// Post title
			if ( empty( $lingvico_template_args['no_links'] ) ) {
				the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
			} else {
				the_title( '<h4 class="post_title entry-title">', '</h4>' );
			}

			do_action( 'lingvico_action_before_post_meta' );

			// Post meta
			if ( ! empty( $lingvico_components ) && ! in_array( $lingvico_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
				lingvico_show_post_meta(
					apply_filters(
						'lingvico_filter_post_meta_args', array(
							'components' => $lingvico_components,
							'counters'   => $lingvico_counters,
							'seo'        => false,
						), $lingvico_blog_style[0], $lingvico_columns
					)
				);
			}

			do_action( 'lingvico_action_after_post_meta' );
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>

	<div class="post_content entry-content">
	<?php
	if ( empty( $lingvico_template_args['hide_excerpt'] ) && lingvico_get_theme_option( 'excerpt_length' ) > 0 ) {
		?>
			<div class="post_content_inner  <?php echo (is_search() && get_post_format() == "audio" ? " hide" : "") ?>">
			<?php
			if ( has_excerpt() ) {
				the_excerpt();
			} elseif ( strpos( get_the_content( '!--more' ), '!--more' ) !== false ) {
				the_content( '' );
			} elseif ( in_array( $lingvico_post_format, array( 'link', 'aside', 'status' ) ) ) {
				the_content();
			} elseif ( 'quote' == $lingvico_post_format ) {
				$quote = lingvico_get_tag( get_the_content(), '<blockquote>', '</blockquote>' );
				if ( ! empty( $quote ) ) {
					lingvico_show_layout( wpautop( $quote ) );
				} else {
					the_excerpt();
				}
			} elseif ( substr( get_the_content(), 0, 4 ) != '[vc_' ) {
				the_excerpt();
			}
			?>
			</div>
			<?php
	}
		// Post meta
	if ( in_array( $lingvico_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		if ( ! empty( $lingvico_components ) ) {
			lingvico_show_post_meta(
				apply_filters(
					'lingvico_filter_post_meta_args', array(
						'components' => $lingvico_components,
						'counters'   => $lingvico_counters,
					), $lingvico_blog_style[0], $lingvico_columns
				)
			);
		}
	}
		// More button
	if ( false && empty( $lingvico_template_args['no_links'] ) && ! in_array( $lingvico_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
			<p><a class="more-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read more', 'lingvico' ); ?></a></p>
			<?php
	}
	?>
	</div><!-- .entry-content -->

</article></div><?php
// Need opening PHP-tag above, because <div> is a inline-block element (used as column)!
