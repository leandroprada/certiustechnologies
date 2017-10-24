<?php
function it_icon_shortcode($atts, $content=null){
     
    extract(shortcode_atts( array(
        'icon_type'              => 'fontawesome',
        'icon_fontawesome'       => 'fa fa-star-o',
        'icon_openiconic'        => '',
        'icon_typicons'          => '',
        'icon_entypo'            => '',
        'icon_linecons'          => '',
        'icon_pixelicons'        => '',
        'icon_lineaicons'        => '',
        'icon_material'          => '',
        'icon_ios7icons'         => '',
        'color'                  => '',
        'bg_color'               => '',
        'border_color'           => '',
        'border_width'           => '',
        'hover_color'            => '',
        'hover_bg_color'         => '',
        'hover_border_color'     => '',
        'size'                   => 'md-icon',
        'shape'                  => 'square',
        'link'                   => '',
        'hover_anim'             => 'anim0',
        'it_animation'           => '',
        'delay'                  => '',
        'duration'               => '',
        'use_icon'               => '1',
        'el_class'               => ''
    ), $atts));
    
    $output = $custom_stle = $rel = $iconClass = '';
        
    $icid = uniqid( 'oc_ic_' );
    
    
    $custom_stle .= "#{$icid} i{";
        $custom_stle .= ($color != '') ? "color: {$color};" : "";
        $custom_stle .= ($bg_color != '') ? "background-color: {$bg_color};" : "";
        $custom_stle .= ($border_width != '') ? "border: {$border_width}px {$border_color} solid;" : "";
    $custom_stle .= "}";
    
    $custom_stle .= "#{$icid}:hover i.alt{";
        $custom_stle .= ($hover_color != '') ? "color: {$hover_color};" : "";
        $custom_stle .= ($hover_bg_color != '') ? "background-color: {$hover_bg_color};" : "";
        $custom_stle .= ($hover_border_color != '') ? "border-color: {$hover_border_color};" : "";
    $custom_stle .= "}";
    
    newFun($custom_stle);
    
    
    // animation styling...
    $data_anim = ($it_animation != '') ? ' data-animate="'.esc_js($it_animation).'"' : '';
    $data_dur = ($duration != '') ? ' data-animation-duration="'.esc_js($duration).'"' : '';
    $data_del = ($delay != '') ? ' data-animation-delay="'.esc_js($delay).'"' : '';
    $animation = $data_anim.$data_del.$data_dur;

    $class = 'oc-icon';
    $class .= ( $it_animation != '' ) ? ' fx' : '';
    $class .= ( $el_class != '' ) ? ' '.$el_class : "";
    $class .= ( $hover_anim != '' ) ? ' '.$hover_anim : "";
    $class .= ( $border_width != '' ) ? ' bordered' : "";
    $class .= ' '.$size;
  
    $url = vc_build_link( $link );
    if ( ! empty( $url['rel'] ) ) {
        $rel = ' rel="' . esc_attr( $url['rel'] ) . '"';
    }
  
    if($use_icon == '1'){
      vc_icon_element_fonts_enqueue( $icon_type );
      $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
    }
    
    $iconClass .= ' '.$shape;
    
    if ( strlen( $link ) > 0 && strlen( $url['url'] ) > 0 ) {
        $output .= '<a id="'.$icid.'" class="'.$class.'" href="' . esc_attr( $url['url'] ) . '" ' . $rel . ' title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '"'.$animation.'>';    
    } else {
        $output .= '<span id="'.$icid.'" class="'.$class.'"'.$animation.'>';
    }

        $output .= '<i class="'.$iconClass.'"></i>';
    
    if ( strlen( $link ) > 0 && strlen( $url['url'] ) > 0 ) {
        $output .= '</a>';
    } else {
        $output .= '</span>';
    }
    
    return $output;
  
}                                               
add_shortcode('it_icon', 'it_icon_shortcode');