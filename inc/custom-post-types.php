<?php
// Add testimonial custom post type
add_action('init', 'register_cpt_testimonial');
function register_cpt_testimonial() {
	$labels = array(
		'name' => _x( 'testimonial', 'testimonial' ),
		'singular_name' => _x( 'testimonial', 'testimonial' ),
		'add_new' => _x( 'Add New', 'testimonial' ),
		'add_new_item' => _x( 'Add New testimonial', 'testimonial' ),
		'edit_item' => _x( 'Edit testimonial', 'testimonial' ),
		'new_item' => _x( 'New testimonial', 'testimonial' ),
		'view_item' => _x( 'View testimonial', 'testimonial' ),
		'search_items' => _x( 'Search testimonials', 'testimonial' ),
		'not_found' => _x( 'No testimonials found', 'testimonial' ),
		'not_found_in_trash' => _x( 'No testimonials found in Trash', 'testimonial' ),
		'parent_item_colon' => _x( 'Parent testimonial:', 'testimonial' ),
		'menu_name' => _x( 'Testimonials', 'testimonial' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => false,

		'supports' => array( 'title', 'editor', 'revisions' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 9,
		'menu_icon' => 'dashicons-smiley',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'testimonial', $args );
}