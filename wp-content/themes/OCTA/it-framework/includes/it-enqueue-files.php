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
 
add_action( 'wp_enqueue_scripts', 'it_enqueue_styles',50 );
add_action( 'wp_enqueue_scripts', 'it_enqueue_scripts' );

function it_enqueue_styles(){

    $variants = ':100,200,300,400,500,600,700,900';
    $bbp = $buddy = '';
    if(function_exists('is_bbpress') && is_bbpress()) $bbp = 'is_bbpress';
    if(function_exists('is_buddypress') && is_buddypress()) $buddy = 'is_buddypress';
    
    $body_font      = str_replace( ' ', '+',theme_option('body_font') ).$variants;
    $menu_font      = str_replace( ' ', '+',theme_option('menu_font') ).$variants;
    $headings_font  = str_replace( ' ', '+',theme_option('headings_font') ).$variants;
    $logo_font      = str_replace( ' ', '+',theme_option('logo_font') ).$variants;
    $slogan_font    = str_replace( ' ', '+',theme_option('slogan_font') ).$variants;
    $title_font     = str_replace( ' ', '+',theme_option('title_font') ).$variants;
    
    $url_handle     = 'octa-fonts';
    $font_families  = array($body_font,$menu_font,$headings_font,$logo_font,$slogan_font,$title_font);
    $font_families  = array_unique($font_families);
    
    if ( ! empty( $font_families ) ){    
        $query_args = array(
            'family' => implode( '%7C', $font_families ),
            'subset' => 'latin,latin-ext',
        );
                
        $request_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );    
        wp_deregister_style( $url_handle );
        wp_register_style( $url_handle, $request_url, array(),null );
        wp_enqueue_style( $url_handle );
        
    }
    wp_enqueue_style( 'octa-assets', THEME_URI . '/assets/css/assets.css' );
    if( $bbp ){
        wp_enqueue_style( 'octa-bbpress', THEME_URI . '/assets/css/plugins/bbpress.css' );
    }
    if( $buddy ) {
        wp_enqueue_style( 'octa-buddypress', THEME_URI . '/assets/css/plugins/buddypress.css' );
    }
    if( function_exists('is_woocommerce') ){
        wp_enqueue_style( 'octa-woo', THEME_URI . '/assets/css/plugins/woo.css' );
    }
    wp_enqueue_style( 'octa-style', THEME_URI . '/assets/css/style.css' );
    if(theme_option("skin_css") == 'dark'){
        wp_enqueue_style( 'octa-theme', THEME_URI . '/assets/css/dark.css' );    
    }
    
    wp_add_inline_style( 'octa-style', it_custom_css() );
    
}
 
function it_enqueue_scripts() {
    $bbp = $buddy = '';
    if(function_exists('is_bbpress') && is_bbpress()) $bbp = 'is_bbpress';
    if(function_exists('is_buddypress') && is_buddypress()) $buddy = 'is_buddypress';
    if  ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( false !== strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) ) && ( false === strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 9' ) ) ) {
        wp_register_script( 'octa-html5', THEME_URI . '/assets/js/html5.js', 'html5' );
        wp_enqueue_script( 'html5');
    }
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) == "1" ){
        wp_enqueue_script( 'comment-reply' );
    }
    if ( is_singular() && class_exists( 'OCTA_Core' ) ) {
        wp_enqueue_script( 'octa-easyshare', THEME_URI . '/assets/js/easyshare.js', array('jquery'), '1.0.0', true);
    }
    wp_enqueue_script( 'octa-assets', THEME_URI . '/assets/js/assets.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'octa-script', THEME_URI . '/assets/js/script.js', array('jquery'), '1.0.0', true );
    
    if( function_exists('is_buddypress') && is_buddypress() ) {
        wp_enqueue_script( 'octa-buddyjs', THEME_URI . '/assets/js/plugins/buddypress.js' );
    }
      
}
