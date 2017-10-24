<?php

/*
  Plugin Name: OCTA Portfolio
  Plugin URI: http://www.it-rays.org/octa
  Description: Premium WordPress Plugin for showing Grids with Custom Styles.
  Version: 1.0.0
  Author: IT-RAYS
  Author URI: http://www.it-rays.net/
  License: GPLv2
 */

// if called directly, abort.
if (!defined('WPINC')) {
    die;
}

class boo_globals {
    
    public $plugin_name = 'OCTA Portfolio';
    
    public $plugin_slug = 'octa';
    
    public $plugin_prefix = 'octa_portfolio';
    
    public $plugin_table = 'octa_portfolio_setting';
    
    public $plugin_version = '1.0.0';

    public function __construct() {
        
        $this->constants();
        $this->include_files();
        $this->init();
        
    }
    
    public function init () {
        
        add_action( 'plugins_loaded', array( &$this, 'localize_plugin' ) );
        register_activation_hook( __FILE__, array('OCTA_Tables', 'oc_AddSQL') );
        register_uninstall_hook( __FILE__, array('OCTA_Base', 'pluginUninstall') );
        
    }
    
    public function constants () {
        
        global $table_prefix;
        $boo_settings_tbl = $table_prefix . $this->plugin_table;
        
        defined('PLUGIN_DIR') or define('PLUGIN_DIR', plugin_dir_path(__FILE__));
        defined('PLUGIN_URI') or define('PLUGIN_URI', plugin_dir_url(__FILE__));
        
        define( 'PLUGIN_NAME',   $this->plugin_name );
        define( 'PLUGIN_SLUG',   $this->plugin_slug );
        define( 'PLUGIN_PFX',    $this->plugin_prefix );
        define( 'PLUGIN_TBL',    $boo_settings_tbl );  
          
    }
    
    public function include_files () {
        
        require_once(PLUGIN_DIR . '/inc/config.php');
        require_once(PLUGIN_DIR . '/inc/class-db.php');
        require_once(PLUGIN_DIR . '/inc/class-base.php');
        require_once(PLUGIN_DIR . '/inc/display-field.php');
        require_once(PLUGIN_DIR . '/inc/global-functions.php');
        require_once(PLUGIN_DIR . '/inc/shortcode.php');
        require_once(PLUGIN_DIR . '/inc/vc/portfolio.php');
            
    }
    
    public function localize_plugin () {
        
        load_plugin_textdomain(
            PLUGIN_SLUG,
            false,
            PLUGIN_DIR . '/lang'
        );
               
    }

}
new boo_globals();
