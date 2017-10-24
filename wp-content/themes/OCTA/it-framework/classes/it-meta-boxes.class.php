<?php 
/**
 *
 * IT-RAYS Framework
 *
 * @author IT-RAYS
 * @license Commercial License
 * @link http://www.it-rays.net
 * @copyright 2016 IT-RAYS Themes
 * @package ITFramework
 * @version 1.0.0
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
 
class ITMetaBoxes {
      
    public $it_meta_box;
    public $fields;
    public $sections;               
    public $field_types = array();

    public function __construct ( $meta_box ) {
          
        $this->it_meta_box = $meta_box;
        $this->fields = $this->it_meta_box['fields'];
        
        $this->sections['it_topbar']               = '<i class="fa fa-bars"></i>Top Bar';        
        $this->sections['it_header']               = '<i class="fa fa-umbrella"></i>Header';
        $this->sections['it_pagetitles']           = '<i class="fa fa-cog"></i>Page Title';
        $this->sections['it_footer']               = '<i class="fa fa-sliders"></i>Footer';

        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'save_post', array( $this, 'save_meta_boxes' ) );

    }

    public function add_meta_boxes( ) {
        
        $post_types = array('post','page','product','octapost','forum','topic');
        
        foreach ( $post_types as $post_type ) {
            add_meta_box('main_layout', __('Main Layout Style', 'octa'), array( $this,'main_layout_callback'), $post_type, 'side');
            add_meta_box( $this->it_meta_box["id"], $this->it_meta_box["title"], array( $this, 'show_meta_boxes' ),$post_type, 'normal' );
            add_meta_box('custom_sidebar', __('Page Layout Mode', 'octa'), array( $this,'custom_sidebar_callback'), $post_type, 'side');
            add_meta_box('select_menu', __('Select Menu', 'octa'), array( $this,'select_menu_callback'), $post_type, 'side');
        }
        
    }

    public function show_meta_boxes() {
        
        echo '<span class="hidden page_settings_title">'.esc_html__('Custom Page Settings', 'octa').'</span>';
        wp_nonce_field( basename(__FILE__), 'it_meta_box_nonce' );
        
        echo '<div class="theme-options">';
            echo '<div class="boo-tabs">';
                locate_template ('it-framework/includes/fields/icons/icons.php', true );
                echo '<ul class="boo-tabs-nav">'; // start .boo-tabs-nav
                    foreach ( $this->sections as $section_slug => $section ){
                        echo '<li><a href="#' . $section_slug . '">' . $section . '</a></li>';
                    }
                echo '</ul>'; // end .boo-tabs-nav
                
                echo '<div class="boo_tabs_wrap">'; // start .boo_tabs_wrap
                    foreach ( $this->sections as $section_slug => $section ) {
                        echo '<div class="boo-tabs-panel" id="'.$section_slug.'">';
                            $this->it_sets_field($section_slug);
                        echo '</div>';
                    }
                echo '</div>'; // end .boo_tabs_wrap
            echo '</div>';
        echo '</div>';
          
  }
  
    public function it_sets_field ( $section_slug ){
        global $post;
        $section = $section_slug;
        foreach ( $this->fields as $field ) {
            $meta = get_post_meta( $post->ID, $field['id'], true );
            $meta = ( $meta !== '' ) ? $meta : $field['std'];
            if( $field['section'] == $section) call_user_func ( array( $this, 'type_' . $field['type'] ), $field, $meta );        
        }
    }
  
    public function wrapper_start( $field, $meta) {
        
        $grp = isset($field['group']) ? $field['group'] : '';
        $parnt = isset($field['parent']) ? $field['parent'] : '';
        $dd =  isset($field['id']) ? $field['id'] : '';
        $typ = isset($field['type']) ? $field['type'] : '';  
        $dependency = isset($field['dependency']) ? $field['dependency'] : ''; 
        if ( empty($field['desc']) ) {
            $mid = ' middle';
        } else {
            $mid = '';
        }          
        // dependencies.
        $cm = $dep_element = $dep_value = $em_arr = $vll = $ell = '';  
        if($dependency){
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
        }
        
        echo "<div class='it-sec section' data-id='{$field["id"]}'{$dep_element}{$dep_value}>";
        
        if ( isset($field['name']) && $field['name'] != '' ) {
          echo "<div class='lbl".$mid."'>";
            echo "<label for='{$field['id']}' class='opt-lbl'>{$field['name']}</label>";
            if ( isset($field['desc']) && $field['desc'] != '' )
                echo "<div class='description'>{$field['desc']}</div>";
          echo "</div>";
        }
        
    }

    public function wrapper_end( $field, $meta) {
        echo "</div>";
    }
    
    public function type_text( $field, $meta) {  
        $this->wrapper_start( $field, $meta );
            echo "<div class='group'><input type='text' id='".$field["id"]."' class='dep-field regular-text".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='".$field['id']."' value='".$meta."' /></div>"; 
        $this->wrapper_end( $field, $meta );
    }
    
    public function type_number( $field, $meta) {  
        $this->wrapper_start( $field, $meta );
            echo "<div class='group'><input type='number' id='".$field["id"]."' class='regular-text num-txt".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='".$field['id']."' value='".$meta."' /></div>"; 
        $this->wrapper_end( $field, $meta );
    }
    
    public function type_twonumber( $field, $meta) {  
        $this->wrapper_start( $field, $meta );
            echo "<div class='group'>";
                $firstVal = explode('|', esc_attr( $meta ));
                $lastVal = substr(esc_attr( $meta ), strpos(esc_attr( $meta ), "|") + 1);
                echo '<b class="inp_lbl main-color"><i class="fa fa-long-arrow-up"></i></b><input class="regular-text num-txt no-slider firstVL" type="number" placeholder="' . esc_attr($firstVal[0]) . '" value="' . esc_attr($firstVal[0]) . '" />';
                echo '<b class="inp_lbl last main-color"><i class="fa fa-long-arrow-down"></i></b><input class="regular-text num-txt no-slider lastVL" type="number" placeholder="' . esc_attr($lastVal) . '" value="' . esc_attr($lastVal) . '" />';
                echo '<input class="hid_two_num' . ( isset($field['class'])? ' ' . $field['class'] : '' ) . '" type="hidden" id="' . esc_attr($field["id"]) . '" name="'.esc_attr($field['id']).'" placeholder="' . esc_attr($std) . '" value="' . esc_attr($meta) . '" />';
            
            echo "</div>"; 
        $this->wrapper_end( $field, $meta );
    }

    public function type_select( $field, $meta ) {

        if ( ! is_array( $meta ) ) 
          $meta = (array) $meta;
          
        $this->wrapper_start( $field, $meta );
          echo "<div class='group'><select id='".esc_attr($field["id"])."' class='dep-field select".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='".esc_attr($field['id'])."'>";
            foreach ( $field['options'] as $key => $value ) {
            echo "<option value='".esc_attr($key)."'" . selected( in_array( $key, $meta ), true, false ) . ">".$value."</option>";
          }
          echo "</select></div>";
        $this->wrapper_end( $field, $meta );

    }

    public function type_radio( $field, $meta ) {

        if ( ! is_array( $meta ) )
          $meta = (array) $meta;
          
        $this->wrapper_start( $field, $meta );
          echo "<div class='group'>";
            foreach ( $field['options'] as $key => $value ) {
            echo "<input type='radio' id='".$field["id"]."' class='radio".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='".$field['id']."' value='".$key."'" . checked( in_array( $key, $meta ), true, false ) . " /> <span class='at-radio-label'>{$value}</span>";
          }
          echo "</div>";
        $this->wrapper_end( $field, $meta );
    }

    public function type_checkbox( $field, $meta ) {

        $this->wrapper_start($field, $meta);
        echo "<div class='group'><input type='hidden' id='".$field["id"]."' class='dep-field checktxt".( isset($field['class'])? ' ' . $field['class'] : '' )."' value='".$meta."' name='".$field['id']."' /><span class='it_bx custom-checkbox'><span class='switcher'></span></span></div>";
        $this->wrapper_end( $field, $meta );
      
    }

    public function type_file( $field, $meta ) {
        $this->wrapper_start( $field, $meta );

        $data_type = isset($field["data-type"]) ? ( $field['data-type'] ) : '';
        
        if ( $data_type == 'video'){
            
            echo "<div class='group upload_video ".$field["id"]."'><input type='text' id='".$field["id"]."' class='custom-up regular-text".( isset($field['class'])? ' ' . $field['class'] : '' )."'  name='".$field['id']."' value='".$meta."' />
            <a href='#' class='remove-val'></a><a href='#' class='upload_button'>".__('Upload', 'octa')."</a></div>";
            
        }else{
            
            echo "<div class='group'><input type='text' id='".$field["id"]."' class='dep-field custom-up regular-text".( isset($field['class'])? ' ' . $field['class'] : '' )."'  name='".$field['id']."' value='".$meta."' />
            <a href='#' class='upload_image_button'>".__('Upload', 'octa')."</a>
            <div class='clear-img'><img class='logo-im' alt='' src='".$meta."' /><a class='remove-img' href='#' title='".__('Remove Image', 'octa')."'></a></div></div>";
             
        }
        
        $this->wrapper_end( $field, $meta );
    }

    public function type_color( $field, $meta ) {
          
        $this->wrapper_start( $field, $meta );
        
            echo "<div class='group'><input type='text' id='".$field['id']."' data-alpha='true' class='color-chooser".(isset($field['class'])? " {$field['class']}": "")."' name='".$field['id']."' size='8' value='".$meta."' /></div>";  

        $this->wrapper_end($field, $meta);

    }
    
    public function type_icon( $field, $meta ) {
        $this->wrapper_start( $field, $meta );
        echo "<div class='group'><i class='ico'></i>
        <a class='button button-primary btn_icon' href='#'><i class='fa fa-plus-square'></i>".__('Add Icon', 'octa')."</a>
        <input type='hidden' name='".$field['id']."' id='".$field['id']."' class='icon_cust ".( isset($field['class'])? ' ' . $field['class'] : '' )."' value='".$meta."' />
        <a class='button icon-remove' title='".__('Remove Icon', 'octa')."'><i class='fa fa-times'></i></a></div>";
        $this->wrapper_end( $field, $meta );
    } 
    
    public function it_textbox( $id, $args ){
        $new_field = array('type' => 'text','id'=> $id,'std' => '','desc' => '','name' => '');
        $new_field = array_merge($new_field, $args);
        $this->fields[] = $new_field;
    }
    
    public function it_numberbox( $id, $args ){
        $new_field = array('type' => 'number','id'=> $id,'std' => '','desc' => '','name' => '');
        $new_field = array_merge($new_field, $args);
        $this->fields[] = $new_field;
    }
    
    public function it_twonumber( $id, $args ){
        $new_field = array('type' => 'twonumber','id'=> $id,'std' => '','desc' => '','name' => '');
        $new_field = array_merge($new_field, $args);
        $this->fields[] = $new_field;
    }
    
    public function it_checkbox( $id, $args ){
        $new_field = array('type' => 'checkbox','id'=> $id,'std' => '','desc' => '','name' => '');
        $new_field = array_merge($new_field, $args);
        $this->fields[] = $new_field;
    }

    public function it_select( $id, $options, $args ){
        $new_field = array('type' => 'select','id'=> $id,'std' => array(),'desc' => '','name' => '','options' => $options);
        $new_field = array_merge($new_field, $args);
        $this->fields[] = $new_field;
    }

    public function it_radio( $id, $options, $args ){
        $new_field = array('type' => 'radio','id'=> $id,'std' => array(),'desc' => '','name' => '','options' => $options);
        $new_field = array_merge($new_field, $args);
        $this->fields[] = $new_field;
    }

    public function it_color( $id, $args ){
        $new_field = array('type' => 'color','id'=> $id,'std' => '','desc' => '','name' => '');
        $new_field = array_merge($new_field, $args);
        $this->fields[] = $new_field;
    }

    public function it_uploadfile( $id, $args ){
        $new_field = array('type' => 'file','id'=> $id,'std' => '','desc' => '','name' => '');
        $new_field = array_merge($new_field, $args);
        $this->fields[] = $new_field;
    }
    
    public function it_icon( $id, $args ){
        $new_field = array('type' => 'icon','id'=> $id,'std' => '','desc' => '','name' => '');
        $new_field = array_merge($new_field, $args);
        $this->fields[] = $new_field;
    }
    
    public function custom_sidebar_callback( $post ){
        global $wp_registered_sidebars;
        $custom = get_post_custom($post->ID);
        $post_type = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_GET['post']) ? get_post_type($_GET['post']) : null );
        if ( 'page' == $post_type ) {
            $layouts = array(
                'wide' => '100% Width',
                'sidebar-left' => 'Left SideBar',
                'sidebar-right' => 'Right SideBar',
                'theme' => 'Theme Default Settings',
            );
            $styles = array(
                'default' => 'Default',
                'blocks' => 'Blocks',
                'minimal' => 'Minimal',
            );
        }else{
            $layouts = array(
                'sidebar-right' => 'Right SideBar',
                'sidebar-left' => 'Left SideBar',
                'full_width' => 'Full Width',
                'wide' => '100% Width',
                'theme' => 'Theme Default Settings',
            );
        }
        $page_layout='';
        if(isset($custom['page_layout'])){
            $page_layout = $custom['page_layout'][0];
        }else{
            if ( 'page' == $post_type ) {
                $page_layout = "full_width";
            }
        }  
        if(isset($custom['custom_sidebar'])){
            $val = $custom['custom_sidebar'][0];
        }else{
            $val = "default";
        }
        if(isset($custom['sidebar_style'])){
            $vald = $custom['sidebar_style'][0];
        }else{
            $vald = "theme";
        }
        wp_nonce_field( basename( __FILE__ ), 'custom_sidebar_nonce' );
        wp_nonce_field( basename( __FILE__ ), 'sidebar_style_nonce' );
        
        $output = '<p class="sidebar_imgs">';
        $output .= "<input type='radio' name='page_layout'";
        if ( 'page' == $post_type ) {
            if($page_layout == "full_width")
                $output .= " checked='checked'";
            $output .= " class='radio full_width' data-src='".FRAMEWORK_ASSETS_URI . '/images/full_width.png'."' value='full_width' />";
        }
        foreach($layouts as $layout => $assigned){
            $output .= "<input type='radio' name='page_layout'";
            if($layout == $page_layout)
                $output .= " checked='checked'";
            $output .= " class='radio ".$layout."' data-src='".FRAMEWORK_ASSETS_URI."/images/".$layout.".png' value='".$layout."' />";
        }
        $output .= "</p>";

        $output .= "<p class='custom_side'><span class='left-text'>".__('Choose sidebar:', 'octa')."</span><select name='custom_sidebar'>";
        $output .= "<option";
            if($val == "default")
                $output .= " selected='selected'";
                $output .= " value='default'>".__('default', 'octa')."</option>";
        foreach($wp_registered_sidebars as $sidebar_id => $sidebar){
            $output .= "<option";
            if($sidebar_id == $val)
                $output .= " selected='selected'";
            $output .= " value='".$sidebar_id."'>".$sidebar['name']."</option>";
        }
        $output .= "</select>";
        if ( 'page' == $post_type ) {
            $output .= "<br /><br /><span class='left-text'>".__('Sidebar Style:', 'octa')."</span><select name='sidebar_style'>";
                $output .= "<option";
                if($vald == "theme")
                    $output .= " selected='selected'";
                    $output .= " value='theme'>".__('Inherit from theme options', 'octa')."</option>";
                foreach($styles as $style => $sty){
                    $output .= "<option";
                    if($style == $vald)
                        $output .= " selected='selected'";
                    $output .= " value='".$style."'>".$sty."</option>";
                }    
            $output .= "</select>";
        }
        $output .= "</p>";
        echo $output;    
    }
    
    public function Get_All_Wordpress_Menus(){
        return get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 
    }
    
    public function select_menu_callback( $post ){
        global $_wp_registered_nav_menus;
        $menus = get_registered_nav_menus();
        $custom = get_post_custom($post->ID);
        $post_type = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_GET['post']) ? get_post_type($_GET['post']) : null );
        wp_nonce_field( basename( __FILE__ ), 'select_menu_nonce' );
        $select_menu;
        if(isset($custom['select_menu'])){
            $val2 = $custom['select_menu'][0];
        }else{
            $val2 = "main-menu";
        }
        $output = "<p class='inside'><select name='select_menu'>";
        foreach($menus as $location => $description){
            $output .= "<option";
            if($location == $val2) {
                $output .= " selected='selected'";    
            }
            $output .= " value='".$location."'>".$description."</option>";
        }
        $output .= "</select></p>";
        echo $output;    
    }
    
    public function main_layout_callback( $post ){

        $custom = get_post_custom($post->ID);
        $post_type = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_GET['post']) ? get_post_type($_GET['post']) : null );
        wp_nonce_field( basename( __FILE__ ), 'main_layout_nonce' );
        $main_layout;
        $lays = array(
            'theme' => '-- Select Layout --',
            'wide' => 'Wide',
            'boxed' => 'Boxed',
        );
        if(isset($custom['main_layout'])){
            $val2 = $custom['main_layout'][0];
        }else{
            $val2 = "-- Select Layout --";
        }
        $output = "<p class=''><select name='main_layout'>";
        foreach($lays as $lay => $description)
        {
            $output .= "<option";
            if($lay == $val2)
                $output .= " selected='selected'";
            $output .= " value='".$lay."'>".$description."</option>";
        }
        $output .= "</select></p>";
        echo $output;    
    }    
      
    public function save_meta_boxes( $post_id ) {
        
        if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] ) || ( !current_user_can( 'edit_post', $post_id ) ) ) {
            return $post_id;
        }
        
        if ( empty($_POST['it_meta_box_nonce']) || ! wp_verify_nonce( $_POST['it_meta_box_nonce'], basename(__FILE__) ) ) return;
        if (empty($_POST['custom_sidebar_nonce']) || !wp_verify_nonce($_POST['custom_sidebar_nonce'], basename(__FILE__))) return;
        if (empty($_POST['sidebar_style_nonce']) || !wp_verify_nonce($_POST['sidebar_style_nonce'], basename(__FILE__))) return;
        if (empty($_POST['main_layout_nonce']) || !wp_verify_nonce($_POST['main_layout_nonce'], basename(__FILE__))) return;
        if (empty($_POST['select_menu_nonce']) || !wp_verify_nonce($_POST['select_menu_nonce'], basename(__FILE__))) return; 
        
        $fieldss = array(
            'custom_sidebar', 'custom_sidebar',
            'page_layout', 'page_layout',
            'select_menu', 'select_menu',
            'main_layout', 'main_layout',
            'sidebar_style', 'sidebar_style'
        );
        
        foreach ($fieldss as $item) {
            if ( isset($_POST[$item]) && !empty($_POST[$item]) ) {
                update_post_meta($post_id, $item, $_POST[$item]);
            }
        }
        
        foreach ( $this->fields as $field ) {
            $name = $field['id'];
            $type = $field['type'];
            $current_val = get_post_meta( $post_id, $name, true );
            $new_val = ( isset( $_POST[$name] ) ) ? $_POST[$name] : ( ( $field['std'] ) ? array() : '' );
            $save_func = 'save_field_' . $type;
            $this->save_field( $post_id, $field, $current_val, $new_val );
        }
        
    }
     
    public function save_field( $post_id, $field, $current_val, $new_val ) {
        $name = $field['id'];
        delete_post_meta( $post_id, $name );
        if ( $new_val === '' || $new_val === array() ) return;
        update_post_meta( $post_id, $name, $new_val );
    }  

}
