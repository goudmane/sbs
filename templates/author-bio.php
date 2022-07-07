<?php
/**
 * The template to display the Author bio
 *
 * @package WordPress
 * @subpackage LINGVICO
 * @since LINGVICO 1.0
 */
?>

<div class="author_info author vcard" itemprop="author" itemscope itemtype="//schema.org/Person">

	<div class="author_avatar" itemprop="image">
		<?php
		$lingvico_mult = lingvico_get_retina_multiplier();
		echo get_avatar( get_the_author_meta( 'user_email' ), 90 * $lingvico_mult );
		?>
	</div><!-- .author_avatar -->

	<div class="author_description">
		<h5 class="author_title" itemprop="name">
		<?php
			// Translators: Add the author's name in the <span>
			echo sprintf( esc_html__( 'About Author %s', 'lingvico' ), '<span class="fn">' . get_the_author() . '</span>');
		?>
		</h5>

		<div class="author_bio" itemprop="description">
			<?php echo wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) ); ?>
			<?php do_action( 'lingvico_action_user_meta' ); ?>
		</div><!-- .author_bio -->

	</div><!-- .author_description -->

</div><!-- .author_info -->
