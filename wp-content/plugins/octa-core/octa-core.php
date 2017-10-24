<?php
/*
Plugin Name: OCTA Core
Plugin URI: http://www.it-rays.net/
Description: OCTA Core plugin for OCTA theme.
Author: IT-RAYS
Version: 1.0.0
Author URI: http://www.it-rays.net/
*/

if (!defined('ABSPATH')) die('-1');

defined('OC_PLUGIN_DIR') or define('OC_PLUGIN_DIR', plugin_dir_path(__FILE__));
defined('OC_PLUGIN_URI') or define('OC_PLUGIN_URI', plugin_dir_url(__FILE__));

class OCTA_Core {
  
    public function __construct() {
        
        add_action( 'vc_after_init', array( &$this, 'OCTA_core_func' ) );
        add_action( 'admin_enqueue_scripts', array(&$this, 'octa_admin_scripts') );        
        add_action( 'wp_enqueue_scripts', array(&$this, 'octa_front_scripts') );
        add_action( 'vc_backend_editor_enqueue_js_css', array(&$this, 'octa_core_js') );
        include_once plugin_dir_path( __FILE__ ) . "shortcodes/it_gallery.php";
                  
    }

    public function octa_admin_scripts(){
        wp_enqueue_style('octa-admin', OC_PLUGIN_URI . 'assets/admin/css/style.css');
    }
    
    public function octa_core_js(){
        wp_enqueue_script('octa-admin', OC_PLUGIN_URI . 'assets/admin/js/script.js', array('jquery'), null, true);
    }
    
    public function octa_front_scripts(){
        
        wp_enqueue_style ( 'octa-shortcodes-assets', OC_PLUGIN_URI . 'assets/front/css/assets.css' );
        wp_enqueue_style ( 'octa-shortcodes', OC_PLUGIN_URI . 'assets/front/css/style.css', array( 'js_composer_front' ) );
        wp_enqueue_script ( 'octa-shortcodes-assets', OC_PLUGIN_URI . 'assets/front/js/assets.js', array('jquery') );
        wp_enqueue_script ( 'octa-shortcodes', OC_PLUGIN_URI . 'assets/front/js/script.js', array('jquery') );
        
    }
        
  	public function OCTA_core_func(){
        
        $config_path = OC_PLUGIN_DIR . '/config'; 
        
        vc_lean_map( 'it_heading', null, $config_path . '/shortcode-heading.php' );
        vc_lean_map( 'it_panel', null, $config_path . '/shortcode-panel.php' );
        vc_lean_map( 'it_icon', null, $config_path . '/shortcode-icon.php' );
        vc_lean_map( 'it_iconbox', null, $config_path . '/shortcode-icon-boxes.php' );
        vc_lean_map( 'it_list', null, $config_path . '/shortcode-list.php' );
        vc_lean_map( 'it_list_item', null, $config_path . '/shortcode-list-item.php' );
        vc_lean_map( 'it_feature', null, $config_path . '/shortcode-features.php' );
        vc_lean_map( 'it_counter', null, $config_path . '/shortcode-counter.php' );
        vc_lean_map( 'it_countdown', null, $config_path . '/shortcode-countdown-timer.php' );
        vc_lean_map( 'it_testimonials', null, $config_path . '/shortcode-testimonials.php' );
        vc_lean_map( 'it_clients', null, $config_path . '/shortcode-clients.php' );
        vc_lean_map( 'it_client', null, $config_path . '/shortcode-client.php' );   
        vc_lean_map( 'it_testimonial', null, $config_path . '/shortcode-testimonial.php' );
        vc_lean_map( 'it_divider', null, $config_path . '/shortcode-dividers.php' );
        vc_lean_map( 'it_member', null, $config_path . '/shortcode-member.php' );
        vc_lean_map( 'it_carousel', null, $config_path . '/shortcode-carousel.php' );
        vc_lean_map( 'it_twitter', null, $config_path . '/shortcode-twitter.php' );
        vc_lean_map( 'it_facebook', null, $config_path . '/shortcode-facebook.php' );
        vc_lean_map( 'it_gmap', null, $config_path . '/shortcode-gmap.php' );
        vc_lean_map( 'it_camera_slideshow', null, $config_path . '/shortcode-camera-slideshow.php' );
        vc_lean_map( 'it_camera_slide', null, $config_path . '/shortcode-camera-slide.php' );
        vc_lean_map( 'it_steps', null, $config_path . '/shortcode-steps.php' );
        vc_lean_map( 'it_step', null, $config_path . '/shortcode-step.php' );
        vc_lean_map( 'it_thumbs_gallery', null, $config_path . '/shortcode-thumbs.php' );
        vc_lean_map( 'it_thumb', null, $config_path . '/shortcode-thumb.php' );
        vc_lean_map( 'it_modal', null, $config_path . '/shortcode-modal.php' );
        vc_lean_map( 'it_swiper_slider', null, $config_path . '/shortcode-swiper-slider.php' );
        vc_lean_map( 'it_swiper_slider_inner', null, $config_path . '/shortcode-swiper-slider-inner.php' );
        vc_lean_map( 'it_posts_slider', null, $config_path . '/shortcode-posts-slider.php' );
        vc_lean_map( 'it_swiper_slide', null, $config_path . '/shortcode-swiper-slide.php' );
        vc_lean_map( 'it_breaking_news', null, $config_path . '/shortcode-breaking-news.php' );
        vc_lean_map( 'it_blog', null, $config_path . '/shortcode-blog.php' );   
        vc_lean_map( 'it_recent_posts', null, $config_path . '/shortcode-recent-posts.php' );
        vc_lean_map( 'it_posts_category', null, $config_path . '/shortcode-posts-category.php' );
        vc_lean_map( 'it_popular_posts', null, $config_path . '/shortcode-popular-posts.php' );
        vc_lean_map( 'it_new_in_pictures', null, $config_path . '/shortcode-news-in-pictures.php' );  
                
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }
        
        if ( !is_admin() ){
            foreach ( glob( plugin_dir_path( __FILE__ ) . "shortcodes/vc_*.php" ) as $file ) {
                include_once $file;
            }
        }
                
        include_once( OC_PLUGIN_DIR . '/inc/extends.php' );
        include_once( OC_PLUGIN_DIR . '/inc/icons.php' );
        include_once( OC_PLUGIN_DIR . '/inc/helpers.php' );
        include_once( OC_PLUGIN_DIR . '/inc/it-post-like.php' );
                
