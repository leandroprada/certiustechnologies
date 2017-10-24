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

// Add theme support..
if( ! function_exists( 'after_setup_theme' ) ) {
    function it_after_setup_theme() {
        if ( function_exists( 'add_theme_support' ) ) {
            add_theme_support( 'post-thumbnails' );
        }
        add_theme_support('automatic-feed-links');
        add_image_size( 'blog-large-image', 850, 300, true );
        add_image_size( 'blog-small-image', 400, 380, true );
        
        // add theme support for wp 4.1 and higher.
        add_theme_support( "title-tag" );
        
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery', 'status', 'chat',
        ));
        
        add_theme_support( 'custom-background', apply_filters( 'it_custom_background_args', array(
            'default-color' => 'f5f5f5',
        ) ) );

        // Add support for featured content.
        add_theme_support( 'featured-content', array(
            'featured_content_filter' => 'it_get_featured_posts',
            'max_posts' => 6,
        ));
        add_theme_support('custom-header');
        add_theme_support( 'bbpress' );
        add_editor_style();
        define( 'HEADER_IMAGE_WIDTH', apply_filters( 'it_header_image_width', 1920 ) );
        define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'it_header_image_height', 320 ) );
        load_theme_textdomain( 'octa', THEME_DIR . '/languages' );                     
    }
    add_action( 'after_setup_theme', 'it_after_setup_theme' );
}
function remove_api () {
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}
add_action( 'after_setup_theme', 'remove_api' );

// Get theme image sizes..
if ( ! function_exists( 'it_get_image_sizes' ) ) {
    function it_get_image_sizes() {
        global $_wp_additional_image_sizes;
        $default_image_sizes = array( 
            'thumbnail' => 'Thumbnail', 
            'medium' => 'Medium', 
            'large' => 'Large' 
        );
        $image_sizes = get_intermediate_image_sizes(); 
        $images = array();
        foreach ( $image_sizes as $size ) {
            $images[$size] = $size;
        }
               
        return $images;
    }    
}

// Add media to editor.. 
add_filter('media_send_to_editor', 'media_editor', 1, 3);
function media_editor($html, $send_id, $attachment ){
    $post = get_post($send_id);
    $html .= '<media>'.$post->guid.'</media>';
    return $html;
}

// Select menus..
if ( ! function_exists( 'site_menu' ) ){
    function site_menu(){
        $menus = get_registered_nav_menus();
        foreach($menus as $location => $description){
            $selmenu[$location] = $description;
        }
        $smenu = array('' => '-- Select Menu --');
        $selmenu = $smenu + $selmenu;
        return $selmenu;
    }    
}

// If visual composer plugin is active functions..
if ( ! function_exists( 'vc_active' ) ) {
    function vc_active() {
        if ( class_exists( 'Vc_Manager' ) && defined( 'WPB_VC_VERSION' ) ) { return true; } else { return false; }
    }
}
if(vc_active()){
    $direc = THEME_DIR.'/layout/vc_templates';
    vc_set_shortcodes_templates_dir( $direc );
    
    if( ! function_exists( 'get_vc_it_column' ) ) {
        function get_vc_it_column( $width = '' ) {
            $width = explode('/', $width);
            $width = ( $width[0] != '1' ) ? $width[0] * floor(12 / $width[1]) : floor(12 / $width[1]);
            return  'col-md-'.$width;
        }
    }

    if( ! function_exists( 'it_column_offset_class_merge' ) ) {
        function it_column_offset_class_merge( $column_offset, $width ) {
            $width = explode('/', $width);
            $width = ( $width[0] != '1' ) ? $width[0] * floor(12 / $width[1]) : floor(12 / $width[1]);
            if ( '1' === vc_settings()->get( 'not_responsive_css' ) ) {
                $column_offset = preg_replace( '/col\-(lg|md|xs)[^\s]*/', '', $column_offset );
            }
            if ( preg_match( '/col\-sm\-\d+/', $column_offset ) ) {
                return $column_offset;
            }
            return 'col-md-'.$width . ( empty( $column_offset ) ? '' : ' ' . $column_offset );
        }
    }
}

// Forums issue with selected menu item..  
if ( ! function_exists( 'it_custom_menu_classes' ) ){
   function it_custom_menu_classes( $classes , $item ){
        global $post;
        if (function_exists('is_bbpress') && is_bbpress() ) {
            $post_slug=$post->post_name;
            $classes = str_replace( 'current_page_parent', '', $classes );
            $classes = str_replace( $post_slug, 'current_page_parent', $classes );
        }
        return $classes;
    } 
}
add_filter( 'nav_menu_css_class', 'it_custom_menu_classes', 10, 2 );

