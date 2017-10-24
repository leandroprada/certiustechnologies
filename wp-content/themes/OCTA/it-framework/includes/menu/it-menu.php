<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

class Menu_Item_Custom_Fields {

	public static function load() {
		add_filter( 'wp_edit_nav_menu_walker', array( __CLASS__, '_filter_walker' ), 99 );
	}

	public static function _filter_walker( $walker ) {
		$walker = 'Menu_Item_Custom_Fields_Walker';
		if ( ! class_exists( $walker ) ) {
			require_once dirname( __FILE__ ) . '/walker-nav-menu-edit.php';
		}

		return $walker;
	}
    
}
add_action( 'wp_loaded', array( 'Menu_Item_Custom_Fields', 'load' ), 9 );

include_once( get_parent_theme_file_path('it-framework/includes/menu/menu-custom-fields.php') );
include_once( get_parent_theme_file_path('it-framework/includes/menu/it-front-end.php') );
