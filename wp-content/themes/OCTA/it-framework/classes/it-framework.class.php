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

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;
        
class ITFramework {
    
    public $theme_version = '1.0.0';
    
    public $sections;
    public $checkboxes;
    public $settings;
    
    public function __construct() {
        
        $this->checkboxes = array();
        $this->settings = array();
        $this->get_option();
        
        
        $this->sections['it_appearance']           = '<i class="dashicons dashicons-layout"></i>Layout';
        $this->sections['it_colors']               = '<i class="dashicons dashicons-admin-appearance"></i>Colors';
        $this->sections['it_topbar']               = '<i class="fa fa-bars"></i>Top Bar';        
        $this->sections['it_header']               = '<i class="fa fa-umbrella"></i>Header';
        $this->sections['it_logo']                 = '<i class="fa fa-briefcase"></i>Logo';
        $this->sections['it_menu']                 = '<i class="fa fa-certificate"></i>Menu';
        $this->sections['it_footer']               = '<i class="fa fa-sliders"></i>Footer';
        $this->sections['it_pagetitles']           = '<i class="fa fa-cog"></i>Page Title';
        $this->sections['it_typography']           = '<i class="fa fa-edit"></i>Typography';
        $this->sections['it_extras']               = '<i class="fa fa-bolt"></i>Extras';
        $this->sections['it_slidingbar']           = '<i class="fa fa-plus"></i>Sliding Bar';
        $this->sections['it_blogoptions']          = '<i class="fa fa-book"></i>Blog';
        $this->sections['it_sidebars']             = '<i class="fa fa-tags"></i>Sidebars';
        $this->sections['it_socialicons']          = '<i class="fa fa-share-alt"></i>Social icons'; 
        $this->sections['it_portfolio']            = '<i class="fa fa-th"></i>Portfolio';       
        
        if(class_exists('Woocommerce')) {
            $this->sections['it_woocommerce']          = '<i class="fa fa-shopping-cart"></i>Shop <span class="hint">WooCommerce</span>';
        }
        if(class_exists('bbPress')) {
            $this->sections['it_bbpress']              = '<i class="fa fa-comments"></i>Forums<span class="hint">BBPress</span>';
        }
        if( class_exists("buddyPress")) {
            $this->sections['it_buddypress']           = '<i class="fa fa-group"></i>Activity<span class="hint">BuddyPress</span>';
        }
        if( class_exists("Easy_Digital_Downloads")) {
            $this->sections['it_downloads']           = '<i class="fa fa-download"></i>Downloads<span class="hint">EDD</span>';
        }
        
        $this->sections['it_contact']              = '<i class="fa fa-phone-square"></i>Contact';  
        $this->sections['it_soon']                 = '<i class="fa fa-sign-in"></i>Coming Soon';
        $this->sections['it_mainten']              = '<i class="fa fa-gears"></i>Maintenance Mode'; 
        
        
        add_action( 'admin_menu', array( &$this, 'add_pages' ) );
        
        add_action( 'admin_init', array( &$this, 'register_settings' ) );
                
        add_action( 'admin_init', array( &$this, 'export_settings' ) );
                        
        register_setting( 'theme_options', 'theme_options', array ( &$this, 'validate_settings' ) );
                
        if ( ! get_option( 'theme_options' ) ) $this->initialize_settings(); 
                        
    }
    
    public function add_pages() {
        
        add_theme_page('Theme Options', 'OCTA', 'manage_options', 'theme-options', array( &$this, 'display_page' ) );
        
        add_action( 'admin_enqueue_scripts', array( &$this, 'enq_scripts' ) );
    }

