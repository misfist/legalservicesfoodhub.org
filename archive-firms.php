<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package LFSH
 */

get_header(); 


// $lfsh_firms_options = get_option( 'lfsh_firm_options' );


?>

	<section id="primary" class="content-area wrapper">
		
	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<div class="page-header">
				<h1 class="page-title">
					Attorneys in our network
				</h1>


			</div><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'firms-archive' ); ?>

				 

			<?php endwhile; // end of the loop. ?>

		 

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

 
<?php get_footer(); ?>
