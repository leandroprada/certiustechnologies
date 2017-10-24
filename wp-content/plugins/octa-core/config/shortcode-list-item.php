<?php
return array(
    "name" => esc_html__("List Item", 'js_composer'),
    "base" => "it_list_item",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'Add List Item', 'js_composer' ),
    "content_element" => true,
    'icon' => 'no-bg fa fa-list-ol',
    "as_child" => array('only' => 'it_list'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'octa'),
            "param_name" => "list_title",
            "group" => 'Content',
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color",'octa'),
            "param_name" => "title_color",
            "group" => 'Content',
        ),array(
            "type" => "textarea_html",
            "heading" => esc_html__("Content",'octa'),
            "param_name" => "content",  
            'group' => 'Details'
        ),array(
            "type" => "vc_link",
            "heading" => esc_html__("Link", "js_composer"),
            "param_name" => "list_link",
            "group" => 'Content',
            "description" => esc_html__("enter the link for list item.", "octa")
        ),array(
           'type' => 'dropdown',
            'heading' => esc_html__( 'Color (Bootstrap List)', 'js_composer' ),
            'param_name' => 'item_color',
            'group' => 'Content',
            'value' => array(
                'Default' => '',
                'Success' => 'success',
                'Info'    => 'info',
                'Warning' => 'warning',
                'Danger'  => 'danger',
            ),
        ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use Icon', 'octa' ),
            'param_name' => 'use_icon',
            'std'  => '0',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'group' => 'Content'
        ),
        icons_lib(),
        icons_fa(),
        icons_oc(),
        icons_ti(),
        icons_entypo(),
        icons_line(),
        icons_px(),
        icons_material(),
        icons_ios7(),
        icons_med(),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon Color", "js_composer"),
            "param_name" => "icon_color",
            "group" => 'Icon',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true)
        ),
        it_animation(),
        it_animation_delay(),
        it_animation_duration(),
        array(
        "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer"),
        ),
    )
);
    