// Modefied numbers for recent posts..
function get_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
    global $wpcommentspopupfile, $wpcommentsjavascript;
 
    $id = get_the_ID();
 
    if ( false === $zero ) $zero = esc_html__( 'No Comments', 'octa' );
    if ( false === $one ) $one = esc_html__( '1 Comment', 'octa' );
    if ( false === $more ) $more = esc_html__( '% Comments', 'octa' );
    if ( false === $none ) $none = esc_html__( 'Comments Off', 'octa' );
 
    $number = get_comments_number( $id );
 
    $str = '';
 
    if ( 0 == $number && !comments_open() && !pings_open() ) {
        $str = '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
        return $str;
    }
 
    if ( post_password_required() ) {
        $str = esc_html__('Enter your password to view comments.', 'octa');
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
 
    $str .= ' title="' . esc_attr( sprintf( esc_html__('Comment on %s', 'octa'), $com_title ) ) . '">';
    $str .= get_comments_number_str( $zero, $one, $more );
    $str .= '</a>';
     
    return $str;
}
function get_comments_number_str( $zero = false, $one = false, $more = false, $deprecated = '' ) {
    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );
 
    $number = get_comments_number();
 
    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? esc_html__('% Comments', 'octa') : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? esc_html__('No Comments', 'octa') : $zero;
    else // must be one
        $output = ( false === $one ) ? esc_html__('1 Comment', 'octa') : $one;
 
    return apply_filters('comments_number', $output, $number);
}

// Pagination..
if ( ! function_exists( 'it_paging_nav' ) ) {
    function it_paging_nav() {
        global $wp_query;
        if ( $wp_query->max_num_pages < 2 ) return;
        $big = 999999999;
        $args = array(
            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'type' => 'list',
            'prev_text' => '<i class="fa fa-angle-left"></i>',
            'next_text' => '<i class="fa fa-angle-right"></i>'                    
        );
        
        $pg_pos = theme_option('pager_position');
        $pg_style = theme_option('pager_style');
        $p_type = theme_option('pager_type');
        $lodtxt = (theme_option('load_more_text') != '' ) ? esc_attr(theme_option('load_more_text')) : __('Load More','octa');
        
        if ( $p_type == "1" ) { ?>
            <div class="pager <?php echo esc_attr($pg_style) .' '. esc_attr($pg_pos);?>">
                <?php echo paginate_links( $args ); ?>
            </div>
        <?php } else if ( $p_type == "2" ) { ?>
            <ul class="pager oldnew">
                <li class="previous"><?php next_posts_link(__('<span aria-hidden="true"><i class="fa fa-long-arrow-left main-color"></i></span> Older', 'octa')) ?></li>
                <li class="next"><?php previous_posts_link(__('Newer <span aria-hidden="true"><i class="fa fa-long-arrow-right main-color"></i></span> ', 'octa')) ?></li>
            </ul>
        <?php } else if ( $p_type == "3" ){ ?>
             <div class="loadmore">
                <a href="#" class="oc-btn oc-btn-default btn-rounded"><?php echo esc_attr($lodtxt); ?> <span class="pager_loading"><i class="main-color icmon-spinner9"></i></span></a>
                <div class="hidden pgnum"><?php echo esc_attr($wp_query->max_num_pages) ?></div>
                <div class="load_msg"><?php echo __('No More Posts To Show !!', 'octa') ?></div>
            </div>
        <?php }
    }
}         

// Infinite scroll pagination..
if ( theme_option('pager_type') == "3" && is_home() ){
    add_action('wp_ajax_infinite_scroll', 'wp_infinitepaginate');
    add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinitepaginate');
}
function wp_infinitepaginate(){ 
    $loopFile        = $_POST['loop_file'];
    $paged           = $_POST['page_no'];
    $posts_per_page  = theme_option("pagesNo");
    query_posts(array('paged' => $paged, 'post_status' => 'publish')); 
    get_template_part( $loopFile );
    exit;
}

// EDD Pagination..
if ( ! function_exists( 'edd_paging' ) ) {
    function edd_paging() {
        $paged = get_query_var('paged');
        $pages_edd = theme_option('pages_edd');
        
        $args = array(
            'posts_per_page' => $pages_edd,
            'post_type' => 'download',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'paged' => $paged,
        ); 
        $q = new WP_Query( $args );
        
        $big = 999999999;
        $total = $q->max_num_pages;

        $args2 = array(
            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            'format' => '&paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $total,
            'type' => 'list',
            'prev_text' => '<i class="fa fa-angle-left"></i>',
            'next_text' => '<i class="fa fa-angle-right"></i>'                    
        );
        
        ?>
        <div class="pager">
            <?php echo paginate_links( $args2 ); ?>
        </div>
        <?php 
    }
}

// if wpml is activated..
if ( ! function_exists( 'if_wpml_activated' ) ) {
  function if_wpml_activated() {
    if ( class_exists( 'SitePress' ) ) { return true; } else { return false; }
    
  }
}

// WPML plugin..
if ( class_exists( 'SitePress' ) ) {
   define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true); 
}

// get current page ID..
if ( ! function_exists( 'c_page_ID' ) ){
    function c_page_ID(){
        global $post;
        $pageID = '';
        if( ( get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) && is_home() )) {
            $pageID = get_option('page_for_posts');
        } else {
            if(isset($post) && !is_search()) {
                $pageID = $post->ID;
            }
            if(class_exists('Woocommerce')) {
                if(is_shop() || is_tax('product_cat') || is_tax('product_tag')) {
                    $pageID = get_option('woocommerce_shop_page_id');
                }
            }
        }
        return $pageID;
    }
}

