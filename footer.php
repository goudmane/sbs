<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */

						// Widgets area inside page content
						lingvico_create_widgets_area( 'widgets_below_content' );
						?>
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					$lingvico_body_style = lingvico_get_theme_option( 'body_style' );
					if ( 'fullscreen' != $lingvico_body_style ) {
						?>
						</div><!-- </.content_wrap> -->
						<?php
					}

					// Widgets area below page content and related posts below page content
					$lingvico_widgets_name = lingvico_get_theme_option( 'widgets_below_page' );
					$lingvico_show_widgets = ! lingvico_is_off( $lingvico_widgets_name ) && is_active_sidebar( $lingvico_widgets_name );
					$lingvico_show_related = is_single() && lingvico_get_theme_option( 'related_position' ) == 'below_page';
					if ( $lingvico_show_widgets || $lingvico_show_related ) {
						if ( 'fullscreen' != $lingvico_body_style ) {
							?>
							<div class="content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $lingvico_show_related ) {
							do_action( 'lingvico_action_related_posts' );
						}

						// Widgets area below page content
						if ( $lingvico_show_widgets ) {
							lingvico_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $lingvico_body_style ) {
							?>
							</div><!-- </.content_wrap> -->
							<?php
						}
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Single posts banner before footer
			if ( is_singular( 'post' ) ) {
				lingvico_show_post_banner('footer');
			}
			// Footer
			$lingvico_footer_type = lingvico_get_theme_option( 'footer_type' );
			if ( 'custom' == $lingvico_footer_type && ! lingvico_is_layouts_available() ) {
				$lingvico_footer_type = 'default';
			}
			get_template_part( apply_filters( 'lingvico_filter_get_template_part', "templates/footer-{$lingvico_footer_type}" ) );
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php wp_footer(); ?>

</body>
</html>