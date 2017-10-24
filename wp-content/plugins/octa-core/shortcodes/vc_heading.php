<?php 
function it_heading_shortcode($atts, $content=null){

    global $allowedposttags;
    extract(shortcode_atts( array(
        'icon_type'         => 'fontawesome',
        'icon_fontawesome'  => 'fa fa-star-o',
        'icon_openiconic'   => '',
        'icon_typicons'     => '',
        'icon_entypo'       => '',
        'icon_linecons'     => '',
        'icon_pixelicons'   => '',
        'icon_lineaicons'   => '',
        'icon_material'     => '',
        'icon_ios7icons'    => '',
        
        'heading_style'     => 'main',
        'heading_align'     => 'left',
        
        'it_animation'      => '',
        'delay'             => '',
        'duration'          => '',
        
        'tag'               => 'h3',
        'size'              => '',
        'weight'            => '400',
        'family'            => '',
        
        'sub_text'          => '',
        'sub_size'          => '',
        'sub_color'         => '',
        'sub_weight'        => '',
        'sub_family'        => 'Playfair Display',
        'sub_position'      => 'above',
        'sub_font_style'    => 'italic',        
        
        'use_icon'          => '',
        'icon_color'        => '',
        'el_class'          => '',
    ), $atts));
    
    $headid = uniqid( 'head_' );
    
    $output = $iconClass = '';
    
    $custom_stle = "#{$headid} {$tag}{";
        $custom_stle .= ($family != '') ? "font-family: {$family};" : "";
        $custom_stle .= ($size != '') ? "font-size: {$size}px;" : "";
        $custom_stle .= ($weight != '') ? "font-weight: {$weight};" : "";
    $custom_stle .= "}";
    
    $custom_stle .= "#{$headid} p{";
        $custom_stle .= ($sub_color != '') ? "color: {$sub_color};" : "";
        $custom_stle .= ($sub_family != '') ? "font-family: {$sub_family};" : "";
        $custom_stle .= ($sub_size != '') ? "font-size: {$sub_size}px;" : "";
        $custom_stle .= ($sub_weight != '') ? "font-weight: {$sub_weight};" : "";
        $custom_stle .= ($sub_font_style != '') ? "font-style: {$sub_font_style};" : "";
    $custom_stle .= "}";
    
    if($icon_color != ''){
        $custom_stle .= "#{$headid} i{";
            $custom_stle .= ($icon_color != '') ? "color: {$icon_color};" : "";
        $custom_stle .= "}";
    }    
        
    newFun($custom_stle);
        
    $class = 'heading';
    $class .= ' '.$heading_style;
    $class .= ($it_animation != '') ? " fx" : "";
    $class .= ($heading_align != '') ? " ".$heading_align : "";
    $class .= ($el_class != '') ? " ".$el_class : "";
    $class .= ($use_icon == '1') ? " with-icon" : "";
    
    if($use_icon == '1'){
        vc_icon_element_fonts_enqueue( $icon_type );
        $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
    }
        
    shortCodeEnq($family);
    shortCodeEnq($sub_family);
    
    // animation styling...
    $data_anim = ($it_animation != '') ? ' data-animate="'.esc_js($it_animation).'"' : '';
    $data_dur = ($duration != '') ? ' data-animation-duration="'.esc_js($duration).'"' : '';
    $data_del = ($delay != '') ? ' data-animation-delay="'.esc_js($delay).'"' : '';
    $animation = $data_anim.$data_del.$data_dur;
    
    // headings...
    $output .= "<div id='{$headid}' class='{$class}' {$animation}>";
    
    if($use_icon == '1' && ($heading_style == 'style3' || $heading_style == 'style4') ){
        $output .= '<span class="head-ico"><i class="'.$iconClass.' main-color"></i></span>';
    }
    
    if( $sub_text != '' && $sub_position == 'above' ){
        $output .= '<p class="sub_head">';
            $output .= wp_kses($sub_text,$allowedposttags,null);
        $output .= '</p>';
    }    
    
    if( $content != ''){
        $output .= "<{$tag} class='head_tag main-color'>";
            $output .= wp_kses($content,$allowedposttags,null);
        $output .= "</{$tag}>";
    }
    
    if( $sub_text != '' && $sub_position == 'below' ){
        $output .= '<p class="sub_head">';
            $output .= wp_kses($sub_text,$allowedposttags,null);
        $output .= '</p>';
    }
    
    if($use_icon == '1' && $heading_style != 'style3' && $heading_style != 'style4' ){
        $output .= '<span class="head-ico"><i class="'.$iconClass.' main-color"></i></span>';
    }
    
    $output .='</div>';
        
    return $output; 
 
}
add_shortcode('it_heading', 'it_heading_shortcode');