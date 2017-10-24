<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $content - shortcode content
 * @var $this WPBakeryShortCode_VC_Tta_Accordion|WPBakeryShortCode_VC_Tta_Tabs|WPBakeryShortCode_VC_Tta_Tour|WPBakeryShortCode_VC_Tta_Pageable
 */
$el_class = $output = $acc_t_color = $acc_t_bg_color = $acc_t_border_color = $acc_t_border_color = $act_acc_t_color = $act_acc_t_bg_color = $act_acc_t_border_color = $sec_acc_bg_color = $sec_acc_color = $acc_icon_color = $act_acc_icon_color = $css = $css_animation = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
$this->resetVariables( $atts, $content );
extract( $atts );

$this->setGlobalTtaInfo();

$this->enqueueTtaStyles();
$this->enqueueTtaScript();
$accid = uniqid('accr-', '');

$output .= "<style type='text/css'>";
    if( $acc_t_color != ''){
        $output .= ".{$accid}.vc_tta.vc_general .vc_tta-panel-heading a{";
            $output .= "color:{$acc_t_color} !important;";
        $output .= "}";
    }
    
    if( $acc_t_bg_color != '' ){
        $output .= ".{$accid}.vc_tta.vc_general .vc_tta-panel-heading {";
            $output .= "background-color:{$acc_t_bg_color};";    
        $output .= "}";
    }
    
    if( $acc_t_border_color != '' ){
        $output .= ".{$accid}.vc_tta.vc_general .vc_tta-panel-heading{";
            $output .= "border-color:{$acc_t_border_color};";    
        $output .= "}";
    }
    
    if( $acc_t_border_color == '' && $style == 'classic' ){
        $output .= ".{$accid}.vc_tta.vc_general .vc_tta-panel-heading{";
            $output .= "border-width:0px !important;";    
        $output .= "}";
    }
    
    if( $act_acc_t_color != '' ){
        $output .= ".{$accid}.vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-heading a{";
            $output .= "color:{$act_acc_t_color} !important;"; 
        $output .= "}";
    }
    
    if( $act_acc_t_bg_color != '' ){
        $output .= ".{$accid}.vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-heading {";
            $output .= "background-color:{$act_acc_t_bg_color};";    
        $output .= "}";
    }
    
    if( $act_acc_t_border_color != '' ){
        $output .= ".{$accid}.vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-heading{";
            $output .= "border-color:{$act_acc_t_border_color};";    
        $output .= "}";
    }
    
    if( $sec_acc_bg_color != '' || $sec_acc_color != '' ){
        $output .= ".{$accid}.vc_tta.vc_general .vc_tta-panel-body{";
            if( $sec_acc_bg_color != '' ){
                $output .= "background-color:{$sec_acc_bg_color};";    
            } 
            if( $sec_acc_color != '' ){
                $output .= "color:{$sec_acc_color};";    
            }  
        $output .= "}";
    }
    
    if( $acc_icon_color != '' ){
        $output .= ".{$accid}.vc_tta.vc_general .vc_tta-panel .vc_tta-icon{";
            $output .= "color:{$acc_icon_color};"; 
        $output .= "}";
    }
    
    if( $act_acc_icon_color != '' ){
        $output .= ".{$accid}.vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-icon{";
            $output .= "color:{$act_acc_icon_color};"; 
        $output .= "}";
    }
    
$output .= "</style>";


// It is required to be before tabs-list-top/left/bottom/right for tabs/tours
$prepareContent = $this->getTemplateVariable( 'content' );

$class_to_filter = $this->getTtaGeneralClasses();
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$class_to_filter .= ' vc_tta-size-'.$size;
$class_to_filter .= ' '.$accid;
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$output .= '<div ' . $this->getWrapperAttributes() . '>';
    $output .= $this->getTemplateVariable( 'title' );
    $output .= '<div class="' . esc_attr( $css_class ) . '">';
        $output .= $this->getTemplateVariable( 'tabs-list-top' );
        $output .= $this->getTemplateVariable( 'tabs-list-left' );
        $output .= '<div class="vc_tta-panels-container">';
            $output .= $this->getTemplateVariable( 'pagination-top' );
            $output .= '<div class="vc_tta-panels">';
                $output .= $prepareContent;
            $output .= '</div>';
            $output .= $this->getTemplateVariable( 'pagination-bottom' );
        $output .= '</div>';
        $output .= $this->getTemplateVariable( 'tabs-list-bottom' );
        $output .= $this->getTemplateVariable( 'tabs-list-right' );
    $output .= '</div>';
$output .= '</div>';

echo $output;
