<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */

$lingvico_template_args = get_query_var( 'lingvico_template_args' );
if ( is_array( $lingvico_template_args ) ) {
	$lingvico_columns    = empty( $lingvico_template_args['columns'] ) ? 1 : max( 1, $lingvico_template_args['columns'] );
	$lingvico_blog_style = array( $lingvico_template_args['type'], $lingvico_columns );
	if ( ! empty( $lingvico_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $lingvico_columns > 1 ) {
		?>
		<div class="column-1_<?php echo esc_attr( $lingvico_columns ); ?>">
		<?php
	}
}
$lingvico_components = lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'meta_parts' ) );
$lingvico_counters   = lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'counters' ) );
$lingvico_expanded    = ! lingvico_sidebar_present() && lingvico_is_on( lingvico_get_theme_option( 'expand_content' ) );
$lingvico_post_format = get_post_format();
$lingvico_post_format = empty( $lingvico_post_format ) ? 'standard' : str_replace( 'post-format-', '', $lingvico_post_format );
$lingvico_animation   = lingvico_get_theme_option( 'blog_animation' );
?>
<article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_' . esc_attr( $lingvico_post_format ) ); ?>
	<?php echo ( ! lingvico_is_off( $lingvico_animation ) && empty( $lingvico_template_args['slider'] ) ? ' data-animation="' . esc_attr( lingvico_get_animation_classes( $lingvico_animation ) ) . '"' : '' ); ?>
	>
	<?php

	// Sticky label
	if ( is_sticky() && ! is_paged()) {
        if ( has_post_thumbnail() ){
            ?>
            <span class="post_label label_sticky" > <?php esc_html_e( 'top post', 'lingvico' )?></span>
            <?php
	    }else{
	            ?>
	         <span class="post_label" > <?php esc_html_e( 'top post', 'lingvico' )?></span>
	         <?php
	    }
	}

	// Featured image
	$lingvico_hover = ! empty( $lingvico_template_args['hover'] ) && ! lingvico_is_inherit( $lingvico_template_args['hover'] )
						? $lingvico_template_args['hover']
						: lingvico_get_theme_option( 'image_hover' );
	lingvico_show_post_featured(
		array(
			'singular'   => lingvico_exists_trx_addons() && ('audio' == $lingvico_post_format ? true : false),
			'no_links'   => ! empty( $lingvico_template_args['no_links'] ),
			'hover'      => $lingvico_hover,
			'thumb_size' => lingvico_get_thumb_size( strpos( lingvico_get_theme_option( 'body_style' ), 'full' ) !== false ? 'full' : ( $lingvico_expanded ? 'excerpt' : 'excerpt' ) ),
		)
	);
	$post_content = lingvico_get_post_content();
    $audio = '';
    if ( 'audio' == $lingvico_post_format ) {
        // Put audio over the thumb
        $audio = lingvico_get_post_audio( $post_content, false );
        if ( lingvico_exists_trx_addons() ) {
            if ( ! empty( $audio ) ) {
                trx_addons_audio_elementor_post();
            }
        }
    }

	// Title and post meta
	if ( get_the_title() != '' ) {
		?>
		<div class="post_header entry-header">
			<?php

            // Post meta
			    if ( ! empty( $lingvico_components ) && ! in_array( $lingvico_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
                    lingvico_show_post_meta(
                        apply_filters(
                            'lingvico_filter_post_meta_args', array(
                                'components' => $lingvico_components,
                                'counters'   => $lingvico_counters,
                                'seo'        => false,
                            ), 'excerpt', 1
                        )
                    );
                }
			do_action( 'lingvico_action_before_post_title' );

			// Post title
			if ( empty( $lingvico_template_args['no_links'] ) ) {
				the_title( sprintf( '<h2 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			} else {
				the_title( '<h2 class="post_title entry-title">', '</h2>' );
			}

			do_action( 'lingvico_action_before_post_meta' );

			?>
		</div><!-- .post_header -->
		<?php
	}

	// Post content
	if ( empty( $lingvico_template_args['hide_excerpt'] ) && lingvico_get_theme_option( 'excerpt_length' ) > 0 ) {

		?>
		<div class="post_content entry-content">
		<?php
		if ( lingvico_get_theme_option( 'blog_content' ) == 'fullpost' ) {
			// Post content area
			?>
				<div class="post_content_inner">
				<?php
				    the_content( '' );
				?>
				</div>
				<?php
				// Inner pages
				wp_link_pages(
					array(
						'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'lingvico' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'lingvico' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
		} else {
			// Post content area
			?>
				<div class="post_content_inner">
				<?php
                if ( empty( $audio ) ) {
                    if ( has_excerpt() ) {
                            the_excerpt();
                    } elseif ( strpos( get_the_content( '!--more' ), '!--more' ) !== false ) {
                            the_content( '' );
                    } elseif ( in_array( $lingvico_post_format, array( 'link', 'aside', 'status' ) ) ) {
                            the_content();
                    } elseif ( 'quote' == $lingvico_post_format ) {
                        $quote = lingvico_get_tag( get_the_content(), '<blockquote>', '</blockquote>' );

                        if ( ! empty( $quote ) ) {
                            lingvico_show_layout( wpautop( $quote ) );
                        } else {
                            the_excerpt();
                        }
                        if ( ! empty( $lingvico_components ) && ! in_array( $lingvico_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
                            lingvico_show_post_meta(
                                apply_filters(
                                    'lingvico_filter_post_meta_args', array(
                                        'components' => $lingvico_components,
                                        'counters'   => $lingvico_counters,
                                        'seo'        => false,
                                    ), 'excerpt', 1
                                )
                            );
                        }
                    }
                    elseif ( substr( get_the_content(), 0, 4 ) != '[vc_' ) {
                        the_excerpt();
                    }
                }
				?>
				</div>
				<?php
				// More button
				if ( empty( $lingvico_template_args['no_links'] ) && ! in_array( $lingvico_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
					?>
					<p><a class="more-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read more', 'lingvico' ); ?></a></p>
					<?php
				}
		}
		?>
		</div><!-- .entry-content -->
		<?php
	}
	?>
	</article>
<?php

if ( is_array( $lingvico_template_args ) ) {
	if ( ! empty( $lingvico_template_args['slider'] ) || $lingvico_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
