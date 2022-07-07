<div class="front_page_section front_page_section_woocommerce<?php
	$lingvico_scheme = lingvico_get_theme_option( 'front_page_woocommerce_scheme' );
	if ( ! lingvico_is_inherit( $lingvico_scheme ) ) {
		echo ' scheme_' . esc_attr( $lingvico_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( lingvico_get_theme_option( 'front_page_woocommerce_paddings' ) );
?>"
		<?php
		$lingvico_css      = '';
		$lingvico_bg_image = lingvico_get_theme_option( 'front_page_woocommerce_bg_image' );
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
	$lingvico_anchor_icon = lingvico_get_theme_option( 'front_page_woocommerce_anchor_icon' );
	$lingvico_anchor_text = lingvico_get_theme_option( 'front_page_woocommerce_anchor_text' );
if ( ( ! empty( $lingvico_anchor_icon ) || ! empty( $lingvico_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_woocommerce"'
									. ( ! empty( $lingvico_anchor_icon ) ? ' icon="' . esc_attr( $lingvico_anchor_icon ) . '"' : '' )
									. ( ! empty( $lingvico_anchor_text ) ? ' title="' . esc_attr( $lingvico_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_woocommerce_inner
	<?php
	if ( lingvico_get_theme_option( 'front_page_woocommerce_fullheight' ) ) {
		echo ' lingvico-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$lingvico_css      = '';
			$lingvico_bg_mask  = lingvico_get_theme_option( 'front_page_woocommerce_bg_mask' );
			$lingvico_bg_color_type = lingvico_get_theme_option( 'front_page_woocommerce_bg_color_type' );
			if ( 'custom' == $lingvico_bg_color_type ) {
				$lingvico_bg_color = lingvico_get_theme_option( 'front_page_woocommerce_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_woocommerce_content_wrap content_wrap woocommerce">
			<?php
			// Content wrap with title and description
			$lingvico_caption     = lingvico_get_theme_option( 'front_page_woocommerce_caption' );
			$lingvico_description = lingvico_get_theme_option( 'front_page_woocommerce_description' );
			if ( ! empty( $lingvico_caption ) || ! empty( $lingvico_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				// Caption
				if ( ! empty( $lingvico_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_woocommerce_caption front_page_block_<?php echo ! empty( $lingvico_caption ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses_post( $lingvico_caption );
					?>
					</h2>
					<?php
				}

				// Description (text)
				if ( ! empty( $lingvico_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_woocommerce_description front_page_block_<?php echo ! empty( $lingvico_description ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses_post( wpautop( $lingvico_description ) );
					?>
					</div>
					<?php
				}
			}

			// Content (widgets)
			?>
			<div class="front_page_section_output front_page_section_woocommerce_output list_products shop_mode_thumbs">
			<?php
				$lingvico_woocommerce_sc = lingvico_get_theme_option( 'front_page_woocommerce_products' );
			if ( 'products' == $lingvico_woocommerce_sc ) {
				$lingvico_woocommerce_sc_ids      = lingvico_get_theme_option( 'front_page_woocommerce_products_per_page' );
				$lingvico_woocommerce_sc_per_page = count( explode( ',', $lingvico_woocommerce_sc_ids ) );
			} else {
				$lingvico_woocommerce_sc_per_page = max( 1, (int) lingvico_get_theme_option( 'front_page_woocommerce_products_per_page' ) );
			}
				$lingvico_woocommerce_sc_columns = max( 1, min( $lingvico_woocommerce_sc_per_page, (int) lingvico_get_theme_option( 'front_page_woocommerce_products_columns' ) ) );
				echo do_shortcode(
					"[{$lingvico_woocommerce_sc}"
									. ( 'products' == $lingvico_woocommerce_sc
											? ' ids="' . esc_attr( $lingvico_woocommerce_sc_ids ) . '"'
											: '' )
									. ( 'product_category' == $lingvico_woocommerce_sc
											? ' category="' . esc_attr( lingvico_get_theme_option( 'front_page_woocommerce_products_categories' ) ) . '"'
											: '' )
									. ( 'best_selling_products' != $lingvico_woocommerce_sc
											? ' orderby="' . esc_attr( lingvico_get_theme_option( 'front_page_woocommerce_products_orderby' ) ) . '"'
												. ' order="' . esc_attr( lingvico_get_theme_option( 'front_page_woocommerce_products_order' ) ) . '"'
											: '' )
									. ' per_page="' . esc_attr( $lingvico_woocommerce_sc_per_page ) . '"'
									. ' columns="' . esc_attr( $lingvico_woocommerce_sc_columns ) . '"'
					. ']'
				);
				?>
			</div>
		</div>
	</div>
</div>
