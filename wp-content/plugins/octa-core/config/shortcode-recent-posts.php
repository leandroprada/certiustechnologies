<?php
return array(
    "name" => esc_html__("Recent Posts", "js_composer"),
    "base" => "it_recent_posts",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-pencil-square-o',
    'description' => esc_html__( 'Add recent posts in page', 'js_composer' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style",'octa'),
            "param_name" => "rp_style",
            "value" => array(
                'Style 1'   => '1',
                'Style 2'   => '2',
                'Style 3'   => '3',
                'First Large Image' => '4',
                'WP Widget Style' => '6'  
            ),
            "description" => esc_html__("select the recent posts style.",'octa')
         ),array(
            "type" => "it_multiselect",
            "heading" => esc_html__("Category",'octa'),
            "param_name" => "it_cat",
            "value" => it_dropdown_cats(),
            "description" => esc_html__("type the item category.",'octa')
         ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Carousel ?', 'js_composer' ),
            'param_name' => 'has_carousel',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            "description" => esc_html__("Slick Slider.",'octa'),
            'dependency' => array( 
                'element' => 'rp_style', 
                'value' => array('1','2','3')
            ),
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
            "std"   => 'large'
         ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Number Of Posts", "js_composer"),
            "param_name" => "max_pos",
            'value' => '5',
            "description" => esc_html__("Max. Number of Posts.", "js_composer"),
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Max. Number of words", "js_composer"),
            "param_name" => "max_words",
            'value' => '20',
            "description" => esc_html__("Enter -1 to disable this.", "js_composer"),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Non Carousel Columns", "js_composer"),
            "param_name" => "rp_cols",
            "value" => array(
                '1 Columns'   => '12',
                '2 Columns'   => '6',
                '3 Columns'   => '4',
                '4 Columns'   => '3',
            ),
            "description" => esc_html__("Number of Coulmns in case not Carousel view.", "js_composer"),
            'dependency' => array( 'element' => 'rp_style', 'value' => array('1','2','3')),
        )
        ,array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )  
    )
);
    