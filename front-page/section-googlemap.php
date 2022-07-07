<div class="front_page_section front_page_section_googlemap<?php
	$lingvico_scheme = lingvico_get_theme_option( 'front_page_googlemap_scheme' );
	if ( ! lingvico_is_inherit( $lingvico_scheme ) ) {
		echo ' scheme_' . esc_attr( $lingvico_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( lingvico_get_theme_option( 'front_page_googlemap_paddings' ) );
?>"
		<?php
		$lingvico_css      = '';
		$lingvico_bg_image = lingvico_get_theme_option( 'front_page_googlemap_bg_image' );
		if ( ! empty( $lingvico_bg_image ) ) {
			$lingvico_css .= 'background-image: url(' . esc_url( lingvico_get_attachment_url( $lingvico_bg_image ) ) . ');';
		}
		if ( ! empty( $lingvico_css ) ) {
			echo ' style="' . esc_attr( $lingvico_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$lingvico_anchor_icon = lingvico_get_theme_option( 'front_page_googlemap_anchor_icon' );
	$lingvico_anchor_text = lingvico_get_theme_option( 'front_page_googlemap_anchor_text' );
if ( ( ! empty( $lingvico_anchor_icon ) || ! empty( $lingvico_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_googlemap"'
									. ( ! empty( $lingvico_anchor_icon ) ? ' icon="' . esc_attr( $lingvico_anchor_icon ) . '"' : '' )
									. ( ! empty( $lingvico_anchor_text ) ? ' title="' . esc_attr( $lingvico_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_googlemap_inner
	<?php
	if ( lingvico_get_theme_option( 'front_page_googlemap_fullheight' ) ) {
		echo ' lingvico-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$lingvico_css      = '';
			$lingvico_bg_mask  = lingvico_get_theme_option( 'front_page_googlemap_bg_mask' );
			$lingvico_bg_color_type = lingvico_get_theme_option( 'front_page_googlemap_bg_color_type' );
			if ( 'custom' == $lingvico_bg_color_type ) {
				$lingvico_bg_color = lingvico_get_theme_option( 'front_page_googlemap_bg_color' );
			} elseif ( 'scheme_bg_color' == $lingvico_bg_color_type ) {
				$lingvico_bg_color = lingvico_get_scheme_color( 'bg_color', $lingvico_scheme );
			} else {
				$lingvico_bg_color = '';
			}
			if ( ! empty( $lingvico_bg_color ) && $lingvico_bg_mask > 0 ) {
				$lingvico_css .= 'background-color: ' . esc_attr(
					1 == $lingvico_bg_mask ? $lingvico_bg_color : lingvico_hex2rgba( $lingvico_bg_color, $lingvico_bg_mask )
				) . ';';
			}
			if ( ! empty( $lingvico_css ) ) {
				echo ' style="' . esc_attr( $lingvico_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_googlemap_content_wrap
		<?php
			$lingvico_layout = lingvico_get_theme_option( 'front_page_googlemap_layout' );
		if ( 'fullwidth' != $lingvico_layout ) {
			echo ' content_wrap';
		}
		?>
		">
			<?php
			// Content wrap with title and description
			$lingvico_caption     = lingvico_get_theme_option( 'front_page_googlemap_caption' );
			$lingvico_description = lingvico_get_theme_option( 'front_page_googlemap_description' );
			if ( ! empty( $lingvico_caption ) || ! empty( $lingvico_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'fullwidth' == $lingvico_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}
					// Caption
				if ( ! empty( $lingvico_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_googlemap_caption front_page_block_<?php echo ! empty( $lingvico_caption ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses_post( $lingvico_caption );
					?>
					</h2>
					<?php
				}

					// Description (text)
				if ( ! empty( $lingvico_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_googlemap_description front_page_block_<?php echo ! empty( $lingvico_description ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses_post( wpautop( $lingvico_description ) );
					?>
					</div>
					<?php
				}
				if ( 'fullwidth' == $lingvico_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$lingvico_content = lingvico_get_theme_option( 'front_page_googlemap_content' );
			if ( ! empty( $lingvico_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'columns' == $lingvico_layout ) {
					?>
					<div class="front_page_section_columns front_page_section_googlemap_columns columns_wrap">
						<div class="column-1_3">
					<?php
				} elseif ( 'fullwidth' == $lingvico_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}

				?>
				<div class="front_page_section_content front_page_section_googlemap_content front_page_block_<?php echo ! empty( $lingvico_content ) ? 'filled' : 'empty'; ?>">
				<?php
					echo wp_kses_post( $lingvico_content );
				?>
				</div>
				<?php

				if ( 'columns' == $lingvico_layout ) {
					?>
					</div><div class="column-2_3">
					<?php
				} elseif ( 'fullwidth' == $lingvico_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Widgets output
			?>
			<div class="front_page_section_output front_page_section_googlemap_output">
			<?php
			if ( is_active_sidebar( 'front_page_googlemap_widgets' ) ) {
				dynamic_sidebar( 'front_page_googlemap_widgets' );
			} elseif ( current_user_can( 'edit_theme_options' ) ) {
				if ( ! lingvico_exists_trx_addons() ) {
					lingvico_customizer_need_trx_addons_message();
				} else {
					lingvico_customizer_need_widgets_message( 'front_page_googlemap_caption', 'ThemeREX Addons - Google map' );
				}
			}
			?>
			</div>
			<?php

			if ( 'columns' == $lingvico_layout && ( ! empty( $lingvico_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>
		</div>
	</div>
</div>
