<?php 
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

get_header();
$lay = theme_option("singleproject_layout");
$options = get_post_custom(get_the_ID());
$cust_title = get_post_meta(c_page_ID(),'chck_custom_title',true);
$h_title = get_post_meta(c_page_ID(),'hide_page_title',true);

if(!empty($options['portfolio_layout'][0])){
    $lay = $options['portfolio_layout'][0];
}
function gr_content (){
    while ( have_posts() ) : the_post();
        $content = strip_shortcode_gallery( get_the_content() );                                        
        $content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) );
        echo $content;
    endwhile;  
}
 

if( $cust_title == '' || ($cust_title == '1' && $h_title != '1') ){
    it_title_style();    
}
    
locate_template( 'layout/portfolio/portfolio-'.$lay.'.php','related');

if ( theme_option('singleprojectrelated_on') == "1" ) {
    locate_template( 'layout/portfolio/related-projects.php','related'); 
} 

get_footer(); ?>