<?php
return array(
    "name" => esc_html__("Modal Popup", 'js_composer'),
    "base" => "it_modal", 
    "as_parent" => array('except' => 'row'),
    "content_element" => true,
    "show_settings_on_create" => true,
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'Add Bootstrap Modal Popup', 'js_composer' ),
    'icon' => 'no-bg fa fa-paper-plane',
    "params" => array(
         array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'octa'),
            "group" => "Modal Settings",
            "param_name" => "modal_title"
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__("Style",'octa'),
            "param_name" => "modal_style",
            "group" => "Modal Settings",
            "value" => array(
                'Default' =>'default',
                'Success' =>'success',
                'Danger' =>'danger',
                'Info' =>'info',
                'Warning' =>'warning',
                'Primary' =>'primary',
            )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__("Size",'octa'),
            "param_name" => "modal_size",
            "group" => "Modal Settings",
            "value" => array(
                'Default' =>'',
                'Large' =>'modal-lg',
                'Small' =>'modal-sm',
            )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__("Element",'octa'),
            "param_name" => "modal_element",
            "group" => "Modal Settings",
            "value" => array(
                'Button' =>'mod_button',
                'Image' =>'mod_image',
            )
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Hide Header', 'js_composer' ),
            'param_name' => 'hide_header',
            'description' => esc_html__( 'Hide Modal Top Header.', 'js_composer' ),
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
            'class' => 'it_checkbox',
            "group" => "Modal Settings",
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Hide Footer', 'js_composer' ),
            'param_name' => 'hide_footer',
            'description' => esc_html__( 'Hide Modal Bottom Footer.', 'js_composer' ),
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
            'class' => 'it_checkbox',
            "group" => "Modal Settings",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Close Button Text",'octa'),
            "group" => "Modal Settings",
            "param_name" => "close_button_text"
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "group" => "Modal Settings",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        ),
        array(
           'type' => 'dropdown',
            'heading' => esc_html__( 'Button Style', 'js_composer' ),
            'param_name' => 'button_style',
            "group" => "Button",
            'description' => esc_html__( 'Select button Style.', 'js_composer' ),
            'value' => array(
                'Button' => 'n-button',
                'Normal Link' => 'n-link',
            ),
            'dependency' => array(
                'element' => 'modal_element',
                'value' => 'mod_button',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button Text",'octa'),
            "group" => "Button",
            "param_name" => "button_text",
            'dependency' => array(
                'element' => 'modal_element',
                'value' => 'mod_button',
            ),
        ),
        array(
           'type' => 'dropdown',
            'heading' => esc_html__( 'Size', 'js_composer' ),
            'param_name' => 'button_size',
            "group" => "Button",
            'description' => esc_html__( 'Select button display size.', 'js_composer' ),
            'value' => array(
                'Tiny' => 'xs',
                'Small' => 'sm',
                'Normal' => 'md',
                'Large' => 'lg',
                'X-Large' => 'xl',
                'XX-Large' => 'xxl',
            ),
            'dependency' => array(
                'element' => 'button_style',
                'value' => 'n-button',
            ),
            'std' => 'md' 
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Shape', 'js_composer' ),
            'param_name' => 'button_shape', 
            "group" => "Button",
            'value' => array(
                esc_html__( 'Square', 'js_composer' ) => 'square',
                esc_html__( 'Rounded', 'js_composer' ) => 'rounded',
                esc_html__( 'Round', 'js_composer' ) => 'round',
                esc_html__( 'Circle', 'js_composer' ) => "circle",
            ),
            'dependency' => array(
                'element' => 'button_style',
                'value' => 'n-button',
            ),
            'description' => esc_html__( 'Select button shape.', 'js_composer' )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Color', 'js_composer' ),
            'param_name' => 'button_color',
            "group" => "Button",
            'description' => __( 'Select button color.', 'js_composer' ),
            'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
            'value' => array(
                __( 'Theme Color', 'js_composer' ) => 'main-bg',
                __( 'Classic Grey', 'js_composer' ) => 'default',
                __( 'Classic Blue', 'js_composer' ) => 'primary',
                __( 'Classic Turquoise', 'js_composer' ) => 'info',
                __( 'Classic Green', 'js_composer' ) => 'success',
                __( 'Classic Orange', 'js_composer' ) => 'warning',
                __( 'Classic Red', 'js_composer' ) => 'danger',
                __( 'Classic Black', 'js_composer' ) => 'inverse',
            ) + getVcShared( 'colors-dashed' ),
            'dependency' => array(
                'element' => 'button_style',
                'value' => 'n-button',
            ),
            'std' => 'main-bg',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Style', 'js_composer' ),
            'param_name' => 'button_out', 
            "group" => "Button",
            'value' => array(
                esc_html__( 'Flat', 'js_composer' ) => '',
                esc_html__( 'Outline', 'js_composer' ) => 'outline',
            ),
            'dependency' => array(
                'element' => 'button_style',
                'value' => 'n-button',
            ),
            'description' => esc_html__( 'Select button style.', 'js_composer' )
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Full Width ?', 'js_composer' ),
            'param_name' => 'block_btn',
            'description' => esc_html__( '', 'js_composer' ),
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
            'class' => 'it_checkbox',
            "group" => "Button",
            'dependency' => array(
                'element' => 'button_style',
                'value' => 'n-button',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("CSS class", "js_composer"),
            "param_name" => "btn_class",
            "group" => "Button",
            'dependency' => array(
                'element' => 'modal_element',
                'value' => 'mod_button',
            ),
            "description" => esc_html__("add extra CSS class for this button.", "js_composer")
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'octa'),
            "param_name" => "image",
            'group' => 'Image',
            "value" => '',
            'dependency' => array(
                'element' => 'modal_element',
                'value' => 'mod_image',
            ),
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Image Size",'octa'),
            "param_name" => "img_size",
            'group' => 'Image',
            "value" => array(
                'Small - 40x40' => '40x40',
                'Small - 55x55' => '55x55',
                'Small - 70x70' => '70x70',
                'Thumbnail - 150x150' => 'thumbnail',
                'Medium - 400x380' => 'blog-small-image',
                'Large - 1024x1024' => 'large',
                'Blog Large Image - 1170x470' => 'blog-large-image',
                'Original Size' => 'full'
            ),                           
            "description" => esc_html__("select the image size.",'octa'),
            "std"   => 'thumbnail',
            'dependency' => array(
                'element' => 'modal_element',
                'value' => 'mod_image',
            ),
        )
    ),
    "js_view" => 'VcColumnView'
);
    
