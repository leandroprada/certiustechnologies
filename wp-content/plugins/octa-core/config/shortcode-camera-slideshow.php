<?php
return array(
    "name" => esc_html__("Camera Slideshow", "js_composer"),
    "base" => "it_camera_slideshow",
    "as_parent" => array('only' => 'it_camera_slide'),
    'icon' => 'no-bg fa fa-camera',
    'save_always' => true,
    "show_settings_on_create" => true,
    'category' => esc_html__( 'OCTA Shortcodes', 'js_composer' ),
    "content_element" => true,
    'description' => esc_html__( 'Add Camera Slideshow parent container', 'js_composer' ),
    "params" => array(
        array(
            "type" => "textfield",
            'heading' => esc_html__( 'Height', 'js_composer' ),
            'param_name' => 'height',
            'std' => '500px',
            "description" => esc_html__("Set the height in pixels (Ex: '300px').",'octa')
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Animation",'octa'),
            "param_name" => "fx",
            "value" => array(
                'random' => 'random',
                'simpleFade' => 'simpleFade', 
                'curtainTopLeft' => 'curtainTopLeft', 
                'curtainTopRight' => 'curtainTopRight', 
                'curtainBottomLeft' => 'curtainBottomLeft', 
                'curtainBottomRight' => 'curtainBottomRight', 
                'curtainSliceLeft' => 'curtainSliceLeft', 
                'curtainSliceRight' => 'curtainSliceRight', 
                'blindCurtainTopLeft' => 'blindCurtainTopLeft', 
                'blindCurtainTopRight' => 'blindCurtainTopRight', 
                'blindCurtainBottomLeft' => 'blindCurtainBottomLeft', 
                'blindCurtainBottomRight' => 'blindCurtainBottomRight', 
                'blindCurtainSliceBottom' => 'blindCurtainSliceBottom', 
                'blindCurtainSliceTop' => 'blindCurtainSliceTop', 
                'stampede' => 'stampede', 
                'mosaic' => 'mosaic', 
                'mosaicReverse' => 'mosaicReverse', 
                'mosaicRandom' => 'mosaicRandom', 
                'mosaicSpiral' => 'mosaicSpiral', 
                'mosaicSpiralReverse' => 'mosaicSpiralReverse', 
                'topLeftBottomRight' => 'topLeftBottomRight', 
                'bottomRightTopLeft' => 'bottomRightTopLeft', 
                'bottomLeftTopRight' => 'bottomLeftTopRight', 
                'bottomLeftTopRight' => 'bottomLeftTopRight', 
                'scrollLeft' => 'scrollLeft', 
                'scrollRight' => 'scrollRight', 
                'scrollHorz' => 'scrollHorz', 
                'scrollBottom' => 'scrollTop', 
                'scrollTop' => 'scrollTop'
            ),
            "std"   => "simpleFade",
            "description" => esc_html__("Select Animation.",'octa')
         ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Loader', 'js_composer' ),
            'param_name' => 'loader',
            'value' => array(
                'pie' => 'pie',
                'bar' => 'bar',
                'none' => 'none',
            ),
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Alignment', 'js_composer' ),
            'param_name' => 'align',
            'value' => array(
                'topLeft' => 'topLeft',
                'topCenter' => 'topCenter',
                'topRight' => 'topRight',
                'centerLeft' => 'centerLeft',
                'center' => 'center',
                'centerRight' => 'centerRight',
                'bottomLeft' => 'bottomLeft',
                'bottomCenter' => 'bottomCenter',
                'bottomRight' => 'bottomRight',
            ),
            "std" => "topRight"
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Bar Direction', 'js_composer' ),
            'param_name' => 'bardirection',
            'value' => array(
                'leftToRight' => 'leftToRight',
                'rightToLeft' => 'rightToLeft',
                'topToBottom' => 'topToBottom',
                'bottomToTop' => 'bottomToTop',
            ),
            "std" => "leftToRight"
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Bar Position', 'js_composer' ),
            'param_name' => 'barposition',
            'edit_field_class' => 'vc_col-xs-4 vc_column',
            'value' => array(
                'left' => 'left',
                'right' => 'right',
                'top' => 'top',
                'bottom' => 'bottom',
            ),
            "std" => "left"
        ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Pagination', 'js_composer' ),
            'param_name' => 'pagination',
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
        ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Thumbnails', 'js_composer' ),
            'param_name' => 'thumbnails',
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
        ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Navigation', 'js_composer' ),
            'param_name' => 'navigation',
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
        ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'playPause', 'js_composer' ),
            'param_name' => 'pl_pause',
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