    public function create_setting( $args = array() ) {
        
        $defaults = array(
            'id'                    => '',
            'title'                 => '',
            'desc'                  => '',
            'std'                   => '',
            'type'                  => 'text',
            'src'                   => '',
            'link'                  => '',
            'group'                 => '',
            'parent'                => '',
            'section'               => '',
            'choices'               => array(),
            'class'                 => '',
            'defcolor'              => '',
            'data_id'               => '',
            'min'                   => '',
            'max'                   => '',
            'firstInput'            => '',
            'lastInput'             => '',
            'items'                 => array(),
            'sidebar'               => array(),
            'slides'                => array(),
            'dependency'            => array()
        );
            
        extract( wp_parse_args( $args, $defaults ) );
        
        $field_args = array(
            'type'                  => $type,
            'id'                    => $id,
            'desc'                  => $desc,
            'std'                   => $std,
            'src'                   => $src,
            'link'                  => $link,
            'group'                 => $group,
            'parent'                => $parent,
            'choices'               => $choices,
            'items'                 => $items,
            'sidebar'               => $sidebar,
            'label_for'             => $id,
            'class'                 => $class,
            'defcolor'              => $defcolor,
            'slides'                => $slides,
            'min'                   => $min,
            'max'                   => $max,  
            'firstInput'            => $firstInput,
            'lastInput'             => $lastInput,
            'data_id'               => $data_id,
            'dependency'            => $dependency
        );
        
        if ( $type == 'checkbox' ){
            $this->checkboxes[] = $id;
        }
                
        add_settings_field( $id, $title, array( $this, 'display_setting' ), 'theme-options', $section, $field_args );
        
    }
    
    public function initialize_settings() {
        $default_settings = array();
        $std = '';
        foreach ( $this->settings as $id => $setting ) {
            if ( $setting['type'] != 'heading' )
                if ( isset($setting['std']) ){
                    $default_settings[$id] = $setting['std'];
                }
        }
        
        update_option( 'theme_options', $default_settings );        
        
        add_action( 'optionsframework_after_validate', array( $this, 'save_options_notice' ) );
    }
    
    public function register_settings() {
        
        foreach ( $this->sections as $slug => $title ) {
            add_settings_section( $slug, $title, array( &$this, 'display_section' ), 'theme-options' );
        }
        
        $this->get_option();
        
        foreach ( $this->settings as $id => $setting ) {
            $setting['id'] = $id;
            $this->create_setting( $setting );
        }
    }
    
    public function display_page() {

        echo '<div class="theme-options">'; // start .theme-otpions
            if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ){
                echo '<div class="new-upd updated fade"><p>' . __( 'Theme options updated.', 'octa' ) . '</p></div>';
                settings_errors( 'theme_options' );
            }
                        
            echo '<div class="boo-tabs">';  // start .boo-tabs
                locate_template ('it-framework/includes/fields/icons/icons.php', true );
                echo '<ul class="boo-tabs-nav" data-logo="'.THEME_NAME.' '.$this->theme_version.'">'; // start .boo-tabs-nav
                    foreach ( $this->sections as $section_slug => $section ){
                        echo '<li><a href="#' . $section_slug . '">' . $section . '</a></li>';
                    }
                    if ( class_exists( 'OCTA_Core' ) ) echo '<li><a href="#imp_exp_form"><i class="fa fa-refresh"></i>Import / Export options</a></li>';
                echo '</ul>'; // end .boo-tabs-nav
                
                echo '<div class="boo_tabs_wrap">'; // start .boo_tabs_wrap
                    echo '<form action="options.php" method="post" class="main-options-form">';
                        settings_fields( 'theme_options' );
                        echo '<div class="form-btns">';
                            echo '<span class="msg"></span><span class="loader-in"></span>';
                            echo '<button name="submit" type="submit" class="button button-primary save_btn"><i class="fa fa-save"></i>' . __( 'Save Changes', 'octa' ) . '</button>';
                            echo '<button type="submit" name="reset" class="button button-default reset_btn"><i class="fa fa-refresh"></i>' . __( 'Restore Defaults', 'octa' ) . '</button>';
                        echo '</div>';
                        $this->it_settings_sections( $_GET['page'] );
                    echo '</form>';
                    
