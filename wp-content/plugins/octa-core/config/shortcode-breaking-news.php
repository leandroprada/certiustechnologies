<?php
return array(
    "name" => esc_html__("Breaking News", "js_composer"),
    "base" => "it_breaking_news",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'Add breaking news to page', 'js_composer' ),
    'icon' => 'no-bg fa fa-tasks',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'octa'),
            "param_name" => "it_title",
            "description" => esc_html__("type the title.",'octa')
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Category",'octa'),
            "param_name" => "it_cat",
            "value" => it_dropdown_cats(),
            "description" => esc_html__("type the item category.",'octa')
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )  
    ),
);
    