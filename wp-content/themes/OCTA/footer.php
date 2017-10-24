<?php if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' ); ?>

        </div>            
        <?php octa_footer(); ?>

        <?php if( theme_option('show_top') == 1 ){ ?>
            <a id="to-top" href="#"><span class="fa fa-angle-up"></span></a>
        <?php } ?>

        <span class="hidden oc-url"><?php echo esc_url(content_url()); ?></span>

        </div>
        <?php wp_footer(); ?>
    </body>
</html>