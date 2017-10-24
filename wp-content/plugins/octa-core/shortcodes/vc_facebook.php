<?php 
function it_facebook_shortcode($atts, $content=null){
    global $allowedposttags;
    extract(shortcode_atts( array(
        'el_class'         => '',
        'facebook_user'    => '',
        'facebook_height'  => '350px',
        'facebook_width'   => '250px',
        'facebook_tabs'    => 'timeline',
        'fb_sm_header'     => '',
        'fb_adapt_width'   => '',
        'fb_hide_cover'    => '',
        'fb_friends'       => '',
    ), $atts));
    $class = $sm_hd = $ad_wid = $hid_cov = $frds = '';
    
    if( $el_class != '' ){ $class .= ' '.$el_class; }
    
    if( $fb_sm_header == 1 ){ $sm_hd = 'true'; }else{ $sm_hd = 'false'; }
    
    if( $fb_adapt_width == 1 ){ $ad_wid = 'true';$facebook_width = ''; }else{ $ad_wid = 'false'; }
    
    if( $fb_hide_cover == 1 ){ $hid_cov = 'true'; }else{ $hid_cov = 'false'; }
    
    if( $fb_friends == 1 ){ $frds = 'true'; }else{ $frds = 'false'; }
         
    $output = '<div class="facebook_wrap'.$class.'">';    
    
    $output .= '<div id="fb-root"></div>';
    
    $output .= '<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, "script", "facebook-jssdk"));
    </script>';
    
    $output .= '<div class="fb-page" data-href="'.$facebook_user.'" data-tabs="'.$facebook_tabs.'" data-width="'.$facebook_width.'" data-height="'.$facebook_height.'" data-small-header="'.$sm_hd.'" 
    data-adapt-container-width="'.$ad_wid.'" data-hide-cover="'.$hid_cov.'" data-show-facepile="'.$frds.'"><blockquote cite="'.$facebook_user.'" class="fb-xfbml-parse-ignore"><a href="'.$facebook_user.'">Facebook</a></blockquote></div>';
    
    $output .= '</div>';
                
    return $output; 
    
    
}
add_shortcode('it_facebook', 'it_facebook_shortcode');