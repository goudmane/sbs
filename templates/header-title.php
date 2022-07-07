<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */

// Page (category, tag, archive, author) title

if ( lingvico_need_page_title() ) {
	lingvico_sc_layouts_showed( 'title', true );
	lingvico_sc_layouts_showed( 'postmeta', false );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( false && is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								lingvico_show_post_meta(
									apply_filters(
										'lingvico_filter_post_meta_args', array(
											'components' => lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'meta_parts' ) ),
											'counters'   => lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'counters' ) ),
											'seo'        => lingvico_is_on( lingvico_get_theme_option( 'seo_snippets' ) ),
										), 'header', 1
									)
								);
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$lingvico_blog_title           = lingvico_get_blog_title();
							$lingvico_blog_title_text      = '';
							$lingvico_blog_title_class     = '';
							$lingvico_blog_title_link      = '';
							$lingvico_blog_title_link_text = '';
							if ( is_array( $lingvico_blog_title ) ) {
								$lingvico_blog_title_text      = $lingvico_blog_title['text'];
								$lingvico_blog_title_class     = ! empty( $lingvico_blog_title['class'] ) ? ' ' . $lingvico_blog_title['class'] : '';
								$lingvico_blog_title_link      = ! empty( $lingvico_blog_title['link'] ) ? $lingvico_blog_title['link'] : '';
								$lingvico_blog_title_link_text = ! empty( $lingvico_blog_title['link_text'] ) ? $lingvico_blog_title['link_text'] : '';
							} else {
								$lingvico_blog_title_text = $lingvico_blog_title;
							}
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr( $lingvico_blog_title_class ); ?>">
								<?php
								$lingvico_top_icon = lingvico_get_term_image_small();
								if ( ! empty( $lingvico_top_icon ) ) {
									$lingvico_attr = lingvico_getimagesize( $lingvico_top_icon );
									?>
									<img src="<?php echo esc_url( $lingvico_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'lingvico' ); ?>"
										<?php
										if ( ! empty( $lingvico_attr[3] ) ) {
											lingvico_show_layout( $lingvico_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses_post( $lingvico_blog_title_text );
								?>
							</h1>
							<?php
							if ( ! empty( $lingvico_blog_title_link ) && ! empty( $lingvico_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $lingvico_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $lingvico_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
                        <?php
                            if ( lingvico_exists_trx_addons() ) { // Breadcrumbs ?>
                                <div class="sc_layouts_title_breadcrumbs">
                                    <?php
                                    do_action( 'lingvico_action_breadcrumbs' );
                                    ?>
                                </div>
                                <?php
                            }
                        ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
