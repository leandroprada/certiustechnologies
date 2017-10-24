<?php 
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

get_header();  

$h_title = get_post_meta(c_page_ID(),'hide_page_title',true);
$cell = $bar = $sb = $barstyle ='';
$sb = theme_option('sidebar_woo');
if ( is_singular( 'product' ) ) {
    $sbar = theme_option('show_sidebar_single_woo');
    $lay = theme_option('single_sidebar_position_woo');
    $m_bar = get_post_meta(c_page_ID(),'woo_sidebar_single_style',true);
    $t_bar = theme_option('woo_sidebar_single_style');
} else {
    $sbar = theme_option('show_sidebar_woo');
    $lay = theme_option('sidebar_position_woo');
    $m_bar = get_post_meta(c_page_ID(),'woo_sidebar_style',true);
    $t_bar = theme_option('woo_sidebar_style');
}
if ( $lay == "left" || $lay == "right" ) {
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

if( $m_bar != '' && $m_bar != 'theme' ){
    $barstyle = ' sidebar-'.$m_bar;    
} else{
    $barstyle = ' sidebar-'.$t_bar;
}

// page title function.
if( $h_title != '1' ){
    it_title_style();    
} 
?>

<div class="container">
    <div class="row oc-woo row-eq-height<?php echo esc_attr($bar).esc_attr($barstyle); ?>">
        
        <?php if ( is_singular( 'product' ) ) { ?>
        
            <?php if ( $sbar == "1" && $lay == 'left' ) {
                get_sidebar($sb);
            } ?> 
            
            <div class="col-md-<?php echo esc_attr($col); ?><?php echo esc_attr($cell).esc_attr($mcont); ?>">
                <?php woocommerce_content(); ?>
            </div>
            
            <?php if ( $sbar == "1" && $lay == 'right' ) {
                get_sidebar($sb);
            }
        
        }else{
        
            if ( $sbar == "1" && $lay == 'left' ) {
                get_sidebar($sb);
            } ?> 
            
            <div class="col-md-<?php echo esc_attr($col); ?><?php echo esc_attr($cell).esc_attr($mcont); ?>">
                <?php woocommerce_get_template( 'archive-product.php' ); ?>
            </div> 
            
            <?php if ( $sbar == "1" && $lay == 'right' ) {
                get_sidebar($sb);
            }
        
        } ?>
        
        
    </div>
</div>
 <div class="clearfix"></div>  
<?php

get_footer();