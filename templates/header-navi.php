<?php
/**
 * The template to display the main menu
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */
?>
<div class="top_panel_navi sc_layouts_row sc_layouts_row_type_compact sc_layouts_row_fixed sc_layouts_row_fixed_always sc_layouts_row_delimiter
	<?php
	if ( lingvico_is_on( lingvico_get_theme_option( 'header_mobile_enabled' ) ) ) {
		?>
		sc_layouts_hide_on_mobile
		<?php
	}
	?>
">
	<div class="content_wrap">
		<div class="columns_wrap columns_fluid">
			<div class="sc_layouts_column sc_layouts_column_align_left sc_layouts_column_icons_position_left sc_layouts_column_fluid column-1_4">
				<div class="sc_layouts_item">
					<?php
					// Logo
					get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'templates/header-logo' ) );
					?>
				</div>
			</div><div class="sc_layouts_column sc_layouts_column_align_right sc_layouts_column_icons_position_left sc_layouts_column_fluid column-3_4">
				<div class="sc_layouts_item">
					<?php
					// Main menu
					$lingvico_menu_main = lingvico_get_nav_menu(
						array(
							'location' => 'menu_main',
							'class'    => 'sc_layouts_menu sc_layouts_menu_default sc_layouts_hide_on_mobile',
						)
					);
					// Show any menu if no menu selected in the location 'menu_main'
					if ( lingvico_get_theme_setting( 'autoselect_menu' ) && empty( $lingvico_menu_main ) ) {
						$lingvico_menu_main = lingvico_get_nav_menu(
							array(
								'class' => 'sc_layouts_menu sc_layouts_menu_default sc_layouts_hide_on_mobile',
							)
						);
					}
					lingvico_show_layout( $lingvico_menu_main );
					// Mobile menu button
					?>
					<div class="sc_layouts_iconed_text sc_layouts_menu_mobile_button">
						<a class="sc_layouts_item_link sc_layouts_iconed_text_link" href="#">
							<span class="sc_layouts_item_icon sc_layouts_iconed_text_icon trx_addons_icon-menu"></span>
						</a>
					</div>
				</div>
				<?php
				if ( lingvico_exists_trx_addons() ) {
					?>
					<div class="sc_layouts_item">
						<?php
						// Display search field
						do_action(
							'lingvico_action_search',
							array(
								'style' => 'fullscreen',
								'class' => 'header_search',
								'ajax'  => false
							)
						);
						?>
					</div>
					<?php
				}
				?>
			</div>
		</div><!-- /.columns_wrap -->
	</div><!-- /.content_wrap -->
</div><!-- /.top_panel_navi -->
