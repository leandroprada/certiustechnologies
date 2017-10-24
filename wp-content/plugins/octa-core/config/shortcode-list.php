<?php
return array(
    "name" => esc_html__("List", "js_composer"),
    "base" => "it_list",
    "as_parent" => array('only' => 'it_list_item'),
    'icon' => 'no-bg fa fa-list-ol',
    "show_settings_on_create" => true,
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    "content_element" => true,
    'description' => esc_html__( 'Add Custom List with icon.', 'js_composer' ),
    "params" => array(
        array(
           'type' => 'dropdown',
            'heading' => esc_html__( 'Style', 'js_composer' ),
            'param_name' => 'list_style',
            'description' => esc_html__( 'Select List Style.', 'js_composer' ),
            'value' => array(
                'Custom List' => 'custom-list',
                'Bootstrap List' => 'list-group',
            ),
            'std' => 'custom_list' 
        ),
        array(
           'type' => 'dropdown',
            'heading' => esc_html__( 'Custom List Style', 'js_composer' ),
            'param_name' => 'custom_list_style',
            'value' => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
                'Style 3' => 'style3',
                'Style 4' => 'style4',
            ),
            'dependency' => array(
                'element' => 'list_style',
                'value' => 'custom-list'
            ),
        ),
        array(
           'type' => 'dropdown',
            'heading' => esc_html__( 'Size', 'js_composer' ),
            'param_name' => 'size',
            'value' => array(
                'Small' => 'sm',
                'Normal' => 'md',
                'Large' => 'lg',
            ),
            'dependency' => array(
                'element' => 'list_style',
                'value' => 'custom-list'
            ),
            'std' => 'md'
        ),
        array(
           'type' => 'dropdown',
            'heading' => esc_html__( 'Align', 'js_composer' ),
            'param_name' => 'align',
            'value' => array(
                'Left' => '',
                'Center' => 'text-center',
                'Right' => 'text-right',
            ),
            'dependency' => array(
                'element' => 'list_style',
                'value' => 'custom-list'
            ),
        ),
        it_animation(),
        it_animation_delay(),
        it_animation_duration(),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    ),
    "js_view" => 'VcColumnView'
); 
    
