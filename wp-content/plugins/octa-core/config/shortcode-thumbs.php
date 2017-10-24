<?php
return array(
    "name" => esc_html__("Thumbnails Gallery", "js_composer"),
    "base" => "it_thumbs_gallery",
    "as_parent" => array('only' => 'it_thumb'),
    'icon' => 'no-bg fa fa-camera',
    'save_always' => true,
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    "content_element" => true,
    "show_settings_on_create" => true,
    'description' => esc_html__( 'Add thumbs gallery parent container', 'js_composer' ),
    "params" => array(
        array(
            "type" => "numberfield",
            'heading' => esc_html__( 'Row Height (px)', 'js_composer' ),
            'param_name' => 'height',
            'std'   => '150',
            "description" => esc_html__("Set the row height in pixels (Ex: '300px').",'octa')
        ),array(
            "type" => "numberfield",
            'heading' => esc_html__( 'Margins (px)', 'js_composer' ),
            'param_name' => 'margins',
            'std'   => '0',
            "description" => esc_html__("Set the margin between images (Ex: '15').",'octa')
        ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Animate Images?', 'js_composer' ),
            'param_name' => 'anim_imgs',
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    ),
    "js_view" => 'VcColumnView'
);