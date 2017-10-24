<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

$tags = wp_get_post_tags($post->ID);
if ($tags) {
    $tag_ids = array();
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
    $args=array(
        'tag__in' => $tag_ids,
        'post__not_in' => array($post->ID),
        'showposts'=>8,
        'ignore_sticky_posts'=>1
    );
$my_query = new wp_query($args);
    if( $my_query->have_posts() ) {
        echo '<div class="related-posts"><h3>'.esc_html__('Related Posts', 'octa').'</h3><ul class="list">';
        while ($my_query->have_posts()) {
            $my_query->the_post();
    ?>
        <li><i class="pe-7s-pin main-color"></i><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php echo esc_html__('Permanent Link to', 'octa') ?><?php esc_attr(the_title_attribute()); ?>"><?php esc_html(the_title()); ?></a></li>
    <?php

}
echo '</ul></div>';
    }
    wp_reset_query();
}