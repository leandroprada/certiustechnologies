<?php

if ( ! function_exists ( 'bo_post_icon' ) ){
    function bo_post_icon(){
        $post_format = get_post_format();
        switch ( $post_format ) {
          case 'gallery':
            return '<i class="fa fa-camera post-icon" title="'.__('Gallery','superfine').'"></i>';
          break;
          
          case 'link':
            return '<i class="fa fa-link post-icon" title="'.__('Link','superfine').'"></i>';
          break;

          case 'image':
            return '<i class="fa fa-image post-icon" title="'.__('Image','superfine').'"></i>'; 
          break;
          
          case 'quote':
            return '<i class="fa fa-quote-left post-icon" title="'.__('Quote','superfine').'"></i>'; 
          break;
          
          case 'status':
            return '<i class="fa fa-refresh post-icon" title="'.__('Status','superfine').'"></i>'; 
          break;
          
          case 'audio':
            return '<i class="fa fa-music post-icon" title="'.__('Status','superfine').'"></i>'; 
          break;
          
          case 'video':
            return '<i class="fa fa-video-camera post-icon" title="'.__('Status','superfine').'"></i>'; 
          break;
          
          case 'chat':
            return '<i class="fa fa-comments-o post-icon" title="'.__('Chat','superfine').'"></i>'; 
          break;
          
          case 'aside':
            return '<i class="fa fa-eyedropper post-icon" title="'.__('Aside','superfine').'"></i>'; 
          break;
          
          default:
            return '<i class="fa fa-book post-icon" title="'.__('Standard','superfine').'"></i>';
          break;
        }
    }
}

if ( ! function_exists ( 'it_post_thumbnail' ) ) {
  function it_post_thumbnail( $link = '' ) {
    $post_format = get_post_format();
    if ( post_password_required() || ! has_post_thumbnail() ) { return; }

    global $it_blog_image_size;

    $size  = ( empty( $it_blog_image_size ) ) ? theme_option( 'blog_image_size' ) : $it_blog_image_size; 
    $link  = ( empty( $link ) ) ? get_permalink() : $link;


    if ( is_singular() ) {
      if ( theme_option( 'singlepostimg_on' ) ) {
          echo '<div class="details-img">';
            the_post_thumbnail( theme_option( 'singlepostimg_size' ) );
          echo '</div>';
      }
    } else {
        echo '<div class="post-image">';
        if($post_format == 'link'){     
            echo '<div class="post-thumbnail">';
        } else {
            echo '<a href="'. esc_url($link) .'" class="post-thumbnail">';
        }        
        the_post_thumbnail( $size );
        if($post_format == 'link'){
            echo '</div>';
        }else{
            echo '</a>';
        }
        echo '</div>';
    }
  
  }
}

if ( ! function_exists ( 'bo_post_image' ) ) {
    function bo_post_image( $content ) {
        
        global $post, $posts;
        $first_img = $contents = '';
        $holder = theme_option('img_placeholder');
        ob_start();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $first_img = $matches [1] [0];
        ob_end_clean();
          if(!empty($first_img)){
                $contents .= '<div class="post-image"><a href="'.get_the_permalink().'"><img alt="" src="'.esc_url($first_img).'" /></a></div>';
                return $contents;
            }else{
                if ( get_the_post_thumbnail() ){
                    it_post_thumbnail();
                }else if($holder) {
                    echo '<div class="post-image"><a href="'.get_the_permalink().'"><img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/placeholder.jpg" /></a></div>';
                }
            }
        }
        
}

if ( ! function_exists( 'bo_post_image2' ) ) {
    function bo_post_image2( $content ) {
        
        global $post, $posts;
        $first_img = $contents2 = '';
        $holder = theme_option('img_placeholder');
        ob_start();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $first_img = $matches [1] [0];
        ob_end_clean();
          if(!empty($first_img)){
                $contents2 .='<div class="post-image"><a href="'.get_the_permalink().'"><img alt="" src="'.esc_url($first_img).'" /></a></div>';
                return $contents2;
            }else{
                if ( get_the_post_thumbnail() ){
                    it_post_thumbnail();
                 }else if($holder) {
                    echo '<div class="post-image"><a href="'.get_the_permalink().'"><img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/placeholder.jpg" /></a></div>';
                }
            }
        }
        
}

if ( ! function_exists( 'it_summary' ) ){
    function it_summary($max_words){
        global $post;
        $more = '<a class="more-btn btn main-bg btn-sm" href="'. esc_url(get_permalink($post->ID)) . '"><span>'. esc_html__( 'Read More', 'octa' ) .'</span></a>';
        
        $content = get_the_content();
        $content = strip_shortcodes( $content ); 
        
        if ( has_excerpt( $post->ID ) ){
            
            $content = get_the_excerpt();    
        
        } else if( strpos( $post->post_content, '<!--more-->' ) ) {
            
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
        
        }
        
        if($max_words != '-1'){
            
            $content = wp_trim_words( $content , $max_words , $more );
        
        }
                
        return $content;
    } 
}

if ( ! function_exists ( 'bo_post_media' ) ){
    function bo_post_media ($img_size,$blog_style){
        global $post;
        $holder = theme_option('img_placeholder');
        $cont = '';
        if ( get_post_format() == 'gallery' || get_post_format() == 'video' || get_post_format() == 'audio' ) {
            $cont .= post_media( get_the_content() );
        } else if ( get_post_format() == 'image' ) {
            if( has_post_thumbnail()){
                if ( post_password_required() || ! has_post_thumbnail() ) { return; }
                $cont .='<div class="post-image">';
                    $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                        $cont .= get_the_post_thumbnail( null, $img_size,'' );
                    $cont .='</a>';
                $cont .='</div>';
            }else{
                $cont .= bo_post_image(get_the_content());
            }        
        } else {
            if ( get_the_post_thumbnail() ){
                $cont .='<div class="post-image">';
                    $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                        $cont .= get_the_post_thumbnail( null, $img_size,'' );
                    $cont .='</a>';
                $cont .='</div>';
            } else if($holder) {
                $cont .='<div class="post-image">';
                    $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                        $cont .= '<img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/placeholder.jpg" />';
                    $cont .='</a>';
                $cont .='</div>';
            }   
        }
        return $cont;
    }    
}

