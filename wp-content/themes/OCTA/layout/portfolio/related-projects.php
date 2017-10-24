<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
global $post;
$tags = get_the_terms( $post->id , 'oc-tags' );
$cats = get_the_terms( $post->id , 'oc-categories' );
$lay = theme_option("singleproject_layout");
$cl = '';
$hd = '';

if($lay == '1'){
    $cl = 'gry-bg';
    $hd = 'style2';
}else if($lay == '2'){
    $hd = 'style4';
}else if($lay == '3'){
    $hd = 'style2';
}
if ($tags) { 
?>

<div class="md-padding <?php echo esc_attr($cl); ?>">
    <div class="container">
        <div class="heading <?php echo esc_attr($hd); ?> with-icon left">
            <h4 class="uppercase head_tag main-color"><?php echo esc_html__('Related', 'octa') ?> <span class="black"><?php echo esc_html__('Projects', 'octa') ?></span></h4>
            <span class="head-ico"><i class="fa fa-desktop"></i></span>
        </div>
        <?php            
        $tag_ids = array();
        $cat_ids = array();
        if ($tags){foreach($tags as $s_tag) $tag_ids[] = $s_tag->name;}
        if ($cats){foreach($cats as $s_cat) $cat_ids[] = $s_cat->name;}
        
        $args=array(
            'post__not_in' => [get_queried_object_id()],
            'oc-tags' => $tag_ids,
            //'oc-categories' => $cat_ids,
            'post_type' => 'octapost',
            'posts_per_page' => 10,
            'orderby' => "date",
            'order' => "DESC",
            'update_post_term_cache' => false,
            'update_post_meta_cache' => false,
            'post_status' => 'publish',
            'ignore_sticky_posts' => true,
        );
        $my_query = new wp_query($args);
        
        if( $my_query->have_posts() ) { ?>
            <div id="octa_grid_related" class="octa_grid kara grid horizontal-slider" data-margins="15" data-num="-1" data-layout="slider" id="octa_grid_out" data-slidesnum="3" data-scamount="1" data-fade="" data-speed="500" data-arrows="1" data-infinite="1" data-dots="" data-auto="1">
                <?php
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                ?>
                <div class="portfolio-item" data-ratio-x="4" data-ratio-y="3">
                    <div class="port-container">
                        <div class="port-img">
                            <div class="icon-links">
                                <a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title_attribute()); ?>" class="oc_link white-bg"><i class="lineaico-uni18C"></i></a>
                                <a href="<?php echo esc_url($url); ?>" class="oc_zoom main-bg" title=""><i class="lineaico-uniE0B6"></i></a>
                            </div>
                            <?php if ( has_post_thumbnail() ){
                                if ( function_exists( 'add_theme_support' ) ) 
                                    the_post_thumbnail('blog-large-image');
                                }else {
                                    echo '<div class="media-cont">';
                                        echo post_media( get_the_content() );
                                    echo '</div>';
                                }
                            ?>                
                        </div>
                        <div class="port-captions">
                            <div class="port-inner-cell">
                                <h4>
                                    <a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a>
                                </h4>
                                <p class="description"><?php echo it_oc_category(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        <?php }else{ ?>     
            <div class="alert alert-warning text-center red"><?php echo esc_html__('No Related Projects were found.', 'octa') ?></div>
        <?php } ?>
    </div>
</div>
<?php
}