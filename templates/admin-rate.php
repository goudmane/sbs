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
<div class="lingvico_admin_notice lingvico_rate_notice update-nag">
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
	<h3 class="lingvico_notice_title"><a href="<?php echo esc_url( lingvico_storage_get( 'theme_rate_url' ) ); ?>" target="_blank">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Rate our theme "%s", please', 'lingvico' ),
				$lingvico_theme_obj->name . ( LINGVICO_THEME_FREE ? ' ' . __( 'Free', 'lingvico' ) : '' )
			)
		);
		?>
	</a></h3>
	<?php

	// Description
	?>
	<div class="lingvico_notice_text">
		<p><?php echo wp_kses_data( __( 'We are glad you chose our WP theme for your website. You’ve done well customizing your website and we hope that you’ve enjoyed working with our theme.', 'lingvico' ) ); ?></p>
		<p><?php echo wp_kses_data( __( 'It would be just awesome if you spend just a minute of your time to rate our theme or the customer service you’ve received from us.', 'lingvico' ) ); ?></p>
		<p class="lingvico_notice_text_info"><?php echo wp_kses_data( __( '* We love receiving your reviews! Every time you leave a review, our CEO Henry Rise gives $5 to homeless dog shelter! Save the planet with us!', 'lingvico' ) ); ?></p>
	</div>
	<?php

	// Buttons
	?>
	<div class="lingvico_notice_buttons">
		<?php
		// Link to the theme download page
		?>
		<a href="<?php echo esc_url( lingvico_storage_get( 'theme_rate_url' ) ); ?>" class="button button-primary" target="_blank"><i class="dashicons dashicons-star-filled"></i> 
			<?php
			// Translators: Add theme name
			echo esc_html( sprintf( __( 'Rate theme %s', 'lingvico' ), $lingvico_theme_obj->name ) );
			?>
		</a>
		<?php
		// Link to the theme support
		?>
		<a href="<?php echo esc_url( lingvico_storage_get( 'theme_support_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-sos"></i> 
			<?php
			esc_html_e( 'Support', 'lingvico' );
			?>
		</a>
		<?php
		// Link to the theme documentation
		?>
		<a href="<?php echo esc_url( lingvico_storage_get( 'theme_doc_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-book"></i> 
			<?php
			esc_html_e( 'Documentation', 'lingvico' );
			?>
		</a>
		<?php
		// Dismiss
		?>
		<a href="#" class="lingvico_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="lingvico_hide_notice_text"><?php esc_html_e( 'Dismiss', 'lingvico' ); ?></span></a>
	</div>
</div>
