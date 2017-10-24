<?php
return array(
    "name" => esc_html__("Counter", 'js_composer'),
    "base" => "it_counter",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'animated numbers changes in counter style with icons', 'js_composer' ),
    'icon' => 'no-bg fa fa-sort-numeric-desc',
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Box Shape",'octa'),
            "param_name" => "counter_shape",
            "value" => array(
                "Square" => "square",
                "Rounded" => "rounded",
                "Round" => "round",
            )
         ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Alignment', 'js_composer' ),
            'param_name' => 'counter_align',
            'value' => array(
                'Center' => 'text-center',
                'Left' => 'text-left',
                'Right' => 'text-right',
            ),
        ),
         array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use Icon', 'js_composer' ),
            'param_name' => 'use_icon',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'std'  => '1'
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color",'octa'),
            "param_name" => "bx_bg_color",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Border Width",'octa'),
            "param_name" => "bx_border_width",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color",'octa'),
            "param_name" => "bx_border_color",
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Border Style",'octa'),
            "param_name" => "bx_border_style",
            "value" => array(
                "None"  => '',
                "Solid" => "solid",
                "Dashed" => "dashed",
                "Dotted" => "dotted",
                "Double" => "double",
            ),
         ),array(
            "type" => "textfield",
            "heading" => "Hover Styling",
            'edit_field_class' => 'vc_head',
            "param_name" => "hover_lbl",
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color",'octa'),
            "param_name" => "bx_hover_bg_color",
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color",'octa'),
            "param_name" => "bx_hover_border_color",
         ),
         it_animation(),
         it_animation_delay(),
         it_animation_duration(),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer"),
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'octa'),
            "param_name" => "item_title",  
            'group' => 'Content'
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color",'octa'),
            "param_name" => "title_color",
            'group' => 'Content'
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color",'octa'),
            "param_name" => "title_bg_color",
            'group' => 'Content'
         ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Font Size",'octa'),
            "param_name" => "title_size",
            'group' => 'Content'
         ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Font Weight', 'js_composer' ),
            'param_name' => 'title_font_weight',
            'group' => 'Content',
            'value' => array(
                '-- Select --' => '',
                'normal' => 'normal',
                'bold' => 'bold',
                'lighter' => 'lighter',
                'bolder' => 'bolder',
                '100' => '100',
                '200' => '200',
                '300' => '300',
                '400' => '400',
                '500' => '500',
                '600' => '600',
                '700' => '700',
                '800' => '800',
                '900' => '900',
                'inherit' => 'inherit'
            ),
        ),array(
            "type" => "textfield",
            "heading" => "Hover Styling",
            "group" => "Content",
            'edit_field_class' => 'vc_head',
            "param_name" => "hover_lbl2",
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color",'octa'),
            "param_name" => "title_hove_color",
            'group' => 'Content'
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color",'octa'),
            "param_name" => "title_hover_bg_color",
            'group' => 'Content'
         ),array(
            'type' => 'textarea_html',
            'heading' => esc_html__( 'Content', 'js_composer' ),
            'param_name' => 'content',
            'admin_label' => true,
            'group' => 'Content'
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover Color",'octa'),
            "param_name" => "content_hover_color",
            'group' => 'Content'
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Theme",'octa'),
            "param_name" => "num_theme",
            "value" => array(
                'Minimal' =>'minimal',
                'Car' =>'car',
                'Digital' =>'digital',
                'Plaza' =>'plaza',
                'Slot Machine' =>'slot-machine',
                'Train Station' =>'train-station',
            ),
            "description" => esc_html__("Select Theme.",'octa'),
            "group" => "Number"
         ),array(
            "type" => "numberfield",
            "heading" => esc_html__("From",'octa'),
            "param_name" => "init_value",
            "value" => '0',
            'group' => 'Number'
         ),array(
            "type" => "numberfield",
            "heading" => esc_html__("To",'octa'),
            "value" => '1000',
            "param_name" => "item_value",
            'group' => 'Number'
         ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Start After",'octa'),
            "param_name" => "item_timer",
            "value" => '1000',
            "description" => esc_html__("time in ms Ex:(1000).",'octa'),
            'group' => 'Number'
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Text Before Number",'octa'),
            "param_name" => "item_before",
            "group" => 'Number',
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Text After Number",'octa'),
            "param_name" => "item_after",
            "group" => 'Number',
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color",'octa'),
            "param_name" => "numbers_color",
            'group' => 'Number'
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover Color",'octa'),
            "param_name" => "numbers_hover_color",
            'group' => 'Number'
         ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Font Size",'octa'),
            "param_name" => "numbers_size",
            'group' => 'Number'
         ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Font Weight', 'js_composer' ),
            'param_name' => 'item_font_weight',
            'group' => 'Number',
            'value' => array(
                '-- Select --' => '',
                'normal' => 'normal',
                'bold' => 'bold',
                'lighter' => 'lighter',
                'bolder' => 'bolder',
                '100' => '100',
                '200' => '200',
                '300' => '300',
                '400' => '400',
                '500' => '500',
                '600' => '600',
                '700' => '700',
                '800' => '800',
                '900' => '900',
                'inherit' => 'inherit'
            ),
        ),
        icons_lib(),
        icons_fa(),
        icons_oc(),
        icons_ti(),
        icons_entypo(),
        icons_line(),
        icons_px(),
        icons_material(),
        icons_ios7(),
        icons_med(),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon Color",'octa'),
            "param_name" => "icon_color",
            'group' => 'Icon',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover Color",'octa'),
            "param_name" => "icon_hover_color",
            'group' => 'Icon',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Font Size",'octa'),
            "param_name" => "icon_size",
            'group' => 'Icon',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Read More Link ?", "js_composer"),
            "param_name" => "show_more",
            'group' => 'More Link',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Read More Text",'octa'),
            "param_name" => "more_text",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Style",'octa'),
            "param_name" => "more_style",
            "group" => "More Link",
            "value" => array(
                'Default Button' =>'',
                'Dots Button' =>'style2',
                'Animated Arrow' =>'style3',
            ),
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Alignment",'octa'),
            "param_name" => "more_align",
            "group" => "More Link",
            "value" => array(
                'Left' =>'left',
                'Center' =>'centered',
                'Right' =>'right',
            ),
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "more_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "more_bg_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "js_composer"),
            "param_name" => "more_border_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Color", "js_composer"),
            "param_name" => "more_hover_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Background Color", "js_composer"),
            "param_name" => "more_hover_bg_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Border Color", "js_composer"),
            "param_name" => "more_hover_border_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),
    )
);
    