                    // import / export tab.
                    if ( class_exists( 'OCTA_Core' ) ) {
                        echo '<div class="boo-tabs-panel" id="imp_exp_form"><form action="" method="POST" enctype="multipart/form-data">';
                            
                            echo '<div class="opts-ul">';
                                echo '<h4 class="pnl-head"><i class="fa fa-refresh"></i>'.__('Import / Export Options', 'octa').'</h4>';
                                echo '<div class="section">';
                                    echo '<div class="lbl">
                                        <label class="opt-lbl">'.__('Export Theme Options', 'octa').'</label>
                                        <span class="description">'.__('The following are the stored theme options for the theme:', 'octa').'</span>
                                    </div>';
                                    echo '<div class="group">';
                                        echo '<p><textarea class="widefat code" rows="15" cols="50" onclick="this.select()">'; 
                                            echo serialize($this->it_get_options());
                                        echo '</textarea></p>';
                                        echo '<p><a href="?action=download" class="button-secondary"><i class="fa fa-download"></i>'.__('Download File', 'octa').'</a></p>';
                                    echo '</div>';
                                echo '</div>';
                                    
                                echo '<div class="section">';
                                    echo '<div class="lbl">
                                        <label class="opt-lbl">'.__('Import Theme Options', 'octa').'</label>
                                        <span class="description">'.__('Restore a previous theme options.', 'octa').'</span>
                                    </div>';
                                    echo '<div class="group">';
                                        echo '<p><input type="file" class="regular-text up-file" name="import_file" id="import_file" /> <button type="submit" name="upload_options" id="upload_options" class="button-primary"><i class="fa fa-upload"></i>'.__('Import File', 'octa').'</button></p>';
                                    echo '</div>';
                                echo '</div>';
                                
                            echo '</div>';
                        echo '</form>';
                    echo '</div>';
                }
                
                echo '</div>'; // end .boo_tabs_wrap
                
            echo '</div>'; // end .boo-tabs

        echo '</div>';  // end .theme-otpions
        
