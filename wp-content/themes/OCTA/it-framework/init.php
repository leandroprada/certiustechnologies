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

if ( ! defined( 'WPINC' ) ) { die; }

class OCTA_Init_Class { 

    public function __construct() {
        
        $this-> define_constants();
        $this->include_files();        
        
    }
    
    public function define_constants(){
        
        define( 'THEME_NAME', 'OCTA' );
        define( 'THEME_SLUG', 'octa' );
        define( 'THEME_PFX', 'octa_' );
        
        
        define( 'THEME_DIR',                    get_template_directory() );
        define( 'THEME_URI',                    get_template_directory_uri() );
        define( 'FRAMEWORK_DIR',                THEME_DIR . '/it-framework' );
        define( 'FRAMEWORK_URI',                THEME_URI . '/it-framework' );
        define( 'FRAMEWORK_ASSETS_DIR',         FRAMEWORK_DIR . '/assets' );
        define( 'FRAMEWORK_ASSETS_URI',         FRAMEWORK_URI . '/assets' );
        define( 'FRAMEWORK_CONFIG_DIR',         FRAMEWORK_DIR . '/includes/config' );
        define( 'FRAMEWORK_CONFIG_URI',         FRAMEWORK_URI . '/includes/config' );
        define( 'FRAMEWORK_PLUGIN_DIR',         FRAMEWORK_DIR . '/plugins' );
        define( 'FRAMEWORK_PLUGIN_URI',         FRAMEWORK_URI . '/plugins' );
        define( 'FRAMEWORK_INCLUDES_DIR',       FRAMEWORK_DIR . '/includes' );
        define( 'FRAMEWORK_INCLUDES_URI',       FRAMEWORK_URI . '/includes' );
        
    }
    
    public function include_files(){
        
        locate_template ('it-framework/includes/it-framework.php',                          true );
        locate_template ('it-framework/includes/it-enqueue-files.php',                      true );
        locate_template ('it-framework/includes/it-custom-css.php',                         true );
        locate_template ('it-framework/includes/it-nav-menu.php',                           true );
        locate_template ('it-framework/includes/it-breadcrumbs.php',                        true );
        locate_template ('it-framework/includes/it-sidebars.php',                           true );
        locate_template ('it-framework/includes/it-comments.php',                           true );        
        locate_template ('it-framework/includes/it-global-functions.php',                   true );
        locate_template ('it-framework/includes/menu/it-menu.php',                          true );
        locate_template ('it-framework/includes/it-post-formats.php',                       true );
        locate_template ('it-framework/config/it-metaboxes-config.php',                     true );
        locate_template ('it-framework/plugins/tgm-plugin-activation/tgm-plugins.php',      true );
        locate_template ('it-framework/plugins/importer/importer.php',                      true );
        locate_template ('it-framework/widgets/it-widgets.php',                             true );
        
        if(class_exists('Woocommerce')) {
            locate_template ('it-framework/plugins/woocommerce/it-woocommerce.php',         true );
        }
        if(class_exists('bbPress')) {
            locate_template ('it-framework/plugins/bbpress/bbpress.php',                    true );
        }
        if(!class_exists('OCTA_Core')) {
            locate_template ('it-framework/includes/it-post-like.php',                      true );
        }
            
    }
    
    
}
new OCTA_Init_Class();
