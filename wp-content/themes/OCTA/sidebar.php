<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

global $woocommerce; 
$woo = $is_cart = $is_chk = $bbp = $buddy = $lay = $sb = '';
if(function_exists('is_woocommerce') && is_woocommerce()) $woo = 'is_woocommerce';
if(function_exists('is_cart') && is_cart()) $is_cart = 'is_cart';
if(function_exists('is_checkout') && is_checkout()) $is_chk = 'is_checkout';
if(function_exists('is_bbpress') && is_bbpress()) $bbp = 'is_bbpress';
if(function_exists('is_buddypress') && is_buddypress()) $buddy = 'is_buddypress';
$options = get_post_custom(get_the_ID());
$sb = theme_option('sidebar_woo');
$bb_br = theme_option('sidebar_bb');
$bp_br = theme_option('sidebar_bp');
$ed_br = theme_option('sidebar_edd');
$ev_br = theme_option('sidebar_ev');
$post_type = get_post_type();

if($woo || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) || is_singular( 'product' ) || $is_cart || $is_chk){ ?>
<div class="md-padding sidebar col-md-3">
    <div class="sidebar_widgets">
        <?php dynamic_sidebar( $sb ); ?>
    </div>
</div>
<?php } else if( $bbp ) { ?>
<div class="md-padding sidebar col-md-3">
    <div class="sidebar_widgets">
        <?php dynamic_sidebar( $bb_br ); ?>
    </div>
</div>
<?php } else if( $buddy ) { ?>
<div class="md-padding sidebar col-md-3">
    <div class="sidebar_widgets">
        <?php dynamic_sidebar( $bp_br ); ?>
    </div>
</div>
<?php } else if ( class_exists( 'Tribe__Events__Main' ) ) { ?>
<div class="md-padding sidebar col-md-3">
    <div class="sidebar_widgets">
        <?php dynamic_sidebar( $ev_br ); ?>
    </div>
</div>
<?php } else if( $post_type =='download' ) { ?>
<div class="md-padding sidebar col-md-3">
    <div class="sidebar_widgets">
        <?php dynamic_sidebar( $ed_br ); ?>
    </div>
</div>
<?php } else { ?>
<div class="md-padding sidebar col-md-3">
    <div class="sidebar_widgets">
        <?php 
        $options = get_post_custom(get_the_ID());
        if(isset($options['custom_sidebar'])){
            $sidebar_choice = $options['custom_sidebar'][0];
        }
        else{
            $sidebar_choice = "default";
        }
        if($sidebar_choice && $sidebar_choice != "default"){
            dynamic_sidebar($sidebar_choice);
        }
        else{
            if(is_active_sidebar('sidebar-2')){
                dynamic_sidebar('sidebar-2');
            } else{
                dynamic_sidebar('sidebar-1');
            }
        }
        ?>
    </div>
</div>
<?php } ?>






