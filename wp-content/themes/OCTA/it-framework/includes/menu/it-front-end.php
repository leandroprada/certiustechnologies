<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

class it_walker extends Walker_Nav_Menu{
      
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0){
        
        $megamenu = $innermenu = $col_mega = $megaclass = $item_output = '';
        $column = 1; 
        $t_ico = theme_option('header-icons');       
        $m_ico = get_post_meta(c_page_ID(),'meta_header_icons',true);
        $t_sico = theme_option('header-sub-icons');       
        $m_sico = get_post_meta(c_page_ID(),'meta_header_sub_icons',true);
        $t_title = theme_option('header-subtitle');       
        $m_title = get_post_meta(c_page_ID(),'meta_header_subtitle',true);
        $icon = get_post_meta($item->ID,'menu-item-icon',true);
        $hint = get_post_meta($item->ID,'menu-item-hint',true);
        $hid_title = get_post_meta($item->ID,'menu-item-hide_title',true);
        $hint_type = get_post_meta($item->ID,'menu-item-hint_type',true);
        $megamenu = get_post_meta($item->ID,'menu-item-megamenu',true);
        $innermenu = get_post_meta($item->ID,'menu-item-inner_mega',true);
        $column = get_post_meta($item->ID,'menu-item-column',true);
        
        if($megamenu == 1 && $depth == 0 ){
            $megaclass = ' mega-menu';
        }
        
        if($megamenu == 1 ){
            $col_mega = (12/$column);
        }
        
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
                
        $labelclass = (isset($item->nav_label) && ($item->nav_label == 1));
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );          
        $class_names = ' class="'. $class_names . $megaclass . $labelclass .'"';  

        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $class_names.' data-mega="'.$col_mega.'">';

        $attributes = ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : '';

        $prepend = '';
        $append = '';
        $description  = ! empty( $item->description ) ? '<span class="description">'.esc_attr( $item->description ).'</span>' : '';
        
        $item_output .= $args->before;

        if( $depth == 0 ){
        
            $item_output .= '<a '. $attributes .'><span>';
            if($depth == 0){
                if($m_ico == '1' || ($t_ico == 1 && $m_ico == '')){
                    if($icon != ''){
                       $item_output .= '<i class="'.$icon.'"></i>'; 
                    }
                }    
            } else{
                if($m_sico == '1' || ($t_sico == 1 && $m_sico == '')){
                    if($icon != ''){
                       $item_output .= '<i class="'.$icon.'"></i>'; 
                    }
                }    
            }
                    
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            if(! empty ($hint)){
                $item_output .= '<b class="menu-hint '. $hint_type .'">'. $hint .'</b>';
            }
            
            $item_output .= '</span>';
            if($m_title == '1' || ($t_title == 1 && $m_title == '')){
                if($item->attr_title != ''){
                    $item_output .= '<b class="sub-t">'.esc_attr( $item->attr_title ).'</b>';
                }
            }
            $item_output .= '</a>';
        
        } else {
            
            if( $hid_title == 0 ){
               
                $item_output .= '<a '. $attributes .'><span>';
                if($depth == 0){
                    if($m_ico == '1' || ($t_ico == 1 && $m_ico == '')){
                        if($icon != ''){
                           $item_output .= '<i class="'.$icon.'"></i>'; 
                        }
                    }    
                } else{
                    if($m_sico == '1' || ($t_sico == 1 && $m_sico == '')){
                        if($icon != ''){
                           $item_output .= '<i class="'.$icon.'"></i>'; 
                        }
                    }    
                }
                        
                $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
                $item_output .= $description.$args->link_after;
                if(! empty ($hint)){
                    $item_output .= '<b class="menu-hint '. $hint_type .'">'. $hint .'</b>';
                }
                
                if($m_title == '1' || ($t_title == 1 && $m_title == '')){
                    if($item->attr_title != ''){
                        $item_output .= '<b class="sub-t">'.esc_attr( $item->attr_title ).'</b>';
                    }
                }
                
                $item_output .= '</span></a>'; 
                   
            }
             
        }

        $item_output .= $this->get_dynamic_sidebar( $innermenu );
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
 
    }
    
    function get_dynamic_sidebar($index) {
        $sidebar_contents = "";
        ob_start();
        dynamic_sidebar($index);
        $sidebar_contents = ob_get_clean();
        return $sidebar_contents;
    }
    
}