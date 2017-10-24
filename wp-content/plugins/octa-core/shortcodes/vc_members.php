<?php
function it_member_shortcode($atts, $content=null){
    global $allowedposttags;
    extract(shortcode_atts( array(
        'member_name'       => '',
        'member_position'   => '',
        'member_style'      => '1',
        'member_fb'         => '',
        'member_tw'         => '',
        'member_ln'         => '',
        'member_go'         => '',
        'member_sk'         => '',
        'image'             => '',
        'img_size'          => 'full',
        'align'             => '',
        'el_class'          => ''
    ), $atts));
    
    $output = '';
    
    $class = 'team-box';                               
    $class .= ( $el_class != '' ) ? ' '.$el_class : "";
    $class .= ($align != '') ? ' '.$align : "";
    $class .= ( $member_style != '' ) ? ' team-'.$member_style : "";    
    
    $urlfb = vc_build_link( $member_fb );
    $relfb = ( ! empty( $urlfb['rel'] ) ) ? ' rel="' . esc_attr( $urlfb['rel'] ) . '"' : "";
    
    $urltw = vc_build_link( $member_tw );
    $reltw = ( ! empty( $urltw['rel'] ) ) ? ' rel="' . esc_attr( $urltw['rel'] ) . '"' : "";
    
    $urlln = vc_build_link( $member_ln );
    $relln = ( ! empty( $urlln['rel'] ) ) ? ' rel="' . esc_attr( $urlln['rel'] ) . '"' : "";
    
    $urlgo = vc_build_link( $member_go );
    $relgo = ( ! empty( $urlgo['rel'] ) ) ? ' rel="' . esc_attr( $urlgo['rel'] ) . '"' : "";
    
    $urlsk = vc_build_link( $member_sk );
    $relsk = ( ! empty( $urlsk['rel'] ) ) ? ' rel="' . esc_attr( $urlsk['rel'] ) . '"' : ""; 
    
    $img_id = preg_replace( '/[^\d]/', '', $image );
    $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $img_size ) );
    $img_output = $img['thumbnail'];
    
    $member_details = str_replace("<p></p>","",$content);
    
    $output .= '<div class="'.$class.'">';
        
        $output .='<div class="member_img">'.$img_output.'</div>';
          
        $output .= '<div class="member_details">';
            
            $output .= '<h4 class="member_name">'.esc_html($member_name).'</h4>';
            
            $output .= '<h5 class="member_position main-color">'.esc_html($member_position).'</h5>';
            
            $output .= '<div class="member_content">'.wp_kses($member_details,$allowedposttags,null).'</div>';   
            if ( strlen( $urlfb['url'] ) > 0 || strlen( $urltw['url'] ) > 0 || strlen( $urlln['url'] ) > 0 || strlen( $urlgo['url'] ) > 0 || strlen( $urlsk['url'] ) > 0 ) {
                $output .= '<div class="member_socials">';
                    $output .= '<div class="social-list">';
                        if ( strlen( $member_fb ) > 0 && strlen( $urlfb['url'] ) > 0 ) {
                            $output .='<a data-toggle="tooltip" data-placement="top" href="' . esc_attr( $urlfb['url'] ) . '" ' . $relfb . ' data-original-title="' . esc_attr( $urlfb['title'] ) . '" target="' . ( strlen( $urlfb['target'] ) > 0 ? esc_attr( $urlfb['target'] ) : '_self' ) . '"><i class="fa fa-facebook ic-facebook md-icon"></i></a>';
                        }
                        if ( strlen( $member_tw ) > 0 && strlen( $urltw['url'] ) > 0 ) {
                            $output .='<a data-toggle="tooltip" data-placement="top" href="' . esc_attr( $urltw['url'] ) . '" ' . $reltw . ' data-original-title="' . esc_attr( $urltw['title'] ) . '" target="' . ( strlen( $urltw['target'] ) > 0 ? esc_attr( $urltw['target'] ) : '_self' ) . '"><i class="fa fa-twitter ic-twitter md-icon"></i></a>';
                        }
                        if ( strlen( $member_ln ) > 0 && strlen( $urlln['url'] ) > 0 ) {
                            $output .='<a data-toggle="tooltip" data-placement="top" href="' . esc_attr( $urlln['url'] ) . '" ' . $relln . ' data-original-title="' . esc_attr( $urlln['title'] ) . '" target="' . ( strlen( $urlln['target'] ) > 0 ? esc_attr( $urlln['target'] ) : '_self' ) . '"><i class="fa fa-linkedin ic-linkedin md-icon"></i></a>';
                        }
                        if ( strlen( $member_go ) > 0 && strlen( $urlgo['url'] ) > 0 ) {
                            $output .='<a data-toggle="tooltip" data-placement="top" href="' . esc_attr( $urlgo['url'] ) . '" ' . $relgo . ' data-original-title="' . esc_attr( $urlgo['title'] ) . '" target="' . ( strlen( $urlgo['target'] ) > 0 ? esc_attr( $urlgo['target'] ) : '_self' ) . '"><i class="fa fa-google-plus ic-google-plus md-icon"></i></a>';
                        }
                        if ( strlen( $member_sk ) > 0 && strlen( $urlsk['url'] ) > 0 ) {
                            $output .='<a data-toggle="tooltip" data-placement="top" href="' . esc_attr( $urlsk['url'] ) . '" ' . $relsk . ' data-original-title="' . esc_attr( $urlsk['title'] ) . '" target="' . ( strlen( $urlsk['target'] ) > 0 ? esc_attr( $urlsk['target'] ) : '_self' ) . '"><i class="fa fa-skype ic-skype md-icon"></i></a>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
            }

        $output .= '</div>';
           
    $output .= '</div>';
          
    return $output; 
 
}
add_shortcode('it_member', 'it_member_shortcode');





