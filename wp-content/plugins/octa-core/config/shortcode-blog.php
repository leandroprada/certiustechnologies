<?php
return array(
    "name" => esc_html__("Blog Shortcode", "js_composer"),
    "base" => "it_blog",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-book',
    'description' => esc_html__( 'Add Blog Posts To Page', 'js_composer' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Category",'octa'),
            "param_name" => "it_category",
            "value" => it_dropdown_cats(),
            "description" => esc_html__("type the post category.",'octa')
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Blog Style",'octa'),
            "param_name" => "blog_style",
            "value" => array(
                'Large Image' => 'lg-image',
                'Small Image' => 'small-image',
                'Blog Grid' => 'grid',
                'Blog Masonry' => 'masonry',
                'TimeLine' => 'timeline',
            ),
            "description" => esc_html__("Select the Blog Style.",'octa'),
            "std"   => 'lg-image'
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Timeline style",'octa'),
            "param_name" => "tl_sidebar",
            "value" => array(
                'Left Side Bar' => 'left_bar',
                'Right Side Bar' => 'right_bar',
                'No Side Bar' => 'no_bar',
            ),
            'dependency' => array(
                'element' => 'blog_style',
                'value' => array('timeline')
            ),                            
            "description" => esc_html__("select the timeline style.",'octa'),
            "std"   => 'left_bar'
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Coulmns",'octa'),
            "param_name" => "blog_cols",
            "value" => array(
                '2 Columns' => '6',
                '3 Columns' => '4',
                '4 Columns' => '3',
            ),
            'dependency' => array(
                'element' => 'blog_style',
                'value' => array('grid','masonry')
            ),                              
            "description" => esc_html__("select how many coulmns.",'octa'),
            "std"   => '4'
         ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Max. Number of words", "js_composer"),
            "param_name" => "max_words",
            'value' => '40',
            "description" => esc_html__("Enter -1 to disable this.", "js_composer"),
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
            "description" => esc_html__("select the image size.",'octa'),
            "std"   => 'large'
         ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Posts Per Page",'octa'),
            "param_name" => "posts_per_page",
            "std" => '10',
            "description" => esc_html__("Number of posts shown per page.",'octa')
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Pager Type",'octa'),
            "param_name" => "pager_type",
            "value" => array(
                'Numeric' => '1',
                'Older - Newer' => '2',
                'Load More' => '3'
            ),                           
            "description" => esc_html__("select the pager type.",'octa'),
            "std"   => '1'
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Load More Text",'octa'),
            "param_name" => "load_txt",
            'dependency' => array(
                'element' => 'pager_type',
                'value' => '3'
            ),                              
            "description" => esc_html__("Text to be shown on load more button.",'octa'),
            "std"   => 'Load More'
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Pager Style",'octa'),
            "param_name" => "pager_style",
            "value" => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
                'Style 3' => 'style3',
                'Style 4' => 'style4',
                'Style 5' => 'style5',
            ),
            'dependency' => array(
                'element' => 'pager_type',
                'value' => array('1')
            ),                              
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Pager Position",'octa'),
            "param_name" => "pg_pos",
            "value" => array(
                'Center' => 'centered',
                'Left' => 'left',
                'Right' => 'right',
            ),
            'dependency' => array(
                'element' => 'pager_type',
                'value' => array('1')
            ),                              
            "description" => esc_html__("select Pager Position.",'octa'),
            "std"   => 'centered'
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    )
);
    