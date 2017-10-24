<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

class it_import extends WP_Import {
  
    // get ID by slug
    function get_ID_by_slug($page_slug) {
        $page = get_page_by_path($page_slug);
        if ($page) {
            return $page->ID;
        } else {
            return null;
        }
    }
    
    function check(){
        
        /* setting menu
        -------------------- */
        
        $main_menu          = get_term_by('name', __( 'Main Menu', 'octa' ), 'nav_menu');
        $top_menu           = get_term_by('name', __( 'Top Bar Menu', 'octa' ), 'nav_menu');
        $one_page           = get_term_by('name', __( 'One Page Menu', 'octa' ), 'nav_menu');
        $footer_menu        = get_term_by('name', __( 'Footer Links', 'octa' ), 'nav_menu');
        
        $mega_menu          = get_term_by('name', __( 'Mega Menu', 'octa' ), 'nav_menu');
        $fashion_menu       = get_term_by('name', __( 'Fashion Menu', 'octa' ), 'nav_menu');
        $medical_menu       = get_term_by('name', __( 'Medical Menu', 'octa' ), 'nav_menu');
        $restaurant_menu    = get_term_by('name', __( 'Restaurant Menu', 'octa' ), 'nav_menu');
        $wedding_menu       = get_term_by('name', __( 'Wedding Menu', 'octa' ), 'nav_menu');
        $not_found          = get_term_by('name', __( '404 Not Found Menu', 'octa' ), 'nav_menu');
        
        $locations = array(
            'main-menu'             => $main_menu->term_id,
            'top-bar-menu'          => $top_menu->term_id,
            'one-page'              => $one_page->term_id,
            'foot-links'            => $footer_menu->term_id,
            
            'location-Mega Menu'             => $mega_menu->term_id,
            'location-Fashion Menu'          => $fashion_menu->term_id,
            'location-Medical Menu'          => $medical_menu->term_id,
            'location-Restaurant Menu'       => $restaurant_menu->term_id,
            'location-Wedding Menu'          => $wedding_menu->term_id,
            'location-404 Not Found Menu'    => $not_found->term_id
        );  
        
        set_theme_mod( 'nav_menu_locations', $locations );

        /* setting custom menu fields
        -------------------------------- */
        $menu_items = wp_get_nav_menu_items('main-menu');

        if ( ! empty( $menu_items ) ) {
          if ( ! empty( $menu_fields ) ) {
            foreach ( $menu_items as $menu_key => $menu_item ) {
              foreach ( $menu_fields as $field_key => $field_data ) {
                if ( $field_key == $menu_item->title ) {
                  foreach ( $field_data as $key => $value ) {
                    update_post_meta( $menu_item->ID, '_menu_item_' . $key, $value );
                  }
                }
              }
            }
          }
        }

        /* setting home-page
        ---------------------- */
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', get_ID_by_slug( 'home' ) );
        update_option( 'page_for_posts', get_ID_by_slug( 'blog' ) );      
    }  
}
