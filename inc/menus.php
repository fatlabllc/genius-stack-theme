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