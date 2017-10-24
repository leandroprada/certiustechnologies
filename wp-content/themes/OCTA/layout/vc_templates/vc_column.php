<?php  
/**
 * @var $this WPBakeryShortCode_VC_Column
 */
 if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
$output = $fx = $animation = $anim = $data_anim = $data_dur = $data_del = $el_class = $width = $wid = $offset = '';  
extract( shortcode_atts( array(
	'el_class' => '',
	'width' => '1/1',
	'css' => '',
	'offset' => '',
    'it_animation'        => '',
    'delay'               => '',
    'duration'            => '',
), $atts ) );

// animation styling...
if($it_animation != ''){
    $fx = 'fx ';
    $anim = $it_animation;
}
if($anim != ''){$data_anim = ' data-animate="'.esc_js($anim).'"';}
if($duration != ''){$data_dur = ' data-animation-duration="'.esc_js($duration).'"';}
if($delay != ''){$data_del = ' data-animation-delay="'.esc_js($delay).'"';}
$animation = $data_anim.$data_del.$data_dur;

$wid = get_vc_it_column( $width ).' ';
$wid = it_column_offset_class_merge( $offset, $width );
$css_classes = array(
    $wid,
    $fx,
    $this->getExtraClass( $el_class ),
    vc_shortcode_custom_css_class( $css )
);     

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') )) {
    $css_classes[]=esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) );
}

$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) .'"';
$wrapper_attributes[] = $animation; 

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';    
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';

echo $output;