<?php
return array(
    "name" => esc_html__("Features", 'js_composer'),
    "base" => "it_feature", 
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'adds feature', 'js_composer' ),
    'icon' => 'no-bg fa fa-cogs',
    "class" => "",
    "content_element" => true,
    "params" => array(
         array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'octa'),
            "param_name" => "feature_title",
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Sub Title",'octa'),
            "param_name" => "feature_subtitle"
         ),array(
            "type" => "vc_link",
            "heading" => esc_html__("Link",'octa'),
            "param_name" => "feature_link"
         ),array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'octa'),
            "param_name" => "feature_image",
         ),array(
            "type" => "textarea_html",
            "heading" => esc_html__("Content",'octa'),
            "holder" => "div",
            "param_name" => "content",
            "value" => 'Lorem ipsum dolor sit amet, co sectetur adipiscing elit. Nullam convallis euismod mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Feature Style",'octa'),
            "param_name" => "feature_style",
            "group" => "Advanced",
            "value" => array(
                'Simple' =>'style1',
                'style 2' =>'style2',
                'style 3' =>'style3'
            )
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Align",'octa'),
            "group" => "Advanced",
            "param_name" => "align",
            "value" => array(
                'Left' =>'',
                'Center' =>'text-center',
                'Right' =>'text-right'
            )
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Image Shape",'octa'),
            "group" => "Advanced",
            "param_name" => "img_shape",
            "value" => array(
                'Square' =>'',
                'Rounded' =>'rounded',
                'Round' =>'round'
            )
        ),array(
            "type" => "textfield",
            "heading" => "General Styling",
            "group" => "Advanced",
            'edit_field_class' => 'vc_head',
            "param_name" => "grrl_lbl",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "bg_color",
            'group' => 'Advanced',
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", "js_composer"),
            "param_name" => "title_color",
            'group' => 'Advanced',
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Subtitle Color", "js_composer"),
            "param_name" => "subtitle_color",
            'group' => 'Advanced',
        ),array(
            "type" => "textfield",
            "heading" => 'Padding <small>(px)</small>',
            "group" => "Advanced",
            'edit_field_class' => 'vc_head',
            "param_name" => "pad_lbl",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Top", "js_composer"),
            "group" => "Advanced",
            "param_name" => "padd_top",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Right", "js_composer"),
            "group" => "Advanced",
            "param_name" => "padd_right",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Bottom", "js_composer"),
            "group" => "Advanced",
            "param_name" => "padd_bottom",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Left", "js_composer"),
            "group" => "Advanced",
            "param_name" => "padd_left",
        ),array(
            "type" => "textfield",
            "heading" => "Margin <small>(px)</small>",
            "group" => "Advanced",
            'edit_field_class' => 'vc_head',
            "param_name" => "mar_lbl",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Top", "js_composer"),
            "group" => "Advanced",
            "param_name" => "margin_top",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Right", "js_composer"),
            "group" => "Advanced",
            "param_name" => "margin_right",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Bottom", "js_composer"),
            "group" => "Advanced",
            "param_name" => "margin_bottom",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Left", "js_composer"),
            "group" => "Advanced",
            "param_name" => "margin_left",
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "group" => "Advanced",
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element - add a class name and refer to it in custom CSS.", "js_composer")
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Read More ?", "js_composer"),
            "param_name" => "show_more",
            'group' => 'More Link',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Button Text",'octa'),
            "param_name" => "more_text",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Style",'octa'),
            "param_name" => "more_style",
            "group" => "More Link",
            "value" => array(
                'Classic' =>'',
                'Modern' =>'style3',
                'Dots' =>'style2',
            ),
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Shape",'octa'),
            "param_name" => "more_shape",
            "group" => "More Link",
            "value" => array(
                'Square' =>'',
                'Rounded' =>'rounded',
                'Round' =>'round',
            ),
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Size",'octa'),
            "param_name" => "more_size",
            "group" => "More Link",
            "value" => array(
                'Small' =>'btn-sm',
                'Medium' =>'btn-md',
                'Large' =>'btn-lg',
            ),
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Alignment",'octa'),
            "param_name" => "more_align",
            "group" => "More Link",
            "value" => array(
                'Left' =>'left',
                'Center' =>'centered',
                'Right' =>'right',
            ),
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "textfield",
            "heading" => "Idle Styling",
            "group" => "More Link",
            'edit_field_class' => 'vc_head',
            "param_name" => "idl_lbl", 
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "more_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "more_bg_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "js_composer"),
            "param_name" => "more_border_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "textfield",
            "heading" => "Hover Styling",
            "group" => "More Link",
            'edit_field_class' => 'vc_head',
            "param_name" => "hover_lbl",
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "more_hover_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "more_hover_bg_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "js_composer"),
            "param_name" => "more_hover_border_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),
    )
);
    
