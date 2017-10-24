<?php
function it_divider_shortcode($atts, $content=null){

    extract(shortcode_atts( array(
        'divider_class'          => 'short',
        'divider_color'          => '',
        'el_class'               => '',
        'it_animation'           => '',
        'delay'                  => '',
        'duration'               => '',
        'icon_shape'             => '',
        'icon_align'             => '',
        'icon_type'              => 'fontawesome',
        'icon_fontawesome'       => 'fa fa-star-o',
        'icon_openiconic'        => '',
        'icon_typicons'          => '',
        'icon_entypo'            => '',
        'icon_linecons'          => '',
        'icon_pixelicons'        => '',
        'icon_lineaicons'        => '',
        'icon_material'          => 'vc-material vc-material-3d_rotation',
        'icon_ios7icons'         => '',
        'use_icon'               => '1',
        'div_i_color'            => '',
        'div_bg_color'           => '',
        'div_border_color'       => '',
    ), $atts));
    
    $output = $custom_stle = $icol = $class = '';
    
    $divid = uniqid( 'divd_' );
    
    $custom_stle .= "#{$divid}:before,#{$divid}:after{";
        $custom_stle .= ($divider_color != '') ? "background-color: {$divider_color};" : "";
    $custom_stle .= "}";
    
    $custom_stle .= "#{$divid} i{";
        $custom_stle .= ($div_i_color != '') ? "color: {$div_i_color};" : "";
        $custom_stle .= ($div_bg_color != '') ? "background-color: {$div_bg_color};" : "";
        $custom_stle .= ($div_border_color != '') ? "border-color: {$div_border_color};" : "";
    $custom_stle .= "}";
    
    newFun($custom_stle);    
    
    $class .= 'divider';
    $class .= ( $divider_class != '' ) ? ' '.$divider_class : "";
    $class .= ( $el_class != '' ) ? ' '.$el_class : "";
    $class .= ( $it_animation != '' ) ? ' fx' : '';        
    
    if($use_icon == '1'){
        vc_icon_element_fonts_enqueue( $icon_type );
        $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
        $iconClass .= ' '.$icon_shape.' '.$icon_align;
        $iconClass .= ( $div_bg_color != '' ) ? " filled" : "";
    }
        
    // animation styling...
    $data_anim = ($it_animation != '') ? ' data-animate="'.esc_js($it_animation).'"' : '';
    $data_dur = ($duration != '') ? ' data-animation-duration="'.esc_js($duration).'"' : '';
    $data_del = ($delay != '') ? ' data-animation-delay="'.esc_js($delay).'"' : '';
    $animation = $data_anim.$data_del.$data_dur;

    $output = '<div id="'.$divid.'" class="'.$class.'" '.$animation.'>';
    if( $divider_class != 'gradAnim' && $use_icon == '1' ){
        $output .= '<i class="'.$iconClass.'"></i>';
    }
    
    $output .='</div>';
        
    return $output; 
 
}
add_shortcode('it_divider', 'it_divider_shortcode');