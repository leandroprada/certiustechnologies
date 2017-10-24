<?php

if (!function_exists( 'it_oc_category' )) {
    function it_oc_category() {
        global $post;
        $cats = array();
        $terms = get_the_terms($post->id, 'oc-categories');
        if (is_array($terms)) {
            foreach ($terms as $term) {
                $id = $term->term_id;
                $cats [] = '<a href="' . site_url() . '/' . $term->taxonomy . '/' . $term->slug . '">' . $term->name . '</a>';
            }
            return implode('  ,  ', $cats);
        }
    }

}

if (!function_exists( 'it_oc_tag' )) {
    function it_oc_tag() {
        global $post;
        $tags = array();
        $terms = get_the_terms($post->id, 'oc-tags');
        if (is_array($terms)) {
            foreach ($terms as $term) {
                $id = $term->term_id;
                $tags [] = '<a href="' . site_url() . '/' . $term->taxonomy . '/' . $term->slug . '">' . $term->name . '</a>';
            }
            return implode('  ,  ', $tags);
        }
    }
}

if ( ! function_exists( 'oc_summary' ) ){
    function oc_summary($max_words){
        global $post;
        $more = '<a class="more-btn btn main-bg btn-sm" href="'. esc_url(get_permalink($post->ID)) . '"><span>'. esc_html__( 'Read More', PLUGIN_SLUG ) .'</span></a>';
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        $content = get_the_content();
        $content = strip_shortcodes( $content );
        $content = preg_replace($reg_exUrl, '', $content);
        
        $length = theme_option('it_excerpt');
        
        if($max_words != '-1'){
            
            $content = wp_trim_words( $content , $max_words , '' );    
        
        } else if(has_excerpt( $post->ID )){
            
            $content = get_the_excerpt();
                
        } else if( strpos( $post->post_content, '<!--more-->' ) ) {
            
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
        
        } else if($length != '-1'){
            
            $content = wp_trim_words( $content , $length , '' );
        
        }
        
        return $content;
    } 
}

if (!function_exists( 'it_bo_category' )) {
    function it_bo_category($tags, $cats) {
        global $post;
        $taxs = array();
        $ch_tax = '';
        if (empty($tags)) {
            $ch_tax = 'oc-categories';
        }
        if (empty($cats)) {
            $ch_tax = 'oc-tags';
        }
        $terms = get_the_terms($post->id, $ch_tax);
        if (is_array($terms)) {
            foreach ($terms as $term) {
                $id = $term->term_id;
                $taxs[] = $term->slug;
            }
            return implode(' ', $taxs);
        }
    }
}

if( ! function_exists( 'wp_tagregexp' ) ) {
  function wp_tagregexp() {
    apply_filters( 'wp_custom_tagregexp', 'video|media|audio|playlist|video-playlist|embed' );
  }
}

if( ! function_exists( 'getUrl' ) ) {
  function getUrl( $html ) {
    $regex  = "/^\b(?:(?:https?|ftp):\/\/)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
    preg_match( $regex, $html, $matches );
    return ( !empty( $matches[0] ) ) ? $matches[0] : false;
  }
}

if( ! function_exists( 'post_media' ) ) {
  function post_media( $content ) {
    $media    = getUrl( $content );
    if( ! empty( $media ) ) {
      global $wp_embed;
      $content  = do_shortcode( $wp_embed->run_shortcode( '[embed]'. $media .'[/embed]' ) );
    } else {
      $pattern = get_shortcode_regex( wp_tagregexp() );
      preg_match( '/'.$pattern.'/s', $content, $media );
      if ( ! empty( $media[2] ) ) {
        if( $media[2] == 'embed' ) {
          global $wp_embed;
          $content = do_shortcode( $wp_embed->run_shortcode( $media[0] ) );
        } else {
          $content = do_shortcode( $media[0] );
        }
      }
    }
    if( ! empty( $media ) ) {
      if(get_post_format() == 'gallery'){
          $output  = '<div class="post-gallery">';
      }else{
          $output  = '<div class="post-media">';
      }
        
      $output .= $content;
      $output .= '</div>';
      return $output;
    }
    return false;
  }
}

