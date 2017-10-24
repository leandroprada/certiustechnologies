<?php
return array(
    "name" => esc_html__("Panel", 'js_composer'),
    "base" => "it_panel", 
    "as_parent" => array('except' => 'row'),
    "content_element" => true,
    "show_settings_on_create" => true,
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'Add Bootstrap Panel to page', 'js_composer' ),
    'icon' => 'no-bg fa fa-object-group',
    "params" => array(
         array(
            "type" => "dropdown",
            "heading" => esc_html__("panel Style",'octa'),
            "param_name" => "panel_style",
            "value" => array(
                'Default' =>'default',
                'Success' =>'success',
                'Danger' =>'danger',
                'Info' =>'info',
                'Warning' =>'warning',
                'Primary' =>'primary',
            )
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'octa'),
            "param_name" => "panel_title",
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
    
