<?php
function it_blog_shortcode($atts, $content=null){
 
    extract(shortcode_atts( array(
        'it_category'       => '',
        'blog_style'        => 'lg-image',
        'blog_cols'         => '6',
        'tl_sidebar'        => 'left_bar',
        'posts_per_page'    => '10',
        'img_size'          => '',
        'pager_type'        => '1',
        'pager_style'       => 'style1',
        'pg_pos'            => 'centered',
        'el_class'          => '',
        'max_words'         => '40',
        'load_txt'          => 'Load More'
        ), $atts));
    global $post,$paged; 

    $cat_n = $cat_n = $colss = $cat_id = $b_cols = $t_bar = $t_full = $ppage = $size = '';
    
    $class = $blog_style;
    $class .= ( $el_class != '' ) ? ' '.$el_class : "";
    
    $args = array(
        'category_name' => $it_category,
        //'ignore_sticky_posts'   => true,
        'posts_per_page' => $posts_per_page,
        'post_type' => 'post',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'paged' => $paged,
    ); 
    $q = new WP_Query( $args );
        
    if($blog_style == 'timeline'){
        if($tl_sidebar == 'no_bar'){
            $t_bar .= ' timeline_no_bar';
            $class .= ' full';
        }else if ($tl_sidebar == 'right_bar'){
            $class .= ' timeline-left';
        }else{
            $class .= ' timeline-right';
        }
    }
    
    if($q->have_posts()){
        
        $cont = '<div class="blog-shortcode blog-posts '.$class.'" id="content">';   
            while($q->have_posts()){ 
                $q->the_post();
                
                $cont .= ($blog_style == 'timeline') ? '<div class="'.$t_bar.'">' : "";
                $cont .= ($blog_style == 'grid') ? '<div class="col-md-'.$blog_cols.'">' : "";
                
                $colss = ($blog_style == 'masonry') ? " col-md-".$blog_cols : "";
                
                $cont .= '<div class="post-item'.$colss.'">';
                    
                    $cont .= ($blog_style == 'masonry') ? '<div class="mas-inner">' : "";
                    
                    $cont .= ($blog_style != 'timeline') ? bo_post_media($img_size,$blog_style) : "";    
                    if( $blog_style == 'timeline' ) {
                        $cont .= '<div class="timeline_date">';
                           $cont .= '<span class="inner_date main-bg">';
                                $cont .= '<span class="day">'.get_the_date('j').'</span>';
                                $cont .= '<span class="month">'.get_the_date('M').'</span>';
                           $cont .= '</span>';
                           $cont .= '<span class="year">'.get_the_date('Y').'</span>';
                       $cont .= '</div>';
                    }
                    $cont .= '<article class="post-content">';

                        $cont .= ($blog_style == 'timeline') ? bo_post_media($img_size,$blog_style) : "";
                        
                        $cont .= '<div class="p-date">';
                           $cont .= '<span class="p-day">' . get_the_date( 'd' ) . '</span>';
                           $cont .= '<span class="p-month-year"><span class="p-month">' . get_the_date( 'M' ) . '</span>, ';
                           $cont .= '<span class="p-year">' . get_the_date( 'Y' ) . '</span>';
                        $cont .= '</div>';
                        
                        $cont .= '<div class="p-content">';
                            $cont .= '<div class="post-info-container">';
                                $cont .= '<div class="post-info">';
                                    if( get_post_format() == 'link' ){
                                        $title_format  = post_format_link( get_the_content(), get_the_title() );
                                        $it_title   = $title_format['title'];
                                        $it_link = getUrl( $it_title );
                                      $cont .= $it_title;
                                    }else{
                                        $cont .= '<h4><a href="'.esc_url(get_the_permalink()).'" rel="bookmark">'.get_the_title().'</a></h4>';
                                    }
                                    
                                    $cont .= '<ul class="post-meta">';
                                        if($blog_style == 'lg-image'){
                                            $cont .= bo_post_meta_lg();    
                                        }else{
                                            $cont .= bo_post_meta();
                                        }
                                    $cont .= '</ul>';
                                    
                                $cont .= '</div>';
                                
                                $cont .= '<div class="entry-content">';
                                    $cont .= it_summary($max_words);
                                $cont .= '</div>';
                                
                            $cont .= '</div>';
                            
                            $cont .= wp_link_pages( array(
                                'before'      => '<div class="sub-pager"><span class="page-links-title">' . __( 'Pages:', 'superfine' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                                ) );
                                
                            $cont .= ($blog_style == 'grid') ? '</div>' : "";
                        
                        $cont .= '</div>'; 
                        
                    $cont .= '</div>';
                    
                $cont .= '</article>';
                
                
                $cont .= ( $blog_style == 'masonry' ) ? '</div>' : "";

                $cont .= ( $blog_style != 'grid' && $blog_style != 'masonry' && $blog_style != 'timeline' ) ? '<div class="divider skimg"></div>' : ""; 
                
                $cont .= ( $blog_style == 'timeline' && $tl_sidebar != 'no_bar' ) ? '</div><div class="divider dashed-sm blo-divid">' : "";
                $cont .= ( $blog_style == 'timeline') ? '</div>' : "";        
            }
                        
            $cont .= '<div class="clearfix"></div>';        
            
            $total = $q->max_num_pages;
                        
            $big = 999999999;
            
            $args2 = array(
                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                'format' => '&paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $total,
                'type' => 'list',
                'prev_text' => '<i class="fa fa-angle-left"></i>',
                'next_text' => '<i class="fa fa-angle-right"></i>'                    
            );
            
        $cont .= '</div>';
        
        if ( $pager_type == "1" ) {
            $cont .= '<div class="pager '.$pager_style .' '. $pg_pos.'">';
                $cont .= paginate_links( $args2 );
            $cont .= '</div>'; 
        } else if ( $pager_type == "2" ) {
            if( $q->max_num_pages > 1 ){
                $cont .= '<div class="pager oldnew">';
                    $cont .= '<div class="previous">'.get_next_posts_link(__('<span aria-hidden="true"><i class="fa fa-long-arrow-left main-color"></i></span> Older','superfine'), $q->max_num_pages).'</div>';
                    $cont .= '<div class="next">'.get_previous_posts_link(__('Newer <span aria-hidden="true"><i class="fa fa-long-arrow-right main-color"></i></span>','superfine'), $q->max_num_pages).'</div>';
                $cont .= '</div>';
            }
            
        } else if ( $pager_type == "3" ){
            $cont .= '<div class="loadmore">';
                $cont .= '<a class="oc-btn oc-btn-default btn-rounded" href="#">'.$load_txt.' <span class="pager_loading"><i class="main-color icmon-spinner9"></i></span></a>';
                $cont .= '<div class="hidden pgnum">'.$q->max_num_pages.'</div><div class="load_msg">'.__('No More Posts To Show !!','superfine').'</div>';
            $cont .= '</div>';
        }
        
    }else{
        $cont .= '<div class="no_posts alert alert-danger t-center">'.__('No posts to be shown!!','superfine').'</div>';
    }
    
    wp_reset_postdata(); 
    return $cont;
}                                               
add_shortcode('it_blog', 'it_blog_shortcode');

