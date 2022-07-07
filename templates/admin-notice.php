<?php
/**
 * The template to display Admin notices
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0.1
 */

$lingvico_theme_obj = wp_get_theme();
?>
<div class="lingvico_admin_notice lingvico_welcome_notice update-nag">
	<?php
	// Theme image
	$lingvico_theme_img = lingvico_get_file_url( 'screenshot.jpg' );
	if ( '' != $lingvico_theme_img ) {
		?>
		<div class="lingvico_notice_image"><img src="<?php echo esc_url( $lingvico_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'lingvico' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="lingvico_notice_title">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Welcome to %1$s v.%2$s', 'lingvico' ),
				$lingvico_theme_obj->name . ( LINGVICO_THEME_FREE ? ' ' . __( 'Free', 'lingvico' ) : '' ),
				$lingvico_theme_obj->version
			)
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="lingvico_notice_text">
		<p class="lingvico_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $lingvico_theme_obj->description ) );
			?>
		</p>
		<p class="lingvico_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Attention! Plugin "ThemeREX Addons" is required! Please, install and activate it!', 'lingvico' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="lingvico_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=lingvico_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Install plugin "ThemeREX Addons"', 'lingvico' );
			?>
		</a>
		<?php		
		// Dismiss this notice
		?>
		<a href="#" class="lingvico_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="lingvico_hide_notice_text"><?php esc_html_e( 'Dismiss', 'lingvico' ); ?></span></a>
	</div>
</div>
