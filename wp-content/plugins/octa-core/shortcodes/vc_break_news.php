<?php
function it_breaking_news_shortcode($atts, $content=null){
 
    extract(shortcode_atts( array(
        'it_cat'      => '',
        'it_title'    => '',
        'el_class'    => ''
    ), $atts));
    
    global $post;
    $args = array(
        'category_name' => $it_cat,
        'showposts'     => 5,
        'ignore_sticky_posts' => 1,
    );
    $class = '';
    $class .= ($el_class != '') ? ' '.$el_class : "";
    
    $q = new WP_Query( $args );
    
    if($q->have_posts()){
        $cont = '<div class="break-news'.$class.'">';
            $cont .='<span class="lbl label label-danger">'.$it_title.'</span>';
            $cont .= '<div class="vertical-slider" data-slidesnum="1" data-scamount="1" data-fade="0" data-speed="500" data-arrows="1" data-infinite="1" data-dots="" data-auto="1">';
                while($q->have_posts()){ 
                    $q->the_post();
                    $cont .= '<div>';
                        $cont .= '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
                    $cont .= '</div>';
                }
            $cont .= '</div>';
        $cont .= '</div>';        
    }else{
        $cont .= '<div class="no_posts alert alert-danger t-center">'.__('No posts to be shown!!','superfine').'</div>';
    }
    
    wp_reset_postdata(); 
    return $cont;      
}                                               
add_shortcode('it_breaking_news', 'it_breaking_news_shortcode');