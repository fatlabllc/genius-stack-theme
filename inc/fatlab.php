<?php
//Move Yoast to the Bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

// remove understrap widget areas
function remove_some_widgets(){
	unregister_sidebar( 'left-sidebar');
	unregister_sidebar( 'hero');
	unregister_sidebar( 'herocanvas');
	unregister_sidebar( 'statichero' );
	unregister_sidebar( 'footerfull' );
}
add_action( 'widgets_init', 'remove_some_widgets', 11 );

// determine which font set we should use from theme options
function flws_get_fonts(){
	$fontset = get_field('flws_font_combination','option');
	if($fontset == 'fontset_1'){
		$font_call = '<link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
<style>body {font-family: "Open Sans", sans-serif;}h1,h2,h3,h4,h5,h6{font-family: "Open Sans Condensed", sans-serif;}</style>';
	} elseif($fontset == 'fontset_2'){
		$font_call = '<link href="https://fonts.googleapis.com/css?family=EB+Garamond|Oswald&display=swap" rel="stylesheet"> 
<style>body {font-family: "Oswald", sans-serif;}h1,h2,h3,h4,h5,h6{font-family: "EB Garamond", serif;}</style>';
	} elseif($fontset == 'fontset_3'){
		$font_call = '<link href="https://fonts.googleapis.com/css?family=Merriweather|Montserrat&display=swap" rel="stylesheet"> 
<style>body {font-family: "Montserratd", sans-serif;}h1,h2,h3,h4,h5,h6{font-family: "Merriweather", serif;}</style>';
	} elseif($fontset == 'fontset_4'){
		$font_call = '<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">  
<style>body {font-family: "Roboto", sans-serif;}h1,h2,h3,h4,h5,h6{font-family: "Roboto", sans-serif;}</style>';
	} elseif($fontset == 'fontset_5'){
		$font_call = '<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto+Slab&display=swap" rel="stylesheet"> 
<style>body {font-family: "Roboto Slab", serif;}h1,h2,h3,h4,h5,h6{font-family: "Raleway", sans-serif;}</style>';
	} elseif($fontset == 'fontset_6'){
		$font_call = '<link href="https://fonts.googleapis.com/css?family=Playfair+Display|Source+Sans+Pro&display=swap" rel="stylesheet">  
<style>body {font-family: "Source Sans Pro", sans-serif;}h1,h2,h3,h4,h5,h6{font-family: "Playfair Display", serif;}</style>';
	} elseif($fontset == 'fontset_7'){
		$font_call = '<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Noto+Sans&display=swap" rel="stylesheet"> 
<style>body {font-family: "Noto Sans", sans-serif;}h1,h2,h3,h4,h5,h6{font-family: "Fjalla One", sans-serif;}</style>';
	} elseif($fontset == 'fontset_8'){
		$font_call = '<link href="https://fonts.googleapis.com/css?family=PT+Sans|PT+Sans+Narrow&display=swap" rel="stylesheet">  
<style>body {font-family: "PT Sans", sans-serif;}h1,h2,h3,h4,h5,h6{font-family: "PT Sans Narrow", sans-serif;}</style>';
	}
	return $font_call;
}

// get set number of posts
function get_blogs($numtoget) {
	$args  = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $numtoget,
	);
	$blogs = new WP_Query( $args );
	return $blogs;
}

// remove post formats
add_action('after_setup_theme', 'wpse65653_remove_formats', 100);
function wpse65653_remove_formats()
{
	remove_theme_support('post-formats');
}

/* First/Last name as default display name (use for authors) */
add_action( 'profile_update', 'set_display_name', 10 );
function set_display_name( $user_id ) {
	$data = get_userdata( $user_id );
	if($data->first_name) {
		remove_action( 'profile_update', 'set_display_name', 10 ); // profile_update is called by wp_update_user, so we need to remove it before call, to avoid infinite recursion
		wp_update_user(
			array (
				'ID' => $user_id,
				'display_name' => "$data->first_name $data->last_name"
			)
		);
		add_action( 'profile_update', 'set_display_name', 10 );
	}
}