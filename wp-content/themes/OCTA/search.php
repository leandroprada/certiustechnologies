<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

get_header(); 
$mcont = $bar = $barstyle = '';
$lay = theme_option('search_sidebar');
$col = '12';
if ($lay == "left" || $lay == "right" ) {
    $col = '9';
    $mcont = ' main-content';
}
if ($lay == "left"){
    $bar = ' lft-cell';
}    
$t_bar = theme_option('search_sidebar_style');
$barstyle = ' sidebar-'.$t_bar; 
 
// page title function.
it_title_style();
?>

<div class="container">
    <div class="row row-eq-height<?php echo esc_attr($bar).esc_attr($barstyle); ?>"> 
        
        <?php if ( $lay == 'left' ) { get_sidebar(); } ?>
        
        <div class="col-md-<?php echo esc_attr($col).esc_attr($mcont); ?>">
                <?php if (have_posts()) { ?>

                    <?php while (have_posts()) { 
                        the_post(); ?>

                        <div class="srch_item" id="post-<?php the_ID(); ?>">
                            <div class="post-info main-color">
                                <?php if( get_post_format() == 'link' ){ ?>
                                    <?php
                                     $title_format  = post_format_link( get_the_content(), get_the_title() );
                                      $it_title   = $title_format['title'];
                                      $it_link = getUrl( $it_title );
                                      echo esc_html($it_title);
                                    ?>
                                <?php }else{ ?>
                                    <h5><a class="main-color" href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php echo esc_html__('Permanent Link to','octa') ?> <?php esc_html(the_title_attribute()); ?>"><?php esc_html(the_title()); ?></a></h5>
                                <?php } ?>
                            </div>
                            
                            <?php echo get_content_format(); ?> 
                            
                            <ul class="post-meta">
                                <?php it_post_meta(); ?>
                            </ul>
                                                           
                        </div>
                        
                    <?php } ?>

                    <div class="clearfix"></div>
                    
                    <?php it_paging_nav(); ?>

                <?php } else { ?>

                    <div class="no-results not-found">
                        <div class="text-center margin-bottom-40">
                            <div class="err-noresults"><i class="fa fa-frown-o"></i></div>
                            <span class="main-color bold font-40"><?php echo esc_html__('OOOPS!','octa') ?></span><br>
                            <span class="pg-nt-fnd"><?php echo esc_html__('The Page You Are Looking for can not Be Found.','octa') ?></span>
                        </div>
                        
                        <p class="text-center"><?php echo esc_html__('You can use the form below to search for what you need.','octa') ?></p>
                                    
                        <div class="not-found-form">
                            <?php get_search_form(); ?>
                        </div>
                        
                    </div>

                <?php } ?>

                </div> <!-- /content -->

        <?php if ( $lay == 'right' ) { get_sidebar(); } ?>
        
    </div>
</div>

<?php get_footer(); ?>
