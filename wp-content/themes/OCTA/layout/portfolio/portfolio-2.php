<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
$Aid = get_current_user_id();
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$options = get_post_custom(get_the_ID());
$snum = '';
if(isset($options['scrsnum'])){
    $snum = $options['scrsnum'][0];
}
$snum = substr($snum, ($pos = strpos($snum, ',')) !== false ? $pos + 1 : 0);
$coms = commas($snum); 

$inum = '';
if(isset($options['iconsnum'])){
    $inum = $options['iconsnum'][0];
}

$comi = commas($inum);

$gallery = get_post_gallery();
if ( get_post_gallery() ) {
    $cl = ' slick-gal pro-gallery';
}else{
    $cl = '';
}

if ( theme_option('singleprojectimg_on') == "1" ) {
    if ( get_post_gallery() ) {
    $galleries = get_post_galleries_images( $post  );
    ?>
    <div class="<?php echo esc_attr($cl); ?>">
    <?php
    foreach( $galleries as $galleri ) {
        foreach( $galleri as $image ) {
            echo '<div><a class="zoom" href="' . esc_url(str_replace('-150x150','',$image)) . '" title=""><img src="' . esc_url(str_replace('-150x150','',$image)) . '" /></a></div>';
        }
    }
    ?>
    </div>
<?php }} ?>

