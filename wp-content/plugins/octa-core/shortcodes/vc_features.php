<?php
function it_features_shortcode($atts, $content=null){
    global $allowedposttags;
    extract(shortcode_atts( array(
        'feature_title'         => '',
        'feature_subtitle'      => '',
        'feature_link'          => '',
        'feature_style'         => 'style1',
        'feature_image'         => '',
        'feature_link'          => '',
        'show_more'             => '',
        'more_text'             => '',
        'img_size'              => 'large',
        'el_class'              => '',
        'align'                 => '',
        'img_shape'             => '',
        'bg_color'              => '',
        'title_color'           => '',
        'subtitle_color'        => '',
        'padd_top'              => '',
        'padd_right'            => '',
        'padd_bottom'           => '',
        'padd_left'             => '',
        'margin_top'            => '',
        'margin_right'          => '',
        'margin_bottom'         => '',
        'margin_left'           => '',
        'show_more'                 => '',
        'more_text'                 => 'Read More',
        'more_style'                => '',
        'more_size'                 => 'btn-sm',
        'more_shape'                => 'square',
        'more_align'                => 'center',
        'more_color'                => '',
        'more_bg_color'             => '',
        'more_border_color'         => '',
        'more_hover_color'          => '',
        'more_hover_bg_color'       => '',
        'more_hover_border_color'   => '',
    ), $atts));
           
    $boxid = uniqid( 'febx_' );
    
    $output = $rel = $more_pad = $custom_stle = $icbx_more = $class = '';
    
    $img_id = preg_replace( '/[^\d]/', '', $feature_image );
    $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $img_size ) );
    $img_output = $img['thumbnail'];
    $more_pad .= ( $more_bg_color != '' || $more_border_color != '' ) ? ' more_pad' : '';
    
    $custom_stle .= "#{$boxid}{";
        $custom_stle .= ($bg_color != '') ? "background-color: {$bg_color};" : "";
        $custom_stle .= ($padd_top != '') ? "padding-top: {$padd_top}px;" : "";
        $custom_stle .= ($padd_right != '') ? "padding-right: {$padd_right}px;" : "";
        $custom_stle .= ($padd_bottom != '') ? "padding-bottom: {$padd_bottom}px;" : "";
        $custom_stle .= ($padd_left != '') ? "padding-left: {$padd_left}px;" : "";
        $custom_stle .= ($margin_top != '') ? "margin-top: {$margin_top}px;" : "";
        $custom_stle .= ($margin_right != '') ? "margin-right: {$margin_right}px;" : "";
        $custom_stle .= ($margin_bottom != '') ? "margin-bottom: {$margin_bottom}px;" : "";
        $custom_stle .= ($margin_left != '') ? "margin-left: {$margin_left}px;" : "";
    $custom_stle .= "}";

    $custom_stle .= "#{$boxid} .feature_title,#{$boxid} .feature_title a{";
        $custom_stle .= ($title_color != '') ? "color: {$title_color};" : "";
    $custom_stle .= "}";
    
    $custom_stle .= "#{$boxid} .feature_sub{";
        $custom_stle .= ($subtitle_color != '') ? "color: {$subtitle_color};" : "";
    $custom_stle .= "}";

    if( $more_color != '' || $more_bg_color != '' || $more_border_color != '' || $more_hover_color != '' || $more_hover_bg_color != '' || $more_hover_border_color != '' ){
        $custom_stle .= "#{$boxid} .box_more{";
            $custom_stle .= ($more_color != '') ? "color: {$more_color};" : "";
            $custom_stle .= ($more_bg_color != '') ? "background-color: {$more_bg_color};" : "";
            $custom_stle .= ($more_border_color != '') ? "border: 1px {$more_border_color} solid;" : "";
        $custom_stle .= "}";
        $custom_stle .= "#{$boxid} .box_more:hover{";
            $custom_stle .= ($more_hover_color != '') ? "color: {$more_hover_color};" : "";
            $custom_stle .= ($more_hover_bg_color != '') ? "background-color: {$more_hover_bg_color};" : "";
            $custom_stle .= ($more_hover_border_color != '') ? "border: 1px {$more_hover_border_color} solid;" : "";
        $custom_stle .= "}";
        if( $more_style == 'style2' && $more_color != '' ){
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
    
    $link = $feature_link;
    $url = vc_build_link( $link );
    if ( ! empty( $url['rel'] ) ) {
        $rel = ' rel="' . esc_attr( $url['rel'] ) . '"';
    }
    if ( strlen( $link ) > 0 && strlen( $url['url'] ) > 0 ) {
        $f_title = '<a href="' . esc_attr( $url['url'] ) . '" ' . $rel . ' title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">'.esc_html($feature_title).'</a>';
    }else{
        $f_title = esc_html($feature_title);
    }
    $class = 'oc-feature';
    $class .= ($el_class != '') ? ' '.$el_class : "";
    $class .= ($align != '') ? ' '.$align : "";
    $class .= ($feature_style != '') ? ' '.$feature_style : "";
    
    $output .= "<div id='{$boxid}' class='{$class}'>";
          
        $output .= '<figure class="feature-img '.$img_shape.'">';
            $output .= $img_output;
        $output .= '</figure>';
        $output .= '<div class="feature-details">';
            $output .= ($feature_title != '') ? '<h4 class="feature_title main-color">'.$f_title.'</h4>' : "";
            $output .= ($feature_subtitle != '') ? '<h5 class="feature_sub">'.esc_html($feature_subtitle).'</h5>' : "";
            $output .= '<div class="feature_content">'.wp_kses($content,$allowedposttags,null).'</div>';
            if ( $show_more == '1' ) {
                $more = esc_url( $icbx_more );
                $mtxt = esc_attr( $more_text );
                if($more_style == 'style2'){
                    $output .= "<a class='sw-more box_more {$more_align} {$more_style} {$more_size} {$more_shape}{$more_pad}' href='{$more}'><span class='dots'></span><span class='dots'></span><span class='dots'></span><span class='arrow'></span><span class='arrow'></span><span class='arrow'></span> </a>";
                } else if($more_style == 'style3') {
                    $output .= "<a class='more-btn btn box_more {$more_align} {$more_style} {$more_size} {$more_shape}{$more_pad}' href='{$more}'><span>{$mtxt}</span></a>";
                } else {
                    $output .= "<a class='btn box_more {$more_align} {$more_style} {$more_size} {$more_shape}{$more_pad}' href='{$more}'>{$mtxt}</a>";
                } 
            }
        $output .= '</div>';
      

    
    $output .= '</div>';

    return $output; 
 
}
add_shortcode('it_feature', 'it_features_shortcode');





