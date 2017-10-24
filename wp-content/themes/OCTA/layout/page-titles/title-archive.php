<?php 
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
$title = wp_title( '', false, '' ); 
$br_style = theme_option( 'breadcrumbs_style' );
$hide_breadcrumbs = get_post_meta(c_page_ID(),'hide_breadcrumbs',true);
?>
<div class="page-title title-normal">
    <div class="container">
        <div class="title-container">
            <div class="in-page-title">
                <div class="title-headings">
                    <h1>
                        <?php if ( is_day() ) {
                                printf( esc_html__( '%s', 'octa' ), get_the_date() );
                            } elseif ( is_month() ) {
                                printf( esc_html__( '%s', 'octa' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'octa' ) ) );
                            } elseif ( is_year() ) {
                                printf( esc_html__( '%s', 'octa' ), get_the_date( _x( 'Y', 'yearly archives date format', 'octa' ) ) );
                            } else {
                                echo single_cat_title( '', false );
                            } ?>
                    </h1>
                    <h3><?php echo esc_html__('Category Archives', 'octa') ?></h3>
                </div>
                
                <?php if( $br_style == 'style3' || $br_style == 'minimal' ){ site_breadcrumbs(); } ?>
                
            </div>
        </div>
    </div>
</div>

<?php 
if( $br_style == '' || $br_style == 'style2' ){
    site_breadcrumbs();
}

