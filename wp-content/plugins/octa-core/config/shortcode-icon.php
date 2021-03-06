<?php
return array(
    "name" => esc_html__("Icon", 'js_composer'),
    "base" => "it_icon",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'Add Custom Icon', 'js_composer' ),
    "content_element" => true,
    'icon' => 'no-bg fa fa-share',
    "params" => array(
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
            "type" => "dropdown",
            "heading" => esc_html__("Shape",'js_composer'),
            "param_name" => "shape",
            "value" => array(
                "Square"    => "square",
                "Rounded"   => "rounded",
                "Round"     => "round",
                "Circle"    => "circle",
            ),
            'group' => 'Icon'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Size",'js_composer'),
            "param_name" => "size", 
            "value" => array(
                "Mini"          => "xs-icon",
                "Small"         => "sm-icon",
                "Normal"        => "md-icon",
                "Large"         => "lg-icon",
                "Extra Large"   => "xl-icon",
            ),
            "std" => "md-icon",
            'group' => 'Icon'
        ),
        array(
            "type" => "numberfield",
            "heading" => esc_html__("Border Width (in px)",'js_composer'),
            "param_name" => "border_width",
            'group' => 'Icon',
        ),
        array(
            "type" => "textfield",
            "heading" => "Idle Styling",
            "group" => "Icon",
            'edit_field_class' => 'vc_head',
            "param_name" => "idle_lbl",
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color",'js_composer'),
            "param_name" => "color",
            'group' => 'Icon',
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color",'js_composer'),
            "param_name" => "bg_color",
            'group' => 'Icon',
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color",'js_composer'),
            "param_name" => "border_color",
            'group' => 'Icon',
        ),
        array(
            "type" => "textfield",
            "heading" => "Hover Styling",
            "group" => "Icon",
            'edit_field_class' => 'vc_head',
            "param_name" => "hover_lbl",
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color",'js_composer'),
            "param_name" => "hover_color",
            'group' => 'Icon',
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color",'js_composer'),
            "param_name" => "hover_bg_color",
            'group' => 'Icon',
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color",'js_composer'),
            "param_name" => "hover_border_color",
            'group' => 'Icon',
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Hover Animation",'js_composer'),
            "param_name" => "hover_anim", 
            "value" => array(
                "FadeIn"          => "anim0",
                "Bottom To Top"   => "anim1",
                "Right To Left"   => "anim2",
                "Left To Right"   => "anim3",
                "Top To Bottom"   => "anim4",
                "Scale 1"         => "anim5",
                "Scale 2"         => "anim6",
                "Rotate X"        => "anim7",
                "Rotate Y"        => "anim8",
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use Icon', 'js_composer' ),
            'param_name' => 'use_icon',
            'edit_field_class' => 'hidden',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'std'  => '1',
            'group' => 'Icon',
        ),
        array(
            "type" => "vc_link",
            "heading" => esc_html__("Link",'octa'),
            "param_name" => "link",  
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
    
