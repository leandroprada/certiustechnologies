<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
 
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' ); 
$it_bg_img = $section_bg_color = $equal_height = $extra_id = $parallax = $over = $custom_stle = $parallax_speed_bg = $bg_image_repeat = $bg_image_position = $cl = $bg = $bg_col = $style = $id = $bg_image_attachment = $bg_overlay = $video_bg_parallax = $video_mp4 = $video_poster = $video_webm = $video_ogv = $overlay_color = $bg_cover = $row_padd = $css = $el_class = $output = $after_output = $video_class = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class );

$row_id = uniqid( 'row_' );
if( $section_bg_color != '' || $it_bg_img != '' || $bg_image_repeat != '' || $bg_image_position != '' || $bg_cover != '' ){
    $custom_stle = ".{$row_id}{";
        $custom_stle .= ($section_bg_color != '') ? "background-color: {$section_bg_color};" : "";
        $custom_stle .= ($it_bg_img != '') ? 'background-image: url('.esc_url($it_bg_img).');' : "";
        $custom_stle .= ($bg_image_repeat != '') ? "background-repeat: {$bg_image_repeat};" : "";
        $custom_stle .= ($bg_image_position != '') ? "background-position: {$bg_image_position};" : "";
        $custom_stle .= ($bg_cover != '') ? "background-size: {$bg_cover};" : "";
    $custom_stle .= "}";   
}    
newFun($custom_stle);

// Fluid content
$cl = (! empty( $fluid )) ? '-fluid' : ""; 
// Extra ID
$id = ($extra_id != '') ? 'id="'.$extra_id.'"' : ""; 
// Video Section Class
$video_class = ($video_mp4 != '' || $video_webm != '' || $video_ogv != '') ? 'section-video' : "";

// Overlay
$zind = '';
if($bg_overlay == '1'){
    $zind = ' top-zindex';
    $over = ' relative';
} 

$css_classes[] = ( vc_shortcode_custom_css_has_property( $css, array( 'border', 'background', ) ) || $video_bg || $parallax ) ? 'vc_row-has-fill' : "";

$css_classes = array(
    $row_padd,
    $el_class,
    $video_class,
    $over, 
    vc_shortcode_custom_css_class( $css ),
);

$wrapper_attributes = array();
// build attributes for wrapper

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

if ( $has_video_bg ) {
    $parallax = $video_bg_parallax;
    $parallax_image = $video_bg_url;
    $css_classes[] = ' vc_video-bg-container';
    wp_enqueue_script( 'vc_youtube_iframe_api_js' );
    $wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
    $parallax = $video_bg_parallax;
    $parallax_speed = $parallax_speed_video;
    $parallax_image = $video_bg_url;
    $css_classes[] = 'vc_video-bg-container';
    wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
    wp_enqueue_script( 'vc_jquery_skrollr_js' );
    $wrapper_attributes[] = 'data-vc-parallax="1.5"'; // parallax speed
    $css_classes[] = 'vc_parallax';
    if ( false !== strpos( $parallax, 'fade' ) ) {
        $css_classes[] = 'js-vc_parallax-o-fade';
        $wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
    } elseif ( false !== strpos( $parallax, 'fixed' ) ) {
        $css_classes[] = 'js-vc_parallax-o-fixed';
    }
}

if ( ! empty( $parallax_image ) ) {
    if ( $has_video_bg ) {
        $parallax_image_src = $parallax_image;
    } else {
        $parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
        $parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
        if ( ! empty( $parallax_image_src[0] ) ) {
            $parallax_image_src = $parallax_image_src[0];
        }
    }
    $wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
    $wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

// Row Equal Height
$row_class= '';
if ( ! empty( $equal_height ) ) {
    $flex_row = true;
    $row_class .= ' row-eq-height';
}

if ( ! empty( $full_height ) ) {
    $css_classes[] = 'vc_row-o-full-height';
    if ( ! empty( $columns_placement ) ) {
        $flex_row = true;
        $css_classes[] = 'vc_row-o-columns-' . $columns_placement;
        if ( 'stretch' === $columns_placement ) {
            $css_classes[] = 'vc_row-o-equal-height';
        }
    }
}



$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$css_class .= ($section_bg_color != '' || $it_bg_img != '' || $bg_image_repeat != '' || $bg_image_position != '' || $bg_cover != '') ? ' '.$row_id : "";
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
$wrapper_attributes[] = $id;

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
    
    $output .= '<div class="container'.$cl.''.$zind.'">';
        $output .= '<div class="row'.$row_class.'">'; 
            $output .= wpb_js_remove_wpautop( $content );
        $output .= '</div>';
    $output .= '</div>';
    
    if($bg_overlay == '1'){
        $output .= '<span class="section-overlay" style="background-color:'.esc_attr($overlay_color).'"></span>';
    }
    
    if($video_mp4 != '' || $video_webm != '' || $video_ogv != ''){
        $output .='<div class="video-wrap"><video poster="'.$video_poster.'" preload="auto" loop autoplay muted>
                    <source src="'.$video_mp4.'" type="video/mp4" />
                    <source src="'.$video_webm.'" type="video/webm" />
                    <source src="'.$video_ogv.'" type="video/webm" />
                </video>';
        $output .= '</div>';
    }
    
$output .= '</div>';
$output .= $after_output;

echo $output;