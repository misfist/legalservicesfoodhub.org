<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package LFSH
 */

get_header(); ?>

<div id="content" class="site-content row">
	<div id="home" class="hero">

			<div id="primary" class="content-area">
				<main id="content" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content-image', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

				<section id="ribbon" class="highlight">
					
					<?php 
						 $args = array(
								'category_name'=> 'home-highlight',
								'tax_query' => array(
													array(
													  'taxonomy' => 'post_format',
													  'field' => 'slug',
													  'terms' => 'post-format-link'
														)
													)
								
								)	;			
					  
						// the query
						$the_query = new WP_Query( $args ); ?>



						<?php if ( $the_query->have_posts() ) : ?>

						<!-- pagination here -->

						<!-- the loop -->
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('posts col_1'); ?>>



								<?php if( $the_query->current_post == 0 && !is_paged() ) { ?>

								 
									
									<h2 class="link mid"><?php 

											ob_start();
											the_content();
											$old_content = ob_get_clean();
											$new_content = strip_tags($old_content,'<a><b><br />');
											echo $new_content;


									 ?></h2>

								 
								

								
								<?php
								} else { ?>

								 
									
									

									<?php the_content();?>



							 
								<?php } ?>
									
							</article>

						<?php endwhile; ?>
						<!-- end of the loop -->

						<!-- pagination here -->

						<?php wp_reset_postdata(); ?>

						<?php else:  ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>



				</section>

				</main><!-- #main -->
			</div><!-- #primary -->

	</div>		
</div><!-- #content -->


<div id="second-half" class="row bottom-area">

		<div id="top-footer" class="first-footer yellowBorder top">

			<section class="wrapper">

				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>

				 
			</section>

			<section id="down-header" class="">

				<div class="wrapper">
						<div class="site-branding col_3">
						 	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						
							</div>
						
								<div id="second-navigation" class="main-navigation col_3c">
									<button id="second-button" class="button mobile menu-toggle hide"><?php _e( '&#9776;', 'lfsh' ); ?></button>
									<?php wp_nav_menu( array( 
																'theme_location' => 'primary',
																'container_id'    => 'tabs-low',
																'menu_class' => 'menu second-menu' ) ); ?>
						
								</div><!-- #site-navigation -->
				</div>
			</section>

		</div>

			<footer id="footer" class="site-footer col_6" role="contentinfo">
				<div class="footer-menu col_4c">
					
					<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>

					<div class="clf">
						<p>A project of </p>
						<a href="http://www.clf.org" title="A project of the Conservation Law Foundation">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/clf-logo-silo.png" alt="A project of the Conservation Law Foundation" />
					</a>
					</div>

					
				</div><!-- .site-info -->
			</footer>

			<section id="bottom-pages" class="col_6c shadow">

				<?php 
						 $args = array(
								'category_name'=> 'home-bottom'							
								)	;			
					  
						// the query
						$bottom_query = new WP_Query( $args ); ?>



						<?php if ( $bottom_query->have_posts() ) : ?>

						<!-- pagination here -->

						<!-- the loop -->
						<?php while ( $bottom_query->have_posts() ) : $bottom_query->the_post(); ?>

							<article id="<?php echo $post->post_name; ?>" <?php post_class('posts col_6c'); ?> >


 
									
									<h2 class=""><?php if (is_home()) { ?>
<!-- don't display title (leave this blank) -->
<?php } else { ?>
<?php the_title(); ?>
<?php } ?></h2>

								 
								 
									

									<p><?php the_content();?></p>



						 
									
							</article>

						<?php endwhile; ?>
						<!-- end of the loop -->

						<!-- pagination here -->

						<?php wp_reset_postdata(); ?>

						<?php else:  ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>



			</div>

</div>
<?php get_footer(); ?>
