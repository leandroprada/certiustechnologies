<?php

if (!defined('ABSPATH')) die('-1');

class OCTA_Portfolio_ShortCode {
    
    function __construct() {
        add_action( 'vc_after_init', array( $this, 'it_vc_shortcodes' ) );
        include_once plugin_dir_path( __FILE__ ) . "vc_portfolio.php";
    }
    
    public function it_vc_shortcodes(){
        vc_lean_map( PLUGIN_PFX , null, plugin_dir_path( __FILE__ ). 'shortcode-portfolio.php' );
        
        if ( ! function_exists( 'it_dropdown_grids' ) ) {
            function it_dropdown_grids() {
                global $wpdb;
                $dbObj = new OCTA_Tables();
                
                $tbl = $dbObj->oc_select();
                $arr = array();
                
                foreach ($tbl[0] as $sel) {
                    $arr[$sel->title] = $sel->alias;
                }
                $smenu = array(__('-- Select Grid --',PLUGIN_SLUG) => '');                
                return $smenu + $arr;
            }
        }
    }
    
}

new OCTA_Portfolio_ShortCode();