// Get logged in user..
if ( !function_exists('loggedUser') ){
    function loggedUser(){
       global $user_identity;
       echo esc_html($user_identity); 
    }
}

// Page Loader..
if ( ! function_exists( 'oc_loader' ) ) {
    function oc_loader(){
        $loader = theme_option('page_loader');
        $pr_ld = theme_option('page_loader_style');
        $loadimg = theme_option('loaderimage');
        if ($loader == '1'){ 
            $output = '<div class="page-loader">';
            if( $pr_ld == 'circles' || $pr_ld == 'spin_Square' || $pr_ld == 'large_dots' || $pr_ld == 'line_with_Dots' ){
                $output .= '<div class="'.$pr_ld.'"><div class="circlesload"></div></div>';
            } else if( $pr_ld == 'img-load') {
                $output .= '<div class="loader_img"><img alt="" src="'.esc_url($loadimg).'"></div>';
            } else {
                $output .= '<div class="cp-spinner '.$pr_ld.'"></div>';
            }
            $output .= '</div>';
            echo $output;
        }
    }    
}

// Site Logo..
if ( ! function_exists( 'site_logo' ) ) {
    function site_logo () {
        $logo_type = theme_option("logo_type");
        $logo = theme_option("header_logo_image");
        $sticky_logo = theme_option("sticky_logo");
        ?>
        <div class="logo pull-left">
            <?php if( $logo_type == 'image' ){ ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-img">
                    
                    <?php if( $logo != '' ){ ?>
                        <img alt="" class="default_logo" src="<?php echo esc_url($logo); ?>">
                    <?php } ?>
                    
                    <?php if( $sticky_logo != '' ){ ?>
                        <img alt="" class="sticky_logo" src="<?php echo esc_url($sticky_logo); ?>">
                    <?php } else if( $logo != '' ){ ?>
                        <img alt="" class="sticky_logo" src="<?php echo esc_url($logo); ?>">
                    <?php } ?>
                    
                </a>
            <?php } else { ?>
                <h1>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">     
                        <i class="logo-txt main-color"><?php bloginfo( 'name' ); ?></i>
                        <span class="tagline"><?php bloginfo('description'); ?></span>
                    </a>
                </h1>
           <?php } ?>
        </div>
        <?php
    }
}

// Theme Header..
if ( ! function_exists( 'octa_header' ) ){
    function octa_header(){
        $hide_header = get_post_meta( c_page_ID() , 'meta_hide_header' , true);
        $meta_header = get_post_meta( c_page_ID() , 'meta_header_style' , true);
        $lay404 = theme_option('404_layout');
        $wrapper = $headclass = $class = $anims = $an_in = $an_out = $du_in = $du_out = $anim_cov = '';
        $options = get_post_custom(get_the_ID());
        $header_layout = theme_option('header_layout');
        $anim = theme_option('animsition');
        $anim_in = theme_option('data-animsition-in');
        $anim_out = theme_option('data-animsition-out');
        $dur_in = theme_option('data-duration-in');
        $dur_out = theme_option('data-duration-out');
        $header_style = get_post_meta(c_page_ID(),'meta_header_style',true);
        if( theme_option('body_smooth') == '' ){
            $class = ' default-scroll';
        }
        if( isset($options['main_layout']) && $options['main_layout'][0] != 'theme'){
            $wrapper .= ' '.$options['main_layout'][0];
        }else{
            $wrapper .= ' '.theme_option('layout');
        }

        // Left & Right Side Headers..
        if($header_style){
            if ( $header_style == "left" ) {
                $headclass .= ' left side-wrap'; 
            }else if ( $header_style == "right" ) {
                $headclass .= ' right side-wrap';
            }            
        }else{
            if ( $header_layout == "left" ) {
                $headclass .= ' left side-wrap'; 
            }else if ( $header_layout == "right" ) {
                $headclass .= ' right side-wrap';
            }
        }

        // Page Animations.
        if ( $anim == "1" ) {
            $wrapper .= ' animsition';
            $an_in = ' data-anim-in-class="'.$anim_in.'"';
            $an_out = ' data-anim-out-class="'.$anim_out.'"';
            $du_in = ' data-anim-in-duration="'.$dur_in.'"';
            $du_out = ' data-anim-out-duration="'.$dur_out.'"'; 
        }
        if ( $anim_in == "overlay-slide-in-top" || $anim_in == "overlay-slide-in-bottom" || $anim_in == "overlay-slide-in-left" || $anim_in == "overlay-slide-in-top" ) {
            $anim_cov = 'data-animsition-overlay="true"';
        }
        $hd_style = ($meta_header == '' ? theme_option("header_layout") : $meta_header);
        ?>
        <div id="mainOctaWrapper" class="pageWrapper<?php echo esc_attr($wrapper); ?><?php echo esc_attr($headclass) ?><?php echo esc_attr($class); ?>" <?php echo esc_attr($an_in).esc_attr($an_out).esc_attr($du_in).esc_attr($du_out).esc_attr($anim_cov); ?>>
        <?php
        if( !is_404() || ( is_404() && $lay404 == '1' ) ){
            if ($meta_header == '' ){
                $hd_style = theme_option("header_layout");
            }else {
                $hd_style = $meta_header;
            }
            
            if (!$hide_header == '1' ){
                get_template_part( 'layout/headers/'.$hd_style);
            }    
        } else if( (is_404() && $lay404 == '2') || (is_404() && $lay404 == '3') ){
            get_template_part( 'layout/headers/404');            
        }        
    }
}

