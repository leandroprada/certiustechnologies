<?php
function it_step_shortcode($atts, $content=null){
    global $allowedposttags; 
    global $steps_style;
    global $steps4_style;
    extract(shortcode_atts( array(
        'step_number'            => '',
        'step_title'             => '',
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
        'use_icon'               => '1',
        'size'                   => 'sm',
        'align'                  => '',
        'shape'                  => '',
        'title_color'            => '',
        'bg_color'               => '',
        'color'                  => '',
        'border_color'           => '',
        'border_width'           => '',
        'it_animation'           => '',
        'delay'                  => '',
        'duration'               => '',
        'el_class'               => ''
    ), $atts));
        
    $stepid = uniqid( 'stp_' );
    $data_anim = $data_del = $data_dur = $iconClass = '';    
    $custom_stle = ".{$stepid} .step-icon{";
        $custom_stle .= ($bg_color != '') ? "background-color: {$bg_color};" : "";
        $custom_stle .= ($border_color != '') ? "border: {$border_width}px {$border_color} solid;" : "";
        $custom_stle .= ($color != '') ? "color: {$color};" : "";
    $custom_stle .= "}";
    
    $custom_stle .= ".{$stepid} .step-title{";
        $custom_stle .= ($title_color != '') ? "color: {$title_color};" : "";
    $custom_stle .= "}";
    
    newFun($custom_stle);
    
    if($use_icon == '1'){
        vc_icon_element_fonts_enqueue( $icon_type );
        $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
    }
    
    // animation styling...
    if($it_animation != ''){$data_anim = ' data-animate="'.esc_js($it_animation).'"';}
    if($duration != ''){$data_dur = ' data-animation-duration="'.esc_js($duration).'"';}
    if($delay != ''){$data_del = ' data-animation-delay="'.esc_js($delay).'"';}
    $animation = $data_anim.$data_del.$data_dur; 
  
    $class = 'oc-step ';
    $class .= $steps_style.' '.$stepid;
    $class .= ( $el_class != '' ) ? ' '.$el_class : '';
    $class .= ( $align != '' ) ? ' '.$align : '';
    $class .= ( $it_animation != '' ) ? ' fx' : '';
    
    $iconClass .= ' step-icon ';
    $iconClass .= ( $shape != '' ) ? ' '.$shape : '';
    $iconClass .= ( $size != '' ) ? ' '.$size.'-icon' : '';
    
    $output = "<div class='{$class}'>";
        
        if($steps_style == 'steps-1'){
        
            $output .= '<i class="main-border '.$iconClass.'"></i>';
            $output .= '<h4 class="main-color">'.$step_number.'</h4>';
            $output .= '<p>'.wp_kses($content,$allowedposttags,null).'</p>';

        } else if($steps_style == 'steps-2'){

            $output .= '<span class="bo_ribbon bottom main-bg"><i class="'.$iconClass.'"></i></span>';
            $output .= '<span class="num main-color">'.$step_number.'</span>';
            $output .= '<h4 class="step-title">'.$step_title.'</h4>';
            $output .= '<p class="step-content">'.wp_kses($content,$allowedposttags,null).'</p>';

        }else if($steps_style == 'steps-3'){

            $output .= '<span class="pull-left num gry-color">'.$step_number.'</span>';
            $output .= '<i class="gry-bg '.$iconClass.'"></i>';
            $output .= '<div class="s-content">';
                $output .= '<h4 class="step-title main-color">'.$step_title.'</h4>';
                $output .= '<p class="step-content">'.wp_kses($content,$allowedposttags,null).'</p>';
            $output .= '</div>';

        }else if($steps_style == 'steps-4'){

            $output .= "<span class='step-line'>";
                $output .= "<i class='{$iconClass}'>{$step_number}</i>";
            $output .= "</span>";
            $output .= '<h4 class="step-title">'.$step_title.'</h4>';
            $output .= '<p class="step-content">'.wp_kses($content,$allowedposttags,null).'</p>';
            
        }
    
    $output .= '</div>';
        
    return $output;
  
}                                               
add_shortcode('it_step', 'it_step_shortcode');