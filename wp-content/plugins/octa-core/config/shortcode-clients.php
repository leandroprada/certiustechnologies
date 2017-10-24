<?php
return array(
    "name" => esc_html__("Clients Grid", "js_composer"),
    "base" => "it_clients",   
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-users',
    'description' => esc_html__( 'Add list of clients or images', 'js_composer' ),
    "as_parent" => array('only' => 'it_client'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Block Style",'octa'),
            "param_name" => "cl_style",
            "value" => array(
                '6 Columns' =>'1',
                '4 Columns' =>'2',
                '3 Columns' =>'3',
                '2 Columns' =>'4',
            ),
            "description" => esc_html__("Select Item style.",'octa')
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    ),
    "js_view" => 'VcColumnView'
);
    
