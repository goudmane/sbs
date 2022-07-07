<?php
/**
 * The template for homepage posts with "Portfolio" style
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

	// Show filters
	$lingvico_cat          = lingvico_get_theme_option( 'parent_cat' );
	$lingvico_post_type    = lingvico_get_theme_option( 'post_type' );
	$lingvico_taxonomy     = lingvico_get_post_type_taxonomy( $lingvico_post_type );
	$lingvico_show_filters = lingvico_get_theme_option( 'show_filters' );
	$lingvico_tabs         = array();
	if ( ! lingvico_is_off( $lingvico_show_filters ) ) {
		$lingvico_args           = array(
			'type'         => $lingvico_post_type,
			'child_of'     => $lingvico_cat,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => 0,
			'taxonomy'     => $lingvico_taxonomy,
			'pad_counts'   => false,
		);
		$lingvico_portfolio_list = get_terms( $lingvico_args );
		if ( is_array( $lingvico_portfolio_list ) && count( $lingvico_portfolio_list ) > 0 ) {
			$lingvico_tabs[ $lingvico_cat ] = esc_html__( 'All', 'lingvico' );
			foreach ( $lingvico_portfolio_list as $lingvico_term ) {
				if ( isset( $lingvico_term->term_id ) ) {
					$lingvico_tabs[ $lingvico_term->term_id ] = $lingvico_term->name;
				}
			}
		}
	}
	if ( count( $lingvico_tabs ) > 0 ) {
		$lingvico_portfolio_filters_ajax   = true;
		$lingvico_portfolio_filters_active = $lingvico_cat;
		$lingvico_portfolio_filters_id     = 'portfolio_filters';
		?>
		<div class="portfolio_filters lingvico_tabs lingvico_tabs_ajax">
			<ul class="portfolio_titles lingvico_tabs_titles">
				<?php
				foreach ( $lingvico_tabs as $lingvico_id => $lingvico_title ) {
					?>
					<li><a href="<?php echo esc_url( lingvico_get_hash_link( sprintf( '#%s_%s_content', $lingvico_portfolio_filters_id, $lingvico_id ) ) ); ?>" data-tab="<?php echo esc_attr( $lingvico_id ); ?>"><?php echo esc_html( $lingvico_title ); ?></a></li>
					<?php
				}
				?>
			</ul>
			<?php
			$lingvico_ppp = lingvico_get_theme_option( 'posts_per_page' );
			if ( lingvico_is_inherit( $lingvico_ppp ) ) {
				$lingvico_ppp = '';
			}
			foreach ( $lingvico_tabs as $lingvico_id => $lingvico_title ) {
				$lingvico_portfolio_need_content = $lingvico_id == $lingvico_portfolio_filters_active || ! $lingvico_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr( sprintf( '%s_%s_content', $lingvico_portfolio_filters_id, $lingvico_id ) ); ?>"
					class="portfolio_content lingvico_tabs_content"
					data-blog-template="<?php echo esc_attr( lingvico_storage_get( 'blog_template' ) ); ?>"
					data-blog-style="<?php echo esc_attr( lingvico_get_theme_option( 'blog_style' ) ); ?>"
					data-posts-per-page="<?php echo esc_attr( $lingvico_ppp ); ?>"
					data-post-type="<?php echo esc_attr( $lingvico_post_type ); ?>"
					data-taxonomy="<?php echo esc_attr( $lingvico_taxonomy ); ?>"
					data-cat="<?php echo esc_attr( $lingvico_id ); ?>"
					data-parent-cat="<?php echo esc_attr( $lingvico_cat ); ?>"
					data-need-content="<?php echo ( false === $lingvico_portfolio_need_content ? 'true' : 'false' ); ?>"
				>
					<?php
					if ( $lingvico_portfolio_need_content ) {
						lingvico_show_portfolio_posts(
							array(
								'cat'        => $lingvico_id,
								'parent_cat' => $lingvico_cat,
								'taxonomy'   => $lingvico_taxonomy,
								'post_type'  => $lingvico_post_type,
								'page'       => 1,
								'sticky'     => $lingvico_sticky_out,
							)
						);
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		lingvico_show_portfolio_posts(
			array(
				'cat'        => $lingvico_cat,
				'parent_cat' => $lingvico_cat,
				'taxonomy'   => $lingvico_taxonomy,
				'post_type'  => $lingvico_post_type,
				'page'       => 1,
				'sticky'     => $lingvico_sticky_out,
			)
		);
	}

	lingvico_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
