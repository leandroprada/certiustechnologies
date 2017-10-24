<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
 
get_header();

$col = $cell = $mcont = $bar = $lay = $barstyle = '';
$options = get_post_custom(get_the_ID());
$cust_title = get_post_meta(c_page_ID(),'chck_custom_title',true);
$h_title = get_post_meta(c_page_ID(),'hide_page_title',true);
$m_bar = get_post_meta(c_page_ID(),'blog_single_sidebar_style',true);
$t_bar = theme_option('blog_single_sidebar_style');
if( isset($options['page_layout']) && $options['page_layout'][0] != 'theme'){
    $lay = $options['page_layout'][0];    
}else{
    $lay = theme_option('blog_single_sidebar');
}

if ($lay == "sidebar-left" || $lay == "sidebar-right" || $lay == "left" || $lay == "right" ) {
    $col = '9';
    $mcont = ' main-content';
}else{
    $col = '12 md-padding';
}

if ($lay == "sidebar-left" || $lay == "left"){
    $cell = ' rit-cell';
    $bar = ' lft-cell';
}
if( $m_bar != '' && $m_bar != 'theme' ){
    $barstyle = ' sidebar-'.$m_bar;    
} else{
    $barstyle = ' sidebar-'.$t_bar;
}

// page title function.
if( $h_title != '1' ){ it_title_style(); }

?>
 
<div class="container">
    <div class="row row-eq-height<?php echo esc_attr($bar).esc_attr($barstyle); ?>">
        
        <?php if ( $lay == 'left' || $lay == 'sidebar-left' ) { get_sidebar(); } ?>
                    
        <div class="col-md-<?php echo esc_attr($col); ?><?php echo esc_attr($cell).esc_attr($mcont) ?>">
            <div class="blog-single">
			    <article class="post-content">
                    <div class="post-item">
                        <?php while ( have_posts() ) : the_post(); ?>
				            <?php get_template_part( 'layout/post-formats/content', get_post_format() );
                            wpb_set_post_views(get_the_ID());
                            wpb_get_post_views(get_the_ID());
                            if ( theme_option('singlerelated_on') == "1" ){
                                locate_template( 'layout/blog/related-posts.php','related');
                            }
                            
                            if ( theme_option( 'singlecomment_on' ) ) {
                                comments_template();
                            }
			            endwhile; ?>
                    </div>
                </article>
            </div>
        </div>
        
        <?php if ( $lay == 'right' || $lay == 'sidebar-right' ) { get_sidebar(); } ?>
        
    </div>
</div>
<?php get_footer(); ?>