if ( ! function_exists ( 'bo_post_meta' ) ){
    function bo_post_meta (){
        global $post;
        $cont = '';
        
        if ( is_sticky() ) {
          $cont .= '<li class="post-sticky"><i class="fa fa-magic"></i>' . esc_html__( 'Sticky', 'superfine' ) . '</li>';
        }
        
        $cont .= '<li class="main-color">';
            $cont .= bo_post_icon();
        $cont .= '</li>';
        
        if ( !is_singular() || ( is_singular() )){    
            $cont .= '<li class="meta-user"><i class="fa fa-user"></i>'.__('By: ','superfine').'<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">'.get_the_author().'</a></li>';
        }
        
        if ( !is_singular() || ( is_singular() ) ){
            $cont .= '<li class="meta-date"><i class="fa fa-clock-o"></i>'.__('On: ','superfine').get_the_date().'</li>';
        }
        
        if ( !is_singular() || ( is_singular() )){
            if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) {
              $cont .= '<li class="meta-cat"><i class="fa fa-folder-open"></i>'.__('Categories: ','superfine'). get_the_category_list( ', ' ) .'</li>';
            }
        }
        
        if ( ! is_search() ) {
          if ( ! post_password_required() && ( comments_open() || get_comments_number() ) )  {
              if ( !is_singular() || ( is_singular() )){
                  $cont .= '<li>';
                    $cont .= get_comments_popup_link( __( 'Leave a comment', 'superfine' ), '<i class="fa fa-comments"></i>1', '<i class="fa fa-comments"></i>%', 'meta_comments' );
                  $cont .= '</li>';
              }
          }

        }
        
        $cont .= '<li>'.getPostLikeLink( $post->ID ).'</li>';
        
        return $cont;
    }
    
}

if ( ! function_exists ( 'bo_post_meta_lg' ) ){
    function bo_post_meta_lg (){
        global $post;
        $cont = '';
        if ( is_sticky() ) {
          $cont .= '<li class="post-sticky"><i class="fa fa-magic"></i>' . esc_html__( 'Sticky', 'superfine' ) . '</li>';
        }
        
        $cont .= '<li class="main-color">';
            $cont .= bo_post_icon();
        $cont .= '</li>';
        
        if ( !is_singular() || ( is_singular() )){    
            $cont .= '<li class="meta-user"><i class="fa fa-user"></i>'.__('By: ','superfine').'<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">'.get_the_author().'</a></li>';
        }
        if ( !is_singular() || ( is_singular() )){
            if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) {
              $cont .= '<li class="meta-cat"><i class="fa fa-folder-open"></i>'.__('Categories: ','superfine'). get_the_category_list( ', ' ) .'</li>';
            }
        }                
        return $cont;
    }
}   

if ( ! function_exists ( 'get_comments_popup_link' ) ) {
    function get_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
    global $wpcommentspopupfile, $wpcommentsjavascript;
 
    $id = get_the_ID();
 
    if ( false === $zero ) $zero = esc_html__( 'No Comments','superfine' );
    if ( false === $one ) $one = esc_html__( '1 Comment','superfine' );
    if ( false === $more ) $more = esc_html__( '% Comments','superfine' );
    if ( false === $none ) $none = esc_html__( 'Comments Off','superfine' );
 
    $number = get_comments_number( $id );
 
    $str = '';
 
    if ( 0 == $number && !comments_open() && !pings_open() ) {
        $str = '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
        return $str;
    }
 
    if ( post_password_required() ) {
        $str = esc_html__('Enter your password to view comments.','superfine');
        return $str;
    }
 
    $str = '<a href="';
    if ( $wpcommentsjavascript ) {
        if ( empty( $wpcommentspopupfile ) )
            $home = home_url();
        else
            $home = get_option('siteurl');
        $str .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
        $str .= '" onclick="wpopen(this.href); return false"';
    } else { // if comments_popup_script() is not in the template, display simple comment link
        if ( 0 == $number )
            $str .= get_permalink() . '#respond';
        else
            $str .= get_comments_link();
        $str .= '"';
    }
 
    if ( !empty( $css_class ) ) {
        $str .= ' class="'.$css_class.'" ';
    }
    $com_title = the_title_attribute( array('echo' => 0 ) );
 
    $str .= apply_filters( 'comments_popup_link_attributes', '' );
 
    $str .= ' title="' . esc_attr( sprintf( esc_html__('Comment on %s','superfine'), $com_title ) ) . '">';
    $str .= get_comments_number_str( $zero, $one, $more );
    $str .= '</a>';
     
    return $str;
}
}

if ( ! function_exists ( 'get_comments_number_str' ) ){
    function get_comments_number_str( $zero = false, $one = false, $more = false, $deprecated = '' ) {
    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );
 
    $number = get_comments_number();
 
    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? esc_html__('% Comments','superfine') : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? esc_html__('No Comments','superfine') : $zero;
    else // must be one
        $output = ( false === $one ) ? esc_html__('1 Comment','superfine') : $one;
 
    return apply_filters('comments_number', $output, $number);
}
}