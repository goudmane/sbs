<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.10
 */

// Footer menu
$lingvico_menu_footer = lingvico_get_nav_menu(
	array(
		'location' => 'menu_footer',
		'class'    => 'sc_layouts_menu sc_layouts_menu_default',
	)
);
if ( ! empty( $lingvico_menu_footer ) ) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php lingvico_show_layout( $lingvico_menu_footer ); ?>
		</div>
	</div>
	<?php
}
