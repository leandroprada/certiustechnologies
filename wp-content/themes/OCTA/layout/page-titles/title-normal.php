<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
$m_pos = get_post_meta(c_page_ID(),'meta_title_position',true);
$m_color = get_post_meta(c_page_ID(),'meta_title_col',true);
$title_bg_img = esc_url(get_post_meta(c_page_ID(),'meta_title_bg_img',true));
$m_overlay = get_post_meta(c_page_ID(),'meta_title_bg_overlay',true);
$header_video_cover = get_post_meta(c_page_ID(),'meta_header_video_cover',true);
$chck_video_bg = get_post_meta(c_page_ID(),'meta_chck_video_bg',true);
$video_mp4 = get_post_meta(c_page_ID(),'meta_video_mp4',true);
$video_webm = get_post_meta(c_page_ID(),'meta_video_webm',true);
$video_ogv = get_post_meta(c_page_ID(),'meta_video_ogv',true);
$cust_title_txt = get_post_meta(c_page_ID(),'meta_custom_title_txt',true);
$stitle = get_post_meta(c_page_ID(),'meta_custom_subtitle',true); 
$m_icon = get_post_meta( c_page_ID() , 'meta_title_icon' , true);
$hide_title = get_post_meta( c_page_ID() , 'meta_hide_page_title' , true);
$t_hide_title = theme_option('hide_page_title');
$t_icon = theme_option('title_icon');
$t_pos = theme_option('title-position');
$t_color = theme_option('title-color');
$t_overlay = theme_option('page_head_overlay');
$m_txt_color = get_post_meta( c_page_ID() , 'meta_title_text_bg_color' , true);  
$br_style = theme_option( 'breadcrumbs_style' );
$it_page_title = $subtitl_text = $attr_para = $col = '';
$class='page-title';

if($title_bg_img != '' && get_post_meta(c_page_ID(),'meta_title_parallax',true) == '1'){
    $parallax_bg = get_post_meta(c_page_ID(),'meta_title_parallax',true);
}else if($title_bg_img == '' && theme_option('page_title_parallax') == '1'){
    $parallax_bg = theme_option('page_title_parallax');
} else {
    $parallax_bg = '';
}

if ($cust_title_txt != ''){
   $it_page_title = esc_html($cust_title_txt); 
}else{
    $it_page_title = it_custom_page_title();
}
if( $m_pos != '' ) {
    if($m_pos == 'center'){
        $class .= ' text-center';
    }else if($m_pos == 'right'){
        $class .= ' text-right';
    } else if($m_pos == 'left'){
        $class .= ' text-left';
    }   
} else{
    if($t_pos == 'center'){
        $class .= ' text-center';
    }else if($t_pos == 'right'){
        $class .= ' text-right';
    }
}

if( $m_color != '' ){
    if($m_color == 'dark'){
        $class .= ' dark-bg';
        $col = ' class="white"';
    }else if($m_color == 'colored'){
        $class .= ' main-bg';
        $col = ' class="white"';
    }    
} else {
    if($t_color == 'dark'){
        $class .= ' darker-bg';
        $col = ' class="white"';
    }else if($t_color == 'colored'){
        $class .= ' main-bg';
        $col = ' class="white"';
    }
}
if($stitle){
    $subtitl_text = '<h3'.esc_attr($col).'>'.esc_html($stitle).'</h3>';    
}

if( $chck_video_bg == '1' ){
    $class .= ' page-title-video';
}
if( $parallax_bg == '1' ){
    $class .= ' parallax';
    $attr_para = ' data-stellar-background-ratio="0.4"';
}
if( $hide_title != '1' && $t_hide_title != '1' ){            
?>
<div class="<?php echo esc_attr($class) ?>"<?php echo esc_attr($attr_para); ?>>
    
    <?php if($chck_video_bg == '1'){ ?>
        <div class="video-wrap">
            <video poster="<?php echo esc_url($header_video_cover); ?>" preload="auto" loop autoplay muted>
                <source src='<?php echo esc_url($video_mp4); ?>' type='video/mp4' />
                <source src='<?php echo esc_url($video_webm); ?>' type='video/webm' />
                <source src='<?php echo esc_url($video_ogv); ?>' type='video/ogv' />
            </video>
        </div>
    <?php } ?>
    
    <div class="container">
        <div class="title-container">
            <div class="in-page-title">
                <?php if ( $m_txt_color != '' || theme_option('page_title_textcolor') != '' ){ ?><div class="tbl titl_txt_bg"> <?php } ?> 
                    <?php it_page_title_icon(); ?>
                    <div class="title-headings">
                        <h1<?php echo esc_attr($col); ?>><?php echo esc_html($it_page_title); ?></h1>
                        <?php echo esc_attr($subtitl_text); ?>
                    </div>
                    
                <?php if ( $m_txt_color != '' || theme_option('page_title_textcolor') != '' ){ ?></div> <?php } ?>
                
                <?php if( $br_style == 'style3' || $br_style == 'minimal' ){ site_breadcrumbs(); } ?>
                
            </div>
        </div>
    </div>
    
    <?php if ( !is_home() && ($m_overlay != '' || $t_overlay != '') ) { ?>
        <div class="video-overlay"></div>
    <?php } ?>
</div>

<?php
if( $br_style == '' || $br_style == 'style2' ){
    site_breadcrumbs();
} 

}