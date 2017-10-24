<?php
return array(
    "name" => esc_html__("Camera Slide", 'js_composer'),
    "base" => "it_camera_slide",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    "content_element" => true,
    'icon' => 'no-bg fa fa-camera',
    "as_child" => array('only' => 'it_camera_slideshow'),
    "params" => array(
         array(
            "type" => "attach_image",
            "heading" => esc_html__("Thumbnail",'octa'),
            "param_name" => "thumbnail",
         ),array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'octa'),
            "param_name" => "image",
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'octa'),
            "param_name" => "slide_title",
         ),array(
            "type" => "vc_link",
            "heading" => esc_html__("Link",'octa'),
            "param_name" => "slide_link",
         )
    )
);
    
