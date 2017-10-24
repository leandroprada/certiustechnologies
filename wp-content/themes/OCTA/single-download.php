<?php 
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

get_header();
$mcont = $cell = $bar = $barstyle = $col = '';
$sh_bar = theme_option('show_sidebar_edd');
$ed_bar = theme_option('sidebar_position_edd');
if($sh_bar == '1' && ($ed_bar == 'right' || $ed_bar == 'left') ){
    $col = '9';
    $mcont = ' main-content';
}else{
    $col = '12 md-padding';
}
if ($ed_bar == "left"){
    $cell = ' rit-cell';
    $bar = ' lft-cell';
}
$m_bar = get_post_meta(c_page_ID(),'edd_sidebar_style',true);
$t_bar = theme_option('edd_sidebar_style');

if( $m_bar != '' && $m_bar != 'theme' ){
    $barstyle = ' sidebar-'.$m_bar;    
} else{
    $barstyle = ' sidebar-'.$t_bar;
} 
// page title function.
it_title_style();
?>  
<div class="container">
        <div class="row row-eq-height<?php echo esc_attr($bar).esc_attr($barstyle); ?>">
            
            <?php if ( $sh_bar == 1 && $ed_bar == "left" ) { get_sidebar(); } ?>
            
            <div class="col-md-<?php echo esc_attr($col); ?><?php echo esc_attr($cell).esc_attr($mcont) ?>">
                <?php while ( have_posts() ) : the_post(); ?>
				    <?php get_template_part( 'layout/post-formats/content-download' ); ?>
                    <?php comments_template( '', true ); ?>
			    <?php endwhile; ?>
            </div>
            
            <?php if ( $sh_bar == 1 && $ed_bar == "right" ) { get_sidebar(); } ?>
            
        </div>
    </div>
<?php
if ( theme_option('singlerelated_on') == "1" ){
    locate_template( 'layout/blog/related-posts.php','related');
}
?>
<?php get_footer(); ?>
