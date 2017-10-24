<?php 
function it_gmap_shortcode($atts, $content=null){
    global $allowedposttags;
    extract(shortcode_atts( array(
        'no_scroll'        => '',
        'el_class'         => '',
        'gmap_zoom'        => '12',
        'gmap_type'        => 'ROADMAP',
        'gmap_icon'        => get_template_directory_uri().'/assets/images/gmap_pin.png',
        'gmap_latitude'    => '',
        'gmap_longitude'   => '',
        'gmap_address'     => '',
        'gmap_html'        => '',
        'gmap_key'         => '',
        'gmap_height'      => '400px'
    ), $atts));
    $hit = '';
    wp_enqueue_script( 'google-maps-api', '//maps.google.com/maps/api/js?key=' . sanitize_text_field( $gmap_key ),null,null,false );
    //wp_enqueue_script( 'google-maps', get_template_directory_uri().'/assets/js/jquery.gmap.js',null,null,false );
    
    wp_print_scripts( 'google-maps-api' );
    wp_print_scripts( 'google-maps' );
    
    $gmap_scroll = 'false';
    if($no_scroll != '1'){
        $gmap_scroll = 'true';
    }
    
    if ($gmap_height != ''){
        $hit = 'height: '.$gmap_height.';';
    } 
    
    $map_id = uniqid( 'wp_gmaps_' );
    
    $output = '<div class="'.$el_class.'" id="'.esc_attr( $map_id ).'" style="'.$hit.'width: 100%;"></div>';          
           
    ?>
    <script type="text/javascript"> 
         jQuery(window).on("load", function(){   
            jQuery("#<?php echo esc_attr( $map_id ); ?>").gMap({
                zoom: <?php echo $gmap_zoom; ?>,
                scrollwheel: <?php echo $gmap_scroll; ?>,
                maptype: "<?php echo $gmap_type; ?>",
                latitude: <?php echo $gmap_latitude; ?>,
                longitude: <?php echo $gmap_longitude; ?>,
                markers:[
                    {
                        address: "<?php echo esc_textarea($gmap_address); ?>",
                        html: "_address",
                        popup: true
                    }
                ],
                icon: {
                    image: "<?php echo $gmap_icon; ?>", 
                    iconsize: [26, 46],
                    iconanchor: [12, 46]
                },
                controls: {
                    panControl: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    scaleControl: true,
                    streetViewControl: true,
                    overviewMapControl: true
                }
            });
           
            
        });    
    </script> 
    <?php      
    return $output; 
    
    
}
add_shortcode('it_gmap', 'it_gmap_shortcode');