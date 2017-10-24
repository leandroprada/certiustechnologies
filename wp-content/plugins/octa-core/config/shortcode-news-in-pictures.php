<?php
return array(
    "name" => esc_html__("News In Pictures", "js_composer"),
    "base" => "it_new_in_pictures",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-photo',
    'description' => esc_html__( 'Choose images in news to show in page', 'js_composer' ),
    "params" => array(
        array(
            "type" => "it_multiselect",
            "heading" => esc_html__("Category",'octa'),
            "param_name" => "it_cat",
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
            "std"   => 'large'
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Number Of Posts", "js_composer"),
            "param_name" => "np_max_posts",
            'value' => '25',
            "description" => esc_html__("Max. Number of Posts.", "js_composer"),
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )  
    )
);
    