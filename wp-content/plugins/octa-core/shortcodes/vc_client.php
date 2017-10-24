<?php 
function it_client_shortcode($atts, $content=null){
    global $cl_style;
    extract(shortcode_atts( array(
        'client_link'       => '',
        'rel'               => '',
        'image'             => '',
        'target'            => '',
        'img_size'          => 'large', 
    ), $atts));
    
    $img_id = preg_replace( '/[^\d]/', '', $image );
    $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $img_size ) );
    $img_output = $img['thumbnail'];
    
    $link = $client_link;
    $url = vc_build_link( $link );
    if ( ! empty( $url['rel'] ) ) {
        $rel = ' rel="' . esc_attr( $url['rel'] ) . '"';
    }
    if ( strlen( $link ) > 0 && strlen( $url['url'] ) > 0 ) {
        $cl_link = '<a href="' . esc_attr( $url['url'] ) . '" ' . $rel . ' title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">'.$img_output.'</a>';
    }else{
        $cl_link = $img_output;
    }
    
    
    $output = '';
    if($cl_style == '1'){
      $output .= '<div class="col-md-2">';
          $output .= $cl_link;
      $output .= '</div>';
    } else if($cl_style == '2'){
      $output .= '<div class="col-md-3">';
          $output .= $cl_link;
      $output .= '</div>';
    } else if($cl_style == '3'){
      $output .= '<div class="col-md-4">';
          $output .= $cl_link;
      $output .= '</div>';
    } else if($cl_style == '4'){
      $output .= '<div class="col-md-6">';
          $output .= $cl_link;
      $output .= '</div>';
    }
          
          
    return $output; 
 
}
add_shortcode('it_client', 'it_client_shortcode');