        if ( ! function_exists( 'it_animation' ) ) {
            function it_animation(){
                return array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'CSS Animation', 'js_composer' ),
                    'param_name' => 'it_animation', 
                    'admin_label' => true,
                    "base" => "css_animation",
                    "as_parent" => array('except' => 'css_animation'),
                    "content_element" => true,
                    "icon" => "css_animation",
                    'value' => array(
                        esc_html__( 'None', 'js_composer' ) => '',
                        
                        esc_html__( 'bounce', 'js_composer' ) => 'bounce',
                        esc_html__( 'flash', 'js_composer' ) => 'flash',
                        esc_html__( 'pulse', 'js_composer' ) => 'pulse',
                        esc_html__( 'rubberBand', 'js_composer' ) => 'rubberBand',
                        esc_html__( 'shake', 'js_composer' ) => 'shake',
                        esc_html__( 'swing', 'js_composer' ) => 'swing',
                        esc_html__( 'tada', 'js_composer' ) => 'tada',
                        esc_html__( 'wobble', 'js_composer' ) => 'wobble',
                        esc_html__( 'jello', 'js_composer' ) => 'jello',

                        esc_html__( 'bounceIn', 'js_composer' ) => 'bounceIn',
                        esc_html__( 'bounceInDown', 'js_composer' ) => 'bounceInDown',
                        esc_html__( 'bounceInLeft', 'js_composer' ) => 'bounceInLeft',
                        esc_html__( 'bounceInRight', 'js_composer' ) => 'bounceInRight',
                        esc_html__( 'bounceInUp', 'js_composer' ) => 'bounceInUp',

                        esc_html__( 'bounceOut', 'js_composer' ) => 'bounceOut',
                        esc_html__( 'bounceOutDown', 'js_composer' ) => 'bounceOutDown',
                        esc_html__( 'bounceOutLeft', 'js_composer' ) => 'bounceOutLeft',
                        esc_html__( 'bounceOutRight', 'js_composer' ) => 'bounceOutRight',
                        esc_html__( 'bounceOutUp', 'js_composer' ) => 'bounceOutUp',

                        esc_html__( 'fadeIn', 'js_composer' ) => 'fadeIn',
                        esc_html__( 'fadeInDown', 'js_composer' ) => 'fadeInDown',
                        esc_html__( 'fadeInDownBig', 'js_composer' ) => 'fadeInDownBig',
                        esc_html__( 'fadeInLeft', 'js_composer' ) => 'fadeInLeft',
                        esc_html__( 'fadeInLeftBig', 'js_composer' ) => 'fadeInLeftBig',
                        esc_html__( 'fadeInRight', 'js_composer' ) => 'fadeInRight',
                        esc_html__( 'fadeInRightBig', 'js_composer' ) => 'fadeInRightBig',
                        esc_html__( 'fadeInUp', 'js_composer' ) => 'fadeInUp',
                        esc_html__( 'fadeInUpBig', 'js_composer' ) => 'fadeInUpBig',

                        esc_html__( 'fadeOut', 'js_composer' ) => 'fadeOut',
                        esc_html__( 'fadeOutDown', 'js_composer' ) => 'fadeOutDown',
                        esc_html__( 'fadeOutDownBig', 'js_composer' ) => 'fadeOutDownBig',
                        esc_html__( 'fadeOutLeft', 'js_composer' ) => 'fadeOutLeft',
                        esc_html__( 'fadeOutLeftBig', 'js_composer' ) => 'fadeOutLeftBig',
                        esc_html__( 'fadeOutRight', 'js_composer' ) => 'fadeOutRight',
                        esc_html__( 'fadeOutRightBig', 'js_composer' ) => 'fadeOutRightBig',
                        esc_html__( 'fadeOutUp', 'js_composer' ) => 'fadeOutUp',
                        esc_html__( 'fadeOutUpBig', 'js_composer' ) => 'fadeOutUpBig',

                        esc_html__( 'flip', 'js_composer' ) => 'flip',
                        esc_html__( 'flipInX', 'js_composer' ) => 'flipInX',
                        esc_html__( 'flipInY', 'js_composer' ) => 'flipInY',
                        esc_html__( 'flipOutX', 'js_composer' ) => 'flipOutX',
                        esc_html__( 'flipOutY', 'js_composer' ) => 'flipOutY',

                        esc_html__( 'lightSpeedIn', 'js_composer' ) => 'lightSpeedIn',
                        esc_html__( 'lightSpeedOut', 'js_composer' ) => 'lightSpeedOut',

                        esc_html__( 'rotateIn', 'js_composer' ) => 'rotateIn',
                        esc_html__( 'rotateInDownLeft', 'js_composer' ) => 'rotateInDownLeft',
                        esc_html__( 'rotateInDownRight', 'js_composer' ) => 'rotateInDownRight',
                        esc_html__( 'rotateInUpLeft', 'js_composer' ) => 'rotateInUpLeft',
                        esc_html__( 'rotateInUpRight', 'js_composer' ) => 'rotateInUpRight',

                        esc_html__( 'rotateOut', 'js_composer' ) => 'rotateOut',
                        esc_html__( 'rotateOutDownLeft', 'js_composer' ) => 'rotateOutDownLeft',
                        esc_html__( 'rotateOutDownRight', 'js_composer' ) => 'rotateOutDownRight',
                        esc_html__( 'rotateOutUpLeft', 'js_composer' ) => 'rotateOutUpLeft',
                        esc_html__( 'rotateOutUpRight', 'js_composer' ) => 'rotateOutUpRight',

                        esc_html__( 'slideInUp', 'js_composer' ) => 'slideInUp',
                        esc_html__( 'slideInDown', 'js_composer' ) => 'slideInDown',
                        esc_html__( 'slideInLeft', 'js_composer' ) => 'slideInLeft',
                        esc_html__( 'slideInRight', 'js_composer' ) => 'slideInRight',

                        esc_html__( 'slideOutUp', 'js_composer' ) => 'slideOutUp',
                        esc_html__( 'slideOutDown', 'js_composer' ) => 'slideOutDown',
                        esc_html__( 'slideOutLeft', 'js_composer' ) => 'slideOutLeft',
                        esc_html__( 'slideOutRight', 'js_composer' ) => 'slideOutRight',
                                          
                        esc_html__( 'zoomIn', 'js_composer' ) => 'zoomIn',
                        esc_html__( 'zoomInDown', 'js_composer' ) => 'zoomInDown',
                        esc_html__( 'zoomInLeft', 'js_composer' ) => 'zoomInLeft',
                        esc_html__( 'zoomInRight', 'js_composer' ) => 'zoomInRight',
                        esc_html__( 'zoomInUp', 'js_composer' ) => 'zoomInUp',

                        esc_html__( 'zoomOut', 'js_composer' ) => 'zoomOut',
                        esc_html__( 'zoomOutDown', 'js_composer' ) => 'zoomOutDown',
                        esc_html__( 'zoomOutLeft', 'js_composer' ) => 'zoomOutLeft',
                        esc_html__( 'zoomOutRight', 'js_composer' ) => 'zoomOutRight',
                        esc_html__( 'zoomOutUp', 'js_composer' ) => 'zoomOutUp',

                        esc_html__( 'hinge', 'js_composer' ) => 'hinge',
                        esc_html__( 'rollIn', 'js_composer' ) => 'rollIn',
                        esc_html__( 'rollOut', 'js_composer' ) => 'rollOut',
                    ),
                );    
            }
        }
        if ( ! function_exists( 'it_animation_delay' ) ) {
            function it_animation_delay(){
                return array(
                    "type" => "numberfield",
                    "heading" => esc_html__( "Animation Duration", 'js_composer' ),
                    "param_name" => "duration",
                    'dependency' => array(
                        'element' => 'it_animation', 
                        'not_empty' => true
                    ),
                );    
            }
        }
        if ( ! function_exists( 'it_animation_duration' ) ) {
            function it_animation_duration(){
                return array(
                    "type" => "numberfield",
                    "heading" => esc_html__( "Animation Delay", 'js_composer' ),
                    "param_name" => "delay",
                    'dependency' => array(
                        'element' => 'it_animation', 
                        'not_empty' => true
                    ),
                );    
            }             
        }
        
        // add parameter settings.
        $rowAtts = array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Padding', 'octa' ),
                'param_name' => 'row_padd',
                'value' => array(
                    __( 'Normal Padding', 'octa' )  => 'md-padding',
                    __( 'X-Small Padding', 'octa' ) => 'xs-padding',
                    __( 'Small Padding', 'octa' )   => 'sm-padding',
                    __( 'Large Padding', 'octa' )   => 'lg-padding',
                    __( 'X-Large Padding', 'octa' ) => "xl-padding",
                    __( 'No Padding', 'octa' )      => 'no-padding',
                ),
                'std' => 'md-padding',
                'weight' => 10,
            ),array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Full Width Row', 'octa' ),
                'param_name' => 'fluid',
                'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
            ),array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Stretch Content', 'js_composer' ),
                'param_name' => 'full_content',
                'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
            ),array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Equal height', 'js_composer' ),
                'param_name' => 'equal_height',
                'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' )
            ),array(
                'type' => 'checkbox',
                'heading' => __( 'Full height?', 'js_composer' ),
                'param_name' => 'full_height',
                'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
            ),array(
                "type" => "textfield",
                "heading" => esc_html__("Extra class name", "js_composer"),
                "param_name" => "el_class",
                "description" => esc_html__("Add an extra class name to this element.", "js_composer")
            ),array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Row ID', 'js_composer' ),
                'param_name' => 'extra_id',
            ),array(
                'type' => 'dropdown',
                'heading' => __( 'Background', 'js_composer' ),
                'param_name' => 'bg_main',
                'group' => 'Background',
                'value' => array(
                      __( 'None', 'js_composer' ) => 'none',
                      __( 'Color', 'js_composer' ) => 'color',
                      __('Image', 'js_composer') => 'image',
                      __('Video', 'js_composer') => 'video'
                ),
                'weight' => 9,
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Background Color', 'js_composer' ),
                'param_name' => 'section_bg_color',
                'group' => 'Background',
                'dependency' => array(
                    'element' => 'bg_main',
                    'value_not_equal_to' => array('none','video'),
                ),
            ),array(
                'type' => 'it_up_img',
                'heading' => esc_html__( 'Background Image', 'js_composer' ),
                'param_name' => 'it_bg_img',
                'group' => 'Background',
                'dependency' => array(
                    'element' => 'bg_main',
                    'value' => 'image',
                ),
            ),array(
                'type' => 'dropdown',
                'heading' => __( 'Background Repeat', 'js_composer' ),
                'param_name' => 'bg_image_repeat',
                'group' => 'Background',
                'value' => array(
                      __( 'Repeat', 'js_composer' ) => '',
                      __( 'Repeat Horizontally', 'js_composer' ) => 'repeat-x',
                      __('Repeat Vertically', 'js_composer') => 'repeat-y',
                      __('No Repeat', 'js_composer') => 'no-repeat'
                ),
                'dependency' => array(
                    'element' => 'bg_main',
                    'value' => 'image',
                ),
            ),array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background Attachment', 'js_composer' ),
                'param_name' => 'bg_image_attachment',
                'group' => 'Background',
                'value' => array(
                    esc_html__( 'Scroll', 'js_composer' ) => '',
                    esc_html__( 'Fixed', 'js_composer' ) => 'fixed',
                ),     
                'dependency' => array(
                    'element' => 'bg_main',
                    'value' => 'image',
                ),
            ),array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background Position', 'js_composer' ),
                'param_name' => 'bg_image_position',
                'group' => 'Background',
                'value' => array(
                    __( 'Left Top', 'octa' ) => '',
                    __( 'Left Center', 'octa' ) => '0% 50%',
                    __( 'Left Bottom', 'octa') => '0% 100%',
                    __( 'Right Top', 'octa') => '100% 0%',
                    __( 'Right Center', 'octa' ) => '100% 50%',
                    __( 'Right Bottom', 'octa' ) => '100% 100%',
                    __( 'Center Top', 'octa') => '50% 0%',
                    __( 'Center Center', 'octa') => '50% 50%',
                    __( 'Center Bottom', 'octa' ) => '50% 100%'
                ),  
                'dependency' => array(
                    'element' => 'bg_main',
                    'value' => 'image',
                ), 
            ),array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background Size', 'js_composer' ),
                'param_name' => 'bg_cover',
                'group' => 'Background',
                'value' => array(
                    __('-- Choose --','octa') => '',
                    __( 'Cover', 'octa' ) => 'cover',
                    __( 'Contain', 'octa' ) => 'contain',
                    '100%' => '100% 100%',
                ),    
                'dependency' => array(
                    'element' => 'bg_main',
                    'value' => 'image',
                ),
            ),array(
                'type' => 'checkbox',
                'heading' => __( 'Parallax', 'js_composer' ),
                'param_name' => 'parallax',
                'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
                'group' => 'Background',
                'description' => __( 'Add parallax type background for row.', 'js_composer' ),
                'dependency' => array(
                    'element' => 'bg_main',
                    'value' => 'image',
                ),
            ),array(
                'type' => 'it_up_img',
                'heading' => esc_html__( 'Video Poster', 'js_composer' ),
                'param_name' => 'video_poster',
                'group' => 'Background',
                'dependency' => array(
                    'element' => 'bg_main',
                    'value' => 'video',
                ),
            ),array(
                'type' => 'it_video_bg',
                'heading' => esc_html__( 'video/mp4', 'js_composer' ),
                'param_name' => 'video_mp4',
                'group' => 'Background',
                'dependency' => array(
                    'element' => 'bg_main',
                    'value' => 'video',
                ),
            ),array(
                'type' => 'it_video_bg',
                'heading' => esc_html__( 'video/webm', 'js_composer' ),
                'param_name' => 'video_webm',
                'group' => 'Background',
                'dependency' => array(
                    'element' => 'bg_main',
                    'value' => 'video',
                ),
            ),array(
                'type' => 'it_video_bg',
                'heading' => esc_html__( 'video/ogv', 'js_composer' ),
                'param_name' => 'video_ogv',
                'group' => 'Background',
                'dependency' => array(
                    'element' => 'bg_main',
                    'value' => 'video',
                ),
            ),array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'YouTube video', 'js_composer' ),
                'param_name' => 'video_bg',
                'group' => 'Background',
                'description' => esc_html__( 'If checked, YouTube video will be used as row background.', 'js_composer' ),
                'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
                'dependency' => array(
                    'element' => 'bg_main',
                    'value' => 'video',
                ),
            ),array(
                'type' => 'textfield',
                'heading' => esc_html__( 'YouTube link', 'js_composer' ),
                'param_name' => 'video_bg_url',
                'group' => 'Background',
                'value' => 'https://www.youtube.com/watch?v=lMJXxhRFO1k',
                'description' => esc_html__( 'Add YouTube link.', 'js_composer' ),
                'dependency' => array(
                    'element' => 'video_bg',
                    'not_empty' => true,
                ),
            ),array(
                'type' => 'checkbox',
                'heading' => __( 'Parallax', 'js_composer' ),
                'param_name' => 'video_bg_parallax',
                'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
                'group' => 'Background',
                'description' => __( 'Add parallax type background for row.', 'js_composer' ),
                'dependency' => array(
                    'element' => 'video_bg',
                    'not_empty' => true,
                ),
            ),array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Overlay ?', 'js_composer' ),
                'param_name' => 'bg_overlay',
                'group' => 'Background',
                'description' => esc_html__( 'Overlay on the background image.', 'js_composer' ),
                'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Overlay Color', 'js_composer' ),
                'param_name' => 'overlay_color',
                'group' => 'Background',
                'dependency' => array( 'element' => 'bg_overlay', 'not_empty' => true)
            )            
        );

        $tabsAtts = array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'js_composer' ),
                'param_name' => 'style',
                'weight' => 5,
                'value' => array(
                    'Default Tabs' => 'classic',
                    'Bordered Tabs' => 'bordered',
                    'Grey BG Tabs' => 'gr-bg',
                    'Grey BG Bordered Tabs' => 'bordered gr-bg',
                    'Top Border Tabs' => 'top-border',
                    'Top Border Bordered Tabs' => 'bordered gr-bg top-border',
                    'Full Background Tabs' => 'bottom-border',
                    'Background Color Tabs' => 'bg-color',
                    'Background Bordered Tabs' => 'bordered bg-color',
                    'Alter Background Color Tabs' => 'bordered gr-bg bg-color',
                ),
                "std" => 'classic',
            ),array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Size', 'js_composer' ),
                'param_name' => 'size',
                'weight' => 4,
                'value' => array(
                    'Normal' => 'md',
                    'Small' => 'sm',
                    'Large' => 'lg',
                ),
                'std' => 'md',
            )
        ); 
            
        $accAtts = array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'js_composer' ),
                'base' => 'vc_tta_accordion',
                'param_name' => 'style',
                'group' => 'Extras',
                'value' => array(
                    'Classic' => 'classic',
                    'Outline' => 'outline',
                    'Bottom Border' => 'bot_border',
                    'Top Border' => 'top_border',
                ),
                'std' => 'classic',
            ),array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Shape', 'js_composer' ),
                'base' => 'vc_tta_accordion',
                'param_name' => 'shape',
                'group' => 'Extras',
                'value' => array(
                    'Square' => 'square',
                    'Rounded' => 'rounded',
                    'Round' => 'round',
                ),
                'std' => 'square',
            ),array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Size', 'js_composer' ),
                'base' => 'vc_tta_accordion',
                'param_name' => 'size',
                'group' => 'Extras',
                'value' => array(
                    'Normal' => 'md',
                    'Small' => 'sm',
                    'Large' => 'lg',
                ),
                'std' => 'md',
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title Color', 'js_composer' ),
                'param_name' => 'acc_t_color',
                'group' => 'Extras',
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title Background Color', 'js_composer' ),
                'param_name' => 'acc_t_bg_color',
                'group' => 'Extras',
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title Border Color', 'js_composer' ),
                'param_name' => 'acc_t_border_color',
                'group' => 'Extras',
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Active Title Color', 'js_composer' ),
                'param_name' => 'act_acc_t_color',
                'group' => 'Extras',
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Active Title BG Color', 'js_composer' ),
                'param_name' => 'act_acc_t_bg_color',
                'group' => 'Extras',
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Active Title Border Color', 'js_composer' ),
                'param_name' => 'act_acc_t_border_color',
                'group' => 'Extras',
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Icon Color', 'js_composer' ),
                'param_name' => 'acc_icon_color',
                'group' => 'Extras',
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Active Icon Color', 'js_composer' ),
                'param_name' => 'act_acc_icon_color',
                'group' => 'Extras',
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Content Background Color', 'js_composer' ),
                'param_name' => 'sec_acc_bg_color',
                'group' => 'Extras',
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Content Color', 'js_composer' ),
                'param_name' => 'sec_acc_color',
                'group' => 'Extras',
            )
        );
             
        $acctabAtts = array(
            icons_lib(),
            icons_fa(),
            icons_oc(),
            icons_ti(),
            icons_entypo(),
            icons_line(),
            icons_px(),
            icons_material(),
            icons_med(),
        );

        $anim = array(
           it_animation(),
           it_animation_delay(),
           it_animation_duration(), 
        ); 

        $btnAtts = array(
            array(
               'type' => 'dropdown',
                'heading' => esc_html__( 'Size', 'js_composer' ),
                'param_name' => 'size',
                'description' => esc_html__( 'Select button display size.', 'js_composer' ),
                'value' => array(
                    'Tiny' => 'xs',
                    'Small' => 'sm',
                    'Normal' => 'md',
                    'Large' => 'lg',
                    'X-Large' => 'xl',
                    'XX-Large' => 'xxl',
                ),
                'std' => 'md' 
            ),array(
                'type' => 'dropdown',
                'heading' => __( 'Color', 'js_composer' ),
                'param_name' => 'color',
                'description' => __( 'Select button color.', 'js_composer' ),
                'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
                'value' => array(
                        __( 'Theme Color', 'octa' ) => 'main-bg',
                        __( 'Classic Grey', 'octa' ) => 'default',
                        __( 'Classic Blue', 'octa' ) => 'primary',
                        __( 'Classic Turquoise', 'octa' ) => 'info',
                        __( 'Classic Green', 'octa' ) => 'success',
                        __( 'Classic Orange', 'octa' ) => 'warning',
                        __( 'Classic Red', 'octa' ) => 'danger',
                        __( 'Classic Black', 'octa' ) => 'inverse',
                    ) + getVcShared( 'colors-dashed' ),
                'std' => 'main-bg',
                'dependency' => array(
                    'element' => 'style',
                    'value_not_equal_to' => array(
                        'custom',
                        'outline-custom',
                        'gradient',
                        'gradient-custom',
                    ),
                ),
            )            
        );
            
        $iconAtts = array(
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use Icon', 'js_composer' ),
                'param_name' => 'use_icon',
                'value' => array(
                    esc_html__( 'yes', 'js_composer' ) => '1',
                )
            ),
            icons_lib(),
            icons_fa(),
            icons_oc(),
            icons_ti(),
            icons_entypo(),
            icons_line(),
            icons_px(),
            icons_material(),
            icons_med(),
        );
         
        $piatts = array(
            array(
                'type' => 'dropdown',
                'heading' => __( 'PIE Style', 'js_composer' ),
                'param_name' => 'pie_style',
                'group' => 'Chart Style',
                'value' => array( 
                    'Simple' => 'simple',
                    'Style 1' => 'style1',
                    'Style 2' => 'style2' ,
                    'Style 3' => 'style3' 
                ),
                'description' => __( 'Select pie style.', 'js_composer' ),
            ),array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use Icon', 'js_composer' ),
                'param_name' => 'use_icon',
                'group' => 'Chart Style',
                'value' => array(
                    esc_html__( 'yes', 'js_composer' ) => '1',
                )
            ),
            icons_lib(),
            icons_fa(),
            icons_oc(),
            icons_ti(),
            icons_entypo(),
            icons_line(),
            icons_px(),
            icons_material(),
            icons_ios7(),
            icons_med(),
         );
         
        $ctaAtts = array(
            array(
                'type' => 'dropdown',
                'heading' => __( 'Color', 'js_composer' ),
                'param_name' => 'color',
                'value' => array( __( 'Classic', 'js_composer' ) => 'classic',__( 'Transparent', 'js_composer' ) => 'transparent' ,__( 'Theme Color', 'js_composer' ) => 'main-bg' ) + getVcShared( 'colors-dashed' ),
                'std' => 'classic',
                'description' => __( 'Select color schema.', 'js_composer' ),
                'param_holder_class' => 'vc_colored-dropdown vc_cta3-colored-dropdown',
                'dependency' => array(
                    'element' => 'style',
                    'value_not_equal_to' => array( 'custom' ),
                ), 
            )
         );
         
        $progressAtts = array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Bar color', 'js_composer' ),
                'param_name' => 'bgcolor',
                'value' => array(
                    esc_html__( 'Grey', 'octa' ) => 'bar_grey',
                    esc_html__( 'Blue', 'octa' ) => 'bar_blue',
                    esc_html__( 'Turquoise', 'octa' ) => 'bar_turquoise',
                    esc_html__( 'Green', 'octa' ) => 'bar_green',
                    esc_html__( 'Orange', 'octa' ) => 'bar_orange',
                    esc_html__( 'Red', 'octa' ) => 'bar_red',
                    esc_html__( 'Black', 'octa' ) => 'bar_black',
                    esc_html__( 'Theme Color', 'octa' ) => 'main-bg',
                    esc_html__( 'Custom Color', 'octa' ) => 'custom'
                ),
                'description' => esc_html__( 'Select bar background color.', 'js_composer' ),
                'admin_label' => true
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Bar custom color', 'js_composer' ),
                'param_name' => 'custombgcolor',
                'description' => esc_html__( 'Select custom background color for bars.', 'js_composer' ),
                'dependency' => array( 'element' => 'bgcolor', 'value' => array( 'custom' ) )
            ),array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'js_composer' ),
                'param_name' => 'barsstyle',
                'group' => 'Style',
                'value' => array(
                    __( 'Normal Bars', 'octa' ) => '',
                    __( 'Large Bars', 'octa' ) => 'lg-line',
                    __( 'Large Bars Inner Title', 'octa' ) => 'lg-line inner-title',
                    __( 'Small Bars', 'octa' ) => 'sm-line',
                    __( 'Extra Small Bars', 'octa' ) => 'xs-line',
                    __( 'Tiny Bars', 'octa' ) => 'tiny-line',
                    __( 'Tiny Bars Style 2', 'octa' ) => 'tiny-line tiny-2',
                ),
                'description' => esc_html__( 'Select bar Style.', 'js_composer' ),
                'admin_label' => true
            ),array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Extra class name', 'octa' ),
                'param_name' => 'el_class',
                'description' => esc_html__( 'Add an extra class name to this element.', 'octa' )
            )
        );

        $it_colors = array(
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Custom color', 'js_composer' ),
                'param_name' => 'it_color',
                'description' => esc_html__( 'Select custom color.', 'js_composer' ),
            ) 
        );
        
        $videoAtts = array(
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use Self Hosted Video', 'js_composer' ),
                'param_name' => 'up_video',
                'value' => array(
                    esc_html__( 'yes', 'js_composer' ) => '1',
                )
            ),
            array(
                'type' => 'it_up_img',
                'heading' => esc_html__( 'Video Poster', 'js_composer' ),
                'param_name' => 'vc_video_poster',
                'group' => 'Upload Video',
                'description' => esc_html__( '', 'js_composer' ),
                'dependency' => array(
                    'element' => 'up_video',
                    'value' => '1',
                ),
            ),array(
                'type' => 'it_video_bg',
                'heading' => esc_html__( 'video/mp4', 'js_composer' ),
                'param_name' => 'vc_video_mp4',
                'group' => 'Upload Video',
                'description' => esc_html__( '', 'js_composer' ),
                'dependency' => array(
                    'element' => 'up_video',
                    'value' => '1',
                ),
            ),array(
                'type' => 'it_video_bg',
                'heading' => esc_html__( 'video/webm', 'js_composer' ),
                'param_name' => 'vc_video_webm',
                'group' => 'Upload Video',
                'description' => esc_html__( '', 'js_composer' ),
                'dependency' => array(
                    'element' => 'up_video',
                    'value' => '1',
                ),
            ),array(
                'type' => 'it_video_bg',
                'heading' => esc_html__( 'video/ogv', 'js_composer' ),
                'param_name' => 'vc_video_ogv',
                'group' => 'Upload Video',
                'description' => esc_html__( '', 'js_composer' ),
                'dependency' => array(
                    'element' => 'up_video',
                    'value' => '1',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Extra class name', 'js_composer' ),
                'param_name' => 'el_class',
                'description' => esc_html__( 'Add an extra class name to this element.', 'js_composer' )
            ) 
        );
        
        $slickAtts = array(     
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Type",'octa'),
                "param_name" => "v_type",
                'group' => 'Carousel',
                "value" => array(
                    'Horizontal' =>'horizontal',
                    'Vertical' =>'vertical',
                ),
                'dependency' => array(
                    'element' => 'has_carousel',
                    'value' => '1'
                ),
            ),array(
                "type" => "dropdown",
                "heading" => esc_html__("Space between slides",'octa'),
                "param_name" => "gap",
                'group' => 'Carousel',
                "value" => array(
                    'None' =>'0',
                    '1px' =>'1px',
                    '2px' =>'2px',
                    '3px' =>'3px',
                    '4px' =>'4px',
                    '5px' =>'5px',
                    '10px' =>'10px',
                    '15px' =>'15px',
                    '20px' =>'20px',
                    '25px' =>'25px',
                    '30px' =>'30px',
                    '35px' =>'35px',
                ),
                'dependency' => array(
                    'element' => 'has_carousel',
                    'value' => '1'
                ),
            ),array(
                "type" => "numberfield",
                "heading" => esc_html__("Slides to show", "js_composer"),
                "param_name" => "v_slides",
                'group' => 'Carousel',
                'value' => '1',
                "description" => esc_html__("number of visible slides.", "js_composer"),
                'dependency' => array(
                    'element' => 'has_carousel',
                    'value' => '1'
                ),
            ),array(
                "type" => "numberfield",
                "heading" => esc_html__("Slides to Scroll", "js_composer"),
                "param_name" => "v_scroll",
                'group' => 'Carousel',
                'value' => '1',
                "description" => esc_html__("No. of scrollable slides.", "js_composer"),
                'dependency' => array(
                    'element' => 'has_carousel',
                    'value' => '1'
                ),
            ),array(
                "type" => "numberfield",
                "heading" => esc_html__("Transition Speed", "js_composer"),
                "param_name" => "v_speed",
                'group' => 'Carousel',
                'value' => '500',
                "description" => esc_html__("slides change speed.", "js_composer"),
                'dependency' => array(
                    'element' => 'has_carousel',
                    'value' => '1'
                ),
            ),array(
                "type" => "checkbox",
                "heading" => esc_html__("Show Arrows?", "js_composer"),
                "param_name" => "v_arrows",
                'group' => 'Navigation',
                'value' => array(
                    esc_html__( 'yes', 'js_composer' ) => '1',
                ),
                'dependency' => array(
                    'element' => 'has_carousel',
                    'value' => '1'
                ),
            ),array(
                "type" => "textfield",
                "heading" => "Idle Styling",
                "group" => "Navigation",
                'edit_field_class' => 'vc_head',
                "param_name" => "idl_lbl",
                'dependency' => array(
                    'element' => 'v_arrows', 
                    'not_empty' => true
                ),
            ),array(
                "type" => "colorpicker",
                "heading" => esc_html__("Color", "js_composer"),
                "param_name" => "arrow_color",
                "group" => "Navigation",
                'dependency' => array(
                    'element' => 'v_arrows', 
                    'not_empty' => true
                ),
            ),array(
                "type" => "colorpicker",
                "heading" => esc_html__("Background Color", "js_composer"),
                "param_name" => "arrow_bg_color",
                "group" => "Navigation",
                'dependency' => array(
                    'element' => 'v_arrows', 
                    'not_empty' => true
                ),
            ),array(
                "type" => "textfield",
                "heading" => "Hover Styling",
                "group" => "Navigation",
                'edit_field_class' => 'vc_head',
                "param_name" => "hover_lbl",
                'dependency' => array(
                    'element' => 'v_arrows', 
                    'not_empty' => true
                ),
            ),array(
                "type" => "colorpicker",
                "heading" => esc_html__("Color", "js_composer"),
                "param_name" => "arrow_hover_color",
                "group" => "Navigation",
                'dependency' => array(
                    'element' => 'v_arrows', 
                    'not_empty' => true
                ),
            ),array(
                "type" => "colorpicker",
                "heading" => esc_html__("Background Color", "js_composer"),
                "param_name" => "arrow_hover_bg_color",
                "group" => "Navigation",
                'dependency' => array(
                    'element' => 'v_arrows', 
                    'not_empty' => true
                ),
            ),array(
                "type" => "textfield",
                "heading" => "Arrows Icons",
                "group" => "Navigation",
                'edit_field_class' => 'vc_head',
                "param_name" => "ics_lbl",
                'dependency' => array(
                    'element' => 'v_arrows', 
                    'not_empty' => true
                ),
            ),array(
                "type" => "it_vc_icon",
                "heading" => esc_html__("Next Icon",'octa'),
                "param_name" => "next_icon",
                'group' => 'Navigation',
                'dependency' => array(
                    'element' => 'v_arrows', 
                    'not_empty' => true
                ),
            ),array(
                "type" => "it_vc_icon",
                "heading" => esc_html__("Previous Icon",'octa'),
                "param_name" => "prev_icon",
                'group' => 'Navigation',
                'dependency' => array(
                    'element' => 'v_arrows', 
                    'not_empty' => true
                ),
            ),array(
                "type" => "dropdown",
                "heading" => esc_html__("Shape",'octa'),
                "param_name" => "arrow_shape",
                'group' => 'Navigation',
                "value" => array(
                    'Square' =>'square',
                    'Rounded' =>'rounded',
                    'Circle' =>'circle',
                ),
                'dependency' => array(
                    'element' => 'v_arrows', 
                    'not_empty' => true
                ),
            ),array(
                "type" => "dropdown",
                "heading" => esc_html__("Position",'octa'),
                "param_name" => "arrow_pos",
                'group' => 'Navigation',
                "value" => array(
                    'Left - Right - Inside' =>'l-r-in',
                    'Left - Right - Outside' =>'l-r-out',
                    'Top - Bottom' =>'t-b',
                ),
                'dependency' => array(
                    'element' => 'v_arrows', 
                    'not_empty' => true
                ),
            ),array(
                "type" => "numberfield",
                "heading" => esc_html__("Font Size (px)",'octa'),
                "param_name" => "arrow_size",
                "group" => "Navigation",
                'dependency' => array(
                    'element' => 'v_arrows', 
                    'not_empty' => true
                ),
                "std" => "14",
            ),array(
                "type" => "checkbox",
                "heading" => esc_html__("Show Bullets?", "js_composer"),
                "param_name" => "v_dots",
                'group' => 'Navigation',
                'value' => array(
                    esc_html__( 'yes', 'js_composer' ) => '1',
                ),
                'dependency' => array(
                    'element' => 'has_carousel',
                    'value' => '1'
                ),
            ),array(
                "type" => "dropdown",
                "heading" => esc_html__("Style",'octa'),
                "param_name" => "bullets_style",
                'group' => 'Navigation',
                "value" => array(
                    'Circle 1' =>'',
                    'Circle 2' =>'circle2',
                    'Square 1' =>'square1',
                    'Square 2' =>'square2',
                ),
                'dependency' => array(
                    'element' => 'v_dots', 
                    'not_empty' => true
                ),
            ),array(
                "type" => "colorpicker",
                "heading" => esc_html__("Color", "js_composer"),
                "param_name" => "bullet_color",
                "group" => "Navigation",
                'dependency' => array(
                    'element' => 'v_dots', 
                    'not_empty' => true
                ),
            ),array(
                "type" => "checkbox",
                "heading" => esc_html__("Fade?", "js_composer"),
                "param_name" => "v_fade",
                'group' => 'Advanced',
                'value' => array(
                    esc_html__( 'yes', 'js_composer' ) => '1',
                ),
                'dependency' => array(
                    'element' => 'has_carousel',
                    'value' => '1'
                ),
            ),array(
                "type" => "checkbox",
                "heading" => esc_html__("AutoPlay?", "js_composer"),
                "param_name" => "v_auto",
                'group' => 'Advanced',
                'value' => array(
                    esc_html__( 'yes', 'js_composer' ) => '1',
                ),
                'dependency' => array(
                    'element' => 'has_carousel',
                    'value' => '1'
                ),
            ),array(
                "type" => "checkbox",
                "heading" => esc_html__("Infinite?", "js_composer"),
                "param_name" => "v_infinite",
                'group' => 'Advanced',
                'value' => array(
                    esc_html__( 'yes', 'js_composer' ) => '1',
                ),
                'dependency' => array(
                    'element' => 'has_carousel',
                    'value' => '1'
                ),
            ),array(
                "type" => "checkbox",
                "heading" => esc_html__("RTL?", "js_composer"),
                "param_name" => "v_rtl",
                'group' => 'Advanced',
                'value' => array(
                    esc_html__( 'yes', 'js_composer' ) => '1',
                ),
                'dependency' => array(
                    'element' => 'has_carousel',
                    'value' => '1'
                ),
            )
        );

        // remove elements.
        vc_remove_element( "vc_gmaps" );
        //vc_remove_element( "vc_icon" );
        vc_remove_element( "vc_images_carousel" );
        vc_remove_element( "vc_custom_heading" );
    
        // remove params from elements.
        vc_remove_param( "vc_row", "full_width" );
        vc_remove_param( "vc_row", "parallax_image" );
        vc_remove_param( "vc_row", "parallax" );
        vc_remove_param( "vc_row", "parallax_speed_video" );
        vc_remove_param( "vc_row", "parallax_speed_bg" );
        vc_remove_param( "vc_row", "disable_element" );
        vc_remove_param( "vc_row", "video_bg" );    
        vc_remove_param( "vc_row", "video_bg_url" );
        vc_remove_param( "vc_row", "video_bg_parallax" );
        vc_remove_param( "vc_row", "video_bg_url" );
        //vc_remove_param( "vc_row", "css" );
        vc_remove_param( "vc_row", "gap" ); 
        vc_remove_param( "vc_row", "full_height" );
        vc_remove_param( "vc_row", "el_id" );
        vc_remove_param( "vc_row", "equal_height" );
        vc_remove_param( "vc_row", "content_placement" );
        vc_remove_param( "vc_row", "columns_placement" ); 
        vc_remove_param( "vc_row", "el_class" );
        vc_remove_param( "vc_row", "css_animation" );
        
        vc_remove_param( "vc_row_inner", "gap" );
        vc_remove_param( "vc_row_inner", "content_placement" );
        vc_remove_param( "vc_row_inner", "disable_element" );
        vc_remove_param( "vc_row_inner", "css_animation" );
        vc_remove_param( "vc_column_inner", "css_animation" );
        vc_remove_param( "vc_column", "css_animation" );
                    
        vc_remove_param( "vc_progress_bar", "bgcolor" );
        vc_remove_param( "vc_progress_bar", "custombgcolor" );  
        vc_remove_param( "vc_progress_bar", "el_class" );
        
        vc_remove_param( 'vc_tta_tabs', 'title' );
        vc_remove_param( 'vc_tta_tabs', 'style' );
        
        vc_remove_param( 'vc_tta_accordion', 'color' );
        vc_remove_param( 'vc_tta_accordion', 'shape' );
        vc_remove_param( 'vc_tta_accordion', 'style' );
        
        vc_remove_param( "vc_video", "el_class" );
        
        //add params to elements.    
        vc_add_params( 'vc_row', $rowAtts );
        vc_add_params( "vc_column", $anim );
        vc_add_params( "vc_column_inner", $anim );
        vc_add_params( 'vc_tta_accordion', $accAtts );
        vc_add_params( 'vc_tta_tabs', $tabsAtts );
        vc_add_params( 'vc_btn', $btnAtts );
        vc_add_params( 'vc_pie', $piatts );
        vc_add_params( 'vc_progress_bar', $progressAtts );
        vc_add_params( 'vc_video', $videoAtts );
        vc_add_params( 'vc_cta', $ctaAtts );
        vc_add_params( 'it_recent_posts', $slickAtts ); 
        vc_add_params( 'it_posts_category', $slickAtts );
        
        // update vc_map after adding params.
        vc_map_update( 'vc_column', $anim );
        vc_map_update( 'vc_column_inner', $anim );
        vc_map_update( 'vc_row', $rowAtts );
        vc_map_update( 'vc_tta_accordion', $accAtts );
        vc_map_update( 'vc_tta_tabs', $tabsAtts );
        vc_map_update( 'vc_btn', $btnAtts );
        vc_map_update( 'vc_pie', $piatts );
        vc_map_update( 'vc_progress_bar', $progressAtts );
        vc_map_update( 'vc_video', $videoAtts );
        vc_map_update( 'vc_cta', $ctaAtts );
        
        if ( ! function_exists( 'it_vc_icon' ) ) {
            function it_vc_icon( $settings, $value ) {
              $output = '<div>';
              $output  .= '
              <i class="ico '.$value.'"></i>
              <a class="button button-primary btn_icon" href="#">'.__('Add Icon','octa').'</a>
              <input type="hidden" name="'.$settings['param_name'].'" class="wpb_vc_param_value icon_cust '. $settings['param_name'] .' '. $settings['type'] .'" value="'. $value .'" />
              <a class="button icon-remove" title="'.__('Remove Icon','octa').'"><i class="fa fa-times"></i></a>';
              $output   .= '</div>';
              return $output;
            }
        }
        vc_add_shortcode_param('it_vc_icon', 'it_vc_icon');
        
        if ( ! function_exists( 'numberfield' ) ) {
            function numberfield( $settings, $value ) {
              $output  .= '<input name="' . $settings['param_name']
                       . '" class="wpb_vc_param_value wpb-textinput '
                       . $settings['param_name'] . ' ' . $settings['type']
                       . '" type="number" placeholder="'.$settings['std'].'" value="' . $value . '"/>';
              return $output;
            }
        }
        vc_add_shortcode_param('numberfield', 'numberfield');
        
        if ( ! function_exists( 'it_multiselect' ) ) {
            function it_multiselect( $settings, $value ) {
                
                $output = '';
                $css_option = str_replace( '#', 'hash-', vc_get_dropdown_option( $settings, $value ) );
                $output .= '<select size="3" multiple="multiple" name="'
                           . $settings['param_name']
                           . '" class="wpb_vc_param_value wpb-input wpb-select '
                           . $settings['param_name']
                           . ' ' . $settings['type']
                           . ' ' . $css_option
                           . '" data-option="' . $css_option . '">';
                if ( is_array( $value ) ) {
                    $value = isset( $value['value'] ) ? $value['value'] : array_shift( $value );
                }
                if ( ! empty( $settings['value'] ) ) {
                    foreach ( $settings['value'] as $index => $data ) {
                        if ( is_numeric( $index ) && ( is_string( $data ) || is_numeric( $data ) ) ) {
                            $option_label = $data;
                            $option_value = $data;
                        } elseif ( is_numeric( $index ) && is_array( $data ) ) {
                            $option_label = isset( $data['label'] ) ? $data['label'] : array_pop( $data );
                            $option_value = isset( $data['value'] ) ? $data['value'] : array_pop( $data );
                        } else {
                            $option_value = $data;
                            $option_label = $index;
                        }
                        $selected = '';
                        $option_value_string = (string) $option_value;
                        $value_string = (string) $value;
                        if ( '' !== $value && $option_value_string === $value_string ) {
                            $selected = ' selected="selected"';
                        }
                        $option_class = str_replace( '#', 'hash-', $option_value );
                        $output .= '<option class="' . esc_attr( $option_class ) . '" value="' . esc_attr( $option_value ) . '"' . $selected . '>'
                                   . htmlspecialchars( $option_label ) . '</option>';
                    }
                }
                $output .= '</select>';
                return $output;
            }
        }
        vc_add_shortcode_param('it_multiselect', 'it_multiselect');
        
        // upload image parameter
        if ( ! function_exists( 'it_upload_img' ) ) {
            function it_upload_img( $settings, $value ) {
              return '<input class="regular-text wpb_vc_param_value wpb-textinput ' .
                 esc_attr( $settings['param_name'] ) . ' ' .
                 esc_attr( $settings['type'] ) . '_field" name="' . esc_attr( $settings['param_name'] ) . '" type="text" value="' . esc_attr( $value ) . '" />
                 <a class="upload_image_button" type="button" href="#">'.__('Upload','superfine').'</a><div class="clear-img"><img class="logo-im" alt="" src="'. esc_attr( $value ) .'" /> <a class="remove-img" href="#" title="'.__('Remove Image','superfine').'"></a></div>';
            }
        }
        vc_add_shortcode_param('it_up_img', 'it_upload_img');

        // section video background parameter
        if ( ! function_exists( 'it_upload_video_bg' ) ) {
            function it_upload_video_bg( $settings, $value ) {
              return '<input class="regular-text wpb_vc_param_value wpb-textinput ' .
                 esc_attr( $settings['param_name'] ) . ' ' .
                 esc_attr( $settings['type'] ) . '_field" name="' . esc_attr( $settings['param_name'] ) . '" type="text" value="' . esc_attr( $value ) . '" /><a href="#" class="remove-val"></a><a class="upload_button" type="button" href="#">'.__('Upload','superfine').'</a>';
            }
        }
        vc_add_shortcode_param('it_video_bg', 'it_upload_video_bg');
        
        if ( ! function_exists( 'it_dropdown_cats' ) ) {
            function it_dropdown_cats() {
                $categories_obj = get_categories('hide_empty=0');
                $categories = array();
                foreach ($categories_obj as $pn_cat){
                    $categories[$pn_cat->cat_name] = $pn_cat->category_nicename;
                }  
                $categories=array("All Categories"=>"") + $categories;
                return $categories;
            }
        }
        
        if ( ! function_exists( 'colorCreator' ) ) {
            function colorCreator($colour, $per) {  
                $colour = substr( $colour, 1 ); 
                $rgb = '';
                $per = $per/100*255;
                if ($per < 0 ) { 
                    $per =  abs($per); 
                    for ($x=0;$x<3;$x++) { 
                        $c = hexdec(substr($colour,(2*$x),2)) - $per; 
                        $c = ($c < 0) ? 0 : dechex($c); 
                        $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
                    }   
                } else { 
                    for ($x=0;$x<3;$x++) {             
                        $c = hexdec(substr($colour,(2*$x),2)) + $per; 
                        $c = ($c > 255) ? 'ff' : dechex($c); 
                        $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
                    }    
                } 
                return '#'.$rgb; 
            }
        }
        
        if ( ! function_exists( 'it_googleFonts' ) ) {
            function it_googleFonts (){
                $goglfonts = array();
                $url = OC_PLUGIN_URI .'/assets/admin/fonts/fonts.json';
                $response = wp_remote_get( $url );
                $body = wp_remote_retrieve_body($response);
                $fonts    =  json_decode( $body);
                foreach ( $fonts->items as $key => $font ) {
                  $goglfonts[$font->family] = $font->family;
                } 
                
                $selfont = array('-- Select Font Family --' => '');
                $goglfonts = $selfont + $goglfonts;
                
                return $goglfonts;
                
            }
        }
        
        if ( ! function_exists( 'shortCodeEnq' ) ) {
            function shortCodeEnq($font){

                $font = str_replace( ' ', '+', $font );
                $s_font = $font.':100,200,300,400,500,600,700,900';
                if ( ! empty( $font ) ) {
                    
                    $query_args = array(
                        'family' => $s_font,
                        'subset' => 'latin,latin-ext',
                    );
                    
                    $request_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
                    wp_deregister_style( $font );
                    wp_register_style( $font, $request_url, array(),null );
                    wp_enqueue_style( $font );
                } 
            }    
        }
        
        if ( ! function_exists( 'newFun' ) ) {
            function newFun($cssE){
                $cssE = str_replace(': ', ':', str_replace(';}', '}', str_replace('; ',';',str_replace(' }','}',str_replace(' {', '{', str_replace('{ ','{',str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),"",preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!','',$cssE))))))));
                wp_enqueue_style ('oc-custom-short', OC_PLUGIN_URI . 'assets/front/css/custom-style.css', array( 'js_composer_front' ) );
                wp_add_inline_style ('oc-custom-short', $cssE);
            }
        }
        

    }
}

new OCTA_Core();