if( ! function_exists( 'commas' ) ) {
    function commas($string, $separator = ','){
        $valss = explode($separator, $string);

        foreach($valss as $key => $valu) {
            $valss[$key] = trim($valu);
        }

        return array_diff($valss, array(""));
    }
}

if( ! function_exists( 'add_portfolio_metabox' ) ){
    function add_portfolio_metabox() {
        add_meta_box('octa_meta_boxes', esc_html__('Portfolio Meta Boxes', PLUGIN_SLUG), 'octa_meta_callback', 'octapost', 'normal');
    }
}

if( ! function_exists( 'octa_meta_callback' ) ){
    function octa_meta_callback($post){

        $custom = get_post_custom($post->ID);
        $hvl = isset( $custom['scrsnum'] ) ? $custom['scrsnum'][0] : "0";
        $selected = isset( $custom['portfolio_layout'] ) ? $custom['portfolio_layout'][0] : '';
        
        $ivl = isset( $custom['iconsnum'] ) ? $custom['iconsnum'][0] : "1";
        
        ?>
        
        <div class="portfolio-meta-cont">
            <div class="">
                <h3><?php echo __('Portfolio Layout', PLUGIN_SLUG) ?></h3>
                <p>
                    <select name="portfolio_layout" id="portfolio_layout">
                        <option value="0" <?php selected( $selected, '0' ); ?>><?php echo __('Inherit from theme options', PLUGIN_SLUG) ?></option>
                        <option value="1" <?php selected( $selected, '1' ); ?>><?php echo __('Style 1', PLUGIN_SLUG) ?></option>
                        <option value="2" <?php selected( $selected, '2' ); ?>><?php echo __('Style 2', PLUGIN_SLUG) ?></option>
                        <option value="3" <?php selected( $selected, '3' ); ?>><?php echo __('Style 3', PLUGIN_SLUG) ?></option>
                    </select>
                </p>
            </div>
        </div>
        
        <div class="portfolio-meta-cont" id="screens_cont">
            <div class="inner-screens">
                <h3><?php echo __('ScreenShots', PLUGIN_SLUG) ?></h3>
                <input type="hidden" name="scrsnum" value="<?php echo $hvl; ?>" id="scrsnum" /> 
                <?php
                $coms = commas($hvl);
                foreach($coms as $key => $i){
                    $val = isset( $custom['screens'.$i] ) ? $custom['screens'.$i][0] : "";
                    ?>
                    <div class="screen-item" id="screen-item-<?php echo $i; ?>">
                        <p>
                            <a class="del_screen button" href="#" title="<?php echo __('Remove', PLUGIN_SLUG) ?>"><i class="dashicons dashicons-trash"></i></a>
                            <input class="upload_im" readonly="readonly" name="screens<?php echo $i; ?>" id="screens<?php echo $i; ?>" type="text" value="<?php echo $val; ?>" />
                            <a class="upload_image_button up-image" href="#"><?php echo __('Upload', PLUGIN_SLUG) ?></a>
                            <span class="clear-img"><img class="logo-im" alt="" src="<?php echo $val; ?>" /></span>
                        </p>
                    </div>
                <?php } ?>
            </div>
            <div class="add_new_sc">
                <button class="add_screen button" type="button" id="add_screen"><i class="dashicons dashicons-plus-alt"></i><?php echo __('Add New Screenshot', PLUGIN_SLUG) ?> </button>    
            </div>
        </div>
        
        <div class="portfolio-meta-cont" id="icons_cont">
            <div class="inner-icons">
                <h3><?php echo __('Icon Boxes', PLUGIN_SLUG) ?></h3>
                <input type="hidden" name="iconsnum" value="<?php echo $ivl; ?>" id="iconsnum" /> 
                <?php
                $comsi = commas($ivl);
                foreach($comsi as $key => $g){
                    $itil = isset( $custom['icons_title'.$g] ) ? $custom['icons_title'.$g][0] : "";
                    $ival = isset( $custom['icons_value'.$g] ) ? $custom['icons_value'.$g][0] : "";
                    $iicon = isset( $custom['icons_icon'.$g] ) ? $custom['icons_icon'.$g][0] : "";
                    ?>
                    <div class="icon-item" id="icon-item-<?php echo $g; ?>">
                        <div class="ics">
                            <a class="del_icon button" href="#" title="<?php echo __('Remove', PLUGIN_SLUG) ?>"><i class="dashicons dashicons-trash"></i></a>
                            <input placeholder="Title" class="ic_title" name="icons_title<?php echo $g; ?>" type="text" value="<?php echo $itil; ?>" />
                            <input placeholder="Number" class="ic_value" name="icons_value<?php echo $g; ?>" type="number" value="<?php echo $ival; ?>" />
                            <div class="bot-icon">                            
                                <i class="ico"></i>
                                <a class="button button-primary btn_icon" href="#"><i class="fa fa-plus-square"></i><?php echo __('Add Icon', PLUGIN_SLUG) ?></a>
                                <input type="hidden" name="icons_icon<?php echo $g; ?>" class="icon_cust" value="<?php echo $iicon; ?>" />
                                <a class="button icon-remove" title="<?php echo __('Remove Icon', PLUGIN_SLUG) ?>"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="add_new_sc">
                <button class="add_screen button" type="button" id="add_icons"><i class="dashicons dashicons-plus-alt"></i><?php echo __('Add New Icon Box', PLUGIN_SLUG) ?> </button>    
            </div>
            
        </div>
        
        <?php 
        wp_nonce_field( plugin_basename( __FILE__ ),'screens_nonce' );
    }
}

if( ! function_exists( 'save_octa_postdata' ) ){
    function save_octa_postdata( $post_id ){
        global $post;
        
        if (isset($post)){
            $custom = get_post_custom($post->ID);
        }else{
            $custom = '';
        }
        
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
          return;

        if( empty( $_POST['screens_nonce'] ) || !wp_verify_nonce( $_POST['screens_nonce'], plugin_basename(__FILE__) ) )
            return;

        if (!current_user_can('edit_page', $post_id))
            return;

        if ( isset($_POST['scrsnum']) ) {
            update_post_meta($post_id, 'scrsnum', $_POST['scrsnum']);
        }

        if ( isset($_POST['iconsnum']) ) {
            update_post_meta($post_id, 'iconsnum', $_POST['iconsnum']);
        }

        if( isset( $_POST['portfolio_layout'] ) ){
            update_post_meta( $post_id, 'portfolio_layout', $_POST['portfolio_layout'] );
        }
        
        $custom = get_post_custom($post->ID);
        $hvl = isset( $custom['scrsnum'] ) ? $custom['scrsnum'][0] : "0";
        $ivl = isset( $custom['iconsnum'] ) ? $custom['iconsnum'][0] : "0";
        $coms = commas($hvl);
        $comsi = commas($ivl);

        foreach ($coms as $key => $i) {

            if ( isset($_POST['screens'.$i]) ) {
                $old = get_post_meta($post_id, 'screens'.$i, true);
                $new = $_POST['screens'.$i];

                if($new && $new != $old){
                    update_post_meta($post_id, 'screens'.$i, $new);
                } elseif ('' == $new && $old) {
                    delete_post_meta($post_id, 'screens'.$i, $old);
                }
            }
    
        }

        foreach ($comsi as $key => $g) {

            if ( isset($_POST['icons_title'.$g]) ) {
                $old = get_post_meta($post_id, 'icons_title'.$g, true);
                $new = $_POST['icons_title'.$g];
                
                if($new && $new != $old){
                    update_post_meta($post_id, 'icons_title'.$g, $new);
                } elseif ('' == $new && $old) {
                    delete_post_meta($post_id, 'icons_title'.$g, $old);
                }
            }
            
            if ( isset($_POST['icons_value'.$g]) ) {
                $old = get_post_meta($post_id, 'icons_value'.$g, true);
                $new = $_POST['icons_value'.$g];
                
                if($new && $new != $old){
                    update_post_meta($post_id, 'icons_value'.$g, $new);
                } elseif ('' == $new && $old) {
                    delete_post_meta($post_id, 'icons_value'.$g, $old);
                }
            }
            
            if ( isset($_POST['icons_icon'.$g]) ) {
                $old = get_post_meta($post_id, 'icons_icon'.$g, true);
                $new = $_POST['icons_icon'.$g];
                
                if($new && $new != $old){
                    update_post_meta($post_id, 'icons_icon'.$g, $new);
                } elseif ('' == $new && $old) {
                    delete_post_meta($post_id, 'icons_icon'.$g, $old);
                }
            }
            
        }
        
    }
}

if ( ! function_exists( 'oc_post_types' ) ) {
    function oc_post_types(){
        $types = array();
        $exclude_cpts = array(
            'attachment',
            'revision',
            'nav_menu_item',
            'custom_css',
            'customize_changeset',
            'vc4_templates',
            'page',
            'wpcf7_contact_form',
            'vc_grid_item',
            'mc4wp-form'
        );
        $builtin = array(
            'post',
        );
        $cpts = get_post_types( array(
            '_builtin' => false
        ) );
        foreach($exclude_cpts as $exclude_cpt)
            unset($cpts[$exclude_cpt]);
        $post_types = array_merge($builtin, $cpts);
        
        foreach( $post_types as $type ) {
            $obj = get_post_type_object( $type );
            $types[$type] = $obj->labels->singular_name;
        }
        
        return $types;
        
    }
}

if ( ! function_exists( 'oc_post_taxs' ) ) {
    function oc_post_taxs(){
        $types = array();
        $exclude_cpts = array(
            'attachment',
            'revision',
            'nav_menu_item',
            'custom_css',
            'customize_changeset',
            'vc4_templates',
        );
        $builtin = array(
            'post',
            'page',
        );
        $cpts = get_post_types( array(
            '_builtin' => false
        ) );
        foreach($exclude_cpts as $exclude_cpt)
            unset($cpts[$exclude_cpt]);
        $post_types = array_merge($builtin, $cpts); 
        
        $taxs = array();
        foreach ( $post_types as $post_typ ) {
            $taxonomy_names = get_object_taxonomies( $post_typ );

            $terms = get_terms( $taxonomy_names, array( 'hide_empty' => false ));
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                foreach ( $terms as $term ) {
                    $taxs[$term->slug] = $term->name;
                }
            }
        }
        
        return $taxs;
        
    }
}

