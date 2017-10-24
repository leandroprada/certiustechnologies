<?php
return array(
    "name" => esc_html__("Facebook Box", 'js_composer'),
    "base" => "it_facebook",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-facebook',
    "class" => "",
    'description' => esc_html__( 'Add Facebook box', 'js_composer' ),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
         array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Facebook Page URL', 'js_composer' ),
            'param_name' => 'facebook_user',
            'description' => esc_html__( 'e.g., http://www.facebook.com/itrays', 'js_composer' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Tabs', 'js_composer' ),
            'param_name' => 'facebook_tabs',
            'std' => 'timeline',
            'description' => esc_html__( 'e.g., timeline, messages, events.', 'js_composer' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Width', 'js_composer' ),
            'param_name' => 'facebook_width',
            'std' => '250px',
            'description' => esc_html__( 'The pixel width of the embed (Min. 180 to Max. 500)', 'js_composer' ),
        ),array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Height', 'js_composer' ),
            'param_name' => 'facebook_height',
            'std' => '350px',
            'description' => esc_html__( 'The pixel height of the embed (Min. 70)', 'js_composer' ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use Small Header', 'js_composer' ),
            'param_name' => 'fb_sm_header',
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Adapt to container width', 'js_composer' ),
            'param_name' => 'fb_adapt_width',
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Hide Cover Photo', 'js_composer' ),
            'param_name' => 'fb_hide_cover',
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Show Friends Faces', 'js_composer' ),
            'param_name' => 'fb_friends',
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'js_composer' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
        )
    )
);
    
