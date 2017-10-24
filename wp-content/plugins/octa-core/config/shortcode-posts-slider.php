<?php
return array(
    "name" => esc_html__("Posts Swiper Slider", "js_composer"),
    "base" => "it_posts_slider",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-tags',
    'description' => esc_html__( 'Add posts swiper slider', 'js_composer' ),
    "params" => array(
         array(
            "type" => "it_multiselect",
            "heading" => esc_html__("Category",'octa'),
            "param_name" => "it_category",
            "value" => it_dropdown_cats(),
            "description" => esc_html__("type the item category.",'octa')
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Image Size",'octa'),
            "param_name" => "img_size",
            "value" => array(
                'Thumbnail - 150x150' => 'thumbnail',
                'Medium - 400x380' => 'blog-small-image',
                'Large - 1024x1024' => 'large',
                'Blog Large Image - 1170x470' => 'blog-large-image',
                'Original Size' => 'full'
            ),                           
            "description" => esc_html__("select the pager type.",'octa'),
            "std"   => 'full'
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Number Of Posts", "js_composer"),
            "param_name" => "ps_max_posts",
            'value' => '10',
            "description" => esc_html__("Max. Number of Posts.", "js_composer"),
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Direction",'octa'),
            "param_name" => "sw_type",
            "group" => "Slider Options",
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
            "group" => "Slider Options",
            'value' => '400',
            "description" => esc_html__("Type the slider height in px(Ex: 250px).", "js_composer"),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Slides to show", "js_composer"),
            "param_name" => "sw_slides",
            "group" => "Slider Options",
            'value' => '2',
            "description" => esc_html__("number of visible slides.", "js_composer"),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Space Between Slides (px)", "js_composer"),
            "param_name" => "sw_space",
            "group" => "Slider Options",
            'value' => '0',
            "description" => esc_html__("Distance between slides in px.", "js_composer"),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Speed", "js_composer"),
            "param_name" => "sw_speed",
            "group" => "Slider Options",
            'std' => '400',
            'value' => '400',
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Effect",'octa'),
            "param_name" => "sw_effect",
            "group" => "Slider Options",
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
            "group" => "Slider Options",
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),
    )
);
    