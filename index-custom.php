<?php
/**
 * The template for homepage posts with custom style
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.50
 */

lingvico_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	$lingvico_blog_style = lingvico_get_theme_option( 'blog_style' );
	$lingvico_parts      = explode( '_', $lingvico_blog_style );
	$lingvico_columns    = ! empty( $lingvico_parts[1] ) ? max( 1, min( 6, (int) $lingvico_parts[1] ) ) : 1;
	$lingvico_blog_id    = lingvico_get_custom_blog_id( $lingvico_blog_style );
	$lingvico_blog_meta  = lingvico_get_custom_layout_meta( $lingvico_blog_id );
	if ( ! empty( $lingvico_blog_meta['margin'] ) ) {
		lingvico_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( lingvico_prepare_css_value( $lingvico_blog_meta['margin'] ) ) ) );
	}
	$lingvico_custom_style = ! empty( $lingvico_blog_meta['scripts_required'] ) ? $lingvico_blog_meta['scripts_required'] : 'none';

	lingvico_blog_archive_start();

	$lingvico_classes    = 'posts_container blog_custom_wrap' 
							. ( ! lingvico_is_off( $lingvico_custom_style )
								? sprintf( ' %s_wrap', $lingvico_custom_style )
								: ( $lingvico_columns > 1 
									? ' columns_wrap columns_padding_bottom' 
									: ''
									)
								);
	$lingvico_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$lingvico_sticky_out = lingvico_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $lingvico_stickies ) && count( $lingvico_stickies ) > 0 && get_query_var( 'paged' ) < 1;
	if ( $lingvico_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $lingvico_sticky_out ) {
		if ( lingvico_get_theme_option( 'first_post_large' ) && ! is_paged() && ! in_array( lingvico_get_theme_option( 'body_style' ), array( 'fullwide', 'fullscreen' ) ) ) {
			the_post();
			get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'content', 'excerpt' ), 'excerpt' );
		}
		?>
		<div class="<?php echo esc_attr( $lingvico_classes ); ?>">
		<?php
	}
	while ( have_posts() ) {
		the_post();
		if ( $lingvico_sticky_out && ! is_sticky() ) {
			$lingvico_sticky_out = false;
			?>
			</div><div class="<?php echo esc_attr( $lingvico_classes ); ?>">
			<?php
		}
		$lingvico_part = $lingvico_sticky_out && is_sticky() ? 'sticky' : 'custom';
		get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'content', $lingvico_part ), $lingvico_part );
	}
	?>
	</div>
	<?php

	lingvico_show_pagination();

	lingvico_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
