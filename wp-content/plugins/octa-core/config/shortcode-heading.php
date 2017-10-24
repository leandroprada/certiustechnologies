<?php
return array(
    'name' => esc_html__( 'Heading', 'js_composer' ),
    'base' => 'it_heading',
    'icon' => 'no-bg fa fa-header',
    'save_always' => true,
    'show_settings_on_create' => true,
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'Add heading with custom styles', 'js_composer' ),
    'params' => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style",'octa'),
            "param_name" => "heading_style",
            "value" => array(
                'Style 1'   => 'main',
                'Style 2'   => 'style2',
                'Style 3'   => 'style3',
                'Style 4'   => 'style4',
                'Simple'    => 'simple',
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Alignment",'octa'),
            "param_name" => "heading_align",
            "value" => array(
                'Left'      =>'left',
                'Center'    =>'centered',
                'Right'     =>'right',
            ),
        ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use Icon', 'js_composer' ),
            'param_name' => 'use_icon',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),
        it_animation(),
        it_animation_delay(),
        it_animation_duration(),    
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'js_composer' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
        ),array(
            'type' => 'textarea_html',
            'heading' => esc_html__( 'Text', 'js_composer' ),
            'param_name' => 'content', 
            'admin_label' => true,
            'group' => 'Heading',
            'value' => esc_html__( 'This is custom heading element', 'js_composer' ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Tag",'octa'),
            "param_name" => "tag",
            'group' => 'Heading',
            "value" => array(
                'H1' =>'h1',
                'H2' =>'h2',
                'H3' =>'h3',
                'H4' =>'h4',
                'H5' =>'h5',
                'H6' =>'h6',
            ),
            "std"  => 'h3'
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Font Family', 'js_composer' ),
            'param_name' => 'family',
            'edit_field_class' => 'fontSel',
            'group' => 'Heading',
            'value' => it_googleFonts(),
        ),array(
            'type' => 'label',
            'heading' => esc_html__( 'This is Custom Font Family With Google Fonts.', 'js_composer' ),
            'param_name' => 'gfont',
            'group' => 'Heading',
            'edit_field_class' => 'gfonts',
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Font Weight', 'js_composer' ),
            'param_name' => 'weight',
            'group' => 'Heading',
            'value' => array(
                '-- Select --' => '',
                'normal' => 'normal',
                'bold' => 'bold',
                'lighter' => 'lighter',
                'bolder' => 'bolder',
                '100' => '100',
                '200' => '200',
                '300' => '300',
                '400' => '400',
                '500' => '500',
                '600' => '600',
                '700' => '700',
                '800' => '800',
                '900' => '900',
                'inherit' => 'inherit'
            ),
            'std'  => '400'
        ),array(
            'type' => 'numberfield',
            'heading' => esc_html__( 'Font Size (px)', 'js_composer' ),
            'param_name' => 'size',
            'group' => 'Heading',
        ),array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Text', 'js_composer' ),
            'param_name' => 'sub_text',
            'holder' => 'div',
            'admin_label' => true,
            'group' => 'Sub Heading',
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Position', 'js_composer' ),
            'param_name' => 'sub_position',
            'group' => 'Sub Heading',
            'value' => array(
                'Above Heading' => 'above',
                'Below Heading' => 'below',
            ),
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Font Family', 'js_composer' ),
            'param_name' => 'sub_family',
            'edit_field_class' => 'fontSel',
            'group' => 'Sub Heading',
            'value' => it_googleFonts(),
            'std' => 'Playfair Display'
        ),array(
            'type' => 'label',
            'heading' => esc_html__( 'This is Custom Font Family With Google Fonts.', 'js_composer' ),
            'param_name' => 'sgfont',
            'group' => 'Sub Heading',
            'edit_field_class' => 'gfonts',
        ),array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Color', 'js_composer' ),
            'param_name' => 'sub_color',
            'group' => 'Sub Heading',
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Font Style', 'js_composer' ),
            'param_name' => 'sub_font_style',
            'group' => 'Sub Heading',
            'value' => array(
                'Normal' => '',
                'Italic' => 'italic',                
            ),
            'std' => 'italic'
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Font Weight', 'js_composer' ),
            'param_name' => 'sub_weight',
            'group' => 'Sub Heading',
            'value' => array(
                '-- Select --' => '',
                'normal' => 'normal',
                'bold' => 'bold',
                'lighter' => 'lighter',
                'bolder' => 'bolder',
                '100' => '100',
                '200' => '200',
                '300' => '300',
                '400' => '400',
                '500' => '500',
                '600' => '600',
                '700' => '700',
                '800' => '800',
                '900' => '900',
                'inherit' => 'inherit'
            ),
        ),
        array(
            'type' => 'numberfield',
            'heading' => esc_html__( 'Font Size (px)', 'js_composer' ),
            'param_name' => 'sub_size',
            'group' => 'Sub Heading',
            'std' => '19'
        ),
        icons_lib(),
        icons_fa(),
        icons_oc(),
        icons_ti(),
        icons_entypo(),
        icons_line(),
        icons_px(),
        icons_material(),
        icons_ios7(),
        icons_med(),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Icon Color', 'js_composer' ),
            'param_name' => 'icon_color',
            'group'  => 'Icon',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true)
        )
    )
);
    