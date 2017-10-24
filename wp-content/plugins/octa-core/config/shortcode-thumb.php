<?php
return array(
    "name" => esc_html__("Thumb", 'js_composer'),
    "base" => "it_thumb",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    "content_element" => true,
    'icon' => 'no-bg fa fa-camera',
    "as_child" => array('only' => 'it_thumbs_gallery'),
    "params" => array(
         array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'octa'),
            "param_name" => "slide_title",
         ),array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'octa'),
            "param_name" => "image",
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    )
);