<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

function it_modify_breadcrumb_args() {
    $args['home_text'] = esc_html__('Home', 'octa');
    $args['root_text'] = 'Forums';
    $args['sep'] = ' / ';
    $args['before'] = '<div class="bbp-breadcrumb"><p><span class="bold">'.__('You Are In:', 'octa').'</span>';
    return $args;
}
add_filter( 'bbp_before_get_breadcrumb_parse_args', 'it_modify_breadcrumb_args' );

