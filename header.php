<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js
    <?php
        // Class scheme_xxx need in the <html> as context for the <body>!
        echo ' scheme_' . esc_attr( lingvico_get_theme_option( 'color_scheme' ) );
    ?>
">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>
<?php wp_body_open(); ?>

	<?php do_action( 'lingvico_action_before_body' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">
			<?php
			// Desktop header
			$lingvico_header_type = lingvico_get_theme_option( 'header_type' );
			if ( 'custom' == $lingvico_header_type && ! lingvico_is_layouts_available() ) {
				$lingvico_header_type = 'default';
			}
			get_template_part( apply_filters( 'lingvico_filter_get_template_part', "templates/header-{$lingvico_header_type}" ) );

			// Side menu
			if ( in_array( lingvico_get_theme_option( 'menu_style' ), array( 'left', 'right' ) ) ) {
				get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'templates/header-navi-side' ) );
			}

			// Mobile menu
			get_template_part( apply_filters( 'lingvico_filter_get_template_part', 'templates/header-navi-mobile' ) );
			
			// Single posts banner after header
			lingvico_show_post_banner( 'header' );
			?>

			<div class="page_content_wrap">
				<?php
				// Single posts banner on the background
				if ( is_singular( 'post' ) ) {

					lingvico_show_post_banner( 'background' );

					$lingvico_post_thumbnail_type  = lingvico_get_theme_option( 'post_thumbnail_type' );
					$lingvico_post_header_position = lingvico_get_theme_option( 'post_header_position' );
					$lingvico_post_header_align    = lingvico_get_theme_option( 'post_header_align' );

					// Boxed post thumbnail
					if ( in_array( $lingvico_post_thumbnail_type, array( 'boxed', 'fullwidth') ) ) {
						ob_start();
						?>
						<div class="header_content_wrap header_align_<?php echo esc_attr( $lingvico_post_header_align ); ?>">
							<?php
							if ( 'boxed' === $lingvico_post_thumbnail_type ) {
								?>
								<div class="content_wrap">
								<?php
							}

							// Post title and meta
							if ( 'above' === $lingvico_post_header_position ) {
								lingvico_show_post_title_and_meta();
							}

							// Featured image
							lingvico_show_post_featured_image();

							// Post title and meta
							if ( in_array( $lingvico_post_header_position, array( 'under', 'on_thumb' ) ) ) {
								lingvico_show_post_title_and_meta();
							}

							if ( 'boxed' === $lingvico_post_thumbnail_type ) {
								?>
								</div>
								<?php
							}
							?>
						</div>
						<?php
						$lingvico_post_header = ob_get_contents();
						ob_end_clean();
						if ( strpos( $lingvico_post_header, 'post_featured' ) !== false || strpos( $lingvico_post_header, 'post_title' ) !== false ) {
							lingvico_show_layout( $lingvico_post_header );
						}
					}
				}

				if ( 'fullscreen' != lingvico_get_theme_option( 'body_style' ) ) {
					?>
					<div class="content_wrap">
						<?php
				}

				// Widgets area above page content
				lingvico_create_widgets_area( 'widgets_above_page' );
				?>

				<div class="content">
					<?php
					// Widgets area inside page content
					lingvico_create_widgets_area( 'widgets_above_content' );
