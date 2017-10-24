<?php
return array(
    "name" => esc_html__("Divider", "js_composer"),
    "base" => "it_divider",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'Add block separator with styles', 'js_composer' ),
    'icon' => 'no-bg fa fa-arrows-h',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Divider Style",'octa'),
            "param_name" => "divider_class",
            "value" => array(
                'Short'             => 'short',
                'Wide'              => 'wide',
                'Style 1'           => 'skimg',
                'Style 2'           => 'trimg',
                'Double'            => 'double',
                'Dotted - Small'    => 'dotted-sm',
                'Dotted - Large'    => 'dotted-lg',
                'Dashed - Small'    => 'dashed-sm',
                'Dashed - Large'    => 'dashed-lg',
                'Animated Rainbow'  => 'gradAnim'
            ),
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "divider_color", 
            'dependency' => array( 'element' => 'divider_class', 'value_not_equal_to' => array('gradAnim')),
        ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use Icon', 'js_composer' ),
            'param_name' => 'use_icon',
            'dependency' => array( 'element' => 'divider_class', 'value_not_equal_to' => array('gradAnim')),
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'std'  => '1'
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
        it_animation(),
        it_animation_delay(),
        it_animation_duration(),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Shape', 'js_composer' ),
            'param_name' => 'icon_shape',
            'group' => 'Icon',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'value' => array(
                'Square' => '',
                'Rounded' => 'rounded',
                'Circle' => 'circle',
                'Diamond' => 'diamond'
            ),
         ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Align', 'js_composer' ),
            'param_name' => 'icon_align',
            'group' => 'Icon',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'value' => array(
                'Left' => '',
                'Center' => 'center',
                'Right' => 'right',
            ),
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color",'octa'),
            "param_name" => "div_i_color",
            "group"  => "Icon",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color",'octa'),
            "param_name" => "div_bg_color",
            "group"  => "Icon",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color",'octa'),
            "param_name" => "div_border_color",
            "group"  => "Icon",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    )
);
    
