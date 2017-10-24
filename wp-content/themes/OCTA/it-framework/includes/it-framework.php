<?php
/**
 *
 * IT-RAYS Framework
 *
 * @author IT-RAYS
 * @license Commercial License
 * @link http://www.it-rays.com
 * @copyright 2014 IT-RAYS Themes
 * @package ITFramework
 * @version 1.0.0
 *
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;

function itframework_init() {

    //  If user can't edit theme options, exit
    if ( !current_user_can( 'edit_theme_options' ) )
        return;

    // Loads the required Options Framework classes.
    require_once(  get_parent_theme_file_path('it-framework/classes/it-framework.class.php') );
    require_once(  get_parent_theme_file_path('it-framework/classes/it-options-sanitization.php') );
    
}
add_action( 'init', 'itframework_init', 20 );

if ( ! function_exists( 'theme_option' ) ){
    function theme_option( $option ) {
        $options = get_option( 'theme_options' );
        if ( isset( $options[$option] ) )
            return $options[$option];
        else
            return false;
    }
}
