<?php
function it_posts_category_shortcode($atts, $content=null){
 
    extract(shortcode_atts( array(
        'it_category'           => '',
        'pg_style'              => '1',
        'has_carousel'          => '',
        'v_type'                => 'horizontal',
        'v_slides'              => '1',
        'v_scroll'              => '1',
        'v_fade'                => '',
        'v_speed'               => '500',
        'v_arrows'              => '',
        'v_dots'                => '',
        'gap'                   => '0',
        'v_mode'                => '',
        'v_infinite'            => '',
        'v_auto'                => '',
        'arrow_color'           => '',
        'arrow_bg_color'        => '',
        'arrow_hover_color'     => '',
        'arrow_hover_bg_color'  => '',
        'arrow_pos'             => 'l-r-in',
        'next_icon'             => 'fa fa-chevron-left',
        'prev_icon'             => 'fa fa-chevron-right',
        'arrow_size'            => '14',
        'arrow_shape'           => 'square',
        'bullets_style'         => 'circle1',
        'bullet_color'          => '',
        'v_rtl'                 => '',
        'el_class'              => '',
        'pg_max_posts'          => '3',
        'pg_cols'               => '12',
        'img_size'              => 'large',
        'max_words'             => '40'
    ), $atts));
    
    global $post;
    $args = array(
        'category_name'         => $it_category,
        'posts_per_page'        => $pg_max_posts,
        'ignore_sticky_posts'   => 1,
    );
    
    $posid = uniqid('catpost-', ''); 
    $ar_sz = $custom_stle = $bul_col = '';
    if( $gap != ''){
        $custom_stle = ".{$posid}.oc-carousel .slick-slide {";
            $custom_stle .= ($gap != '') ? "margin: {$gap}" : "";
        $custom_stle .= "}";    
    }
    
    if( $arrow_color != '' || $arrow_bg_color != '' || $arrow_size != '' ){
        $custom_stle .= ".{$posid}.oc-carousel .slick-arrow {";
            $custom_stle .= ($arrow_color != '') ? "color: {$arrow_color};" : "";
            $custom_stle .= ($arrow_bg_color != '') ? "background-color: {$arrow_bg_color};" : "";
            $custom_stle .= ($arrow_size != '') ? "font-size: {$arrow_size}px" : "";
        $custom_stle .= "}";
    }
    if( $arrow_hover_color != '' || $arrow_hover_bg_color != ''){
        $custom_stle .= ".{$posid}.oc-carousel .slick-arrow:hover {";
            $custom_stle .= ($arrow_hover_color != '') ? "color: {$arrow_hover_color};" : "";
            $custom_stle .= ($arrow_hover_bg_color != '') ? "background-color: {$arrow_hover_bg_color};" : "";
        $custom_stle .= "}";    
    }
    
    if( $bullet_color != '' ){
        $custom_stle .= ".{$posid}.oc-carousel .slick-dots.circle1 li.slick-active button,#{$testid}.oc-carousel .slick-dots.square1 li.slick-active button {";
            $custom_stle .= ($bullet_color != '') ? "border-color: {$bullet_color};" : "";
        $custom_stle .= "}";    
        
        $custom_stle .= ".{$posid}.oc-carousel .slick-dots.circle1 li.slick-active button:before,#{$testid}.oc-carousel .slick-dots.square1 li.slick-active button:before {";
            $custom_stle .= ($bullet_color != '') ? "background-color: {$bullet_color};" : "";
        $custom_stle .= "}";
        
        $custom_stle .= ".{$posid}.oc-carousel .slick-dots.circle2 li button,#{$testid}.oc-carousel .slick-dots.square2 li button {";
            $custom_stle .= ($bullet_color != '') ? "border-color: {$bullet_color};" : "";
        $custom_stle .= "}";    

        $custom_stle .= ".{$posid}.oc-carousel .slick-dots.circle2 li.slick-active button,#{$testid}.oc-carousel .slick-dots.square2 li.slick-active button {";
            $custom_stle .= ($bullet_color != '') ? "background-color: {$bullet_color};" : "";
            $custom_stle .= ($bullet_color != '') ? "border-color: {$bullet_color};" : "";
        $custom_stle .= "}";    
    }
    
    newFun($custom_stle);
    
    $classes = $t_ar = $t_cols = $cont = $attrs = '';
    $t2_slides      = ($v_slides !='')              ? " data-slidesnum='$v_slides'"             : "";
    $t2_type        = ($v_type !='')                ? " data-type='$v_type'"                    : "";
    $t2_scrolls     = ($v_scroll !='')              ? " data-scamount='$v_scroll'"              : "";
    $t2_fade        = ($v_fade !='')                ? " data-fade='$v_fade'"                    : "";               
    $t2_speed       = ($v_speed !='')               ? " data-speed='$v_speed'"                  : "";
    $t2_arrows      = ($v_arrows !='')              ? " data-arrows='$v_arrows'"                : "";
    $t2_dots        = ($v_dots !='')                ? " data-dots='$v_dots'"                    : "";
    $t2_auto        = ($v_auto !='')                ? " data-auto='$v_auto'"                    : "";
    $t2_infinite    = ($v_infinite !='')            ? " data-infinite='$v_infinite'"            : "";
    $t2_mode        = ($v_mode !='')                ? " data-center-mode='$v_mode'"             : "";
    $nx_ic          = ($next_icon !='')             ? " data-next-icon='$next_icon'"            : "";
    $pv_ic          = ($prev_icon !='')             ? " data-prev-icon='$prev_icon'"            : "";
    $bul_st         = ($bullets_style !='')         ? " data-bullet-style='$bullets_style'"     : "";
    $ar_shape       = ($arrow_shape !='')           ? " data-arrow-shape='$arrow_shape'"        : "";
    $rtl            = ($v_rtl !='')                 ? " data-rtl='$v_rtl'"                      : "";
    $holder         = theme_option('img_placeholder');
    if($pg_style == '2'){ $classes .= 'blog-home'; }
    if($has_carousel == ''){ $t_cols = ' col-md-'.$pg_cols; }
    
    
    $q = new WP_Query( $args );
    
    $classes .= ($el_class != '') ? ' '.$el_class : "";
    $classes .= ' '.$posid;      
    
    if($has_carousel == '1'){ 
        $classes .= ' oc-carousel';
        $classes .= ' '.$arrow_pos;
        $attrs = $t2_type.$t2_slides.$t2_scrolls.$t2_fade.$t2_speed.$t2_arrows.$t2_infinite.$t2_dots.$t2_auto.$ar_shape.$nx_ic.$pv_ic.$ar_sz.$bul_st.$bul_col.$rtl;
    }    
    
    if($q->have_posts()){
        
        $cont .= "<div class='row {$classes}' {$attrs}>";
                        
        while( $q->have_posts() ){ 
        
            $q->the_post();
           
            if($pg_style == 2){
            
            ////////////////// Style 2 /////////////////////////////
            $cont .= '<div class="'.$t_cols.'">';
                $cont .= '<div class="recent-posts style2">';                        
                    
                    $cont .= '<div class="post-image">';
                        if ( get_post_format() == 'gallery' || get_post_format() == 'video' || get_post_format() == 'audio' ) {
                            $cont .= post_media( get_the_content() );
                        } else if ( get_post_format() == 'image' ) {
                            if( has_post_thumbnail()){
                                if ( post_password_required() || ! has_post_thumbnail() ) { return; }
                                    $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                        $cont .= get_the_post_thumbnail( null, $img_size,'' );
                                    $cont .='</a>';
                            }else{
                                $cont .= bo_post_image(get_the_content());
                            }        
                        } else {
                            if ( get_the_post_thumbnail() ){
                                $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                    $cont .= get_the_post_thumbnail( null, $img_size,'' );
                                $cont .='</a>';
                            } else if($holder) {
                                $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                    $cont .= '<img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/placeholder.jpg" />';
                                $cont .='</a>';
                            }                            
                        }
                    $cont .= '</div>';
                    
                    $cont .= '<article class="post-content">'; 
                        
                        $cont .='<div class="post-info">';
                            $cont .= '<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
                            $cont .= '<ul class="post-meta">';
                                $cont .= '<li class="meta-date"><i class="fa fa-clock-o"></i>'.get_the_date().'</li>';
                                $cont .= '<li class="meta-user"><i class="fa fa-user"></i>'.__('By:','superfine').' <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a></li>';
                            $cont .='</ul>';
                        $cont .= '</div>';
                        $cont .= '<p>'.it_summary($max_words).'</p>';
                    $cont .= '</article>';
                
                $cont .= '</div>';
            $cont .= '</div>';
            ////////////////// End Style 2 /////////////////////////////
            
        }else if($pg_style == 3){
            
            ////////////////// Style 3 /////////////////////////////
            $cont .= '<div class="'.$t_cols.'">';
                $cont .= '<div class="recent-posts style3">';                        
                    
                    $cont .= '<div class="post-image">';
                        if ( get_post_format() == 'gallery' || get_post_format() == 'video' || get_post_format() == 'audio' ) {
                            $cont .= post_media( get_the_content() );
                        } else if ( get_post_format() == 'image' ) {
                            if( has_post_thumbnail()){
                                if ( post_password_required() || ! has_post_thumbnail() ) { return; }
                                    $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                        $cont .= get_the_post_thumbnail( null, $img_size,'' );
                                    $cont .='</a>';
                            }else{
                                $cont .= bo_post_image(get_the_content());
                            }        
                        } else {
                            if ( get_the_post_thumbnail() ){
                                $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                    $cont .= get_the_post_thumbnail( null, $img_size,'' );
                                $cont .='</a>';
                            } else if($holder) {
                                $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                    $cont .= '<img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/placeholder.jpg" />';
                                $cont .='</a>';
                            }                            
                        }
                    $cont .= '</div>';
                    
                    $cont .= '<article class="post-content">'; 
                        
                        $cont .='<div class="post-info">';
                            $cont .= '<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
                            $cont .= '<ul class="post-meta">';
                                $cont .= '<li class="meta-date"><i class="fa fa-clock-o"></i>'.get_the_date().'</li>';
                                $cont .= '<li class="meta-user"><i class="fa fa-user"></i>'.__('By:','superfine').' <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a></li>';
                            $cont .='</ul>';
                        $cont .= '</div>';
                        $cont .= '<p>'.it_summary($max_words).'</p>';
                        
                    $cont .= '</article>';
                
                $cont .= '</div>';
            $cont .= '</div>';
            ////////////////// End Style 3 /////////////////////////////
            
        }else{
            
            ////////////////// Style 1 /////////////////////////////
            $cont .= '<div class="'.$t_cols.'">';
                $cont .= '<div class="recent-posts style1">';                        
                    
                    $cont .= '<div class="post-image">';
                        if ( get_post_format() == 'gallery' || get_post_format() == 'video' || get_post_format() == 'audio' ) {
                            $cont .= post_media( get_the_content() );
                        } else if ( get_post_format() == 'image' ) {
                            if( has_post_thumbnail()){
                                if ( post_password_required() || ! has_post_thumbnail() ) { return; }
                                    $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                        $cont .= get_the_post_thumbnail( null, $img_size,'' );
                                    $cont .='</a>';
                            }else{
                                $cont .= bo_post_image(get_the_content());
                            }        
                        } else {
                            if ( get_the_post_thumbnail() ){
                                $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                    $cont .= get_the_post_thumbnail( null, $img_size,'' );
                                $cont .='</a>';
                            } else if($holder) {
                                $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                    $cont .= '<img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/placeholder.jpg" />';
                                $cont .='</a>';
                            }                            
                        }
                    $cont .= '</div>';
                    
                    $cont .= '<article class="post-content">'; 
                        
                        $cont .='<div class="post-info">';
                            $cont .= '<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
                            $cont .= '<ul class="post-meta">';
                                $cont .= '<li class="meta-date"><i class="fa fa-clock-o"></i>'.get_the_date().'</li>';
                                $cont .= '<li class="meta-user"><i class="fa fa-user"></i>'.__('By:','superfine').' <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a></li>';
                            $cont .='</ul>';
                            
                        $cont .= '</div>';
                        $cont .= '<p>'.it_summary($max_words).'</p>';
                        
                    $cont .= '</article>';
                
                $cont .= '</div>';
            $cont .= '</div>';
            ////////////////// End Style 1 /////////////////////////////
            
        }                 
           
        }
        
        $cont .= '</div>';
                
    }else{
        $cont .= '<div class="no_posts alert alert-danger t-center">'.__('No posts to be shown!!','superfine').'</div>';
    }

    wp_reset_postdata();
     
    return $cont;      
}                                               
add_shortcode('it_posts_category', 'it_posts_category_shortcode');
