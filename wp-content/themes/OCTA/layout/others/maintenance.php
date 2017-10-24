<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
$langcode = '';
if ( class_exists( 'SitePress' ) ) {
    $langcode = '-'.ICL_LANGUAGE_CODE;
}
$lgcolhead = $lg2colhead = $lg3colhead = '';
$lghead = theme_option('mainten_large_heading'.$langcode);
$lghead_col = theme_option('mainten_lg_head_color');
$lghead_h2 = theme_option('mainten_large_heading2'.$langcode);
$lghead_h2_col = theme_option('mainten_lg_head2_color');
$desc = theme_option('mainten_decription'.$langcode);
$desc_col = theme_option('mainten_desc_color');
$showlinks = theme_option('mainten_show_social_links');
$shownl = theme_option('mainten_show_newsletters');
$fb = theme_option('mainten_facebook');
$tw = theme_option('mainten_twitter');
$ln = theme_option('mainten_linkedin');
$gplus = theme_option('mainten_google-plus');
$sky = theme_option('mainten_skype');
$rss = theme_option('mainten_rss');
$ut = theme_option('mainten_youtube');
$pghead = theme_option('show_page_head');
$soon_bg = theme_option('mainten_bg');
$nl = theme_option('mainten_nl_shortcode');
if($lghead_h2_col){
    $lg2colhead = ' style="color:'.esc_attr($lghead_h2_col).'"';
}
if($lghead_col){
    $lgcolhead = ' style="color:'.esc_attr($lghead_col).'"';
}
if($desc_col){
    $lg3colhead = ' style="color:'.esc_attr($desc_col).'"';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" media="screen" />
        <?php if ( ! isset( $content_width ) ) $content_width = 960; ?>
        <?php wp_head(); ?> 
    </head>
    <body <?php body_class(); ?>>
        
        <?php oc_loader(); ?>
        <div class="maintenance">
            <div id="mainOctaWrapper" class="pageWrapper">
                <div class="container m-b-3">
                    
                    <div class="logo soon-logo">
                        <?php site_logo(); ?>
                    </div>
                                    
                        
                    <div class="soon-heading text-center m-b-3">
                        <?php if($lghead != ''){ ?>
                            <h1 class="uppercase lg-head main-color"<?php echo esc_attr($lgcolhead) ?>><?php echo esc_html($lghead); ?></h1>
                        <?php } ?>
                        <?php if($lghead_h2 != ''){ ?>
                            <h3 class="sec-head uppercase"<?php echo $lg2colhead ?>><?php echo esc_html($lghead_h2); ?></h3>
                        <?php } ?>
                        <?php if($desc != ''){ ?>
                            <p class="wid-50 tbl m-auto m-t-2 font-15"<?php echo esc_attr($lg3colhead) ?>><?php echo wp_kses($desc,it_allowed_tags());  ?></p>
                        <?php } ?>

                    </div>
                    
                    <?php if($shownl == '1'){ ?>
                        <div class="tbl wid-50 m-auto p-a-4 lg-newsletters">
                            <label><?php echo esc_html__('Subscribe to our NewsLetters', 'octa') ?></label>
                            <?php echo do_shortcode(esc_attr($nl)); ?>
                        </div>
                    <?php } ?>

                </div>
                
                <?php if($showlinks == '1'){ ?>
                <div class="main-bg p-a-3 m-t-3">
                    <div class="container">
                        <p class="text-center"><?php echo esc_html__('You Can Find Us Here:', 'octa'); ?></p>
                        <div class="social-list tbl m-auto">
                            <?php if($fb != ''){ ?>
                                <a data-toggle="tooltip" data-placement="top" data-original-title="Facebook" href="<?php echo esc_url($fb); ?>"><i class="fa fa-facebook ic-facebook md-icon white"></i></a>
                            <?php } ?>
                            <?php if($tw != ''){ ?>
                                <a data-toggle="tooltip" data-placement="top" data-original-title="twitter" href="<?php echo esc_url($tw); ?>"><i class="fa fa-twitter ic-twitter md-icon white"></i></a>
                            <?php } ?>
                            <?php if($ln != ''){ ?>
                                <a data-toggle="tooltip" data-placement="top" data-original-title="linkedin" href="<?php echo esc_url($ln); ?>"><i class="fa fa-linkedin ic-linkedin md-icon white"></i></a>
                            <?php } ?>
                            <?php if($gplus != ''){ ?>
                                <a data-toggle="tooltip" data-placement="top" data-original-title="google-plus" href="<?php echo esc_url($gplus); ?>"><i class="fa fa-google-plus md-icon ic-google-plus white"></i></a>
                            <?php } ?>
                            <?php if($sky != ''){ ?>
                                <a data-toggle="tooltip" data-placement="top" data-original-title="skype" href="<?php echo esc_url($sky); ?>"><i class="fa fa-skype ic-skype md-icon white"></i></a>
                            <?php } ?>
                            <?php if($rss != ''){ ?>
                                <a data-toggle="tooltip" data-placement="top" data-original-title="rss" href="<?php echo esc_url($rss); ?>"><i class="fa fa-rss ic-rss md-icon white"></i></a>
                            <?php } ?>
                            <?php if($ut != ''){ ?>
                                <a data-toggle="tooltip" data-placement="top" data-original-title="youtube" href="<?php echo esc_url($ut); ?>"><i class="fa fa-youtube ic-youtube md-icon white"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
                        
            <?php wp_footer(); ?>
        </div>
    </body>
</html>