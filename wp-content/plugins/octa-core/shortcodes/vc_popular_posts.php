<?php
function it_popular_posts_shortcode($atts, $content=null){
 
    extract(shortcode_atts( array(
        'it_cat'        => '',
        'pp_style'      => '1',
        'pp_max_posts'  => '5',
        'img_size'      => '',
        'el_class'      => '',
    ), $atts));
    
    $cont = '';
    global $post;
    
    $args = array(
        'category_name' => $it_cat,
        'posts_per_page' => $pp_max_posts,
        'meta_key' => 'wpb_post_views_count', 
        'orderby' => 'meta_value_num', 
        'order' => 'DESC',
        'ignore_sticky_posts'   => 1,
    ); 
    $holder = theme_option('img_placeholder');    
    $quer = new WP_Query( $args ); 
    $c = 0;
    if($quer->have_posts()){
        $cont .= '<div class="popular_posts '.$el_class.'">';
            if($pp_style == 2){
                $cont .= '<div class="other-links"><ul class="custom-list style2">';    
            }
            
            while($quer->have_posts()){ 
                $quer->the_post();
                if($pp_style == 1){
                    $c++;
                    if ($c == 1){
                        $cont .='<div class="post-image">';
                            if ( get_post_format() == 'gallery' || get_post_format() == 'video' || get_post_format() == 'audio' ) {
                                $cont .= bo_post_media( get_the_content() );
                            } else if ( get_post_format() == 'image' ) {
                                if( has_post_thumbnail()){
                                    if ( post_password_required() || ! has_post_thumbnail() ) { return; }
                                    $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                        $cont .= get_the_post_thumbnail( null, 'full','' );
                                    $cont .='</a>';
                                }else{
                                    $cont .= bo_post_image(get_the_content());
                                }        
                            } else {
                                if ( get_the_post_thumbnail() ){
                                    $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                        $cont .= get_the_post_thumbnail( null, 'full','' );
                                    $cont .='</a>';
                                } else if($holder) {
                                    $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                        $cont .= '<img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/placeholder.jpg" />';
                                    $cont .='</a>';
                                }
                            }
                        $cont .= '</div>';
                        $cont .= '<article class="post-content">';
                            $cont .= '<div class="post-info-container">';
                                $cont .= '<div class="post-info">';
                                    $cont .= '<h4><a class="main-color" href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
                                $cont .= '</div>';
                            $cont .= '</div>';
                        $cont .= '</article>';
                        
                        $cont .= '<div class="other-links"><ul class="custom-list style2">';              
                    }else{
                        $cont .= '<li>';
                            $cont .= '<i class="lineaico-uniE094 main-color"></i><a href="'.get_the_permalink().'">'.get_the_title().'</a>';
                        $cont .= '</li>';                         
                    }    
                }else{
                    $cont .= '<li>';
                        $cont .= '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
                    $cont .= '</li>';    
                }                
            }
            
            $cont .= '</ul></div>';
        $cont .= '</div>';        
    }else{
        $cont .= '<div class="no_posts alert alert-danger t-center">'.__('No posts to be shown!!','superfine').'</div>';
    }
    
    wp_reset_postdata(); 
    return $cont;
     
     
}                                               
add_shortcode('it_popular_posts', 'it_popular_posts_shortcode');
