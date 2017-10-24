<?php
return array(
    "name" => esc_html__("Google Map", 'js_composer'),
    "base" => "it_gmap",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-map-marker',
    "class" => "",
    'description' => esc_html__( 'Add google maps with many styles', 'js_composer' ),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Map Type",'octa'),
            "param_name" => "gmap_type",
            "value" => array(
                'ROADMAP'         =>'ROADMAP',
                'SATELLITE'       =>'SATELLITE',
                'TERRAIN'         =>'TERRAIN',
                'HYBRID'          =>'HYBRID',
            ),
            "description" => esc_html__("Select google map type.",'octa')
         ),
         array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Zoom', 'js_composer' ),
            'param_name' => 'gmap_zoom',
            'std' => '12',
            'description' => esc_html__( 'Change zoom value.', 'js_composer' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Height', 'js_composer' ),
            'param_name' => 'gmap_height',
            'std' => '500px',
            'description' => esc_html__( 'Add map height value.', 'js_composer' ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Disable Mouse Wheel', 'js_composer' ),
            'param_name' => 'no_scroll',
            'description' => esc_html__( 'Disable map scroll.', 'js_composer' ),
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'API Key', 'js_composer' ),
            'param_name' => 'gmap_key',
            'description' => esc_html__( 'Enter yor google map API Key', 'js_composer' )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'js_composer' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Latitude', 'js_composer' ),
            'param_name' => 'gmap_latitude',
            'group' => 'Address',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Longitude', 'js_composer' ),
            'param_name' => 'gmap_longitude',
            'group' => 'Address',
        ),
        array(
            'type' => 'textarea_safe',
            'heading' => esc_html__( 'Address', 'js_composer' ),
            'param_name' => 'gmap_address',
            'group' => 'Address',
        ),
        array(
            "type" => "it_up_img",
            "heading" => esc_html__("Icon",'octa'),
            "param_name" => "gmap_icon",
            'group' => 'Address',
        )
    )
);
    
