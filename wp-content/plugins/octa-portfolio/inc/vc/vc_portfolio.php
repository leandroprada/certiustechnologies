<?php
function oc_portfolio_shortcode($atts, $content=null){

    extract(shortcode_atts( array(
        'title'   => '',
        'alias'   => '',
    ), $atts));
    
    $output = '';
    $output .= '['.PLUGIN_PFX.' alias="'.$alias.'"]';
    
    return $output; 
 
}
add_shortcode('oc_portfolio', 'oc_portfolio_shortcode');