<?php
return array(
    "name" => esc_html__("Step", 'js_composer'),
    "base" => "it_step",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'Add Step', 'js_composer' ),
    "content_element" => true,
    'icon' => 'no-bg fa fa-list-ol',
    "as_child" => array('only' => 'it_steps'),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Align",'octa'),
            "param_name" => "align",
            "value" => array(
                'Left' =>'',
                'Center' =>'text-center',
                'Right' =>'text-right',
            ),
        ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use Icon', 'js_composer' ),
            'param_name' => 'use_icon',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'std'  => '1',
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Number",'octa'),
            "param_name" => "step_number",
            "group" => "Content",
            "description" => esc_html__("Step number.",'octa') ,
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'octa'),
            "param_name" => "step_title",
            "group" => "Content",
            "description" => esc_html__("Step title.",'octa') ,
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", "js_composer"),
            "group" => "Content",
            "param_name" => "title_color",
        ),array(
            "type" => "textarea_html",
            "group" => "Content",
            "heading" => esc_html__("Content",'octa'),
            "param_name" => "content",  
        ),
        it_animation(),
        it_animation_delay(),
        it_animation_duration(),
        array(
        "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer"),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Size",'octa'),
            "param_name" => "size",
            "group" => "Icon & Number Styling",
            "value" => array(
                'Small' =>'sm',
                'Normal' =>'md',
                'Large' =>'lg',
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Shape",'octa'),
            "param_name" => "shape",
            "group" => "Icon & Number Styling",
            "value" => array(
                'Square' =>'',
                'Rounded' =>'rounded',
                'Circle' =>'circle',
            ),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Border Width", "octa"),
            "param_name" => "border_width",
            "group" => "Icon & Number Styling",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "color",
            "group" => "Icon & Number Styling",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "bg_color",
            "group" => "Icon & Number Styling",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "js_composer"),
            "param_name" => "border_color",
            "group" => "Icon & Number Styling",
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
    )
);
    
