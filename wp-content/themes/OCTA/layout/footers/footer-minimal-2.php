<?php
/*
Footer Style
*/
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

$opts_foot_widgets = (theme_option('foot_mid_show') == '1') ? '1' : '0';
$opts_bot_foot = (theme_option('foot_bottom_show') == '1') ? '1' : '0';
$h_foot_widgets = (get_post_meta(c_page_ID(),'meta_hide_foot_widgets',true) == '1') ? '1' : '0';
$hb_foot_bar = (get_post_meta(c_page_ID(),'meta_hide_bottom_foot_bar',true) == '1') ? '1' : '0';

$meta_light = get_post_meta(c_page_ID(),'meta_foot_light',true);
$meta_fixed = get_post_meta(c_page_ID(),'meta_foot_fixed',true); 

$opts_light = theme_option('footer_light');
$opts_fixed = theme_option('footer_fixed');
$opts_copy = theme_option('foot_copyrights');

if($meta_light == '1'){
    $light = ' light';
}else if($opts_light == '1'){
    $light = ' light';
}else{
    $light = '';
}
if($meta_fixed == '1'){
    $fixed = ' fixed-footer';
}else if($opts_fixed == '1'){
    $fixed = ' fixed-footer';
}else{
    $fixed = '';
}
 
$langcode = '';
if ( class_exists( 'SitePress' ) ) {
    $langcode = '-'.ICL_LANGUAGE_CODE;
} 
?>
<footer id="footWrapper" class="footer-minimal minimal-2<?php echo esc_attr($light).esc_attr($fixed); ?>">
    
    <?php if ( $opts_foot_widgets == "1" && $h_foot_widgets != '1') { ?>
    <div class="footer-middle no-bg sm-padding">
        <div class="container">
            <div class="row over-hidden">
                <div class="tbl m-auto m-b-2">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="" src="<?php echo esc_url(theme_option('minimal-logo')); ?>"></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="foot_widgets">
                    <?php if(is_active_sidebar('footer-bottom-widgets')){ ?>
                        <?php dynamic_sidebar('footer-bottom-widgets'); ?>
                    <?php } ?>
                </div>
                
                <div class="copyrights">
                    <?php echo wp_kses($opts_copy,it_allowed_tags()); ?>
                </div>
            </div>
        </div>    
    </div>
    <?php } ?>
    <!-- footer bottom bar end -->
    
</footer>