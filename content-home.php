<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package LFSH
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'row' ); ?>>

	<div class="home-image">
		
		<?php if( has_post_thumbnail() ) { ?>

			<?php the_post_thumbnail( 'full' ); ?>

		<?php } ?>

	</div><!-- .entry-content -->

	<div class="home-image-caption">

		<?php $key="home_subhead"; echo get_post_meta($post->ID, $key, true); ?>
		
	</div>

	<div class="entry-content">

		<?php the_content(); ?>
		 
	</div><!-- .entry-content -->
	 
</article><!-- #post-## -->
