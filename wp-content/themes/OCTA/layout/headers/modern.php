<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

$clas = 'top-head fixed-head';
$met_t_bor = get_post_meta(c_page_ID(),'meta_header_border',true);
$ht_bar = get_post_meta(c_page_ID(),'meta_hide_top_bar',true);
$st_head = get_post_meta(c_page_ID(),'meta_header_sticky',true);
$h_menu = get_post_meta(c_page_ID(),'meta_hide_menu',true); 
$header_style = get_post_meta(c_page_ID(),'meta_header_style',true);
$header_class = get_post_meta(c_page_ID(),'meta_header_extra_class',true);
$log_pos = get_post_meta(c_page_ID(),'meta_logo_position',true);
$h_dark = get_post_meta(c_page_ID(),'meta_header_dark',true);
$h_ful = get_post_meta(c_page_ID(),'meta_header_full',true);
$mh_fixed = get_post_meta(c_page_ID(),'meta_header_fixed',true);
$m_head_pos = get_post_meta(c_page_ID(),'meta_header_position',true);
$sbar_btn_icon = theme_option('sbar_btn_icon');
$sbar_btn_tgl_icon = theme_option('sbar_btn_tgl_icon');

$clas .= ( $st_head == '1' || (theme_option('sticky_header_on') == '1' && $st_head == '')) ? ' affix-top' : '';
$clas .= $header_class ? ' '.$header_class : '';
$clas .= $header_style ? ' '.$header_style : ' '.theme_option("header_layout");
$clas .= $log_pos ? ' '.$log_pos : ' '.theme_option("logo-position");
$clas .= ($h_ful != '' && $h_ful == '1') ? ' full' : (($h_ful == '' && theme_option('header-full') == '1') ? ' full' : '');
$clas .= ($h_dark != '' && $h_dark == '1') ? ' dark' : (($h_dark == '' && theme_option('header-dark') == '1') ? ' dark' : ' light');

if ( $mh_fixed == '1' ){
    $clas .= ' fixed-head';
    $clas .= ($m_head_pos == 'bottom') ? ' bottom' : ' top';

} else if ( theme_option("header-fixed") == '1' ){
    $clas .= ' fixed-head';
    $clas .= (theme_option('header-position') == 'bottom') ? ' bottom' : ' top';
}

if ( !$h_menu == '1') { ?>

<header class="<?php echo esc_attr($clas) ?>">
    <?php
    if ( $ht_bar == '1' || (theme_option("show_top_bar") == '1' && $ht_bar == '') ) {
        get_template_part( 'layout/heads/top-bar');
    }
    ?>
    <div class="head-cont">
        <div class="container mod-container">
        
        <?php site_logo(); ?>
        
        <div class="site-nav pull-right">
                
            <?php it_select_menu(); ?>
            
            <?php if ( class_exists( 'woocommerce' ) ){ ?>
                <?php if(theme_option("show_cart")){ ?>
                    <div class="top-cart head-btn pull-left dropdown">
                        <?php echo it_wo_cart(); ?>
                    </div>
                <?php } ?>
            <?php } ?>
            
            <?php if(theme_option("show_search")){ ?>
                <div class="top-search <?php echo esc_html(theme_option('search_box_style')); ?> head-btn pull-left dropdown">
                    <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="pe-7s-search"></i></a>
                    <div class="search-box dropdown-menu">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            <?php } ?>
            
            <?php if ( theme_option('show_sliding_bar') == '1' && theme_option('btn_position') == 'in_header' ){ ?>
               <div class="top-slbar head-btn pull-left dropdown">
                    <a href="#" class="slbar_btn"><span data-icon="<?php echo esc_attr($sbar_btn_icon);?>" data-tgl-icon="<?php echo esc_attr($sbar_btn_tgl_icon);?>"></span></a>
               </div>
            <?php } ?>
            
        </div>
    </div>
    </div>
</header>
<?php } ?>