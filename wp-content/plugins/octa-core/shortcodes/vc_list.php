<?php
function it_list_shortcode($atts, $content=null){
    global $list_style;
    global $allowedposttags;
    global $custom_list_style;
    extract(shortcode_atts( array(
        'icon_type'              => 'fontawesome',
        'icon_fontawesome'      => 'fa fa-star-o',
        'icon_openiconic'       => '',
        'icon_typicons'         => '',
        'icon_entypo'           => '',
        'icon_linecons'         => '',
        'icon_pixelicons'       => '',
        'icon_lineaicons'       => '',
        'icon_material'         => '',
        'icon_ios7icons'        => '',
        'icon_color'             => '',
        'use_icon'               => '1',
        'it_animation'           => '',
        'delay'                  => '',
        'duration'               => '',
        'list_link'              => '',
        'list_title'             => '',
        'title_color'            => '',
        'item_color'             => '',
        'el_class'               => ''
    ), $atts));

    $iconClass = $rel = $output = $class = '';

    if( $use_icon == '1' ){
        vc_icon_element_fonts_enqueue( $icon_type );
        $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
    }
    
    $link = $list_link;
    $url = vc_build_link( $link );
    if ( ! empty( $url['rel'] ) ) {
        $rel = ' rel="' . esc_attr( $url['rel'] ) . '"';
    }
    
    if( $list_style == 'list-group' ){
        $class .= 'list-group-item ';
        if( $item_color != '' ){
            $class .= 'list-group-item-'.$item_color.' ';    
        }
    }
    
    $icCss = ( $icon_color != '' ) ? ' style="color:'.$icon_color.'"' : "";    
    $col = ( $title_color != '' ) ? ' style="color:'.$title_color.'"' : "";
    $class .= ($el_class != '') ? ' '.$el_class : "";
    $class .= ($it_animation != '') ? ' fx' : "";
    
    // animation styling...
    $data_anim = ($it_animation != '') ? ' data-animate="'.esc_js($it_animation).'"' : '';
    $data_dur = ($duration != '') ? ' data-animation-duration="'.esc_js($duration).'"' : '';
    $data_del = ($delay != '') ? ' data-animation-delay="'.esc_js($delay).'"' : '';
    $animation = $data_anim.$data_del.$data_dur;
            
    if ( strlen( $link ) > 0 && strlen( $url['url'] ) > 0 ) {
        $output .= '<a class="'.$class.'" href="' . esc_attr( $url['url'] ) . '" ' . $rel . ' title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '" '.$animation.'>';
    } else {
        $output .= '<li class="'.$class.'" '.$animation.'>';
    }
    
    if( $list_title != '' ){
        $output .= '<h4 class="list-group-item-heading"'.$col.'>';
        
        if( $use_icon == '1' ){
            if( $custom_list_style == 'style4' ){
                $output .= '<i class="main-bg '.$iconClass.'"'.$icCss.'></i>';    
            } else {
                $output .= '<i class="main-color '.$iconClass.'"'.$icCss.'></i>';
            }
        }
        
        $output .= esc_html($list_title).'</h4>';    
    }
            
    if( $list_title != '' && $content != '' ){
        $output .= '<p class="list-group-item-text">';
    }
    
    $output .= wp_kses($content,$allowedposttags,null);
    
    if( $list_title != '' && $content != '' ){
        $output .= '</p>';
    }
    
    if ( strlen( $link ) > 0 && strlen( $url['url'] ) > 0 ) {
        $output .= '</a>';    
    } else {
        $output .= '</li>';
    }
        
    
    
    return $output;
  
}                                               
add_shortcode('it_list_item', 'it_list_shortcode');