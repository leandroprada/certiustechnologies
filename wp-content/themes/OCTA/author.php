<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

get_header();
$cell = $bar = $mcont = $barstyle = '';
$curauth = $wp_query->get_queried_object(); 
$auth_info = theme_option('show_auth_info');
$auth_posts = theme_option('show_auth_posts');
$posts_style = theme_option('auth_posts_style');
$content_before = theme_option('auth_content_before');
$content_after = theme_option('auth_content_after');
$t_bar = theme_option('author_sidebar_style');
$col = '';
$lay = theme_option('author_sidebar');

if($lay == 'right' || $lay == 'left'){
    $col = '9';
    $mcont = ' main-content md-padding';
}else{
    $col = '12';
}
$barstyle = ' sidebar-'.$t_bar;
if ($lay == "left"){
    $cell = ' rit-cell';
    $bar = ' lft-cell';
}

get_template_part( 'layout/page-titles/title-author');
?>

<div class="container">
    <div class="row row-eq-height<?php echo esc_attr($bar).esc_attr($barstyle); ?>">
        
        <?php if ( $lay == 'left' ) { get_sidebar(); } ?>
        
        <div class="col-md-<?php echo esc_attr($col); ?><?php echo esc_attr($cell).esc_attr($mcont); ?>">
            
            <?php if($content_before != ''){ ?>
                <div class="m-b-3">
                    <?php echo wp_kses($content_before,it_allowed_tags()); ?>
                </div>
            <?php } ?>
            
            <?php if($auth_info == '1'){ ?>
                <div class="my-details clearfix">
                    <div class="pull-left my-img">
                        <?php echo get_avatar(get_the_author_meta('user_email', $curauth->post_author), 150); ?>
                    </div>
                    <div class="rit-details">
                        <ul class="list col-md-4">
                            <li><i class="fa fa-check"></i><b class="main-color"><?php echo esc_html__('Email: ','octa') ?></b> <?php echo esc_attr($curauth->user_email); ?></li>
                            <li><i class="fa fa-check"></i><b class="main-color"><?php echo esc_html__('Nice Name: ','octa') ?></b> <?php echo esc_attr($curauth->user_nicename); ?></li>
                            <li><i class="fa fa-check"></i><b class="main-color"><?php echo esc_html__('Website: ','octa') ?></b> <?php echo esc_attr($curauth->user_url); ?></li>
                        </ul>
                        <ul class="list col-md-4">
                            <li><i class="fa fa-check"></i><b class="main-color"><?php echo esc_html__('Registered On :','octa') ?></b> <?php echo esc_attr($curauth->user_registered); ?></li>
                            <li><i class="fa fa-check"></i><b class="main-color"><?php echo esc_html__('Logged in as: ','octa') ?></b> <?php echo esc_attr($curauth->user_login); ?></li>
                        </ul>
                    </div>
                </div>
                <?php if($curauth->description != ''){ ?>
                <div class="m-b-3 author-desc">
                    <?php echo esc_attr($curauth->description); ?>
                </div>
                <?php } ?>
            <?php } ?>
            
            <?php if($auth_posts == '1'){ ?> 
                <?php if ( have_posts() ) : ?>
                    <div class="m-t-3 heading style3 uppercase"><h4><span class="main-color"><?php echo esc_attr($curauth->first_name); ?> </span><?php echo esc_html__('Posts','octa') ?></h4></div>
                    <div class="blog-posts <?php echo esc_attr($posts_style) ?>" id="content">
                        <?php get_template_part( 'layout/blog/blog-'.$posts_style) ?>
                    </div>
                    <?php else: 
                    the_content;
                    endif; ?>
                <div class="clearfix"></div>
                <?php it_paging_nav(); ?>
            <?php } ?>
            
            <?php if($content_after != ''){ ?>
                <div class="m-t-3">
                    <?php echo wp_kses($content_after,it_allowed_tags()); ?>
                </div>
            <?php } ?>
            
        </div>
        
        <?php if ( $lay == 'right' ) { get_sidebar(); } ?>
        
    </div>
</div>
<?php get_footer(); ?>