<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<div class="col-md-4 single-product">
    <div class="product-img">
        <?php 
        if ( has_post_thumbnail() ){
            if ( function_exists( 'add_theme_support' ) ) ?> 
                    <?php the_post_thumbnail( 'full', array( 'id' => 'img_pro' ) ); ?>
                <?php
             }
        ?>

    </div>
</div>

<div class="col-md-8 pro-blocks">
    <div class="product-block"><i class="fa fa-clock-o"></i><?php echo esc_html__('Published on:','octa') ?> <?php echo get_the_date(); ?></div>
    <div class="product-block"><i class="fa fa-user"></i><?php echo esc_html__('By:', 'octa') ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php esc_html(the_author_meta( 'display_name' )); ?></a></div>
    <div class="product-block"><i class="fa fa-folder-open"></i><?php the_terms( $post->ID, 'download_category', esc_html__('Categories: ', 'octa'), ', ', '' ); ?></div>
    <div class="product-block"><i class="fa fa-comments"></i><?php comments_popup_link( 'Leave a Comment', '1 Comment', '% Comments' ); ?></div>
    <div class="product-block"><?php edit_post_link( '<i class="fa fa-edit"></i>'.esc_html__( 'Edit', 'octa' ) ); ?></div>
    <div class="product-block"><i class="fa fa-tags"></i><?php the_terms( $post->ID, 'download_tag', 'Tags: ', ', ', '' ); ?></div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 m-t-2">
    <div class="edd-content">
        <?php if ( theme_option('singlecontent_on') == "1" ) : ?>
            <?php the_content(); ?>
        <?php endif; ?>
    </div>
</div>


    
