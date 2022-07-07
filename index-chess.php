<?php
/**
 * The template for homepage posts with "Chess" style
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */

lingvico_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	lingvico_blog_archive_start();

	$lingvico_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$lingvico_sticky_out = lingvico_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $lingvico_stickies ) && count( $lingvico_stickies ) > 0 && get_query_var( 'paged' ) < 1;
	if ( $lingvico_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $lingvico_sticky_out ) {
		?>
		<div class="chess_wrap posts_container">
		<?php
	}
	
	while ( have_posts() ) {
		the_post();
		if ( $lingvico_sticky_out && ! is_sticky() ) {
			$lingvico_sticky_out = false;
			?>
			</div><div class="chess_wrap posts_container">
			<?php
		}
		$lingvico_part = $lingvico_sticky_out && is_sticky() ? 'sticky' : 'chess';
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
