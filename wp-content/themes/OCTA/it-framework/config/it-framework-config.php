<?php 
/**
 *
 * IT-RAYS Framework
 *
 * @author IT-RAYS
 * @license Commercial License
 * @link http://www.it-rays.net
 * @copyright 2017 IT-RAYS Themes
 * @package ITFramework
 * @version 1.0.0
 *
 */
 
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
         
$options = get_option( 'theme_options' );
global $wp_registered_sidebars;
$sbars = array();
foreach($wp_registered_sidebars as $sidebar_id => $sidebar){
    $sbars[$sidebar_id] = $sidebar['name'];
} 

/* Appearance
===========================================*/
$this->settings['general_layout_heading'] = array(
    'section' => 'it_appearance',
    'desc'    => 'Layout Options',
    'type'    => 'heading',
    'data_id' => 'layout-opt-acc'
);
$this->settings['layout'] = array(
    'title'   => __( 'Choose layout', 'octa' ),
    'desc'    => __( 'Boxed or wide layout?', 'octa' ),
    'type'    => 'select',
    'class'   => 'select_boxes',
    'section' => 'it_appearance',
    'choices' => array(
        '' => 'Wide',
        'boxed' => 'Boxed'
    )
);
$this->settings['main_width'] = array(
    'title'   => __( 'Site Width', 'octa' ),
    'desc'    => __( 'Define the main site content width in px.', 'octa' ),
    'std'     => '1170',
    'min'     => '0',
    'max'     => '2000',
    'type'    => 'number',
    'section' => 'it_appearance',
);
$this->settings['sidebar_width'] = array(
    'title'   => __( 'Sidebar Width', 'octa' ),
    'desc'    => __( 'Define the sidebar content width in %.', 'octa' ),
    'std'     => '25',
    'min'     => '0',
    'max'     => '100',
    'type'    => 'number',
    'section' => 'it_appearance',
);
$this->settings['content_padding'] = array(
    'title'   => __( 'Content Padding', 'octa' ),
    'desc'    => __( 'Top and Bottom main content padding in px.', 'octa' ),
    'std'     => '100|100',
    'firstInput' => '<i class="fa fa-long-arrow-up"></i>',
    'lastInput' => '<i class="fa fa-long-arrow-down"></i>',
    'type'    => 'twonumber',
    'section' => 'it_appearance',
);
$this->settings['body_smooth'] = array(
    'section' => 'it_appearance',
    'title'   => __( 'Smooth Scrolling', 'octa' ),
    'desc'    => __( '"ON" to enable smooth scrolling in the site.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1'
);
$this->settings['layout-styling-heading'] = array(
    'section' => 'it_appearance',
    'desc'    => 'Layout Styling',
    'type'    => 'heading',
    'data_id' => 'layout-styl-acc'
);
$this->settings['bodyfontcolor'] = array(
    'title'   => __( 'Body Font color', 'octa' ),
    'type'    => 'color',
    'section' => 'it_appearance',
);
$this->settings['bodylinkscolor'] = array(
    'title'   => __( 'Body Links color', 'octa' ),
    'type'    => 'color',
    'section' => 'it_appearance',
);
$this->settings['bodybgcolor'] = array(
    'title'   => __( 'Body background color', 'octa' ),
    'type'    => 'color',
    'section' => 'it_appearance',
); 
$this->settings['bodybgimage'] = array(
    'title'   => __( 'Background image', 'octa' ),
    'desc'    => __( 'upload image or insert a url.', 'octa' ),
    'type'    => 'file',
    'section' => 'it_appearance',
);
$this->settings['body_bg_img_repeat'] = array(
    'title'   => __( 'Background repeat', 'octa' ),
    'desc'    => __( 'How the background image repeats.', 'octa' ),
    'type'    => 'select',
    'section' => 'it_appearance',
    'class'   => 'select_boxes',
    'choices' => array(
        '' => 'repeat',
        'no-repeat' => 'no-repeat',
        'repeat-x' => 'repeat-x',
        'repeat-y' => 'repeat-y'
    ),
    'dependency' => array(
        'element' => 'bodybgimage',
        'not_empty' => true
    )
);
$this->settings['body_bg_position'] = array(
    'title'   => __( 'Background Position', 'octa' ),
    'type'    => 'select',
    'section' => 'it_appearance',
    'choices' => array(
        '0 0' => 'Left Top',
        '0 50%' => 'Left Middle',
        '0 100%' => 'Left Bottom',
        '50% 0' => 'Center Top',
        '50% 50%' => 'Center Middle',
        '50% 100%' => 'Center Right',
        '100% 0' => 'Right Top',
        '100% 50%' => 'Right Middle',
        '100% 100%' => 'Right Bottom',
    ),
    'std'   => '0 100%',
    'dependency' => array(
        'element' => 'bodybgimage',
        'not_empty' => true
    )
);
$this->settings['body_bg_size'] = array(
    'title'   => __( 'Background Size', 'octa' ),
    'type'    => 'select',
    'section' => 'it_appearance',
    'class'   => 'select_boxes',
    'choices' => array(
        'cover' => 'Cover',
        'contain' => 'Contain',
        '100% 100%' => '100%',
    ),
    'dependency' => array(
        'element' => 'bodybgimage',
        'not_empty' => true
    )
);
$this->settings['body_bg_img_parallax'] = array(
    'title'   => __( 'Fixed Background', 'octa' ),
    'type'    => 'checkbox',
    'section' => 'it_appearance',
    'dependency' => array(
        'element' => 'bodybgimage',
        'not_empty' => true
    )
);
$this->settings['usepatterns'] = array(
    'section' => 'it_appearance',
    'title'   => __( 'Use patterns ?', 'octa' ),
    'type'    => 'checkbox',
    'class'   => 'use-pat',
    'desc'    => __( 'If yes, select the pattern from below:', 'octa' )
); 
$this->settings['patterns-imgs'] = array(
    'title'   => __( 'Pattern Background Image', 'octa' ),
    'desc'    => __( 'select pattern background for body.', 'octa' ),
    'type'    => 'arrayItems',
    'section' => 'it_appearance',
    'class'   => 'patterns',
    'items' => array(
        get_template_directory_uri() .'/assets/images/patterns/bg1.jpg' => '1',
        get_template_directory_uri() .'/assets/images/patterns/bg2.jpg' => '2',
        get_template_directory_uri() .'/assets/images/patterns/bg3.jpg' => '3',
        get_template_directory_uri() .'/assets/images/patterns/bg4.jpg' => '4',
        get_template_directory_uri() .'/assets/images/patterns/bg5.jpg' => '5',
        get_template_directory_uri() .'/assets/images/patterns/bg6.jpg' => '6',
        get_template_directory_uri() .'/assets/images/patterns/bg7.jpg' => '7',
        get_template_directory_uri() .'/assets/images/patterns/bg8.jpg' => '8',
        get_template_directory_uri() .'/assets/images/patterns/bg9.jpg' => '9',
        get_template_directory_uri() .'/assets/images/patterns/bg10.jpg' => '10'
    ),
    'dependency' => array(
        'element' => 'usepatterns',
        'not_empty' => true
    )
);
$this->settings['loader-anim'] = array(
    'section' => 'it_appearance',
    'desc'    => 'Page Loader & Animation',
    'type'    => 'heading',
    'data_id' => 'load-anim-acc'
);
$this->settings['animsition'] = array(
    'section' => 'it_appearance',
    'title'   => __( 'Pages Animation', 'octa' ),
    'desc'    => __( '"ON" to enable Pages Animation transitions.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => ''
);
$this->settings['data-animsition-in'] = array(
    'title'   => __( 'animation In', 'octa' ),
    'desc'    => __( 'Select page animation In.', 'octa' ),
    'std'     => 'fade-in',
    'type'    => 'select',
    'section' => 'it_appearance',
    'choices' => array(
        'fade-in' => 'Fade In',
        'fade-in-up-sm' => 'Fade In Up Small',
        'fade-in-up' => 'Fade In Up',
        'fade-in-up-lg' => 'Fade In Up Large',
        'fade-in-down-sm' => 'Fade In Down Small',
        'fade-in-down' => 'Fade In Down',
        'fade-in-down-lg' => 'Fade In Down Large',
        'fade-in-left-sm' => 'Fade In Left Small',
        'fade-in-left' => 'Fade In Left',
        'fade-in-left-lg' => 'Fade In Left Large',
        'fade-in-right-sm' => 'Fade In Right Small',
        'fade-in-right' => 'Fade In Right',
        'fade-in-right-lg' => 'Fade In Right Large',
        'rotate-in-sm' => 'Rotate In Small',
        'rotate-in' => 'Rotate In',
        'rotate-in-lg' => 'Rotate In Large',
        'flip-in-x-fr' => 'Flip In X FR',
        'flip-in-x' => 'Flip In X',
        'flip-in-x-nr' => 'Flip In X NR',
        'flip-in-y-fr' => 'Flip In Y FR',
        'flip-in-y' => 'Flip In Y',
        'flip-in-y-nr' => 'Flip In Y NR',
        'zoom-in-sm' => 'Zoom In Small',
        'zoom-in' => 'Zoom In',
        'zoom-in-lg' => 'Zoom In Large',
        'overlay-slide-in-top' => 'Overlay Slide In Top',
        'overlay-slide-in-bottom' => 'Overlay Slide In Bottom',
        'overlay-slide-in-left' => 'Overlay Slide In Left',
        'overlay-slide-in-right' => 'Overlay Slide In Right',
    ),
    'dependency' => array(
        'element' => 'animsition',
        'not_empty' => true
    )
);
$this->settings['data-animsition-out'] = array(
    'title'   => __( 'animation Out', 'octa' ),
    'desc'    => __( 'Select page animation Out.', 'octa' ),
    'std'     => 'fade-out',
    'type'    => 'select',
    'section' => 'it_appearance',
    'choices' => array(
        'fade-out' => 'Fade Out',
        'fade-out-up-sm' => 'Fade Out Up Small',
        'fade-out-up' => 'Fade Out Up',
        'fade-out-up-lg' => 'Fade Out Up Large',
        'fade-out-down-sm' => 'Fade Out Down Small',
        'fade-out-down' => 'Fade Out Down',
        'fade-out-down-lg' => 'Fade Out Down Large',
        'fade-out-left-sm' => 'Fade Out Left Small',
        'fade-out-left' => 'Fade Out Left',
        'fade-out-left-lg' => 'Fade Out Left Large',
        'fade-out-right-sm' => 'Fade Out Right Small',
        'fade-out-right' => 'Fade Out Right',
        'fade-out-right-lg' => 'Fade Out Right Large',
        'rotate-out-sm' => 'Rotate Out Small',
        'rotate-out' => 'Rotate Out',
        'rotate-out-lg' => 'Rotate Out Large',
        'flip-out-x-fr' => 'Flip Out X FR',
        'flip-out-x' => 'Flip Out X',
        'flip-out-x-nr' => 'Flip Out X NR',
        'flip-out-y-fr' => 'Flip Out Y FR',
        'flip-out-y' => 'Flip Out Y',
        'flip-out-y-nr' => 'Flip Out Y NR',
        'zoom-out-sm' => 'Zoom Out Small',
        'zoom-out' => 'Zoom Out',
        'zoom-out-lg' => 'Zoom Out Large',
        'overlay-slide-out-top' => 'Overlay Slide Out Top',
        'overlay-slide-out-bottom' => 'Overlay Slide Out Bottom',
        'overlay-slide-out-left' => 'Overlay Slide Out Left',
        'overlay-slide-out-right' => 'Overlay Slide Out Right',
    ),
    'dependency' => array(
        'element' => 'animsition',
        'not_empty' => true
    )
);
$this->settings['data-duration-in'] = array(
    'title'   => __( 'Animation In Duration', 'octa' ),
    'desc'    => __( 'Select the page In animation duration in ms.', 'octa' ),
    'std'     => '1000',
    'min'     => '0',
    'max'     => '10000',
    'type'    => 'number',
    'section' => 'it_appearance',
    'dependency' => array(
        'element' => 'animsition',
        'not_empty' => true
    )
);
$this->settings['data-duration-out'] = array(
    'title'   => __( 'Animation Out Duration', 'octa' ),
    'desc'    => __( 'Select the page Out animation duration in ms.', 'octa' ),
    'std'     => '1000',
    'min'     => '0',
    'max'     => '10000',
    'type'    => 'number',
    'section' => 'it_appearance',
    'dependency' => array(
        'element' => 'animsition',
        'not_empty' => true
    )
);
$this->settings['page_loader'] = array(
    'section' => 'it_appearance',
    'title'   => __( 'Page Pre-Loader', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'desc'    => __( 'Enable / Disable Page preloader.', 'octa' )
);
$this->settings['page_loader_style'] = array(
    'title'   => __( 'Pre-loader Style', 'octa' ),
    'desc'    => __( 'Select a preloading style that appears before page completely loaded.', 'octa' ),
    'type'    => 'select',
    'section' => 'it_appearance',
    'choices' => array(
        'circles' => 'Circles',
        'spin_Square' => 'Spin Square',
        'large_dots' => '4 Large Dots',
        'line_with_Dots' => 'Line with Dots',
        'cp-round' => 'Spinner Round',
        'cp-pinwheel' => 'Spinner Pinwheel',
        'cp-balls' => 'Spinner Balls',
        'cp-bubble' => 'Spinner Bubble',
        'cp-flip' => 'Spinner Flip',
        'cp-hue' => 'Spinner Hue',
        'cp-skeleton' => 'Spinner Skeleton',
        'cp-eclipse' => 'Spinner Eclipse',
        'cp-boxes' => 'Spinner Boxes',
        'cp-morph' => 'Spinner Morph',
        'img-load'   => 'Upload Image'
    ),
    'dependency' => array(
        'element' => 'page_loader',
        'not_empty' => true
    )
);
$this->settings['loaderimage'] = array(
    'title'   => __( 'Loading image', 'octa' ),
    'desc'    => __( 'upload image or insert a url.', 'octa' ),
    'type'    => 'file',
    'section' => 'it_appearance',
    'dependency' => array(
        'element' => 'page_loader_style',
        'value' => 'img-load'
    )
);

/* Colors.
============================================*/
$this->settings['skin_css'] = array(
    'title'   => __( 'Theme Color', 'octa' ),
    'desc'    => __( 'Select the main theme skin color from light or dark.', 'octa' ),
    'std'     => 'light',
    'type'    => 'select',
    'class'   => 'select_boxes',
    'section' => 'it_colors',
    'choices' => array(
        'light' => 'Light',
        'dark' => 'Dark'
    )
);
$this->settings['skin_color'] = array(
    'title'   => __( 'Choose Skin color', 'octa' ),
    'desc'    => __( 'Choose the main color scheme from this color pallet the color suits your needs.', 'octa' ),
    'std'     => '#dd2f42',
    'type'    => 'color',
    'section' => 'it_colors',
    'defcolor' => '#dd2f42'
);

/* Top Bar Settings
==========================================*/ 
$this->settings['top-bar-heading'] = array(
    'section' => 'it_topbar',
    'desc'    => __( 'Top Bar', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'top-bar-acc'
);
$this->settings['show_top_bar'] = array(
    'section' => 'it_topbar',
    'title'   => __( 'Show top bar', 'octa' ),
    'desc'    => __( 'Show/Hide top bar above header.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1'
);

// left top bar
$this->settings['top_left_mod'] = array(
    'section' => 'it_topbar',
    'title'   => __( 'Top Bar Left', 'octa' ),
    'type'    => 'addmodule',
    'class'   => 'left_top_bar',
    'std'     => '0',
    'dependency' => array(
        'element' => 'show_top_bar',
        'not_empty' => true
    ),
);

$ltopbar = isset($options['top_left_mod']) ? $options['top_left_mod'] : 0;        
for( $e = 0 ; $e <= $ltopbar ; $e++ ) {
    $this->settings['top_bar_left_'.$e] = array(
        'type'    => 'select',
        'class'   => 'selVal top_bar_left_'.$e,
        'section' => 'it_topbar',
        'choices' => array(
            ''              => '-- Select Box --',
            'menu'          => 'Menu',
            'text'          => 'Text',
            'link'          => 'Link',
            'socials'       => 'Social Icons',
            'search'        => 'Search',
            'login'         => 'WP Login',
            'woocart'       => 'Shopping Cart',
            'wpml'          => 'Language Switcher (WPML)',
        ),
        'parent'    => 'top_left_mod'
    );
    
    // menu
    $this->settings['top_left_menu_'.$e] = array(
        'title'   => __( 'Choose Menu', 'octa' ),
        'type'    => 'select',
        'section' => 'it_topbar',
        'parent'   => 'top_bar_left_'.$e,
        'choices' => site_menu(),
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'menu'
        ),
    );
    $this->settings['top_left_menu_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'menu'
        ),
    );
    $this->settings['top_left_menu_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'menu'
        ),
    );
    
    // text
    $this->settings['top_left_text_icon_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Icon', 'octa' ),
        'desc'    => __( 'choose icon.', 'octa' ),
        'multilang' => true,
        'type'    => 'icon',
        'parent'   => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'text'
        ),
    );
    $this->settings['top_left_text_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Text', 'octa' ),
        'desc'    => __( 'Add text to be displayed in the left top bar.', 'octa' ),
        'multilang' => true,
        'type'    => 'text',
        'parent'   => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'text'
        ),
    );
    $this->settings['top_left_text_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'text'
        ),
    );
    $this->settings['top_left_text_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'text'
        ),
    );
    
    // link
    $this->settings['top_left_link_icon_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Icon', 'octa' ),
        'desc'    => __( 'choose icon.', 'octa' ),
        'multilang' => true,
        'type'    => 'icon',
        'parent'   => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'link'
        ),
    );
    $this->settings['top_left_link_text_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Text', 'octa' ),
        'desc'    => __( 'Add text to be displayed in the link.', 'octa' ),
        'multilang' => true,
        'type'    => 'text',
        'parent'   => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'link'
        ),
    );
    $this->settings['top_left_link_url_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Link URL', 'octa' ),
        'desc'    => __( 'Add link url.', 'octa' ),
        'type'    => 'text',
        'parent'   => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'link'
        ),
    );
    $this->settings['top_left_link_target_'.$e] = array(
        'title'   => __( 'Target', 'octa' ),
        'type'    => 'select',
        'section' => 'it_topbar',
        'choices' => array(
            ''        => 'Same Page',
            '_blank'  => 'New Window',
        ),
        'parent'    => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'link'
        ),
    );
    $this->settings['top_left_link_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar',
        'parent'    => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'link'
        ),
    );
    $this->settings['top_left_link_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'link'
        ),
    );
    $this->settings['top_left_link_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'link'
        ),
    );
                
    // social icons
    $this->settings['top_left_socials_txt_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Social icons text before', 'octa' ),
        'desc'    => __( 'text before Social icons.', 'octa' ),
        'type'    => 'text',
        'multilang' => true,
        'parent'   => 'top_bar_left_'.$e,
        'std'     => 'Follow us on: ',
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'socials'
        ),
    );
    $this->settings['top_left_socials_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'socials'
        ),
    );
    $this->settings['top_left_socials_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'socials'
        ),
    );  
    
    // search
    $this->settings['top_left_search_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'search'
        ),
    );
    $this->settings['top_left_search_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'search'
        ),
    );
    
    // login
    $this->settings['top_left_login_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'login'
        ),
    );
    
    // woocart
    $this->settings['top_left_woocart_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'woocart'
        ),
    );
    $this->settings['top_left_woocart_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'woocart'
        ),
    );
    
    // wpml
    $this->settings['top_left_wpml_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'wpml'
        ),
    );
    $this->settings['top_left_wpml_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_left_'.$e,
        'dependency' => array(
            'element' => 'top_bar_left_'.$e,
            'value' => 'wpml'
        ),
    );  
    
}

