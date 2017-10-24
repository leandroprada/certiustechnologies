<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $link
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Video
 */
$title = $link = $el_class = $css = $up_video = $vc_video_poster = $vc_video_mp4 = $vc_video_webm = $vc_video_ogv = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

/*if ( '' === $link ) {
	return null;
}*/
$el_class = $this->getExtraClass( $el_class );

$video_w = ( isset( $content_width ) ) ? $content_width : 500;
$video_h = $video_w / 1.61; //1.61 golden ratio
/** @var WP_Embed $wp_embed */
global $wp_embed;
$embed = '';
if ( is_object( $wp_embed ) ) {
	$embed = $wp_embed->run_shortcode( '[embed width="' . $video_w . '"' . $video_h . ']' . $link . '[/embed]' );
}
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_video_widget wpb_content_element' . $el_class . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$output = '';
$output .= '<div class="' . esc_attr( $css_class ) . '">';
		$output .= '<div class="wpb_wrapper">';
			$output .= wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_video_heading' ) );
            if($up_video == '1'){
                if ($vc_video_poster != '' || $vc_video_webm != '' || $vc_video_ogv != ''){
                    $output .= '<div><video poster="'.$vc_video_poster.'" width="100%" loop controls>
                            <source src="'.$vc_video_mp4.'" type="video/mp4">
                            <source src="'.$vc_video_webm.'" type="video/webm">
                            <source src="'.$vc_video_ogv.'" type="video/webm">
                        </video>
                    </div>';
                }
            }else{
                $output .= '<div class="wpb_video_wrapper">' . $embed . '</div>'; 
            }
            
		$output .= '</div>';
	$output .= '</div>';

echo $output;
