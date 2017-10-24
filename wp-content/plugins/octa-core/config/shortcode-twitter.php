<?php
return array(
    "name" => esc_html__("Twitter Box", 'js_composer'),
    "base" => "it_twitter",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-twitter',
    "class" => "",
    'description' => esc_html__( 'Add Latest tweets box', 'js_composer' ),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
         array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Twitter User Name', 'js_composer' ),
            'param_name' => 'twit_user',
            'description' => esc_html__( 'Add your twitter user name.', 'js_composer' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Height', 'js_composer' ),
            'param_name' => 'twit_height',
            'description' => esc_html__( 'Set box Height(Not applied if you select slider).', 'js_composer' ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Is Slider ?', 'js_composer' ),
            'param_name' => 'is_slider',
            'std' => '1',
            'description' => esc_html__( 'If selected, tweets will be shown in slider mode.', 'js_composer' ),
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slides to show", "js_composer"),
            "param_name" => "v_slides",
            'value' => '1',
            'dependency' => array( 'element' => 'is_slider', 'not_empty' => true),
            "description" => esc_html__("number of visible slides.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slides to Scroll", "js_composer"),
            "param_name" => "v_scroll",
            'value' => '1',
            'dependency' => array( 'element' => 'is_slider', 'not_empty' => true),
            "description" => esc_html__("number of slides that will scroll.", "js_composer")
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'js_composer' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
        )
    )
);
    
