<?php
function it_iconbox_shortcode($atts, $content=null){
    global $allowedposttags;
    extract(shortcode_atts( array(
        
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
        
        'icbx_style'                => 'icon_box_classic',
        'box_shape'                 => 'square',
        'icbx_align'                => 'text-left',
        'icbx_bg_color'             => '',
        'icbx_border_color'         => '',
        'icbx_hover_bg_color'       => '',
        'icbx_hover_border_color'   => '',
        
        'it_animation'              => '',
        'filter'                    => true,
        'delay'                     => '',
        'duration'                  => '',
        
        'icbx_title'                => '',
        'icbx_title_tag'            => 'h5',
        'icbx_title_color'          => '',
        'icbx_title_hover_color'    => '',
        'icbx_title_border_color'   => '',
        'icbx_title_hover_border_color' => '',
        'icbx_subtitle'             => '',
        'icbx_subtitle_tag'         => 'h6',
        'icbx_subtitle_color'       => '',
        'icbx_subtitle_bg_color'    => '',
        'icbx_sub_hover_color'      => '',
        'icbx_sub_hover_bg_color'   => '',
        
        'content_hover_color'       => '',
        'use_icon'                  => '1',
        'icon_position'             => 'before_content',
        'icon_align'                => 'left',
        'icon_shape'                => 'square',
        'icon_size'                 => 'box-md-icon',
        'icon_color'                => '',
        'icon_bg_color'             => '',
        'icon_border_color'         => '',
        'icon_border_width'         => '',
        'icon_hover_color'          => '',
        'icon_hover_bg_color'       => '',
        'icon_hover_border_color'   => '',
        'icon_hover'                => 'hover_1',
        'icon_typ'                  => '',
        'icon_text'                 => '',
        'icon_image'                => '',
        'icbx_link'                 => '',
        'rel'                       => '',
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
        'el_class'                  => ''
        
    ), $atts));
    
    $output = $iconClass = $custom_stle = $more_pad = $icbx_more = $icol = $icon = $mc = $mb = $mg = $tcol = $ifont = $tscol = $icss = $i_bgcol = $mstyle = $istyle = $ishape = $isize = $boxClass = '';
    
    
    $boxid = uniqid( 'icbx_' );
    $icon_border_width = ( $icon_border_width == '' ) ? '1px' : $icon_border_width;

    if( $icbx_bg_color != '' || $icbx_border_color != '' || $icbx_hover_bg_color != '' || $icbx_hover_border_color != '' ){
        
        if ( $icbx_style != 'icon_box_alt' && $icbx_style != 'icon_box_alt2' ) {
            $custom_stle .= "#{$boxid}{";
                $custom_stle .= ($icbx_bg_color != '') ? "background-color: {$icbx_bg_color};" : "";
                $custom_stle .= ($icbx_border_color != '') ? "border: 1px {$icbx_border_color} solid;" : "";
            $custom_stle .= "}";    
        }        
        
        $custom_stle .= "#{$boxid}.icon_box_alt .box_content,#{$boxid}.icon_box_alt2 .box_content{";
            $custom_stle .= ($icbx_border_color != '') ? "border: 1px {$icbx_border_color} solid;" : "";
        $custom_stle .= "}";
        
        if ( $icbx_style != 'icon_box_alt' && $icbx_style != 'icon_box_alt2' ) {
            $custom_stle .= "#{$boxid}:hover{";
                $custom_stle .= ($icbx_hover_bg_color != '') ? "background-color: {$icbx_hover_bg_color};" : "";
                $custom_stle .= ($icbx_hover_border_color != '') ? "border: 1px {$icbx_hover_border_color} solid;" : "";
            $custom_stle .= "}";    
        }
        
        $custom_stle .= "#{$boxid}.icon_box_alt .box_content,#{$boxid}.icon_box_alt2 .box_content{";
            $custom_stle .= ($icbx_bg_color != '') ? "background-color: {$icbx_bg_color};" : "";
        $custom_stle .= "}";
        
        $custom_stle .= "#{$boxid}.icon_box_alt:hover .box_content,#{$boxid}.icon_box_alt2:hover .box_content{";
            $custom_stle .= ($icbx_hover_bg_color != '') ? "background-color: {$icbx_hover_bg_color};" : "";
        $custom_stle .= "}";
        
        $custom_stle .= "#{$boxid}.icon_box_alt2 .box_content:before,#{$boxid}.icon_box_alt2 .box_content:after{";
            $custom_stle .= ($icbx_border_color != '') ? "border-color: {$icbx_border_color};" : "";
        $custom_stle .= "}";
        
        $custom_stle .= "#{$boxid}:hover .box_content:before,#{$boxid}:hover .box_content:after,#{$boxid}:hover .box_content,#{$boxid}:hover .box_content{";
            $custom_stle .= ($icbx_hover_border_color != '') ? "border-color: {$icbx_hover_border_color};" : "";
        $custom_stle .= "}";
        
        if( $icbx_style == 'box-item' ) {
            $custom_stle .= "#{$boxid}:hover{";
                $custom_stle .= "background-color: transparent;";
            $custom_stle .= "}";
            $custom_stle .= "#{$boxid} .box-bg:after{";
                $custom_stle .= ($icbx_hover_bg_color != '') ? "background-color: {$icbx_hover_bg_color};" : "";
            $custom_stle .= "}";
        }
    }

    if( $icbx_title_color != '' || $icbx_title_hover_color != '' || $icbx_title_border_color != '' || $icbx_title_hover_border_color != '' ){
        $custom_stle .= "#{$boxid} .box_title{";
            $custom_stle .= ($icbx_title_color != '') ? "color: {$icbx_title_color};" : "";
            $custom_stle .= ($icbx_title_border_color != '') ? "border-bottom: 1px {$icbx_title_border_color} solid;padding-bottom:10px" : "";
        $custom_stle .= "}";
        
        $custom_stle .= "#{$boxid}:hover .box_title{";
            $custom_stle .= ($icbx_title_hover_color != '') ? "color: {$icbx_title_hover_color};" : "";
            $custom_stle .= ($icbx_hover_border_color != '') ? "border-bottom-color: {$icbx_hover_border_color};" : "";
        $custom_stle .= "}";
        
        $custom_stle .= "#{$boxid} .box_title a{";
            $custom_stle .= ($icbx_title_color != '') ? "color: {$icbx_title_color};" : "";
        $custom_stle .= "}";
        
        $custom_stle .= "#{$boxid}:hover .box_title a{";
            $custom_stle .= ($icbx_title_hover_color != '') ? "color: {$icbx_title_hover_color};" : "";
        $custom_stle .= "}";
    }

    if( $icbx_subtitle_color != '' || $icbx_subtitle_bg_color != '' || $icbx_sub_hover_color != '' || $icbx_sub_hover_bg_color != '' ){
        $custom_stle .= "#{$boxid} .box_subtitle{";
            $custom_stle .= ($icbx_subtitle_color != '') ? "color: {$icbx_subtitle_color};" : "";
            $custom_stle .= ($icbx_subtitle_bg_color != '') ? "background-color: {$icbx_subtitle_bg_color};" : "";
            $custom_stle .= "}";
            $custom_stle .= "#{$boxid}:hover .box_subtitle{";
            $custom_stle .= ($icbx_sub_hover_color != '') ? "color: {$icbx_sub_hover_color};" : "";
            $custom_stle .= ($icbx_sub_hover_bg_color != '') ? "background-color: {$icbx_sub_hover_bg_color};" : "";
        $custom_stle .= "}";
    }

    if( $content_hover_color != '' ){
        $custom_stle .= "#{$boxid}:hover .box_text{";
            $custom_stle .= ($content_hover_color != '') ? "color: {$content_hover_color};" : "";
        $custom_stle .= "}";
    }

    if( $icon_color != '' || $icon_bg_color != '' || $icon_border_color != '' || $icon_hover_color != '' || $icon_hover_bg_color != '' || $icon_hover_border_color != '' ){
        $custom_stle .= "#{$boxid} .box_icon{";
            $custom_stle .= ( $icon_color != '' ) ? "color: {$icon_color};" : "";
            //$custom_stle .= ( $icon_border_color == '' && $icon_hover_border_color != '' ) ? "border: {$icon_border_width} transparent solid;" : "";
            $custom_stle .= ( $icon_border_color != '' ) ? "border: {$icon_border_width} {$icon_border_color} solid;" : "";
        $custom_stle .= "}";
        $custom_stle .= "#{$boxid} .box_icon:before{";
            $custom_stle .= ( $icon_bg_color != '' ) ? "background-color: {$icon_bg_color};" : "";
        $custom_stle .= "}";
        
        $custom_stle .= "#{$boxid}:hover .box_icon{";
            $custom_stle .= ( $icon_hover_color != '' ) ? "color: {$icon_hover_color};" : "";
            $custom_stle .= ( $icon_hover_border_color != '' ) ? "border-color: {$icon_hover_border_color};" : "";
        $custom_stle .= "}";
        $custom_stle .= "#{$boxid} .box_icon:after{";
            $custom_stle .= ( $icon_hover_bg_color != '' ) ? "background-color: {$icon_hover_bg_color};" : "";
        $custom_stle .= "}";
    }

    if( $more_color != '' || $more_bg_color != '' || $more_border_color != '' || $more_hover_color != '' || $more_hover_bg_color != '' || $more_hover_border_color != '' ){
        $custom_stle .= "#{$boxid} .box_more{";
            $custom_stle .= ($more_color != '') ? "color: {$more_color};" : "";
            $custom_stle .= ($more_bg_color != '') ? "background-color: {$more_bg_color};" : "";
            $custom_stle .= ($more_border_color != '') ? "border: 1px {$more_border_color} solid;" : "";
        $custom_stle .= "}";
        $custom_stle .= "#{$boxid}:hover .box_more{";
            $custom_stle .= ($more_hover_color != '') ? "color: {$more_hover_color};" : "";
            $custom_stle .= ($more_hover_bg_color != '') ? "background-color: {$more_hover_bg_color};" : "";
            $custom_stle .= ($more_hover_border_color != '') ? "border: 1px {$more_hover_border_color} solid;" : "";
        $custom_stle .= "}";
        if( $custom_stle == 'style2' && $more_color != '' ){
            $custom_stle .= "#{$boxid} .box_more.sw-more .dots,#{$boxid} .box_more.sw-more .arrow{";
                $custom_stle .= ($more_color != '') ? "background-color: {$more_color};" : "";
            $custom_stle .= "}";
        }
        if( $more_style == 'style2' && $more_hover_color != '' ){
            $custom_stle .= "#{$boxid}:hover .box_more.sw-more .dots,#{$boxid}:hover .box_more.sw-more .arrow{";
                $custom_stle .= ($more_hover_color != '') ? "background-color: {$more_hover_color};" : "";
            $custom_stle .= "}";
        }
    }    
    
    newFun($custom_stle);
    
    $link = $icbx_link;
    $url = vc_build_link( $link );
    if ( ! empty( $url['rel'] ) ) {
        $rel = ' rel="' . esc_attr( $url['rel'] ) . '"';
    }

    if($use_icon == '1'){
        vc_icon_element_fonts_enqueue( $icon_type );
        if($icon_text == ''){
            $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
        }
    }
    
    $icon_box = ' '.$icon_size.' '.$icon_shape.' '.$icon_position.' '.$icon_hover;
    $icon_box .= ( $icbx_style == 'icon_box_alt' || $icbx_style == 'icon_box_alt2' || $icon_bg_color != '' || $icon_border_color != '' || $icon_hover_bg_color != '' || $icon_hover_border_color != '' ) ? ' icon_pad' : '';
    if( $icon_hover_bg_color != '' || $icon_hover_border_color != ''){
        $icon_box .= ' hovered';    
    }
    if( $icbx_style == 'box-item' ) {
        $icon_box .= ' box-ic';    
    }
    
    if ( $icon_typ == 'text' ) {
        $icon = '<span>'.$icon_text.'</span>';
        $icon_box .= ' icon_pad ic-txt';
    } else if ( $icon_typ == 'image' ){
        $img_id = preg_replace( '/[^\d]/', '', $icon_image );
        $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => 'full' ) );
        $img_output = $img['thumbnail'];
        $icon_box .= ' icon_pad ic-img';
        $icon = '<span>'.$img_output.'</span>';
    } else {
        $icon = "<i class='{$iconClass}'></i>";
    }   

    // animation styling...
    $data_anim = ($it_animation != '') ? ' data-animate="'.esc_js($it_animation).'"' : '';
    $data_dur = ($duration != '') ? ' data-animation-duration="'.esc_js($duration).'"' : '';
    $data_del = ($delay != '') ? ' data-animation-delay="'.esc_js($delay).'"' : '';
    $animation = $data_anim.$data_del.$data_dur;
    
    $boxClass .= $icbx_style;
    $boxClass .= ( $el_class != '' ) ? ' '.$el_class : '';
    $boxClass .= ( $box_shape != '' ) ? ' '.$box_shape : '';
    $boxClass .= ( $icon_align != '' ) ? ' icon-'.$icon_align : '';
    $boxClass .= ( $it_animation != '' ) ? ' fx' : '';
    $boxClass .= ( $icbx_align != '' ) ? ' '.$icbx_align : '';
    $boxClass .= ( $icbx_style != 'icon_box_alt' && $icbx_style != 'icon_box_alt2' && ($icbx_bg_color != '' || $icbx_border_color != '' || $icbx_hover_bg_color != '' || $icbx_hover_border_color != '') ) ? ' p-a-4' : '';
    $more_pad .= ( $more_bg_color != '' || $more_border_color != '' ) ? ' more_pad' : '';
    
    $subClass = ($icbx_subtitle_bg_color != '') ? ' sub_pad' : '';
    
    // begin icon boxes...
    $output .= "<div id='{$boxid}' class='icon_box {$boxClass}'{$animation}>";

        if ( strlen( $link ) > 0 && strlen( $url['url'] ) > 0 ) {
            $box_title = '<a href="' . esc_attr( $url['url'] ) . '" ' . $rel . ' title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">'.esc_html($icbx_title).'</a>';
        } else {
            $box_title = esc_html( $icbx_title );
        }
        
        if( $icbx_style == 'box-item' ) {
            $output .= "<div class='box-bg'></div>";
        }
                
        if ( $use_icon == '1' && $icon_position != 'before_title' ) {
            $output .= "<div class='box_icon{$icon_box}'>{$icon}</div>";
        }
        
        $output .= "<div class='box_content'>";
            
            if ( $icbx_title != '' ) {
                $output .= "<{$icbx_title_tag} class='box_title'>";
                    if ( $use_icon == '1' && $icon_position == 'before_title' ) {
                        $output .= "<div class='box_icon{$icon_box}'>{$icon}</div>";
                    }
                    $output .= $box_title;
                $output .="</{$icbx_title_tag}>";
            }
            
            if ( $icbx_subtitle != '' ) {
                $output .= "<{$icbx_subtitle_tag} class='box_subtitle{$subClass}'>".esc_html($icbx_subtitle)."</{$icbx_subtitle_tag}>";    
            }
            
            if ( $content != '' ) {
                $output .= '<p class="box_text">'.wp_kses($content,$allowedposttags,null).'</p>';
            }
                        
            if ( $show_more == '1' && strlen( $link ) > 0 && strlen( $url['url'] ) > 0 ) {
                $more = esc_url( $icbx_more );
                $mtxt = esc_attr( $more_text );
                if($more_style == 'style2'){
                    $output .= "<a class='sw-more main-bg box_more {$more_align} {$more_style}{$more_pad}' href='" . esc_attr( $url['url'] ) . "' {$rel} title='" . esc_attr( $url['title'] ) . "' target='" . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . "'><span class='dots'></span><span class='dots'></span><span class='dots'></span><span class='arrow'></span><span class='arrow'></span><span class='arrow'></span> </a>";
                } else if($more_style == 'style3') {
                    $output .= "<a class='more-btn btn main-bg btn-sm box_more {$more_align} {$more_style}{$more_pad}' href='" . esc_attr( $url['url'] ) . "' {$rel} title='" . esc_attr( $url['title'] ) . "' target='" . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . "'><span>{$mtxt}</span></a>";
                } else {
                    $output .= "<a class='main-color box_more {$more_align} {$more_style}{$more_pad}' href='" . esc_attr( $url['url'] ) . "' {$rel} title='" . esc_attr( $url['title'] ) . "' target='" . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . "'>{$mtxt}</a>";
                } 
            }
            
        $output .= '</div>';
                    
    $output .= '</div>'; 
     
    return $output; 
 
}
add_shortcode('it_iconbox', 'it_iconbox_shortcode'); 
