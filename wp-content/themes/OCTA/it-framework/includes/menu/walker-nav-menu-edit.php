<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

class Menu_Item_Custom_Fields_Walker extends Walker_Nav_Menu_Edit {

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$item_output = '';
                
        parent::start_el($item_output, $item, $depth, $args, $id);
        
        $fields = '';
        ob_start();
        do_action('wp_nav_menu_item_custom_fields', $item->ID, $item, $depth, $args);
        $fields .= ob_get_clean();
         
        if ($fields) {
            $item_output = preg_replace('/(?=<div[^>]+class="[^"]*submitbox)/', $fields, $item_output);
        }
        
        $output .= $item_output;
	}
    
}
