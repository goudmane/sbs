<?php
/**
 * The default template to display the content of the single page
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */

$lingvico_seo = lingvico_is_on( lingvico_get_theme_option( 'seo_snippets' ) );
?>

<article id="post-<?php the_ID(); ?>" 
									<?php
									post_class( 'post_item_single post_type_page' );
									if ( $lingvico_seo ) {
										?>
		itemscope="itemscope" 
		itemprop="mainEntityOfPage" 
		itemtype="//schema.org/<?php echo esc_attr( lingvico_get_markup_schema() ); ?>"
		itemid="<?php echo esc_url( get_the_permalink() ); ?>"
		content="<?php the_title_attribute(); ?>"
										<?php
									}
									?>
>

	<?php
	do_action( 'lingvico_action_before_post_data' );

	// Structured data snippets
	if ( $lingvico_seo ) {
		get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'templates/seo' ) );
	}

	// Now featured image used as header's background
	// Uncomment next rows (or remove false from the condition) to show featured image for the pages
	if ( false && ! lingvico_sc_layouts_showed( 'featured' ) && strpos( get_the_content(), '[trx_widget_banner]' ) === false ) {
		do_action( 'lingvico_action_before_post_featured' );
		lingvico_show_post_featured();
		do_action( 'lingvico_action_after_post_featured' );
	} elseif ( has_post_thumbnail() ) {
		?>
		<meta itemprop="image" "//schema.org/ImageObject" content="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ); ?>">
		<?php
	}

	do_action( 'lingvico_action_before_post_content' );
	?>

	<div class="post_content entry-content">
		<?php
			the_content();

			wp_link_pages(
				array(
					'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'lingvico' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'lingvico' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
			?>
	</div><!-- .entry-content -->

	<?php
	do_action( 'lingvico_action_after_post_content' );

	do_action( 'lingvico_action_after_post_data' );
	?>

</article>
