<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
?>
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" class="form-control" value="<?php echo esc_attr(get_search_query()); ?>" name="s" placeHolder="<?php echo esc_html__('Type And Hit Enter ...','octa') ?>" />
    <button type="submit" class="btn main-bg"><?php echo esc_html__('Search','octa') ?></button>
</form>