// Soon & Maintenance Headers..
if ( ! function_exists( 'oc_header' ) ){
    function oc_header(){
        $hide_header = get_post_meta( c_page_ID() , 'meta_hide_header' , true);
        $meta_header = get_post_meta( c_page_ID() , 'meta_header_style' , true);
        $lay404 = theme_option('404_layout');
        
        $hd_style = ($meta_header == '' ? theme_option("header_layout") : $meta_header);
        
        if( !is_404() || ( is_404() && $lay404 == '1' ) ){
            if ($meta_header == '' ){
                $hd_style = theme_option("header_layout");
            }else {
                $hd_style = $meta_header;
            }
            
            if (!$hide_header == '1' ){
                get_template_part( 'layout/headers/'.$hd_style);
            }    
        } else if( (is_404() && $lay404 == '2') || (is_404() && $lay404 == '3') ){
            get_template_part( 'layout/headers/404');            
        }        
    }
}

// Theme Footer..
if ( ! function_exists( 'octa_footer' ) ){
    function octa_footer(){
        
        $hide_footer = get_post_meta(c_page_ID(),'meta_hide_footer',true);
        $meta_footer = get_post_meta( c_page_ID() , 'meta_footer_style' , true);
        $ft_style = '';
        
        if ($meta_footer == '' ){
            $ft_style = theme_option("footer_style");
        }else {
            $ft_style = $meta_footer;
        }
        if ($hide_footer != '1' ){
            get_template_part( 'layout/footers/footer-'.$ft_style);
        }
    }
}

// Custom Page Title..
if ( ! function_exists( 'it_custom_page_title' ) ){
    function it_custom_page_title() {
        global $post;
        $page_title = get_the_title();    
        
        if(is_front_page() && !is_home() ){
            $page_title = esc_html('Home Page','octa');
        } else if(is_front_page() && is_home() ){
            $page_title = esc_html('Blog Posts','octa');
        } else if( is_home() ) {
            $page_title = get_the_title(get_option('page_for_posts', true));
        } else if( is_search() ) {
            $page_title = get_search_query();
        }else if( is_404() ) {
            $page_title = esc_html__('Page Not Found', 'octa');
        }else if( is_archive()) {
            if ( is_day() ) {
                $page_title = esc_html__( 'Daily Archives:', 'octa' ) . '<span> ' . get_the_date() . '</span>';
            } else if ( is_month() ) {
                $page_title = esc_html__( 'Monthly Archives:', 'octa' ) . '<span> ' . get_the_date( _x( 'F Y', 'monthly archives date format', 'octa' ) ) . '</span>';
            } elseif ( is_year() ) {
                $page_title = esc_html__( 'Yearly Archives:', 'octa' ) . '<span> ' . get_the_date( _x( 'Y', 'yearly archives date format', 'octa' ) ) . '</span>';
            } elseif ( is_author() ) {
                $curauth = get_user_by( 'id', get_query_var( 'author' ) );
                $auth = '';
                if($curauth->first_name || $curauth->last_name){
                    $auth = $curauth->first_name. ' ' .$curauth->last_name;
                } else{
                    $auth = $curauth->nickname;
                }
                $page_title = $auth;
            } else if( post_type_exists ( 'download' )){
                if(! is_post_type_archive()){
                    $page_title = single_cat_title( '', false );
                } else {
                    $page_title = post_type_archive_title( '', false );
                }
            }else if( class_exists( 'Woocommerce' ) && is_woocommerce() && ( is_product() || is_shop() ) && ! is_search() ) {
                $page_title = woocommerce_page_title( false );
            } else if(class_exists( 'Woocommerce' ) && is_product_category()){
                $page_title = single_cat_title('', false);
            } else {
                $page_title = get_the_title();
            }
        }else if( class_exists( 'Woocommerce' ) && is_woocommerce() && ( is_product() || is_shop() ) && ! is_search() ) {
            if( ! is_product() ) {
                $page_title = woocommerce_page_title( false );
            }
        }else{
            $page_title = get_the_title();
        }

        return $page_title;
    }
}

// Custom Page Title Icon..
if ( ! function_exists( 'it_page_title_icon' ) ){
    function it_page_title_icon(){
        $meta_icon = get_post_meta( c_page_ID() , 'meta_title_icon' , true);
        $theme_page_icon = theme_option('title_icon');
        if($meta_icon != ''){
           echo '<i class="title-icon main-bg '.$meta_icon.'"></i>'; 
        }else if($theme_page_icon != ''){
           echo '<i class="title-icon main-bg '.$theme_page_icon.'"></i>'; 
        }
        
    }
}

