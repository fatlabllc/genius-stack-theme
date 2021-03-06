<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

$understrap_child_includes = array(
	'/custom-post-types.php',   // custom post types
	'/menus.php',               // wordpress menus
	'/acf.php',               // advanced custom fields functions
	'/shortcodes.php',        // custom shortcodes
	'/accesibility.php',      // WCAG/ADA compliance stuff
	'/fatlab.php',            // fatlab favored tweaks and custom functions
	'/colors.php',            // color functions
	'/image-sizes.php',       // image sizes
	'/custom.php',          // site specific custom functions (uncomment to use / custom.php not in repo)
);

foreach ( $understrap_child_includes as $file ) {
	$function_file = get_stylesheet_directory() . '/inc' . $file;
	if (file_exists($function_file)){
		require_once $function_file;
	}
}

add_action( 'after_setup_theme', 'mytheme_theme_setup' );

if ( ! function_exists( 'mytheme_theme_setup' ) ) {
	function mytheme_theme_setup() {

		add_action( 'init', 'mytheme_buttons' );

	}
}