<?php
// short code to display social media icons
function social_media() {
	// lets get all the social media links
	$twitter = get_field('flws_twitter_url','option');
	$facebook = get_field('flws_facebook_url','option');
	$youtube = get_field('flws_youtube_url','option');
	$linkedin = get_field('flws_linkin_url','option');
	$instagram = get_field('flws_instagram_url','option');

	$icon_display = '';
	if($twitter){
		$icon_display .= '<li><a href="'.$twitter.'" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>';
	}
	if($facebook){
		$icon_display .= '<li><a href="'.$facebook.'" target="_blank"><i class="fab fa-facebook-square" aria-hidden="true"></i></a></li>';
	}
	if($youtube){
		$icon_display .= '<li><a href="'.$youtube.'" target="_blank"><i class="fab fa-youtube-square"></i></i></a></li>';
	}
	if($linkedin){
		$icon_display .= '<li><a href="'.$linkedin.'" target="_blank"><i class="fab fa-linkedin"></i></i></a></li>';
	}
	if($instagram){
		$icon_display .= '<li><a href="'.$instagram.'" target="_blank"><i class="fab fa-instagram-square"></i></i></a></li>';
	}
	$social_media = '<div class="social-media shortcode"><ul>'.$icon_display.'</ul></div>';
	return $social_media;
}
add_shortcode( 'social_media', 'social_media' );

// shortcode to display font-awesome icons
function icon( $atts ){
	extract( shortcode_atts( array(
		'icon' => 'fa-users',
		'size' => '20'
	), $atts ) );

	$font_snippet = '<span style="font-size:'.$size.'px"><i class="fa '.$icon.' aria-hidden="true"></i></span>';
	return $font_snippet;
}
add_shortcode('icon', 'icon');

//shortcode to display a custom WP menu
function print_menu_shortcode($atts, $content = null) {
	extract(shortcode_atts(array( 'name' => null, ), $atts));
	return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
}
add_shortcode('menu', 'print_menu_shortcode');

// shortcode to display styled buttons
function button( $atts ){
	extract( shortcode_atts( array(
		'text' => 'Click Here',
		'url' => '/',
		'target' => '_self'
	), $atts ) );

	$button_snippet = '<div class="button-container"><a href="'.$url.'" target="'.$target.'" class="button">'.$text.'</a></div>';
	return $button_snippet;
}
add_shortcode('button', 'button');