<?php
// custom menus
function wpb_custom_new_menu() {
	register_nav_menu('primary',__( 'Primary' ));
	register_nav_menu('footer-menu-1',__( 'Footer Menu 1' ));
	register_nav_menu('footer-menu-2',__( 'Footer Menu 2' ));
	//register_nav_menu('footer-menu-3',__( 'Footer Menu 3' ));
	//register_nav_menu('custom-menu',__( 'Custom Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

// add editor the privilege to edit theme
$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );

if (current_user_can('editor')) {
	add_action( 'admin_menu', function () {
	global $submenu;
	if ( isset( $submenu[ 'themes.php' ] ) ) {
	    foreach ( $submenu[ 'themes.php' ] as $index => $menu_item ) {
	        foreach ($menu_item as $value) {
	            if (strpos($value,'customize') !== false) {
	                unset( $submenu[ 'themes.php' ][ $index ] );
	            }
	        }
	    }
	}
	remove_submenu_page( 'themes.php', 'themes.php' );  
	remove_submenu_page( 'themes.php', 'widgets.php' );
	});
}