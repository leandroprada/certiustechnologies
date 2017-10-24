<?php
return array(
    "name" => esc_html__("Swiper Slide", 'js_composer'),
    "base" => "it_swiper_slide",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg icmon-bookmark',
    "content_element" => true,
    "show_settings_on_create" => true,
    "as_child" => array('only' => 'it_swiper_slider'),
    'description' => esc_html__( 'Add swiper slide', 'js_composer' ),
    "params" => array(
         array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'octa'),
            "param_name" => "sw_image",
            "value" => '',
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Image Size", "js_composer"),
            "param_name" => "img_size",
            "value" => "full",
            "description" => esc_html__("(Ex: thumbnail , large , full).", "js_composer")
        ),array(
            "type" => "vc_link",
            "heading" => esc_html__("Link", "js_composer"),
            "param_name" => "sw_link",
            "description" => esc_html__("enter the link.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Tile",'octa'), 
            "param_name" => "sw_title"
         ),array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Title Color', 'js_composer' ),
            'param_name' => 'color',
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Font Family', 'js_composer' ),
            'param_name' => 'family',
            'edit_field_class' => 'fontSel',
            'value' => it_googleFonts(),
        ),array(
            'type' => 'label',
            'heading' => esc_html__( 'This is Custom Font Family With Google Fonts.', 'js_composer' ),
            'param_name' => 'gfont',
            'edit_field_class' => 'gfonts',
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Font Weight', 'js_composer' ),
            'param_name' => 'weight',
            'value' => array(
                '-- Select --' => '',
                'normal' => 'normal',
                'bold' => 'bold',
                'lighter' => 'lighter',
                'bolder' => 'bolder',
                '100' => '100',
                '200' => '200',
                '300' => '300',
                '400' => '400',
                '500' => '500',
                '600' => '600',
                '700' => '700',
                '800' => '800',
                '900' => '900',
                'inherit' => 'inherit'
            ),
            'std'  => '700'
        ),array(
            'type' => 'numberfield',
            'heading' => esc_html__( 'Font Size (px)', 'js_composer' ),
            'param_name' => 'size',
        ),array(
            "type" => "textarea_html",
            "heading" => esc_html__("Cotent",'octa'),
            "param_name" => "content"
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Read More Link ?", "js_composer"),
            "param_name" => "show_more",
            'group' => 'More Link',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Read More Text",'octa'),
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
                'Default Button' =>'',
                'Dots Button' =>'style2',
                'Animated Arrow' =>'style3',
            ),
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        )
    )
);
    