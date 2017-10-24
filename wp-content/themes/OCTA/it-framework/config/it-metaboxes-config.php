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
 
require_once( get_parent_theme_file_path('it-framework/classes/it-meta-boxes.class.php') );

/* Top Bar Settings
============================================= */
$cusom_page_box = array(
    'id'             => 'cusom_page_settings',
    'title'          => 'Custom Page Settings',
    'fields'         => array(),
);
$cusom_page_box =  new ITMetaBoxes($cusom_page_box);
$cusom_page_box->it_select(
    'meta_hide_top_bar',
    array(
        '' => 'Inherit From Theme',
        '1'  => 'Show',
        '2' => 'Hide',
    ),
    array(
        'name'   => 'Visibility', 
        'class'  => 'select_boxes',
        'section'=> 'it_topbar',
        'desc'   => 'Show / Hide Top Bar for this page.'
    )
);
$cusom_page_box->it_select(
    'meta_topbar_color',
    array(
        '' => '-- Select Color --',
        'light'  => 'Light',
        'gry-bg' => 'Grey',
        'main-bg' => 'Colored',
        'dark-bg' => 'Dark',
        'custom' => 'Custom',
    ),
    array(
        'name'   => 'Color ',
        'section'=> 'it_topbar', 
        'desc'   => 'Select top bar color for this page.'
    )
);
$cusom_page_box->it_color(
    'meta_bar_color',
    array(
        'name'      => 'Custom Background Color',
        'section'=> 'it_topbar',
        'desc'      => 'Select the custom top bar color.',
        'dependency' => array(
            'element' => 'meta_topbar_color',
            'value' => 'custom'
        )
    )
);
$cusom_page_box->it_color(
    'meta_bar_fcolor',
    array(
        'name'      => 'Custom Font Color',
        'section'=> 'it_topbar',
        'desc'      => 'Select the custom top bar color.',
        'dependency' => array(
            'element' => 'meta_topbar_color',
            'value' => 'custom'
        )
    )
);
$cusom_page_box->it_color(
    'meta_bar_icolor',
    array(
        'name'      => 'Custom Icons Color',
        'section'=> 'it_topbar',
        'desc'      => 'Select the custom top bar color.',
        'dependency' => array(
            'element' => 'meta_topbar_color',
            'value' => 'custom'
        )
    )
);
$cusom_page_box->it_select(
    'meta_bar_full',
    array(
        '' => 'Inherit From Theme',
        '1'  => 'Yes',
        '2' => 'No',
    ),
    array(
        'name'  => 'Full Width ?',
        'section'=> 'it_topbar',
        'class'  => 'select_boxes'
    )
);
$cusom_page_box->it_select(
    'meta_bar_border',
    array(
        '' => 'Inherit From Theme',
        '1'  => 'Yes',
        '2' => 'No',
    ),
    array(
        'name'  => 'Bottom Border ?',
        'section'=> 'it_topbar',
        'class'  => 'select_boxes'
    )
);

