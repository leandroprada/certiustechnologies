<?php 
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

get_header();
$cell = $bar = $mcont = $barstyle = '';
$sbar = theme_option('show_sidebar_bp');
$lay = theme_option('sidebar_position_bp');

if ( $sbar == '1' && ( $lay == "left" || $lay == "right" ) ) {
    $col = '9';
    $mcont = ' main-content';
}else{
    $col = '12 md-padding';
}

if ($lay == "sidebar-left" || $lay == "left"){
    $cell = ' rit-cell';
}

if ( $sbar == "1" && $lay == 'left' ) {
    $bar = ' lft-cell';
}
$m_bar = get_post_meta(c_page_ID(),'bp_sidebar_style',true);
$t_bar = theme_option('bp_sidebar_style');

if( $m_bar != '' && $m_bar != 'theme' ){
    $barstyle = ' sidebar-'.$m_bar;    
} else{
    $barstyle = ' sidebar-'.$t_bar;
}
it_title_style();
?>
     
<div class="container">
    <div class="row row-eq-height<?php echo esc_attr($bar).esc_attr($barstyle); ?>">
        
        <?php if ( $sbar == "1" && $lay == 'left' ) { it_sidebar(); } ?>
        
        <div class="col-md-<?php echo esc_attr($col); ?><?php echo esc_attr($cell).esc_attr($mcont); ?>">
            <?php while ( have_posts() ) : the_post();
                the_content();
            endwhile; ?>
        </div>
        
        <?php if ( $sbar == "1" && $lay == 'right' ) { it_sidebar(); } ?>
        
    </div>
</div>

<?php get_footer(); ?>