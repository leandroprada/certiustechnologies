<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' ); 
$title = wp_title( '', false, '' );
$it_page_title = it_custom_page_title();
$hide_breadcrumbs = get_post_meta(c_page_ID(),'hide_breadcrumbs',true); 
?>
<div class="page-title title-normal">
    <div class="container">
        <div class="title-container">
            <div class="in-page-title">
                <div class="title-headings">
                    <h3><span class="main-color"><?php echo esc_attr($wp_query->found_posts); ?></span> <?php echo esc_html__('Search results for', 'octa') ?></h3>
                    <h1 class="main-color"><?php echo esc_html($it_page_title); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
