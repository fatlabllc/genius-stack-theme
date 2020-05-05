<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if(get_field('flws_favicon','option')){?>
        <link rel="icon" href="<?php the_field('flws_favicon','option');?>">
    <?php }?>
	<?php wp_head(); ?>
    <!-- brand colors -->
	<?php include( locate_template( 'template-parts/module-brand-colors.php', false, false ) );?>
    <!-- //brand colors -->
	<!-- theme added custom scripts -->
	<?php the_field('flws_header_scripts','option');?>
	<!-- //theme added custom scripts -->
	<!-- theme added css -->
    <?php if(get_field('flws_custom_css','option')){?>
        <style>
            <?php the_field('flws_custom_css','option');?>
        </style>
    <?php }?>
	<!-- //theme added css -->
    <!-- call google fonts -->
	<?php echo flws_get_fonts();?>
	<!-- // call google fonts -->
	<?php if(get_field('page_specific_scripts')){?>
        <!-- page specific scripts -->
        <?php the_field('page_specific_scripts');?>
        <!-- // page specific scripts -->
	<?php }?>
    <script>
        window.FontAwesomeConfig = {
            searchPseudoElements: true
        }
    </script>
</head>
<body <?php body_class(); ?>>
<?php the_field('flws_body_scripts','option');?>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">
	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
		<?php if ( 'container' == $container ) : ?>
		<nav class="navbar navbar-expand-lg navbar-light <?php if(get_field('make_navigation_sticky','option')){echo 'fixed-top';}?>" id="banner">
			<div class="container">
				<?php endif; ?>
				<div class="header-logo-container">
                    <span class="align-top">
					<a href="/"><img src="<?php the_field('flws_logo','option');?>" class="header-logo" alt="<?php echo get_bloginfo('name');?>"></a>
                    </span>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new Aria_Walker_Nav_Menu()
					)
				); ?>
				<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
		<?php endif; ?>
		</nav><!-- .site-navigation -->
	</div><!-- #wrapper-navbar end -->