if ( ! function_exists( 'colourCreator' ) ) {
    function colourCreator($colour, $per) {  
        $colour = substr( $colour, 1 ); // Removes first character of hex string (#) 
        $rgb = ''; // Empty variable 
        $per = $per/100*255; // Creates a percentage to work with. Change the middle figure to control colour temperature
         
        if  ($per < 0 ) // Check to see if the percentage is a negative number 
        { 
            // DARKER 
            $per =  abs($per); // Turns Neg Number to Pos Number 
            for ($x=0;$x<3;$x++) 
            { 
                $c = hexdec(substr($colour,(2*$x),2)) - $per; 
                $c = ($c < 0) ? 0 : dechex($c); 
                $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
            }   
        }  
        else 
        { 
            // LIGHTER         
            for ($x=0;$x<3;$x++) 
            {             
                $c = hexdec(substr($colour,(2*$x),2)) + $per; 
                $c = ($c > 255) ? 'ff' : dechex($c); 
                $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
            }    
        } 
        return '#'.$rgb; 
    }    
}

if ( ! function_exists( 'hex2RGB' ) ) {
    function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
        $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
        $rgbArray = array();
        if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
            $colorVal = hexdec($hexStr);
            $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
            $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
            $rgbArray['blue'] = 0xFF & $colorVal;
        } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
            $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
            $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
            $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
        } else {
            return false; //Invalid hex color code
        }
        return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
    }
}

if ( ! function_exists( 'colourBrightness' ) ){
    function colourBrightness($hex, $percent) {
        $hash = '';
        if (stristr($hex,'#')) {
            $hex = str_replace('#','',$hex);
            $hash = '#';
        }
        $rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
        for ($i=0; $i<3; $i++) {
            if ($percent > 0) {
                // Lighter
                $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
            } else {
                // Darker
                $positivePercent = $percent - ($percent*2);
                $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
            }
            if ($rgb[$i] > 255) {
                $rgb[$i] = 255;
            }
        }
        $hex = '';
        for($i=0; $i < 3; $i++) {
            $hexDigit = dechex($rgb[$i]);
            if(strlen($hexDigit) == 1) {
            $hexDigit = "0" . $hexDigit;
            }
            $hex .= $hexDigit;
        }
        return $hash.$hex;
    }    
}

add_action( 'add_meta_boxes', 'add_portfolio_metabox' );
add_action( 'save_post', 'save_octa_postdata' );