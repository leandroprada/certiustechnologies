<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
?>
<section class="padding-vertical-30 not-found clearfix">
    <div class="lg-not-found pull-left"><?php echo esc_html__('404', 'octa') ?><i></i></div>
    <div class="ops">
        <span class="main-color bold font-50"><?php echo esc_html__('OOOPS!', 'octa') ?></span><br>
        <span class="pg-nt-fnd"><?php echo esc_html__('The Page You Are Looking for can not Be Found.', 'octa') ?></span>
    </div>

        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p class="text-center"><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'octa' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

        <?php elseif ( is_search() ) : ?>

            <p class="text-center"><?php esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'octa' ); ?></p>
            <div class="not-found-form">
                <?php get_search_form(); ?>
            </div>

        <?php else : ?>

            <p class="text-center"><?php esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'octa' ); ?></p>
            <div class="not-found-form">
                <?php get_search_form(); ?>
            </div>

        <?php endif; ?>
    <!-- .page-content -->
</section><!-- .no-results -->
