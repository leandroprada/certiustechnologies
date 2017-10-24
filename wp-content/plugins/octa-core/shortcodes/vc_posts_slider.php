<?php
function it_posts_slider_shortcode($atts, $content=null){
 
    extract(shortcode_atts( array(
        'it_category'       => '',
        'sw_slides'         => '3',
        'sw_type'           => 'h' ,
        'sw_height'         => '500',
        'sw_style'          => 'style1',
        'sw_effect'         => 'slide',
        'sw_speed'          => '400',
        'sw_space'          => '0',
        'sw_loop'           => '',
        'el_class'          => '',
        'ps_max_posts'      => '10',
        'img_size'          => 'full'
    ), $atts));
    
    global $post;
    $args = array(
        'category_name'         => $it_category,
        'posts_per_page'        => $ps_max_posts,
        'ignore_sticky_posts'   => 1,
    ); 
    
    $t_slides = $class = $cont = $attrs = '';
    $t_slides = " data-slides='$sw_slides'";
    $s_typ = " data-stype='$sw_type'";            
    $s_eff = " data-effect='$sw_effect'";
    $s_speed = " data-speed='$sw_speed'"; 
    $s_space = " data-space='$sw_space'";
    $s_loop = " data-loop='$sw_loop'";
    $classes = 'swiper-container swiper-container-'.$sw_type.$class;
    $attrs = $t_slides.$s_typ.$s_eff.$s_speed.$s_loop.$s_space;
    
    $q = new WP_Query( $args );
    $holder = theme_option('img_placeholder');
    $classes .= $el_class;   
    
    if($q->have_posts()){
        
        $cont .= '<div class="magazine '.$classes.'"'.$attrs.' style="height: '.$sw_height.'px">';
            $cont .= '<div class="swiper-wrapper">';                
                while( $q->have_posts() ){ 
        
            $q->the_post();
            
            $cont .= '<div class="swiper-slide">';
                $cont .= '<article class="post-entry">';                        
                    
                    if ( get_post_format() == 'gallery' || get_post_format() == 'video' || get_post_format() == 'audio' ) {
                        $cont .= bo_post_media( get_the_content() );
                    } else if ( get_post_format() == 'image' ) {
                        if( has_post_thumbnail()){
                            if ( post_password_required() || ! has_post_thumbnail() ) { return; }
                            $cont .='<a href="'. get_the_permalink() .'" class="post-image">';
                                $cont .= get_the_post_thumbnail( null, $img_size,'' );
                            $cont .='</a>';
                        }else{
                            $cont .= bo_post_image(get_the_content());
                        }        
                    } else {
                        if ( get_the_post_thumbnail() ){
                            $cont .='<a href="'. get_the_permalink() .'" class="post-image">';
                                $cont .= get_the_post_thumbnail( null, $img_size,'' );
                            $cont .='</a>';
                        } else if($holder) {
                            $cont .='<a href="'. get_the_permalink() .'" class="post-image">';
                                $cont .= '<img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/placeholder.jpg" />';
                            $cont .='</a>';
                        }                            
                    }
                    
                    $cont .= '<div class="post-entry-overlay">'; 
                        $cont .= '<div class="post-entry-meta-category">';
                            $cont .= '<span class="label label-danger">';
                                if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) {
                                  $cont .= get_the_category_list( ', ' );
                                }
                            $cont .= '</span>';
                        $cont .= '</div>';
                        
                        $cont .= '<div class="post-entry-meta">';
                            $cont .= '<div class="post-entry-meta-title">';
                                $cont .= '<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
                            $cont .= '</div>';
                            $cont .= '<span class="post-date"><i class="fa fa-clock-o"></i> '.get_the_date().'</span>';
                        $cont .= '</div>';
                        
                    $cont .= '</div>';
                
                $cont .= '</article>';
            $cont .= '</div>';
            
        }                         
            $cont .= '</div>';
            if( $sw_type == 'v' ){
                $cont .= '<div class="swiper-button swiper-up"><i class="fa fa-angle-up"></i></div>';
                $cont .= '<div class="swiper-button swiper-down"><i class="fa fa-angle-down"></i></div>';
            }else{
                $cont .= '<div class="swiper-button swiper-next"><i class="fa fa-angle-right"></i></div>';
                $cont .= '<div class="swiper-button swiper-prev"><i class="fa fa-angle-left"></i></div>';
            }
        $cont .= '</div>';
                
    }else{
        $cont .= '<div class="no_posts alert alert-danger t-center">'.__('No posts to be shown!!','superfine').'</div>';
    }

    wp_reset_postdata();
     
    return $cont;      
}                                               
add_shortcode('it_posts_slider', 'it_posts_slider_shortcode');