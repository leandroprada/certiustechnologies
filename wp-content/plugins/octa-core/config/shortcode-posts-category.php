<?php
return array(
    "name" => esc_html__("Posts From Category", "octa"),
    "base" => "it_posts_category",
    'category' => esc_html__( 'OCTA Shortcodes', 'octa' ),
    'icon' => 'no-bg fa fa-tags',
    'description' => esc_html__( 'choose posts from specific category', 'octa' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style",'octa'),
            "param_name" => "pg_style",
            "value" => array(
                'Style 1'   => '1',
                'Style 2'   => '2',
                'Style 3'   => '3',  
            ),
         ),array(
            "type" => "it_multiselect",
            "heading" => esc_html__("Category",'octa'),
            "param_name" => "it_category",
            "value" => it_dropdown_cats(),
         ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Carousel ?', 'octa' ),
            'param_name' => 'has_carousel',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'dependency' => array( 'element' => 'pg_style', 'value' => array('1','2','3')),
        ),array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
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
            "std"   => 'large'
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Number Of Posts", "octa"),
            "param_name" => "pg_max_posts",
            'value' => '3',
            "description" => esc_html__("Max. Number of Posts.", "octa"),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Max. Number of words", "octa"),
            "param_name" => "max_words",
            'std' => '40', 
            'value' => '40',
            "description" => esc_html__("Enter -1 to disable this.", "octa"),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Non Carousel Columns", "octa"),
            "param_name" => "pg_cols",
            "value" => array(
                '1 Columns'   => '12',
                '2 Columns'   => '6',
                '3 Columns'   => '4',
                '4 Columns'   => '3',
            ),
            "description" => esc_html__("Number of Coulmns in case not Carousel view.", "octa"),
            'dependency' => array( 'element' => 'has_carousel', 'value_not_equal_to' => '1'),
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "octa"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    )
);
    