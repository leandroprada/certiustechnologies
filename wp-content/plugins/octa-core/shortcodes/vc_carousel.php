<?php 
function it_slide_shortcode($atts, $content=null){
    global $allowedposttags;
    global $v_type;
    global $gap;     
    extract(shortcode_atts( array(
        'slide_link'    => '',
        'slide_image'   => '',
        'img_size'      => 'full', 
        'slide_ex_link' => '',
        'el_class'      => ''
    ), $atts));
    $output = $rel = '';
    $img_id = preg_replace( '/[^\d]/', '', $slide_image );
    $img_src = wp_get_attachment_image_src( $img_id,'full' );
    $thumb =   wp_get_attachment_image_src( $img_id,$img_size );
    
    $link = $slide_ex_link;
    $url = vc_build_link( $link );
    if ( ! empty( $url['rel'] ) ) {
        $rel = ' rel="' . esc_attr( $url['rel'] ) . '"';
    }
    
    if($v_type == 'horizontal'){
        $gp = ' style="margin:0 '.$gap.'"';
    }else{
        $gp = ' style="margin:'.$gap.' 0"';
    }
    $output .= '<div class="carousel_slide '.$el_class.'"'.$gp.'>';
    if($slide_image != ''){
        if($slide_link == 'link'){
            $output .= '<a href="' . esc_attr( $url['url'] ) . '" ' . $rel . ' title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">';
        }else{
            $output .= '<a class="zoom" href="'.$img_src[0].'">';
        }
        $output .= '<img alt="" src="'.$thumb[0].'" />';
      $output .= '</a>';
    }          
    if($content != ''){
        $output .= '<p class="slide_caption">'.wp_kses($content,$allowedposttags,null).'</p>';
    }
    $output .= '</div>'; 
          
          
          
    return $output; 
 
}
add_shortcode('it_slide', 'it_slide_shortcode');