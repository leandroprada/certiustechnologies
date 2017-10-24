<?php

class OCTA_Base {

    public $oc_sections;

    public function __construct() {
        
        ob_start();
        
        $this->oc_sections['oc_naming']        = '<i class="dashicons dashicons-megaphone"></i>'.__( 'Naming' , PLUGIN_SLUG );
        $this->oc_sections['oc_source']        = '<i class="dashicons dashicons-admin-network"></i>'.__( 'Source' , PLUGIN_SLUG );
        $this->oc_sections['oc_gnrlsetting']   = '<i class="dashicons dashicons-admin-plugins"></i>'.__( 'Layout' , PLUGIN_SLUG );
        $this->oc_sections['oc_skins']         = '<i class="dashicons dashicons-admin-appearance"></i>'.__( 'Skins & Styles' , PLUGIN_SLUG );
        $this->oc_sections['oc_nav']           = '<i class="dashicons dashicons-admin-generic"></i>'.__( 'Nav Filter' , PLUGIN_SLUG );
        //$this->oc_sections['it_css']           = '<i class="dashicons dashicons-editor-code"></i>Custom Css';

        add_action('init', array($this, 'oc_portfolio_post'));
        add_action('init', array($this, 'oc_create_taxs'));

        add_action('admin_menu', array($this, 'oc_admin_menu'));
        add_action('admin_menu', array($this, 'oc_admin_submenu'));

        add_action('admin_enqueue_scripts', array(&$this, 'oc_admin_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'oc_front_styles'), 56);
        
        add_shortcode( PLUGIN_PFX , array($this, 'register_shortcode') );
        
    }

    public function oc_create_settings($id, $args = array()) {
        
        echo '<ul class="oc_tabs">';
            foreach ($this->oc_sections as $section_slug => $section) {
                echo '<li><a href="#' . $section_slug . '">' . $section . '</a></li>';
            }
        echo '</ul>';
        
        echo '<div class="oc_tab_content">';
            self::oc_all_sections($id);
        echo '</div>';
        
    }

    public function oc_all_sections($id) {
        
        foreach ($this->oc_sections as $section_slug => $section) {
            $output = '<div class="tab-pane';
                if ($section_slug == 'oc_naming') {
                    $output.=' active';
                }
                $output.=' "id="' . $section_slug . '">';
                echo $output;
                $this->oc_diplay_section($id, $section_slug);
            echo '</div>';
        }
        
    }

    public function oc_diplay_section($id, $section_slug) {
        
        $configs        = new OCTA_Config();
        $base           = new OCTA_Tables();
        $fields         = new OCTA_Field();
        $defult_args    = $base->_defult_args();
        $cnfg           = $configs->configArray();
        
        
        foreach ($cnfg as $sub) {
            
            $section = isset($sub['section']) ? $sub['section'] : $defult_args['section'];

            if ($section == $section_slug) {
                $config_data = self::oc_config_names($sub, $defult_args);
                $this->wrapperStart($id, $section_slug, $config_data);
                    $fields->oc_display_field($id, $section_slug, $config_data);
                $this->wrapperEnd($id, $section_slug, $config_data);
                
            }
        }
        
    }
    
    public function wrapperStart ($id, $section_slug, $config_data){
        
        extract($config_data);
        
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
        
        if($type != 'hidden'){
            $output = '<div class="item form-group"'.$dep_element.$dep_value.'>';
                $output .= '<div class="lbl"><label class="opt-lbl">' . $title . '</label><small class="description">' . $description . '</small></div>';
                    $output .= '<div class="control-input">'; 
            echo $output;   
        }
        
    }
    
    public function wrapperEnd ($id, $section_slug, $config_data){
        
        extract($config_data);
        
        if($type != 'hidden'){    
                $output = '</div>';
            $output .= '</div>';
            echo $output; 
        }
        
    }

    public function oc_config_names($sub, $defult_args) {
        
        $config_data = $config_keys = array();

        foreach ($sub as $key => $value) {
            $config_data[$key] = $value;
            $config_keys[$key] = $key;
        }
        
        foreach ($defult_args as $defult_key => $defult_value) {
            if (in_array($defult_key, $config_keys)) {}
            else {
                $config_data[$defult_key] = $defult_value;
            }
        }
        
        return $config_data;
        
    }

    public function oc_admin_menu() {
        
        add_menu_page( PLUGIN_NAME, PLUGIN_NAME, 'administrator', PLUGIN_PFX, array($this, 'oc_file_path'), PLUGIN_URI.'/assets/admin/images/ico.png' );
        
    }

    public function oc_admin_submenu() {
        
        $insDB = new OCTA_Tables();
        add_submenu_page(PLUGIN_PFX, __('Import/Export Grids', PLUGIN_SLUG), __('Import/Export', PLUGIN_SLUG), 'manage_options', PLUGIN_PFX.'-exp', array($insDB, 'oc_import_export'));
        
    }

    public function oc_file_path() {
        
        $screen = get_current_screen();
        if (strpos($screen->base, PLUGIN_PFX ) !== false) {
            include( PLUGIN_DIR . '/inc/form.php' );
        }
        
    }

    public function oc_portfolio_post() {

        $labels = array(
            'name' => PLUGIN_NAME.' Posts',
            'singular_name' => PLUGIN_NAME.' Posts',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Post',
            'edit' => 'Edit',
            'edit_item' => 'Edit Post',
            'new_item' => 'New Post',
            'view' => 'View',
            'view_item' => 'View Post',
            'search_items' => 'Search Post',
            'not_found' => 'No Posts found',
            'not_found_in_trash' => 'No Post found in Trash',
            'parent' => 'Parent Post'
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'rewrite' => array('slug' => 'octapost'),
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'revisions',
            ),
            'exclude_from_search' => false,
        );

        register_post_type('octapost', $args);
    }

    public function oc_create_taxs() {

        register_taxonomy('oc-tags', array('octapost'), array(
            'labels' => array(
                'name' => 'Tags'
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            "hierarchical" => false,
            "singular_label" => "Tag",
            'rewrite' => array('slug' => 'oc-tags', 'with_front' => false)
        ));

        register_taxonomy('oc-categories', array('octapost'), array(
            'labels' => array(
                'name' => 'Categories'
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            "hierarchical" => true,
            "singular_label" => "Category",
            'rewrite' => array('slug' => 'oc-categories', 'with_front' => false)
        ));
    }

    public function pluginUninstall() {
        
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS " . PLUGIN_TBL);
        
    }

    function myStartSession() {
       
        if (!session_id()) {
            session_start();
        }
        
    }
    
    public function register_shortcode($atts, $content = null){
        
        extract(shortcode_atts(array(
            'alias' => '',
        ), $atts));
        
        return OCTA_Shortcode($alias);
                
    }

    public function oc_admin_scripts() {
        
        wp_enqueue_style(PLUGIN_PFX.'-admin-css', PLUGIN_URI . 'assets/admin/css/admin.css');
        wp_enqueue_script(PLUGIN_PFX.'-assets-js', PLUGIN_URI . 'assets/admin/js/assets.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script(PLUGIN_PFX.'-script-js', PLUGIN_URI . 'assets/admin/js/script.js', array('jquery'), '1.0.0', true);
        
    }

    public function oc_front_styles() {
        
        wp_enqueue_style( PLUGIN_PFX, PLUGIN_URI . 'assets/front/css/style.css');
        wp_enqueue_script( PLUGIN_PFX.'_assets', PLUGIN_URI . 'assets/front/js/assets.js', array('jquery') );
        wp_enqueue_script( PLUGIN_PFX.'_script', PLUGIN_URI . 'assets/front/js/script.js', array('jquery') );
        wp_add_inline_style( PLUGIN_PFX, $this->oc_colors() );
        
    }
    
    public function oc_colors(){
        
        $tcolor         = get_option('theme_options');
        $themecolor     = ($tcolor['skin_color'] != '') ? $tcolor['skin_color'] : '#dd2f42';
        $rgbacolor      = hex2RGB($themecolor, true, ',');
        
        $CSS = "
        .octa_grid.gemini .portfolio-item h4 a,.filter-by.style1 li.selected a,.octa_grid.solo .portfolio-item h4 a,.octa_grid.sublime .port-captions h4 a,.octa_grid.focus .port-captions p.description a,.filter-by.style5 ul li.selected a{
            color: {$themecolor};
        }
        
        .octa_grid.onair .port-captions p,.filter-by.style2 ul li.selected a span,.filter-by.style3 ul li.selected a span,.filter-by.style4 ul li.selected a span,.octa_grid.onair .port-captions p,.octa_grid.rotato .port-captions,
        .octa_grid.mass .port-captions,.octa_grid.mass .icon-links a,.octa_grid.marbele .port-captions:before,.octa_grid.astro .port-captions{
            background-color: {$themecolor};
            color: #fff;
        }
        
        .octa_grid.mass .port-img:before,.filter-by.style1 li.selected a:before,.octa_grid.sublime .port-captions,.octa_grid.resort .portfolio-item:hover .port-container{
            border-color: {$themecolor};
        }
        
        .octa_grid.ivy .icon-links a:after{
            border-color: {$themecolor} transparent transparent transparent;
        }
        
        .octa_grid.ivy .icon-links a.oc_zoom:after{
            border-color: transparent transparent {$themecolor} transparent;
        }
        
        .octa_grid.kara .port-captions:after/*,.octa_grid:not(.octa_grid.kara) .portfolio-item .port-img:before*/{
            background-color:rgba({$rgbacolor},0.75);
        }
        
        .filter-by.style2,.filter-by.style3 ul{
            border-bottom-color: {$themecolor};
        }";
        
        $CSS = str_replace(': ', ':', str_replace(';}', '}', str_replace('; ',';',str_replace(' }','}',str_replace(' {', '{', str_replace('{ ','{',str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),"",preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!','',$CSS))))))));
        
        return $CSS;
        
    }
    

}

new OCTA_Base();