// right top bar
$this->settings['top_right_mod'] = array(
    'section' => 'it_topbar',
    'title'   => __( 'Top Bar Right', 'octa' ),
    'type'    => 'addmodule',
    'class'   => 'right_top_bar',
    'std'     => '0',
    'dependency' => array(
        'element' => 'show_top_bar',
        'not_empty' => true
    ),
); 
$rtopbar = isset($options['top_right_mod']) ? $options['top_right_mod'] : 0;        
for( $e = 0 ; $e <= $rtopbar ; $e++ ) {
    $this->settings['top_bar_right_'.$e] = array(
        'type'    => 'select',
        'class'     => 'selVal',
        'section' => 'it_topbar',
        'choices' => array(
            ''              => '-- Select Box --',
            'menu'          => 'Menu',
            'text'          => 'Text',
            'link'          => 'Link',
            'socials'       => 'Social Icons',
            'search'        => 'Search',
            'login'         => 'WP Login',
            'woocart'       => 'Shopping Cart',
            'wpml'          => 'Language Switcher (WPML)',
        ),
        'parent'    => 'top_right_mod'
    );
    
    // menu
    $this->settings['top_right_menu_'.$e] = array(
        'title'   => __( 'Choose Menu', 'octa' ),
        'type'    => 'select',
        'section' => 'it_topbar',
        'parent'   => 'top_bar_right_'.$e,
        'choices' => site_menu(),
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'menu'
        ),
    );
    $this->settings['top_right_menu_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'menu'
        ),
    );
    $this->settings['top_right_menu_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'menu'
        ),
    );
    
    // text
    $this->settings['top_right_text_icon_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Icon', 'octa' ),
        'desc'    => __( 'choose icon.', 'octa' ),
        'multilang' => true,
        'type'    => 'icon',
        'parent'   => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'text'
        ),
    );
    $this->settings['top_right_text_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Text', 'octa' ),
        'desc'    => __( 'Add text to be displayed in the left top bar.', 'octa' ),
        'multilang' => true,
        'type'    => 'text',
        'parent'   => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'text'
        ),
    );
    $this->settings['top_right_text_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'text'
        ),
    );
    $this->settings['top_right_text_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'text'
        ),
    );
    
    // link
    $this->settings['top_right_link_icon_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Icon', 'octa' ),
        'desc'    => __( 'choose icon.', 'octa' ),
        'multilang' => true,
        'type'    => 'icon',
        'parent'   => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'link'
        ),
    );
    $this->settings['top_right_link_text_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Text', 'octa' ),
        'desc'    => __( 'Add text to be displayed in the link.', 'octa' ),
        'multilang' => true,
        'type'    => 'text',
        'parent'   => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'link'
        ),
    );
    $this->settings['top_right_link_url_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Link URL', 'octa' ),
        'desc'    => __( 'Add link url.', 'octa' ),
        'type'    => 'text',
        'parent'   => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'link'
        ),
    );
    $this->settings['top_right_link_target_'.$e] = array(
        'title'   => __( 'Target', 'octa' ),
        'type'    => 'select',
        'section' => 'it_topbar',
        'choices' => array(
            ''        => 'Same Page',
            '_blank'  => 'New Window',
        ),
        'parent'    => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'link'
        ),
    );
    $this->settings['top_right_link_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar',
        'parent'    => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'link'
        ),
    );
    $this->settings['top_right_link_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'link'
        ),
    );
    $this->settings['top_right_link_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'link'
        ),
    );
                
    // social icons
    $this->settings['top_right_socials_txt_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Social icons text before', 'octa' ),
        'desc'    => __( 'text before Social icons.', 'octa' ),
        'type'    => 'text',
        'multilang' => true,
        'parent'   => 'top_bar_right_'.$e,
        'std'     => 'Follow us on: ',
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'socials'
        ),
    );
    $this->settings['top_right_socials_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'socials'
        ),
    );
    $this->settings['top_right_socials_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'socials'
        ),
    );
    
    // search
    $this->settings['top_right_search_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'search'
        ),
    );
    $this->settings['top_right_search_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'search'
        ),
    );
    
    // login
    $this->settings['top_right_login_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'login'
        ),
    );
    
    // woocart
    $this->settings['top_right_woocart_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'woocart'
        ),
    );
    $this->settings['top_right_woocart_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'woocart'
        ),
    );
    
    // wpml
    $this->settings['top_right_wpml_css_'.$e] = array(
        'title'   => __( 'CSS Class', 'octa' ),
        'desc'    => __( 'Add extra class name, then go to : General Settings > Custom CSS & JS and add the new css code for this class.', 'octa' ),
        'type'    => 'text',
        'section' => 'it_topbar', 
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'wpml'
        ),
    );
    $this->settings['top_right_wpml_hide_'.$e] = array(
        'section' => 'it_topbar',
        'title'   => __( 'Hide ( if user is logged in )', 'octa' ),
        'type'    => 'checkbox',
        'parent'  => 'top_bar_right_'.$e,
        'dependency' => array(
            'element' => 'top_bar_right_'.$e,
            'value' => 'wpml'
        ),
    );
    
}

