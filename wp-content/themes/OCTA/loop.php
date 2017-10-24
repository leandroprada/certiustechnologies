<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
    <?php get_template_part( 'layout/blog/blog-'.theme_option("blogstyle")); ?>
</div>