// Site Breadcrumbs..
if ( ! function_exists( 'site_breadcrumbs' ) ) {
    function site_breadcrumbs () {
        $hide_breadcrumbs = get_post_meta(c_page_ID(),'meta_hide_breadcrumbs',true);   
        $t_show_crumbs    = theme_option( 'show_breadcrumbs' );
        $br_align         = theme_option( 'breadcrumbs_align' );
        $br_style         = theme_option( 'breadcrumbs_style' );
        $prefix           = theme_option( 'breadcrumbs_prefix' );
        $suffix           = theme_option( 'breadcrumbs_suffix' );
        $separator        = theme_option( 'breadcrumbs_separator' );
        $bread_mobile     = theme_option( 'mobile_breadcrumbs' );
        
        if($br_align == 't-center'){
            $br_align .= ' pull-none';    
        } else if($br_align == 't-left') {
            $br_align .= ' pull-left';
        }
        
        if ( $bread_mobile == '' ){
            $mob = ' hidden-xs';    
        } else {
            $mob = '';
        }
        
        if( $t_show_crumbs != '' ){
            if ( $hide_breadcrumbs != '1' ) {
                $yoast_links_options = get_option( 'wpseo_internallinks' );
                $yoast_bc_enabled=$yoast_links_options['breadcrumbs-enable'];
                if ( function_exists('yoast_breadcrumb') && $yoast_bc_enabled) {
                    yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumb'.$mob.' '.$br_align.' '.$br_style.'"><div class="container">','</div></div>');
                }else if(function_exists('bcn_display')) {
                    if( $br_style == 'style2' ) echo '<div class="container">';
                    echo '<div class="breadcrumb'.$mob.' '.$br_align.' '.$br_style.'">';
                    if( $br_style == '' ) echo '<div class="container">';
                    if($prefix) echo '<span property="itemListElement" typeof="ListItem">'.$prefix.'</span> '; 
                    echo bcn_display();
                    if($suffix) echo '<span property="itemListElement" typeof="ListItem">'.$suffix.'</span> ';
                    if( $br_style == '' ) echo '</div>';
                        echo '</div>';
                    if( $br_style == 'style2' ) echo '</div>';
                    
                }    
            }    
        }    
    }
}

// Sliding bar function..
if ( ! function_exists('it_sliding_bar') ){
    function it_sliding_bar() {
        $show_sliding_bar     = theme_option('show_sliding_bar');
        $sbar_position        = theme_option('sbar_position');
        $sbar_content_push    = theme_option('sliding_bar_content_push');
        $sbar_top_border      = theme_option('top_border_on_sliding_bar');
        $sbar_btn_icon        = theme_option('sbar_btn_icon');
        $sbar_btn_tgl_icon    = theme_option('sbar_btn_tgl_icon');
        $sbar_btn_shape       = theme_option('sbar_btn_shape');        
        $sbar_btn_pos         = theme_option('btn_position'); 
        $sb                   = theme_option('sliding_bar_sidebar'); 
        $slid_cols            = theme_option('number_of_sliding_bar_columns');
        $cols                 = $slid_cols;
        $class                = 'slbar';
        
        if($sbar_top_border == '1'){
            $class .= ' sl_tp_border';
        }
        
        if($sbar_content_push == '1'){
            $class .= ' cont_push';
        }
        
        $class .= ' '.$sbar_position;
        
        if ( $show_sliding_bar == "1" ) { 
        ?>
        <div class="<?php echo esc_attr($class); ?>" data-columns="<?php echo esc_attr($cols); ?>">
            <div class="sl_bar_content">
                <?php dynamic_sidebar( $sb ); ?>
            </div>
            <?php if ( $sbar_btn_pos == 'in_header' &&  $sbar_content_push != '1' && $sbar_position == 'top' ){ ?>
                <a href="#" class="hid-btn-head <?php echo esc_attr($sbar_btn_shape).' '.esc_attr($sbar_btn_pos); ?>"><span class="<?php echo esc_attr($sbar_btn_tgl_icon);?>"></span></a>
            <?php } else if( $sbar_btn_pos != 'in_header' ){ ?>
                <a href="#" class="slbar_btn <?php echo esc_attr($sbar_btn_shape).' '.esc_attr($sbar_btn_pos); ?>"><span data-icon="<?php echo esc_attr($sbar_btn_icon);?>" data-tgl-icon="<?php echo esc_attr($sbar_btn_tgl_icon);?>"></span></a>
            <?php } ?>
        </div> 
        <?php
        } 
    }
}

// 404 menu..
if ( ! function_exists('the404menu') ){
    function the404menu (){
        $it_custom_menu = new it_custom_menu();
        $men = theme_option('404_menu');
        if($men){
            echo $it_custom_menu->it_nav_menu( array( 'theme_location' => $men) );    
        }
        
    }
}

