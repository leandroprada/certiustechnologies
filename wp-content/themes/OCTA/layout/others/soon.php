<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
$langcode = '';
if ( class_exists( 'SitePress' ) ) {
    $langcode = '-'.ICL_LANGUAGE_CODE;
}
$lgcolhead = $lg2colhead = $lg3colhead = '';
$lghead = theme_option('soon_large_heading'.$langcode);
$lghead_col = theme_option('soon_lg_head_color');
$lghead_h2 = theme_option('soon_large_heading2'.$langcode);
$lghead_h2_col = theme_option('soon_lg_head2_color');
$desc = theme_option('soon_decription'.$langcode);
$desc_col = theme_option('soon_desc_color');
$showlinks = theme_option('show_social_links');
$shownl = theme_option('show_newsletters');
$digits = theme_option('show_count_down');
$fb = theme_option('soon_facebook');
$tw = theme_option('soon_twitter');
$ln = theme_option('soon_linkedin');
$gplus = theme_option('soon_google-plus');
$sky = theme_option('soon_skype');
$rss = theme_option('soon_rss');
$ut = theme_option('soon_youtube');
$pghead = theme_option('show_page_head');
$soon_bg = theme_option('soon_bg');
$nl = theme_option('nl_shortcode');
$soon_type = theme_option('soon_bg_type');
$soon_poster = theme_option('soon_poster');
$soon_mp4 = theme_option('soon_video_mp4');
$soon_webm = theme_option('soon_video_webm');
$soon_ogv = theme_option('soon_video_ogv');
$soon_date = theme_option('soon_date');
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
        <div class="soon-page">
            <div id="mainOctaWrapper" class="pageWrapper">
                <div id="contentWrapper">
                    
                    <?php if ( $soon_type == 'video' ) { ?>

                        <div class="video-wrap low-index">
                            <video poster="<?php echo esc_url($soon_poster); ?>" preload="auto" loop autoplay muted class="vid-H">
                                <source src='<?php echo esc_url($soon_mp4); ?>' type='video/mp4' />
                                <source src='<?php echo esc_url($soon_webm); ?>' type='video/webm' />
                                <source src='<?php echo esc_url($soon_ogv); ?>' type='video/ogv' />
                            </video>
                            <div class="video-overlay"></div>
                        </div>
                    
                    <?php } ?>
                    
                    <div class="container hi-index">
                        
                        <div class="logo soon-logo">
                            <?php site_logo(); ?>
                        </div>
                        
                        <div class="text-center">
                            <div class="soon-heading p-a-3">
                                
                                <?php if($lghead != ''){ ?>
                                    <h1 class="bold soon-lg-head"<?php echo esc_attr($lgcolhead) ?>><?php echo wp_filter_post_kses($lghead); ?></h1>
                                <?php } ?>
                                
                                <?php if($lghead_h2 != ''){ ?>
                                    <h2 class="bold"<?php echo esc_attr($lg2colhead) ?>><?php echo wp_filter_post_kses($lghead_h2); ?></h2>
                                <?php } ?>
                                
                                <?php if($desc != ''){ ?>
                                    <h3<?php echo esc_attr($lg3colhead) ?>><?php echo wp_kses($desc,it_allowed_tags());  ?></h3>
                                <?php } ?>                            
                                
                            </div>                        
                        </div>                    
                    </div>
                    
                    <?php if($digits == '1'){ ?>            
                        <div class="white-tr-bg-light relative hi-index">
                            <div class="p-a-3">
                                <div id="digits" class="lg-countdown no-border style-4 white text-center"></div>
                            </div>
                        </div>
                    <?php } ?>
                    
                    <?php if($shownl == '1'){ ?>
                        <div class="container relative hi-index">    
                            <div class="tbl m-auto wid-50 m-b-3 m-t-2 lg-newsletters">
                                <h3 class="black-tr-bg white text-center light-font p-a-2"><?php echo esc_html__('Subscribe to our NewsLetters', 'octa') ?></h3>
                                <?php echo do_shortcode(esc_attr($nl)); ?>
                            </div>
                        </div>
                    <?php } ?>
                    
                    <?php if($showlinks == '1'){ ?>
                    <div class="social-list m-auto tbl m-t-2 over-hidden relative hi-index">
                        <?php if($fb != ''){ ?>
                            <a href="<?php echo esc_url($fb); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="ic-colored white outlined lg-icon ic-facebook fa fa-facebook"></i></a>
                        <?php } ?>
                        <?php if($tw != ''){ ?>
                            <a data-toggle="tooltip" data-placement="top" data-original-title="twitter" href="<?php echo esc_url($tw); ?>"><i class="ic-colored fa fa-twitter ic-twitter white outlined lg-icon"></i></a>
                        <?php } ?>
                        <?php if($ln != ''){ ?>
                            <a data-toggle="tooltip" data-placement="top" data-original-title="linkedin" href="<?php echo esc_url($ln); ?>"><i class="ic-colored fa fa-linkedin ic-linkedin white outlined lg-icon"></i></a>
                        <?php } ?>
                        <?php if($gplus != ''){ ?>
                            <a data-toggle="tooltip" data-placement="top" data-original-title="google-plus" href="<?php echo esc_url($gplus); ?>"><i class="ic-colored fa fa-google-plus ic-google-plus white outlined lg-icon"></i></a>
                        <?php } ?>
                        <?php if($sky != ''){ ?>
                            <a data-toggle="tooltip" data-placement="top" data-original-title="skype" href="<?php echo esc_url($sky); ?>"><i class="ic-colored fa fa-skype ic-skype white outlined lg-icon"></i></a>
                        <?php } ?>
                        <?php if($rss != ''){ ?>
                            <a data-toggle="tooltip" data-placement="top" data-original-title="rss" href="<?php echo esc_url($rss); ?>"><i class="ic-colored fa fa-rss ic-rss white outlined lg-icon"></i></a>
                        <?php } ?>
                        <?php if($ut != ''){ ?>
                            <a data-toggle="tooltip" data-placement="top" data-original-title="youtube" href="<?php echo esc_url($ut); ?>"><i class="ic-colored fa fa-youtube ic-youtube white outlined lg-icon"></i></a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                                    
                    <?php if ( theme_option('enable_copyrights') == "1" ) : ?>
                        <div class="copyrights centered white m-t-3">
                            <?php if ( theme_option('copyrights'.$langcode) ) : ?>
                                <?php echo wp_kses(theme_option('copyrights'.$langcode),it_allowed_tags()); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>            

            <?php wp_footer(); ?>
        </div>
        <script type="text/javascript">
        if(jQuery("#digits").length){
            jQuery('#digits').countdown('<?php echo esc_js($soon_date) ?>', function(event) {
                var $this = jQuery(this).html(event.strftime(''
                + '<div class="text-center"><span class="main-color">%m</span> Months</div>'
                + '<div class="text-center"><span class="main-color">%n</span> Days</div>'
                + '<div class="text-center"><span class="main-color">%H</span> Hours</div>'
                + '<div class="text-center"><span class="main-color">%M</span> Minutes</div>'
                + '<div class="text-center"><span class="main-color">%S</span> Seconds</div>'));
            });
        }
    </script>
    </body>
</html>