// styling...
$this->settings['top-bar-styling'] = array(
    'section' => 'it_topbar',
    'desc'    => __( 'Styling', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'tb-style-acc'
);
$this->settings['topbar_color'] = array(
    'title'   => __( 'Color', 'octa' ),
    'type'    => 'select',
    'section' => 'it_topbar',
    'choices' => array(
        'light'  => 'Light',
        'gry-bg' => 'Grey',
        'main-bg' => 'Colored',
        'dark-bg' => 'Dark',
        'custom' => 'Custom',
    ),
);
$this->settings['barcolor'] = array(
    'title'   => __( 'Text color', 'octa' ),
    'desc'    => __( 'Color of the top bar elements', 'octa' ),
    'type'    => 'color',
    'section' => 'it_topbar',
    'dependency' => array(
        'element' => 'topbar_color',
        'value' => 'custom'
    ),
);
$this->settings['bariconcolor'] = array(
    'title'   => __( 'Icons color', 'octa' ),
    'desc'    => __( 'Color of the top bar Icons', 'octa' ),
    'type'    => 'color',
    'section' => 'it_topbar',
    'dependency' => array(
        'element' => 'topbar_color',
        'value' => 'custom'
    ),
);
$this->settings['barbgcolor'] = array(
    'title'   => __( 'Background color', 'octa' ),
    'type'    => 'color',
    'section' => 'it_topbar',
    'dependency' => array(
        'element' => 'topbar_color',
        'value' => 'custom'
    ),
);
$this->settings['bar_image'] = array(
    'section' => 'it_topbar',
    'title'   => __( 'Background Image', 'octa' ),
    'desc'    => __( 'Select or insert image url.', 'octa' ),
    'type'    => 'file',
    'dependency' => array(
        'element' => 'topbar_color',
        'value' => 'custom'
    ),
);
$this->settings['bar_img_repeat'] = array(
    'title'   => __( 'Background repeat', 'octa' ),
    'desc'    => __( 'How the background image repeats.', 'octa' ),
    'type'    => 'select',
    'section' => 'it_topbar',
    'class'   => 'select_boxes',
    'choices' => array(
        '' => 'repeat',
        'no-repeat' => 'no-repeat',
        'repeat-x' => 'repeat-x',
        'repeat-y' => 'repeat-y'
    ),
    'dependency' => array(
        'element' => 'bar_image',
        'not_empty' => true
    )
);
$this->settings['bar_bg_size'] = array(
    'title'   => __( 'Background Size', 'octa' ),
    'type'    => 'select',
    'section' => 'it_topbar',
    'class'   => 'select_boxes',
    'choices' => array(
        'cover' => 'Cover',
        'contain' => 'Contain',
        '100% 100%' => '100%',
    ),
    'dependency' => array(
        'element' => 'bar_image',
        'not_empty' => true
    )
);
$this->settings['bar_full'] = array(
    'section' => 'it_topbar',
    'title'   => __( 'Full Width ?', 'octa' ),
    'desc'    => __( 'Make top bar in full width.', 'octa' ),
    'type'    => 'checkbox', 
); 
$this->settings['topbar_border'] = array(
    'section' => 'it_topbar',
    'title'   => __( 'Bottom Border ?', 'octa' ),
    'desc'    => __( 'Yes to add bottom border for top bar.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1'
);

/* Header Settings
==========================================*/

$this->settings['header-layouts-heading'] = array(
    'section' => 'it_header',
    'desc'    => __( 'Header', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'hed-layout-acc'
);
$this->settings['header_layout'] = array(
    'title'   => __( 'Choose header layout', 'octa' ),
    'desc'    => __( 'Choose header layout from the below:', 'octa' ),
    'type'    => 'select',
    'section' => 'it_header',
    'class'   => '',
    'choices' => array(
        'classic' => 'Classic',
        'modern' => 'Modern',
        'boxes' => 'Boxes',
        'left' => 'Left Side',
        'right' => 'Right Side'
    ),
    'std'   => 'classic'
); 
$this->settings['header-minimal-set'] = array(
    'section' => 'it_header',
    'title'   => __( 'Classic Header Variations', 'octa' ),
    'desc'    => __( 'Choose Header styles for classic header.', 'octa' ),
    'type'    => 'select',
    'class'   => 'select_boxes',
    'choices' => array(
        'simple'  => 'Simple',
        'blocks' => 'Blocks',
        'borders' => 'Borders',
        'bottom-menu' => 'Bottom Menu'                
    ),
    'dependency' => array(
        'element' => 'header_layout',
        'value' => 'classic'
    ),
);
$this->settings['header-dark'] = array(
    'section' => 'it_header',
    'title'   => __( 'Dark', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
);
$this->settings['header-full'] = array(
    'section' => 'it_header',
    'title'   => __( 'Full Width', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
    'dependency' => array(
        'element' => 'header_layout',
        'value' => array('boxes','modern','classic')
    ),
);
$this->settings['header-fixed'] = array(
    'section' => 'it_header',
    'title'   => __( 'Fixed ?', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
    'dependency' => array(
        'element' => 'header_layout',
        'value' => array('boxes','modern','classic')
    ),
);
$this->settings['header-position'] = array(
    'section' => 'it_header',
    'title'   => __( 'Fixed Header Position', 'octa' ),
    'type'    => 'select',
    'class'   => 'select_boxes',
    'std'     => 'top',
    'choices' => array(
        'top'  => 'Top',
        'bottom' => 'Bottom'                
    ),
    'dependency' => array(
        'element' => 'header-fixed',
        'not_empty' => true
    ),
);
$this->settings['top-pos'] = array(
    'title'   => __( 'Top', 'octa' ),
    'desc'    => __( 'Distance from top in px.', 'octa' ),
    'std'     => '20',
    'min'     => '0',
    'max'     => '500',
    'type'    => 'number',
    'section' => 'it_header',
    'dependency' => array(
        'element' => 'header-position',
        'value' => 'top'
    )
);
$this->settings['bottom-pos'] = array(
    'title'   => __( 'Bottom', 'octa' ),
    'desc'    => __( 'Distance from bottom in px.', 'octa' ),
    'std'     => '0',
    'min'     => '0',
    'max'     => '500',
    'type'    => 'number',
    'section' => 'it_header',
    'dependency' => array(
        'element' => 'header-position',
        'value' => 'bottom'
    )
);
$this->settings['header_padding'] = array(
    'title'   => __( 'Header Padding', 'octa' ),
    'desc'    => __( 'Top and Bottom Header content padding in px.', 'octa' ),
    'std'     => '0|0',
    'firstInput' => '<i class="fa fa-long-arrow-up"></i>',
    'lastInput' => '<i class="fa fa-long-arrow-down"></i>',
    'type'    => 'twonumber',
    'section' => 'it_header',
);
$this->settings['show_search'] = array(
    'section' => 'it_header',
    'title'   => __( 'Show Search box', 'octa' ),
    'desc'    => __( 'Show / Hide Search box in header.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1'
);
$this->settings['search_box_style'] = array(
    'section' => 'it_header',
    'title'   => __( 'Search Box Style', 'octa' ),
    'type'    => 'select',
    'class'   => 'select_boxes',
    'choices' => array(
        ''  => 'Normal',
        'over' => 'Overlay'                
    ),
    'dependency' => array(
        'element' => 'show_search',
        'not_empty' => true
    ),
);
$this->settings['show_cart'] = array(
    'section' => 'it_header',
    'title'   => __( 'Show Cart box', 'octa' ),
    'desc'    => __( 'Show / Hide Cart box in header.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'dependency' => array(
        'element' => 'header_layout',
        'value' => array('boxes','modern','classic')
    ),
);
$this->settings['header-ads'] = array(
    'section' => 'it_header',
    'title'   => __( 'Header Banner image', 'octa' ),
    'desc'    => __( 'Add Here Ads image.', 'octa' ),
    'type'    => 'file',
    'dependency' => array(
        'element' => 'header-minimal-set',
        'value' => 'bottom-menu'
    ),
);
$this->settings['header-ads-url'] = array(
    'section' => 'it_header',
    'title'   => __( 'Banner URL', 'octa' ),
    'desc'    => __( 'Add Here Ads URL.', 'octa' ),
    'type'    => 'text',
    'dependency' => array(
        'element' => 'header-minimal-set',
        'value' => 'bottom-menu'
    ),
);
$this->settings['show_head_socials'] = array(
    'section' => 'it_header',
    'title'   => __( 'Show Social Icons ?', 'octa' ),
    'desc'    => __( 'Yes to social icons in the side header.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'dependency' => array(
        'element' => array('header_layout'),
        'value' => array('left','right')
    ),
);
$this->settings['show_head_copy'] = array(
    'section' => 'it_header',
    'title'   => __( 'Show Copyrights ?', 'octa' ),
    'desc'    => __( 'Yes to copyrights in the side header.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'dependency' => array(
        'element' => array('header_layout'),
        'value' => array('left','right')
    ),
);
$this->settings['header-styling-heading'] = array(
    'section' => 'it_header',
    'desc'    => __( 'Styling', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'hed-style-acc'
);
$this->settings['nav_text_bg_color'] = array(
    'title'   => __( 'Boxes Background color', 'octa' ),
    'desc'    => __( 'Choose a color for boxes background color', 'octa' ),
    'type'    => 'color',
    'section' => 'it_header',
    'dependency' => array(
        'element' => 'header_layout',
        'value' => 'boxes'
    )
);
$this->settings['nav_icon_color'] = array(
    'title'   => __( 'Icons color', 'octa' ),
    'desc'    => __( 'Choose a color for main menu icons.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_header',
);       
$this->settings['nav_bg_color'] = array(
    'title'   => __( 'Background color', 'octa' ),
    'desc'    => __( 'Choose header background color.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_header',
);
$this->settings['nav_image'] = array(
    'section' => 'it_header',
    'title'   => __( 'Background Image', 'octa' ),
    'desc'    => __( 'Select or insert image url.', 'octa' ),
    'type'    => 'file',
);
$this->settings['nav_img_full_width'] = array(
    'section' => 'it_header',
    'title'   => __( '100% Background Image', 'octa' ),
    'desc'    => __( 'Display at 100% width and height.', 'octa' ),
    'type'    => 'checkbox',
    'dependency' => array(
        'element' => 'nav_image',
        'not_empty' => true
    )
);
$this->settings['nav_img_repeat'] = array(
    'title'   => __( 'Background repeat', 'octa' ),
    'desc'    => __( 'How the background image repeats.', 'octa' ),
    'type'    => 'select', 
    'section' => 'it_header',
    'class'   => 'select_boxes',
    'choices' => array(
        '' => 'repeat',
        'no-repeat' => 'no-repeat',
        'repeat-x' => 'repeat-x',
        'repeat-y' => 'repeat-y'
    ),
    'dependency' => array(
        'element' => 'nav_image',
        'not_empty' => true
    )
); 
$this->settings['nav_border_color'] = array(
    'title'   => __( 'Border color', 'octa' ),
    'desc'    => __( 'Choose header border color for modern Header ONLY.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_header',
    'dependency' => array(
        'element' => 'header_layout',
        'value' => 'modern'
    )
);
$this->settings['nav_border_width'] = array(
    'title'   => __( 'Border Width', 'octa' ),
    'desc'    => __( 'Choose header border size in px.', 'octa' ),
    'std'     => '0',
    'min'     => '0',
    'max'     => '20',
    'type'    => 'number',
    'section' => 'it_header',
    'dependency' => array(
        'element' => 'header_layout',
        'value' => 'modern'
    )
);   
    
$this->settings['sticky_header'] = array(
    'section' => 'it_header',
    'desc'    => __( 'Sticky Header', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'sticky-acc'
);
$this->settings['sticky_header_on'] = array(
    'section' => 'it_header',
    'title'   => __( 'Enable Sticky Header', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['sticky_bg_color'] = array(
    'title'   => __( 'Background Color', 'octa' ),
    'desc'    => __( 'Background color for sticky header.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_header',
);
$this->settings['sticky_text_color'] = array(
    'title'   => __( 'Font Color', 'octa' ),
    'desc'    => __( 'Text color for sticky header items.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_header',
);
$this->settings['sticky_tablets'] = array(
    'section' => 'it_header',
    'title'   => __( 'Show on Tablets', 'octa' ),
    'desc'    => __( 'Display sticky header in tablets.', 'octa' ),
    'type'    => 'checkbox',
);
$this->settings['sticky_mobiles'] = array(
    'section' => 'it_header',
    'title'   => __( 'Show on Mobiles', 'octa' ),
    'desc'    => __( 'Display sticky header in mobiles.', 'octa' ),
    'type'    => 'checkbox',
);

/* Logo
============================================*/
$this->settings['logo_inputs'] = array(
    'section' => 'it_logo',
    'desc'    => __( 'Logo', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'logo-acc'
);
$this->settings['logo-position'] = array(
    'section' => 'it_logo',
    'title'   => __( 'Logo Position', 'octa' ),
    'desc'    => __( 'Choose logo position.', 'octa' ),
    'type'    => 'select',
    'class'   => 'select_boxes',
    'choices' => array(
        '' => 'Left',
        'center-logo' => 'Center',
        'right-logo' => 'Right'                
    ),
    'dependency' => array(
        'element' => 'header_layout',
        'value' => array('header-1','header-2','header-transparent','header-semi-transparent','header-modern','header-classic')
    ),
);
$this->settings['logo_type'] = array(
    'section' => 'it_logo',    
    'title'   => __( 'Logo Type', 'octa' ),
    'class'   => 'select_boxes',
    'type'    => 'select',
    'choices' => array(
        'image' => 'Image',
        'text' => 'Text',
    ),
    'std' => 'text'
);
$this->settings['header_logo_image'] = array(
    'section' => 'it_logo',
    'title'   => __( 'Default Logo', 'octa' ),
    'desc'    => __( 'Select or insert image url for logo.', 'octa' ),
    'type'    => 'file',
    'dependency' => array(
        'element' => 'logo_type',
        'value' => 'image'
    )
);
$this->settings['sticky_logo'] = array(
    'section' => 'it_logo',
    'title'   => __( 'Sticky Header Logo', 'octa' ),
    'desc'    => __( 'Select or insert image url for logo.', 'octa' ),
    'type'    => 'file',
    'dependency' => array(
        'element' => 'logo_type',
        'value' => 'image'
    )
);
$this->settings['logo_font'] = array(
    'title'   => __( 'Logo Font Family', 'octa' ),
    'std'     => 'Oswald',
    'type'    => 'select',
    'class'   => 'chosen-select',
    'section' => 'it_logo',
    'choices' => them_googleFonts(),
    'dependency' => array(
        'element' => 'logo_type',
        'value' => 'text'
    )
);
$this->settings['logo_font_size'] = array(
    'title'   => __( 'Logo Font Size', 'octa' ),
    'desc'    => __( 'Enter Font size in px. Ex: 50px', 'octa' ),
    'std'     => '42px',
    'type'    => 'text',
    'section' => 'it_logo',
    'dependency' => array(
        'element' => 'logo_type',
        'value' => 'text'
    )
);
$this->settings['logo_font_weight'] = array(
    'title'   => __( 'Logo Font Weight', 'octa' ),
    'desc'    => __( 'Choose Font weight for Logo', 'octa' ),
    'std'     => '900',
    'type'    => 'select',
    'section' => 'it_logo',
    'choices' => array(
        ''  => '-- Select --',
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
    'dependency' => array(
        'element' => 'logo_type',
        'value' => 'text'
    )
);
$this->settings['logo_font_color'] = array(
    'title'   => __( 'Logo Text Color', 'octa' ),
    'desc'    => __( 'Color for the Logo text.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_logo',
    'dependency' => array(
        'element' => 'logo_type',
        'value' => 'text'
    )
);
$this->settings['mobile_logo_size'] = array(
    'title'   => __( 'Mobile Logo Font Size', 'octa' ),
    'desc'    => __( 'Enter Font size in px. Ex: 50px', 'octa' ),
    'std'     => '25px',
    'type'    => 'text',
    'section' => 'it_logo',
    'dependency' => array(
        'element' => 'logo_type',
        'value' => 'text'
    )
);
$this->settings['slogan_inputs'] = array(
    'section' => 'it_logo',
    'desc'    => __( 'Tagline', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'slogan-acc',
);
$this->settings['slogan_font'] = array(
    'title'   => __( 'Tagline Font Family', 'octa' ),
    'std'     => 'Open Sans',
    'type'    => 'select',
    'class'   => 'chosen-select',
    'section' => 'it_logo',
    'choices' => them_googleFonts(),
);
$this->settings['slogan_font_size'] = array(
    'title'   => __( 'Tagline Font Size', 'octa' ),
    'desc'    => __( 'Enter Font size in px. Ex: 11px', 'octa' ),
    'std'     => '11px',
    'type'    => 'text',
    'section' => 'it_logo',
);
$this->settings['slogan_font_weight'] = array(
    'title'   => __( 'Tagline Font Weight', 'octa' ),
    'std'     => '400',
    'type'    => 'select',
    'section' => 'it_logo',
    'choices' => array(
        ''  => '-- Select --',
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
);
$this->settings['slogan_font_color'] = array(
    'title'   => __( 'Tagline Text Color', 'octa' ),
    'std'     => '#666666',
    'type'    => 'color',
    'section' => 'it_logo',
);

/* Menu
============================================*/
$this->settings['menu-opts-heading'] = array(
    'section' => 'it_menu',
    'desc'    => __( 'Menu Options', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'menu-opts-acc'
);
$this->settings['nav_text_color'] = array(
    'title'   => __( 'Links color', 'octa' ),
    'desc'    => __( 'Choose a color for header menu links', 'octa' ),
    'type'    => 'color',
    'section' => 'it_menu',
);
$this->settings['header-icons'] = array(
    'section' => 'it_menu',
    'title'   => __( 'Menu First Level Icons', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
);
$this->settings['header-sub-icons'] = array(
    'section' => 'it_menu',
    'title'   => __( 'Show Submenu Icons', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['header-subtitle'] = array(
    'section' => 'it_menu',
    'title'   => __( 'Show Menu Subtitles', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
);  
$this->settings['sub_menu_color'] = array(
    'title'   => __( 'Sub Menu Color', 'octa' ),
    'desc'    => __( 'Select the sub menu color.', 'octa' ),
    'type'    => 'select',
    'class'   => 'select_boxes',
    'section' => 'it_menu',
    'choices' => array(
        '' => 'Light',
        'dark-sub' => 'Dark',
        'custom' => 'custom'
    ),
);
$this->settings['sub_menu_bg_color'] = array(
    'title'   => __( 'Submenu Background Color', 'octa' ),
    'type'    => 'color',
    'section' => 'it_menu',
    'dependency' => array(
        'element' => 'sub_menu_color',
        'value' => 'custom'
    )
);
$this->settings['sub_menu_font_color'] = array(
    'title'   => __( 'Submenu Font Color', 'octa' ),
    'type'    => 'color',
    'section' => 'it_menu',
    'dependency' => array(
        'element' => 'sub_menu_color',
        'value' => 'custom'
    )
);
/* Menu Locations.
============================================*/
$this->settings['location-options'] = array(
    'section' => 'it_menu',
    'desc'    => 'Menu Locations',
    'type'    => 'heading',
    'data_id' => 'locs-acc'
);
$this->settings['locations'] = array(
    'section' => 'it_menu',
    'title'   => __( 'Locations', 'octa' ),
    'desc'    => __( 'Add unlimited nav menu locations.', 'octa' ),
    'type'    => 'addbox',
    'std'     => '0'
);

$locss = isset($options['locations']) ? $options['locations'] : 0;        
for ( $i = 0; $i <= $locss ; $i++ ) {
    $this->settings['location_'.$i] = array(
        'title'     => __( 'Location Name ', 'octa' ),
        'type'      => 'text',
        'parent'    => 'locations',
        'multilang' => true, 
        'class'     => 'indval',    
        'section'   => 'it_menu'
    );
}
$this->settings['menu-heading'] = array(
    'section' => 'it_menu',
    'desc'    => __( 'Mobile Menu', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'mob-menu-acc'
);
$this->settings['mob_menu_bg_color'] = array(
    'title'   => __( 'Background Color', 'octa' ),
    'type'    => 'color',
    'section' => 'it_menu',
);
$this->settings['mob_menu_txt_color'] = array(
    'title'   => __( 'Text Color', 'octa' ),
    'type'    => 'color',
    'section' => 'it_menu',
);
               
/* Footer
============================================*/
$this->settings['footer-heading'] = array(
    'section' => 'it_footer',
    'desc'    => __( 'Footer', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'foot-acc'
);
$this->settings['footer_style'] = array(
    'title'   => __( 'Footer Style', 'octa' ),
    'std'     => '1',
    'type'    => 'select',
    'section' => 'it_footer',
    'class'   => 'select_boxes',
    'choices' => array(
        '1' => 'Style 1',
        '2' => 'Style 2',
        '3' => 'Style 3',
        'minimal-1' => 'Minimal 1',
        'minimal-2' => 'Minimal 2',
    )
);
$this->settings['footer_light'] = array(
    'section' => 'it_footer',
    'title'   => __( 'Light ?', 'octa' ),
    'desc'    => __( '"ON" for a light colored footer.', 'octa' ),
    'type'    => 'checkbox',
);
$this->settings['footer_fixed'] = array(
    'section' => 'it_footer',
    'title'   => __( 'Fixed ?', 'octa' ),
    'desc'    => __( '"ON" for a bottom fixed footer.', 'octa' ),
    'type'    => 'checkbox',
);

/* Middle Footer */
$this->settings['footer-middle-head'] = array(
    'section' => 'it_footer',
    'desc'    => __( 'Widgets Area', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'foot-mid-acc'
);
$this->settings['foot_mid_show'] = array(
    'section' => 'it_footer',
    'title'   => __( 'Show footer widgets Area', 'octa' ),
    'desc'    => __( '"ON" to display footer widgets.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1'
);
$this->settings['foot_mid_widg_cols'] = array(
    'title'   => __( 'Number of Columns', 'octa' ),
    'std'     => '3',
    'type'    => 'select',
    'section' => 'it_footer',
    'class'   => 'select_boxes',
    'choices' => array(
        '12' => '1',
        '6' => '2',
        '4' => '3',
        '3' => '4'
    )
);
$this->settings['foot_mid_bg_color'] = array(
    'title'   => __( 'Background color', 'octa' ),
    'type'    => 'color',
    'section' => 'it_footer',
);
$this->settings['foot_mid_top_border'] = array(
    'title'   => __( 'Top Border color', 'octa' ),
    'type'    => 'color',
    'section' => 'it_footer',
    'dependency' => array(
        'element' => 'footer_style',
        'value' => '1'
    )
);
$this->settings['foot_mid_text_color'] = array(
    'title'   => __( 'Text color', 'octa' ),
    'type'    => 'color',
    'section' => 'it_footer',
);
$this->settings['foot_mid_bg'] = array(
    'section' => 'it_footer',
    'title'   => __( 'Background Image', 'octa' ),
    'desc'    => __( 'Select an image or insert a url.', 'octa' ),
    'type'    => 'file',
);
$this->settings['foot_mid_bg_position'] = array(
    'title'   => __( 'Background Position', 'octa' ),
    'type'    => 'select',
    'section' => 'it_footer',
    'choices' => array(
        '0 0' => 'Left Top',
        '0 50%' => 'Left Middle',
        '0 100%' => 'Left Bottom',
        '50% 0' => 'Center Top',
        '50% 50%' => 'Center Middle',
        '50% 100%' => 'Center Right',
        '100% 0' => 'Right Top',
        '100% 50%' => 'Right Middle',
        '100% 100%' => 'Right Bottom',
    ),
    'std'   => '0 100%',
    'dependency' => array(
        'element' => 'foot_mid_bg',
        'not_empty' => true
    )
);
$this->settings['foot_mid_bg_repeat'] = array(
    'title'   => __( 'Background repeat', 'octa' ),
    'desc'    => __( 'How the background image repeats.', 'octa' ),
    'type'    => 'select',
    'section' => 'it_footer',
    'class'   => 'select_boxes',
    'choices' => array(
        '' => 'repeat',
        'no-repeat' => 'no-repeat',
        'repeat-x' => 'repeat-x',
        'repeat-y' => 'repeat-y'
    ),
    'std'   => 'repeat-x',
    'dependency' => array(
        'element' => 'foot_mid_bg',
        'not_empty' => true
    )
);
$this->settings['foot_mid_bg_size'] = array(
    'title'   => __( 'Background Size', 'octa' ),
    'type'    => 'select',
    'section' => 'it_footer',
    'class'   => 'select_boxes',
    'choices' => array(
        'cover' => 'Cover',
        'contain' => 'Contain',
        '100% 100%' => '100%',
    ),
    'dependency' => array(
        'element' => 'foot_mid_bg',
        'not_empty' => true
    )
);

/* Bottom Footer */
$this->settings['foot-bottom-head'] = array(
    'section' => 'it_footer',
    'desc'    => __( 'Bottom Footer Area', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'foot-bottom-acc'
);
$this->settings['foot_bottom_show'] = array(
    'section' => 'it_footer',
    'title'   => __( 'Show Bottom Footer Area', 'octa' ),
    'desc'    => __( 'Show / Hide bottom footer bar.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1'
);
$this->settings['foot_bot_widg_cols'] = array(
    'title'   => __( 'Number of Columns', 'octa' ),
    'std'     => '6',
    'type'    => 'select',
    'section' => 'it_footer',
    'class'   => 'select_boxes',
    'choices' => array(
        '12' => '1',
        '6' => '2',
        '4' => '3',
        '3' => '4'
    )
);

$this->settings['foot_copyrights'] = array(
    'section' => 'it_footer',
    'title'   => __( 'Copyrights', 'octa' ),
    'desc'    => __( 'Insert here the copyrights text.', 'octa' ),
    'multilang' => true,
    'std' => 'Copyrights &copy; 2017. All rights reserved to <b class="main-color">OCTA</b> Co.',
    'type'    => 'editor',
);
 
$this->settings['foot_bot_bg_color'] = array(
    'title'   => __( 'Background color', 'octa' ),
    'desc'    => __( 'Footer Bottom Bar background color.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_footer',
);
$this->settings['foot_bot_text_color'] = array(
    'title'   => __( 'Text color', 'octa' ),
    'type'    => 'color',
    'section' => 'it_footer',
);
$this->settings['foot_bot_bg'] = array(
    'section' => 'it_footer',
    'title'   => __( 'Background Image', 'octa' ),
    'desc'    => __( 'Select an image or insert a url.', 'octa' ),
    'type'    => 'file',
);
$this->settings['foot_bot_bg_repeat'] = array(
    'title'   => __( 'Background repeat', 'octa' ),
    'desc'    => __( 'How the background image repeats.', 'octa' ),
    'type'    => 'select',
    'section' => 'it_footer',
    'class'   => 'select_boxes',
    'choices' => array(
        '' => 'repeat',
        'no-repeat' => 'no-repeat',
        'repeat-x' => 'repeat-x',
        'repeat-y' => 'repeat-y'
    ),
    'dependency' => array(
        'element' => 'foot_bot_bg',
        'not_empty' => true
    )
);
$this->settings['foot_bot_bg_position'] = array(
    'title'   => __( 'Background Position', 'octa' ),
    'type'    => 'select',
    'section' => 'it_footer',
    'choices' => array(
        '0 0' => 'Left Top',
        '0 50%' => 'Left Middle',
        '0 100%' => 'Left Bottom',
        '50% 0' => 'Center Top',
        '50% 50%' => 'Center Middle',
        '50% 100%' => 'Center Right',
        '100% 0' => 'Right Top',
        '100% 50%' => 'Right Middle',
        '100% 100%' => 'Right Bottom',
    ),
    'std'   => '0 100%',
    'dependency' => array(
        'element' => 'foot_bot_bg',
        'not_empty' => true
    )
);
$this->settings['foot_bot_bg_size'] = array(
    'title'   => __( 'Background Size', 'octa' ),
    'type'    => 'select',
    'section' => 'it_footer',
    'class'   => 'select_boxes',
    'choices' => array(
        'cover' => 'Cover',
        'contain' => 'Contain',
        '100% 100%' => '100%',
    ),
    'dependency' => array(
        'element' => 'foot_bot_bg',
        'not_empty' => true
    )
);    

/* Minimal Footer */   
$this->settings['footer-minimal-style'] = array(
    'section' => 'it_footer',
    'desc'    => __( 'Minimal Footer', 'octa' ),
    'type'    => 'heading',
    'std'     => '1',
    'data_id' => 'footer-min-acc'
);
$this->settings['minimal-logo'] = array(
    'section' => 'it_footer',
    'title'   => __( 'Minimal Footer Logo', 'octa' ),
    'desc'    => __( 'Select an image or insert a url.', 'octa' ),
    'type'    => 'file',
);
$this->settings['minimal-text'] = array(
    'section' => 'it_footer',
    'title'   => __( 'Description', 'octa' ),
    'desc'    => __( 'Insert here the description text.', 'octa' ),
    'multilang' => true,
    'type'    => 'editor',
    'std'     => 'Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vestibulum a velit eu ante scelerisque vulputate.Mauris mauris ante.'
);
$this->settings['address_minimal_footer'] = array(
    'section' => 'it_footer',
    'title'   => __( 'Address in minimal footer 1', 'octa' ),
    'desc'    => __( 'Show / Hide Address in footer.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['email_minimal_footer'] = array(
    'section' => 'it_footer',
    'title'   => __( 'Email in minimal footer 1', 'octa' ),
    'desc'    => __( 'Show / Hide Email in minimal footer.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['phone_minimal_footer'] = array(
    'section' => 'it_footer',
    'title'   => __( 'Phone in minimal footer 1', 'octa' ),
    'desc'    => __( 'Show / Hide Phone in minimal footer.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '0',
);
$this->settings['fax_minimal_footer'] = array(
    'section' => 'it_footer',
    'title'   => __( 'Fax in minimal footer 1', 'octa' ),
    'desc'    => __( 'Show / Hide Fax in minimal footer.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
);
        
/* Page title.
============================================*/
$this->settings['page-title-options'] = array(
    'section' => 'it_pagetitles',
    'desc'    => 'General Settings',
    'type'    => 'heading',
    'data_id' => 'title-acc'
);
$this->settings['title-position'] = array(
    'section' => 'it_pagetitles',
    'title'   => __( 'Position', 'octa' ),
    'desc'    => __( 'Choose Title Alignment.', 'octa' ),
    'type'    => 'select',
    'class'   => 'select_boxes',
    'choices' => array(
        '' => 'Left Title',
        'center' => 'Center Title',
        'right' => 'Right Title'                
    ),
);
$this->settings['page_head_height'] = array(
    'title'   => __( 'Custom Height', 'octa' ),
    'desc'    => __( 'Insert the height (in px). Ex: 200', 'octa' ),
    'type'    => 'number',
    'min'     => '1',
    'max'     => '500',
    'section' => 'it_pagetitles',
);
$this->settings['title_icon'] = array(
    'title'   => __( 'Page Title icon', 'octa' ),
    'desc'    => __( 'Choose icon for page title.', 'octa' ),
    'type'    => 'icon',
    'section' => 'it_pagetitles',
);
$this->settings['page_head_iconcolor'] = array(
    'title'   => __( 'Icon color', 'octa' ),
    'desc'    => __( 'Choose a solid Icon color.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_pagetitles',
);
$this->settings['page_head_iconbgcolor'] = array(
    'title'   => __( 'Icon Background color', 'octa' ),
    'desc'    => __( 'Choose a solid Icon Background color.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_pagetitles',
);
$this->settings['hide_page_title'] = array(
    'section' => 'it_pagetitles',
    'title'   => __( 'Hide All Page Titles', 'octa' ),
    'desc'    => __( 'Show/Hide page title in all pages.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '0'
);
$this->settings['page-title-typo'] = array(
    'section' => 'it_pagetitles',
    'desc'    => 'Typography',
    'type'    => 'heading',
    'data_id' => 'title-typo-acc'
);
$this->settings['title_font'] = array(
    'title'   => __( 'Font Family', 'octa' ),
    'desc'    => __( 'Choose Font Family for main page title', 'octa' ),
    'std'     => 'Oswald',
    'type'    => 'select',
    'class'   => 'chosen-select',
    'section' => 'it_pagetitles',
    'choices' => them_googleFonts(),
);
$this->settings['title_font_size'] = array(
    'title'   => __( 'Font Size', 'octa' ),
    'desc'    => __( 'Choose Font size for main page title', 'octa' ),
    'std'     => '45',
    'type'    => 'number',
    'section' => 'it_pagetitles',
);
$this->settings['subtitle_font_size'] = array(
    'title'   => __( 'Sub Title Font Size', 'octa' ),
    'desc'    => __( 'Choose Font size for page sub title', 'octa' ),
    'std'     => '21',
    'type'    => 'number',
    'section' => 'it_pagetitles',
);
$this->settings['title_font_weight'] = array(
    'title'   => __( 'Font Weight', 'octa' ),
    'desc'    => __( 'Choose Font weight for main page title', 'octa' ),
    'type'    => 'select',
    'section' => 'it_pagetitles',
    'choices' => array(
        ''  => '-- Select --',
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
);
$this->settings['title-styling'] = array(
    'section' => 'it_pagetitles',
    'desc'    => 'Styling',
    'type'    => 'heading',
    'data_id' => 'title_st-acc'
);
$this->settings['title-color'] = array(
    'section' => 'it_pagetitles',
    'title'   => __( 'Color', 'octa' ),
    'desc'    => __( 'Choose color', 'octa' ),
    'type'    => 'select',
    'class'   => 'select_boxes',
    'choices' => array(
        '' => 'Light',
        'dark' => 'Dark',
        'colored' => 'Colored',
        'custom'    => 'Custom'                
    ),
);
$this->settings['page_title_fontcolor'] = array(
    'title'   => __( 'Font color', 'octa' ),
    'desc'    => __( 'Choose a custom font color.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_pagetitles',
    'dependency' => array(
        'element' => 'title-color',
        'value' => 'custom'
    )
);
$this->settings['page_title_subcolor'] = array(
    'title'   => __( 'Subtitle color', 'octa' ),
    'desc'    => __( 'Choose a solid Subtitle color.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_pagetitles',
    'dependency' => array(
        'element' => 'title-color',
        'value' => 'custom'
    )
);
$this->settings['page_title_textcolor'] = array(
    'title'   => __( 'Text Background color', 'octa' ),
    'desc'    => __( 'Choose a color for the title text background.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_pagetitles',
    'dependency' => array(
        'element' => 'title-color',
        'value' => 'custom'
    )
);
$this->settings['page_title_bgcolor'] = array(
    'title'   => __( 'Background color', 'octa' ),
    'desc'    => __( 'Choose a solid background color.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_pagetitles',
    'dependency' => array(
        'element' => 'title-color',
        'value' => 'custom'
    )
);
$this->settings['page_title_bg'] = array(
    'title'   => __( 'Background Image', 'octa' ),
    'desc'    => __( 'Choose an image or insert a url.', 'octa' ),
    'type'    => 'file',
    'section' => 'it_pagetitles',
    'dependency' => array(
        'element' => 'title-color',
        'value' => 'custom'
    )
);
$this->settings['page_title_bg_size'] = array(
    'title'   => __( 'Background Size', 'octa' ),
    'type'    => 'select',
    'section' => 'it_pagetitles',
    'class'   => 'select_boxes',
    'choices' => array(
        'cover' => 'Cover',
        'contain' => 'Contain',
        '100% 100%' => '100%',
    ),
    'dependency' => array(
        'element' => 'page_title_bg',
        'not_empty' => true
    )
);
$this->settings['page_title_bg_repeat'] = array(
    'title'   => __( 'Background repeat', 'octa' ),
    'desc'    => __( 'How the background image repeats.', 'octa' ),
    'type'    => 'select',
    'section' => 'it_pagetitles',
    'class'   => 'select_boxes',
    'choices' => array(
        'repeat' => 'repeat',
        'no-repeat' => 'no-repeat',
        'repeat-x' => 'repeat-x',
        'repeat-y' => 'repeat-y'
    ),
    'dependency' => array(
        'element' => 'page_title_bg',
        'not_empty' => true
    )
);
$this->settings['page_title_bg_position'] = array(
    'title'   => __( 'Background Position', 'octa' ),
    'type'    => 'select',
    'section' => 'it_pagetitles',
    'choices' => array(
        '0 0' => 'Left Top',
        '0 50%' => 'Left Middle',
        '0 100%' => 'Left Bottom',
        '50% 0' => 'Center Top',
        '50% 50%' => 'Center Middle',
        '50% 100%' => 'Center Right',
        '100% 0' => 'Right Top',
        '100% 50%' => 'Right Middle',
        '100% 100%' => 'Right Bottom',
    ),
    'std'   => '0 100%',
    'dependency' => array(
        'element' => 'page_title_bg',
        'not_empty' => true
    )
);
$this->settings['page_title_parallax'] = array(
    'title'   => __( 'Parallax Background', 'octa' ),
    'type'    => 'checkbox',
    'section' => 'it_pagetitles',
    'dependency' => array(
        'element' => 'title-color',
        'value' => 'custom'
    )
);
$this->settings['page_head_overlay'] = array(
    'title'   => __( 'Overlay ?', 'octa' ),
    'desc'    => __( 'Overlay over the background image', 'octa' ),
    'type'    => 'color',
    'section' => 'it_pagetitles',
    'dependency' => array(
        'element' => 'title-color',
        'value' => 'custom'
    )
);
$this->settings['breadcrumbs-options'] = array(
    'section' => 'it_pagetitles',
    'desc'    => 'Breadcrumbs',
    'type'    => 'heading',
    'data_id' => 'breadcrumbs-acc'
);
$this->settings['show_breadcrumbs'] = array(
    'title'   => __( 'Show BreadCrumbs', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'section' => 'it_pagetitles',
);
$this->settings['breadcrumbs_style'] = array(
    'section' => 'it_pagetitles',
    'title'   => __( 'Breadcrumbs Style', 'octa' ),
    'type'    => 'select',
    'class'   => 'select_boxes',
    'choices' => array(
        '' => 'Style 1',
        'style2' => 'Style 2',
        'style3' => 'Style 3',
        'minimal' => 'Style 4',                
    ),
);
$this->settings['breadcrumbs_align'] = array(
    'section' => 'it_pagetitles',
    'title'   => __( 'Breadcrumbs Alignment', 'octa' ),
    'type'    => 'select',
    'class'   => 'select_boxes',
    'choices' => array(
        'text-right' => 'Right',
        'text-center' => 'Center',
        'text-left' => 'Left',
    ),
);
$this->settings['breadcrumbs_prefix'] = array(
    'title'   => __( 'Breadcrumbs Prefix', 'octa' ),
    'desc'    => __( 'Enter the text before the breadcrumbs', 'octa' ),
    'type'    => 'text',
    'multilang' => true,
    'section' => 'it_pagetitles',
);
$this->settings['breadcrumbs_suffix'] = array(
    'title'   => __( 'Breadcrumbs Suffix', 'octa' ),
    'desc'    => __( 'Enter the text after the breadcrumbs', 'octa' ),
    'type'    => 'text',
    'multilang' => true,
    'section' => 'it_pagetitles',
);
$this->settings['mobile_breadcrumbs'] = array(
    'title'   => __( 'Breadcrumbs on Mobiles', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'section' => 'it_pagetitles',
);
$this->settings['breadcrumbs_bgcolor'] = array(
    'title'   => __( 'Background color', 'octa' ),
    'desc'    => __( 'Choose a solid Background color.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_pagetitles',
);
$this->settings['breadcrumbs_color'] = array(
    'title'   => __( 'Font color', 'octa' ),
    'desc'    => __( 'Choose a solid Font color.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_pagetitles',
);

/* Typography.
============================================*/
$this->settings['body_heading'] = array(
    'section' => 'it_typography',
    'desc'    => __( 'Body', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'body_ty-acc'
);
$this->settings['body_font'] = array(
    'title'   => __( 'Font Family', 'octa' ),
    'std'     => 'Open Sans',
    'type'    => 'select',
    'class'   => 'chosen-select',
    'section' => 'it_typography',
    'choices' => them_googleFonts()
);
$this->settings['body_font_size'] = array(
    'title'   => __( 'Font Size', 'octa' ),
    'desc'    => __( 'Enter Font size in px. Ex: 14px', 'octa' ),
    'std'     => '14px',
    'type'    => 'text',
    'section' => 'it_typography'
);
$this->settings['body_font_weight'] = array(
    'title'   => __( 'Font Weight', 'octa' ),
    'std'     => 'normal',
    'type'    => 'select',
    'section' => 'it_typography',
    'choices' => array(
        ''  => '-- Select --',
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
    )
);
$this->settings['body_line_height'] = array(
    'title'   => __( 'Line Height', 'octa' ),
    'desc'    => __( 'Line Height for all body elemets.', 'octa' ),
    'std'     => '1.5',
    'type'    => 'text',
    'section' => 'it_typography'
);

$this->settings['menu_heading'] = array(
    'section' => 'it_typography',
    'desc'    => __( 'Menu', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'menu_ty-acc'
);
$this->settings['menu_font'] = array(
    'title'   => __( 'Font Family', 'octa' ),
    'std'     => 'Open Sans',
    'type'    => 'select',
    'class'   => 'chosen-select',
    'section' => 'it_typography',
    'choices' => them_googleFonts()
);
$this->settings['menu_font_size'] = array(
    'title'   => __( 'Font Size', 'octa' ),
    'desc'    => __( 'Enter Font size in px. Ex: 14px', 'octa' ),
    'std'     => '13px',
    'type'    => 'text',
    'section' => 'it_typography'
);
$this->settings['menu_font_weight'] = array(
    'title'   => __( 'Font Weight', 'octa' ),
    'std'     => '700',
    'type'    => 'select',
    'section' => 'it_typography',
    'choices' => array(
        ''  => '-- Select --',
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
    )
);
$this->settings['menu_text_style'] = array(
    'title'   => __( 'Text Style', 'octa' ),
    'std'     => 'uppercase',
    'type'    => 'select',
    'section' => 'it_typography',
    'std'     => 'capitalize',
    'choices' => array(
        'none' => 'None',
        'capitalize' => 'Capitalize',
        'lowercase' => 'Lowercase',
        'uppercase' => 'Uppercase',
    )
);

$this->settings['headings_heading'] = array(
    'section' => 'it_typography',
    'desc'    => __( 'Headings', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'headings_ty-acc'
);
$this->settings['headings_font'] = array(
    'title'   => __( 'Font Family', 'octa' ),
    'std'     => 'Oswald',
    'type'    => 'select',
    'class'   => 'chosen-select',
    'section' => 'it_typography',
    'choices' => them_googleFonts()
);
$this->settings['headings_font_weight'] = array(
    'title'   => __( 'Font Weight', 'octa' ),
    'std'     => '600',
    'type'    => 'select',
    'section' => 'it_typography',
    'choices' => array(
        ''  => '-- Select --',
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
    )
);
$this->settings['headings_text_style'] = array(
    'title'   => __( 'Text Style', 'octa' ),
    'type'    => 'select',
    'section' => 'it_typography',
    'choices' => array(
        ''  => '-- Select --',
        'capitalize' => 'Capitalize',
        'none' => 'None',
        'lowercase' => 'Lowercase',
        'uppercase' => 'Uppercase',
    )
);
$this->settings['typo_heading'] = array(
    'section' => 'it_typography',
    'desc'    => __( 'Custom Fonts', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'typo_ty-acc'
);
$this->settings['custom_fonts'] = array(
    'title'   => __( 'Upload New Font', 'octa' ),
    'desc'    => __( 'The new font will appear in the Font Family selector (Just refresh the page after saving).', 'octa' ),
    'std'     => '0',
    'class'   => 'fontat',
    'type'    => 'addbox',
    'section' => 'it_typography',
);
$cfonts = isset($options['custom_fonts']) ? $options['custom_fonts'] : 1;
for( $i = 0 ; $i <= $cfonts ; $i++ ) {
    $this->settings['custom_font_name_'.$i] = array(
        'title'   => __( 'Font-Family Name', 'octa' ),
        'type'    => 'text',
        'class'   => 'indval',
        'parent'    => 'custom_fonts',
        'section' => 'it_typography'
    );
    $this->settings['custom_font_ttf_'.$i] = array(
        'title'   => __( 'Upload .ttf ', 'octa' ),
        'type'    => 'upload',
        'parent'    => 'custom_fonts',
        'section' => 'it_typography'
    );
    $this->settings['custom_font_eot_'.$i] = array(
        'title'   => __( 'Upload .eot ', 'octa' ),
        'type'    => 'upload',      
        'parent'    => 'custom_fonts',
        'section' => 'it_typography'
    );
    $this->settings['custom_font_svg_'.$i] = array(
        'title'   => __( 'Upload .svg ', 'octa' ),
        'type'    => 'upload',      
        'parent'    => 'custom_fonts',
        'section' => 'it_typography'
    );
    $this->settings['custom_font_woff_'.$i] = array(
        'title'   => __( 'Upload .woff ', 'octa' ),
        'type'    => 'upload',      
        'parent'    => 'custom_fonts',
        'section' => 'it_typography'
    );
    $this->settings['custom_font_css_'.$i] = array(
        'title'   => __( 'Extra css ', 'octa' ),
        'type'    => 'textarea',      
        'parent'    => 'custom_fonts',
        'section' => 'it_typography'
    );
}

/* Extras
===========================================*/
$this->settings['general-heading'] = array(
    'section' => 'it_extras',
    'desc'    => __( 'General Settings', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'general-acc'
);
if ( class_exists( 'OCTA_Core' ) ) {
    $this->settings['import_data'] = array(
        'title'   => __( 'Install Demo Data', 'octa' ),
        'desc'    => __( 'This will overwrite the existing data.', 'octa' ),
        'type'    => 'import_data',
        'section' => 'it_extras'
    );
}else{
    $this->settings['plugin_label'] = array(
        'title'   => __( 'Install Demo Data', 'octa' ),
        'desc'    => 'Please Install OCTA Shortcodes Plugin to import the demo data',
        'type'    => 'label', 
        'section' => 'it_extras'
    );
}
$this->settings['tags_limit'] = array(
    'title'   => __( 'Tags Limit', 'octa' ),
    'desc'    => __( 'Number of tags  displayed in widgets.', 'octa' ),
    'std'     => '10',
    'min'     => '0',
    'max'     => '50',
    'type'    => 'number',
    'section' => 'it_extras',
);
$this->settings['show_top'] = array(
    'title'   => __( 'Back To Top Button', 'octa' ),
    'desc'    => esc_html__('"ON" to show the back to top button at the bottom of the page when scrolling down.', 'octa'),
    'type'    => 'checkbox',
    'std'     => '1',
    'section' => 'it_extras',
);
$this->settings['img_placeholder'] = array(
    'section' => 'it_extras',
    'title'   => __( 'Image Placeholders', 'octa' ),
    'desc'    => __( '"ON" to show default image for posts that not having featured image.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => ''
);
$this->settings['404-heading'] = array(
    'section' => 'it_extras',
    'desc'    => __( '404 Error Page', 'octa' ),
    'type'    => 'heading',
    'data_id' => '404-styling-acc'
);
$this->settings['404_layout'] = array(
    'title'   => __( '404 Page Layout', 'octa' ),
    'desc'    => __( 'Custom layout for the 404 page.', 'octa' ),
    'std'     => '1',
    'type'    => 'select',
    'section' => 'it_extras',
    'class'   => 'select_boxes',
    'choices' => array(
        '1' => 'Simple Layout',
        '2' => 'Parallax Image',
        '3'  => 'HTML5 Video'
    )
);
$this->settings['404_menu'] = array(
    'title'   => __( 'Choose Menu', 'octa' ),
    'type'    => 'select',
    'section' => 'it_extras',
    'choices' => site_menu(),
);
$this->settings['404_bg'] = array(
    'section' => 'it_extras',
    'title'   => __( 'Background Image', 'octa' ),
    'desc'    => __( 'Select an image or insert a url.', 'octa' ),
    'type'    => 'file',
    'dependency' => array(
        'element' => '404_layout',
        'value' => '2'
    ),
);
$this->settings['404_poster'] = array(
    'section' => 'it_extras',
    'title'   => __( 'Upload Poster Image', 'octa' ),
    'desc'    => __( 'Select a poster image or insert a url.', 'octa' ),
    'type'    => 'file',
    'dependency' => array(
        'element' => '404_layout',
        'value' => '3'
    ),
);
$this->settings['404_video_mp4'] = array(
    'section' => 'it_extras',
    'title'   => __( 'Upload .mp4 Video', 'octa' ),
    'desc'    => __( 'upload a .mp4 video or type a url.', 'octa' ),
    'type'    => 'upload',
    'dependency' => array(
        'element' => '404_layout',
        'value' => '3'
    ),
); 
$this->settings['404_video_webm'] = array(
    'section' => 'it_extras',
    'title'   => __( 'Upload .webm Video', 'octa' ),
    'desc'    => __( 'upload .WEBM video or type a URL.', 'octa' ),
    'type'    => 'upload',
    'dependency' => array(
        'element' => '404_layout',
        'value' => '3'
    ),
);
$this->settings['404_video_ogv'] = array(
    'section' => 'it_extras',
    'title'   => __( 'Upload .ogv Video', 'octa' ),
    'desc'    => __( 'upload .OGV video or type a URL.', 'octa' ),
    'type'    => 'upload',
    'dependency' => array(
        'element' => '404_layout',
        'value' => '3'
    ),
);

/* CSS & JS Settings
==========================================*/
$this->settings['css-js-heading'] = array(
    'section' => 'it_extras',
    'desc'    => __( 'Custom CSS & JS', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'css-styling-acc'
);
$this->settings['custom_css'] = array(
    'section' => 'it_extras',
    'title'   => __( 'Custom CSS', 'octa' ),
    'desc'    => __( 'Insert here any custom css code.', 'octa' ),
    'type'    => 'textarea',
);
$this->settings['custom_js'] = array(
    'section' => 'it_extras',
    'title'   => __( 'Custom javascript', 'octa' ),
    'desc'    => __( 'Insert here Custom javascript code.', 'octa' ),
    'type'    => 'textarea',
);


/* Sliding Bar 
==========================================*/
$this->settings['sld-bar'] = array(
    'section' => 'it_slidingbar',
    'desc'    => __( 'Settings', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'sld-sets-acc',
);
$this->settings['show_sliding_bar'] = array(
    'section' => 'it_slidingbar',
    'title'   => __( 'Show Sliding Bar', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '0'
);
$this->settings['sbar_position'] = array(
    'section' => 'it_slidingbar',
    'title'   => __( 'Position', 'octa' ),
    'desc'    => __( 'Choose Sliding bar position.', 'octa' ),
    'type'    => 'select',
    'choices' => array(
        'top' => 'Top',
        'left' => 'Left',
        'right' => 'Right',
    ),
    'dependency' => array(
        'element' => 'show_sliding_bar',
        'not_empty' => true
    ),
);
$this->settings['sliding_bar_content_push'] = array(
    'section' => 'it_slidingbar',
    'title'   => __( 'Sliding Bar Content Push', 'octa' ),
    'desc'    => __( 'Enable or disable content push when sliding bar opens.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
    'dependency' => array(
        'element' => 'show_sliding_bar',
        'not_empty' => true
    )
);
$this->settings['sliding_bar_sidebar'] = array(
    'title'   => __( 'Select Side Bar', 'octa' ),
    'desc'    => __( 'Select the side bar for sliding bar content.', 'octa' ),
    'type'    => 'select',
    'section' => 'it_slidingbar',
    'choices' => $sbars,
    'dependency' => array(
        'element' => 'show_sliding_bar',
        'not_empty' => true
    )
);
$this->settings['number_of_sliding_bar_columns'] = array(
    'title'   => __( 'Number of Widgets Columns', 'octa' ),
    'desc'    => __( 'Choose the number of widgets columns in the sliding bar.', 'octa' ),
    'std'     => '1',
    'type'    => 'select',
    'section' => 'it_slidingbar',
    'class'   => 'select_boxes',
    'choices' => array(
        '12' => '1',
        '6' => '2',
        '4' => '3',
        '3' => '4'
    ),
    'dependency' => array(
        'element' => 'show_sliding_bar',
        'not_empty' => true
    )
);
$this->settings['sliding_bar_on_mobile'] = array(
    'section' => 'it_slidingbar',
    'title'   => __( 'Sliding Bar On Mobile', 'octa' ),
    'desc'    => __( 'Turn on to display the sliding bar on mobiles.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
    'dependency' => array(
        'element' => 'show_sliding_bar',
        'not_empty' => true
    )
);
$this->settings['sld-bar-styl'] = array(
    'section' => 'it_slidingbar',
    'desc'    => __( 'Styling', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'sld-styl-acc',
);
$this->settings['sliding_padding'] = array(
    'title'   => __( 'Content Padding', 'octa' ),
    'desc'    => __( 'Top and Bottom Sliding bar content padding in px.', 'octa' ),
    'std'     => '80|80',
    'firstInput' => '<i class="fa fa-long-arrow-up"></i>',
    'lastInput' => '<i class="fa fa-long-arrow-down"></i>',
    'type'    => 'twonumber',
    'section' => 'it_slidingbar',
);
$this->settings['sliding_bg_color'] = array(
    'title'   => __( 'Background Color', 'octa' ),
    'desc'    => __( 'Choose solid color for sliding bar background.', 'octa' ),
    'type'    => 'color',
    'defcolor'=> '#222',
    'std'=> '#222',
    'section' => 'it_slidingbar',
);
$this->settings['sliding_bg_img'] = array(
    'title'   => __( 'Background image', 'octa' ),
    'desc'    => __( 'upload image or insert a url.', 'octa' ),
    'type'    => 'file',
    'section' => 'it_slidingbar',
);
$this->settings['sliding_bg_position'] = array(
    'title'   => __( 'Background Position', 'octa' ),
    'type'    => 'select',
    'section' => 'it_slidingbar',
    'choices' => array(
        '0 0' => 'Left Top',
        '0 50%' => 'Left Middle',
        '0 100%' => 'Left Bottom',
        '50% 0' => 'Center Top',
        '50% 50%' => 'Center Middle',
        '50% 100%' => 'Center Right',
        '100% 0' => 'Right Top',
        '100% 50%' => 'Right Middle',
        '100% 100%' => 'Right Bottom',
    ),
    'std'   => '0 100%',
    'dependency' => array(
        'element' => 'sliding_bg_img',
        'not_empty' => true
    )
);
$this->settings['sliding_bg_repeat'] = array(
    'title'   => __( 'Background repeat', 'octa' ),
    'desc'    => __( 'How the background image repeats.', 'octa' ),
    'type'    => 'select',
    'section' => 'it_slidingbar',
    'class'   => 'select_boxes',
    'choices' => array(
        '' => 'repeat',
        'no-repeat' => 'no-repeat',
        'repeat-x' => 'repeat-x',
        'repeat-y' => 'repeat-y'
    ),
    'std'   => 'repeat-x',
    'dependency' => array(
        'element' => 'sliding_bg_img',
        'not_empty' => true
    )
);
$this->settings['sliding_bg_size'] = array(
    'section' => 'it_slidingbar',
    'title'   => __( 'Background Size', 'octa' ),
    'type'    => 'select',
    'class'   => 'select_boxes',
    'choices' => array(
        'cover' => 'Cover',
        'contain' => 'Contain',
        '100% 100%' => '100%',
    ),
    'dependency' => array(
        'element' => 'sliding_bg_img',
        'not_empty' => true
    )
);
$this->settings['sliding_bar_headings_color'] = array(
    'title'   => __( 'Headings Color', 'octa' ),
    'desc'    => __( 'Choose solid color for the sliding bar heading font.', 'octa' ),
    'type'    => 'color',
    'defcolor'=> '#fff',
    'std'=> '#fff',
    'section' => 'it_slidingbar',
); 
$this->settings['sliding_bar_heading_font_size'] = array(
    'title'   => __( 'Heading Font Size', 'octa' ),
    'desc'    => __( 'Choose font size for the sliding bar heading text in px.', 'octa' ),
    'std'     => '22',
    'type'    => 'number',
    'section' => 'it_slidingbar',
);
$this->settings['sliding_bar_font_color'] = array(
    'title'   => __( 'Content Font Color', 'octa' ),
    'desc'    => __( 'Choose solid color for the sliding bar font.', 'octa' ),
    'type'    => 'color',
    'defcolor'=> '#ccc',
    'std'=> '#ccc',
    'section' => 'it_slidingbar',
);
$this->settings['sliding_bar_content_font_size'] = array(
    'title'   => __( 'Content Font Size', 'octa' ),
    'desc'    => __( 'Choose font size for the sliding bar content text in px.', 'octa' ),
    'std'     => '13',
    'type'    => 'number',
    'section' => 'it_slidingbar',
);
$this->settings['sliding-bar-button'] = array(
    'section' => 'it_slidingbar',
    'desc'    => __( 'Button', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'sld-button-acc',
);
$this->settings['btn_position'] = array(
    'section' => 'it_slidingbar',
    'title'   => __( 'Button Position', 'octa' ),
    'desc'    => __( 'Choose button position.', 'octa' ),
    'type'    => 'select',
    'choices' => array(
        'in_header' => 'In Header',
        'inbar' => 'With Sliding Bar',                       
    ),
    'dependency' => array(
        'element' => 'show_sliding_bar',
        'not_empty' => true
    ),
);
$this->settings['sbar_btn_icon'] = array(
    'title'   => __( 'Button Icon', 'octa' ),
    'desc'    => __( 'Choose icon for sliding bar button.', 'octa' ),
    'type'    => 'icon',
    'section' => 'it_slidingbar',
    'std'     => 'fa fa-angle-down'
);
$this->settings['sbar_btn_tgl_icon'] = array(
    'title'   => __( 'Toggle Button Icon', 'octa' ),
    'desc'    => __( 'Choose toggle icon for sliding bar button.', 'octa' ),
    'type'    => 'icon',
    'section' => 'it_slidingbar',
    'std'     => 'fa fa-angle-up'
);
$this->settings['sbar_btn_icon_size'] = array(
    'title'   => __( 'Icon Font Size', 'octa' ),
    'desc'    => __( 'Choose font size for the sliding bar button icon in px.', 'octa' ),
    'type'    => 'number',
    'section' => 'it_slidingbar',
    'std'     => '14'
);
$this->settings['sbar_btn_shape'] = array(
    'section' => 'it_slidingbar',
    'title'   => __( 'Button Shape', 'octa' ),
    'desc'    => __( 'Choose button Shape.', 'octa' ),
    'type'    => 'select',
    'class'   => 'select_boxes',
    'choices' => array(
        ''            => 'Square',
        'circle'      => 'Circle',
        'rounded'     => 'Rounded',
        'triangle' => 'Triangle',
    ),
    'dependency' => array(
        'element' => 'show_sliding_bar',
        'not_empty' => true
    ),
);
$this->settings['sbar_btn_bg_color'] = array(
    'title'   => __( 'Button Background Color', 'octa' ),
    'desc'    => __( 'Choose solid background color for the button .', 'octa' ),
    'type'    => 'color',
    'defcolor'=> '#222',
    'std'=> '#222',
    'section' => 'it_slidingbar',
);
$this->settings['sbar_btn_color'] = array(
    'title'   => __( 'Button Font Color', 'octa' ),
    'desc'    => __( 'Controls the font color of the button .', 'octa' ),
    'type'    => 'color',
    'defcolor'=> '#fff',
    'std'=> '#fff',
    'section' => 'it_slidingbar',
);

$this->settings['sbar_btn_tgl_bg_color'] = array(
    'title'   => __( 'Toggle Icon BG Color', 'octa' ),
    'desc'    => __( 'Choose solid color for the sliding bar toggle icon background.', 'octa' ),
    'type'    => 'color',
    'defcolor'=> '#222',
    'std'=> '#222',
    'section' => 'it_slidingbar',
);
$this->settings['sbar_btn_tgl_color'] = array(
    'title'   => __( 'Toggle Icon Color', 'octa' ),
    'desc'    => __( 'Choose solid color for the sliding bar toggle icon.', 'octa' ),
    'type'    => 'color',
    'defcolor'=> '#fff',
    'std'=> '#fff',
    'section' => 'it_slidingbar',
);

/* Blog options.
============================================*/
$this->settings['blog_listing_heading'] = array(
    'section' => 'it_blogoptions',
    'desc'    => __( 'Blog listing', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'general_bl-acc'
);
$this->settings['blogstyle'] = array(
    'title'   => __( 'Blog Listing Style', 'octa' ),
    'desc'    => __( 'Select blog posts listing style.', 'octa' ),
    'std'     => 'lg-image',
    'type'    => 'select',
    'section' => 'it_blogoptions',
    'class'   => 'select_boxes',
    'choices' => array(
        'lg-image' => 'Large Image',
        'small-image' => 'Small Image',
        'timeline' => 'Timeline',
        'masonry' => 'Masonry',
        'grid' => 'Grid'
    )
);
$this->settings['masonry_cols'] = array(
    'title'   => __( 'Masonry Columns Per Row', 'octa' ),
    'desc'    => __( 'Blog masonry columns per row.', 'octa' ),
    'std'     => '6',
    'type'    => 'select',
    'section' => 'it_blogoptions',
    'class'   => 'select_boxes',
    'choices' => array(
        '6' => '2 Columns',
        '3' => '3 Columns',
        '4' => '4 Columns'
    ),
    'dependency' => array(
        'element' => 'blogstyle',
        'value' => 'masonry'
    ),
);
$this->settings['grid_cols'] = array(
    'title'   => __( 'Grid Columns Per Row', 'octa' ),
    'desc'    => __( 'Select blog grid columns per row.', 'octa' ),
    'std'     => '6',
    'type'    => 'select',
    'section' => 'it_blogoptions',
    'class'   => 'select_boxes',
    'choices' => array(
        '6' => '2 Columns',
        '3' => '3 Columns',
        '4' => '4 Columns'
    ),
    'dependency' => array(
        'element' => 'blogstyle',
        'value' => 'grid'
    ),
);
$this->settings['blog_image_size'] = array(
    'title'   => __( 'Featured Image Size', 'octa' ),
    'desc'    => __( 'Select Blog Featured Image Size.', 'octa' ),
    'std'     => 'blog-large-image',
    'type'    => 'select',
    'section' => 'it_blogoptions',
    'choices' => it_get_image_sizes()
);
$this->settings['it_excerpt'] = array(
    'title'   => __( 'Max. number of words.', 'octa' ),
    'desc'    => __( 'Select Max. number of words to be shown, (Enter -1 to disable this feature).', 'octa' ),
    'std'     => '50',
    'type'    => 'number',
    'min'     => '-1',
    'max'     => '200',
    'section' => 'it_blogoptions',
);
$this->settings['blog_sidebar'] = array(
    'title'   => __( 'Blog Sidebar', 'octa' ),
    'desc'    => __( 'Full width or with sidebar ?', 'octa' ),
    'std'     => 'right',
    'type'    => 'select',
    'class'   => 'select_boxes',
    'section' => 'it_blogoptions',
    'choices' => array(
        'right' => 'Right',
        'left' => 'Left',
        'nobar'  => 'None'
    )
);
$this->settings['blog_sidebar_style'] = array(
    'title'   => __( 'Blog Sidebar Style', 'octa' ),
    'desc'    => __( 'Select sidebar style', 'octa' ),
    'std'     => 'default',
    'type'    => 'select',
    'section' => 'it_blogoptions',
    'class'   => 'select_boxes',
    'choices' => array(
        'default' => 'Default',
        'blocks' => 'Blocks',
        'minimal'  => 'Minimal'
    ),
);
$this->settings['pager_type'] = array(
    'title'   => __( 'Pager Type', 'octa' ),
    'desc'    => __( 'Select your prefered pager style.', 'octa' ),
    'std'     => '1',
    'type'    => 'select',
    'section' => 'it_blogoptions',
    'class'   => 'select_boxes',
    'choices' => array(
        '1' => 'Numeric + Navigation',
        '2' => 'Older Newer',
        '3' => 'Load More Button'
    )
);
$this->settings['pager_style'] = array(
    'title'   => __( 'Pager Style', 'octa' ),
    'desc'    => __( 'style for only Numeric Pager.', 'octa' ),
    'std'     => 'style1',
    'type'    => 'select',
    'section' => 'it_blogoptions',
    'class'   => 'select_boxes',
    'choices' => array(
        'style1' => 'Style 1',
        'style2' => 'Style 2',
        'style3' => 'Style 3',
        'style4' => 'Style 4',
        'style5' => 'Style 5',
    ),
    'dependency' => array(
        'element' => 'pager_type',
        'value' => '1'
    ),
);
$this->settings['pager_position'] = array(
    'title'   => __( 'Pager Position', 'octa' ),
    'desc'    => __( 'position for only Numeric Pager.', 'octa' ),
    'std'     => 'centered',
    'type'    => 'select',
    'section' => 'it_blogoptions',
    'class'   => 'select_boxes',
    'choices' => array(
        'pull-left' => 'Left',
        'centered' => 'Center',
        'pull-right' => 'Right'
    ),
    'dependency' => array(
        'element' => 'pager_type',
        'value' => '1'
    ),
);
$this->settings['load_more_text'] = array(
    'title'   => __( 'Load More Text', 'octa' ),
    'desc'    => __( 'Enter Text that will be shown on the load more button.', 'octa' ),
    'std'     => 'Load More',
    'value'   => 'Load More',
    'type'    => 'text',
    'section' => 'it_blogoptions',
    'dependency' => array(
        'element' => 'pager_type',
        'value' => '3'
    ),
);
// Single post
$this->settings['blog_single_heading'] = array(
    'section' => 'it_blogoptions',
    'desc'    => __( 'Single post', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'single_bl-acc'
);
$this->settings['blog_single_sidebar'] = array(
    'title'   => __( 'Single Post Sidebar', 'octa' ),
    'desc'    => __( 'Full width or with sidebar ?', 'octa' ),
    'std'     => 'right',
    'type'    => 'select',
    'section' => 'it_blogoptions',
    'class'   => 'select_boxes',
    'choices' => array(
        'right' => 'Right',
        'left' => 'Left',
        'nobar'  => 'None'
    ),
);
$this->settings['blog_single_sidebar_style'] = array(
    'title'   => __( 'Sidebar Style', 'octa' ),
    'desc'    => __( 'Select sidebar style', 'octa' ),
    'std'     => 'default',
    'type'    => 'select',
    'class'   => 'select_boxes',
    'section' => 'it_blogoptions',
    'choices' => array(
        'default' => 'Default',
        'blocks' => 'Blocks',
        'minimal'  => 'Minimal'
    ),
);
$this->settings['singlepostimg_size'] = array(
    'title'   => __( 'Featured Image Size', 'octa' ),
    'desc'    => __( 'Blog Single Featured Image Size.', 'octa' ),
    'std'     => 'large',
    'type'    => 'select',
    'section' => 'it_blogoptions',
    'choices' => it_get_image_sizes()
);
$this->settings['singlepostimg_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Post Image', 'octa' ),
    'desc'    => __( 'Show / Hide Post image.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['single_title_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Title', 'octa' ),
    'desc'    => __( 'Show / Hide Post title.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['post_icon_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Post Icon', 'octa' ),
    'desc'    => __( 'Show / Hide Post Icon.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singledate_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Date', 'octa' ),
    'desc'    => __( 'Show / Hide Post Date.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singleauthor_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show By Author', 'octa' ),
    'desc'    => __( 'Show / Hide Author info.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singlecategory_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Category', 'octa' ),
    'desc'    => __( 'Show / Hide Post Category.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singlecontent_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Post Content', 'octa' ),
    'desc'    => __( 'Show / Hide Post content.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singletags_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Tags', 'octa' ),
    'desc'    => __( 'Show / Hide Post Tags.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singleprevnext_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Post navigation', 'octa' ),
    'desc'    => __( 'Show / Hide Previous/Next post navigation.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singleauthorbox_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Author Info Box', 'octa' ),
    'desc'    => __( 'Show / Hide Author info box.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singlecomment_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Comments', 'octa' ),
    'desc'    => __( 'Show / Hide Post Comments.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singlerelated_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Related Posts', 'octa' ),
    'desc'    => __( 'Show / Hide Related Posts.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['blog_socials_heading'] = array(
    'section' => 'it_blogoptions',
    'desc'    => __( 'Share post', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'share_bl-acc'
);
$this->settings['singlesocial_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Social Sharing options', 'octa' ),
    'desc'    => __( 'check this if you need to Show Social Sharing options.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => ''
);
$this->settings['fb_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Facebook', 'octa' ),
    'desc'    => __( 'Show / Hide facebook share button.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'dependency' => array(
        'element' => 'singlesocial_on',
        'value' => '1'
    ),
);
$this->settings['tw_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Twitter', 'octa' ),
    'desc'    => __( 'Show / Hide Twitter share button.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'dependency' => array(
        'element' => 'singlesocial_on',
        'value' => '1'
    ),
);
$this->settings['gplus_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Google Plus', 'octa' ),
    'desc'    => __( 'Show / Hide Google Plus share button.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'dependency' => array(
        'element' => 'singlesocial_on',
        'value' => '1'
    ),
);
$this->settings['ln_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show LinkedIn', 'octa' ),
    'desc'    => __( 'Show / Hide LinkedIn share button.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
    'dependency' => array(
        'element' => 'singlesocial_on',
        'value' => '1'
    ),
);
$this->settings['pin_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Pinterest', 'octa' ),
    'desc'    => __( 'Show / Hide pinterest share button.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
    'dependency' => array(
        'element' => 'singlesocial_on',
        'value' => '1'
    ),
);
$this->settings['xing_on'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Xing', 'octa' ),
    'desc'    => __( 'Show / Hide xing share button.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
    'dependency' => array(
        'element' => 'singlesocial_on',
        'value' => '1'
    ),
);

// Authors Page
$this->settings['author-heading'] = array(
    'section' => 'it_blogoptions',
    'desc'    => __( 'Authors Page', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'author-acc'
);
$this->settings['show_auth_info'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Author Info', 'octa' ),
    'desc'    => __( 'Show / Hide the author info.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1'
);
$this->settings['show_auth_posts'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Show Author Posts', 'octa' ),
    'desc'    => __( 'Show / Hide the author Posts.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1'
);
$this->settings['auth_posts_style'] = array(
    'title'   => __( 'Author Posts Listing Style', 'octa' ),
    'desc'    => __( 'Select Author Posts listing style.', 'octa' ),
    'std'     => 'large',
    'type'    => 'select',
    'section' => 'it_blogoptions',
    'class'   => 'select_boxes',
    'choices' => array(
        'lg-image' => 'Large Image',
        'small-image' => 'Small Image',
        'timeline' => 'Timeline',
        'masonry' => 'Masonry',
        'grid' => 'Grid'
    ),
    'dependency' => array(
        'element' => 'show_auth_posts',
        'not_empty' => true
    ),
);
$this->settings['auth_content_before'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Content Before', 'octa' ),
    'desc'    => __( 'Add Text or HTML at the top of auther page.', 'octa' ),
    'multilang' => true,
    'type'    => 'editor',
    'dependency' => array(
        'element' => 'show_auth_posts',
        'not_empty' => true
    ),
);
$this->settings['auth_content_after'] = array(
    'section' => 'it_blogoptions',
    'title'   => __( 'Content After', 'octa' ),
    'desc'    => __( 'Add Text or HTML at the end of auther page.', 'octa' ),
    'multilang' => true,
    'type'    => 'editor',
    'dependency' => array(
        'element' => 'show_auth_posts',
        'not_empty' => true
    ),
);

/* SideBars.
============================================*/
$this->settings['sidebars-options'] = array(
    'section' => 'it_sidebars',
    'desc'    => 'Add Sidebar',
    'type'    => 'heading',
    'data_id' => 'sidebars-acc'
);
$this->settings['sidebars'] = array(
    'section' => 'it_sidebars',
    'title'   => __( 'sidebars', 'octa' ),
    'desc'    => __( 'Add unlimited sidebars the go to Widgets to add widgets for it.', 'octa' ),
    'class'   => 'bars',
    'type'    => 'addbox',
    'std'     => '0'
);

$cbars = isset($options['sidebars']) ? $options['sidebars'] : 0;        
for( $i = 0 ; $i <= $cbars ; $i++ ) {
    $this->settings['sidebar_'.$i] = array(
        'title'   => __( 'Sidebar Name ', 'octa' ),
        'std'     => 'Sidebar Name',
        'type'    => 'text',
        'parent'    => 'sidebars',
        'multilang' => true, 
        'class'     => 'indval',    
        'section' => 'it_sidebars'
    );
}
$this->settings['sidebars-heading'] = array(
    'section' => 'it_sidebars',
    'desc'    => __( 'Sidebars', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'sidebars-styling-acc'
);
$this->settings['page_sidebar'] = array(
    'title'   => __( 'Page Sidebar', 'octa' ),
    'desc'    => __( 'Full width or with sidebar ?', 'octa' ),
    'std'     => 'right',
    'type'    => 'select',  
    'section' => 'it_sidebars',
    'class'   => 'select_boxes',
    'choices' => array(
        'right' => 'Right',
        'left' => 'Left',
        'nobar'  => 'None'
    ),
);
$this->settings['page_sidebar_style'] = array(
    'title'   => __( 'Page Sidebar Style', 'octa' ),
    'desc'    => __( 'Select sidebar style', 'octa' ),
    'std'     => 'default',
    'type'    => 'select',
    'section' => 'it_sidebars',
    'class'   => 'select_boxes',
    'choices' => array(
        'default' => 'Default',
        'blocks' => 'Blocks',
        'minimal'  => 'Minimal'
    ),
);
$this->settings['archive_sidebar'] = array(
    'title'   => __( 'Archive Page Sidebar', 'octa' ),
    'desc'    => __( 'Full width or with sidebar ?', 'octa' ),
    'std'     => 'right',
    'type'    => 'select',
    'section' => 'it_sidebars',
    'class'   => 'select_boxes',
    'choices' => array(
        'right' => 'Right',
        'left' => 'Left',
        'nobar'  => 'None'
    ),
);
$this->settings['archive_sidebar_style'] = array(
    'title'   => __( 'Archive Sidebar Style', 'octa' ),
    'desc'    => __( 'Select sidebar style', 'octa' ),
    'std'     => 'default',
    'type'    => 'select',
    'section' => 'it_sidebars',
    'class'   => 'select_boxes',
    'choices' => array(
        'default' => 'Default',
        'blocks' => 'Blocks',
        'minimal'  => 'Minimal'
    ),
);
$this->settings['tags_sidebar'] = array(
    'title'   => __( 'Tags Page Sidebar', 'octa' ),
    'desc'    => __( 'Full width or with sidebar ?', 'octa' ),
    'std'     => 'right',
    'type'    => 'select',
    'section' => 'it_sidebars',
    'class'   => 'select_boxes',
    'choices' => array(
        'right' => 'Right',
        'left' => 'Left',
        'nobar'  => 'None'
    ),
);
$this->settings['tags_sidebar_style'] = array(
    'title'   => __( 'Tags Sidebar Style', 'octa' ),
    'desc'    => __( 'Select sidebar style', 'octa' ),
    'std'     => 'default',
    'type'    => 'select',
    'section' => 'it_sidebars',
    'class'   => 'select_boxes',
    'choices' => array(
        'default' => 'Default',
        'blocks' => 'Blocks',
        'minimal'  => 'Minimal'
    ),
);
$this->settings['search_sidebar'] = array(
    'title'   => __( 'Search Sidebar', 'octa' ),
    'desc'    => __( 'Full width or with sidebar ?', 'octa' ),
    'std'     => 'right',
    'type'    => 'select',
    'section' => 'it_sidebars',
    'class'   => 'select_boxes',
    'choices' => array(
        'right' => 'Right',
        'left' => 'Left',
        'nobar'  => 'None'
    ),
);
$this->settings['search_sidebar_style'] = array(
    'title'   => __( 'Search Sidebar Style', 'octa' ),
    'desc'    => __( 'Select sidebar style', 'octa' ),
    'std'     => 'default',
    'type'    => 'select',
    'section' => 'it_sidebars',
    'class'   => 'select_boxes',
    'choices' => array(
        'default' => 'Default',
        'blocks' => 'Blocks',
        'minimal'  => 'Minimal'
    ),
);
$this->settings['author_sidebar'] = array(
    'title'   => __( 'Author Page Sidebar', 'octa' ),
    'desc'    => __( 'Full width or with sidebar ?', 'octa' ),
    'std'     => 'right',
    'type'    => 'select',
    'section' => 'it_sidebars',
    'class'   => 'select_boxes',
    'choices' => array(
        'right' => 'Right',
        'left' => 'Left',
        'nobar'  => 'None'
    ),
);
$this->settings['author_sidebar_style'] = array(
    'title'   => __( 'Author Sidebar Style', 'octa' ),
    'desc'    => __( 'Select sidebar style', 'octa' ),
    'std'     => 'default',
    'type'    => 'select',
    'section' => 'it_sidebars',
    'class'   => 'select_boxes',
    'class'   => 'select_boxes',
    'choices' => array(
        'default' => 'Default',
        'blocks' => 'Blocks',
        'minimal'  => 'Minimal'
    ),
);

/* Social icons.
============================================*/     
$this->settings['socials-heading'] = array(
    'section' => 'it_socialicons',
    'desc'    => __( 'Add Social Icons', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'socials-acc'
);
$this->settings['social_icons'] = array(
    'section' => 'it_socialicons',
    'title'   => __( 'Social Icon', 'octa' ),
    'desc'    => __( 'Add unlimited social icons.', 'octa' ),
    'type'    => 'addbox',
    'class'   => 'socials',
    'std'     => '0'
);
$csocials = isset($options['social_icons']) ? $options['social_icons'] : 0;
for( $i = 0 ; $i <= $csocials ; $i++ ) {
    $this->settings['social_icon_'.$i] = array(
        'title'   => __( 'Icon', 'octa' ),
        'type'    => 'icon',
        'multilang' => true, 
        'parent'    => 'social_icons',
        'section' => 'it_socialicons'
    );
    $this->settings['social_icon_title_'.$i] = array(
        'title'   => __( 'Title ', 'octa' ),
        'class'   => 'indval',
        'type'    => 'text',
        'multilang' => true,     
        'parent'    => 'social_icons',
        'section' => 'it_socialicons'
    );
    $this->settings['social_icon_link_'.$i] = array(
        'title'   => __( 'Link ', 'octa' ),
        'type'    => 'text',
        'parent'    => 'social_icons',
        'section' => 'it_socialicons'
    );
}
$this->settings['socs-set-heading'] = array(
    'section' => 'it_socialicons',
    'desc'    => __( 'Styling', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'soc-sets-acc'
);
$this->settings['socials_colored'] = array(
    'section' => 'it_socialicons',
    'title'   => __( 'Colored', 'octa' ),
    'desc'    => __( '"ON" to add colors to the popular social icons.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1'
);
$this->settings['socials_nofollow'] = array(
    'section' => 'it_socialicons',
    'title'   => __( 'Add "nofollow"', 'octa' ),
    'desc'    => __( '"ON" to add "nofollow" attribute to all social links.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => ''
);
$this->settings['socials_new_window'] = array(
    'section' => 'it_socialicons',
    'title'   => __( 'Open in a New Window', 'octa' ),
    'desc'    => __( '"ON" to allow social icons to open in a new window.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1'
);

/* Project Page.
============================================*/
$this->settings['project_archive_heading'] = array(
    'section' => 'it_portfolio',
    'desc'    => __( 'Archive settings', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'single-arc-acc'
);
$this->settings['portfolio_sidebar'] = array(
    'title'   => __( 'Sidebar', 'octa' ),
    'desc'    => __( 'Full width or with sidebar ?', 'octa' ),
    'std'     => 'right',
    'type'    => 'select',
    'section' => 'it_portfolio',
    'class'   => 'select_boxes',
    'choices' => array(
        'right' => 'Right',
        'left' => 'Left',
        'nobar'  => 'None'
    )
);
$this->settings['single-pro-heading'] = array(
    'section' => 'it_portfolio',
    'desc'    => __( 'Single Project', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'single-pro-acc'
);
$this->settings['singleproject_layout'] = array(
    'title'   => __( 'Project Details Layout', 'octa' ),
    'desc'    => __( 'Single project details page layout.', 'octa' ),
    'std'     => '1',
    'type'    => 'select',
    'section' => 'it_portfolio',
    'class'   => 'select_boxes',
    'choices' => array(
        '1' => 'Style 1',
        '2' => 'Style 2',
        '3' => 'Style 3',
    ),
);
$this->settings['singleprojectimg_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show Project Image', 'octa' ),
    'desc'    => __( 'Show / Hide Project image.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singleprojectdate_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show Date', 'octa' ),
    'desc'    => __( 'Show / Hide Project Date.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singleprojectauthor_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show By Author', 'octa' ),
    'desc'    => __( 'Show / Hide Project Author info.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singleprojectcategory_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show Category', 'octa' ),
    'desc'    => __( 'Show / Hide Project category.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singleprojectcontent_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show Project Content', 'octa' ),
    'desc'    => __( 'Show / Hide Project content.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singleprojecttags_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show Tags', 'octa' ),
    'desc'    => __( 'Show / Hide Project Tags.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['singleprojectrelated_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show Related Projects', 'octa' ),
    'desc'    => __( 'Show / Hide Related Projects.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
);
$this->settings['project_socials_heading'] = array(
    'section' => 'it_portfolio',
    'desc'    => __( 'Share Project', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'single_pro-acc'
);
$this->settings['singleprojectsocial_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show Social Sharing options', 'octa' ),
    'desc'    => __( 'Show / Hide Social Sharing options.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
);
$this->settings['projectfb_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show Facebook', 'octa' ),
    'desc'    => __( 'Show / Hide facebook share button.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'dependency' => array(
        'element' => 'singleprojectsocial_on',
        'value' => '1'
    ),
);
$this->settings['projecttw_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show Twitter', 'octa' ),
    'desc'    => __( 'Show / Hide Twitter share button.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'dependency' => array(
        'element' => 'singleprojectsocial_on',
        'value' => '1'
    ),
);
$this->settings['projectgplus_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show Google Plus', 'octa' ),
    'desc'    => __( 'Show / Hide Google Plus share button.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'dependency' => array(
        'element' => 'singleprojectsocial_on',
        'value' => '1'
    ),
);
$this->settings['projectln_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show LinkedIn', 'octa' ),
    'desc'    => __( 'Show / Hide LinkedIn share button.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
    'dependency' => array(
        'element' => 'singleprojectsocial_on',
        'value' => '1'
    ),
);
$this->settings['projectpin_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show Pinterest', 'octa' ),
    'desc'    => __( 'Show / Hide pinterest share button.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
    'dependency' => array(
        'element' => 'singleprojectsocial_on',
        'value' => '1'
    ),
);
$this->settings['projectxing_on'] = array(
    'section' => 'it_portfolio',
    'title'   => __( 'Show Xing', 'octa' ),
    'desc'    => __( 'Show / Hide xing share button.', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
    'dependency' => array(
        'element' => 'singleprojectsocial_on',
        'value' => '1'
    ),
);

/* woocommerce
===========================================*/
if(class_exists('Woocommerce')) {
    $this->settings['shop_heading'] = array(
        'section' => 'it_woocommerce',
        'desc'    => __( 'Products Listing', 'octa' ),
        'type'    => 'heading',
        'data_id' => 'shop-acc'
    );
    $this->settings['show_sidebar_woo'] = array(
        'section' => 'it_woocommerce',
        'title'   => __( 'Show Side Bar', 'octa' ),
        'type'    => 'checkbox',
        'std'     => '1',
        'desc'    => __( 'Show / Hide sidebar in shop page.', 'octa' )
    );
    
    $this->settings['sidebar_woo'] = array(
        'title'   => __( 'Select Side Bar', 'octa' ),
        'desc'    => __( 'Select the side bar for shop pages.', 'octa' ),
        'type'    => 'select',
        'section' => 'it_woocommerce',
        'choices' => $sbars,
        'dependency' => array(
            'element' => 'show_sidebar_woo',
            'not_empty' => true
        ),
    );
    $this->settings['woo_sidebar_style'] = array(
        'title'   => __( 'Sidebar Style', 'octa' ),
        'desc'    => __( 'Select sidebar style', 'octa' ),
        'std'     => 'default',
        'type'    => 'select',
        'section' => 'it_woocommerce',
        'class'   => 'select_boxes',
        'choices' => array(
            'default' => 'Default',
            'blocks' => 'Blocks',
            'minimal'  => 'Minimal'
        ),
        'dependency' => array(
            'element' => 'show_sidebar_woo',
            'not_empty' => true
        ),
    );
    $this->settings['sidebar_position_woo'] = array(
        'title'   => __( 'Sidebar Position', 'octa' ),
        'desc'    => __( 'Select the position of the sidebar.', 'octa' ),
        'std'     => 'right',
        'type'    => 'select',
        'section' => 'it_woocommerce',
        'class'   => 'select_boxes',
        'choices' => array(
            'right' => 'Right',
            'left' => 'Left'
        ),
        'dependency' => array(
            'element' => 'show_sidebar_woo',
            'not_empty' => true
        ),
    );
    $this->settings['columns_woo'] = array(
        'title'   => __( 'Products Columns', 'octa' ),
        'desc'    => __( 'Number of columns per row.', 'octa' ),
        'std'     => '4',
        'type'    => 'select',
        'section' => 'it_woocommerce',
        'class'   => 'select_boxes',
        'choices' => array(
            '6' => '2 Columns',
            '4' => '3 Columns',
            '3' => '4 Columns'
        )
    );
    
    $this->settings['product_single_heading'] = array(
        'section' => 'it_woocommerce',
        'desc'    => __( 'Single Product', 'octa' ),
        'type'    => 'heading',
        'data_id' => 'shop-single-acc'
    );
    
    $this->settings['show_sidebar_single_woo'] = array(
        'section' => 'it_woocommerce',
        'title'   => __( 'Show Side Bar ?', 'octa' ),
        'type'    => 'checkbox',
        'desc'    => __( 'Show / Hide sidebar in single product page.', 'octa' )
    );
    $this->settings['woo_sidebar_single_style'] = array(
        'title'   => __( 'Sidebar Style', 'octa' ),
        'desc'    => __( 'Select sidebar style', 'octa' ),
        'std'     => 'default',
        'type'    => 'select',
        'section' => 'it_woocommerce',
        'class'   => 'select_boxes',
        'choices' => array(
            'default' => 'Default',
            'blocks' => 'Blocks',
            'minimal'  => 'Minimal'
        ),
        'dependency' => array(
            'element' => 'show_sidebar_single_woo',
            'not_empty' => true
        ),
    );
    $this->settings['single_sidebar_position_woo'] = array(
        'title'   => __( 'Sidebar Position', 'octa' ),
        'desc'    => __( 'Select the position of the sidebar.', 'octa' ),
        'std'     => 'right',
        'type'    => 'select',
        'section' => 'it_woocommerce',
        'class'   => 'select_boxes',
        'choices' => array(
            'right' => 'Right',
            'left' => 'Left'
        ),
        'dependency' => array(
            'element' => 'show_sidebar_single_woo',
            'not_empty' => true
        ),
    );
    
    $this->settings['related_heading'] = array(
        'section' => 'it_woocommerce',
        'desc'    => __( 'Related Products', 'octa' ),
        'type'    => 'heading',
        'data_id' => 'shop-related-acc'
    );
    $this->settings['show_related_woo'] = array(
        'section' => 'it_woocommerce',
        'title'   => __( 'Show Related Products ?', 'octa' ),
        'type'    => 'checkbox',
        'std'     => '1',
        'desc'    => __( 'Show / Hide Related Products in single product page.', 'octa' )
    );
    $this->settings['related_per_page'] = array(
        'title'   => __( 'Related Products Per Page', 'octa' ),
        'desc'    => __( 'Related Products Per Page', 'octa' ),
        'std'     => '4',
        'type'    => 'number',
        'min'     => '1',
        'max'     => '50',
        'section' => 'it_woocommerce',
        'dependency' => array(
            'element' => 'show_related_woo',
            'not_empty' => true
        ),
    );
    $this->settings['related_columns_woo'] = array(
        'title'   => __( 'Related Products Columns', 'octa' ),
        'desc'    => __( 'Select the number of columns per row.', 'octa' ),
        'std'     => '4',
        'type'    => 'select',
        'section' => 'it_woocommerce',
        'class'   => 'select_boxes',
        'choices' => array(
            '6' => '2 Columns',
            '4' => '3 Columns',
            '3' => '4 Columns'
        ),
        'dependency' => array(
            'element' => 'show_related_woo',
            'not_empty' => true
        ),
    );
}

/* bbpress
===========================================*/
if(class_exists('bbPress')) {
    $this->settings['show_sidebar_bb'] = array(
        'section' => 'it_bbpress',
        'title'   => __( 'Show Side Bar', 'octa' ),
        'type'    => 'checkbox',
        'std'     => '1',
        'desc'    => __( 'Show / Hide sidebar in forums page.', 'octa' )
    );
    $this->settings['sidebar_bb'] = array(
        'title'   => __( 'Select Side Bar', 'octa' ),
        'desc'    => __( 'Select the side bar for bbpress pages.', 'octa' ),
        'type'    => 'select',
        'section' => 'it_bbpress',  
        'choices' => $sbars,
        'dependency' => array(
            'element' => 'show_sidebar_bb',
            'not_empty' => true
        ),
    );
    $this->settings['bb_sidebar_style'] = array(
        'title'   => __( 'Sidebar Style', 'octa' ),
        'desc'    => __( 'Select sidebar style', 'octa' ),
        'std'     => 'default',
        'type'    => 'select',
        'section' => 'it_bbpress',
        'class'   => 'select_boxes',
        'choices' => array(
            'default' => 'Default',
            'blocks' => 'Blocks',
            'minimal'  => 'Minimal'
        ),
        'dependency' => array(
            'element' => 'show_sidebar_bb',
            'not_empty' => true
        ),
    );
    $this->settings['sidebar_position_bb'] = array(
        'title'   => __( 'Sidebar Position', 'octa' ),
        'desc'    => __( 'Select the position of the sidebar.', 'octa' ),
        'std'     => 'right',
        'type'    => 'select',
        'section' => 'it_bbpress',
        'class'   => 'select_boxes',
        'choices' => array(
            'right' => 'Right',
            'left' => 'Left'
        ),
        'dependency' => array(
            'element' => 'show_sidebar_bb',
            'not_empty' => true
        ),
    );
    $this->settings['show_welcome_bb'] = array(
        'section' => 'it_bbpress',
        'title'   => __( 'Show Welcome message', 'octa' ),
        'type'    => 'checkbox',
        'std'     => '1',
        'desc'    => __( 'Show / Hide welcome message.', 'octa' )
    );
    $this->settings['welcome_bb'] = array(
        'section' => 'it_bbpress',
        'title'   => __( 'Welcome Message', 'octa' ),
        'desc'    => __( 'Insert here the welcome message that will appear in the top of the forums.', 'octa' ),
        'multilang' => true,
        'type'    => 'editor',
        'std'     => 'Welcome to our Forums! We love to have you part of our friendly community, discovering the best in everything. As a member, the system will remember where you left off in threads and with sufficient post count.',
        'dependency' => array(
            'element' => 'show_welcome_bb',
            'not_empty' => true
        ),
    );
}

/* buddypress
===========================================*/
if( class_exists("buddyPress")) {
    $this->settings['show_sidebar_bp'] = array(
        'section' => 'it_buddypress',
        'title'   => __( 'Show Side Bar', 'octa' ),
        'type'    => 'checkbox',
        'std'     => '1',
        'desc'    => __( 'Show / Hide sidebar in buddypress page.', 'octa' )
    );
    $this->settings['sidebar_bp'] = array(
        'title'   => __( 'Select Side Bar', 'octa' ),
        'desc'    => __( 'Select the side bar for buddypress pages.', 'octa' ),
        'type'    => 'select',
        'section' => 'it_buddypress',
        'choices' => $sbars,
        'dependency' => array(
            'element' => 'show_sidebar_bp',
            'not_empty' => true
        ),
    );
    $this->settings['bp_sidebar_style'] = array(
        'title'   => __( 'Sidebar Style', 'octa' ),
        'desc'    => __( 'Select sidebar style', 'octa' ),
        'std'     => 'default',
        'type'    => 'select',
        'section' => 'it_buddypress',
        'class'   => 'select_boxes',
        'choices' => array(
            'default' => 'Default',
            'blocks' => 'Blocks',
            'minimal'  => 'Minimal'
        ),
        'dependency' => array(
            'element' => 'show_sidebar_bp',
            'not_empty' => true
        ),
    );
    $this->settings['sidebar_position_bp'] = array(
        'title'   => __( 'Sidebar Position', 'octa' ),
        'desc'    => __( 'Select the position of the sidebar.', 'octa' ),
        'std'     => 'right',
        'type'    => 'select',
        'section' => 'it_buddypress',
        'class'   => 'select_boxes',
        'choices' => array(
            'right' => 'Right',
            'left' => 'Left'
        ),
        'dependency' => array(
            'element' => 'show_sidebar_bp',
            'not_empty' => true
        ),
    );
}

/* Downloads
===========================================*/
if( class_exists("Easy_Digital_Downloads")) {
    $this->settings['show_sidebar_edd'] = array(
        'section' => 'it_downloads',
        'title'   => __( 'Show Side Bar', 'octa' ),
        'type'    => 'checkbox',
        'std'     => '1',
        'desc'    => __( 'Show / Hide sidebar in downloads page.', 'octa' )
    );
    $this->settings['sidebar_edd'] = array(
        'title'   => __( 'Select Side Bar', 'octa' ),
        'desc'    => __( 'Select the side bar for downloads pages.', 'octa' ),
        'type'    => 'select',
        'section' => 'it_downloads',
        'choices' => $sbars,
        'dependency' => array(
            'element' => 'show_sidebar_edd',
            'not_empty' => true
        ),
    );
    $this->settings['edd_sidebar_style'] = array(
        'title'   => __( 'Sidebar Style', 'octa' ),
        'desc'    => __( 'Select sidebar style', 'octa' ),
        'std'     => 'default',
        'type'    => 'select',
        'section' => 'it_downloads',
        'class'   => 'select_boxes',
        'choices' => array(
            'default' => 'Default',
            'blocks' => 'Blocks',
            'minimal'  => 'Minimal'
        ),
        'dependency' => array(
            'element' => 'show_sidebar_edd',
            'not_empty' => true
        ),
    );
    $this->settings['sidebar_position_edd'] = array(
        'title'   => __( 'Sidebar Position', 'octa' ),
        'desc'    => __( 'Select the position of the sidebar.', 'octa' ),
        'std'     => 'right',
        'type'    => 'select',
        'section' => 'it_downloads',
        'class'   => 'select_boxes',
        'choices' => array(
            'right' => 'Right',
            'left' => 'Left'
        ),
        'dependency' => array(
            'element' => 'show_sidebar_edd',
            'not_empty' => true
        ),
    );
    $this->settings['columns_edd'] = array(
        'title'   => __( 'Downloads Columns', 'octa' ),
        'desc'    => __( 'Select number of columns per row.', 'octa' ),
        'std'     => '4',
        'type'    => 'select',
        'section' => 'it_downloads',
        'class'   => 'select_boxes',
        'choices' => array(
            '6' => '2 Columns',
            '4' => '3 Columns',
            '3' => '4 Columns'
        )
    );
    $this->settings['pages_edd'] = array(
        'title'   => __( 'Downloads Per Page', 'octa' ),
        'desc'    => __( 'Select number of downloads per Page.', 'octa' ),
        'std'     => '10',
        'type'    => 'text',
        'section' => 'it_downloads',
    );
}
        
/* Contact Details
===========================================*/
$this->settings['contact_address_title'] = array(
    'title'   => __( 'Address Title', 'octa' ),
    'desc'    => __( 'Headquarters:', 'octa' ),
    'type'    => 'text',
    'multilang' => true,
    'section' => 'it_contact',
);
$this->settings['contact_address'] = array(
    'title'   => __( 'Address', 'octa' ),
    'desc'    => __( 'Your contact Address.', 'octa' ),
    'std'     => '123 Street Name, City, Country',
    'type'    => 'text',
    'multilang' => true,
    'section' => 'it_contact',
);
$this->settings['contact_email_title'] = array(
    'title'   => __( 'Email Title', 'octa' ),
    'desc'    => __( 'Email:', 'octa' ),
    'type'    => 'text',
    'multilang' => true,
    'section' => 'it_contact',
);
$this->settings['contact_email'] = array(
    'title'   => __( 'Email Address', 'octa' ),
    'desc'    => __( 'Your contact email address.', 'octa' ),
    'std'     => 'mail@domain.com',
    'type'    => 'text',
    'section' => 'it_contact',
);
$this->settings['contact_phone_title'] = array(
    'title'   => __( 'Phone Title', 'octa' ),
    'desc'    => __( 'Phone:', 'octa' ),
    'type'    => 'text',
    'multilang' => true,
    'section' => 'it_contact',
);
$this->settings['contact_phone'] = array(
    'title'   => __( 'Phone Number', 'octa' ),
    'desc'    => __( 'Your contact phone number.', 'octa' ),
    'std'     => '+1(888)000-0000',
    'type'    => 'text',
    'section' => 'it_contact',
);
$this->settings['contact_fax_title'] = array(
    'title'   => __( 'Fax Title', 'octa' ),
    'desc'    => __( 'Fax:', 'octa' ),
    'type'    => 'text',
    'multilang' => true,
    'section' => 'it_contact',
);
$this->settings['contact_fax'] = array(
    'title'   => __( 'Fax Number', 'octa' ),
    'desc'    => __( 'Your contact Fax number.', 'octa' ),
    'type'    => 'text',
    'section' => 'it_contact',
);        
/* Coming Soon
===========================================*/
$this->settings['soon-settings'] = array(
    'section' => 'it_soon',
    'desc'    => __( 'Coming Soon', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'soon-acc'
);
$this->settings['enable_coming_soon'] = array(
    'section' => 'it_soon',
    'title'   => __( 'Enable Coming Soon Mode', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
    'desc'    => __( 'Close site for visitors & Display coming soon message.', 'octa' )
);
$this->settings['soon_large_heading'] = array(
    'title'   => __( 'Large Heading ', 'octa' ),
    'desc'    => __( 'large heading at the top of the page.', 'octa' ),
    'std'     => 'COMING SOON',
    'type'    => 'text',
    'multilang' => true,
    'section' => 'it_soon',
);
$this->settings['soon_lg_head_color'] = array(
    'title'   => __( 'Large Heading color', 'octa' ),
    'desc'    => __( 'Choose solid color for Large Heading', 'octa' ),
    'type'    => 'color',
    'section' => 'it_soon',
    'defcolor' => '#ffffff',
    'std' => '#ffffff'
);
$this->settings['soon_large_heading2'] = array(
    'title'   => __( 'Large Heading 2', 'octa' ),
    'desc'    => __( 'large heading 2 at the top of the page .', 'octa' ),
    'std'     => 'THIS SITE IS UNDER CONSTRUCTION',
    'type'    => 'text',
    'multilang' => true,
    'section' => 'it_soon',
);
$this->settings['soon_lg_head2_color'] = array(
    'title'   => __( 'Large Heading 2 color', 'octa' ),
    'desc'    => __( 'Choose solid color for Large Heading 2', 'octa' ),
    'type'    => 'color',
    'section' => 'it_soon',
    'defcolor' => '#ffffff',
    'std' => '#ffffff'
);
$this->settings['soon_decription'] = array(
    'section' => 'it_soon',
    'title'   => __( 'Description', 'octa' ),
    'desc'    => __( 'Insert here the description text.', 'octa' ),
    'multilang' => true,
    'type'    => 'editor',
);
$this->settings['soon_desc_color'] = array(
    'title'   => __( 'Description color', 'octa' ),
    'desc'    => __( 'Choose solid color for description', 'octa' ),
    'type'    => 'color',
    'section' => 'it_soon',
    'defcolor' => '#ffffff',
    'std' => '#ffffff'
);
$this->settings['show_count_down'] = array(
    'section' => 'it_soon',
    'title'   => __( 'Show Counter', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'desc'    => __( 'Show / Hide count-down timer.', 'octa' )
);
$this->settings['soon_date'] = array(
    'title'   => __( 'Date', 'octa' ),
    'desc'    => __( 'enter date with format: year/month/day. Ex: 2020/10/20', 'octa' ),
    'std'     => '2017/1/1',
    'type'    => 'text',
    'class'   => 'date-soon',
    'section' => 'it_soon',
    'dependency' => array(
        'element' => 'show_count_down',
        'not_empty' => true
    ),
);
$this->settings['digits_bg'] = array(
    'section' => 'it_soon',
    'title'   => __( 'Digits Background Image', 'octa' ),
    'desc'    => __( 'Select an image or insert a url.', 'octa' ),
    'type'    => 'file',
    'dependency' => array(
        'element' => 'show_count_down',
        'not_empty' => true
    ),
);
$this->settings['digits_color'] = array(
    'section' => 'it_soon',
    'title'   => __( 'Digits color', 'octa' ),
    'desc'    => __( 'Choose solid color for digits.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_soon',
    'defcolor' => '#ffffff',
    'dependency' => array(
        'element' => 'show_count_down',
        'not_empty' => true
    ),
);
$this->settings['soon_count_color'] = array(
    'title'   => __( 'Digits Bottom text color', 'octa' ),
    'desc'    => __( 'Choose solid color for digits bottom text', 'octa' ),
    'type'    => 'color',
    'section' => 'it_soon',
    'defcolor' => '#ffffff',
    'dependency' => array(
        'element' => 'show_count_down',
        'not_empty' => true
    ),
);
$this->settings['show_newsletters'] = array(
    'section' => 'it_soon',
    'title'   => __( 'Show NewsLetterf Form', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'desc'    => __( 'Show / Hide NewsLetterf Form.', 'octa' ),
);
$this->settings['nl_shortcode'] = array(
    'title'   => __( 'NewsLetter Form Shortcode ', 'octa' ),
    'desc'    => __( 'Add the newsletters form shortcode.', 'octa' ),
    'type'    => 'text',
    'section' => 'it_soon',
    'dependency' => array(
        'element' => 'show_newsletters',
        'not_empty' => true
    ),
);
$this->settings['soon-socials-styling'] = array(
    'section' => 'it_soon',
    'desc'    => __( 'Social Icons', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'soon-soc-acc'
);
$this->settings['show_social_links'] = array(
    'section' => 'it_soon',
    'title'   => __( 'Show Social Links', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'desc'    => __( 'Show / Hide the social links.', 'octa' )
);
$this->settings['soon_facebook'] = array(
    'title'   => __( 'Facebook', 'octa' ),
    'desc'    => __( 'Facebook link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'show_social_links',
    'section' => 'it_soon',
    'dependency' => array(
        'element' => 'show_social_links',
        'not_empty' => true
    ),
);
$this->settings['soon_twitter'] = array(
    'title'   => __( 'Twitter', 'octa' ),
    'desc'    => __( 'Twitter link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'show_social_links',
    'section' => 'it_soon',
    'dependency' => array(
        'element' => 'show_social_links',
        'not_empty' => true
    ),
);
$this->settings['soon_linkedin'] = array(
    'title'   => __( 'LinkedIn', 'octa' ),
    'desc'    => __( 'LinkedIn link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'show_social_links',
    'section' => 'it_soon',
    'dependency' => array(
        'element' => 'show_social_links',
        'not_empty' => true
    ),
);
$this->settings['soon_google-plus'] = array(
    'title'   => __( 'Google+', 'octa' ),
    'desc'    => __( 'Google+ link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'show_social_links',
    'section' => 'it_soon',
    'dependency' => array(
        'element' => 'show_social_links',
        'not_empty' => true
    ),
);
$this->settings['soon_skype'] = array(
    'title'   => __( 'Skype', 'octa' ),
    'desc'    => __( 'Skype link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'show_social_links',
    'section' => 'it_soon',
    'dependency' => array(
        'element' => 'show_social_links',
        'not_empty' => true
    ),
);
$this->settings['soon_rss'] = array(
    'title'   => __( 'RSS', 'octa' ),
    'desc'    => __( 'RSS link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'show_social_links',
    'section' => 'it_soon',
    'dependency' => array(
        'element' => 'show_social_links',
        'not_empty' => true
    ),
);
$this->settings['soon_youtube'] = array(
    'title'   => __( 'Youtube', 'octa' ),
    'desc'    => __( 'Youtube link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'show_social_links',
    'section' => 'it_soon',
    'dependency' => array(
        'element' => 'show_social_links',
        'not_empty' => true
    ),
);
$this->settings['soon_socials_bgcolor'] = array(
    'title'   => __( 'Social icons Background color', 'octa' ),
    'desc'    => __( 'Choose solid color for background', 'octa' ),
    'type'    => 'color',
    'section' => 'it_soon',
);
$this->settings['soon_socials_color'] = array(
    'title'   => __( 'Social icons color', 'octa' ),
    'desc'    => __( 'Choose solid color social icons text.', 'octa' ),
    'type'    => 'color',
    'section' => 'it_soon',
    'defcolor' => '#ffffff',
);
$this->settings['soon_socials_border'] = array(
    'title'   => __( 'Social icons Border color', 'octa' ),
    'desc'    => __( 'Choose solid color for border', 'octa' ),
    'type'    => 'color',
    'section' => 'it_soon',
    'defcolor' => '#fff',
);
$this->settings['soon-styling'] = array(
    'section' => 'it_soon',
    'desc'    => __( 'Styling', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'soon-styling-acc'
);
$this->settings['soon_bg_type'] = array(
    'title'   => __( 'Background Type', 'octa' ),
    'desc'    => __( 'Select how the background tpye is.', 'octa' ),
    'type'    => 'select',
    'section' => 'it_soon',
    'class'   => 'select_boxes',
    'choices' => array(
        'image' => 'Image',
        'video' => 'HTML5 Video',
    )
);
$this->settings['soon_bgcolor'] = array(
    'title'   => __( 'background color', 'octa' ),
    'desc'    => __( 'Choose solid color for page background', 'octa' ),
    'type'    => 'color',
    'section' => 'it_soon',
    'defcolor' => '#14191e',
    'dependency' => array(
        'element' => 'soon_bg_type',
        'value' => 'image'
    ),
);
$this->settings['soon_bg'] = array(
    'section' => 'it_soon',
    'title'   => __( 'Background Image', 'octa' ),
    'desc'    => __( 'Select an image or insert a url.', 'octa' ),
    'type'    => 'file',
    'dependency' => array(
        'element' => 'soon_bg_type',
        'value' => 'image'
    ),
);
$this->settings['soon_bg_repeat'] = array(
    'title'   => __( 'Background repeat', 'octa' ),
    'desc'    => __( 'How the background image repeats.', 'octa' ),
    'type'    => 'select',
    'section' => 'it_soon',
    'class'   => 'select_boxes',
    'choices' => array(
        'repeat' => 'repeat',
        'no-repeat' => 'no-repeat',
        'repeat-x' => 'repeat-x',
        'repeat-y' => 'repeat-y'
    ),
    'dependency' => array(
        'element' => 'soon_bg',
        'not_empty' => true
    ),
);
$this->settings['soon_bg_position'] = array(
    'title'   => __( 'Background Position', 'octa' ),
    'type'    => 'select',
    'section' => 'it_soon',
    'choices' => array(
        '0 0' => 'Left Top',
        '0 50%' => 'Left Middle',
        '0 100%' => 'Left Bottom',
        '50% 0' => 'Center Top',
        '50% 50%' => 'Center Middle',
        '50% 100%' => 'Center Right',
        '100% 0' => 'Right Top',
        '100% 50%' => 'Right Middle',
        '100% 100%' => 'Right Bottom',
    ),
    'std'   => '0 100%',
    'dependency' => array(
        'element' => 'soon_bg',
        'not_empty' => true
    ),
);
$this->settings['soon_bg_size'] = array(
    'title'   => __( 'Background Size', 'octa' ),
    'type'    => 'select',
    'section' => 'it_soon',
    'class'   => 'select_boxes',
    'choices' => array(
        '' => 'Default',
        'cover' => 'Cover',
        'contain' => 'Contain',
        '100% 100%' => '100%',
    ),
    'dependency' => array(
        'element' => 'soon_bg',
        'not_empty' => true
    ),
);
$this->settings['soon_bg_img_parallax'] = array(
    'title'   => __( 'Fixed Background', 'octa' ),
    'type'    => 'checkbox',
    'section' => 'it_soon',
    'dependency' => array(
        'element' => 'soon_bg',
        'not_empty' => true
    ),
);
$this->settings['soon_poster'] = array(
    'section' => 'it_soon',
    'title'   => __( 'Upload Poster Image', 'octa' ),
    'desc'    => __( 'Select a poster image or insert a url.', 'octa' ),
    'type'    => 'file',
    'dependency' => array(
        'element' => 'soon_bg_type',
        'value' => 'video'
    ),
);
$this->settings['soon_video_mp4'] = array(
    'section' => 'it_soon',
    'title'   => __( 'Upload .mp4 Video', 'octa' ),
    'desc'    => __( 'upload a .mp4 video or insert a url.', 'octa' ),
    'type'    => 'upload',
    'dependency' => array(
        'element' => 'soon_bg_type',
        'value' => 'video'
    ),
); 
$this->settings['soon_video_webm'] = array(
    'section' => 'it_soon',
    'title'   => __( 'Upload .webm Video', 'octa' ),
    'desc'    => __( 'upload .WEBM video or type a video URL.', 'octa' ),
    'type'    => 'upload',
    'dependency' => array(
        'element' => 'soon_bg_type',
        'value' => 'video'
    ),
);
$this->settings['soon_video_ogv'] = array(
    'section' => 'it_soon',
    'title'   => __( 'Upload .ogv Video', 'octa' ),
    'desc'    => __( 'upload .OGV video or type a video URL.', 'octa' ),
    'type'    => 'upload',
    'dependency' => array(
        'element' => 'soon_bg_type',
        'value' => 'video'
    ),
);

/* Maintenance Mode
===========================================*/
$this->settings['maintenance-settings'] = array(
    'section' => 'it_mainten',
    'desc'    => __( 'Maintenace Mode', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'mainten-acc'
);
$this->settings['enable_maintenace_mode'] = array(
    'section' => 'it_mainten',
    'title'   => __( 'Enable Maintenace Mode', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '',
    'desc'    => __( 'Close site for visitors & Display coming soon message.', 'octa' )
);
$this->settings['mainten_large_heading'] = array(
    'title'   => __( 'Large Heading ', 'octa' ),
    'desc'    => __( 'large heading at the top of the page.', 'octa' ),
    'std'     => 'site is under Maintenance',
    'type'    => 'text',
    'multilang' => true,
    'section' => 'it_mainten',
);
$this->settings['mainten_lg_head_color'] = array(
    'title'   => __( 'Large Heading color', 'octa' ),
    'desc'    => __( 'Choose solid color for Large Heading', 'octa' ),
    'type'    => 'color',
    'section' => 'it_mainten',
    'defcolor' => '#ffffff',
);
$this->settings['mainten_large_heading2'] = array(
    'title'   => __( 'Large Heading 2', 'octa' ),
    'desc'    => __( 'large heading 2 at the top of the page .', 'octa' ),
    'std'     => 'We Will Be Right Back!',
    'type'    => 'text',
    'multilang' => true,
    'section' => 'it_mainten',
);
$this->settings['mainten_lg_head2_color'] = array(
    'title'   => __( 'Large Heading 2 color', 'octa' ),
    'desc'    => __( 'Choose solid color for Large Heading 2', 'octa' ),
    'type'    => 'color',
    'section' => 'it_mainten',
    'defcolor' => '#ffffff',
);
$this->settings['mainten_decription'] = array(
    'section' => 'it_mainten',
    'title'   => __( 'Description', 'octa' ),
    'desc'    => __( 'Insert here the description text.', 'octa' ),
    'multilang' => true,
    'type'    => 'editor',
);
$this->settings['mainten_desc_color'] = array(
    'title'   => __( 'Description color', 'octa' ),
    'desc'    => __( 'Choose solid color for description', 'octa' ),
    'type'    => 'color',
    'section' => 'it_mainten',
    'defcolor' => '#333'
);
$this->settings['mainten_show_newsletters'] = array(
    'section' => 'it_mainten',
    'title'   => __( 'Show NewsLetterf Form', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'desc'    => __( 'Show / Hide NewsLetterf Form.', 'octa' ),
);
$this->settings['mainten_nl_shortcode'] = array(
    'title'   => __( 'NewsLetter Form Shortcode ', 'octa' ),
    'desc'    => __( 'Add the newsletters form shortcode.', 'octa' ),
    'type'    => 'text',
    'section' => 'it_mainten',
    'dependency' => array(
        'element' => 'mainten_show_newsletters',
        'not_empty' => true
    ),
);
$this->settings['mainten-socials-styling'] = array(
    'section' => 'it_mainten',
    'desc'    => __( 'Social Icons', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'mainten-soc-acc'
);
$this->settings['mainten_show_social_links'] = array(
    'section' => 'it_mainten',
    'title'   => __( 'Show Social Links', 'octa' ),
    'type'    => 'checkbox',
    'std'     => '1',
    'desc'    => __( 'Show / Hide the social links.', 'octa' )
);
$this->settings['mainten_facebook'] = array(
    'title'   => __( 'Facebook', 'octa' ),
    'desc'    => __( 'Facebook link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'mainten_show_social_links',
    'section' => 'it_mainten',
    'dependency' => array(
        'element' => 'mainten_show_social_links',
        'not_empty' => true
    ),
);
$this->settings['mainten_twitter'] = array(
    'title'   => __( 'Twitter', 'octa' ),
    'desc'    => __( 'Twitter link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'mainten_show_social_links',
    'section' => 'it_mainten',
    'dependency' => array(
        'element' => 'mainten_show_social_links',
        'not_empty' => true
    ),
);
$this->settings['mainten_linkedin'] = array(
    'title'   => __( 'LinkedIn', 'octa' ),
    'desc'    => __( 'LinkedIn link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'mainten_show_social_links',
    'section' => 'it_mainten',
    'dependency' => array(
        'element' => 'mainten_show_social_links',
        'not_empty' => true
    ),
);
$this->settings['mainten_google-plus'] = array(
    'title'   => __( 'Google+', 'octa' ),
    'desc'    => __( 'Google+ link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'mainten_show_social_links',
    'section' => 'it_mainten',
    'dependency' => array(
        'element' => 'mainten_show_social_links',
        'not_empty' => true
    ),
);
$this->settings['mainten_skype'] = array(
    'title'   => __( 'Skype', 'octa' ),
    'desc'    => __( 'Skype link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'mainten_show_social_links',
    'section' => 'it_mainten',
    'dependency' => array(
        'element' => 'mainten_show_social_links',
        'not_empty' => true
    ),
);
$this->settings['mainten_rss'] = array(
    'title'   => __( 'RSS', 'octa' ),
    'desc'    => __( 'RSS link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'mainten_show_social_links',
    'section' => 'it_mainten',
    'dependency' => array(
        'element' => 'mainten_show_social_links',
        'not_empty' => true
    ),
);
$this->settings['mainten_youtube'] = array(
    'title'   => __( 'Youtube', 'octa' ),
    'desc'    => __( 'Youtube link.', 'octa' ),
    'type'    => 'text',
    'parent'  => 'mainten_show_social_links',
    'section' => 'it_mainten',
    'dependency' => array(
        'element' => 'mainten_show_social_links',
        'not_empty' => true
    ),
);
$this->settings['mainten-styling'] = array(
    'section' => 'it_mainten',
    'desc'    => __( 'Styling', 'octa' ),
    'type'    => 'heading',
    'data_id' => 'mainten-styling-acc'
);

$this->settings['mainten_bgcolor'] = array(
    'title'   => __( 'background color', 'octa' ),
    'desc'    => __( 'Choose solid color for page background', 'octa' ),
    'type'    => 'color',
    'section' => 'it_mainten',
    'defcolor' => '#eee',
    'dependency' => array(
        'element' => 'soon_bg_type',
        'value' => 'image'
    ),
);
$this->settings['mainten_bg'] = array(
    'section' => 'it_mainten',
    'title'   => __( 'Background Image', 'octa' ),
    'desc'    => __( 'Select an image or insert a url.', 'octa' ),
    'type'    => 'file',
);
$this->settings['mainten_bg_repeat'] = array(
    'title'   => __( 'Background repeat', 'octa' ),
    'desc'    => __( 'How the background image repeats.', 'octa' ),
    'type'    => 'select',
    'section' => 'it_mainten',
    'class'   => 'select_boxes',
    'choices' => array(
        'repeat' => 'repeat',
        'no-repeat' => 'no-repeat',
        'repeat-x' => 'repeat-x',
        'repeat-y' => 'repeat-y'
    ),
    'dependency' => array(
        'element' => 'mainten_bg',
        'not_empty' => true
    ),
);
$this->settings['mainten_bg_position'] = array(
    'title'   => __( 'Background Position', 'octa' ),
    'type'    => 'select',
    'section' => 'it_mainten',
    'choices' => array(
        '0 0' => 'Left Top',
        '0 50%' => 'Left Middle',
        '0 100%' => 'Left Bottom',
        '50% 0' => 'Center Top',
        '50% 50%' => 'Center Middle',
        '50% 100%' => 'Center Right',
        '100% 0' => 'Right Top',
        '100% 50%' => 'Right Middle',
        '100% 100%' => 'Right Bottom',
    ),
    'std'   => '0 100%',
    'dependency' => array(
        'element' => 'mainten_bg',
        'not_empty' => true
    ),
);
$this->settings['mainten_bg_size'] = array(
    'title'   => __( 'Background Size', 'octa' ),
    'type'    => 'select',
    'section' => 'it_mainten',
    'class'   => 'select_boxes',
    'choices' => array(
        '' => 'Default',
        'cover' => 'Cover',
        'contain' => 'Contain',
        '100% 100%' => '100%',
    ),
    'dependency' => array(
        'element' => 'mainten_bg',
        'not_empty' => true
    ),
);
$this->settings['mainten_bg_img_parallax'] = array(
    'title'   => __( 'Fixed Background', 'octa' ),
    'type'    => 'checkbox',
    'section' => 'it_mainten',
    'dependency' => array(
        'element' => 'mainten_bg',
        'not_empty' => true
    ),
);

return $this->settings;