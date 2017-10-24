<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

get_header(); 
$layout = $cell = $fl = $mcont = $barstyle = $bar ='';
$blogstyle = theme_option('blogstyle'); 
$options = get_post_custom(get_the_ID());
$h_title = get_post_meta(c_page_ID(),'hide_page_title',true);
$t_bar = theme_option('blog_sidebar_style');
if( isset($options['page_layout']) && $options['page_layout'][0] != 'theme'){
    $lay = $options['page_layout'][0];
}else{
    $lay = theme_option('blog_sidebar');
}

if ($lay == "sidebar-left" || $lay == "sidebar-right" || $lay == "left" || $lay == "right" ) {
    $col = '9';
}else{
    $col = '12';
    if($blogstyle == 'timeline'){
        $fl = ' full';
    }
}

$barstyle = ' sidebar-'.$t_bar;

if ($lay == "sidebar-left" || $lay == "left"){
    $cell = ' rit-cell';
    $bar = ' lft-cell';
}

// page title function.
if( $h_title != '1' ){  
    it_title_style();            
}
?>
<div class="container">
    <div class="row row-eq-height<?php echo esc_attr($bar).esc_attr($barstyle); ?>"> 
        
        <?php if ( $lay == 'left' || $lay == 'sidebar-left' ) { get_sidebar(); } ?>
        
        <div class="main-content col-md-<?php echo esc_attr($col); ?><?php echo esc_attr($cell) ?>">
            <?php if ( have_posts() ) { ?>
                <div class="blog-posts <?php echo esc_attr($blogstyle).esc_attr($fl) ?>" id="content">
                    <?php get_template_part( 'layout/blog/blog-'.$blogstyle) ?> 
                </div>
            <?php } else { 
                get_template_part( 'post-formats/content', 'none' );
            } ?>
            
            <div class="clearfix"></div>
            <?php it_paging_nav(); ?>
        </div>
        
        <?php if ( $lay == 'right' || $lay == 'sidebar-right' ) { get_sidebar(); } ?>
        
    </div>
</div>
<?php get_footer(); ?>
