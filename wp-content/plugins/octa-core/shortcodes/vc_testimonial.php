<?php
function it_testimonial_shortcode($atts, $content=null){
    global $allowedposttags;
    global $block_style;
    global $block_arrange;
    global $block_type;
    global $grid_cols;
    extract(shortcode_atts( array(
        'author'                => '',
        'author_color'          => '',
        'author_size'           => '12',
        
        'slogan'                => '',
        'slogan_color'          => '',
        'slogan_size'           => '12',
        
        'cont_font_family'      => '',
        'content_size'          => '14',
        'font_style'            => 'normal',
        
        'box_align'             => '',
        
        'image'                 => '',
        'img_shape'             => 'rounded',
        'img_size'              => '55x55',
        
        'bg_color'              => '',
        'border_color'          => '',
        'border_width'          => '',
        'hover_bg_color'        => '',
        'hover_border_color'    => '',
        
        'padd_top'              => '',
        'padd_right'            => '',
        'padd_bottom'           => '',
        'padd_left'             => '',
        'margin_top'            => '',
        'margin_right'          => '',
        'margin_bottom'         => '',
        'margin_left'           => '',
        
        'el_class'              => ''
    ), $atts));
    
    if( $img_size == '40x40' || $img_size == '55x55' || $img_size == '70x70' ){
        $size = 'thumbnail';
    }else{
        $size = $img_size;
    }
    
    $boxid = uniqid('itm-', '');
    $custom_stle = '';
    $img_id = preg_replace( '/[^\d]/', '', $image );
    $thumb =   wp_get_attachment_image_src( $img_id,$size ); 
    
    if( $bg_color != '' || $border_color != '' || $padd_top != '' || $padd_right != '' || $padd_bottom != '' || $padd_left != '' || $margin_top != '' || $margin_right != '' || $margin_bottom != '' || $margin_left != '' ){        
        $custom_stle .= ".{$boxid}{";
            $custom_stle .= ($bg_color != '') ? "background-color: {$bg_color};" : "";
            $custom_stle .= ($border_color != '' && $border_width != '') ? "border: {$border_width}px {$border_color} solid;" : "";
            $custom_stle .= ($padd_top != '') ? "padding-top: {$padd_top}px;" : "";
            $custom_stle .= ($padd_right != '') ? "padding-right: {$padd_right}px;" : "";
            $custom_stle .= ($padd_bottom != '') ? "padding-bottom: {$padd_bottom}px;" : "";
            $custom_stle .= ($padd_left != '') ? "padding-left: {$padd_left}px;" : "";
            $custom_stle .= ($margin_top != '') ? "margin-top: {$margin_top}px;" : "";
            $custom_stle .= ($margin_right != '') ? "margin-right: {$margin_right}px;" : "";
            $custom_stle .= ($margin_bottom != '') ? "margin-bottom: {$margin_bottom}px;" : "";
            $custom_stle .= ($margin_left != '') ? "margin-left: {$margin_left}px;" : "";
        $custom_stle .= "}";
    }
    if( $hover_bg_color != '' || $hover_border_color != ''){
        $custom_stle .= ".{$boxid}:hover{";
            $custom_stle .= ($hover_bg_color != '') ? "background-color: {$hover_bg_color};" : "";
            $custom_stle .= ($hover_border_color != '') ? "border-color: {$hover_border_color};" : "";
        $custom_stle .= "}";    
    }

    if( $author_color != '' || $author_size != ''){
        $custom_stle .= ".{$boxid} .testi_author{";
            $custom_stle .= ($author_color != '') ? "color: {$author_color};" : "";
            $custom_stle .= ($author_size != '') ? "font-size: {$author_size}px;" : "";    
        $custom_stle .= "}";
    }
    
    if( $slogan_color != '' || $slogan_size != ''){
        $custom_stle .= ".{$boxid} .testi_slogan{";
            $custom_stle .= ($slogan_color != '') ? "color: {$slogan_color};" : "";
            $custom_stle .= ($slogan_size != '') ? "font-size: {$slogan_size}px;" : "";    
        $custom_stle .= "}";
    }
    if( $cont_font_family != '' || $content_size != '' || $font_style != '' ){
        $custom_stle .= ".{$boxid} .testi_desc{";
            $custom_stle .= ($cont_font_family != '') ? "font-family: {$cont_font_family};" : "";
            $custom_stle .= ($content_size != '') ? "font-size: {$content_size}px;" : "";
            $custom_stle .= ($font_style != '') ? "font-style: {$font_style};" : "";    
        $custom_stle .= "}";
    } 
       
    newFun($custom_stle);
    
    $class = "oc-block {$boxid}";
    $class .= ( $el_class != '' ) ? ' '.$el_class : '';
    $class .= ( $box_align != '' ) ? ' '.$box_align : '';
    $class .= ( $block_type == 'grid' ) ? ' col-md-'.$grid_cols : '';
    
    $auth = ($author != '') ? '<span class="testi_author">'.esc_html($author).'</span>' : "";
    $slog = ($slogan != '') ? ' <span class="testi_slogan">'.esc_html($slogan).'</span>' : "";
    
    $output ='<div class="'.$class.'">';  
        
        if($block_style == "4"){
            
            $output .= '<div class="testi_img '.$img_shape.'"><img class="test-img-'.$img_size.'" alt="" src="'.$thumb[0].'"></div>';
            $output .= '<div class="testi_content">';
                $output .= '<div class="testi_holder">';
                    $output .= $auth.$slog;
                $output .= '</div>';
                $output .= '<div class="testi_desc">'.wp_kses($content,$allowedposttags,null).'</div>';
                
            $output .= '</div>';
            
        }else if($block_arrange == "1"){
                
            $output .= '<div class="testi_img '.$img_shape.'"><img class="test-img-'.$img_size.'" alt="" src="'.$thumb[0].'"></div>';
            $output .= '<div class="testi_content">';
                $output .= '<div class="testi_desc">'.wp_kses($content,$allowedposttags,null).'</div>';
                $output .= '<div class="testi_holder">';
                    $output .= $auth.$slog;
                $output .= '</div>';
            $output .= '</div>';
          
        }else if($block_arrange == "2"){
          
            $output .= '<div class="'.$img_shape.' testi_img"><img class="test-img-'.$img_size.'" alt="" src="'.$thumb[0].'"></div>';
            $output .='<div class="testi_content">';
                $output .= '<div class="testi_holder">';
                    $output .= $auth.$slog;
                $output .= '</div>';
                $output .= '<div class="testi_desc">'.wp_kses($content,$allowedposttags,null).'</div>';
            $output .= '</div>';
          
        }else if($block_arrange == "3"){
          
            $output .= '<div class="'.$img_shape.' testi_img"><img class="test-img-'.$img_size.'" alt="" src="'.$thumb[0].'"></div>';
            $output .='<div class="testi_content">';
                $output .= '<div class="testi_desc">'.wp_kses($content,$allowedposttags,null).'</div>';
                $output .= '<div class="testi_holder">';
                    $output .= $auth.$slog;
                $output .= '</div>';
            $output .= '</div>';
          
        }else if($block_arrange == "4"){
          
            $output .= '<div class="testi_holder">';
                $output .= $auth.$slog;
            $output .= '</div>';
            $output .= '<div class="'.$img_shape.' testi_img"><img class="test-img-'.$img_size.'" alt="" src="'.$thumb[0].'"></div>';
            $output .= '<div class="testi_desc">'.wp_kses($content,$allowedposttags,null).'</div>';
          
        }else if($block_arrange == "5"){
          
            $output .= '<div class="testi_holder">';
                $output .= $auth.$slog;
            $output .= '</div>';
            $output .= '<div class="testi_desc">'.wp_kses($content,$allowedposttags,null).'</div>';
            $output .= '<div class="'.$img_shape.' testi_img"><img class="test-img-'.$img_size.'" alt="" src="'.$thumb[0].'"></div>';
          
        }else if($block_arrange == "6"){
          
            $output .= '<div class="testi_desc">'.wp_kses($content,$allowedposttags,null).'</div>';
            $output .= '<div class="testi_holder">';
                $output .= $auth.$slog;
            $output .= '</div>';
            $output .= '<div class="testi_img '.$img_shape.'"><img class="test-img-'.$img_size.'" alt="" src="'.$thumb[0].'"></div>';
        
        }
        
    $output .= '</div>';
        
    return $output; 
 
}
add_shortcode('it_testimonial', 'it_testimonial_shortcode');