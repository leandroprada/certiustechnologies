<?php
return array(
    "name" => esc_html__("Countdown Timer", "js_composer"),
    "base" => "it_countdown",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'Add Countdown Timer with many styles', 'js_composer' ),
    'icon' => 'no-bg fa fa-clock-o',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style",'octa'),
            "param_name" => "countdown_style",
            "value" => array(
                'Simple'                    =>'simple',
                'Large with Custom BG'      =>'cells-countdown',
                'Large Dashed Border'       =>'lg-countdown style-1',
                'Large Circled Border'      =>'lg-countdown style-2',
                'Large with Theme BG'       => 'lg-countdown style-3',
                'Light Semi Transparent BG' => 'lg-countdown style-1 light',
                'Dark Semi Transparent BG'  => 'lg-countdown style-1 dark',
                'Large with Custom Design'  => 'count-box'
            ),
            "description" => esc_html__("Select countdown style.",'octa')
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Date", "js_composer"),
            "param_name" => "count_date",
            "description" => esc_html__("Choose date.", "js_composer")
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Time", "js_composer"),
            "param_name" => "count_time",
            "description" => esc_html__("Enter time (Ex: 12:34:56).", "js_composer")
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__("Simple Countdown Style",'octa'),
            "param_name" => "countdown_simple",
            'dependency' => array('element' => 'countdown_style','value' => 'simple'),
            "value" => array(
                'Simple'                    =>'simple-count',
                'Months Style'              =>'months-style',
                'Large Bold'                =>'font-25 bold',
                'Legacy Countdown'          =>'legacy-count',
                'Separated Cells'           => 'separated-cells',
                'Separated Cells Large'     => 'separated-cells lg'
            ),
         ),
         it_animation(),
         it_animation_delay(),
         it_animation_duration(),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "js_composer")
        )
    )
);
    
