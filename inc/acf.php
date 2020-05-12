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
	return 150;
});

// add custom super simple tinymce toolbar for use with genius stack
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars )
{
	$toolbars['Genius Stack Simple' ] = array();
	$toolbars['Genius Stack Simple' ][1] = array('formatselect','bold' , 'italic' , 'underline' , 'forecolor', 'alignleft', 'aligncenter', 'alignright', 'buttonshrtcd');
	return $toolbars;
}

// speed up editro load times by removing the wp_meta_box
add_filter('acf/settings/remove_wp_meta_box', '__return_true');

/********* TinyMCE Buttons ***********/
if ( ! function_exists( 'mytheme_buttons' ) ) {
	function mytheme_buttons() {
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}

		if ( get_user_option( 'rich_editing' ) !== 'true' ) {
			return;
		}

		add_filter( 'mce_external_plugins', 'mytheme_add_buttons' );
		add_filter( 'mce_buttons', 'mytheme_register_buttons' );
	}
}

if ( ! function_exists( 'mytheme_add_buttons' ) ) {
	function mytheme_add_buttons( $plugin_array ) {
		$plugin_array['buttonshrtcd'] = get_stylesheet_directory_uri().'/js/tinymce_buttons.js';
		return $plugin_array;
	}
}

if ( ! function_exists( 'mytheme_register_buttons' ) ) {
	function mytheme_register_buttons( $buttons ) {
		array_push( $buttons, 'buttonshrtcd' );
		return $buttons;
	}
}

add_action ( 'after_wp_tiny_mce', 'mytheme_tinymce_extra_vars' );

if ( !function_exists( 'mytheme_tinymce_extra_vars' ) ) {
	function mytheme_tinymce_extra_vars() { ?>
		<script type="text/javascript">
            var tinyMCE_object = <?php echo json_encode(
					array(
						'button_name' => esc_html__('Button', 'geniusstack'),
						'button_title' => esc_html__('Add Styled Button', 'geniusstack')
					)
				);
				?>;
		</script><?php
	}
}