        echo '<span class="hidden adm">'.esc_url(admin_url()).'</span>';
        echo '<span class="hidden themeURI">'.THEME_URI.'</span>';
        
    }
    
    public function display_section() {
            
    }
        
    public function display_setting( $args = array() ) {
        extract( $args );
        $options = get_option( 'theme_options' );
        $arri = array();
        if ( ! isset( $options[$id] ) && $type != 'checkbox' )
            $options[$id] = $std;
        elseif ( ! isset( $options[$id] ) )
            $options[$id] = 0;
        
        $field_class = '';
        if ( $class != '' )
            $field_class = ' ' . $class;    
        $d_id = '';
        if($data_id){
            $d_id = ' data-id='.$data_id;
        }
        
        switch ( $type ) {
            
            case 'heading':
                echo '<div class="sec-heading' . $field_class . '"'.$d_id.'><h4>' . $desc . '</h4></div>';
                break;
            
            case 'label':
                 echo '<div class="group ' . $field_class . '" data-parent="'.$parent.'">';
                    echo '<label>'. $desc .'</label>';
                 echo '</div>';
                 break;
                 
            case 'checkbox':
                echo '<div class="group" data-parent="'.$parent.'">';
                    echo '<input class="dep-field checktxt' . $field_class . '" type="hidden" id="' . $id . '" name="theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
                    echo '<span class="it_bx custom-checkbox"><span class="switcher"></span></span>';
                echo '</div>';
                break;
            
            case 'select':
                echo '<div class="group" data-parent="'.$parent.'">';
                    echo '<select class="dep-field select' . $field_class . '" id="' . esc_attr( $id ) . '" name="theme_options[' . $id . ']">';
                        foreach ( $choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . $label . '</option>';
                    echo '</select>';
                echo '</div>';
                break;
            
            case 'radio':
                $i = 0;
                echo '<div class="group" data-parent="'.$parent.'">';
                    foreach ( $choices as $value => $label ) {
                        echo '<div class="radio-select"><img class="head-img" src="'.FRAMEWORK_ASSETS_URI.'/images/" >
                        <input class="radio'. $field_class .'" type="radio" name="theme_options['. $id .']" id="'. $id . $i .'" value="'. esc_attr( $value ) .'" '. checked( $options[$id], $value, false ) .'> 
                        <label for="'. $id . $i .'">'. $label .'</label></div>';
                            if ( $i < count( $options ) - 1 )
                            $i++;
                    }
                echo '</div>';
                break;
            
            case 'number':
                echo '<div class="group" data-parent="'.$parent.'">';
                    echo '<div class="slidernum" data-min="' . $min . '" data-max="' . $max . '"></div>';
                    echo '<input class="regular-text num-txt' . $field_class . '" type="number" id="' . $id . '" name="theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
                echo '</div>';
                break;
            
            case 'twonumber':
                $firstVal = explode('|', esc_attr( $options[$id] ));
                $lastVal = substr(esc_attr( $options[$id] ), strpos(esc_attr( $options[$id] ), "|") + 1);
                echo '<div class="group" data-parent="'.$parent.'">';
                    echo '<b class="inp_lbl main-color">'.$firstInput.'</b><input class="regular-text num-txt no-slider firstVL" type="number" placeholder="' . $firstVal[0] . '" value="' . $firstVal[0] . '" />';
                    echo '<b class="inp_lbl last main-color">'.$lastInput.'</b><input class="regular-text num-txt no-slider lastVL" type="number" placeholder="' . $lastVal . '" value="' . $lastVal . '" />';
                    echo '<input class="hid_two_num' . $field_class . '" type="hidden" id="' . $id . '" name="theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
                echo '</div>';
                break;
                
            case 'text':
                echo '<div class="group" data-parent="'.$parent.'">';
                if ( class_exists( 'SitePress' ) && isset($this->settings[$id]['multilang']) ) {
                     $languages  = icl_get_languages();
                     $current    = ICL_LANGUAGE_CODE;
                     $lang       = ICL_LANGUAGE_NAME;
                     foreach ( $languages as $key => $value ) {
                        $type       = ( $key == $current ) ? 'text' : 'hidden';
                        $value_key  = ( ! empty( $options[$key] ) ) ? $options[$key] : '';
                        $value = $id.'-'.$key;
                        if ( ! isset( $options[$value] ) && $type != 'checkbox' )
                        $options[$value] = $std;
                        echo '<input class="dep-field regular-text' . esc_attr( $field_class ) . '" type="'. $type .'" placeholder="' . $std . '" name="'. ('theme_options['. $id.'-'.$key .']') .'" value="'. esc_attr( $options[$value] ) .'" />';
                     }
                     echo '<div class="langg">'.__('You Are Editing in Language.', 'octa').'( <strong>'.$lang.'</strong> )</div>';
                }else{
                    echo '<input class="dep-field regular-text' . esc_attr( $field_class ) . '" type="text" id="' . esc_attr( $id ) . '" name="theme_options[' . $id . ']" placeholder="' . esc_attr( $std ) . '" value="' . esc_attr( $options[$id] ) . '" />'; 
                }
                echo '</div>';
                break;
                
            case 'textarea':
                 echo '<div class="group" data-parent="'.$parent.'">';
                 if ( class_exists( 'SitePress' ) && isset($this->settings[$id]['multilang']) ) {
                     $languages2  = icl_get_languages();
                     $current2    = ICL_LANGUAGE_CODE;
                     $lang2       = ICL_LANGUAGE_NAME;
                     foreach ( $languages2 as $key2 => $value2 ) {
                        $class2      = ( $key2 == $current2 ) ? '' : 'hidden';
                        $value_key2  = ( ! empty( $options[$key2] ) ) ? $options[$key2] : '';
                        $value2 = $id.'-'.$key2;
                        if ( ! isset( $options[$value2] ) && $type != 'checkbox' )
                        $options[$value2] = $std;
                        echo '<textarea class="regular-text txtArea' . $field_class . ' '. $class2 . '" placeholder="' . $std . '" name="'. ('theme_options['. $id.'-'.$key2 .']') .'" rows="5" cols="30">' . format_for_editor( $options[$value2] ) . '</textarea>';
                     }
                     echo '<div class="langg">'.__('You Are Editing in Language.', 'octa').'( <strong>'.$lang2.'</strong> )</div>';
                 } else {
                    echo '<textarea class="regular-text txtArea' . $field_class . '" id="' . $id . '" name="theme_options[' . $id . ']" placeholder="' . $std . '" rows="5" cols="30">' . format_for_editor( $options[$id] ) . '</textarea>'; 
                 }
                 echo '</div>';
                 break;
            
            case 'editor':                
                echo '<div class="wp-ed group" data-parent="'.$parent.'">';
                if ( class_exists( 'SitePress' ) && isset($this->settings[$id]['multilang']) ) {
                    $languages  = icl_get_languages();
                     $current    = ICL_LANGUAGE_CODE;
                     $lang       = ICL_LANGUAGE_NAME;
                     foreach ( $languages as $key => $value ) {
                        $class      = ( $key == $current ) ? '' : 'hidden';
                        $value_key  = ( ! empty( $options[$key] ) ) ? $options[$key] : '';
                        $value = $id.'-'.$key;
                        if ( ! isset( $options[$value] ) && $type != 'checkbox' )
                        $options[$value] = $std;
                        
                        $content = $options[$value];
                        $editor_id = $id.'-'.$key;
                        $editor_settings = array(
                            'textarea_name' => 'theme_options[' . $id.'-'.$key . ']',
                            'textarea_rows'=>20,
                            'tinymce' => FALSE
                        );
                        echo '<div class="'.$class.'">';
                        echo wp_editor( $content, $editor_id, $editor_settings );
                        echo '</div>';
                     }
                    echo '<div class="langg">'.__('You Are Editing in Language.', 'octa').'( <strong>'.$lang.'</strong> )</div>';
                }else {
                    $content = $options[$id];
                    $editor_id = $id;
                    $editor_settings = array(
                        'textarea_name' => 'theme_options[' . $id . ']',
                        'textarea_rows'=>20,
                        'tinymce' => FALSE
                    ); 
                    echo wp_editor( $content, $editor_id, $editor_settings );
                }
                
                echo '</div>';
                break;
                                         
            case 'color':
                echo '<div class="group" data-parent="'.$parent.'">';
                    echo '<input class="color-chooser'. $field_class .'" type="text"  data-alpha="true" id="' . $id . '" name="theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '"  data-default-color="' . $defcolor . '" />';
                echo '</div>';
                break;    
                 
            case 'file':
                echo '<div class="group ' . $field_class . '" data-parent="'.$parent.'">';
                    echo '<input class="dep-field regular-text custom-up'. $field_class .'" id="' . $id . '" type="text" name="theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
                    echo '<a class="upload_image_button" href="#">'.__('Upload', 'octa').'</a>';
                    echo '<div class="clear-img"><img class="logo-im" alt="" src="'. esc_attr( $options[$id] ) .'" /><a class="remove-img" href="#" title="'.__('Remove Image', 'octa').'"></a></div>';
                echo '</div>';
                break;
            
            case 'upload':
                echo '<div class="group" data-parent="'.$parent.'">';
                    echo '<input class="dep-field regular-text custom-up'. $field_class .'" id="' . $id . '" type="text" name="theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
                    echo '<a href="#" class="remove-val"></a><a class="upload_button" href="#">'.__('Upload', 'octa').'</a>';
                echo '</div>';
                break;
                
            case 'arrayItems':
                echo '<div class="group" data-parent="'.$parent.'">'; 
                    echo '<div class="patterns-div' . $field_class . '"><input class="hidden' . $field_class . '" id="' . $id . '" type="text" name="theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
                        foreach ( $items as $value => $label )
                        echo '<img src="' . esc_attr( $value ) . '" class="pattern-img" />';
                    echo '</div>';
                echo '</div>';
                break;
                
            case 'arraySelect':
                echo '<div class="dep-field group arraySelect" data-parent="'.$parent.'">'; 
                    echo '<div class="' . $field_class . '">';
                        echo '<select class="dep-field hiddenSelect hidden' . $field_class . '" id="' . esc_attr( $id ) . '" name="theme_options[' . $id . ']">';
                            foreach ( $choices as $value => $label )
                                echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . $label . '</option>';
                        echo '</select>';    
                            
                        foreach ( $choices as $value => $label )
                        echo '<div class="sel_block" data-hover="'.$value.'"><img src="' . esc_attr( $label ) . '" data-value="'.$value.'" class="select-img" /></div>';
                    echo '</div>';
                echo '</div>';
                break;
                
            case 'icon':
                echo '<div class="group" data-parent="'.$parent.'">';
                    echo '<i class="ico"></i><a class="button button-primary btn_icon" href="#"><i class="fa fa-plus-square"></i>'.__('Add Icon', 'octa').'</a>';
                    echo '<input type="hidden" name="theme_options[' . $id . ']" id="' . $id . '" class="icon_cust '.$field_class.'" value="' . esc_attr( $options[$id] ) . '" />';
                    echo '<a class="button icon-remove" title="'.__('Remove Icon', 'octa').'"><i class="fa fa-times"></i></a>';
                echo '</div>';
                break;
            
            case 'addbox':
                echo '<div class="group" data-parent="'.$parent.'">';
                    echo '<div class="add_btn"><a class="button button-default add_box" href="#"><i class="fa fa-plus-square"></i>'.__('Add New', 'octa').'</a>';
                    echo '<input class="hid_txt' . $field_class . '" type="hidden" id="' .$id. '" name="theme_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" /></div>';
                echo '</div>';
                break;
                
            case 'addmodule':
                echo '<div class="group" data-parent="'.$parent.'">';
                    echo '<div class="add_mod"><a class="button button-default add_module" href="#"><i class="fa fa-plus-square"></i>'.__('Add Module', 'octa').'</a>';
                    echo '<input class="hid_txt' . $field_class . '" type="hidden" id="' .$id. '" name="theme_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" /></div>';
                echo '</div>';
                break;
            
            case 'import_data':
                echo '<div class="group ' . $field_class . '" data-parent="'.$parent.'">';
                    echo '<a class="button button-primary btn-success import_btn" href="#">'.__('Import Demo Data', 'octa').'</a>';
                    echo '<span class="loader"></span><div class="import_message"></div><div class="noticeImp">'.__('This can take several minutes, please wait and do not worry!', 'octa').'</div>';
                    echo '<div class="attachments"><input type="checkbox" name="' . $id . '" id="' . $id . '" value="1"' . checked( $options[$id], 1, false ) .'/>  '.__('Download and import file attachments!', 'octa').'</div>';
                echo '</div>';
                break;
                        
        }
    }
    
    public function it_get_options() {
        global $wpdb;
        return $wpdb->get_results("SELECT option_name, option_value FROM {$wpdb->options} WHERE option_name = 'theme_options'");
    }
    
    public function get_option() {
        require_once( get_parent_theme_file_path('it-framework/config/it-framework-config.php') );
    }        
    
    public function it_settings_sections( $page ) {
        global $wp_settings_sections, $wp_settings_fields;

        if ( ! isset( $wp_settings_sections[$page] ) )
            return;
            
        foreach ( (array) $wp_settings_sections[$page] as $section ) {

            if ( $section['callback'] )
                call_user_func( $section['callback'], $section );

            if ( ! isset( $wp_settings_fields ) || !isset( $wp_settings_fields[$page] ) || !isset( $wp_settings_fields[$page][$section['id']] ) )
                continue;
            echo '<div class="boo-tabs-panel" id="'.$section['id'].'">';
                if ( $section['title'] ) echo "<h3>{$section['title']}</h3>";
                $this->it_settings_fields( $page, $section['id'] );
            echo '</div>';
        }         
    }

    public function it_settings_fields($page, $section) {
        global $wp_settings_fields;
        
        if ( ! isset( $wp_settings_fields[$page][$section] ) )
            return;
        
        foreach ( (array) $wp_settings_fields[$page][$section] as $field ) {
            
            $grp = $field['args']['group'];
            $parnt = $field['args']['parent'];
            $dd = $field['args']['id'];
            $typ = $field['args']['type'];   
            $dependency = $field['args']['dependency'];  
            if ( empty($field['args']['desc']) ) {
                $mid = ' middle';
            } else {
                $mid = '';
            }          
            // dependencies.
            $cm = $dep_element = $dep_value = $em_arr = $vll = $ell = '';  
            foreach ( $dependency as $key => $value ) {
                
                $dp = $dependency['element'];
                $v = isset( $dependency['value'] ) ? $dependency['value'] : '';
                $em = isset( $dependency['not_empty'] ) ? $dependency['not_empty'] : '';
                
                if( is_array($dp)){
                    $ard = array();
                    foreach ($dp as $el){
                        $ard[] .= $cm . $el;
                        $cm = ',';
                    }
                    $dep_element = " data-dep='".trim(implode('', $ard), ',')."'";
                }else{
                    $dep_element = " data-dep='".$dp."'";
                }
                
                if( is_array($v)){
                    $ar = array();
                    foreach ($v as $vl){
                        $ar[] = $cm . $vl;
                        $cm = ',';
                    }
                    $dep_value = " data-vl='".trim(implode('', $ar), ',')."'";
                }else{
                    $dep_value = " data-vl='".$v."'";
                }
                
                if ( $em ){
                    $dep_element = " data-dep='".$dp."'";
                    if($em == true){
                       $dep_value = " data-vl='1'"; 
                    }else{
                        $dep_value = " data-vl=''";
                    }
                    
                }           
            }
            
            if ($typ != 'heading'){
                
                if ( $parnt ) {
                    echo '<div class="it-sec sub-section '.$parnt.'" data-id="'.$dd.'"'.$dep_element.$dep_value.'>';
                } else{
                    echo '<div class="it-sec section" data-id="'.$dd.'"'.$dep_element.$dep_value.'>';
                }
                
                if ( !empty($field['title']) ) {
                    echo '<div class="lbl'.$mid.'"><label class="opt-lbl" for="' . esc_attr( $field['args']['label_for'] ) . '">' . $field['title'] . '</label>';
                    if ( !empty($field['args']['desc']) ) {
                        echo '<span class="description">' . $field['args']['desc'] . '</span>';
                    }
                    echo '</div>';
                }    
            }
            
            call_user_func($field['callback'], $field['args']);
            if ($typ != 'heading') echo '</div>';
            
        } 
    }
    
    public function validate_settings( $input ) { 
        $options = get_option( 'theme_options' );
        
        if ( isset( $_POST['reset'] ) ) {
            return $this->get_default_values();
        }else{
            return $input;
        }
        
        $clean = array();
        
        
        foreach ( $options as $option ) {

            if ( ! isset( $option['id'] ) ) {
                continue;
            }

            if ( ! isset( $option['type'] ) ) {
                continue;
            }

            $id = preg_replace( '/[^a-zA-Z0-9._\-]/', '', strtolower( $option['id'] ) );

            // Set checkbox to false if it wasn't sent in the $_POST
            if ( 'checkbox' == $option['type'] && ! isset( $input[$id] ) ) {
                $input[$id] = false;
            }

            // Set each item in the multicheck to false if it wasn't sent in the $_POST
            if ( 'multicheck' == $option['type'] && ! isset( $input[$id] ) ) {
                foreach ( $option['options'] as $key => $value ) {
                    $input[$id][$key] = false;
                }
            }

            // For a value to be submitted to database it must pass through a sanitization filter
            if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
                $clean[$id] = apply_filters( 'of_sanitize_' . $option['type'], $input[$id], $option );
            }
        }

        // Hook to run after validation
        do_action( 'optionsframework_after_validate', $clean );

        return $clean; 
    }
    
    public function get_default_values() {
        $output = array();
        foreach ( (array) $this->settings as $option ) {
            if ( ! isset( $option['id'] ) ) {
                continue;
            }
            if ( ! isset( $option['std'] ) ) {
                continue;
            }
            if ( ! isset( $option['type'] ) ) {
                continue;
            }
            if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
                $output[$option['id']] = apply_filters( 'of_sanitize_' . $option['type'], $option['std'], $option );
            }
        }
        return $output;
    } 
    
    public function export_settings() {
        if (isset($_GET['action']) && ($_GET['action'] == 'download')) {
            header("Cache-Control: public, must-revalidate");
            header("Pragma: hack");
            header("Content-Type: text/plain");
            header('Content-Disposition: attachment; filename="theme-options-'.date("d-m-Y").'.txt"');
            echo serialize($this->it_get_options());
            die();
        }
    }
    
    public function enq_scripts() {
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('media-upload');
        wp_enqueue_media();
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('jquery-ui-datepicker'); 
        wp_enqueue_script('it-assets', FRAMEWORK_ASSETS_URI . '/js/assets.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('it-framework', FRAMEWORK_ASSETS_URI . '/js/framework.js', array('jquery'), '1.0.0', true);
        
        wp_enqueue_style('it-assets', FRAMEWORK_ASSETS_URI.'/css/assets.css');     
        wp_enqueue_style('it-framework', FRAMEWORK_ASSETS_URI . '/css/framework.css' );
        wp_enqueue_style('wp-color-picker');
    }
    
}
$theme_options = new ITFramework();