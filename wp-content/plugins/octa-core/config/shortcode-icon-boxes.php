<?php
return array(
    "name" => esc_html__("Icon Box", 'js_composer'),
    "base" => "it_iconbox",
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-bars',
    'description' => esc_html__( 'icon boxes with many styles', 'js_composer' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Box Style",'octa'),
            "param_name" => "icbx_style",
            "value" => array(
                'Classic'           => 'icon_box_classic',
                'Style 2'           => 'icon_box_alt',
                'Style 3'           => 'icon_box_alt2',
                'Hover Animation'   => 'box-item'
            ),
            "group" => "Box",
            "std" => "icon_box_classic",
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Shape",'octa'),
            "param_name" => "box_shape",
            "value" => array(
                'Square'    => 'square',
                'Rounded'   => 'rounded',
                'round'     => 'rounded-lg',
            ),
            "group" => "Box",
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Box Align",'octa'),
            "param_name" => "icbx_align",
            "group" => "Box",
            "value" => array(
                'Left' => 'text-left',
                'Center' => 'text-center',
                'Right' => 'text-right',
            ),
         ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use Icon', 'js_composer' ),
            'param_name' => 'use_icon',
            "group" => "Box",
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'std'  => '1'
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "icbx_bg_color",
            "group" => "Box",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "js_composer"),
            "param_name" => "icbx_border_color",
            "group" => "Box",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - BG Color", "js_composer"),
            "param_name" => "icbx_hover_bg_color",
            "group" => "Box",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Border Color", "js_composer"),
            "param_name" => "icbx_hover_border_color",
            "group" => "Box",
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'octa'),
            "param_name" => "icbx_title",
            "group" => 'Title',
         ),array(
            "type" => "vc_link",
            "heading" => esc_html__("Link", "js_composer"),
            "param_name" => "icbx_link",
            "group" => 'Title',
            "description" => esc_html__("enter the link for title and read more link.", "js_composer")
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Title Tag",'octa'),
            "param_name" => "icbx_title_tag",
            'group' => 'Title',
            "value" => array(
                'H1' =>'h1',
                'H2' =>'h2',
                'H3' =>'h3',
                'H4' =>'h4',
                'H5' =>'h5',
                'H6' =>'h6',
            ),
            "std"  => 'h4'
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "icbx_title_color",
            "group" => 'Title',
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Bottom Color", "js_composer"),
            "param_name" => "icbx_title_border_color",
            "group" => 'Title',
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Color", "js_composer"),
            "param_name" => "icbx_title_hover_color",
            "group" => 'Title',
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Border Bottom Color", "js_composer"),
            "param_name" => "icbx_title_hover_border_color",
            "group" => 'Title',
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Sub Title",'octa'),
            "param_name" => "icbx_subtitle",
            "group" => 'Sub Title',
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Sub Title Tag",'octa'),
            "param_name" => "icbx_subtitle_tag",
            'group' => 'Sub Title',
            "value" => array(
                'H1' =>'h1',
                'H2' =>'h2',
                'H3' =>'h3',
                'H4' =>'h4',
                'H5' =>'h5',
                'H6' =>'h6',
            ),
            "std"  => 'h6'
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "icbx_subtitle_color",
            "group" => 'Sub Title',
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "icbx_subtitle_bg_color",
            "group" => 'Sub Title',
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Color", "js_composer"),
            "param_name" => "icbx_sub_hover_color",
            "group" => 'Sub Title',
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Background Color", "js_composer"),
            "param_name" => "icbx_sub_hover_bg_color",
            "group" => 'Sub Title',
        ),array(
            "type" => "textarea_html",
            "group" => "Content",
            "heading" => esc_html__("Content",'octa'),
            "param_name" => "content",
            "value" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar.",
            "description" => esc_html__("type here the description for the icon box content.",'octa')
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Color", "js_composer"),
            "param_name" => "content_hover_color",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            "group" => "Content",
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Icon Type",'octa'),
            "param_name" => "icon_typ",
            'edit_field_class'   => 'select_bxs',
            "value" => array(
                'Icon' => 'icon',
                'Text' => 'text',
                'Image' => 'image',
            ),
            'dependency' => array(
                'element' => 'use_icon', 
                'not_empty' => true
            ),
            "group" => "Icon",
        ),
        icons_lib_ic(),
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
            "type" => "textfield",
            "heading" => esc_html__("Text",'octa'),
            "param_name" => "icon_text",
            "group" => "Icon",
            'dependency' => array(
                'element' => 'icon_typ', 'value' => 'text'
            ),
            "description" => __("<b>Note:</b>This Will replace the icon with your new text.",'octa')
         ),array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'octa'),
            "param_name" => "icon_image",
            "group" => "Icon",
            'dependency' => array(
                'element' => 'icon_typ', 'value' => 'image'
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Position",'octa'),
            "param_name" => "icon_position",
            "value" => array(
                'Side - Before Content' => 'before_content',
                'Before Title' => 'before_title',
                'Block' => 'block_icon',
            ),
            'dependency' => array(
                'element' => 'use_icon', 
                'not_empty' => true
            ),
            "group" => "Icon",
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Alignment",'octa'),
            "param_name" => "icon_align",
            "group" => "Icon",
            "value" => array(
                'Left' => 'left',
                'Center' => 'center',
                'Right' => 'right',
            ),
            'dependency' => array(
                'element' => 'use_icon', 
                'not_empty' => true
            ),
         ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Shape",'octa'),
            "param_name" => "icon_shape",
            "value" => array(
                'Square'    => 'square',
                'Rounded'   => 'rounded',
                'round'     => 'rounded-lg',
                'Circle'    => 'circle',
                'Diamond'   => 'diamond'
            ),
            "group" => "Icon",
            'dependency' => array(
                'element' => 'use_icon', 
                'not_empty' => true
            )
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Size",'octa'),
            "param_name" => "icon_size",
            "value" => array(
                'X-Small'   => 'box-xs-icon',
                'Small'     => 'box-sm-icon',
                'Medium'    => 'box-md-icon',
                'Large'     => 'box-lg-icon',
                'X-Large'   => 'box-xl-icon',
                'XX-Large'  => 'box-xxl-icon'
            ),
            'dependency' => array(
                'element' => 'use_icon', 
                'not_empty' => true
            ),
            "group" => "Icon",
            "std"   => "box-md-icon"
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "icon_color",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            "group" => "Icon",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "icon_bg_color",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            "group" => "Icon",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "js_composer"),
            "param_name" => "icon_border_color",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            "group" => "Icon",
        ),array(
            "type" => "numberfield",
            "heading" => esc_html__("Border Width", "js_composer"),
            "param_name" => "icon_border_width",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            "group" => "Icon",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Color", "js_composer"),
            "param_name" => "icon_hover_color",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            "group" => "Icon",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - BG Color", "js_composer"),
            "param_name" => "icon_hover_bg_color",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            "group" => "Icon",
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Border Color", "js_composer"),
            "param_name" => "icon_hover_border_color",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            "group" => "Icon",
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Hover Style",'octa'),
            "param_name" => "icon_hover",
            "value" => array(
                'Style 1'   => 'hover_1',
                'Style 2'   => 'hover_2',
                'Style 3'   => 'hover_3',
                'None'      => 'none'
            ),
            'dependency' => array(
                'element' => 'use_icon', 
                'not_empty' => true
            ),
            "group" => "Icon",
            "std"   => "hover_1"
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Read More Link ?", "js_composer"),
            "param_name" => "show_more",
            'group' => 'More Link',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Read More Text",'octa'),
            "param_name" => "more_text",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Style",'octa'),
            "param_name" => "more_style",
            "group" => "More Link",
            "value" => array(
                'Default Button' =>'',
                'Dots Button' =>'style2',
                'Animated Arrow' =>'style3',
            ),
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Alignment",'octa'),
            "param_name" => "more_align",
            "group" => "More Link",
            "value" => array(
                'Left' =>'left',
                'Center' =>'centered',
                'Right' =>'right',
            ),
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "more_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "more_bg_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "js_composer"),
            "param_name" => "more_border_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Color", "js_composer"),
            "param_name" => "more_hover_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Background Color", "js_composer"),
            "param_name" => "more_hover_bg_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
            ),
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover - Border Color", "js_composer"),
            "param_name" => "more_hover_border_color",
            'group' => 'More Link',
            'dependency' => array(
                'element' => 'show_more', 'not_empty' => true,
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
    