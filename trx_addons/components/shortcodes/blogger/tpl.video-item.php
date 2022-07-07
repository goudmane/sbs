<?php
/**
 * The style "Video" of the Blogger
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

$args = get_query_var('trx_addons_args_sc_blogger');
if ($args['slider']) {
	?><div class="slider-slide swiper-slide"><?php
} else if ($args['columns'] > 1) {
	?><div class="<?php echo esc_attr(trx_addons_get_column_class(1, $args['columns'])); ?>"><?php
}
$post_format = get_post_format();
$show_more = !in_array($post_format, array('link', 'aside', 'status', 'quote'));
$post_format = empty($post_format) ? 'standard' : str_replace('post-format-', '', $post_format);
$post_link = empty($args['no_links']) ? get_permalink() : '';
$post_title = get_the_title();
$course = LP_Global::course();
$lingvico_counters   = lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'counters' ) );
$lingvico_components = lingvico_array_get_keys_by_value( lingvico_get_theme_option( 'meta_parts' ) );
$lingvico_hover = ! empty( $lingvico_template_args['hover'] ) && ! lingvico_is_inherit( $lingvico_template_args['hover'] )
    ? $lingvico_template_args['hover']
    : lingvico_get_theme_option( 'image_hover' );

?>
<div <?php post_class( 'sc_blogger_item post_format_'.esc_attr($post_format) . (empty($post_link) ? ' no_links' : '') ); ?>>
<?php

	// Featured image
	trx_addons_get_template_part('templates/tpl.featured.php',
									'trx_addons_args_featured',
									apply_filters('trx_addons_filter_args_featured', array(
														'class' => 'sc_blogger_item_featured',
														'hover' => 'zoomin',
														'no_links' => empty($post_link),
														'thumb_size' => apply_filters('trx_addons_filter_thumb_size', trx_addons_get_thumb_size($args['columns'] > 2 ? 'video' : 'big'), 'blogger-default')
														), 'blogger-default')
								);
	
?>
    <div class="sc_blogger_item_content entry-content"><?php

        // Post title
        if ( !in_array($post_format, array('link', 'aside', 'status', 'quote')) ) {
            ?>
            <div class="sc_blogger_item_header entry-header"><?php
                // Post title
                the_title( '<h5 class="sc_blogger_item_title entry-title">'
                    . (!empty($post_link)
                        ? sprintf( '<a href="%s" rel="bookmark">', esc_url( $post_link ) )
                        : ''),
                    (!empty($post_link) ? '</a>' : '') . '</h5>' );

                ?>
                <div class="lp_categories_flag">
                    <?php
                    if($args['post_type'] === 'lp_course') {
                        learn_press_course_categories();
                    }
                    ?>
                </div>
            </div><!-- .entry-header --><?php
        }

        // Post content
        if (!isset($args['hide_excerpt']) || (int)$args['hide_excerpt']==0) {
            ?><div class="sc_blogger_item_excerpt">
            <div class="sc_blogger_item_excerpt_text">
                <?php
                if (strpos(get_the_content('!--more'), '!--more')!==false) {
                    the_content( '' );
                } else if (!$show_more) {
                    the_content();
                } else {
                    the_excerpt();
                }
                ?>
            </div>
            </div><!-- .sc_blogger_item_excerpt -->
            <?php
        }
        ?>
        <div class="blogger_post_footer">
            <?php
            // Post meta
            if ( ! empty( $lingvico_components ) && ! in_array( $lingvico_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
                lingvico_show_post_meta(
                    apply_filters(
                        'lingvico_filter_post_meta_args', array(
                        'components' => 'counters',
                        'counters'   => 'views,comments',
                        'seo'        => false,
                    ), 'excerpt', 1
                    )
                );
            }
            ?>
        </div>
        <?php
        // More button
        if ( $show_more && !empty($post_link) && !empty($args['more_text']) ) {
            ?><div class="sc_blogger_item_button sc_item_button"><a href="<?php echo esc_url($post_link); ?>" class="<?php echo esc_attr(apply_filters('trx_addons_filter_sc_item_link_classes', 'sc_button sc_button_simple', 'sc_blogger', $args)); ?>"><?php
                echo esc_html($args['more_text']);
                ?></a></div><?php
        }

        ?>
    </div> <!-- .entry-content -->

</div><!-- .sc_blogger_item --><?php

if ($args['slider'] || $args['columns'] > 1) {
	?></div><?php
}
?>