/* Header Settings
============================================= */
$cusom_page_box->it_select(
    'meta_header_style',
    array(
        ''                 => '-- Choose Header Style --',
        'classic'          => 'Classic',
        'modern'           => 'Modern',
        'boxes'            => 'Boxes',
        'left'             => 'Left Side',
        'right'            => 'Right Side'
    ),
    array(
        'name'   => 'Header Style', 
        'section'=> 'it_header',
        'desc'   => 'Select different header style for this page.'
    )
);
$cusom_page_box->it_select(
    'meta_logo_position',
    array(
        ''              => 'Inherit From Theme',
        'left-logo'     => 'Left Logo',
        'center-logo'   => 'Center Logo',
        'right-logo'    => 'Right Logo'
    ),
    array(
        'name'   => 'Logo Position', 
        'class'  => 'select_boxes',
        'section'=> 'it_header',
        'desc'   => 'Select different Logo Position for this page.',
    )
);
$cusom_page_box->it_select(
    'meta_header_minimal',
    array(
        ''              => 'Inherit From Theme',
        'simple'        => 'Simple',
        'blocks'        => 'Blocks',
        'borders'       => 'Borders',
        'bottom-menu'   => 'With Bottom Menu'
    ),
    array(
        'name'   => 'Classic Header Variations ', 
        'class'  => 'select_boxes',
        'section'=> 'it_header',
        'desc'   => 'Select different classic header style for this page.',
        'dependency' => array(
            'element' => 'meta_header_style',
            'value' => 'classic'
        )
    )
);
$cusom_page_box->it_select(
    'meta_header_dark',
    array(
        ''      => 'Inherit From Theme',
        '1'     => 'Yes',
        '2'     => 'No',
    ),
    array(
        'name'      => 'Dark',
        'section'   => 'it_header',
        'class'     => 'select_boxes'
    )
);
$cusom_page_box->it_checkbox(
    'meta_header_fixed',
    array(
        'name'      => 'Fixed',
        'section'   => 'it_header',
        'dependency' => array(
            'element' => 'meta_header_style',
            'value' => array('modern','classic','boxes')
        )
    )
);
$cusom_page_box->it_select(
    'meta_header_position',
    array(
        ''          => 'Inherit from theme',
        'top'       => 'Top',
        'bottom'    => 'Bottom'
    ),
    array(
        'name'   => 'Fixed Header Position', 
        'section'=> 'it_header',
        'class'   => 'select_boxes',
        'dependency' => array(
            'element' => 'meta_header_fixed',
            'not_empty' => true
        )
    )
);
$cusom_page_box->it_numberbox(
    'meta_header_top_pos',
    array(  
        'name'      => 'Top',
        'section'   => 'it_header',
        'std'     => '20',
        'dependency' => array(
            'element' => 'meta_header_position',
            'value' => 'top'
        ),
        'desc'      => 'Distance from top in px.',
    )
);
$cusom_page_box->it_numberbox(
    'meta_header_bottom_pos',
    array(  
        'name'      => 'Bottom',
        'section'   => 'it_header',
        'std'     => '0',
        'dependency' => array(
            'element' => 'meta_header_position',
            'value' => 'bottom'
        ),
        'desc'      => 'Distance from bottom in px.',
    )
);
$cusom_page_box->it_twonumber(
    'meta_header_padding',
    array(  
        'name'      => 'Header Padding',
        'section'   => 'it_header',
        'std'     => '0|0',
        'desc'      => 'Top and Bottom Header content padding in px.',
    )
);
$cusom_page_box->it_select(
    'meta_header_full',
    array(
        ''      => 'Inherit From Theme',
        '1'     => 'Yes',
        '2'     => 'No',
    ),
    array(
        'name'      => 'Full Width',
        'section'   => 'it_header',
        'class'     => 'select_boxes'
    )
);
$cusom_page_box->it_color(
    'meta_header_bg_color',
    array(
        'name'      => 'Header Background Color',
        'section'   => 'it_header',
        'desc'      => 'Select the header background color.',
    )
);
$cusom_page_box->it_color(
    'meta_nav_border_color',
    array(
        'name'      => 'Header Border Color',
        'section'   => 'it_header',
        'desc'      => 'Choose header border color for modern Header ONLY.',
        'dependency' => array(
            'element' => 'meta_header_style',
            'value' => 'modern'
        )
    )
);
$cusom_page_box->it_numberbox(
    'meta_nav_border_width',
    array(  
        'name'      => 'Border Width',
        'section'   => 'it_header',
        'std'     => '0',
        'dependency' => array(
            'element' => 'meta_header_style',
            'value' => 'modern'
        ),
        'desc'      => 'Choose header border size in px.',
    )
);
$cusom_page_box->it_select(
    'meta_header_icons',
    array(
        ''      => 'Inherit From Theme',
        '1'     => 'Yes',
        '2'     => 'No',
    ),
    array(
        'name'      => 'Show Icons',
        'section'   => 'it_header',
        'class'     => 'select_boxes'
    )
);
$cusom_page_box->it_select(
    'meta_header_sub_icons',
    array(
        ''      => 'Inherit From Theme',
        '1'     => 'Yes',
        '2'     => 'No',
    ),
    array(
        'name'      => 'Show Submenu Icons',
        'section'   => 'it_header',
        'class'     => 'select_boxes'
    )
);
$cusom_page_box->it_select(
    'meta_header_subtitle',
    array(
        '' => 'Inherit From Theme',
        '1'  => 'Yes',
        '2' => 'No',
    ),
    array(
        'name'      => 'Show Menu Subtitles',
        'section'   => 'it_header',
        'class'     => 'select_boxes'
    )
);
$cusom_page_box->it_uploadfile(
    'meta_header_banner',
    array(
        'name'      => 'header Banner image',
        'section'   => 'it_header',
        'desc'      => 'upload a Banner image or type an image URL in the textbox below.',
        'dependency' => array(
            'element' => 'meta_header_style',
            'value' => 'classic'
        )
    )
);
$cusom_page_box->it_textbox(
    'meta_header_banner_link',
    array(  
        'name'      => 'Header Banner Link',
        'section'   => 'it_header',
        'desc'      => 'Insert here the LINK for the Banner. Ex: http://www.google.com',
        'dependency' => array(
            'element' => 'meta_header_style',
            'value' => 'classic'
        )
    )
);
$cusom_page_box->it_select(
    'meta_sub_menu_color',
    array(
        ''           => 'Inherit From Theme',
        'light'      => 'Light',
        'dark-sub'   => 'Dark',
        'colored'    => 'Colored',
        'custom'     => 'Custom'
    ),
    array(
        'name'      => 'Sub Menu Color ', 
        'class'     => 'select_boxes',
        'section'   => 'it_header',
        'desc'      => 'Select Sub Menu Color for this page.'
    )
);
$cusom_page_box->it_color(
    'meta_cust_sub_bg_color',
    array(
        'name'      => 'Sub menu Background Color',
        'section'   => 'it_header',
        'dependency' => array(
            'element' => 'meta_sub_menu_color',
            'value' => 'custom'
        )
    )
);
$cusom_page_box->it_color(
    'meta_cust_sub_color',
    array(
        'name'      => 'Sub menu Font Color',
        'section'   => 'it_header',
        'dependency' => array(
            'element' => 'meta_sub_menu_color',
            'value' => 'custom'
        )
    )
);
$cusom_page_box->it_select(
    'meta_header_sticky',
    array(
        '' => 'Inherit From Theme',
        '1'  => 'Yes',
        '2' => 'No',
    ),
    array(
        'name'   => 'Sticky Header ?', 
        'class'  => 'select_boxes',
        'section'=> 'it_header',
        'desc'   => 'Enable/Disable Sticky Header for this page.'
    )
);
$cusom_page_box->it_checkbox(
    'meta_hide_menu',
    array(
        'name'  => 'Hide Logo and Menu',
        'section'   => 'it_header',
        'desc'  => 'hide the Logo and Menu only in this page.',
    )
);
$cusom_page_box->it_textbox(
    'meta_header_extra_class',
    array(  
        'name'      => 'Extra CSS Class',
        'section'   => 'it_header',
        'desc'      => 'Insert here extra CSS class for the Header Element.',
    )
);
$cusom_page_box->it_checkbox(
    'meta_hide_header',
    array(
        'name'  => '<b style="color:red">Hide Header</b>',
        'section'=> 'it_header',
        'desc'  => 'This will only hide the header in this page.',
    )
);

