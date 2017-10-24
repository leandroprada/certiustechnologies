<?php
return array(
    "name" => esc_html__("Team Member", 'js_composer'),
    "base" => "it_member", 
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'Add team member box to page', 'js_composer' ),
    'icon' => 'no-bg fa fa-user',
    "params" => array(
         array(
            "type" => "dropdown",
            "heading" => esc_html__("Style",'octa'),
            "param_name" => "member_style",
            "value" => array(
                'style 1' =>'1',
                'style 2' =>'2',
                'style 3' =>'3',
                'style 4' =>'4',
                'style 5' =>'5',
            )
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Align",'octa'),
            "param_name" => "align",
            "value" => array(
                'Left' =>'',
                'Center' =>'text-center',
                'Right' =>'text-right'
            )
        ),array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'octa'),
            "param_name" => "image",
            "group"     => "Details"
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Name",'octa'),
            "param_name" => "member_name",
            "group"     => "Details"
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Position",'octa'),
            "param_name" => "member_position",
            "group"     => "Details"
         ),array(
            "type" => "textarea_html",
            "heading" => esc_html__("Details",'octa'),
            "param_name" => "content",
            "group"     => "Details"
         ),array(
            "type" => "vc_link",
            "heading" => esc_html__("Facebook",'octa'),
            "param_name" => "member_fb",
            "group"     => "Socials"
         ),array(
            "type" => "vc_link",
            "heading" => esc_html__("Twitter",'octa'),
            "param_name" => "member_tw",
            "group"     => "Socials"
         ),array(
            "type" => "vc_link",
            "heading" => esc_html__("LinkedIn",'octa'),
            "param_name" => "member_ln",
            "group"     => "Socials"
         ),array(
            "type" => "vc_link",
            "heading" => esc_html__("Google Plus",'octa'),
            "param_name" => "member_go",
            "group"     => "Socials"
         ),array(
            "type" => "vc_link",
            "heading" => esc_html__("Skype",'octa'),
            "param_name" => "member_sk",
            "group"     => "Socials"
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    )
);
    
