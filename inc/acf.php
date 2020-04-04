<?php
// ACF Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/**
 * Loads a custom template based on get_row_layout() for the flexible content field.
 *
 * @param string $subdir
 * @param null $vars
 */
function load_fcf_template($subdir = '', $vars = null) {

	// Allow passing a template for loading
	if (preg_match('#\.php$#', $subdir)) {
		$template = $subdir;
		$subdir = '';
	}
	else {
		$template = get_row_layout() . '.php';
	}

	// Append a slash to any subdirectory passed.
	if ($subdir) {
		$subdir .= '/';
	}

	// Load the FCF template
	$layout = get_row_layout();
	$theme_directory = get_stylesheet_directory();
	$template_location = $theme_directory . '/template-parts/flexible-content/' . $subdir . $template;
	if (file_exists($template_location)) {
		// Pass in variables to the template by extracting them.
		if ($vars) {
			extract($vars);
		}
		include($template_location);
	}
	else {
		echo "<h1>Could not find $template_location</h1>";
		//TODO: Log missing template. Or scream.
	}
}

// make wysiwyg editor small to make edit screen more visually manageable 
add_filter('acf-autosize/wysiwyg/min-height', function() {
	return 100;
});

// add custom super simple tinymce toolbar for use with genius stack
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars )
{
	$toolbars['Genius Stack Simple' ] = array();
	$toolbars['Genius Stack Simple' ][1] = array('bold' , 'italic' , 'underline' , 'forecolor');
	return $toolbars;
}