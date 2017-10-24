<?php 
function it_twitter_shortcode($atts, $content=null){
    global $allowedposttags;
    extract(shortcode_atts( array(
        'el_class'      => '',
        'twit_user'     => '',
        'twit_height'   => '',
        'is_slider'     => '1',
        'v_slides'      => '1',
        'v_scroll'      => '1'
    ), $atts));
    
    $attrs = $is_sl = $d_hit = $t_slides = $t_scrolls = '';
    $t_slides = " data-slidesnum='$v_slides'";
    $t_scrolls = " data-scamount='$v_scroll'";
    
    if($is_slider == '1'){
        $attrs = $t_slides.$t_scrolls;
        $is_sl = ' tw_slider';    
    }else{
        if($twit_height != ''){
            $d_hit = ' data-height="'.esc_attr($twit_height).'"';    
        }
    }     
    $output = '<div class="tweeter_wrap'.$is_sl.' '.$el_class.'"'.$d_hit.'>';
        $output .= '<div class="tw_shortcode"'.$attrs.'></div>';
        $output .= '<a class="twitter-timeline" href="https://twitter.com/'.esc_js($twit_user).'"></a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>';          
    $output .= '</div>';            
    return $output; 
    
    
}
add_shortcode('it_twitter', 'it_twitter_shortcode');