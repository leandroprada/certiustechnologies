<?php 
function it_thumbs_gallery_shortcode($atts, $content=null){
    extract(shortcode_atts( array(
        'slide_title'      => '',
        'slide_link'       => '',
        'image'            => '',
        'thumbnail'        => '',
        'd_fx'             => '',
        'el_class'         => ''
    ), $atts));
    $class = '';
    $img_id = preg_replace( '/[^\d]/', '', $image );
    $img_src = wp_get_attachment_image_src( $img_id,'full' );
    if( $el_class != '' ){
        $class = ' '.$el_class;
    }
    $thumb_id = preg_replace( '/[^\d]/', '', $thumbnail );
    $thumb_src = wp_get_attachment_image_src( $thumb_id,'thumbnail' );
    
    
          
    $output = '<a class="oc_zoom'.$class.'" href="'.$img_src[0].'">';
        $output .= '<img alt="" src="'.$img_src[0].'">';
    $output .= '</a>';

          
          
    return $output; 
 
}
add_shortcode('it_thumb', 'it_thumbs_gallery_shortcode');