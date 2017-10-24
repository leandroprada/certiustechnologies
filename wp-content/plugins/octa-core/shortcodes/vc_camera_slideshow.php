<?php 
function it_camera_slide_shortcode($atts, $content=null){
    extract(shortcode_atts( array(
        'slide_title'     => '',
        'slide_link'      => '',
        'image'           => '',
        'thumbnail'       => '',
        'd_fx'            => '',
    ), $atts));
    $img_id = preg_replace( '/[^\d]/', '', $image );
    $img_src = wp_get_attachment_image_src( $img_id,'full' );
    
    $thumb_id = preg_replace( '/[^\d]/', '', $thumbnail );
    $thumb_src = wp_get_attachment_image_src( $thumb_id,'thumbnail' );
    $rel = '';
    $link = $slide_link;
    $url = vc_build_link( $link );
    if ( ! empty( $url['rel'] ) ) {
        $rel = ' rel="' . esc_attr( $url['rel'] ) . '"';
    }
          
    $output = '<div data-thumb="'.$thumb_src[0].'" data-src="'.$img_src[0].'">';
        if(!empty($slide_title)){
        $output .= '<div class="camera_caption fadeFromBottom">';
            $output .= '<a href="' . esc_attr( $url['url'] ) . '" ' . $rel . ' title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">'.esc_attr($slide_title).'</a>';
        $output .= '</div>';
        }
    $output .='</div>';          
          
    return $output; 
 
}
add_shortcode('it_camera_slide', 'it_camera_slide_shortcode');