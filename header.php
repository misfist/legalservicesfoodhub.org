<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package LFSH
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta name="viewport" content="width=device-width, user-scalable=no">
<?php wp_head(); ?>
</head>

<body <?php body_class('container'); ?>>

	<div class="row topNav">
		<div class="wrapper">
			<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
		</div>
	</div>

	<?php 

	if (is_home() ) {

	} else {
		 $headerImage = get_post_meta($post->ID, 'header-image', true);
			 if (!empty($headerImage)) {
			?> 
				<div class="row headerBg">

					<img src="<?php echo $headerImage ?>" alt="Legal Food Services Hub">
				</div>
			<?php
			} else { 

				?> <div class="headerBg row" style="background-image:url('<?php bloginfo('template_url'); ?>/images/legal-food-services-hub-hero-A.jpg');"></div><?php

				}
			 			}

	?>

	
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'lfsh' ); ?></a>

	<header id="masthead" class="header row bottom" role="banner">

		<section id="" class="wrapper">
				
				<div class="site-branding col_3">

					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				</div>

				<nav id="site-navigation" class="main-navigation col_3c" role="navigation">

					<button class="button mobile menu-toggle"><?php _e( '&#9776;', 'lfsh' ); ?></button>

						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_id'    => 'tabs' ) ); ?>

				</nav><!-- #site-navigation -->
		</section>	
	</header><!-- #masthead -->
</div>
<span class="screenwidth"></span>

