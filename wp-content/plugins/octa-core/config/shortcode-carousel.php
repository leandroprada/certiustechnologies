<?php
return array(
    "name" => esc_html__("Carousel Slider", "js_composer"),
    "base" => "it_carousel",   
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-sliders',
    'description' => esc_html__( 'container to show list of carousel slides', 'js_composer' ),
    //"as_parent" => array('only' => 'it_slide'),
    "content_element" => true,
    "is_container" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Type",'octa'),
            "param_name" => "v_type",
            "value" => array(
                'Horizontal' =>'horizontal',
                'Vertical' =>'vertical',
            )
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Space between slides",'octa'),
            "param_name" => "gap",
            "value" => array(
                'None' =>'0',
                '1px' =>'1px',
                '2px' =>'2px',
                '3px' =>'3px',
                '4px' =>'4px',
                '5px' =>'5px',
                '10px' =>'10px',
                '15px' =>'15px',
                '20px' =>'20px',
                '25px' =>'25px',
                '30px' =>'30px',
                '35px' =>'35px',
            ),
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slides to show", "js_composer"),
            "param_name" => "v_slides",
            'value' => '1',
            "description" => esc_html__("number of visible slides.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slides to Scroll", "js_composer"),
            "param_name" => "v_scroll",
            'value' => '1',
            "description" => esc_html__("No. of scrollable slides.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Transition Speed", "js_composer"),
            "param_name" => "v_speed",
            'value' => '500',
            "description" => esc_html__("slides change speed.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Arrows?", "js_composer"),
            "param_name" => "v_arrows",
            'group' => 'Navigation',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "textfield",
            "heading" => "Idle Styling",
            "group" => "Navigation",
            'edit_field_class' => 'vc_head',
            "param_name" => "idl_lbl",
            'dependency' => array(
                'element' => 'v_arrows', 
                'not_empty' => true
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "arrow_color",
            "group" => "Navigation",
            'dependency' => array(
                'element' => 'v_arrows', 
                'not_empty' => true
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "arrow_bg_color",
            "group" => "Navigation",
            'dependency' => array(
                'element' => 'v_arrows', 
                'not_empty' => true
            ),
        ),array(
            "type" => "textfield",
            "heading" => "Hover Styling",
            "group" => "Navigation",
            'edit_field_class' => 'vc_head',
            "param_name" => "hover_lbl",
            'dependency' => array(
                'element' => 'v_arrows', 
                'not_empty' => true
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "arrow_hover_color",
            "group" => "Navigation",
            'dependency' => array(
                'element' => 'v_arrows', 
                'not_empty' => true
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "arrow_hover_bg_color",
            "group" => "Navigation",
            'dependency' => array(
                'element' => 'v_arrows', 
                'not_empty' => true
            ),
        ),array(
            "type" => "textfield",
            "heading" => "Arrows Icons",
            "group" => "Navigation",
            'edit_field_class' => 'vc_head',
            "param_name" => "ics_lbl",
            'dependency' => array(
                'element' => 'v_arrows', 
                'not_empty' => true
            ),
        ),array(
            "type" => "it_vc_icon",
            "heading" => esc_html__("Next Icon",'octa'),
            "param_name" => "next_icon",
            'group' => 'Navigation',
            'dependency' => array(
                'element' => 'v_arrows', 
                'not_empty' => true
            ),
        ),array(
            "type" => "it_vc_icon",
            "heading" => esc_html__("Previous Icon",'octa'),
            "param_name" => "prev_icon",
            'group' => 'Navigation',
            'dependency' => array(
                'element' => 'v_arrows', 
                'not_empty' => true
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Shape",'octa'),
            "param_name" => "arrow_shape",
            'group' => 'Navigation',
            "value" => array(
                'Square' =>'square',
                'Rounded' =>'rounded',
                'Circle' =>'circle',
            ),
            'dependency' => array(
                'element' => 'v_arrows', 
                'not_empty' => true
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Position",'octa'),
            "param_name" => "arrow_pos",
            'group' => 'Navigation',
            "value" => array(
                'Left - Right - Inside' =>'l-r-in',
                'Left - Right - Outside' =>'l-r-out',
                'Top - Bottom' =>'t-b',
            ),
            'dependency' => array(
                'element' => 'v_arrows', 
                'not_empty' => true
            ),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Font Size (in px)",'octa'),
            "param_name" => "arrow_size",
            "group" => "Navigation",
            'dependency' => array(
                'element' => 'v_arrows', 
                'not_empty' => true
            ),
            "std" => "14",
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Bullets?", "js_composer"),
            "param_name" => "v_dots",
            'group' => 'Navigation',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Style",'octa'),
            "param_name" => "bullets_style",
            'group' => 'Navigation',
            "value" => array(
                'Circle 1' =>'',
                'Circle 2' =>'circle2',
                'Square 1' =>'square1',
                'Square 2' =>'square2',
            ),
            'dependency' => array(
                'element' => 'v_dots', 
                'not_empty' => true
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "bullet_color",
            "group" => "Navigation",
            'dependency' => array(
                'element' => 'v_dots', 
                'not_empty' => true
            ),
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Fade?", "js_composer"),
            "param_name" => "v_fade",
            'group' => 'Advanced',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("AutoPlay?", "js_composer"),
            "param_name" => "v_auto",
            'group' => 'Advanced',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Infinite?", "js_composer"),
            "param_name" => "v_infinite",
            'group' => 'Advanced',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("RTL?", "js_composer"),
            "param_name" => "v_rtl",
            'group' => 'Advanced',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),
    ),
    "js_view" => 'VcColumnView'
);
    
