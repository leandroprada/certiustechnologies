<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $el_class
 * @var $value
 * @var $units
 * @var $color
 * @var $custom_color
 * @var $label_value
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Vc_Pie
 */
$title = $el_class = $value = $units = $color = $icon = $ico = $custom_color = $label_value = $css = '';
$atts = $this->convertOldColorsToNew( $atts );
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'vc_pie' );

$colors = array(
	'blue'              => '#5472d2',
	'turquoise'         => '#00c1cf',
	'pink'              => '#fe6c61',
	'violet'            => '#8d6dc4',
	'peacoc'            => '#4cadc9',
	'chino'             => '#cec2ab',
	'mulled-wine'       => '#50485b',
	'vista-blue'        => '#75d69c',
	'orange'            => '#f7be68',
	'sky'               => '#5aa1e3',
	'green'             => '#6dab3c',
	'juicy-pink'        => '#f4524d',
	'sandy-brown'       => '#f79468',
	'purple'            => '#b97ebb',
	'black'             => '#2a2a2a',
	'grey'              => '#ebebeb',
	'white'             => '#ffffff',
    'icon_type'         => 'fontawesome',
    'icon_fontawesome'  => 'fa fa-sun-o',
    'icon_openiconic'   => '',
    'icon_typicons'     => '',
    'icon_entypo'       => '',
    'icon_linecons'     => '',
    'icon_pixelicons'   => '',
    'icon_lineaicons'   => '',
    'icon_material'     => 'vc-material vc-material-3d_rotation',
    'icon_ios7icons'    => '',
    'use_icon'          => '',
    'pie_style'         => 'simple',
);

if ( 'custom' === $color ) {
	$color = $custom_color;
} else {
	$color = isset( $colors[ $color ] ) ? $colors[ $color ] : '';
}

if ( ! $color ) {
	$color = $colors['grey'];
}

if($use_icon == '1'){
    vc_icon_element_fonts_enqueue( $icon_type );
    $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
    $ico = '<i class="wpb_pie_chart_icon main-color '.$iconClass.'"></i>';
}

$class_to_filter = 'vc_pie_chart wpb_content_element';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$output = '<div class= "' . esc_attr( $css_class ) . ' ' .$pie_style. '" data-pie-value="' . esc_attr( $value ) . '" data-pie-label-value="' . esc_attr( $label_value ) . '" data-pie-units="' . esc_attr( $units ) . '" data-pie-color="' . esc_attr( $color ) . '">';
$output .= '<div class="wpb_wrapper">';

if ( '' !== $title && $pie_style == 'style3' ) {
    $output .= '<h4 class="wpb_heading wpb_pie_chart_heading main-color">' . $title . '</h4>';
}

$output .= '<div class="vc_pie_wrapper">';
$output .= '<span class="vc_pie_chart_back" style="border-color: ' . esc_attr( $color ) . '"></span>';
$output .= $ico;
$output .= '<span class="vc_pie_chart_value"></span>';
$output .= '<canvas width="101" height="101"></canvas>';
$output .= '</div>';

if ( '' !== $title && $pie_style != 'style3' ) {
	$output .= '<h4 class="wpb_heading wpb_pie_chart_heading main-color">' . $title . '</h4>';
}

$output .= '</div>';
$output .= '</div>';

echo $output;
