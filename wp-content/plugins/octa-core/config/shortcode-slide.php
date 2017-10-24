<?php
return array(
    "name" => esc_html__("Carousel Slide", 'js_composer'),
    "base" => "it_slide",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-sliders',
    "content_element" => true,
    "show_settings_on_create" => true,
    "as_child" => array('only' => 'it_carousel'),
    "params" => array(
         array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'octa'),
            "param_name" => "slide_image",
            "value" => '',
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Slide Link",'octa'),
            "param_name" => "slide_link",
            "value" => array(
                'Zoom' =>'',
                'Link' =>'link',
            ),
        ),array(
            "type" => "vc_link",
            "heading" => esc_html__("Link", "js_composer"),
            "param_name" => "slide_ex_link",
            'dependency' => array(
                'element' => 'slide_link',
                'value' => 'link'
            ),
            "description" => esc_html__("enter the link.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Image Size", "js_composer"),
            "param_name" => "img_size",
            "std" => "full",
            "description" => esc_html__("enter the image size you want (Ex: thumbnail , large , full).", "js_composer")
        ),array(
            "type" => "textarea_html",
            "heading" => esc_html__("Content",'octa'),
            "param_name" => "content",
            "group" => 'Content',
            "value" => esc_html__("Hello, I'm the box content you can change me to whatever text you want.",'octa'),
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    )
);
    
