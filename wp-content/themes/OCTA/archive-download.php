<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

get_header(); 

global $paged;

$mcont = $cell = $bar = $col = $barstyle = '';
$sh_bar = theme_option('show_sidebar_edd');
$ed_bar = theme_option('sidebar_position_edd');
$cols = theme_option('columns_edd');
$pages_edd = theme_option('pages_edd') ? theme_option('pages_edd') : '10';

if($sh_bar == '1' && ( $ed_bar == 'right' || $ed_bar == 'left' ) ){
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

$args = array(
    'posts_per_page' => $pages_edd,
    'post_type' => 'download',
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_status' => 'publish',
    'paged' => $paged,
); 
$q = new WP_Query( $args );
?>

<div class="container">
    <div class="row row-eq-height<?php echo esc_attr($bar).esc_attr($barstyle); ?>">
	
        <?php if ( $sh_bar == 1 && $ed_bar == "left" ) { get_sidebar(); } ?>
        
        <div class="col-md-<?php echo esc_attr($col); ?><?php echo esc_attr($cell).esc_attr($mcont) ?>">
            
            <?php if ($q->have_posts()) { $i = 1; ?>
	           
               <div class="downloads-list">
		        <?php while ($q->have_posts()) { $q->the_post(); ?>

			        <div class="col-md-<?php echo esc_attr($cols); ?> down-item shop-item">
				        <div class="item-box">
                            <a class="pro zooms" href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-link"></i></a>
                            <div class="item-img">
                                <a href="<?php esc_url(the_permalink()); ?>">
                                    <?php the_post_thumbnail('product-image'); ?>
                                </a>
                            </div>
                            <h3 class="item-title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
                            <div class="item-details">
                                <p><?php echo get_content_format() ?></p>
                                <div class="item-bottom down text-center">
                            
                                    <?php if(function_exists('edd_price')) { ?>
                                        <div class="">
                                            <?php if(function_exists('edd_price')) {
                                                if(edd_has_variable_prices(get_the_ID())) {
                                                    echo esc_html__('Starting at: ','octa'); edd_price(get_the_ID());
                                                } else { ?>
                                                    <div class="item-price">
                                                        <?php edd_price(get_the_ID()); ?>
                                                    </div> 
                                                <?php }
                                            } ?>
                                        </div>
                                            
                                        <div>
                                            <?php if(!edd_has_variable_prices(get_the_ID())) { echo esc_url(edd_get_purchase_link(get_the_ID(), esc_html__('Add to Cart','octa'), 'button')); } ?>
                                        </div>
                                    <?php } ?>
                                
                                </div>
                            </div>

                        </div>
                    </div>
			        <?php 
                    $i+=1;
                } ?>
		        </div>
                
                <div class="clearfix"></div>
                
		        <?php edd_paging();
                
	        } else { ?>
	            
                <div class="not-found">
                    <h2 class="hint"><?php echo esc_html__('Sorry!!! Not Downloads Found','octa'); ?></h2>
                    <hr class="hr-style3">
                    <p><?php echo esc_html__('Seems you are looking for something that is not here.','octa'); ?></p>
                    <hr class="hr-style3">
                    <div class="not-found-form no-downs m-b-3 m-t-1"><?php get_search_form(); ?></div>
                    <a class="btn btn-large main-bg" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__('Back To Home Page','octa'); ?></a>        
                </div>
            
	        <?php } ?>
	    </div>
        
        <?php if ( $sh_bar == 1 && $ed_bar == "right" ) { get_sidebar(); } ?>	
            					
	</div>
</div>		

<?php get_footer(); ?>
