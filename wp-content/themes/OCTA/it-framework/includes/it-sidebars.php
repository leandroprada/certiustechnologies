<?php
/**
 *
 * IT-RAYS Framework
 *
 * @author IT-RAYS
 * @license Commercial License
 * @link http://www.it-rays.net
 * @copyright 2017 IT-RAYS Themes
 * @package ITFramework
 * @version 1.0.0
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
 
if ( ! function_exists('it_sidebars') ){
    function it_sidebars(){
        
        $foot_top_cols = theme_option('foot_top_widg_cols');
        $foot_mid_cols = theme_option('foot_mid_widg_cols');
        $foot_bot_cols = theme_option('foot_bot_widg_cols');
        
        register_sidebar(array(
            'name' => 'Primary SideBar',
            'id' => 'sidebar-1',
            'before_widget' => '<div class="widget %2$s">',
            'after_widget' => '</div>',
        ));
        
        register_sidebar(array(
            'name' => 'Secondary SideBar',
            'id' => 'sidebar-2',
            'before_widget' => '<div class="widget %2$s">',
            'after_widget' => '</div>',
        ));
        
        /****************** Footer Widgets *************************/
        register_sidebar( array(
            'name' => 'Middle Footer Widgets',
            'id' => 'midle-footer-widgets',
            'before_widget' => '<div class="widget %2$s col-md-'.$foot_mid_cols.'">',
            'after_widget' => '</div>',
            'description' => 'Appears in the middle footer area',
        ));
        
        register_sidebar( array(
            'name' => 'Footer Bottom Widgets',
            'id' => 'footer-bottom-widgets',
            'before_widget' => '<div class="widget %2$s col-md-'.$foot_bot_cols.'">',
            'after_widget' => '</div>',
            'description' => 'Appears in the footer bottom bar',
        ));        
        
        /****************** Custom side bar *************************/
        
        $sbs = theme_option('sidebars');
        for ( $i = 1; $i <= $sbs ; $i++ ) { 
            $sidb = theme_option('sidebar_'.$i);
            register_sidebar(array(
                'name' => $sidb,
                'id' => 'side-'.$i,
                'before_widget' => '<div class="widget %2$s">',
                'after_widget' => '</div>',
            ));
        }
    }
}
add_action( 'widgets_init', 'it_sidebars',11 );

function it_sidebar(){
    get_sidebar();
}
