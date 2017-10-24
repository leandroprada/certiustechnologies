<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$gallery = get_post_gallery();
$content = strip_shortcode_gallery( get_the_content() );                                        
$content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) );
$curauth = $wp_query->get_queried_object();
$first_name = get_the_author_meta( 'first_name', $post->post_author );
$last_name = get_the_author_meta( 'last_name', $post->post_author );
if ( ! empty( $first_name ) || ! empty( $last_name ) ){
    $display_name = $first_name . ' ' . $last_name;    
}else{
    $display_name = get_the_author_meta( 'display_name', $post->post_author );
}

$user_description = get_the_author_meta( 'user_description', $post->post_author );
$user_url = get_author_posts_url( get_the_author_meta( 'ID' ) );

if( theme_option('singlepostimg_on') == "1" ) {
    if ( get_post_gallery() ){
        echo post_media( get_the_content() );
    }else if ( has_post_thumbnail() ){
        it_post_thumbnail();
    } 
}

if ( is_single()){ ?>
    <div class="post-info-container">            
        <div class="post-info">                
            <?php if ( theme_option('single_title_on') == "1" ) { ?>
                <?php if( get_post_format() == 'link' ){ ?>
                    <?php
                     $title_format  = post_format_link( get_the_content(), get_the_title() );
                      $it_title   = $title_format['title'];
                      $it_link = getUrl( $it_title );
                      echo esc_html($it_title);
                    ?>
                <?php }else{ ?>
                    <!--<h2><?php the_title(); ?></h2>-->
                <?php } ?>
            <?php } ?>
            
            <ul class="post-meta">
                <?php it_post_meta_single(); ?>
            </ul>
        </div>
        
    </div>
    <?php if ( theme_option('singlecontent_on') == "1" ) { ?>
        <?php if ( ! is_single() && ( is_search() || has_excerpt() ) ) { ?>
            <div class="entry-summary"><?php the_excerpt(); ?></div>
        <?php }else{ ?>
            <div class="entry-content">
                <?php echo the_content(); ?>
            </div>
        <?php }
    }
    ?>
    <div class="post-tools">
    <?php    
    if ( theme_option('singletags_on') == "1" ) {
        $posttags = get_the_tags();
        if ($posttags){
        ?>
        <div class="post-tags"><span class="tgs-hint"><i class="fa fa-tags main-color"></i><?php echo esc_html__('Tags:', 'octa') ?></span><span class="tgs"><?php the_tags(); ?></span></div>
        <?php 
        }
    }
    if ( theme_option('singlesocial_on') == "1" ) {
    ?>
    <div class="share-post"> 
        <div class="pull-left"><i class="ico fa fa-share main-color"></i><?php echo esc_html__('Share this post on:', 'octa') ?></div>
        <?php if ( class_exists( 'OCTA_Core' ) ) { ?>
            <div class="social-list pull-right" id="share_btns" data-easyshare data-easyshare-url="">
                    
                <?php if ( theme_option('fb_on') == "1" ) { ?>
                <a class="facebook" href="#" data-easyshare-button="facebook">
                    <i class="filled ic-colored md-icon ic-facebook fa fa-facebook"></i>
                    <span class="share_num" data-easyshare-button-count="facebook"></span>
                </a>
                <?php } ?>
                
                <?php if ( theme_option('tw_on') == "1" ) { ?>
                <a class="twitter" href="#" data-easyshare-button="twitter" data-easyshare-tweet-text="">
                    <i class="filled ic-colored md-icon ic-twitter fa fa-twitter"></i>
                    <span class="share_num" data-easyshare-button-count="twitter"></span>
                </a>
                <?php } ?>
                
                <?php if ( theme_option('gplus_on') == "1" ) { ?>
                <a class="googleplus" href="#" data-easyshare-button="google">
                    <i class="filled ic-colored md-icon ic-google-plus fa fa-google-plus"></i>
                    <span class="share_num" data-easyshare-button-count="google"></span>
                </a>
                <?php } ?>
                
                <?php if ( theme_option('ln_on') == "1" ) { ?>
                <a class="linkedin" href="#" data-easyshare-button="linkedin">
                      <i class="filled ic-colored md-icon ic-linkedin fa fa-linkedin"></i>
                      <span class="share_num" data-easyshare-button-count="linkedin"></span>
                </a>
                <?php } ?>
                
                <?php if ( theme_option('pin_on') == "1" ) { ?>
                <a class="pinterest" href="#" data-easyshare-button="pinterest">
                      <i class="filled ic-colored md-icon ic-pinterest fa fa-pinterest-p"></i>
                      <span class="share_num" data-easyshare-button-count="pinterest"></span>
                </a>
                <?php } ?>
                
                <?php if ( theme_option('xing_on') == "1" ) { ?>
                <a class="xing" href="#" data-easyshare-button="xing">
                      <i class="filled ic-colored md-icon ic-xing fa fa-xing"></i>
                      <span class="share_num" data-easyshare-button-count="xing"></span>
                </a>
                <?php } ?>
                
                <div data-easyshare-loader class="oc-preload"><i class="main-color icmon-spinner9"></i></div>
            </div>
        <?php
        } else{
            echo '<div class="p-a-3 text-center">'.esc_html__('Please Install octa Shortcodes Plugin to enable Social Sharing.', 'octa').'</div>';
        }
        ?>
    </div>
    <?php
    }
    if (get_next_post() || get_previous_post()) { ?>
    <nav class="nav-single over-hidden">
        <span class="nav-previous pull-left"><?php previous_post_link( '%link', '<span class="meta-nav">' . esc_html__( '&larr; Previous post', 'octa' ) . '</span><span class="nav-block main-color">%title</span>' ); ?></span>
        <span class="nav-next pull-right"><?php next_post_link( '%link', '<span class="meta-nav">' . esc_html__( 'Next post &rarr;', 'octa' ) . '</span><span class="nav-block main-color">%title</span>' ); ?></span>
    </nav>
    <?php }
    if ( theme_option('singleauthorbox_on') == "1" && $user_description !='' ) {
    ?>
    <div class="author-info gry-bg p-a-3">
        <div class="author-avatar">
            <a href="<?php echo esc_url($user_url); ?>" rel="author">
                <?php echo get_avatar( get_the_author_meta('user_email') , 150 ); ?>
            </a>
        </div>
        <h5 class="author-name"><a href="<?php echo esc_url($user_url); ?>" rel="author"><?php echo esc_html($display_name); ?></a></h5>
        <div class="author-description">
            <?php echo esc_html($user_description); ?>
        </div>
    </div>
    <?php } ?>
    </div>
    <?php
}
          
