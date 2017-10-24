<?php 
function it_swiper_slide_shortcode($atts, $content=null){
    global $allowedposttags;     
    extract(shortcode_atts( array(
        'sw_link'       => '',
        'rel'           => '',
        'sw_image'      => '',
        'sw_title'      => '',
        'sw_label'      => '',
        'img_size'      => 'full',
        'color'         => '',
        'size'          => '',
        'family'        => '',
        'weight'        => '700', 
        'el_class'      => '',
        'show_more'     => '',
        'more_style'    => '',
        'more_text'     => 'Read More'
    ), $atts));
    
    $output = $link = $more_align = $more_pad = $rel = '';
    static $i = 1;
    
    $sldid = 'slid-'.$i;
    
    $custom_stle = ".{$sldid} h2,.{$sldid} h2 a{";
        $custom_stle .= ($color != '') ? "color: {$color};" : "";
        $custom_stle .= ($size != '') ? "font-size: {$size}px;" : "";
        $custom_stle .= ($family != '') ? "font-family: {$family};" : "";
        $custom_stle .= ($weight != '') ? "font-weight: {$weight};" : "";
    $custom_stle .= "}";
    
    newFun($custom_stle);
    shortCodeEnq($family);
    
    $link = $sw_link;
    $img_id = preg_replace( '/[^\d]/', '', $sw_image );
    $img_src = wp_get_attachment_image_src( $img_id,'full' );
    $thumb =   wp_get_attachment_image_src( $img_id,$img_size );
    $url = vc_build_link( $link );
    if ( ! empty( $url['rel'] ) ) {
        $rel = ' rel="' . esc_attr( $url['rel'] ) . '"';
    }

    $output .= '<div class="swiper-slide '.$sldid.' '.$el_class.'">';
        $output .= '<div class="swiper-entry">';
            $output .= '<img alt="" src="'.$thumb[0].'">';
            $output .= '<div class="swiper-overlay">';
                $output .= '<div class="swiper-meta">';
                    $output .= '<div class="swiper-meta-category">';
                        $output .= '<span class="label label-danger">'.$sw_label.'</span>';
                    $output .= '</div>';
                    $output .= '<div class="swiper-meta-title">';
                        $output .= '<h2>';
                            if ( strlen( $link ) > 0 && strlen( $url['url'] ) > 0 ) {
                                $output .= '<a href="' . esc_attr( $url['url'] ) . '" ' . $rel . ' title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">';
                            }
                            $output .= $sw_title;
                            if ( strlen( $link ) > 0 && strlen( $url['url'] ) > 0 ) {
                                $output .= '</a>';
                            }
                        $output .= '</h2>';
                    $output .= '</div>';
                    
                    $output .= '<div class="swiper-bottom">'.wp_kses($content,$allowedposttags,null);
                        if ( strlen( $link ) > 0 && strlen( $url['url'] ) > 0 && $show_more != '' ) {
                            $mtxt = esc_attr( $more_text );
                            if($more_style == 'style2'){
                                $output .= "<a class='sw-more main-bg box_more {$more_align} {$more_style}{$more_pad}' href='" . esc_attr( $url['url'] ) . "' " . $rel . " title='" . esc_attr( $url['title'] ) . "' target='" . ( strlen( $url["target"] ) > 0 ? esc_attr( $url["target"] ) : "_self" ) . "'><span class='dots'></span><span class='dots'></span><span class='dots'></span><span class='arrow'></span><span class='arrow'></span><span class='arrow'></span> </a>";
                            } else if($more_style == 'style3') {
                                $output .= "<a class='more-btn btn main-bg btn-sm box_more {$more_align} {$more_style}{$more_pad}' href='" . esc_attr( $url['url'] ) . "' " . $rel . " title='" . esc_attr( $url['title'] ) . "' target='" . ( strlen( $url["target"] ) > 0 ? esc_attr( $url["target"] ) : "_self" ) . "'><span>{$mtxt}</span></a>";
                            } else {
                                $output .= "<a class='main-color box_more {$more_align} {$more_style}{$more_pad}' href='" . esc_attr( $url['url'] ) . "' " . $rel . " title='" . esc_attr( $url['title'] ) . "' target='" . ( strlen( $url["target"] ) > 0 ? esc_attr( $url["target"] ) : "_self" ) . "'>{$mtxt}</a>";
                            }
                        }
                    $output .= '</div>';
                    
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</div>'; 
    
    $i++; 
    
    return $output; 
 
}
add_shortcode('it_swiper_slide', 'it_swiper_slide_shortcode');