// Get site menus..
if ( ! function_exists('it_select_menu') ){
    function it_select_menu(){
        $options = get_post_custom(get_the_ID());
        if(isset($options['select_menu'])){
            $menu = $options['select_menu'][0];
        }else{
            $menu = 'main-menu';
        }
        
        if ( has_nav_menu( $menu ) ) {
            $it_custom_menu = new it_custom_menu();
            $it_custom_menu->it_nav_menu( array( 'theme_location' => $menu) ); 
        }else{
            echo '<span class="menu-message">'.esc_html__('Please go to admin panel > Menus > select the menu and add items to it.', 'octa').'</span>';
        }
    }
}

// Add theme options in wp footer hook..
if ( ! function_exists( 'it_wp_footer' ) ){
    function it_wp_footer(){
        
        // Custom Javascript code from theme options.
        $custom_js = theme_option( 'custom_js' );
        if( $custom_js ) {
          ?>
<script type="text/javascript">
(function ($){
    <?php echo $custom_js; ?>    
})(jQuery);          
</script>
          <?php
        }
    }
} 
add_action( 'wp_footer', 'it_wp_footer');

// Maintenace Mode..
if ( ! function_exists( 'maintenace_mode' ) ) {
    function maintenace_mode() {
        if(theme_option('enable_maintenace_mode') == '1'){
            if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() || !(current_user_can( 'administrator' ) ||  current_user_can( 'super admin' )) ) {
              get_template_part('layout/others/maintenance');
              exit(0);
          }
        }
    }    
}
add_action('get_header', 'maintenace_mode');

// Coming Soon Mode..
if ( ! function_exists( 'soon_mode' ) ) {
    function soon_mode() {
        if(theme_option('enable_coming_soon') == '1'){
            if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() || !(current_user_can( 'administrator' ) ||  current_user_can( 'super admin' )) ) {
              get_template_part('layout/others/soon');
              exit(0);
          }
        }
    }    
}
add_action('get_header', 'soon_mode');


// Theme page title style..
if ( ! function_exists( 'it_title_style' ) ){
    function it_title_style(){
        $lay404 = theme_option('404_layout');
        if( !is_404() || ( is_404() && $lay404 == '1' ) ){
            if( is_search() ) {
                get_template_part( 'layout/page-titles/title-search');
            } else {
                get_template_part( 'layout/page-titles/title-normal');
            }
        }
    }
}

// page title meta..
if ( ! function_exists( 'it_page_title_meta' ) ){
    function it_page_title_meta(){
        
        $cust_title = get_post_meta(c_page_ID(),'chck_custom_title',true);
        if($cust_title == '1'){
           $titl_text = get_post_meta(c_page_ID(),'custom_title_txt',true);
           $subtitl_text = get_post_meta(c_page_ID(),'custom_subtitle',true); 
        }
    }
}

// Header banner..
if ( ! function_exists( 'header_banner' ) ){
    function header_banner(){
        $banner_img = get_post_meta(c_page_ID(),'meta_header_banner',true);
        $banner_link = get_post_meta(c_page_ID(),'meta_header_banner_link',true);
        $theme_banner_img = theme_option('header_banner');
        $theme_banner_link = theme_option('header_banner_link');
        
        if($banner_img != '') {
            if($banner_link !='') {
                echo '<a href="'.esc_url($banner_link).'"><img alt="" src="'.esc_url($banner_img).'" /></a>';
            }else{
                echo '<img alt="" src="'.esc_url($banner_img).'" />';
            }
        }else if ($theme_banner_img !=''){
            if($theme_banner_link !='') {
                echo '<a href="'.esc_url($theme_banner_link).'"><img alt="" src="'.esc_url($theme_banner_img).'" /></a>';
            }else{
                echo '<img alt="" src="'.esc_url($theme_banner_img).'" />';
            } 
        }
        
    }
}

// Limit number of tags inside widget..
if ( ! function_exists( 'tag_widget_limit' ) ){
    function tag_widget_limit($args){
        $tagsNo = theme_option('tags_limit');
         if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
          $args['number'] = esc_attr($tagsNo);
         }

         return $args;
    }
}
add_filter('widget_tag_cloud_args', 'tag_widget_limit');

// get ID by slug..
if(! function_exists('get_ID_by_slug')) {
    function get_ID_by_slug($page_slug) {
        $page = get_page_by_path($page_slug);
        if ($page) {
            return $page->ID;
        } else {
            return null;
        }
    }
}

// buddypress activity for public..
function it_enable_bbp_activity( $public, $site_id ) {
    return true;
} 
add_filter( 'bbp_is_site_public', 'it_enable_bbp_activity', 10, 2);

// Allowed tags..
if ( ! function_exists( 'it_allowed_tags' ) ){
    function it_allowed_tags(){
        global $allowedtags;
        $attrs = array('class'=>array(),'style'=>array(),'id'=>array(),'src'=>array(),'alt'=>array(),'title'=>array(),'href'=>array());
        
        $allowedtags['span'] = $attrs;
        $allowedtags['div'] = $attrs;
        $allowedtags['p'] = $attrs;
        $allowedtags['img'] = $attrs;
        $allowedtags['b'] = $attrs;
        $allowedtags['i'] = $attrs;
        $allowedtags['strong'] = $attrs;
        $allowedtags['a'] = $attrs;
        
        return $allowedtags;
    }
}

