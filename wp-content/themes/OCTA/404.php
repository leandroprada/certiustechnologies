<?php 

if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

get_header();
$cust_title = get_post_meta(c_page_ID(),'chck_custom_title',true);
$h_title = get_post_meta(c_page_ID(),'hide_page_title',true);
$lay404 = theme_option('404_layout');
$bg = theme_option('404_bg');
$poster = theme_option('404_poster');
$vmp4 = theme_option('404_video_mp4');
$vwebm = theme_option('404_video_webm');
$vogv = theme_option('404_video_ogv');
$errbg = '';
if($bg){
    $errbg = ' style="background-image: url('.esc_attr($bg).');"';
}

// page title function.
if( $cust_title == '' || ($cust_title == '1' && $h_title != '1') ){
    it_title_style();    
}
if($lay404 == '1'){
    
?> 

<div class="container">
    <div class="row row-eq-height">
        
        <div class="col-md-7 md-padding main-content">
            <div class="pg-nt-fnd m-b-2">
                <h4 class="uppercase font-25"><span class="main-color"><?php echo esc_html__('OOOPS!','octa') ?></span> <?php echo esc_html__('The Page You Are Looking for could not Be Found.','octa'); ?></h4>
            </div>
            
            <div class="not-found-form m-b-3">
                <p class="font-15 srch-hint"><?php echo esc_html__('You can use the form below to search for what you need.','octa'); ?></p>
                <?php get_search_form(); ?>
            </div>

            <div class="clearfix"></div>

            <p class="alert alert-warning srch-msg"><i class="fa fa-info-circle"></i> <?php echo esc_html__('You can browse the following links that may help you for what you are looking for.','octa') ?></p>
        
            <div class="m-t-2 the404menu">
                <?php the404menu(); ?>
            </div>

        </div>
        
        <div class="col-md-5 text-center md-padding gry-bg">
            <div class="lg-not-found"><?php echo esc_html__('404','octa') ?><i></i></div>
        </div>

    </div>
</div>

<?php } else if($lay404 == '2'){ ?>
<div class="fullscreen-box parallax bg404"<?php echo esc_attr($errbg); ?> data-stellar-background-ratio="0.4" data-overlay="rgba(0,0,0,.6)">

    <div class="container">
                
            <div class="md-padding white">
                
                <div class="lg-not-found"><?php echo esc_html__('404','octa') ?><span> <?php echo esc_html__('Page Not Found','octa') ?></span></div>

                <div class="wid-50">
                    <div class="pg-nt-fnd ">
                        <h4 class="p-t-3 white font-25 m-b-2"><?php echo esc_html__('Sorry.. The Page You Are Looking for could not Be Found.','octa') ?></h4>
                        <hr class="m-b-2">
                        <p class="font-20 ligh-font m-b-0"><?php echo esc_html__('You can use the form below to search for what you need.','octa') ?></p>
                    </div>
                    
                    <div class="not-found-form m-t-2 p-a-2">
                        <?php get_search_form(); ?>
                    </div>
                </div>

            </div>
            
    </div>

</div>
<?php
} else {
?>
<div class="fullscreen-box">
    <div class="video-wrap low-index absPos">
        <video poster="<?php echo esc_url($poster); ?>" preload="auto" loop autoplay muted>
            <source src='<?php echo esc_url($vmp4); ?>' type='video/mp4' />
            <source src='<?php echo esc_url($vwebm); ?>' type='video/webm' />
            <source src='<?php echo esc_url($vogv); ?>' type='video/ogv' />
        </video>
        <div class="video-overlay"></div>
    </div>
    <div class="container relative hi-index">
                
            <div class="md-padding text-center">
                
                <div class="lg-not-found white m-t-3"><?php echo esc_html__('404','octa') ?><span><?php echo esc_html__('Page Not Found','octa') ?></span></div>

                <div class="wid-50 tbl m-auto">
                    <div class="pg-nt-fnd">
                        <h4 class="p-t-3 font-25 m-b-2 white"><?php echo esc_html__('Sorry.. The Page You Are Looking for could not Be Found.','octa') ?></h4>
                        <hr class="m-b-2">
                        <p class="font-20 ligh-font m-b-0 white"><?php echo esc_html__('You can use the form below to search for what you need.','octa') ?></p>
                    </div>
                    
                    <div class="not-found-form m-t-2 p-a-2">
                        <?php get_search_form(); ?>
                    </div>
                </div>

            </div>
            
    </div>

</div>
<?php
}

get_footer(); ?>