/* Page Title Settings
============================================= */
$cusom_page_box->it_textbox(
    'meta_custom_title_txt',
    array(
        'name'      => 'Custom Title Text',
        'section'   => 'it_pagetitles',
        'desc'      => 'Replace the original title',
    )
); 
$cusom_page_box->it_color(
    'meta_title_color',
    array(
        'name'      => 'Title Color',
        'section'   => 'it_pagetitles',
        'desc'      => 'Select the page Title color.',
    )
);
$cusom_page_box->it_numberbox(
    'meta_title_fontsize',
    array(
        'name'      => 'Title Font Size',
        'section'   => 'it_pagetitles',
        'desc'      => 'Set custom font size for the Title (Only numbers allowed)',
    )
);
$cusom_page_box->it_textbox(
    'meta_custom_subtitle',
    array(
        'name'      => 'SubTitle Text',
        'section'   => 'it_pagetitles',
        'desc'      => 'Add new sub title.',
    )
);
$cusom_page_box->it_color(
    'meta_subtitle_color',
    array(
        'name'      => 'SubTitle Color ',
        'section'   => 'it_pagetitles',
        'desc'      => 'Select the page sub Title color.',
    )
);
$cusom_page_box->it_numberbox(
    'meta_sub_title_fontsize',
    array(
        'name'      => 'Sub Title Font Size',
        'section'   => 'it_pagetitles',
        'desc'      => 'Set custom font size for the sub Title (Only numbers allowed)',
    )
);
$cusom_page_box->it_select(
    'meta_title_position',
    array(
        '' => 'Inherit From Theme',
        'left' => 'Left',
        'center' => 'Centered',
        'right' => 'Right'
    ),
    array(
        'name'      => 'Position', 
        'class'     => 'select_boxes',
        'section'   => 'it_pagetitles',
        'desc'      => 'Select the page Title position.'
    )
);
$cusom_page_box->it_numberbox(
    'meta_title_height',
    array(  
        'name'      => 'Custom Height',
        'section'   => 'it_pagetitles',
        'desc'      => 'page Title Height. Ex: 200px (Only numbers allowed)'
    )
);  
$cusom_page_box->it_select(
    'meta_title_col',
    array(
        '' => 'Inherit From Theme',
        'light' => 'Light',
        'dark' => 'Dark',  
        'colored' => 'Colored',
        'custom'  => 'Custom'
    ),
    array(
        'name'      => 'Color ',
        'section'   => 'it_pagetitles',
        'class'     => 'select_boxes', 
        'desc'      => 'Select the page Title color.'
    )
);
$cusom_page_box->it_color(
    'meta_title_bg_color',
    array(
        'name'      => 'Background Color',
        'section'   => 'it_pagetitles',
        'desc'      => 'Select the page title custom background color.',
        'dependency' => array(
            'element' => 'meta_title_col',
            'value' => 'custom'
        )
    )
);
$cusom_page_box->it_color(
    'meta_title_text_bg_color',
    array(
        'name'      => 'Text Background Color',
        'section'   => 'it_pagetitles',
        'desc'      => 'Select the page Title Text background color.',
        'dependency' => array(
            'element' => 'meta_title_col',
            'value' => 'custom'
        )
    )
);
$cusom_page_box->it_uploadfile(
    'meta_title_bg_img',
    array(
        'name'      => 'Background image',
        'section'   => 'it_pagetitles',
        'desc'      => 'upload image or type a URL.',
        'dependency' => array(
            'element' => 'meta_title_col',
            'value' => 'custom'
        )
    )
);
$cusom_page_box->it_select(
    'meta_title_bg_repeat',
    array(
        ''=>'Repeat',
        'no-repeat'=>'No Repeat',
        'repeat-x'=>'Repeat Horizontal',
        'repeat-y'=>'Repeat Vertical',
    ),
    array(
        'name'      => 'Background Repeat',
        'section'   => 'it_pagetitles',
        'desc'      => 'Choose how background image repeated.',
        'dependency' => array(
            'element' => 'meta_title_bg_img',
            'not_empty' => true
        )
    )
);
$cusom_page_box->it_select(
    'meta_title_bg_size',
    array(
        'cover' => 'Cover',
        'contain' => 'Contain',
        '100% 100%' => '100%',
    ),
    array(
        'name'      => 'Background Size',
        'section'   => 'it_pagetitles',
        'class'   => 'select_boxes',
        'dependency' => array(
            'element' => 'meta_title_bg_img',
            'not_empty' => true
        )
    )
);
$cusom_page_box->it_checkbox(
    'meta_title_parallax',
    array(
        'name'      => 'Parallax Background ?',
        'section'   => 'it_pagetitles',
        'desc'      => 'Enable / Disable Parallax effect.',
        'dependency' => array(
            'element' => 'meta_title_bg_img',
            'not_empty' => true
        )
    )
);
$cusom_page_box->it_color(
    'meta_title_bg_overlay',
    array(
        'name'      => 'Overlay ?',
        'section'   => 'it_pagetitles',
        'desc'      => 'Overlay over the background image.',
    )
);
$cusom_page_box->it_checkbox(
    'meta_chck_video_bg',
    array(
        'name'      => 'Video Background',
        'section'   => 'it_pagetitles',
        'desc'      => 'Upload video background.',
    )
);
$cusom_page_box->it_uploadfile(
    'meta_header_video_cover',
    array(
        'name'=> 'Video Cover',
        'section'   => 'it_pagetitles',
        'desc'=> 'upload an image or type an image URL in the textbox below.',
        'class'=>'vid_cov',
        'dependency' => array(
            'element' => 'meta_chck_video_bg',
            'not_empty' => true
        )
    )
);
$cusom_page_box->it_uploadfile(
    'meta_video_mp4',
    array(
        'name'=> 'video/mp4',
        'section'   => 'it_pagetitles',
        'desc'=> 'upload .MP4 video or type a video URL.',
        'data-type'=> 'video',
        'dependency' => array(
            'element' => 'meta_chck_video_bg',
            'not_empty' => true
        )
    )
);
$cusom_page_box->it_uploadfile(
    'meta_video_webm',
    array(
        'name'=> 'video/webm',
        'section'   => 'it_pagetitles',
        'desc'=> 'upload .WEBM video or type a video URL.',
        'data-type'=> 'video',
        'dependency' => array(
            'element' => 'meta_chck_video_bg',
            'not_empty' => true
        )
    )
);
$cusom_page_box->it_uploadfile(
    'meta_video_ogv',
    array(
        'name'=> 'video/ogv',
        'section'   => 'it_pagetitles',
        'desc'=> 'upload .OGV video or type a video URL.',
        'data-type'=> 'video',
        'dependency' => array(
            'element' => 'meta_chck_video_bg',
            'not_empty' => true
        )
    )
);
$cusom_page_box->it_icon(
    'meta_title_icon',
    array(
        'name'=> 'Title Icon ',
        'section'   => 'it_pagetitles',
        'desc'=> 'Select the page Title Icon.',
    )
);
if(function_exists('bcn_display')){
    $cusom_page_box->it_checkbox(
        'meta_hide_breadcrumbs',
        array(
            'name'=> 'Hide Breadcrumbs',
            'section'   => 'it_pagetitles',
            'desc'=> 'hide Breadcrumbs only in this page.',
        )
    );
}
$cusom_page_box->it_checkbox(
    'meta_hide_page_title',
    array(
        'name'=> '<b style="color:red">Hide Page Title</b>',
        'section'   => 'it_pagetitles',
        'desc'=> 'Hide the Page Title only in this page.',
    )
);

