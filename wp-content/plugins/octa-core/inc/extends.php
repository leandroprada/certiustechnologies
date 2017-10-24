<?php 

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    
    class WPBakeryShortCode_it_testimonials extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {
            global $block_style;
            global $block_arrange;
            global $grid_cols;
            global $block_type;
            extract(shortcode_atts(array(
                'el_class'              => '',
                'block_style'           => '1',
                'block_arrange'         => '1',
                'block_type'            => 'carousel',
                'grid_cols'             => '',
                'v_type'                => 'horizontal',
                'v_slides'              => '1',
                'v_scroll'              => '1',
                'v_fade'                => '',
                'v_speed'               => '500',
                'v_arrows'              => '',
                'v_dots'                => '',
                'gap'                   => '0',
                'v_mode'                => '',
                'v_infinite'            => '',
                'v_auto'                => '',
                'arrow_color'           => '',
                'arrow_bg_color'        => '',
                'arrow_hover_color'     => '',
                'arrow_hover_bg_color'  => '',
                'arrow_pos'             => 'l-r-in',
                'next_icon'             => 'fa fa-chevron-left',
                'prev_icon'             => 'fa fa-chevron-right',
                'arrow_size'            => '14',
                'arrow_shape'           => 'square',
                'bullets_style'         => 'circle1',
                'bullet_color'          => '',
                'v_rtl'                 => '',
                
                'bg_color'              => '',
                'border_color'          => '',
                'border_width'          => '',
                'hover_bg_color'        => '',
                'hover_border_color'    => '',
                
                'padd_top'              => '',
                'padd_right'            => '',
                'padd_bottom'           => '',
                'padd_left'             => '',
                'margin_top'            => '',
                'margin_right'          => '',
                'margin_bottom'         => '',
                'margin_left'           => '',
            ), $atts));
                        
            $output = $class = $ar_sz = $bul_col = $custom_stle = $st = $style = '';
            
            $t2_slides      = ($v_slides !='')              ? " data-slidesnum='$v_slides'"             : "";
            $t2_type        = ($v_type !='')                ? " data-type='$v_type'"                    : "";
            $t2_scrolls     = ($v_scroll !='')              ? " data-scamount='$v_scroll'"              : "";
            $t2_fade        = ($v_fade !='')                ? " data-fade='$v_fade'"                    : "";               
            $t2_speed       = ($v_speed !='')               ? " data-speed='$v_speed'"                  : "";
            $t2_arrows      = ($v_arrows !='')              ? " data-arrows='$v_arrows'"                : "";
            $t2_dots        = ($v_dots !='')                ? " data-dots='$v_dots'"                    : "";
            $t2_auto        = ($v_auto !='')                ? " data-auto='$v_auto'"                    : "";
            $t2_infinite    = ($v_infinite !='')            ? " data-infinite='$v_infinite'"            : "";
            $t2_mode        = ($v_mode !='')                ? " data-center-mode='$v_mode'"             : "";
            $nx_ic          = ($next_icon !='')             ? " data-next-icon='$next_icon'"            : "";
            $pv_ic          = ($prev_icon !='')             ? " data-prev-icon='$prev_icon'"            : "";
            $bul_st         = ($bullets_style !='')         ? " data-bullet-style='$bullets_style'"     : "";
            $ar_shape       = ($arrow_shape !='')           ? " data-arrow-shape='$arrow_shape'"        : "";
            $rtl            = ($v_rtl !='')                 ? " data-rtl='$v_rtl'"                      : "";
                
            $testid = uniqid('testi-', '');
            if( $bg_color != '' || $border_color != '' || $padd_top != '' || $padd_right != '' || $padd_bottom != '' || $padd_left != '' || $margin_top != '' || $margin_right != '' || $margin_bottom != '' || $margin_left != '' ){
                $custom_stle .= ".{$testid}{";
                    $custom_stle .= ($bg_color != '') ? "background-color: {$bg_color};" : "";
                    $custom_stle .= ($border_color != '' && $border_width != '') ? "border: {$border_width}px {$border_color} solid;" : "";
                    $custom_stle .= ($padd_top != '') ? "padding-top: {$padd_top}px;" : "";
                    $custom_stle .= ($padd_right != '') ? "padding-right: {$padd_right}px;" : "";
                    $custom_stle .= ($padd_bottom != '') ? "padding-bottom: {$padd_bottom}px;" : "";
                    $custom_stle .= ($padd_left != '') ? "padding-left: {$padd_left}px;" : "";
                    $custom_stle .= ($margin_top != '') ? "margin-top: {$margin_top}px;" : "";
                    $custom_stle .= ($margin_right != '') ? "margin-right: {$margin_right}px;" : "";
                    $custom_stle .= ($margin_bottom != '') ? "margin-bottom: {$margin_bottom}px;" : "";
                    $custom_stle .= ($margin_left != '') ? "margin-left: {$margin_left}px;" : "";
                $custom_stle .= "}";
            }
            if( $hover_bg_color != '' || $hover_border_color != ''){
                $custom_stle .= ".{$testid}:hover{";
                    $custom_stle .= ($hover_bg_color != '') ? "background-color: {$hover_bg_color};" : "";
                    $custom_stle .= ($hover_border_color != '') ? "border-color: {$hover_border_color};" : "";
                $custom_stle .= "}";    
            }
            
            if( $gap != ''){
                $custom_stle .= ".{$testid}.oc-carousel .slick-slide {";
                    $custom_stle .= ($gap != '') ? "margin: {$gap}" : "";
                $custom_stle .= "}";    
            }
            
            if( $arrow_color != '' || $arrow_bg_color != '' || $arrow_size != '' ){
                $custom_stle .= ".{$testid}.oc-carousel .slick-arrow {";
                    $custom_stle .= ($arrow_color != '') ? "color: {$arrow_color};" : "";
                    $custom_stle .= ($arrow_bg_color != '') ? "background-color: {$arrow_bg_color};" : "";
                    $custom_stle .= ($arrow_size != '') ? "font-size: {$arrow_size}px" : "";
                $custom_stle .= "}";
            }
            if( $arrow_hover_color != '' || $arrow_hover_bg_color != ''){
                $custom_stle .= ".{$testid}.oc-carousel .slick-arrow:hover {";
                    $custom_stle .= ($arrow_hover_color != '') ? "color: {$arrow_hover_color};" : "";
                    $custom_stle .= ($arrow_hover_bg_color != '') ? "background-color: {$arrow_hover_bg_color};" : "";
                $custom_stle .= "}";    
            }
            
            if( $bullet_color != '' ){
                $custom_stle .= ".{$testid}.oc-carousel .slick-dots.circle1 li.slick-active button,#{$testid}.oc-carousel .slick-dots.square1 li.slick-active button {";
                    $custom_stle .= ($bullet_color != '') ? "border-color: {$bullet_color};" : "";
                $custom_stle .= "}";    
                
                $custom_stle .= ".{$testid}.oc-carousel .slick-dots.circle1 li.slick-active button:before,#{$testid}.oc-carousel .slick-dots.square1 li.slick-active button:before {";
                    $custom_stle .= ($bullet_color != '') ? "background-color: {$bullet_color};" : "";
                $custom_stle .= "}";
                
                $custom_stle .= ".{$testid}.oc-carousel .slick-dots.circle2 li button,#{$testid}.oc-carousel .slick-dots.square2 li button {";
                    $custom_stle .= ($bullet_color != '') ? "border-color: {$bullet_color};" : "";
                $custom_stle .= "}";    

                $custom_stle .= ".{$testid}.oc-carousel .slick-dots.circle2 li.slick-active button,#{$testid}.oc-carousel .slick-dots.square2 li.slick-active button {";
                    $custom_stle .= ($bullet_color != '') ? "background-color: {$bullet_color};" : "";
                    $custom_stle .= ($bullet_color != '') ? "border-color: {$bullet_color};" : "";
                $custom_stle .= "}";    
            }
            
            newFun($custom_stle);
            
            $attrs = $t2_type.$t2_slides.$t2_scrolls.$t2_fade.$t2_speed.$t2_arrows.$t2_infinite.$t2_dots.$t2_auto.$ar_shape.$nx_ic.$pv_ic.$ar_sz.$bul_st.$bul_col.$rtl;
            
            if($block_type == 'grid'){
                $output .= "<div class='{$testid} oc-tests grid-test testo-{$block_style} {$el_class}'>";
            }else if($block_type == 'carousel'){
                if( $block_style == '2' ) $output .= '<div class="oc-cont-auto">';
                $output .= "<div class='{$testid} oc-tests testo-{$block_style} oc-carousel {$el_class} {$arrow_pos}' {$attrs}>";
            }      
                $output .= do_shortcode( $content );
            $output .= '</div>';
            if( $block_style == '2' ) $output .= '</div>';
            
            if($block_type == 'carousel' && $block_style == '2' ){
                $output .= "<div class='oc-carousel_dup'>";
                    $output .= do_shortcode( $content );
                $output .= '</div>';
            }            
            
            return $output;
        }
    }

    class WPBakeryShortCode_it_clients extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {
            global $cl_style;
            extract(shortcode_atts(array(
                'el_class'  => '',
                'cl_style'  => '1',
            ), $atts));
                        
            $output = '<div class="clients-grid'.$el_class.'">';
                $output .= do_shortcode( $content );
            $output .= '</div>';
            
            return $output;
        }
    }
    
    class WPBakeryShortCode_it_panel extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {
            extract(shortcode_atts(array(
                'el_class'       => '',
                'panel_title'    => '', 
                'panel_style'    => 'default',
            ), $atts));
            
            $class = '';
            if($el_class != ''){
                $class = ' '.$el_class;
            }
            
            $output = '<div class="panel panel-'.$panel_style.$class.'">';
              $output .='<div class="panel-heading"><h3 class="panel-title">'.esc_html($panel_title).'</h3></div>'; 
              $output .= '<div class="panel-body">';
                    $output .= wpb_js_remove_wpautop( $content );
                $output .= '</div>';
            $output .= '</div>';
            return $output;
            
        }
    }
    
    class WPBakeryShortCode_it_carousel extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {
            global $v_type;
            global $gap;
            extract(shortcode_atts(array(
                'el_class'              => '',
                'v_type'                => 'horizontal',
                'v_slides'              => '1',
                'v_scroll'              => '1',
                'v_fade'                => '',
                'v_speed'               => '500',
                'v_arrows'              => '',
                'v_dots'                => '',
                'gap'                   => '0',
                'v_mode'                => '',
                'v_infinite'            => '',
                'v_auto'                => '',
                'arrow_color'           => '',
                'arrow_bg_color'        => '',
                'arrow_hover_color'     => '',
                'arrow_hover_bg_color'  => '',
                'arrow_pos'             => 'l-r-in',
                'next_icon'             => 'fa fa-chevron-left',
                'prev_icon'             => 'fa fa-chevron-right',
                'arrow_size'            => '14',
                'arrow_shape'           => 'square',
                'bullets_style'         => 'circle1',
                'bullet_color'          => '',
                'v_rtl'                 => ''
            ), $atts));
            
            $output = $custom_stle = $t2_slides = $t2_scrolls = $t2_fade = $t2_speed = $t2_arrows = $t2_dots = $t2_auto = $t2_infinite = $t2_mode = $ar_col = $nx_ic = $pv_ic = $ar_sz = $bul_st = $bul_col = '';
            
            $t2_slides      = ($v_slides !='')              ? " data-slidesnum='$v_slides'"             : "";
            $t2_type        = ($v_type !='')                ? " data-type='$v_type'"                    : "";
            $t2_scrolls     = ($v_scroll !='')              ? " data-scamount='$v_scroll'"              : "";
            $t2_fade        = ($v_fade !='')                ? " data-fade='$v_fade'"                    : "";               
            $t2_speed       = ($v_speed !='')               ? " data-speed='$v_speed'"                  : "";
            $t2_arrows      = ($v_arrows !='')              ? " data-arrows='$v_arrows'"                : "";
            $t2_dots        = ($v_dots !='')                ? " data-dots='$v_dots'"                    : "";
            $t2_auto        = ($v_auto !='')                ? " data-auto='$v_auto'"                    : "";
            $t2_infinite    = ($v_infinite !='')            ? " data-infinite='$v_infinite'"            : "";
            $t2_mode        = ($v_mode !='')                ? " data-center-mode='$v_mode'"             : "";
            $nx_ic          = ($next_icon !='')             ? " data-next-icon='$next_icon'"            : "";
            $pv_ic          = ($prev_icon !='')             ? " data-prev-icon='$prev_icon'"            : "";
            $bul_st         = ($bullets_style !='')         ? " data-bullet-style='$bullets_style'"     : "";
            $ar_shape       = ($arrow_shape !='')           ? " data-arrow-shape='$arrow_shape'"        : "";
            $rtl            = ($v_rtl !='')                 ? " data-rtl='$v_rtl'"                      : "";
                
            $carid = uniqid( 'caros_' );
                            
            $custom_stle .= "#{$carid}.oc-carousel .slick-slide {";
                $custom_stle .= ($gap != '') ? "margin: {$gap}" : "";
            $custom_stle .= "}";
            
            $custom_stle .= "#{$carid}.oc-carousel .slick-arrow {";
                $custom_stle .= ($arrow_color != '') ? "color: {$arrow_color};" : "";
                $custom_stle .= ($arrow_bg_color != '') ? "background-color: {$arrow_bg_color};" : "";
                $custom_stle .= ($arrow_size != '') ? "font-size: {$arrow_size}px" : "";
            $custom_stle .= "}";
            
            $custom_stle .= "#{$carid}.oc-carousel .slick-arrow:hover {";
                $custom_stle .= ($arrow_hover_color != '') ? "color: {$arrow_hover_color};" : "";
                $custom_stle .= ($arrow_hover_bg_color != '') ? "background-color: {$arrow_hover_bg_color};" : "";
            $custom_stle .= "}";
            
            $custom_stle .= "#{$carid}.oc-carousel .slick-dots.circle1 li.slick-active button,#{$carid}.oc-carousel .slick-dots.square1 li.slick-active button {";
                $custom_stle .= ($bullet_color != '') ? "border-color: {$bullet_color};" : "";
            $custom_stle .= "}";
            
            $custom_stle .= "#{$carid}.oc-carousel .slick-dots.circle1 li.slick-active button:before,#{$carid}.oc-carousel .slick-dots.square1 li.slick-active button:before {";
                $custom_stle .= ($bullet_color != '') ? "background-color: {$bullet_color};" : "";
            $custom_stle .= "}";
            
            $custom_stle .= "#{$carid}.oc-carousel .slick-dots.circle2 li button,#{$carid}.oc-carousel .slick-dots.square2 li button {";
                $custom_stle .= ($bullet_color != '') ? "border-color: {$bullet_color};" : "";
            $custom_stle .= "}";
            
            $custom_stle .= "#{$carid}.oc-carousel .slick-dots.circle2 li.slick-active button,#{$carid}.oc-carousel .slick-dots.square2 li.slick-active button {";
                $custom_stle .= ($bullet_color != '') ? "background-color: {$bullet_color};" : "";
                $custom_stle .= ($bullet_color != '') ? "border-color: {$bullet_color};" : "";
            $custom_stle .= "}";
            
            newFun($custom_stle);    
                            
            $attrs2 = $t2_type.$t2_slides.$t2_scrolls.$t2_fade.$t2_speed.$t2_arrows.$t2_infinite.$t2_dots.$t2_auto.$ar_shape.$nx_ic.$pv_ic.$ar_sz.$bul_st.$bul_col.$rtl;
            
            $output .= "<div id='{$carid}' class='oc-carousel {$el_class} {$arrow_pos}' {$attrs2}>";
                $output .= do_shortcode( $content );
            $output .= "</div>";

            return $output;
        }
    }
    
    class WPBakeryShortCode_it_camera_slideshow extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {

            extract(shortcode_atts(array(
                'height'        => '500px',
                'fx'            => 'simpleFade',
                'loader'        => 'pie',
                'align'         => 'topRight',
                'bardirection'  => 'leftToRight',
                'barposition'   => 'left',
                'pagination'    => '',
                'thumbnails'    => '',
                'navigation'    => '',
                'pl_pause'      => '',
                'el_class'      => '',
            ), $atts));
            
            $output = '<div class="camera_wrap camera_magenta_skin camera-slider '.$el_class.'" data-fx="'.$fx.'" data-alignment="'.$align.'" 
            data-height="'.$height.'" data-pagination="'.$pagination.'" data-thumbnails="'.$thumbnails.'" data-loader="'.$loader.'" data-bardirection="'.$bardirection.'" 
            data-barposition="'.$barposition.'" data-navigation="'.$navigation.'" data-playPause="'.$pl_pause.'">';
                $output .= do_shortcode( $content );
            $output .= '</div>';
            
            return $output;
        }
    }
    
    class WPBakeryShortCode_it_thumbs_gallery extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {

            extract(shortcode_atts(array(
                'el_class'  => '',
                'height'    => '150px',
                'margins'   => '0',
                'anim_imgs' => '',
            ), $atts));
            
            $class = 'just-gallery';
            $class .= ($anim_imgs == '1') ? ' anim-imgs' : "";
            $class .= ($el_class != '') ? ' '.$el_class : "";
            
            $output = '<div class=" '.$class.'" data-margins="'.$margins.'" data-row-height="'.$height.'">';
                $output .= do_shortcode( $content );
            $output .= '</div>';
            
            return $output;
        }
    }
    
    class WPBakeryShortCode_it_steps extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {
            global $steps_style;
            global $steps4_style;
            extract(shortcode_atts(array(
                'el_class'          => '',
                'steps_style'       => 'steps-1',
            ), $atts));
            
            $class = ($el_class != '') ? $el_class : "";
            $class .= ($steps_style != '') ? ' cont-'.$steps_style : "";
            
            $output = '<div class="st-container'.$class.'">';
                        
                        $output .= do_shortcode( $content );
            
            $output .= '</div>';
            
            return $output;
        }
    }
    
    class WPBakeryShortCode_it_list extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {
            global $list_style;
            global $custom_list_style;
            extract(shortcode_atts(array(
                'el_class'              => '',
                'list_style'            => '',
                'align'                 => 'left',
                'size'                  => '',
                'custom_list_style'     => 'style1',
                'it_animation'          => '',
                'delay'                 => '',
                'duration'              => '',
            ), $atts));
            
            $class = '';
            $class .= $list_style;
            $class .= ($list_style == 'custom-list') ? ' '.$custom_list_style : "";
            $class .= ($align != '') ? ' '.$align : "";
            $class .= ($size != '') ? ' list-'.$size : "";
            $class .= ($el_class != '') ? ' '.$el_class : "";
            $class .= ($it_animation != '') ? ' fx' : "";    
            
            // animation styling...
            $data_anim = ($it_animation != '') ? ' data-animate="'.esc_js($it_animation).'"' : '';
            $data_dur = ($duration != '') ? ' data-animation-duration="'.esc_js($duration).'"' : '';
            $data_del = ($delay != '') ? ' data-animation-delay="'.esc_js($delay).'"' : '';
            $animation = $data_anim.$data_del.$data_dur;
            
            $output = "<ul class='{$class}' {$animation}>";
                $output .= do_shortcode( $content );
            $output .= '</ul>';
            
            return $output;
        }
    }
    
    class WPBakeryShortCode_it_modal extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {
            extract(shortcode_atts(array(
                'el_class'          => '',
                'button_text'       => '',
                'button_size'       => 'md',
                'button_color'      => 'main-bg',
                'button_shape'      => 'square',
                'button_style'      => 'n-button',
                'button_out'        => '',
                'block_btn'         => '',
                'btn_class'         => '',
                'modal_style'       => 'main-bg',
                'modal_size'        => '',
                'hide_header'       => '',
                'hide_footer'       => '',
                'modal_title'       => '',
                'close_button_text' => 'Close',
                'modal_style'       => 'default',
                'modal_element'     => 'button',
                'image'             => '',
                'img_size'          => 'thumbnail'
            ), $atts));
            
            $mstyl = $bbtn = '';
            if( $img_size == '40x40' || $img_size == '55x55' || $img_size == '70x70' ){
                $size = 'thumbnail';
            }else{
                $size = $img_size;
            }
            
            
            $img_id = preg_replace( '/[^\d]/', '', $image );
            $thumb =   wp_get_attachment_image_src( $img_id,$size );
            if($modal_style == 'default'){
                $mstyl = 'main-bg';                
            }else{
                $mstyl = 'alert alert-'.$modal_style;
            }
            
            if($block_btn == '1'){
                $bbtn = ' btn-block';
            }
            
            $mod_id = uniqid( 'wp_modal_' );
            
            $output = '<div class="'.$el_class.'">';
                
                if($modal_element == 'button'){
                    if($button_style == 'n-button'){            
                        $output .= '<a type="button" class="vc_general vc_btn3 vc_btn3-size-'.$button_size.' vc_btn3-shape-'.$button_shape.' vc_btn3-style-'.$button_out.' '.$btn_class.' vc_btn3-color-'.$button_color.''.$bbtn.'" data-toggle="modal" data-target=".'.$mod_id.'">'.$button_text.'</a>';
                    }else{
                        $output .= '<a href="#" data-toggle="modal" data-target=".'.$mod_id.'" class="'.$btn_class.'">'.$button_text.'</a>';
                    }    
                } else {
                    $output .= '<div data-toggle="modal" data-target=".'.$mod_id.'" class="mod_img"><img class="mod-'.$img_size.'" alt="" src="'.$thumb[0].'"></div>';
                }
                                
                $output .= '<div class="modal modal-media fade '.$mod_id.'" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">';
                    
                    $output .= '<div class="modal-dialog '.$modal_size.'">';
                        
                        $output .= '<div class="modal-content">';

                            if($hide_header != '1'){
                                $output .= '<div class="modal-header '.$mstyl.'">';
                                    $output .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                    $output .= '<h4 class="modal-title" id="gridSystemModalLabel">'.$modal_title.'</h4>';
                                $output .= '</div>';
                            }

                            $output .= '<div class="modal-body">';
                                $output .= wpb_js_remove_wpautop( $content );
                            $output .= '</div>';

                            if($hide_footer != '1'){
                                $output .= '<div class="modal-footer">';
                                    $output .= '<button type="button" class="btn btn-default" data-dismiss="modal">'.$close_button_text.'</button>';
                                $output .= '</div>';
                            }

                        $output .= '</div>';

                    $output .= '</div>';
                    
                $output .= '</div>';
                
            $output .= '</div>';
            
            return $output;
        }
    }
    
    class WPBakeryShortCode_it_swiper_slider extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {
            extract(shortcode_atts(array(
                'sw_slides'         => '2',
                'sw_type'           => 'h' ,
                'sw_height'         => '500',
                'sw_style'          => 'style1',
                'sw_effect'         => 'slide',
                'sw_speed'          => '400',
                'sw_space'          => '0',
                'sw_loop'           => '',
                'el_class'          => '',
            ), $atts));
            
            $output = $class = $t_slides = $cont = $attrs = $s_typ = '';
            $t_slides = " data-slides='$sw_slides'";
            $s_typ = " data-stype='$sw_type'";            
            $s_eff = " data-effect='$sw_effect'";
            $s_speed = " data-speed='$sw_speed'"; 
            $s_space = " data-space='$sw_space'";
            $s_loop = " data-loop='$sw_loop'"; 
            
            $class .= ( $el_class != '' ) ? ' '.$el_class : "";
            $class .= ' '.$sw_style;
            
            $classes = 'swiper-container swiper-container-'.$sw_type.$class;
            $attrs = $t_slides.$s_typ.$s_eff.$s_speed.$s_loop.$s_space;
            
            $output .= '<div class="'.$classes.'"'.$attrs.' style="height: '.$sw_height.'px">';
                $output .= '<div class="swiper-wrapper">';
                    $output .= do_shortcode( $content );
                $output .= '</div>';
                if( $sw_type == 'v' ){
                    $output .= '<div class="swiper-button swiper-up"><i class="fa fa-angle-up"></i></div>';
                    $output .= '<div class="swiper-button swiper-down"><i class="fa fa-angle-down"></i></div>';
                }else{
                    $output .= '<div class="swiper-button swiper-next"><i class="fa fa-angle-right"></i></div>';
                    $output .= '<div class="swiper-button swiper-prev"><i class="fa fa-angle-left"></i></div>';
                }
            $output .= '</div>';
            
            return $output;
        }
    }
    
    class WPBakeryShortCode_it_swiper_slider_inner extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {
            extract(shortcode_atts(array(
                'sw_slides'         => '2',
                'sw_type2'          => 'h' ,
                'sw_height2'        => '400',
                'sw_style'          => 'style1',
                'sw_effect'         => 'slide',
                'sw_speed'          => '400',
                'sw_space'          => '0',
                'sw_loop'           => '',
                'el_class'          => '',
            ), $atts));
            
            $output = $class = $t_slides = $cont = $attrs = $s_typ = '';
            $t_slides = " data-slides='$sw_slides'";
            $s_typ = " data-stype='$sw_type2'";            
            $s_eff = " data-effect='$sw_effect'";
            $s_speed = " data-speed='$sw_speed'";
            $s_space = " data-space='$sw_space'"; 
            $s_loop = " data-loop='$sw_loop'";
            
            $class .= ( $el_class != '' ) ? ' '.$el_class : "";
            $class .= ' '.$sw_style;
            
            $classes = 'swiper-container swiper-container-'.$sw_type2.$class;
            $attrs = $t_slides.$s_typ.$s_eff.$s_speed.$s_loop.$s_space;
            
            $output .= '<div class="swiper-slide">';
                $output .= '<div class="'.$classes.'"'.$attrs.' style="height: '.$sw_height2.'px">';
                    $output .= '<div class="swiper-wrapper">';
                        $output .= do_shortcode( $content );
                    $output .= '</div>';
                    if( $sw_type2 == 'v' ){
                        $output .= '<div class="swiper-button swiper-up"><i class="fa fa-angle-up"></i></div>';
                        $output .= '<div class="swiper-button swiper-down"><i class="fa fa-angle-down"></i></div>';
                    }else{
                        $output .= '<div class="swiper-button swiper-next"><i class="fa fa-angle-right"></i></div>';
                        $output .= '<div class="swiper-button swiper-prev"><i class="fa fa-angle-left"></i></div>';
                    }
                $output .= '</div>';
            $output .= '</div>';
            
            return $output;
        }
    }
    
}