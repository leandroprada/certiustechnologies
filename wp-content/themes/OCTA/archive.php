<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

get_header();
$mcont = $cell = $bar = $barstyle = $col = ''; 
$blogstyle = theme_option('blogstyle');
$m_bar = get_post_meta(c_page_ID(),'archive_sidebar_style',true);
$t_bar = theme_option('archive_sidebar_style');
$lay = theme_option('archive_sidebar');

if($lay == 'right' || $lay == 'left'){
    $col = '9';
    $mcont = ' main-content';
}else{
    $col = '12';
}
if ($lay == "left"){
    $cell = ' rit-cell';
    $bar = ' lft-cell';
}
if( $m_bar != '' && $m_bar != 'theme' ){
    $barstyle = ' sidebar-'.$m_bar;    
} else{
    $barstyle = ' sidebar-'.$t_bar;
}
get_template_part( 'layout/page-titles/title-archive');
?>
        
<div class="container">
    <div class="row row-eq-height<?php echo esc_attr($bar).esc_attr($barstyle); ?>">
        <?php if( get_post_type() == 'octapost' ) {
                get_template_part( 'layout/portfolio/portfolio-large' );
            } else {
                
                if ( $lay == 'left' ) { get_sidebar(); } ?>
                
                <div class="col-md-<?php echo esc_attr($col); ?><?php echo esc_attr($cell).esc_attr($mcont) ?>">
                    <?php if ( have_posts() ) { ?>
                        <div class="blog-posts <?php echo esc_attr($blogstyle) ?>" id="content">
                            <?php get_template_part( 'layout/blog/blog-'.$blogstyle) ?> 
                        </div>
                    <?php }else{ 
                        get_template_part( 'post-formats/content', 'none' );
                    } ?>
                    <div class="clearfix"></div>
                    <?php it_paging_nav(); ?>
                </div>
                
                <?php if ( $lay == 'right' ) { get_sidebar(); }
                
            } ?>
    </div>      
</div>

<?php
get_footer();
