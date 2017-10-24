<?php
/**
 *
 * IT-RAYS Framework
 *
 * @author IT-RAYS
 * @license Commercial License
 * @link http://www.it-rays.net
 * @copyright 2017 IT-RAYS Themes
 * @package ITFramework
 * @version 1.0.0
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
 
if( ! function_exists( 'it_post_thumbnail' ) ) {
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

if( ! function_exists( 'it_post_icon' ) ){
    function it_post_icon(){
        $post_format = get_post_format();
        switch ( $post_format ) {
          case 'gallery':
            echo '<i class="fa fa-camera post-icon" title="'.esc_html__('Gallery', 'octa').'"></i>';
          break;
          
          case 'link':
            echo '<i class="fa fa-link post-icon" title="'.esc_html__('Link', 'octa').'"></i>';
          break;

          case 'image':
            echo '<i class="fa fa-image post-icon" title="'.esc_html__('Image', 'octa').'"></i>'; 
          break;
          
          case 'quote':
            echo '<i class="fa fa-quote-left post-icon" title="'.esc_html__('Quote', 'octa').'"></i>'; 
          break;
          
          case 'status':
            echo '<i class="fa fa-refresh post-icon" title="'.esc_html__('Status', 'octa').'"></i>'; 
          break;
          
          case 'audio':
            echo '<i class="fa fa-music post-icon" title="'.esc_html__('Status', 'octa').'"></i>'; 
          break;
          
          case 'video':
            echo '<i class="fa fa-video-camera post-icon" title="'.esc_html__('Status', 'octa').'"></i>'; 
          break;
          
          case 'chat':
            echo '<i class="fa fa-comments-o post-icon" title="'.esc_html__('Chat', 'octa').'"></i>'; 
          break;
          
          case 'aside':
            echo '<i class="fa fa-eyedropper post-icon" title="'.esc_html__('Aside', 'octa').'"></i>'; 
          break;
          
          default:
            echo '<i class="fa fa-book post-icon" title="'.esc_html__('Standard', 'octa').'"></i>';
          break;
        }
    }
}

if( ! function_exists( 'it_content_filter' ) ) {
  function it_content_filter( $content ) {
    $post_format = get_post_format();
    if ( $post_format ) {
      $content = apply_filters( 'it-post-format-'. $post_format, $content );
    }
    return $content;
  }
  add_filter( 'the_content', 'it_content_filter', 2 );
}

if( ! function_exists( 'new_excerpt_more' ) ) {
    function new_excerpt_more($more) {
        return '';
    }
    add_filter('excerpt_more', 'new_excerpt_more', 21 );
}

if( ! function_exists( 'the_excerpt_more_link' ) ) {
    function the_excerpt_more_link( $excerpt ){
        $post = get_post();
        $excerpt .= '<a class="more-btn btn main-bg btn-sm" href="'. esc_url(get_permalink($post->ID)) . '"><span>'. esc_html__( 'Read More', 'octa' ) .'</span></a>';
        return $excerpt;
    }
    add_filter( 'get_the_excerpt', 'the_excerpt_more_link', 21 );
}

if( ! function_exists( 'modify_read_more_link' ) ) {
    function modify_read_more_link() {
        global $post;
        return '<a class="more-btn btn main-bg btn-sm" href="'. esc_url(get_permalink($post->ID)) . '"><span>'. esc_html__( 'Read More', 'octa' ) .'</span></a>';
    }
    add_filter( 'the_content_more_link', 'modify_read_more_link' );    
}

if( ! function_exists( 'get_content_format' ) ){
    function get_content_format () {
        global $post;
        $more = '<a class="more-btn btn main-bg btn-sm" href="'. esc_url(get_permalink($post->ID)) . '"><span>'. esc_html__( 'Read More', 'octa' ) .'</span></a>';
        $content = get_the_content();
        $content = strip_shortcodes( $content ); 
        $length = theme_option('it_excerpt');
        
        if(has_excerpt( $post->ID )){
            
            $content = get_the_excerpt();    
        
        } else if( strpos( $post->post_content, '<!--more-->' ) ) {
            
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
        
        } else if($length != '-1'){
            
            $content = wp_trim_words( $content , $length , $more );
        
        }
        
        return $content;
    }    
}

if( ! function_exists( 'strip_shortcode_gallery' ) ) {
    function strip_shortcode_gallery( $content ) {
        preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
        if ( ! empty( $matches ) ) {
            foreach ( $matches as $shortcode ) {
                if ( 'gallery' === $shortcode[2] ) {
                    $pos = strpos( $content, $shortcode[0] );
                    if ($pos !== false)
                        return substr_replace( $content, '', $pos, strlen($shortcode[0]) );
                }
            }
        }
        return $content;
    }
    add_filter( 'it-post-format-gallery', 'strip_shortcode_gallery' );    
} 

if( ! function_exists('get_shortcode_regex') ) {
  function get_shortcode_regex() {
      global $shortcode_tags;
      $tagnames = array_keys($shortcode_tags);
      $tagregexp = join( '|', array_map('preg_quote', $tagnames) );

      // WARNING! Do not change this regex without changing do_shortcode_tag() and strip_shortcode_tag()
      // Also, see shortcode_unautop() and shortcode.js.
      return
          '\\['                              // Opening bracket
        . '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
        . "($tagregexp)"                     // 2: Shortcode name
        . '(?![\\w-])'                       // Not followed by word character or hyphen
        . '('                                // 3: Unroll the loop: Inside the opening shortcode tag
        .     '[^\\]\\/]*'                   // Not a closing bracket or forward slash
        .     '(?:'
        .         '\\/(?!\\])'               // A forward slash not followed by a closing bracket
        .         '[^\\]\\/]*'               // Not a closing bracket or forward slash
        .     ')*?'
        . ')'
        . '(?:'
        .     '(\\/)'                        // 4: Self closing tag ...
        .     '\\]'                          // ... and closing bracket
        . '|'
        .     '\\]'                          // Closing bracket
        .     '(?:'
        .         '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
        .             '[^\\[]*+'             // Not an opening bracket
        .             '(?:'
        .                 '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
        .                 '[^\\[]*+'         // Not an opening bracket
        .             ')*+'
        .         ')'
        .         '\\[\\/\\2\\]'             // Closing shortcode tag
        .     ')?'
        . ')'
        . '(\\]?)';                          // 6: Optional second closing brocket for escaping shortcodes: [[tag]]
    }
}

if( ! function_exists( 'wp_tagregexp' ) ) {
  function wp_tagregexp() {
    apply_filters( 'wp_custom_tagregexp', 'video|media|audio|playlist|video-playlist|embed' );
  }
}

if( ! function_exists( 'getUrl' ) ) {
  function getUrl( $html ) {
    $regex  = "/^\b(?:(?:https?|ftp):\/\/)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
    preg_match( $regex, $html, $matches );
    return ( !empty( $matches[0] ) ) ? $matches[0] : false;
  }
}

if( ! function_exists( 'post_media' ) ) {
  function post_media( $content ) {
    $media    = getUrl( $content );
    if( ! empty( $media ) ) {
      global $wp_embed;
      $content  = do_shortcode( $wp_embed->run_shortcode( '[embed]'. $media .'[/embed]' ) );
    } else {
      $pattern = get_shortcode_regex( wp_tagregexp() );
      preg_match( '/'.$pattern.'/s', $content, $media );
      if ( ! empty( $media[2] ) ) {
        if( $media[2] == 'embed' ) {
          global $wp_embed;
          $content = do_shortcode( $wp_embed->run_shortcode( $media[0] ) );
        } else {
          $content = do_shortcode( $media[0] );
        }
      }
    }
    if( ! empty( $media ) ) {
      if(get_post_format() == 'gallery'){
          $output = '<div class="post-gallery">';
      }else{
          $output = '<div class="post-media">';
      }
      $output .= $content;
      $output .= '</div>';
      return $output;
    }
    return false;
  }
}

if( ! function_exists( 'link_href' ) ) {
  function link_href( $string ) {
    preg_match( '/<a href="(.*?)">/i', $string, $atts );
    return ( ! empty( $atts[1] ) ) ? $atts[1] : '';
  }
}

if( ! function_exists( 'post_format_link' ) ) {
  function post_format_link( $content = null, $title = null, $post = null ) {

    if ( ! $content ) {
      $post     = get_post( $post );
      $title    = $post->post_title;
      $content  = $post->post_content;
    }
    
    $link   = getUrl( $content );
    
    if( ! empty( $link ) ) {

      $title    = '<a class="main-color" href="'. esc_url( $link ) .'" rel="bookmark">'. $title .'</a>';
      $content  = str_replace( $link, '', $content );

    } else {

      $pattern    = '/^\<a[^>](.*?)>(.*?)<\/a>/i';
      preg_match( $pattern, $content, $link );

      if( ! empty( $link[0] ) && ! empty( $link[2] ) ) {

        $title    = $link[0];
        $content  = str_replace( $link[0], '', $content );

      } elseif( ! empty( $link[0] ) && ! empty( $link[1] ) ) {

        $atts     = shortcode_parse_atts( $link[1] );
        $target = ( ! empty( $atts['target'] ) ) ? $atts['target'] : '_self';
        $title  = ( ! empty( $atts['title'] ) )  ? $atts['title']  : $title;
        $title    = '<a class="main-color" href="'. esc_url( $atts['href'] ) .'" rel="bookmark" target="'. esc_attr($target) .'">'. $title .'</a>';
        $content  = str_replace( $link[0], '', $content );

      } else {
        $title  = '<a class="main-color" href="'. esc_url( get_permalink() ) .'" rel="bookmark">'. $title .'</a>';
      }

    }

    $output['title']   = '<h4>'. $title . '</h4>';
    $output['content'] = $content;

    return $output;

  }
}

if( ! function_exists( 'post_image' ) ) {
    function post_image( $content ) {
        
        global $post, $posts;
        $first_img = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $first_img = $matches [1] [0];
        if ( is_singular() ) {
          if ( theme_option( 'singlepostimg_on' ) ) {
              echo '<div class="details-img">';
              ?>
              <img alt="" src="<?php echo esc_url($first_img); ?>" />
              <?php
              echo '</div>';
          }
        }else{
          if(!empty($first_img)){
                ?>
                <div class="post-image">
                    <a href="<?php the_permalink(); ?>">
                        <img alt="" src="<?php echo esc_url($first_img); ?>" />
                    </a>
                </div>
                <?php            
            }else{
                it_post_thumbnail();
            }  
        }
        
    }
}

if( ! function_exists( 'it_post_chat' ) ) {
  function it_post_chat( $content ) {

    $output = '<ul class="post-chat">';
    $rows   = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );
    $i      = 0;

    foreach ( $rows as $row ) {

      if ( strpos( $row, ':' ) ) {

        $row_split  = explode( ':', trim( $row ), 2 );
        $author     = strip_tags( trim( $row_split[0] ) );
        $text       = trim( $row_split[1] );

        $output .= '<li class="chat-row row-'. ($i%2 ? 'odd':'even') .'">';
        $output .= '<span class="chat-author '. sanitize_html_class( strtolower( "chat-author-{$author}" ) ) . '"><i class="fa fa-comment"></i> <cite class="auth-name">' . $author . '</cite>' . ':' . '</span>'.$text;
        $output .= '</li>';

        $i++;
      } else {
        $output .= $row;
      }

    }

    $output .= '</ul>';
    return $output;

  }
  add_filter( 'it-post-format-chat', 'it_post_chat' );
}

if( ! function_exists( 'it_media_content' ) ) {
  function it_media_content( $content ) {

    $media = getUrl( $content );

    if( ! empty( $media ) ){

      $content  = str_replace( $media, '', $content );

    } else {

      $pattern = get_shortcode_regex( wp_tagregexp() );
      preg_match( '/'.$pattern.'/s', $content, $media );
      if ( ! empty( $media[2] ) ) {
        $content = str_replace( $media[0], '', $content );
      }

    }

    return $content;
  }
  add_filter( 'it-post-format-video', 'it_media_content' );
  add_filter( 'it-post-format-audio', 'it_media_content' );
}

if( ! function_exists( 'it_post_link' ) ) {
  function it_post_link( $content ){
    $parse_content = post_format_link( $content );
    return $parse_content['content'];
  }
  add_filter( 'it-post-format-link', 'it_post_link' );
}

if( ! function_exists( 'it_post_meta' ) ) {
  function it_post_meta() {

    global $post;

    if ( is_sticky() && is_home() && ! is_paged() ) {
      echo '<li class="post-sticky"><i class="fa fa-magic"></i>' . esc_html__( 'Sticky', 'octa' ) . '</li>';
    }
    
    echo '<li class="main-color">';
    it_post_icon();
    echo '</li>';
    
    if ( !is_singular() || ( is_singular() &&  theme_option('singleauthor_on') == "1" )){    
        echo '<li class="meta-user"><i class="fa fa-user"></i>'.__('By: ', 'octa').'<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">'.get_the_author().'</a></li>';
    }
    
    if ( !is_singular() || ( is_singular() &&  theme_option('singlecategory_on') == "1" )){
        if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) {
          echo '<li class="meta-cat"><i class="fa fa-folder-open"></i>'.__('Categories: ', 'octa'). get_the_category_list( ', ' ) .'</li>';
        }
    }
    
    $num_comments = get_comments_number();

    if ( comments_open() && theme_option('singlecomment_on') == "1" ) {
            if ( $num_comments == 0 ) {
                $comments = __('0', 'octa');
            } elseif ( $num_comments > 1 ) {
                $comments = $num_comments . __(' Comments', 'octa');
            } else {
                $comments = __('1', 'octa');
            }
            echo '<li><a href="' . get_comments_link() .'"><i class="fa fa-comments"></i>'. $comments.'</a></li>';
    }     

    edit_post_link( esc_html__( 'Edit', 'octa' ), '<li class="entry-edit-link"><i class="fa fa-edit"></i>', '</li>' );
  }
}

if( ! function_exists( 'it_post_meta_single' ) ) {
  function it_post_meta_single() {

    global $post;
    if ( theme_option('post_icon_on') == "1" ) {
        echo '<li class="main-color">';
            it_post_icon();
        echo '</li>';
    }
    
    if ( is_sticky() && is_home() && ! is_paged() ) {
      echo '<li class="post-sticky"><i class="fa fa-magic"></i>' . esc_html__( 'Sticky', 'octa' ) . '</li>';
    }
    
    if ( !is_singular() || ( is_singular() &&  theme_option('singleauthor_on') == "1" )){    
        echo '<li class="meta-user"><i class="fa fa-user"></i>'.esc_html__('By: ', 'octa').'<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">'.get_the_author().'</a></li>';
    }
    
    if ( !is_singular() || ( is_singular() &&  theme_option('singledate_on') == "1" )){
        echo '<li class="meta-date"><i class="fa fa-clock-o"></i>'.esc_html__('On: ', 'octa').esc_html(get_the_date()).'</li>';
    }
    
    if ( !is_singular() || ( is_singular() &&  theme_option('singlecategory_on') == "1" )){
        if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) {
          echo '<li class="meta-cat"><i class="fa fa-folder-open"></i>'.esc_html__('Categories: ', 'octa'). get_the_category_list( ', ' ) .'</li>';
        }
    }
    
    if ( ! is_search() ) {
      if ( ! post_password_required() && ( comments_open() || get_comments_number() ) )  {
          if ( !is_singular() || ( is_singular() &&  theme_option('singlecomment_on') == "1" )){
              ?>
              <li><?php
              comments_popup_link( __( 'Leave a comment', 'octa' ), '<i class="fa fa-comments"></i>1', '<i class="fa fa-comments"></i>%', 'meta_comments' );
              ?>
              </li><?php
          }
      }

    }
    if ( class_exists( 'OCTA_Core' ) ) {
        echo '<li>'.getPostLikeLink( $post->ID ).'</li>';
    }
    edit_post_link( esc_html__( 'Edit', 'octa' ), '<li class="entry-edit-link"><i class="fa fa-edit"></i>', '</li>' );
  }
}                 

if( ! function_exists( 'add_it_media' ) ) {
    function add_it_media(){

      // define your backbone template;
      // the "tmpl-" prefix is required,
      // and your input field should have a data-setting attribute
      // matching the shortcode name
      ?>
      <script type="text/html" id="tmpl-slideshow-gallery">
        <label class="setting">
          <span><?php _e('SlideShow ?', 'octa'); ?></span>
          <select data-setting="it_slideshow">
            <option value="no"> No </option>
            <option value="yes"> Yes </option>
          </select>
        </label>
      </script>

      <script type="text/javascript">

        jQuery(document).ready(function(){

          // add your shortcode attribute and its default value to the
          // gallery settings list; $.extend should work as well...
          _.extend(wp.media.gallery.defaults, {
            my_custom_attr: 'no'
          });

          // merge default gallery settings template with yours
          wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
            template: function(view){
              return wp.media.template('gallery-settings')(view)
                   + wp.media.template('slideshow-gallery')(view);
            }
          });

        });

      </script>
      <?php

    } 
    add_action('print_media_templates', 'add_it_media');   
}                   

if( ! function_exists( 'move_pagination' ) ){
    function move_pagination( $content ) {
        if ( is_single() ) {
            $pagination = wp_link_pages( array(
                'before'      => '<div class="sub-pager"><span class="page-links-title">' . esc_html__( 'Pages:', 'octa' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'echo'        => 0,
            ) );
            $content .= $pagination;
            return $content;
        }
        return $content;
    }
    add_filter( 'the_content', 'move_pagination', 1 );    
}

add_filter('use_default_gallery_style','__return_false');