/* Footer Settings
============================================= */
$cusom_page_box->it_select(
    'meta_footer_style',
    array(
        ''=> 'Inherit From Theme',
        '1' => 'Style 1',
        '2' => 'Style 2',
        '3' => 'Style 3',
        'minimal-1' => 'Minimal 1',
        'minimal-2' => 'Minimal 2',
    ),
    array(
        'name'=> 'Footer Style', 
        'section'   => 'it_footer',
        'desc'=> 'Select different footer style for this page.'
    )
); 
$cusom_page_box->it_checkbox(
    'meta_foot_light',
    array(
        'name'=> 'Light ?',
        'section'   => 'it_footer',
        'desc'=> 'Choose the light colored footer.',
    )
);
$cusom_page_box->it_checkbox(
    'meta_foot_fixed',
    array(
        'name'=> 'Fixed ?',
        'section'   => 'it_footer',
        'desc'=> 'Choose the fixed footer.',
    )
);
$cusom_page_box->it_checkbox(
    'meta_hide_foot_widgets',
    array(
        'name'=> 'Hide Footer Widgets',
        'section'   => 'it_footer',
        'desc'=> 'Hide Footer Widgets only in this page.',
    )
);
$cusom_page_box->it_checkbox(
    'meta_hide_bottom_foot_bar',
    array(
        'name'=> 'Hide Bottom Footer Bar',
        'section'   => 'it_footer',
        'desc'=> 'Hide Bottom Footer Bar only in this page.',
    )
); 
$cusom_page_box->it_checkbox(
    'meta_hide_footer',
    array(
        'name'=> '<b style="color:red">Hide Footer</b>',
        'section'   => 'it_footer',
        'desc'=> 'This will only Hide the Footer in this page.',
    )
);