// Social icons..
if ( ! function_exists( 'display_social_icons' ) ) {
    function display_social_icons(){
        $langcode = $rel  = $target = '';
        $col = ' ';
        if ( class_exists( 'SitePress' ) ) {
            $langcode = '-'.ICL_LANGUAGE_CODE;
        }
        $socio_list ='<div class="social-list">';
        $soc = theme_option('social_icons');
        $nofollow = theme_option('socials_nofollow');
        $newwindow = theme_option('socials_new_window');
        $colored = theme_option('socials_colored');
        if($nofollow){
            $rel = ' rel="nofollow"';    
        }
        if($newwindow){
            $target = ' target="_blank"';    
        }
        for ( $i = 1; $i <= $soc ; $i++ ) {
            $icod = theme_option("social_icon_".$i);
            $ico = str_replace ("fa fa-","", $icod);
            if($colored){
                $col = ' ic-'.$ico;    
            }
            if(theme_option("social_icon_".$i)){ 
                $socio_list .='<a href="'.esc_attr(theme_option("social_icon_link_".$i)).'"'.$rel.$target.' data-toggle="tooltip" data-placement="bottom" title="'.esc_attr(theme_option("social_icon_title_".$i)).'"><i class="ic-colored md-icon'.$col .' '.esc_html(theme_option("social_icon_".$i)).'"></i></a>';
            }
        }
        $socio_list .='</div>';    
        return $socio_list;    
    }    
}

// Footer social icons..
if ( ! function_exists( 'footer_social_icons' ) ) {
    function footer_social_icons(){
        $langcode = $rel  = $target = '';
        $col = ' ';
        if ( class_exists( 'SitePress' ) ) {
            $langcode = '-'.ICL_LANGUAGE_CODE;
        }
        $socio_list ='<div class="social-list">';
        $soc = theme_option('social_icons');
        $nofollow = theme_option('socials_nofollow');
        $newwindow = theme_option('socials_new_window');
        $colored = theme_option('socials_colored');
        if($nofollow){
            $rel = ' rel="nofollow"';    
        }
        if($newwindow){
            $target = ' target="_blank"';    
        }
        for ( $i = 1; $i <= $soc ; $i++ ) {
            $icod = theme_option("social_icon_".$i);
            $ico = str_replace ("fa fa-","", $icod);
            if($colored){
                $col = ' ic-'.$ico;    
            }
            if(theme_option("social_icon_".$i)){ 
                $socio_list .='<a href="'.esc_attr(theme_option("social_icon_link_".$i)).'"'.$rel.$target.' data-toggle="tooltip" data-placement="bottom" title="'.esc_attr(theme_option("social_icon_title_".$i)).'"><i class="ic-colored filled md-icon'.$col .' '.esc_html(theme_option("social_icon_".$i)).'"></i></a>';
            }
        }
        $socio_list .='</div>';    
        return $socio_list;    
    }    
}

if ( ! function_exists( 'comma_array' ) ) {
    function comma_array($string, $separator = ','){
        $vals = explode($separator, $string);

        foreach($vals as $key => $val) {
            $vals[$key] = trim($val);
        }

        return array_diff($vals, array(""));
    }
}

// Fix tags issue in custom post types..
function it_fix_tags( $query ) {
    if( is_tag() && $query->is_main_query() ) {

        $post_types = get_post_types();

        $query->set( 'post_type', $post_types );
    }
}
add_filter( 'pre_get_posts', 'it_fix_tags' );

function allow_data_event_content() {
    global $allowedposttags, $allowedtags;
    $newattribute = "style"; 
    $allowedposttags["span"][$newattribute] = true;
    $allowedtags["span"][$newattribute] = true;
    $allowedposttags["ul"][$newattribute] = true;
    $allowedtags["ul"][$newattribute] = true;
    $allowedposttags["li"][$newattribute] = true;
    $allowedtags["li"][$newattribute] = true;
}
add_action( 'init', 'allow_data_event_content' );

// Enable custom fonts extensions uploads..
function enable_extended_upload ( $mime_types =array() ) {
 
   $mime_types['ttf']   = 'application/font-sfnt';
   $mime_types['eot']   = 'application/vnd.ms-fontobject';
   $mime_types['svg']   = 'image/svg+xml';
   $mime_types['svgz']  = 'image/svg+xml';
   $mime_types['woff']  = 'application/font-woff';
 
   return $mime_types;
}
add_filter('upload_mimes', 'enable_extended_upload');

//To keep the count accurate, lets get rid of prefetching..
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// post views for popular posts..
function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

// Google fonts..
if ( ! function_exists( 'them_googleFonts' ) ) {
    function them_googleFonts(){
        
        $goglfonts = array();
        $url = FRAMEWORK_URI .'/assets/fonts/fonts.json';
        $response = wp_remote_get( $url );
        $body = wp_remote_retrieve_body($response);
        $fonts    =  json_decode( $body);
        
        foreach ( $fonts->items as $key => $font ) {
          $goglfonts[$font->family] = $font->family;
        } 
        
        $cust_fonts = array();
        $cust_f = theme_option('custom_fonts');
        for ( $i = 1; $i <= $cust_f ; $i++ ) {
            $cust_fonts[theme_option('custom_font_name_'.$i)] = theme_option('custom_font_name_'.$i);            
        }
        $goglfonts = $goglfonts + $cust_fonts;
        
        return $goglfonts;
        
    }    
}

