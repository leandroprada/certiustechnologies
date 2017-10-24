<?php
return array(
    "name" => esc_html__("Testimonials", "js_composer"),
    "base" => "it_testimonials",
    "as_parent" => array('only' => 'it_testimonial'),
    'icon' => 'no-bg fa fa-comments-o',
    'save_always' => true,
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    "content_element" => true,
    "show_settings_on_create" => true,
    'description' => esc_html__( 'Add testimonial parent container', 'js_composer' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Type",'octa'),
            "param_name" => "block_type",
            "value" => array(
                'Carousel' =>'carousel',
                'Grid' =>'grid',
            ),
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Style",'octa'),
            "param_name" => "block_style",
            "value" => array(
                'Style 1' =>'1',
                'Style 2' =>'2',
                'Style 3' =>'3',
                'Style 4' =>'4',
                'Simple'  => 'simple'
            ),
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Arrangement",'octa'),
            "param_name" => "block_arrange",
            "value" => array(
                'Image + Author + Content' =>'1',
                'Image + Content + Author' =>'2',
                'Author + Image + Content' =>'3',
                'Author + Content + Image' =>'4',
                'Content + Author + Image' =>'5',
                'Content + Image + Author' =>'6',
            ),
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Grid Columns",'octa'),
            "param_name" => "grid_cols",
            'dependency' => array(
                'element' => 'block_type',
                'value' => 'grid'
            ),
            "value" => array(
                '1 Column' =>'12',
                '2 Columns' =>'6',
                '3 Columns' =>'4',
                '4 Columns' =>'3',
                '5 Columns' =>'15',
                '6 Columns' =>'2',
            ),
        ),array(
            "type" => "textfield",
            "heading" => 'Padding <small>(px)</small>',
            "group" => "Design",
            'edit_field_class' => 'vc_head',
            "param_name" => "pad_lbl",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Top", "js_composer"),
            "group" => "Design",
            "param_name" => "padd_top",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Right", "js_composer"),
            "group" => "Design",
            "param_name" => "padd_right",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Bottom", "js_composer"),
            "group" => "Design",
            "param_name" => "padd_bottom",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Left", "js_composer"),
            "group" => "Design",
            "param_name" => "padd_left",
        ),array(
            "type" => "textfield",
            "heading" => "Margin <small>(px)</small>",
            "group" => "Design",
            'edit_field_class' => 'vc_head',
            "param_name" => "mar_lbl",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Top", "js_composer"),
            "group" => "Design",
            "param_name" => "margin_top",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Right", "js_composer"),
            "group" => "Design",
            "param_name" => "margin_right",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Bottom", "js_composer"),
            "group" => "Design",
            "param_name" => "margin_bottom",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Left", "js_composer"),
            "group" => "Design",
            "param_name" => "margin_left",
        ),array(
            "type" => "textfield",
            "heading" => "Idle Styling",
            "group" => "Design",
            'edit_field_class' => 'vc_head',
            "param_name" => "idle_lbl",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "bg_color",
            'group' => 'Design',
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "js_composer"),
            "param_name" => "border_color",
            'group' => 'Design',
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Border Width", "js_composer"),
            "param_name" => "border_width",
            'group' => 'Design',
        ),array(
            "type" => "textfield",
            "heading" => "Hover Styling",
            "group" => "Design",
            'edit_field_class' => 'vc_head',
            "param_name" => "hover_lbl",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "hover_bg_color",
            'group' => 'Design',
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "js_composer"),
            "param_name" => "hover_border_color",
            'group' => 'Design',
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            'group' => 'Design',
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        ),
        
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Type",'octa'),
            "param_name" => "v_type",
            'group' => 'Carousel',
            "value" => array(
                'Horizontal' =>'horizontal',
                'Vertical' =>'vertical',
            ),
            'dependency' => array(
                'element' => 'block_type', 
                'value' => 'carousel'
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Space between slides",'octa'),
            "param_name" => "gap",
            'group' => 'Carousel',
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
            'dependency' => array(
                'element' => 'block_type', 
                'value' => 'carousel'
            ),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Slides to show", "js_composer"),
            "param_name" => "v_slides",
            'group' => 'Carousel',
            'value' => '1',
            "description" => esc_html__("number of visible slides.", "js_composer"),
            'dependency' => array(
                'element' => 'block_type', 
                'value' => 'carousel'
            ),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Slides to Scroll", "js_composer"),
            "param_name" => "v_scroll",
            'group' => 'Carousel',
            'value' => '1',
            "description" => esc_html__("No. of scrollable slides.", "js_composer"),
            'dependency' => array(
                'element' => 'block_type', 
                'value' => 'carousel'
            ),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Transition Speed", "js_composer"),
            "param_name" => "v_speed",
            'group' => 'Carousel',
            'value' => '500',
            "description" => esc_html__("slides change speed.", "js_composer"),
            'dependency' => array(
                'element' => 'block_type', 
                'value' => 'carousel'
            ),
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Arrows?", "js_composer"),
            "param_name" => "v_arrows",
            'group' => 'Navigation',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'dependency' => array(
                'element' => 'block_type', 
                'value' => 'carousel'
            ),
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
            "heading" => esc_html__("Font Size (px)",'octa'),
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
            ),
            'dependency' => array(
                'element' => 'block_type', 
                'value' => 'carousel'
            ),
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
            ),
            'dependency' => array(
                'element' => 'block_type', 
                'value' => 'carousel'
            ),
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("AutoPlay?", "js_composer"),
            "param_name" => "v_auto",
            'group' => 'Advanced',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'dependency' => array(
                'element' => 'block_type', 
                'value' => 'carousel'
            ),
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Infinite?", "js_composer"),
            "param_name" => "v_infinite",
            'group' => 'Advanced',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'dependency' => array(
                'element' => 'block_type', 
                'value' => 'carousel'
            ),
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("RTL?", "js_composer"),
            "param_name" => "v_rtl",
            'group' => 'Advanced',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'dependency' => array(
                'element' => 'block_type', 
                'value' => 'carousel'
            ),
        ),
        
    ),
    "js_view" => 'VcColumnView'
);