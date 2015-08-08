<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package LFSH
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<footer id="footer" class="site-footer col_6" role="contentinfo">
				<div class="footer-menu col_4c">
					
					<div class="clf">
						<p>A project of the </p>
						<a href="http://www.clf.org" title="A project of the Conservation Law Foundation">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/clf-logo-silo.png" alt="A project of the Conservation Law Foundation" />
					</a>
					</div>

					<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
				</div><!-- .site-info -->
			</footer>

		<main id="main" class="site-main col_5c" role="main">

			<section class="error-404 not-found">
				
				<div class="page-content">
					<h3><?php _e( 'It looks like nothing was found at this location.', 'lfsh' ); ?>
					</h3>

					

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>