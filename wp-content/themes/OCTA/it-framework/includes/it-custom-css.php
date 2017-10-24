<?php
/**
 *
 * Style Parser
 *
 * @version 1.0.0
 *
 */
 
function it_custom_css() {
    
    ob_start ();
    
    $CSS                = '';
    $darkestPercent     = -10;
    $title_bg_col       = esc_html(get_post_meta(c_page_ID(),'meta_title_bg_color',true));
    $title_bg_img       = esc_url(get_post_meta(c_page_ID(),'meta_title_bg_img',true));
    $title_bg_size      = esc_html(get_post_meta(c_page_ID(),'meta_title_bg_size',true));
    $title_bg_repeat    = esc_html(get_post_meta(c_page_ID(),'meta_title_bg_repeat',true));
    $title_overlay      = esc_html(get_post_meta(c_page_ID(),'meta_title_bg_overlay',true));
    $title_over_opacity = esc_html(get_post_meta(c_page_ID(),'meta_title_bg_overlay_opacity',true));
    $subtitle_col       = esc_html(get_post_meta(c_page_ID(),'meta_subtitle_color',true));
    $title_col          = esc_html(get_post_meta(c_page_ID(),'meta_title_color',true));
    $title_height       = esc_html(get_post_meta(c_page_ID(),'meta_title_height',true));
    $m_txt_color        = esc_html(get_post_meta( c_page_ID() , 'meta_title_text_bg_color' , true));
    $h_bg_color         = esc_html(get_post_meta( c_page_ID() , 'meta_header_bg_color' , true));
    $m_t_fontsize       = esc_html(get_post_meta( c_page_ID() , 'meta_title_fontsize' , true));
    $m_st_fontsize      = esc_html(get_post_meta( c_page_ID() , 'meta_sub_title_fontsize' , true));
    $sub_menu           = esc_html(get_post_meta( c_page_ID() , 'meta_sub_menu_color' , true));
    $m_sub_color        = esc_html(get_post_meta( c_page_ID() , 'meta_cust_sub_color' , true));
    $m_sub_bg           = esc_html(get_post_meta( c_page_ID() , 'meta_cust_sub_bg_color' , true));
    $thm_submenu        = esc_html(theme_option('sub_menu_color'));
    $thm_sub_bg_color   = esc_html(theme_option('sub_menu_bg_color'));
    $thm_sub_color      = esc_html(theme_option('sub_menu_font_color'));
    $thm_sub_bg         = esc_html(theme_option('sub_menu_bg_color'));
    $m_h_pos            = esc_html(get_post_meta( c_page_ID() , 'meta_header_position' , true));
    $m_nav_bord_c       = esc_html(get_post_meta( c_page_ID() , 'meta_nav_border_color' , true));
    $m_nav_bord_w       = esc_html(get_post_meta( c_page_ID() , 'meta_nav_border_width' , true));
    $t_nav_bord_c       = esc_html(theme_option('nav_border_color'));
    $t_nav_bord_w       = esc_html(theme_option('nav_border_width'));
    $t_height           = esc_html(theme_option('page_head_height'));
    $tm_overlay         = esc_html(theme_option('page_head_overlay'));
    $custom_fonts       = esc_html(theme_option( 'custom_fonts' ));
    $sbarWidth          = esc_html(theme_option( 'sidebar_width' ));
    $contPadd           = esc_html(theme_option( 'content_padding' ));
    $m_headPadd         = esc_html(get_post_meta( c_page_ID() , 'meta_header_padding' , true));
    $t_headPadd         = esc_html(theme_option( 'header_padding' ));
    $stick_tab          = esc_html(theme_option('sticky_tablets'));
    $stick_mob          = esc_html(theme_option('sticky_mobiles'));
    $hexStr             = esc_html(theme_option( "skin_color" ));
    $top_color          = esc_html(theme_option("topbar_color"));
    $meta_bar_color     = esc_html(get_post_meta(c_page_ID(),'meta_topbar_color',true));
    $meta_col           = esc_html(get_post_meta(c_page_ID(),'meta_bar_color',true));
    $meta_fcol          = esc_html(get_post_meta(c_page_ID(),'meta_bar_fcolor',true));
    $meta_icol          = esc_html(get_post_meta(c_page_ID(),'meta_bar_icolor',true));
    $thm_col            = esc_html(theme_option('barbgcolor'));
    $thm_bg             = esc_url(theme_option('bar_image'));
    $thm_rp             = esc_html(theme_option('bar_img_repeat'));
    $thm_cov            = esc_html(theme_option('bar_img_full_width'));
    $thm_fcol           = esc_html(theme_option('barcolor'));
    $thm_icol           = esc_html(theme_option('bariconcolor'));
    $slPadd             = esc_html(theme_option( 'sliding_padding' ));
    $thm_dark_sub       = colourCreator($thm_sub_bg, $darkestPercent);
    $m_dark_sub         = colourCreator($m_sub_bg, $darkestPercent);
    $rgbacolor          = hex2RGB($hexStr, true, ',');
    $paddTop            = explode('|', $contPadd);
    $paddBottom         = substr($contPadd, strpos($contPadd, "|") + 1);
    $slpaddTop          = explode('|', $slPadd);
    $slpaddBottom       = substr($slPadd, strpos($slPadd, "|") + 1); 
    $darkthm            = colourCreator($hexStr, $darkestPercent);
    $cWidth             = 100-$sbarWidth;
    
    if($m_h_pos != ''){
        $pad        = esc_html(get_post_meta( c_page_ID() , 'meta_header_padding' , true));
        $t_top_pos  = esc_html(get_post_meta( c_page_ID() , 'meta_header_top_pos' , true));
        $t_bot_pos  = esc_html(get_post_meta( c_page_ID() , 'meta_header_bottom_pos' , true));
    }else {
        $pad        = esc_html(theme_option('header_padding'));
        $t_top_pos  = esc_html(theme_option('top-pos'));
        $t_bot_pos  = esc_html(theme_option('bottom-pos'));    
    }
    
    for ( $i = 1; $i <= $custom_fonts ; $i++ ) {
        $fname  = theme_option('custom_font_name_'.$i);
        $feot   = theme_option('custom_font_eot_'.$i);
        $fwoff  = theme_option('custom_font_woff_'.$i);
        $fttf   = theme_option('custom_font_ttf_'.$i);
        $fsvg   = theme_option('custom_font_svg_'.$i);
        $fcss   = theme_option('custom_font_css_'.$i);
        
        $CSS .= "
        @font-face {
            font-family: '{$fname}';
            src: url('{$feot}');
            src: url('{$feot}?#iefix') format('embedded-opentype'),
                 url('{$fwoff}') format('woff'),
                 url('{$fttf}') format('truetype'),
                 url('{$fsvg}#rieslingregular') format('svg');
            font-weight: normal;
            font-style: normal;
        }";
        $CSS .= $fcss;
    }
    
    $CSS .= "
    body{";
        $CSS .= ( theme_option('body_font') ) ? "font-family: ".theme_option('body_font').", sans-serif;" : "";
        $CSS .= ( theme_option('body_font_size') ) ? "font-size: ".theme_option('body_font_size').";" : "";
        $CSS .= ( theme_option('body_font_weight') ) ? "font-weight: ".theme_option('body_font_weight').";" : "";
        $CSS .= ( theme_option('body_line_height') ) ? "line-height: ".theme_option('body_line_height').";" : "";
        $CSS .= ( theme_option('bodybgcolor') ) ? "background-color: ".theme_option('bodybgcolor').";" : "";
        $CSS .= ( theme_option('bodyfontcolor') ) ? "color: ".theme_option('bodyfontcolor').";" : "";
        
        if ( theme_option('bodybgimage') ) {
            $CSS .= "background-image: url('".theme_option('bodybgimage')."');";
            if ( theme_option('body_bg_img_repeat') ) {
                $CSS .= "background-repeat: ".theme_option('body_bg_img_repeat').";";
            }
            $CSS .= "background-size:".theme_option('body_bg_size').";";
            if ( theme_option('body_bg_position') ) {
                $CSS .= "background-position: ".theme_option('body_bg_position').";";
            }
            if ( theme_option('body_bg_img_parallax') == '1' ) {
                $CSS .= "background-attachment:fixed;";
            }
        } elseif ( theme_option('usepatterns') == '1' ) {
            if ( theme_option('patterns-imgs') ) {
                $CSS .= "background-image: url('".theme_option('patterns-imgs')."');";
            } 
        }
    $CSS .= "}"; 
    
    if ( theme_option('bodylinkscolor') ) {
        $CSS .= "
        a{
            color: ".theme_option('bodylinkscolor').";
        }";
    }
    
    if ( theme_option( 'main_width' ) != '1170' && theme_option( 'main_width' ) != '' ) {
        $CSS .= "
        .container,.pageWrapper.boxed,.pageWrapper.boxed .top-head.affix,.pageWrapper.boxed .top-head.fixed-head{
            width: ".theme_option( 'main_width' )."px;
        }";
    }

    $CSS .= "
    .main-content,.site_content{
        padding-top: {$paddTop[0]}px;
        padding-bottom: {$paddBottom}px;
    }";

    if ( $sbarWidth != '25' && $sbarWidth != '' ) {
        $CSS .= "
        .sidebar{
            width: {$sbarWidth}%;
        }
        .main-content{
            width: {$cWidth}%;
        }";
    }

    $CSS .= "
    .navbar-nav > li > a{";
        $CSS .= ( theme_option('menu_font') ) ? "font-family: ".theme_option('menu_font').", sans-serif;" : "";
        $CSS .= ( theme_option('menu_font_size') ) ? "font-size: ".theme_option('menu_font_size').";" : "";
        $CSS .= ( theme_option('menu_font_weight') ) ? "font-weight: ".theme_option('menu_font_weight').";" : "";
        $CSS .= ( theme_option('menu_text_style') ) ? "text-transform: ".theme_option('menu_text_style').";" : "";
    
    $CSS .= "}

    h1,h2,h3,h4,h5,h6{";        
        $CSS .= ( theme_option('headings_font') ) ? "font-family: ".theme_option('headings_font').", sans-serif;" : "";
        $CSS .= ( theme_option('headings_font_weight') ) ? "font-weight: ".theme_option('headings_font_weight').";" : "";
        $CSS .= (theme_option('headings_text_style') !== '') ? "text-transform: ".theme_option('headings_text_style').";" : "";
    $CSS .= "}";
    
    if($meta_bar_color == 'custom' && $meta_col != ''){
        $topDark = colourBrightness( $meta_col ,-0.92);
        $CSS .= "
        .top-bar{
            background-color: ".$meta_col.";
        }
        .top-bar a:hover{
            background-color: ".$topDark.";
        }
        .top-bar,.top-bar a, .top-bar span{
            color: ".$meta_fcol.";
        }
        .top-bar i{
            color: ".$meta_icol.";
        }";
    }else if ( $meta_bar_color == '' && $top_color == 'custom' && $thm_col != '' ){
        $topDark = colourBrightness( $top_color ,-0.92);
        $CSS .= "
        .top-bar{
            background-color: ".$thm_col.";
            background-image: url('".$thm_bg."');
            background-repeat: ".$thm_rp.";";
            if ($thm_bg != '') { 
                $CSS .= "background-size: ".theme_option('bar_bg_size').";"; 
            }
        $CSS .= "
        }
        .top-bar a:hover{
            background-color: ".$topDark.";
        }
        .top-bar,.top-bar a, .top-bar span{
            color: ".$thm_fcol.";
        }
        .top-bar i{
            color: ".$thm_icol.";
        }";
    }

    $CSS .= "
        .logo a i.logo-txt{";
        if(theme_option('logo_font_color')){
            $CSS .= "color: ".theme_option('logo_font_color').";";
        }
        $CSS .= "
        font-size: ".theme_option('logo_font_size').";
        font-family: '".theme_option('logo_font')."', sans-serif;
        font-weight: ".theme_option('logo_font_weight').";
    }

    .logo a span{
        font-family: '".theme_option('slogan_font')."', sans-serif;
        color: ".theme_option('slogan_font_color').";
        font-size: ".theme_option('slogan_font_size').";
        font-weight: ".theme_option('slogan_font_weight').";
    }";
    
    // fixed head top distance..
    if($t_top_pos != ''){
        $CSS .= "
        .top-head.fixed-head.top:not(.affix){
            top: {$t_top_pos}px
        }";    
    }
    
    // fixed head bottom distance..
    if($t_bot_pos != ''){
        $CSS .= "
        .top-head.fixed-head.bottom:not(.affix){
            bottom: {$t_bot_pos}px
        }";
    }

    // modern head border..
    if ( $m_nav_bord_c != '' && $m_nav_bord_w != '' ) {
        $CSS .= "
        .top-head.modern:not(.affix) .mod-container{
            border: {$m_nav_bord_w}px {$m_nav_bord_c} solid    
        }";
    } else if ( $t_nav_bord_c != '' && $t_nav_bord_w != '' ) {
        $CSS .= "
        .top-head.modern:not(.affix) .mod-container{
            border: {$t_nav_bord_w}px {$t_nav_bord_c} solid    
        }";
    }
    
    // header padding..
    if ( $m_headPadd != '0|0' && $m_headPadd != '|' ) {
        $paddT         = explode('|', $m_headPadd);
        $paddB         = substr($m_headPadd, strpos($m_headPadd, "|") + 1);
        $CSS .= "
        .top-head:not(.affix) .head-cont .main-nav > ul > li,.side-head,.top-head.classic:not(.affix) .top-head-links{
            padding-top: {$paddT[0]}px;
            padding-bottom: {$paddB}px;
        }";
    } else if ( $t_headPadd != '0|0' && $t_headPadd != '|' ) {
        $paddT         = explode('|', $t_headPadd);
        $paddB         = substr($t_headPadd, strpos($t_headPadd, "|") + 1);
        $CSS .= "
        .top-head:not(.affix) .head-cont .main-nav > ul > li,.side-head,.top-head.classic:not(.affix) .top-head-links{
            padding-top: {$paddT[0]}px;
            padding-bottom: {$paddB}px;
        }";
    }

    // header bg color..
    if($h_bg_color != ''){
        $CSS .= "
        .top-head:not(.modern):not(.boxes):not(.affix),.top-head.light:not(.affix) .mod-container,.top-head.dark:not(.affix) .mod-container{
            background-color: {$h_bg_color} !important;
        }";
    }

    if ( theme_option('nav_bg_color') || theme_option('nav_image') ) {
        $CSS .= "
        .top-head.light:not(.affix):not(.boxes):not(.modern),.top-head.dark:not(.affix):not(.modern),.top-head.modern.light:not(.affix) .mod-container,.top-head.modern.dark:not(.affix) .mod-container{";
            if ( theme_option('nav_bg_color') ) {
                $CSS .= "background-color: ".theme_option('nav_bg_color').";";
            }
            if ( theme_option('nav_image') ) {
                $CSS .= "background-image: url('".theme_option('nav_image')."');";
                if ( theme_option('nav_img_repeat') ) {
                    $CSS .= "background-repeat: ".theme_option('nav_img_repeat').";";
                }
                if ( theme_option('nav_img_full_width') == '1' ) {
                    $CSS .= "background-size:cover;";
                }
            }
        $CSS .= "}";
    }

    if ( theme_option('nav_text_color') ) {
        $CSS .= "
        .top-head:not(.affix) .navbar-default .navbar-nav > li > a,.top-head:not(.affix) .head-btn > a{
            color: ".theme_option('nav_text_color').";
        }";
    }

    if ( theme_option('nav_icon_color') ) {
        $CSS .= "
        .top-head:not(.affix) .navbar-default .navbar-nav > li > a i,.top-head:not(.affix) .head-btn > a i,.top-head:not(.affix) .slbar_btn > span{
            color: ".theme_option('nav_icon_color').";
        }";
    }

    if ( theme_option('nav_text_bg_color') ) {
        $CSS .= "
        .top-head.boxes.light:not(.affix) .main-nav, .top-head.boxes.light:not(.affix) .head-btn,.top-head.boxes.dark:not(.affix) .main-nav, .top-head.boxes.dark:not(.affix) .head-btn{
            background-color: ".theme_option('nav_text_bg_color').";
        }";
    }

    if ( theme_option('sticky_bg_color') ) {
        $CSS .= "
        .top-head.affix{
            background-color: ".theme_option('sticky_bg_color').";
        }";
    }

    if ( theme_option('sticky_text_color') ) {
        $CSS .= "
        .top-head.affix a,.top-head.affix .navbar-default .navbar-nav>li>a{
            color: ".theme_option('sticky_text_color').";
        }";
    }

    if ( $title_bg_col != '') {
        $CSS .= "
        .page-title{
            background-color: {$title_bg_col} !important;
        }";
    } else if ( theme_option('page_title_bgcolor') != '') {
        $CSS .= "
        .page-title{
            background-color: ".theme_option('page_title_bgcolor').";
        }";
    }

    if ( $title_bg_img != '' && !is_tag() && !is_archive() ){
        $CSS .= "
        .page-title{
            background-image: url('{$title_bg_img}');
            background-repeat: {$title_bg_repeat};
            background-size: {$title_bg_size};
        }";
    } else if ( theme_option('page_title_bg') != '' && !is_tag() && !is_archive() ) {
        $CSS .= "
        .page-title{
            background-image: url('".theme_option('page_title_bg')."');
            background-repeat: ".theme_option('page_title_bg_repeat').";
            background-position: ".theme_option('page_title_bg_position').";
            background-size:".theme_option('page_title_bg_size').";
        }";
    }
    
    $CSS .= "
    .page-title h1 {
        font-family: '".theme_option('title_font')."', sans-serif;";
    $CSS .= (theme_option('title_font_weight') != '') ? "font-weight: ".theme_option('title_font_weight') : ""; 
    $CSS .= "}";
    
    // page title colors..
    if ( $title_col ){
        $CSS .= "
        .page-title h1 {
            color: {$title_col}; 
        }";
    } else if ( theme_option('page_title_fontcolor') ){
        $CSS .= "
        .page-title h1 {
            color: ".theme_option('page_title_fontcolor')."; 
        }";
    }
    
    // page title icon color..
    if ( theme_option('page_head_iconbgcolor') != '' ){
        $CSS .= "
        .page-title .title-icon {
            background-color: ".theme_option('page_head_iconbgcolor')."; 
        }";
    }
    if ( theme_option('page_head_iconcolor') != '' ){
        $CSS .= "
        .page-title .title-icon {
            color: ".theme_option('page_head_iconcolor')."; 
        }";
    }
    
    // page title font size..
    if ( $m_t_fontsize != '' ) {
        $CSS .= "
        .page-title h1{
            font-size: {$m_t_fontsize}px;
        }";
    } else if ( theme_option('title_font_size') ){
        $CSS .= "
        .page-title h1 {
            font-size: ".theme_option('title_font_size')."; 
        }";
    }
    
    // page sub title colors..
    if ( $subtitle_col ){
        $CSS .= "
        .page-title h3 {
            color: {$subtitle_col} !important; 
        }";
    } else if ( theme_option('page_title_subcolor') ){
        $CSS .= "
        .page-title h3 {
            color: ".theme_option('page_title_subcolor')."; 
        }";
    }
    
    // page sub title font size..
    if ( $m_st_fontsize != '' ) {
        $CSS .= "
        .page-title h3{
            font-size: {$m_st_fontsize}px;
        }";
    } else if ( theme_option('subtitle_font_size') ){
        $CSS .= "
        .page-title h3 {
            font-size: ".theme_option('subtitle_font_size')."px; 
        }";
    }
    
    // page title overlay..
    if ( $title_overlay != '' ) {
        $CSS .= "
        .page-title .video-overlay{
            background-color: {$title_overlay} !important;
        }";
    } else if ( $tm_overlay != '' ) {
        $CSS .= "
        .page-title .video-overlay{
            background-color: {$tm_overlay} !important;
        }"; 
    }

    if ( $m_txt_color != '' ){
        $CSS .= "
        .page-title .titl_txt_bg{
            background-color: {$m_txt_color};
        }";
    } else if ( theme_option('page_title_textcolor') != '' ){
        $CSS .= "
        .page-title .titl_txt_bg{
            background-color: ".theme_option('page_title_textcolor').";
        }";
    }
    
    // custom page title height..
    if ( $title_height != '' ){
        $CSS .= "
        .page-title .in-page-title{
            height: {$title_height}px;
        }";
    } else if ( $title_height == '' && $t_height != '' ){
        $CSS .= "
        .page-title .in-page-title{
            height: {$t_height}px;
        }";
    }
    
    // breadcrumbs..
    if ( theme_option('breadcrumbs_bgcolor') ) {
        $CSS .= "
        .breadcrumb{
            background-color: ".theme_option('breadcrumbs_bgcolor')." !important;
        }";    
    }
    
    if ( theme_option('breadcrumbs_color') ) {
        $CSS .= "
        .breadcrumb,.breadcrumb a,.breadcrumb span{
            color: ".theme_option('breadcrumbs_color').";
        }";    
    }
    
    // footer colors..
    if ( theme_option('foot_mid_bg_color') != '' || theme_option('foot_mid_top_border') != '' ){
        $CSS .= "
        .footer-middle{";
            if( theme_option('foot_mid_bg_color') != '' ) $CSS .= "background-color: ".theme_option('foot_mid_bg_color')." !important;";
            if( theme_option('footer_style') == '1' && theme_option('foot_mid_top_border') != '' ) $CSS .= "border-color: ".theme_option('foot_mid_top_border')." !important;";
            if( theme_option('foot_mid_text_color') != '' ) $CSS .= "color: ".theme_option('foot_mid_text_color').";";
        $CSS .= "}";    
    }
    
    if ( theme_option('footer_style') == '2' && theme_option('foot_mid_bg_color') != '' ){
        $CSS .= "
        .footer-2 .footer-middle > .container{
            background-color: rgba(0,0,0,0.15);
        }";    
    }
    
    if ( theme_option('foot_mid_bg') != '' ){
        $CSS .= "
        .footer-middle{
            background-image: url('".theme_option('foot_mid_bg')."');
            background-repeat: ".theme_option('foot_mid_bg_repeat').";
            background-position: ".theme_option('foot_mid_bg_position').";
            background-size: ".theme_option('foot_mid_bg_size').";
        }";
    }
    
    if( theme_option('foot_mid_text_color') != '' ){ 
        $CSS .= "
        .footer-middle a,#footWrapper .tagcloud a{
            color: ".theme_option('foot_mid_text_color').";
        }
        #footWrapper .tagcloud a{
            border-color: ".theme_option('foot_mid_text_color').";
        }
        ";
    }
     
    // bottom footer colors..
    if ( theme_option('foot_bot_bg_color') != '' ){
        $CSS .= "
        .footer-bottom{
            background-color: ".theme_option('foot_bot_bg_color')." !important;
        }";    
    }
    
    if ( theme_option('foot_bot_bg') != '' ){
        $CSS .= "
        .footer-bottom{
            background-image: url('".theme_option('foot_bot_bg')."');
            background-repeat: ".theme_option('foot_bot_bg_repeat').";
            background-position: ".theme_option('foot_bot_bg_position').";
            background-size: ".theme_option('foot_bot_bg_size').";
        }";
    }
    
    if( theme_option('foot_bot_text_color') != '' ){ 
        $CSS .= "
        .footer-bottom,.footer-bottom a{
            color: ".theme_option('foot_bot_text_color').";
        }
        ";
    }
    
    $CSS .= "
    .sl_bar_content{
        padding-top:{$slpaddTop[0]}px;
        padding-bottom:{$slpaddBottom}px;
    }";
    
    $consize = theme_option('sliding_bar_content_font_size') ? theme_option('sliding_bar_content_font_size') : '13';
    $CSS .= "
    .sl_bar_content *{
        font-size:{$consize}px !important;
        color:".theme_option('sliding_bar_font_color').";
    }";    
    
    $CSS .= "
    .slbar{";
    if( theme_option('sliding_bg_color') != '' ){
        $CSS .= "background-color:".theme_option('sliding_bg_color').";";    
    }
    if( theme_option('sliding_bg_img') != '' ){
        $CSS .= "
            background-image:url(".esc_url(theme_option('sliding_bg_img')).");
            background-repeat: ".theme_option('sliding_bg_repeat').";
            background-position: ".theme_option('sliding_bg_position').";
            background-size: ".theme_option('sliding_bg_size').";
        ";    
    }

    $CSS .= " }";
    
    $headsize = theme_option('sliding_bar_heading_font_size') ? theme_option('sliding_bar_heading_font_size') : '22';
    $CSS .= "
    .sl_bar_content h2{
        font-size:{$headsize}px !important;
        color:".theme_option('sliding_bar_headings_color')." !important;
    }"; 
    
    $btnsize = theme_option('sbar_btn_icon_size') ? theme_option('sbar_btn_icon_size') : '14';
    $CSS .= "
    .slbar a.slbar_btn,.slbar a.slbar_btn:focus{
        font-size:{$btnsize}px;
        color:".theme_option('sbar_btn_color').";
        background-color:".theme_option('sbar_btn_bg_color').";
    }";
    
    $CSS .= "
    .slbar.active a.slbar_btn{
        color:".theme_option('sbar_btn_tgl_color').";
        background-color:".theme_option('sbar_btn_tgl_bg_color').";
    }";   
    
    $mob_bg = theme_option('mob_menu_bg_color');
    $mob_txt = theme_option('mob_menu_txt_color');
    $mob_sbar = theme_option('sliding_bar_on_mobile');
    // responsive styles..
    $CSS .= "
    @media only screen and (max-width: 768px) {
        header.top-head .logo a i.logo-txt{
            font-size: ".theme_option('mobile_logo_size').";
        }";
    if($mob_bg != ''){    
        $CSS .= "
        .main-nav{
            background-color:{$mob_bg} !important;    
        }";
    }
    if($mob_txt != ''){    
        $CSS .= "
        .main-nav ul li a{
            color:{$mob_txt} !important;    
        }";
    }
    
    if($mob_sbar == ''){    
        $CSS .= "
        .slbar_btn,.top-slbar{
            display:none !important;    
        }";
    }
        
    $CSS .= "}";
    
    
    if ( theme_option('soon_bgcolor') ) {
        $CSS .= ".soon-page{
            background-color: ".esc_attr(theme_option('soon_bgcolor')).";
        }";
    }
    
    if ( theme_option('soon_bg') ) {
        $CSS .= "
        .soon-page{
            background-image: url(".esc_url(theme_option('soon_bg')).");";
            if (theme_option('soon_bg_size') != '') {
                $CSS .= "background-size:".theme_option('soon_bg_size').";";
            }
            $CSS .= "background-repeat: ".theme_option('soon_bg_repeat').";";
            $CSS .= "background-position: ".theme_option('soon_bg_position').";";
            if (theme_option('soon_bg_img_parallax') == '1') {
                $CSS .= "background-attachment:fixed;";
            }
        $CSS .= "}";
    }
    
    if ( theme_option('digits_bg') ) {
        $CSS .= "#digits div{
            background-image: url(".esc_url(theme_option('digits_bg')).");
        }";
    }
    
    if ( theme_option('digits_color') ) {
        $CSS .= "#digits div{
            color: ".esc_attr(theme_option('digits_color'))." !important;
        }";
    }
    
    if ( theme_option('soon_count_color') ) {
        $CSS .= "#digits span{
            color: ".esc_attr(theme_option('soon_count_color'))." !important;
        }";
    }
    
    if ( theme_option('soon_socials_color') ) {
        $CSS .= ".soon-page .social-list a i{
            color: ".esc_attr(theme_option('soon_socials_color'))." !important;
        }";
    }
    
    if ( theme_option('soon_socials_bgcolor') ) {
        $CSS .= ".soon-page .social-list a i{
            background-color: ".esc_attr(theme_option('soon_socials_bgcolor'))." ;
        }";
    }
    
    if ( theme_option('soon_socials_border') ) {
        $CSS .= ".soon-page .social-list a i{
            border-color: ".esc_attr(theme_option('soon_socials_border'))." !important ;
        }";
    }
    
    if ( theme_option('mainten_bgcolor') ) {
        $CSS .= ".maintenance{
            background-color: ".esc_attr(theme_option('mainten_bgcolor')).";
        }";
    }
    
    if ( theme_option('mainten_bg') ) {
        $CSS .= "
        .maintenance{
            background-image: url(".esc_url(theme_option('mainten_bg')).");";
            if (theme_option('mainten_bg_size') != '') {
                $CSS .= "background-size:".theme_option('mainten_bg_size').";";
            }
            $CSS .= "background-repeat: ".theme_option('mainten_bg_repeat').";";
            $CSS .= "background-position: ".theme_option('mainten_bg_position').";";
            if (theme_option('mainten_bg_img_parallax') == '1') {
                $CSS .= "background-attachment:fixed;";
            }
        $CSS .= "}";
    }
    
    // Skin color styles..
    $CSS .= "
    
    .main-bg,.top-head.modern:not(.affix) .mod-container .navbar-nav>li>a:before, .top-head.modern:not(.affix) .mod-container .navbar-nav>li.current-menu-ancestor >a:before,.footer-bottom .widget_nav_menu:after,#to-top:hover,.p-day,.swiper-container .swiper-button:hover,
    .form-submit input.submit,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.sw-more,.square1.slick-dots li.slick-active button:before,
    .top-head.classic.blocks:not(.affix) .main-nav > ul > li.current-menu-ancestor > a,.top-head.classic.borders:not(.affix) .main-nav > ul > li.current-menu-ancestor,.pager.style3 .page-numbers li > span,.pager.style5 .page-numbers li > span,.oc-carousel.testo-4 .slick-arrow,
    .navbar.colored .main-nav .sub-menu,.navbar.colored .main-nav .mega-content,.heading.style3:before,button.slick-arrow:hover,.vc_general.vc_btn3.vc_btn3-color-main-bg,.vc_tta-color-main-bg .vc_tta-panel.vc_active .vc_tta-panel-heading,.heading.style4:after,
    .vc_btn3.vc_btn3-style-outline.vc_btn3-color-main-bg:hover,.vc_cta3-color-main-bg,.heading.style3.centered:after,
    .vc_tta.vc_general.vc_tta-style-bottom-border .vc_tta-panel.vc_active .vc_tta-panel-body,.vc_tta.vc_general.vc_tta-tabs.vc_tta-style-bottom-border .vc_tta-tab.vc_active > a,.oc-carousel_dup,.team-box.team-1 .member_details,.team-box.team-3:hover .member_socials .social-list,
    .oc-carousel .slick-dots.circle1 li.slick-active button:before,.oc-carousel .slick-dots.square1 li.slick-active button:before,.heading.centered.style4:before,.top-head.boxes.light:not(.affix) .navbar-nav > li.current_page_item > a,
    .tagcloud a:hover:after,.post-tags a:hover:after,.pager.style1 ul.page-numbers li > span{
        background-color: {$hexStr};
        color: #fff;
    }
    
    .main-bg-import,.vc_tta.vc_general.vc_tta-tabs.bg-color .vc_tta-tab.vc_active > a,.vc_tta.vc_general.vc_tta-tabs.vc_tta-style-bg-color .vc_tta-tab.vc_active > a,.top-head.dots-nav.affix .navbar-nav>li > a span,
    .top-head.dots-nav.affix .main-nav > ul > li a.active,.top-head.dots-nav.affix .main-nav > ul > li a:hover{
        background-color: {$hexStr} !important
    }
    
    a:hover,.top-head .main-nav > ul > li > a:hover,.main-color,.main-color > a,.navbar-default .navbar-nav>li.current-menu-ancestor > a,.navbar-default .navbar-nav>li.current-menu-item > a,.heading.style4 .head-ico:before,
    .footer-bottom .widget_nav_menu li a,.breadcrumb a, .price_label span,.description_tab a:before, .reviews_tab a:before,.additional_information_tab a:before,.pager.style2 .page-numbers li > span,.vc_btn3.vc_btn3-style-outline.vc_btn3-color-main-bg,
    .vc_tta.vc_general.vc_tta-tabs .vc_tta-tab.vc_active>a,.vc_toggle_active .vc_toggle_title,.meta .comment-reply-link,.meta .comment-edit-link{
        color: {$hexStr};
    }
    
    .main-nav .sub-menu,.main-nav li.mega-menu .mega-content,.footer-1 .footer-middle,.top-head .dropdown-menu,.top-bar .dropdown-menu,.widget h2.widgettitle,.comment-respond > h3,.comments > h3,.related-posts > h3,.custom-list.style4 > a,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce-tabs h2,.related.products > h2,.up-sells > h2,.cross-sells > h2,.cart_totals > h2,header.title h3,.pager.style2 .page-numbers li > span,.custom-list.style4 > li, 
    .woocommerce-billing-fields > h3,.woocommerce-shipping-fields > h3,#order_review_heading,.wc-bacs-bank-details-heading, body.woocommerce-checkout .main-content .woocommerce h2,.pager.style5 .page-numbers li > span,.testo-1 .testi_img,
    .vc_btn3.vc_btn3-style-outline.vc_btn3-color-main-bg,.oc-feature.style2,.testo-2 .slick-current .testi_img img,.slick-dots li.slick-active button,.tagcloud a:hover:before,.post-tags a:hover:before,.pager.style1 ul.page-numbers li > span{
        border-color: {$hexStr};
    }
    
    select:focus,textarea:focus,input[type='text']:focus,input[type='password']:focus,input[type='email']:focus,input[type='url']:focus,input[type='search']:focus,input[type='tel']:focus,.team-box.box-1:hover,
    .vc_tta-tabs.vc_tta-tabs-position-bottom.vc_tta-style-bg-color .vc_tta-panels-container, .vc_tta-tabs.vc_tta-tabs-position-bottom.vc_tta-style-bordered.bg-color .vc_tta-panels-container,.recent-posts.style2,
    .vc_tta-tabs.vc_tta-tabs-position-bottom.vc_tta-style-top-border .vc_tta-tab.vc_active>a, .vc_tta-tabs.vc_tta-tabs-position-bottom.top-border .vc_tta-tab.vc_active>a{
        border-bottom-color: {$hexStr} !important;
    }
    
    .vc_tta-tabs.vc_tta-style-bg-color .vc_tta-tabs-list, .vc_tta-tabs.vc_tta-style-bordered.bg-color .vc_tta-tabs-list{
        border-bottom-color: {$hexStr} !important
    }
    
    .bo_ribbon.bottom:before,.bo_ribbon.bottom:after,.vc_tta.vc_general.vc_tta-style-top-border .vc_tta-tab.vc_active > a,.vc_tta.vc_general.top-border .vc_tta-tab.vc_active > a,.testo-2 .slick-current .testi_img:after,.fullscreen-contact{
        border-top-color: {$hexStr};
    }
    
    .vc_tta-color-main-bg .vc_tta-panel.vc_active .vc_tta-panel-heading{
        border-color: {$darkthm} !important;
    }
    
    .vc_btn3.vc_btn3-color-main-bg.vc_btn3-style-3d {
        box-shadow: 0 5px 0 {$darkthm};
    }
    .vc_btn3.vc_btn3-color-main-bg.vc_btn3-style-3d:focus, .vc_btn3.vc_btn3-color-main-bg.vc_btn3-style-3d:hover {
        top: 3px;
        box-shadow: 0 2px 0 {$darkthm};
    }
    .top-head.dots-nav.affix .navbar-nav>li > a span:before{
        border-color: transparent {$hexStr} transparent transparent;
    }
    
    .team-box.team-4 .member_details{
        background-color:rgba({$rgbacolor},0.9);
    }
    
    .top-head.boxes:not(.affix) .main-nav > ul > li:hover > a,.top-head.boxes:not(.affix) .head-btn.open,.top-head.boxes:not(.affix) .head-btn:hover,.head-btn.over .search-box > form,.top-head .main-nav > ul > li a[href*='#']:not([href='#']).active,
    .side-head .main-nav > ul > li a[href*='#']:not([href='#']).active{
        background-color: {$hexStr};
        color: #fff
    }";
    
    // sub menu color..
    if ($sub_menu == 'custom') {
        if($m_sub_bg != ''){
            $CSS .= "
            .main-nav .sub-menu,.main-nav .mega-content{
                background-color: {$m_sub_bg} !important;
            }
            .main-nav .sub-menu, .main-nav .mega-content {
                border-color: {$m_dark_sub} !important;
            }";
        }
        if($m_sub_color != ''){
            $CSS .= "
            .main-nav .sub-menu li a{
                color: {$m_sub_color};
            }";
        }    
    } else if ( $thm_submenu == 'custom' ) {
        
        if($thm_sub_bg_color != ''){
            $CSS .= "
            .main-nav .sub-menu,.main-nav .mega-content{
                background-color: {$thm_sub_bg_color}
            }
            .main-nav .sub-menu, .main-nav .mega-content{
                border-color: {$thm_dark_sub}
            }";    
        }
        
        if ($thm_sub_color != ''){
            $CSS .= "
            .main-nav .sub-menu li a{
                color: {$thm_sub_color} !important;
            }
            ";
        }                
    }
    
    if( theme_option('custom_css') != '' ){
        $CSS .= theme_option('custom_css');   
    }
    
    $CSS = str_replace(': ', ':', str_replace(';}', '}', str_replace('; ',';',str_replace(' }','}',str_replace(' {', '{', str_replace('{ ','{',str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),"",preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!','',$CSS))))))));
    
    return $CSS;
      
}