// Remove empty paragraph tags from the_content..
function removeEmptyParagraphs($content) {
    $content = str_replace("<p></p>","",$content);
    return $content;
}
add_filter('the_content', 'removeEmptyParagraphs',99999);

// Color creator functions..
if ( ! function_exists( 'colourCreator' ) ) {
    function colourCreator($colour, $per) {  
        $colour = substr( $colour, 1 ); // Removes first character of hex string (#) 
        $rgb = ''; // Empty variable 
        $per = $per/100*255; // Creates a percentage to work with. Change the middle figure to control colour temperature
         
        if  ($per < 0 ) // Check to see if the percentage is a negative number 
        { 
            // DARKER 
            $per =  abs($per); // Turns Neg Number to Pos Number 
            for ($x=0;$x<3;$x++) 
            { 
                $c = hexdec(substr($colour,(2*$x),2)) - $per; 
                $c = ($c < 0) ? 0 : dechex($c); 
                $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
            }   
        }  
        else 
        { 
            // LIGHTER         
            for ($x=0;$x<3;$x++) 
            {             
                $c = hexdec(substr($colour,(2*$x),2)) + $per; 
                $c = ($c > 255) ? 'ff' : dechex($c); 
                $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
            }    
        } 
        return '#'.$rgb; 
    }    
}

if ( ! function_exists( 'hex2RGB' ) ) {
    function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
        $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
        $rgbArray = array();
        if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
            $colorVal = hexdec($hexStr);
            $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
            $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
            $rgbArray['blue'] = 0xFF & $colorVal;
        } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
            $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
            $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
            $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
        } else {
            return false; //Invalid hex color code
        }
        return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
    }
}

if ( ! function_exists( 'colourBrightness' ) ){
    function colourBrightness($hex, $percent) {
    $hash = '';
    if (stristr($hex,'#')) {
        $hex = str_replace('#','',$hex);
        $hash = '#';
    }
    $rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
    for ($i=0; $i<3; $i++) {
        if ($percent > 0) {
            // Lighter
            $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
        } else {
            // Darker
            $positivePercent = $percent - ($percent*2);
            $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
        }
        if ($rgb[$i] > 255) {
            $rgb[$i] = 255;
        }
    }
    $hex = '';
    for($i=0; $i < 3; $i++) {
        $hexDigit = dechex($rgb[$i]);
        if(strlen($hexDigit) == 1) {
        $hexDigit = "0" . $hexDigit;
        }
        $hex .= $hexDigit;
    }
    return $hash.$hex;
}    
}

// OCTA  Single Cats..
if ( ! function_exists( 'it_boo_cats' ) ){
   function it_boo_cats() {
        global $post;
        $cats = array();
        $terms = get_the_terms($post->id, 'oc-categories');
        if ( theme_option('singleprojectcategory_on') == "1" && $terms != '' ) { ?>
        <li>
            <i class="fa fa-tag"></i> <span class="bold main-color"><?php echo esc_html__('Category: ', 'octa') ?></span>
            <?php
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                foreach ($terms as $term) {
                    $term_link = get_term_link( $term );
                    $cats[] = '<a href="' . $term_link . '">' . $term->name . '</a>';
                }
                echo implode(' , ', $cats);
            }
            ?>
        </li>
        <?php }
   }  
}

// OCTA Portfolio Single Tags..
if ( ! function_exists( 'it_boo_tags' ) ){
   function it_boo_tags() {
        global $post;
        $tagsArray = array();
        $posttags = get_the_terms( $post->id , 'oc-tags' );
        if ( theme_option('singleprojecttags_on') == "1" && $posttags != '' ) { ?>
        <li class="tags-list">
            <i class="fa fa-tags"></i><span class="bold main-color"><?php echo esc_html__('Tags:', 'octa') ?></span>
            <?php
             if( ! empty( $posttags ) &&  ! is_wp_error( $posttags ) ) {
                 foreach ($posttags as $tax_term) {
                     $term_link = get_term_link( $tax_term );
                     $tagsArray[] = '<a href="' . $term_link . '">' . $tax_term->name . '</a>';
                 } 
                 echo implode( ' , ', $tagsArray );   
             }
            ?>
        </li>
        <?php }
   }  
}  

if (!function_exists( 'it_oc_category' )) {
    function it_oc_category() {
        global $post;
        $cats = array();
        $terms = get_the_terms($post->id, 'oc-categories');
        if (is_array($terms)) {
            foreach ($terms as $term) {
                $id = $term->term_id;
                $cats [] = '<a href="' . site_url() . '/' . $term->taxonomy . '/' . $term->slug . '">' . $term->name . '</a>';
            }
            return implode('  ,  ', $cats);
        }
    }

}