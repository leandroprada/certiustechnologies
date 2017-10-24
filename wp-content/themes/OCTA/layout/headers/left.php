<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

$clas = 'side-head';
$ht_bar = get_post_meta(c_page_ID(),'meta_hide_top_bar',true);
$h_menu = get_post_meta(c_page_ID(),'meta_hide_menu',true); 
$header_style = get_post_meta(c_page_ID(),'meta_header_style',true);
$header_class = get_post_meta(c_page_ID(),'meta_header_extra_class',true);
$log_pos = get_post_meta(c_page_ID(),'meta_logo_position',true);
$h_dark = get_post_meta(c_page_ID(),'meta_header_dark',true);
$h_ful = get_post_meta(c_page_ID(),'meta_header_full',true);
$opts_copy = theme_option('foot_copyrights');
$clas .= $header_class ? ' '.$header_class : '';
$clas .= ($h_dark != '' && $h_dark == '1') ? ' dark' : (($h_dark == '' && theme_option('header-dark') == '1') ? ' dark' : ' light');
$langcode = ( class_exists( 'SitePress' ) ) ? '-'.ICL_LANGUAGE_CODE : '';

if ( $ht_bar == '1' || (theme_option("show_top_bar") == '1' && $ht_bar == '') ) {
    get_template_part( 'layout/heads/top-bar');
} 
if ( !$h_menu == '1') { ?>

<header class="<?php echo esc_attr($clas) ?>">
    <div class="container">
        <?php site_logo(); ?>
        
        <div class="site-nav">
            <?php it_select_menu(); ?>
            <div class="side-head-bottom">
                
                <?php if(theme_option("show_search")){ ?>
                    <div class="side-search">
                        <?php get_search_form(); ?>
                    </div>
                <?php } ?>
                
                <?php if( theme_option("show_head_socials") == '1' ){ echo display_social_icons(); } ?>
                                
                <?php if ( theme_option("show_head_copy") == '1' ) { ?>
                    <div class="copyrights">
                        <?php echo wp_kses($opts_copy,it_allowed_tags()); ?>
                    </div>
                <?php } ?>
                
            </div>
        </div>
        
    </div>
</header>
<?php } ?>