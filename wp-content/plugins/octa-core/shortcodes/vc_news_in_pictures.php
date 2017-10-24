<?php
function it_news_in_pictures_shortcode($atts, $content=null){
 
    extract(shortcode_atts( array(
        'it_cat'        => '',
        'img_size'      => '',
        'np_max_posts'  => '25',
        'el_class'      => ''
    ), $atts));
    
    $output = $class = '';
    
    global $post;
    $args = array(
        'category_name' => $it_cat,
        'posts_per_page'     => $np_max_posts,
    );
    
    if( $el_class != '' ){
        $class = ' '.$el_class;
    } 
        
    $quer = new WP_Query( $args ); 
    
    if($quer->have_posts()){
        
        $output .= '<div class="anim-imgs just-gallery justified-gallery'.$class.'" data-row-height="100">';
            while($quer->have_posts()){ 
                $quer->the_post();
                $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                if(get_the_post_thumbnail($post->ID, 'thumbnail') != ''){                                            
                    $output .= '<a class="zoom" href="'.esc_url($feat_image).'">';
                        $output .= get_the_post_thumbnail($post->ID, $img_size);
                    $output .= '</a>';
                }
            }
        $output .= '</div>';        
    }else{
        $output .= '<div class="no_posts alert alert-danger t-center">'.__('No Images in posts to be shown!!','superfine').'</div>';
    }
    wp_reset_postdata(); 
    return $output;
     
     
}                                               
add_shortcode('it_new_in_pictures', 'it_news_in_pictures_shortcode');