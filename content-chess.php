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
	$lingvico_columns    = empty( $lingvico_template_args['columns'] ) ? 1 : max( 1, min( 3, $lingvico_template_args['columns'] ) );
	$lingvico_blog_style = array( $lingvico_template_args['type'], $lingvico_columns );
} else {
	$lingvico_blog_style = explode( '_', lingvico_get_theme_option( 'blog_style' ) );
	$lingvico_columns    = empty( $lingvico_blog_style[1] ) ? 1 : max( 1, min( 3, $lingvico_blog_style[1] ) );
}
$lingvico_expanded    = ! lingvico_sidebar_present() && lingvico_is_on( lingvico_get_theme_option( 'expand_content' ) );
$lingvico_post_format = get_post_format();
$lingvico_post_format = empty( $lingvico_post_format ) ? 'standard' : str_replace( 'post-format-', '', $lingvico_post_format );
$lingvico_animation   = lingvico_get_theme_option( 'blog_animation' );

?><article id="post-<?php the_ID(); ?>" 
									<?php
									post_class(
										'post_item'
										. ' post_layout_chess'
										. ' post_layout_chess_' . esc_attr( $lingvico_columns )
										. ' post_format_' . esc_attr( $lingvico_post_format )
										. ( ! empty( $lingvico_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
									);
									echo ( ! lingvico_is_off( $lingvico_animation ) && empty( $lingvico_template_args['slider'] ) ? ' data-animation="' . esc_attr( lingvico_get_animation_classes( $lingvico_animation ) ) . '"' : '' );
									?>
	>

	<?php
	// Add anchor
	if ( 1 == $lingvico_columns && ! is_array( $lingvico_template_args ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode( '[trx_sc_anchor id="post_' . esc_attr( get_the_ID() ) . '" title="' . esc_attr( get_the_title() ) . '" icon="' . esc_attr( lingvico_get_post_icon() ) . '"]' );
	}

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
			'class'         => 1 == $lingvico_columns && ! is_array( $lingvico_template_args ) ? 'lingvico-full-height' : '',
			'singular'      => false,
			'hover'         => $lingvico_hover,
			'no_links'      => ! empty( $lingvico_template_args['no_links'] ),
			'show_no_image' => true,
			'thumb_ratio'   => '1:1',
			'thumb_bg'      => true,
			'thumb_size'    => lingvico_get_thumb_size(
				strpos( lingvico_get_theme_option( 'body_style' ), 'full' ) !== false
										? ( 1 < $lingvico_columns ? 'huge' : 'original' )
										: ( 2 < $lingvico_columns ? 'big' : 'huge' )
			),
		)
	);

	?>
	<div class="post_inner"><div class="post_inner_content"><div class="post_header entry-header">
		<?php
			do_action( 'lingvico_action_before_post_title' );

			// Post title
		if ( empty( $lingvico_template_args['no_links'] ) ) {
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
		} else {
			the_title( '<h3 class="post_title entry-title">', '</h3>' );
		}

			do_action( 'lingvico_action_before_post_meta' );

			// Post meta
			$lingvico_components = lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'meta_parts' ) );
			$lingvico_counters   = lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'counters' ) );
			$lingvico_post_meta  = empty( $lingvico_components ) || in_array( $lingvico_hover, array( 'border', 'pull', 'slide', 'fade' ) )
										? ''
										: lingvico_show_post_meta(
											apply_filters(
												'lingvico_filter_post_meta_args', array(
													'components' => $lingvico_components,
													'counters' => $lingvico_counters,
													'seo'  => false,
													'echo' => false,
												), $lingvico_blog_style[0], $lingvico_columns
											)
										);
			lingvico_show_layout( $lingvico_post_meta );
			?>
		</div><!-- .entry-header -->

		<div class="post_content entry-content">
		<?php
		if ( empty( $lingvico_template_args['hide_excerpt'] ) && lingvico_get_theme_option( 'excerpt_length' ) > 0 ) {
			?>
				<div class="post_content_inner">
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
			lingvico_show_layout( $lingvico_post_meta );
		}
			// More button
		if ( empty( $lingvico_template_args['no_links'] ) && ! in_array( $lingvico_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			?>
				<p><a class="more-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read more', 'lingvico' ); ?></a></p>
				<?php
		}
		?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
