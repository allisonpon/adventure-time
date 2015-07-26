<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Adventure Time
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'adventure-time' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php if ( is_front_page() && is_home()) : ?>
      <div class="site-branding">
        <?php if ( get_header_image() ) : ?>
          <div class="header-box" data-parallax="scroll" data-image-src="<?php header_image(); ?>">
            <div class="header-text">
              <h1 class="site-description"><?php bloginfo( 'description' ); ?></h1>
              <div class="location-box">
              <h3 class="site-location">Currently: <?php echo get_theme_mod("current_location"); ?></h3>
            </div>
          </div>
        <?php endif; // End header image check. ?>
      </div><!-- .site-branding -->
    <?php endif; // End header check. ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
      <div class="site-logo-box">
        <?php 
          if ( function_exists( 'jetpack_the_site_logo' ) ) {
              jetpack_the_site_logo();
          }
          else if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php else : ?>
          <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php endif; ?>
      </div>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'adventure-time' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
