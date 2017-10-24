<?php
return array(
    "name" => esc_html__("Steps", "js_composer"),
    "base" => "it_steps",
    "as_parent" => array('only' => 'it_step'),
    'icon' => 'no-bg fa fa-list-ol',
    "show_settings_on_create" => true,
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    "content_element" => true,
    'description' => esc_html__( 'Add Steps Container', 'js_composer' ),
    "params" => array(
        array(
           'type' => 'dropdown',
            'heading' => esc_html__( 'Style', 'js_composer' ),
            'param_name' => 'steps_style',
            'description' => esc_html__( 'Select Steps Style.', 'js_composer' ),
            'value' => array(
                'Style 1' => 'steps-1',
                'Style 2' => 'steps-2',
                'Style 3' => 'steps-3',
                'Style 4' => 'steps-4',
            ),
        ),
        array(
           'type' => 'dropdown',
            'heading' => esc_html__( 'Style 4 Variations', 'js_composer' ),
            'param_name' => 'steps4_style',
            'description' => esc_html__( 'Select Steps Style.', 'js_composer' ),
            'value' => array(
                'Style 1' => 'steps-4-1',
                'Style 2' => 'steps-4-2',
                'Style 3' => 'steps-4-3',
                'Style 4' => 'steps-4-4',
            ),
            'dependency' => array(
                'element' => 'steps_style',
                'value' => 'steps-4-container'
            ),
            'std' => 'steps-4-1' 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    ),
    "js_view" => 'VcColumnView'
); 
    
