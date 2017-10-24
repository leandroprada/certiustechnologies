<?php

/**
 * Search 
 *
 * @package bbPress
 * @subpackage Theme
 */
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
?>

<form role="search" method="get" id="bbp-search-form" action="<?php bbp_search_url(); ?>">
	<div class="top-srch-forum">
        <label class="screen-reader-text" for="bbp_search"><?php esc_html__( 'Search for:', 'octa' ); ?></label>
        <input type="hidden" name="action" value="bbp-search-request" />
        <button tabindex="<?php bbp_tab_index(); ?>" class="main-bg button" type="submit" id="bbp_search_submit"><?php echo esc_html__('Search', 'octa'); ?></button>
        <div class="bbp-srch-txt"><input tabindex="<?php bbp_tab_index(); ?>" type="text" value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" name="bbp_search" id="bbp_search" /></div>
	</div>
</form>
