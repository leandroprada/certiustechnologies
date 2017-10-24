<?php
/**
 *
 * IT-RAYS Framework
 *
 * @author IT-RAYS
 * @license Commercial License
 * @link http://www.it-rays.net
 * @copyright 2016 IT-RAYS Themes
 * @package ITFramework
 * @version 1.0.0
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' ); 
 
// Add menus to the site
function it_menus() {
    
    register_nav_menus(
        array(
            'main-menu'     => __( 'Main Menu', 'octa' ),
            'top-bar-menu'  => __( 'Top Bar Menu', 'octa' ),
            'one-page'      => __( 'One Page Menu', 'octa' ),
            'foot-links'    => __( 'Footer Links', 'octa' ),
        )
    );
    
    // Dynamic menu locations...
    $locs = theme_option('locations');
    for ( $i = 1; $i <= $locs ; $i++ ) {  
        $locname = theme_option('location_'.$i);
        register_nav_menus(
            array(
                'location-'.$locname => $locname
            )
        );
    }
      
}
add_action( 'init', 'it_menus' );

