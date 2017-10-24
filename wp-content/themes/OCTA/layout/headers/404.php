<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

$clas = 'top-head boxes fixed-head top head404';
$clas .= ' affix-top';
$clas .= ' dark';
?>

<header class="<?php echo esc_attr($clas) ?>">
    <div class="head-cont">
        <div class="container">
            <?php site_logo(); ?>
            
            <div class="site-nav pull-right">
                <?php it_select_menu(); ?>
                
                <?php if( theme_option("show_search") ){ ?>
                    <div class="top-search <?php echo esc_attr(theme_option('search_box_style')); ?> head-btn pull-left dropdown">
                        <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="pe-7s-search"></i></a>
                        <div class="search-box dropdown-menu">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                <?php } ?>
                
            </div>
            
        </div>
    </div>
</header>
