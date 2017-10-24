<?php
function it_counter_shortcode($atts, $content=null){
    global $allowedposttags;
    extract(shortcode_atts( array(
        'item_title'                => '',
        'item_value'                => '1000',  
        'icon_type'                 => 'fontawesome',
        'icon_fontawesome'          => 'fa fa-star-o',
        'icon_openiconic'           => '',
        'icon_typicons'             => '',
        'icon_entypo'               => '',
        'icon_linecons'             => '',
        'icon_pixelicons'           => '',
        'icon_lineaicons'           => '',
        'icon_material'             => '',
        'icon_ios7icons'            => '',
        'init_value'                => '0',
        'item_timer'                => '0',
        'el_class'                  => '',
        'numbers_color'             => '',
        'numbers_size'              => '',
        'counter_align'             => 'text-center',
        'num_theme'                 => 'minimal',
        'item_before'               => '',
        'item_after'                => '',
        'item_font_size'            => '25px',
        'item_num_color'            => '',
        'item_font_weight'          => 'normal',
        'title_color'               => '',
        'title_bg_color'            => '',
        'title_hover_bg_color'      => '',
        'title_size'                => '',
        'title_font_weight'         => '',
        'icon_color'                => '',
        'icon_size'                 => '',
        'bx_bg_color'               => '',
        'bx_border_width'           => '',
        'bx_border_color'           => '',
        'bx_border_style'           => '',
        'bx_hover_border_color'     => '',
        'bx_hover_bg_color'         => '',
        'bx_border_color'           => '',
        'content_hover_color'       => '',
        'title_hover_color'         => '',
        'numbers_hover_color'       => '',
        'icon_hover_color'          => '',
        'use_icon'                  => '1',
        'counter_shape'             => 'square',
        'it_animation'              => '',
        'delay'                     => '',
        'duration'                  => '',
        'show_more'                 => '',
        'more_text'                 => 'Read More',
        'more_style'                => '',
        'more_align'                => 'left',
        'more_color'                => '',
        'more_bg_color'             => '',
        'more_border_color'         => '',
        'more_hover_color'          => '',
        'more_hover_bg_color'       => '',
        'more_hover_border_color'   => '',
    ), $atts));
    
    $cntrid = uniqid( 'cntr_' );
    
    $output = $iconClass = $custom_stle = $col = $size = $num_col = $num_size  = $icon_col = $ic_size = $fsize = $data_anim = $bx_border = $bx_bg = $fun_number = $tafter = $tbefore = $tscol = $ncolor = $nweight = $data_dur = $data_del = '';
      
    if($use_icon == '1'){
        vc_icon_element_fonts_enqueue( $icon_type );
        $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
    }
        
    $custom_stle .= "#{$cntrid}{";
        $custom_stle .= ($bx_bg_color != '') ? "background-color: {$bx_bg_color};" : "";
        $custom_stle .= ($bx_border_width != '' && $bx_border_color != '' && $bx_border_style != '') ? "border: {$bx_border_width}px {$bx_border_color} {$bx_border_style};" : "";
    $custom_stle .= "}";
    
    if($bx_hover_bg_color != '' || $bx_hover_border_color != '' ){
        $custom_stle .= "#{$cntrid}:hover{";
            $custom_stle .= ($bx_hover_bg_color != '') ? "background-color: {$bx_hover_bg_color};" : "";
            if($bx_border_width != '' && $bx_border_color != '' && $bx_border_style != ''){
                $custom_stle .= "border-color: {$bx_hover_border_color};";
            }
        $custom_stle .= "}";
    }
    
    $custom_stle .= "#{$cntrid} .counter-title{";
        $custom_stle .= ($title_color != '') ? "color: {$title_color};" : "";
        $custom_stle .= ($title_bg_color != '') ? "background-color: {$title_bg_color};" : "";
        $custom_stle .= ($title_size != '') ? "font-size: {$title_size}px;" : "";
        $custom_stle .= ($title_font_weight != '') ? "font-weight: {$title_font_weight};" : "";
    $custom_stle .= "}";
    
    $custom_stle .= "#{$cntrid}:hover .counter-title{";
        $custom_stle .= ($title_hover_color != '') ? "color: {$title_hover_color};" : "";
        $custom_stle .= ($title_hover_bg_color != '') ? "background-color: {$title_hover_bg_color};" : "";
    $custom_stle .= "}";
    
    $custom_stle .= "#{$cntrid}:hover .counter-content{";
        $custom_stle .= ($content_hover_color != '') ? "color: {$content_hover_color};" : "";
    $custom_stle .= "}";
    
    $custom_stle .= "#{$cntrid}:hover .counter-number{";
        $custom_stle .= ($numbers_hover_color != '') ? "color: {$numbers_hover_color};" : "";
    $custom_stle .= "}";
    
    $custom_stle .= "#{$cntrid}:hover .counter-icon{";
        $custom_stle .= ($icon_hover_color != '') ? "color: {$icon_hover_color};" : "";
    $custom_stle .= "}";
    
    $custom_stle .= "#{$cntrid} .counter-number{";
        $custom_stle .= ($numbers_color != '') ? "color: {$numbers_color};" : "";
        $custom_stle .= ($numbers_size != '') ? "font-size: {$numbers_size}px;" : "";
        $custom_stle .= ($item_font_weight != '') ? "font-weight: {$item_font_weight};" : "";
    $custom_stle .= "}";
    
    $custom_stle .= "#{$cntrid} .counter-icon{";
        $custom_stle .= ($icon_color != '') ? "color: {$icon_color};" : "";
        $custom_stle .= ($icon_size != '') ? "font-size: {$icon_size}px;" : "";
    $custom_stle .= "}";
    
    if( $more_color != '' || $more_bg_color != '' || $more_border_color != '' || $more_hover_color != '' || $more_hover_bg_color != '' || $more_hover_border_color != '' ){
        $custom_stle .= "#{$cntrid} .box_more{";
            $custom_stle .= ($more_color != '') ? "color: {$more_color};" : "";
            $custom_stle .= ($more_bg_color != '') ? "background-color: {$more_bg_color};" : "";
            $custom_stle .= ($more_border_color != '') ? "border: 1px {$more_border_color} solid;" : "";
        $custom_stle .= "}";
        $custom_stle .= "#{$cntrid}:hover .box_more{";
            $custom_stle .= ($more_hover_color != '') ? "color: {$more_hover_color};" : "";
            $custom_stle .= ($more_hover_bg_color != '') ? "background-color: {$more_hover_bg_color};" : "";
            $custom_stle .= ($more_hover_border_color != '') ? "border: 1px {$more_hover_border_color} solid;" : "";
        $custom_stle .= "}";
        if( $custom_stle == 'style2' && $more_color != '' ){
            $custom_stle .= "#{$cntrid} .box_more.sw-more .dots,#{$cntrid} .box_more.sw-more .arrow{";
                $custom_stle .= ($more_color != '') ? "background-color: {$more_color};" : "";
            $custom_stle .= "}";
        }
        if( $more_style == 'style2' && $more_hover_color != '' ){
            $custom_stle .= "#{$cntrid}:hover .box_more.sw-more .dots,#{$cntrid}:hover .box_more.sw-more .arrow{";
                $custom_stle .= ($more_hover_color != '') ? "background-color: {$more_hover_color};" : "";
            $custom_stle .= "}";
        }
    } 
    
    newFun($custom_stle);
            
    $tbefore = ($item_before != '') ? '<span>'.$item_before.'</span> ' : "";
    $tafter = ($item_after != '') ? ' <span>'.$item_after.'</span>' : "";
    
    // animation styling...
    $fx = ($it_animation != '') ? 'fx' : "";
    if($it_animation != ''){$data_anim = ' data-animate="'.esc_js($it_animation).'"';}
    if($duration != ''){$data_dur = ' data-animation-duration="'.esc_js($duration).'"';}
    if($delay != ''){$data_del = ' data-animation-delay="'.esc_js($delay).'"';}
    $animation = $data_anim.$data_del.$data_dur;
    
    $counter_class = 'counter-box ';
    $counter_class .= $fx.' '.$counter_align.' '.$counter_shape.' '.$el_class;
    $counter_class .= ($bx_bg_color != '' || $bx_border_color != '') ? ' count-padd' : "";
        
    $output .= "<div id='{$cntrid}' class='{$counter_class}'{$animation}>";

        if($use_icon == '1'){
            $output .= '<div class="counter-icon">';
                $output .= "<i class='{$iconClass}'></i>";
            $output .= '</div>';
        }

        $output .= $tbefore.' <span class="counter-number odometer" data-value="'.esc_js($item_value).'" data-timer="'.esc_js($item_timer).'" data-theme="'.esc_js($num_theme).'"></span>'.$tafter;

        if($item_title != ''){
            $output .= '<h4 class="counter-title">';
                $output .= esc_html($item_title);
            $output .= '</h4>';
        }

        $output .= ($content != '') ? '<p class="counter-content">'.wp_kses($content,$allowedposttags,null).'</p>' : "";
        
        if ( $show_more == '1' ) {
            $more = esc_url( $icbx_more );
            $mtxt = esc_attr( $more_text );
            if($more_style == 'style2'){
                $output .= "<a class='sw-more main-bg box_more {$more_align} {$more_style}{$more_pad}' href='{$more}'><span class='dots'></span><span class='dots'></span><span class='dots'></span><span class='arrow'></span><span class='arrow'></span><span class='arrow'></span> </a>";
            } else if($more_style == 'style3') {
                $output .= "<a class='more-btn btn main-bg btn-sm box_more {$more_align} {$more_style}{$more_pad}' href='{$more}'><span>{$mtxt}</span></a>";
            } else {
                $output .= "<a class='main-color box_more {$more_align} {$more_style}{$more_pad}' href='{$more}'>{$mtxt}</a>";
            } 
        }
          
    $output .= '</div>';

    return $output; 
 
}
add_shortcode('it_counter', 'it_counter_shortcode');