<div class="md-padding p-b-4 m-b-2">
    <div class="container">
        <div class="row row-eq-height">
            <div class="col-md-4">
                <div class="heading style4">
                    <h3 class="uppercase"><i class="fa fa-info-circle"></i> <span class="main-color"><?php echo esc_html__('Project', 'octa') ?></span> <?php echo esc_html__('Info', 'octa') ?></h3>
                </div>
                <ul class="list lg-v-pad">
                    
                    <?php it_boo_cats(); ?>
                    
                    <?php if ( theme_option('singleprojectauthor_on') == "1" ) { ?>
                    <li>
                        <i class="fa fa-user"></i> <span class="bold main-color"><?php echo esc_html__('Added By:', 'octa') ?></span> <a href="<?php echo esc_url(get_author_posts_url( $Aid )); ?>"><?php echo esc_html(get_the_author_meta('display_name',$Aid)); ?></a>
                    </li>
                    <?php } ?>
                    
                    <?php if ( theme_option('singleprojectdate_on') == "1" ) { ?>
                    <li>
                        <i class="fa fa-calendar"></i> <span class="bold main-color"><?php echo esc_html__('Date Added:', 'octa') ?></span> <?php echo get_the_date('j M Y'); ?>
                    </li>
                    <?php } ?>
                    
                    <?php it_boo_tags(); ?>
                    
                    <?php if ( theme_option('singleprojectsocial_on') == "1" ) { ?>
                    <li class="share-post">
                        <div class="lbl-first"><i class="fa fa-share-alt"></i> <span class="bold main-color"><?php echo esc_html__('Share this post on:', 'octa') ?></span> </div>
                        <?php if ( class_exists( 'OCTA_Core' ) ) { ?>
                            <div class="social-list tbl m-auto" id="share_btns" data-easyshare data-easyshare-url="">
                                
                                <?php if ( theme_option('projectfb_on') == "1" ) { ?>
                                <a class="facebook" href="#" data-easyshare-button="facebook">
                                    <i class="filled ic-colored md-icon ic-facebook fa fa-facebook"></i>
                                    <span class="share_num" data-easyshare-button-count="facebook"></span>
                                </a>
                                <?php } ?>
                                
                                <?php if ( theme_option('projecttw_on') == "1" ) { ?>
                                <a class="twitter" href="#" data-easyshare-button="twitter" data-easyshare-tweet-text="">
                                    <i class="filled ic-colored md-icon ic-twitter fa fa-twitter"></i>
                                    <span class="share_num" data-easyshare-button-count="twitter"></span>
                                </a>
                                <?php } ?>
                                
                                <?php if ( theme_option('projectgplus_on') == "1" ) { ?>
                                <a class="googleplus" href="#" data-easyshare-button="google">
                                    <i class="filled ic-colored md-icon ic-google-plus fa fa-google-plus"></i>
                                    <span class="share_num" data-easyshare-button-count="google"></span>
                                </a>
                                <?php } ?>
                                
                                <?php if ( theme_option('projectln_on') == "1" ) { ?>
                                <a class="linkedin" href="#" data-easyshare-button="linkedin">
                                      <i class="filled ic-colored md-icon ic-linkedin fa fa-linkedin"></i>
                                      <span class="share_num" data-easyshare-button-count="linkedin"></span>
                                </a>
                                <?php } ?>
                                
                                <?php if ( theme_option('projectpin_on') == "1" ) { ?>
                                <a class="pinterest" href="#" data-easyshare-button="pinterest">
                                      <i class="filled ic-colored md-icon ic-pinterest fa fa-pinterest-p"></i>
                                      <span class="share_num" data-easyshare-button-count="pinterest"></span>
                                </a>
                                <?php } ?>
                                
                                <?php if ( theme_option('projectxing_on') == "1" ) { ?>
                                <a class="xing" href="#" data-easyshare-button="xing">
                                      <i class="filled ic-colored md-icon ic-xing fa fa-xing"></i>
                                      <span class="share_num" data-easyshare-button-count="xing"></span>
                                </a>
                                <?php } ?>
                                
                                <div data-easyshare-loader class="oc-preload"><i class="main-color icmon-spinner9"></i></div>
                            </div>
                        <?php
                        } else{
                            echo '<div class="p-a-3 t-center">'.esc_html__('Please Install octa Shortcodes Plugin to enable Social Sharing.', 'octa').'</div>';
                        }
                        ?>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-1">
                <div class="vertical-sep"></div>
            </div>
            <?php if ( theme_option('singleprojectcontent_on') == "1" ) { ?>
            <div class="col-md-7">
                <div class="heading style4">
                    <h3 class="uppercase"><i class="fa fa-desktop"></i> <span class="main-color"><?php echo esc_html__('Case', 'octa') ?></span> <?php echo esc_html__('Study', 'octa') ?></h3>
                </div> 
                <?php if ( theme_option('singleprojectimg_on') == "1" ) { ?>
                    
                        <?php if ( has_post_thumbnail() ){ ?>
                            <?php if ( function_exists( 'add_theme_support' ) ){ ?> 
                            <div class="full-img p-a-2 m-b-2 gry-bg text-center">
                            <a class="oc_zoom" href="<?php echo esc_url($url); ?>">
                                <?php the_post_thumbnail('full'); ?>
                            </a>
                        </div>
                        <?php } } ?>
                    
                <?php } ?>
                <?php gr_content(); ?>
            </div>
            <?php } ?>
            
        </div>
    </div>
</div>

<div class="container">
    <div class="divider dashed-sm m-t-0 m-b-0"><i class="fa fa-star-o center"></i></div>
</div>

<?php if($snum != '0'){ ?>
<div class="xs-padding p-b-4 m-b-4">
    <div class="container">
        <div class="heading style4 with-icon left">
            <h4 class="uppercase head_tag main-color"><?php echo esc_html__('Some', 'octa') ?> <span class="black"><?php echo esc_html__('ScreenShots', 'octa') ?></span></h4>
        </div>
        <div class="anim-imgs just-gallery" data-row-height="190">
            <?php foreach($coms as $key => $i){
                if(isset($options['screens'.$i])){
                    ?>
                    <a class="zoom_screens" href="<?php echo esc_url($options['screens'.$i][0]); ?>">
                        <img alt="" src="<?php echo esc_url($options['screens'.$i][0]); ?>">
                    </a>
                    <?php
                }    
            } ?>
        </div>
    </div>
</div>
<?php } ?>

<?php if($inum != '0'){ ?>
<div class="main-bg">
    <div class="row m-r-0 m-l-0 ics-row">
        <?php foreach($comi as $key => $i){ ?>
        
        <div class="sm-padding ic-cell">
            <div class="text-center font-40">
                <?php if(isset($options['icons_icon'.$i][0])){ ?>
                <div class="m-b-2 white"><i class="<?php echo esc_attr($options['icons_icon'.$i][0]) ?>"></i></div>
                <?php } ?>
                <?php if(isset($options['icons_value'.$i][0])){ ?>
                <span class="odometer" data-value="<?php echo esc_attr($options['icons_value'.$i][0]) ?>" data-timer="500"></span>
                <?php } ?>
                <?php if(isset($options['icons_title'.$i][0])){ ?>
                <h4 class="m-t-1 white"><?php echo esc_html($options['icons_title'.$i][0]) ?></h4>
                <?php } ?>
            </div>
        </div>
        
        <?php } ?>
    </div>
</div>
<?php } ?>
