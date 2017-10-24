<?php
return array(
    "name" => esc_html__("Testimonial BlockQuote", 'js_composer'),
    "base" => "it_testimonial",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    "content_element" => true,
    'icon' => 'no-bg fa fa-comment-o',
    "as_child" => array('only' => 'it_testimonials'),
    "params" => array(
         array(
            "type" => "textfield",
            "heading" => esc_html__("Author",'octa'),
            "param_name" => "author",
         ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Author Font Size",'octa'),
            "param_name" => "author_size",
            "std" => "12",
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "author_color",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover Color", "js_composer"),
            "param_name" => "hover_author_color",
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Position",'octa'),
            "param_name" => "slogan",
         ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Position Font Size", "js_composer"),
            "param_name" => "slogan_size",
            "std" => "12",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "slogan_color",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover Color", "js_composer"),
            "param_name" => "hover_slogan_color",
        ),array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'octa'),
            "param_name" => "image",
            'group' => 'Image',
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Image Size",'octa'),
            "param_name" => "img_size",
            'group' => 'Image',
            "value" => array(
                'Small - 40x40' => '40x40',
                'Small - 55x55' => '55x55',
                'Small - 70x70' => '70x70',
                'Thumbnail - 150x150' => 'thumbnail',
                'Medium - 400x380' => 'blog-small-image',
                'Large - 1024x1024' => 'large',
                'Blog Large Image - 1170x470' => 'blog-large-image',
                'Original Size' => 'full'
            ),                           
            "std"   => '55x55'
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Shape', 'js_composer' ),
            'param_name' => 'img_shape',
            'group' => 'Image',
            'value' => array(
                esc_html__( 'Rounded', 'js_composer' ) => 'rounded',
                esc_html__( 'Square', 'js_composer' ) => 'square',
                esc_html__( 'Circle', 'js_composer' ) => 'circle',
            ),
            'std' => 'rounded',
         ),array(
            "type" => "textarea_html",
            "heading" => esc_html__("Content",'octa'),
            "param_name" => "content",
            "group" => "Content",
            "value" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar.",
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover Color", "js_composer"),
            "group" => "Content",
            "param_name" => "hover_cont_color",
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Font Family', 'js_composer' ),
            'param_name' => 'cont_font_family',
            'group' => 'Content',
            'value' => it_googleFonts(),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Font Size", "js_composer"),
            "param_name" => "content_size",
            'group' => 'Content',
            "std" => "14",
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Font Style', 'js_composer' ),
            'param_name' => 'font_style',
            'group' => 'Content',
            'value' => array(
                'Normal' => 'normal',
                'Italic' => 'italic',                
            ),
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Alignment', 'js_composer' ),
            'param_name' => 'box_align',
            'group' => 'Design',
            'value' => array(
                __( 'Left', 'js_composer' ) => '',
                __( 'Center', 'js_composer' ) => 'text-center',
                __( 'Right', 'js_composer' ) => 'text-right',
            ),
         ),array(
            "type" => "textfield",
            "heading" => 'Padding <small>(px)</small>',
            "group" => "Design",
            'edit_field_class' => 'vc_head',
            "param_name" => "pad_lbl",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Top", "js_composer"),
            "group" => "Design",
            "param_name" => "padd_top",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Right", "js_composer"),
            "group" => "Design",
            "param_name" => "padd_right",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Bottom", "js_composer"),
            "group" => "Design",
            "param_name" => "padd_bottom",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Left", "js_composer"),
            "group" => "Design",
            "param_name" => "padd_left",
        ),array(
            "type" => "textfield",
            "heading" => "Margin <small>(px)</small>",
            "group" => "Design",
            'edit_field_class' => 'vc_head',
            "param_name" => "mar_lbl",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Top", "js_composer"),
            "group" => "Design",
            "param_name" => "margin_top",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Right", "js_composer"),
            "group" => "Design",
            "param_name" => "margin_right",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Bottom", "js_composer"),
            "group" => "Design",
            "param_name" => "margin_bottom",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Left", "js_composer"),
            "group" => "Design",
            "param_name" => "margin_left",
        ),array(
            "type" => "textfield",
            "heading" => "Idle Styling",
            "group" => "Design",
            'edit_field_class' => 'vc_head',
            "param_name" => "idle_lbl",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "bg_color",
            'group' => 'Design',
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "js_composer"),
            "param_name" => "border_color",
            'group' => 'Design',
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Border Width", "js_composer"),
            "param_name" => "border_width",
            'group' => 'Design',
        ),array(
            "type" => "textfield",
            "heading" => "Hover Styling",
            "group" => "Design",
            'edit_field_class' => 'vc_head',
            "param_name" => "hover_lbl",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "hover_bg_color",
            'group' => 'Design',
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "js_composer"),
            "param_name" => "hover_border_color",
            'group' => 'Design',
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            'group' => 'Design',
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    )
);
