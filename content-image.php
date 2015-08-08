<?php
/**
 * @package LFSH
 */
?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'original' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-image: url('<?php echo $image[0]; ?>');
-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $image[0]; ?>', sizingMethod='scale')";">

</article>
<?php endif; ?>

 
	
 
