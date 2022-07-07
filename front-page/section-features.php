<div class="front_page_section front_page_section_features<?php
	$lingvico_scheme = lingvico_get_theme_option( 'front_page_features_scheme' );
	if ( ! lingvico_is_inherit( $lingvico_scheme ) ) {
		echo ' scheme_' . esc_attr( $lingvico_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( lingvico_get_theme_option( 'front_page_features_paddings' ) );
?>"
		<?php
		$lingvico_css      = '';
		$lingvico_bg_image = lingvico_get_theme_option( 'front_page_features_bg_image' );
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
	$lingvico_anchor_icon = lingvico_get_theme_option( 'front_page_features_anchor_icon' );
	$lingvico_anchor_text = lingvico_get_theme_option( 'front_page_features_anchor_text' );
if ( ( ! empty( $lingvico_anchor_icon ) || ! empty( $lingvico_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_features"'
									. ( ! empty( $lingvico_anchor_icon ) ? ' icon="' . esc_attr( $lingvico_anchor_icon ) . '"' : '' )
									. ( ! empty( $lingvico_anchor_text ) ? ' title="' . esc_attr( $lingvico_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_features_inner
	<?php
	if ( lingvico_get_theme_option( 'front_page_features_fullheight' ) ) {
		echo ' lingvico-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$lingvico_css      = '';
			$lingvico_bg_mask  = lingvico_get_theme_option( 'front_page_features_bg_mask' );
			$lingvico_bg_color_type = lingvico_get_theme_option( 'front_page_features_bg_color_type' );
			if ( 'custom' == $lingvico_bg_color_type ) {
				$lingvico_bg_color = lingvico_get_theme_option( 'front_page_features_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_features_content_wrap content_wrap">
			<?php
			// Caption
			$lingvico_caption = lingvico_get_theme_option( 'front_page_features_caption' );
			if ( ! empty( $lingvico_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_features_caption front_page_block_<?php echo ! empty( $lingvico_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses_post( $lingvico_caption ); ?></h2>
				<?php
			}

			// Description (text)
			$lingvico_description = lingvico_get_theme_option( 'front_page_features_description' );
			if ( ! empty( $lingvico_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_features_description front_page_block_<?php echo ! empty( $lingvico_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses_post( wpautop( $lingvico_description ) ); ?></div>
				<?php
			}

			// Content (widgets)
			?>
			<div class="front_page_section_output front_page_section_features_output">
			<?php
			if ( is_active_sidebar( 'front_page_features_widgets' ) ) {
				dynamic_sidebar( 'front_page_features_widgets' );
			} elseif ( current_user_can( 'edit_theme_options' ) ) {
				if ( ! lingvico_exists_trx_addons() ) {
					lingvico_customizer_need_trx_addons_message();
				} else {
					lingvico_customizer_need_widgets_message( 'front_page_features_caption', 'ThemeREX Addons - Services' );
				}
			}
			?>
			</div>
		</div>
	</div>
</div>
