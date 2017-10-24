<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

get_header();
$layout = $cell = $bar = $mcont = $barstyle ='';
$options = get_post_custom(get_the_ID());
$h_title = get_post_meta(c_page_ID(),'hide_page_title',true);
$m_bar = get_post_meta(c_page_ID(),'sidebar_style',true);
$t_bar = theme_option('page_sidebar_style');
if( isset($options['page_layout']) && $options['page_layout'][0] != 'theme'){
    $lay = $options['page_layout'][0];
}else{
    $lay = theme_option('page_sidebar');
}

if ($lay == "sidebar-left" || $lay == "sidebar-right" || $lay == "left" || $lay == "right" ) {
    $col = '9';
    $mcont = ' main-content';
}else{
    $col = '12';
}

if( $m_bar != '' && $m_bar != 'theme' ){
    $barstyle = ' sidebar-'.$m_bar;    
} else{
    $barstyle = ' sidebar-'.$t_bar;
}

if ($lay == "sidebar-left" || $lay == "left"){
    $cell = ' rit-cell';
    $bar = ' lft-cell';
}

// page title function.
if( $h_title != '1' ){
    it_title_style();    
}

if ($lay == "wide") { ?>
    
    <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
    <?php if ( '1' != theme_option( 'page_comments' )  && ( comments_open() || '0' != get_comments_number() ) ) { ?>
        <div class="site_content container p-b-3 m-b-3">
            <?php comments_template(); ?>
        </div>
    <?php } ?>
 
<?php } else if ($lay == "full_width") { ?>
    
    <div class="site_content full-width">
        <div class="container">
            <?php while ( have_posts() ) {
                the_post(); 
                the_content();
            } 
             
            if ( '1' != theme_option( 'page_comments' )  && ( comments_open() || '0' != get_comments_number() ) ) {
                comments_template( '', true );
            }    
            ?>
        </div>
    </div> 
       
<?php } else { ?>
    
    <div class="container">
        <div class="row-eq-height<?php echo esc_attr($bar).esc_attr($barstyle); ?>">
            <?php if ( $lay == 'left' || $lay == 'sidebar-left' ) {
                get_sidebar();
            } ?>
            <div class="col-md-<?php echo esc_attr($col); ?><?php echo esc_attr($cell).esc_attr($mcont); ?>">
                <?php while ( have_posts() ) : the_post(); the_content(); endwhile;
                if ( '1' != theme_option( 'page_comments' )  && ( comments_open() || '0' != get_comments_number() ) ) {
                    comments_template();
                } ?>  
            </div>
            <?php if ( $lay == 'right' || $lay == 'sidebar-right' ) {
                get_sidebar();
            } ?>
        </div>
    </div>
    
<?php } ?>

<?php get_footer(); ?>