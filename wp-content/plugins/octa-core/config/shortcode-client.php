<?php
return array(
    "name" => esc_html__("Client", 'js_composer'),
    "base" => "it_client",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-user',
    "class" => "",
    "content_element" => true,
    "show_settings_on_create" => true,
    "as_child" => array('only' => 'it_clients'),
    "params" => array(
         array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'octa'),
            "param_name" => "image",
         ),array(
            "type" => "vc_link",
            "heading" => esc_html__("Link",'octa'),
            "param_name" => "client_link"
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    )
);
    
