<?php
return array(
    "name" => esc_html__("Swiper Slider", "js_composer"),
    "base" => "it_swiper_slider",   
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-columns',
    'description' => esc_html__( 'Add swiper slider', 'js_composer' ),
    "as_parent" => array('only' => 'it_swiper_slide,it_panel,it_icon,it_iconbox,it_feature,
    it_counter,it_testimonials,it_member,it_gmap,it_steps,it_swiper_slider_inner,vc_single_image,vc_column_text,vc_message,vc_tta_tabs,vc_tta_tour,
    vc_tta_accordion,vc_cta,vc_video,vc_raw_html,vc_progress_bar,vc_pie,vc_round_chart,vc_line_chart,go_pricing'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Direction",'octa'),
            "param_name" => "sw_type",
            "value" => array(
                'Horizontal' => 'h',
                'Vertical' => 'v'
            ),                           
            "description" => esc_html__("select the pager type.",'octa'),
            "std"   => 'h'
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Height (px)", "js_composer"),
            "param_name" => "sw_height",
            'value' => '400',
            "description" => esc_html__("Type the slider height in px(Ex: 250px).", "js_composer"),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Slides to show", "js_composer"),
            "param_name" => "sw_slides",
            'value' => '2',
            "description" => esc_html__("number of visible slides.", "js_composer"),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Space Between Slides (px)", "js_composer"),
            "param_name" => "sw_space",
            'value' => '0',
            "description" => esc_html__("Distance between slides in px.", "js_composer"),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Speed", "js_composer"),
            "param_name" => "sw_speed",
            'std' => '400',
            'value' => '400',
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Effect",'octa'),
            "param_name" => "sw_effect",
            "value" => array(
                'Slide' => 'slide',
                'Fade' => 'fade',
                'Cube' => 'cube',
                'Coverflow' => 'coverflow',
                'Flip' => 'flip',
            ),                           
            "std"   => 'slide'
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Infinite ?", "js_composer"),
            "param_name" => "sw_loop",
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    ),
    "js_view" => 'VcColumnView'
);
    