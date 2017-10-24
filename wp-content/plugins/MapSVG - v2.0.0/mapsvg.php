<?php
/**
 * @package Mapsvg WordPress Plugin
 * @version 2.0.0
 *
 * Please purchase Regular or Extended license before using MapSVG plugin.
 * MapSVG page on CodeCanyon: http://codecanyon.net/item/jquery-interactive-svg-map-plugin/1694201
 * Licenses: http://codecanyon.net/licenses/regular_extended
 */
/*
Plugin Name: MapSVG
Plugin URI: http://codecanyon.net/item/mapsvg-interactive-vector-maps/2547255
Description: Add interactive map to any page of your WordPress site.
Author: Roman S. Stepanov
Author URI: http://codecanyon.net/user/Yatek
Version: 2.0.0
*/ 

//error_reporting(E_ALL);
define('MAPSVG_DEBUG', false);

define('MAPSVG_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('MAPSVG_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
define('MAPSVG_MAPS_DIR', MAPSVG_PLUGIN_DIR . 'maps');
define('MAPSVG_MAPS_UPLOADS_DIR', MAPSVG_MAPS_DIR . '/user-uploads');
define('MAPSVG_MAPS_URL', MAPSVG_PLUGIN_URL . 'maps/');
define('MAPSVG_PINS_DIR', MAPSVG_PLUGIN_DIR . 'markers/');
define('MAPSVG_PINS_URL', MAPSVG_PLUGIN_URL . 'markers/');
define('MAPSVG_VERSION', '2.0.1');
define('MAPSVG_JQUERY_VERSION', '6.0.7');

$mapsvg_inline_script = '';
$mapsvg_page = 'index';


/**
 * including jQuery
 * normally you don't need this because jQuery is included by WP
 */
function add_jquery() {

        global $wp_scripts;

        $version = '1.7.2';
        
        if ( !is_admin() && ( version_compare($version, $wp_scripts -> registered['jquery'] -> ver) == 1 )) {
                wp_deregister_script('jquery');
                wp_register_script('jquery', MAPSVG_PLUGIN_URL . 'js/jquery-1.7.2.js', false, $version);
        }

        wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'add_jquery' );



/**
 * Add common JS & CSS
 */
function mapsvg_add_jscss_common(){

    wp_register_style('mapsvg', MAPSVG_PLUGIN_URL . 'css/mapsvg.css');
    wp_enqueue_style('mapsvg');        

    wp_register_script('jquery.mousewheel', MAPSVG_PLUGIN_URL . 'js/jquery.mousewheel.min.js',array('jquery'), '3.0.6');
    wp_enqueue_script('jquery.mousewheel', null, '3.0.6');

    if(MAPSVG_DEBUG)        
        wp_register_script('mapsvg', MAPSVG_PLUGIN_URL . 'js/mapsvg.js', array('jquery'), rand());
    else
        wp_register_script('mapsvg', MAPSVG_PLUGIN_URL . 'js/mapsvg.min.js', array('jquery'), MAPSVG_JQUERY_VERSION);
    
    wp_enqueue_script('mapsvg');

}
add_action('wp_enqueue_scripts', 'mapsvg_add_jscss_common');
//add_action('admin_enqueue_scripts', 'mapsvg_add_jscss_common');


/**
 * Add admin's JS & CSS
 */
function mapsvg_add_jscss_admin($hook_suffix){

    global $mapsvg_settings_page, $wp_version;

    // Load scripts only if we on mapSVG admin page
    if ( $mapsvg_settings_page != $hook_suffix )
        return;

    mapsvg_add_jscss_common();

    if(isset($_GET['page']) && $_GET['page']=='mapsvg-config'){

        wp_register_script('mapsvg.admin', MAPSVG_PLUGIN_URL . 'js/admin.js', array('jquery'), '3.0');
        wp_enqueue_script('mapsvg.admin');
        
        wp_register_script('bootstrap', MAPSVG_PLUGIN_URL . "js/bootstrap.min.js", null, '3.3.6');
        wp_enqueue_script('bootstrap');
    	wp_register_style('bootstrap', MAPSVG_PLUGIN_URL . "css/bootstrap.min.css", null, '3.3.6');
    	wp_enqueue_style('bootstrap');
    	wp_register_style('fontawesome', MAPSVG_PLUGIN_URL . "css/font-awesome.min.css", null, '4.4.0');
    	wp_enqueue_style('fontawesome');   
        
        wp_register_script('bootstrap-colorpicker', MAPSVG_PLUGIN_URL . 'js/bootstrap-colorpicker.min.js');
        wp_enqueue_script('bootstrap-colorpicker');
    	wp_register_style('bootstrap-colorpicker', MAPSVG_PLUGIN_URL . 'css/bootstrap-colorpicker.min.css');
        wp_enqueue_style('bootstrap-colorpicker');

        wp_register_script('jquery.message', MAPSVG_PLUGIN_URL . 'js/jquery.message.js', array('jquery'));
        wp_enqueue_script('jquery.message');
        
    	wp_register_style('jquery.message.css', MAPSVG_PLUGIN_URL . 'css/jquery.message.css');
    	wp_enqueue_style('jquery.message.css');
        
    	wp_register_style('main.css', MAPSVG_PLUGIN_URL . 'css/main.css');
    	wp_enqueue_style('main.css');


//        wp_register_script('select2', MAPSVG_PLUGIN_URL . 'js/select2.min.js', array('jquery'), '4.0');
        wp_enqueue_script('select2', MAPSVG_PLUGIN_URL . 'js/select2.min.js', array('jquery'), '4.0',true);
//        wp_enqueue_script('select2');
        wp_register_style('select2', MAPSVG_PLUGIN_URL . 'css/select2.min.css');
    	wp_enqueue_style('select2');

        wp_register_script('ionslider', MAPSVG_PLUGIN_URL . 'js/ion.rangeSlider.min.js', array('jquery'), '2.1.2');
        wp_enqueue_script('ionslider');
        wp_register_style('ionslider', MAPSVG_PLUGIN_URL . 'css/ion.rangeSlider.css');
        wp_enqueue_style('ionslider');
        wp_register_style('ionslider-skin', MAPSVG_PLUGIN_URL . 'css/ion.rangeSlider.skinNice.css');
        wp_enqueue_style('ionslider-skin');

        wp_register_script('handlebars', MAPSVG_PLUGIN_URL . 'js/handlebars.js', null, '4.0.2');
        wp_enqueue_script('handlebars');

        wp_register_script('nanoscroller', MAPSVG_PLUGIN_URL . 'js/jquery.nanoscroller.min.js', null, '0.8.7');
        wp_enqueue_script('nanoscroller');
        wp_register_style('nanoscroller', MAPSVG_PLUGIN_URL . 'css/nanoscroller.css');
        wp_enqueue_style('nanoscroller');

        wp_register_script('codemirror', MAPSVG_PLUGIN_URL . 'js/codemirror.js', null, '1.0');
        wp_enqueue_script('codemirror');
        wp_register_style('codemirror', MAPSVG_PLUGIN_URL . 'css/codemirror.css');
        wp_enqueue_style('codemirror');
        wp_register_script('codemirror.javascript', MAPSVG_PLUGIN_URL . 'js/codemirror.javascript.js', null, '1.0');
        wp_enqueue_script('codemirror.javascript');
//        wp_register_script('codemirror.colorize', MAPSVG_PLUGIN_URL . 'js/codemirror.colorize.js', null, '1.0');
//        wp_enqueue_script('codemirror.colorize');
//        wp_register_script('codemirror.runmode', MAPSVG_PLUGIN_URL . 'js/runmode.js', null, '1.0');
//        wp_enqueue_script('codemirror.runmode');
//        wp_register_script('codemirror.htmlmixed', MAPSVG_PLUGIN_URL . 'js/htmlmixed.js', null, '1.0');
//        wp_enqueue_script('codemirror.htmlmixed');
//        wp_register_script('codemirror.css', MAPSVG_PLUGIN_URL . 'js/css.js', null, '1.0');
//        wp_enqueue_script('codemirror.css');
//        wp_register_script('codemirror.xml', MAPSVG_PLUGIN_URL . 'js/xml.js', null, '1.0');
//        wp_enqueue_script('codemirror.xml');

        wp_register_script('typeahead', MAPSVG_PLUGIN_URL . 'js/typeahead.bundle.min.js', null, '1.0');
        wp_enqueue_script('typeahead');


        if(version_compare($wp_version, "3.8", '>=')){
            wp_register_style('mapsvg-grey', MAPSVG_PLUGIN_URL . 'css/grey.css');
            wp_enqueue_style('mapsvg-grey');
        }
    }
     
}


/**
 * Add submenu element to Plugins
 */
$mapsvg_settings_page = '';

function mapsvg_config_page() {
    global $mapsvg_settings_page;

	if ( function_exists('add_menu_page') )
		$mapsvg_settings_page = add_menu_page('MapSVG', 'MapSVG', 'edit_posts', 'mapsvg-config', 'mapsvg_conf', '', 66);


    add_action('admin_enqueue_scripts', 'mapsvg_add_jscss_admin',0);
}

add_action( 'admin_menu', 'mapsvg_config_page' );


/**
 * Register [mapsvg] shortcode
 */
function mapsvg_print( $atts ){
  global $mapsvg_inline_script;

  $post = get_post($atts['id']);

  if (empty($post->ID))
    return 'Map not found, please check "id" parameter in your shortcode.';

  $data  = '<div id="mapsvg-'.$post->ID.'" class="mapsvg"></div>';
  $script = '<script type="text/javascript">';

  if(!empty($atts['selected'])){
      $country = str_replace(' ','_', $atts['selected']);
      $script .= '
      var mapsvg_options = '.$post->post_content.';
      jQuery.extend( true, mapsvg_options, {regions: {"'.$country.'": {selected: true}}} );
      jQuery("#mapsvg-'.$post->ID.'").mapSvg(mapsvg_options);</script>';
  }else{
      $script .= 'jQuery("#mapsvg-'.$post->ID.'").mapSvg('.$post->post_content.');</script>';
  }
  $mapsvg_inline_script[] = $script;
  
  //wp_footer('script');
  add_action('wp_footer', 'script', 9999);

  //return //wp_specialchars_decode($data);
  return $data;
}
add_shortcode( 'mapsvg', 'mapsvg_print' );


function script(){
    global $mapsvg_inline_script;
    foreach($mapsvg_inline_script as $m){
        echo $m;
    }
}

function so_handle_038($content) {
    $content = str_replace(array("&#038;","&amp;"), "&", $content); // or $url = $original_url
    return $content;
}
add_filter('the_content', 'so_handle_038', 199, 1);

/**
 * Save map settings as custom type post (post_type = mapsvg)
 */
function mapsvg_save( $data ){
    global $wpdb;

    $data_js   = $data['mapsvg_data']; //str_replace('\/', '/', str_replace('\\','\\\\',json_encode(stripslashes_deep($data['m']))));

    $postarr = array(
    	'post_type'    => 'mapsvg',
    	'post_status'  => 'publish'
    );

    $new_title_sql = "";
    if(isset($data['title'])){
        $postarr['post_title'] = $data['title'];
        $new_title_sql = " post_title='".$postarr['post_title']."', ";
    }

      $postarr['post_content'] = $data_js;

    if(isset($data['map_id']) && $data['map_id']!='new'){
        $postarr['ID'] = $data['map_id'];
        $wpdb->query("update $wpdb->posts set ".$new_title_sql." post_content = '".$postarr['post_content']."' WHERE ID = '".$postarr['ID']."'");
        update_post_meta($postarr['ID'], 'mapsvg_version', MAPSVG_VERSION);
        $post_id = $postarr['ID'];
    }else{
        $post_id = wp_insert_post( $postarr );
        $wpdb->query("update $wpdb->posts set ".$new_title_sql."
                     post_content = '".$postarr['post_content']."'
                     WHERE ID = ".$post_id);
        add_post_meta($post_id, 'mapsvg_version', MAPSVG_VERSION);
    }

    return $post_id;
}

function mapsvg_delete($id, $ajax){
    wp_delete_post($id);
    delete_post_meta($id, 'mapsvg_version');
    if(!$ajax)
        wp_redirect(admin_url('plugins.php?page=mapsvg-config'));
}

function mapsvg_copy($id, $new_name){
    global $wpdb;

    $post = &get_post($id);

    $copy_post = array(
    	'post_type'    => 'mapsvg',
    	'post_status'  => 'publish',
    	'post_title'   => $new_name,
        'post_content' => $post->post_content
    );

    $copy_post['post_title'] = str_replace("'", "\'", $copy_post['post_title']);

    $new_id = wp_insert_post($copy_post);

    $copy_post['post_content'] = str_replace("'", "\'", $copy_post['post_content']);

    $wpdb->query("update $wpdb->posts set post_title='".$copy_post['post_title']."',
                 post_content = '".$copy_post['post_content']."'
                 WHERE ID = ".$new_id);


    $version = get_post_meta($id, 'mapsvg_version', true);
    add_post_meta($new_id, 'mapsvg_version', $version);
    return $new_id;
}


/**
 * Remove empty elements from an array
 */
function mapsvg_remove_empty($arr){
    foreach ($arr as $id=>$a){
        if(is_array($a)){
            $arr[$id] = mapsvg_remove_empty($a);
            if(count($arr[$id])==0) unset($arr[$id]);
        }else{
            if($arr[$id] == '') unset($arr[$id]);
        }
    }
    return $arr;
}

/**
 * Import data from excel
 */
function mapsvg_import_csv($uploaded_file){
    require(MAPSVG_PLUGIN_DIR . 'csvparser.php');
    $csv  = new MapsvgCsvParser($uploaded_file);
    return $csv->getData(); 
}


/**
 * Settings page in Admin Panel
 */
function mapsvg_conf(){
    global $mapsvg_page;

    $file       = null;
    $map_chosen = false;
    $svg_filename = "";
    if (isset($_GET['map']))
        $svg_filename = $_GET['map'];

    if(isset($_GET['delete_map']))
        mapsvg_delete($_GET['delete_map']);
        

    if(isset($_POST['upload_svg']) && $_FILES['svg_file']['tmp_name']){
        $target_dir = MAPSVG_MAPS_UPLOADS_DIR;
        $target_file = $target_dir . "/".basename($_FILES["svg_file"]["name"]);
        
        $file_parts = pathinfo($_FILES['svg_file']['name']);
                
        if(strtolower($file_parts['extension'])!='svg'){
            $mapsvg_error = 'Wrong file format ('.$file_parts['extension'].'). Only SVG files are compatible with the plugin.';
        }else{   
            if (@move_uploaded_file($_FILES["svg_file"]["tmp_name"], $target_file)) {
                    $mapsvg_notice = "The file ". basename( $_FILES["svg_file"]["name"]). " has been uploaded.";
            
                    $svg_filename = 'user-uploads/'.basename( $_FILES["svg_file"]["name"]);
            } else {
                    $mapsvg_error = "An error occured during upload of your file. Please check that ".MAPSVG_MAPS_UPLOADS_DIR." folder exists and it has full permissions (777).";
            }            
        }     
    }
    
    
    
    if(isset($_POST['import']) && $_FILES['csv']['tmp_name']){
        
        $file_parts = pathinfo($_FILES['csv']['name']);
                
        if(strtolower($file_parts['extension'])!='csv'){
            $mapsvg_error['file'] = 'Wrong file format ('.$file_parts['extension'].'). Please upload a file in CSV format.';
        }else{
            $import = array();
            $import['data'] = mapsvg_import_csv($_FILES['csv']['tmp_name']);
            $import['type'] = $_POST['import_objects'];

            if(!empty($import['data'])){
                foreach($import['data'] as &$marker){
                    for($i=0;$i<7;$i++){
                        if(empty($marker[$i]))
                            $marker[$i] = '';
                         }                  
                }
                          
                     }
                     

                }
            }

    // If $_GET['map_id'] is set then we should get map's settings and from DB
    $map_id = isset($_GET['map_id']) ? $_GET['map_id'] : 'new';

    $js_mapsvg_options = "";
    if($map_id && $map_id!='new'){
        $post = get_post($map_id);
        $js_mapsvg_options = $post->post_content;
        $mapsvg_version = get_post_meta((int)$map_id, 'mapsvg_version');
    }


    $title = "";
    if($svg_filename || ($map_id && $map_id!='new')){

        $mapsvg_page = 'edit';

        $title = isset($post) && $post->post_title ? $post->post_title : "New map";

        if ($js_mapsvg_options == "" && $svg_filename!="")
            $js_mapsvg_options = json_encode(array('source' => MAPSVG_MAPS_URL.$svg_filename));

        // Load pin images
        $pin_files = @scandir(MAPSVG_PINS_DIR);
        if($pin_files){
            array_shift($pin_files);
            array_shift($pin_files);
        }

        $safeMarkerImagesURL = safeURL(MAPSVG_PINS_URL);
        $markerImages = array();
        foreach($pin_files as $p){
            $markerImages[] = array("url"=>$safeMarkerImagesURL.$p, "file"=>$p);
        }
    }else{
        $mapsvg_page = 'index';
        // Load list of available maps from MAPSVG_MAPS_DIR

        $path = realpath(MAPSVG_MAPS_DIR);
        $maps = array();
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $filename)
        {
            if(strpos($filename,'.svg')!==false){
                $maps[] = str_replace(MAPSVG_MAPS_DIR,'',$filename);

            }
        }

        if(isset($_GET['mapsvg_rollback'])){
            rollBack();
        }

        $generated_maps = get_posts(array('numberposts'=>999, 'post_type'=>'mapsvg'));

        $outdated_maps = getOutdated();
        $num = count($outdated_maps);
        if($num>0){
            // do update
            $num_updated = updateOutdatedMaps($outdated_maps);
            if ($num == 1 && $num_updated = 1)
                $mapsvg_notice = "There was 1 outdated map created in old version of MapSVG. The map was successfully updated.";
            elseif ($num == $num_updated)
                $mapsvg_notice = "There were ".$num." outdated maps created in old versions of MapSVG. All maps were successfully updated.";
            elseif ($num_updated == 0)
                $mapsvg_notice = "An error occured during update of your maps created in previous versions of MapSVG plugin. Please contact MapSVG support to get help.";
            elseif ($num != $num_updated)
                $mapsvg_notice = "There were ".$num." outdated maps created in old versions of MapSVG - and ".$num_updated." were successfully updated.";

        }

    }

    $template = 'template_'.$mapsvg_page.'.inc';

    include(MAPSVG_PLUGIN_DIR.'header.inc');
    include(MAPSVG_PLUGIN_DIR.$template);
    if($template = 'template_edit.inc')
        include (MAPSVG_PLUGIN_DIR.'template_handlebars.hbs');
    include(MAPSVG_PLUGIN_DIR.'footer.inc');

    return true;
}


function ajax_mapsvg_save() {
    if(isset($_POST['data']))
        echo $post_id = mapsvg_save($_POST['data']);
	die();
}
add_action('wp_ajax_mapsvg_save', 'ajax_mapsvg_save');

function ajax_mapsvg_delete() {
    if(isset($_POST['id']))
        mapsvg_delete($_POST['id'], true);
	die();
}
add_action('wp_ajax_mapsvg_delete', 'ajax_mapsvg_delete');

function ajax_mapsvg_copy() {
    if(!empty($_POST['id']) && !empty($_POST['new_name']))
        echo mapsvg_copy($_POST['id'], $_POST['new_name']);
	die();
}
add_action('wp_ajax_mapsvg_copy', 'ajax_mapsvg_copy');

function mapsvg_get() {
    if(isset($_POST['id'])){
        $post = get_post($_POST['id']);
        if (get_post_type($post)!='mapsvg'){
            echo 'Post type must be "mapsvg"';
            die();
        }
        
        $mapsvg_options = $post->post_content;
    }
        echo $mapsvg_options;

	die();
}
add_action('wp_ajax_mapsvg_get', 'mapsvg_get');
add_action( 'wp_ajax_nopriv_mapsvg_get', 'mapsvg_get' ); 


$mapsvg_try = 0;

function ajax_mapsvg_get_coords($addr = false){
    global $mapsvg_try;
    
    $addrs = $_POST['data'] ? $_POST['data'] : array($addr);
    
    if(!empty($addrs)){
        $res = array();
        foreach($addrs as $id=>$a) {
            $data = json_decode(file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($a['location']) . '&sensor=false'), true);
            if ($data['status'] == 'OK') {
                $mapsvg_try = 0;
                $res[$id] = array('index='=> $addrs['index'], 'coords'=>$data['results'][0]['geometry']['location']);
            } elseif ($data['status'] == 'ZERO_RESULTS') {
                $mapsvg_try = 0;
                $res[$id] = array('index'=>$addrs['index'], 'coords'=>array('lat'=>'', 'lng'=>''));
            }elseif($mapsvg_try < 3){
                $mapsvg_try++;
                sleep(1);
                $res[$id] = ajax_mapsvg_get_coords($a);
            }else{
                $mapsvg_try = 0;
                $res[$id] = array('index'=>$addrs['index'], 'coords'=>array('lat'=>'', 'lng'=>''));
            }
        }
    }
    
    if($addr)
        return $res[0];
    else    
        echo json_encode($res);
        
    die();
}
add_action('wp_ajax_mapsvg_get_coords', 'ajax_mapsvg_get_coords');
add_action('wp_ajax_mapsvg_import', 'ajax_mapsvg_import');

/**
 *  Register mapSVG post type
 */
function reg_mapsvg_post_type(){
    $post_args = array(
        'labels' => array(
            'name' => 'MapSVG',
            'singular_name' => 'mapSVG map'),
        'description' => 'Allows you to insert a map to any page of your website',
        'public' => false,
        'show_ui' => false,
        'exclude_from_search' => true,
        'can_export' => true
    );

    register_post_type('mapsvg', $post_args);
}
add_action('init','reg_mapsvg_post_type');

function cleanArray($arr){
    foreach($arr as $k=>$v) {
        if(is_array($v))
            $arr[$k] = cleanArray($v);
        else
            $arr[$k] = trim(htmlspecialchars(strip_tags($v)));
    }
    return $arr;
}

add_action('wp_head','mapsvg_ajaxurl');
function mapsvg_ajaxurl() {
    ?>
        <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        </script>
    <?php
}

function mapsvg_get_post () {

    $pid        = intval($_POST['post_id']);
    $the_query  = new WP_Query(array('p' => $pid));
    $format     = $_POST['format']  == 'html' ? 'html' : 'json';

    if ($the_query->have_posts()) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();

            if($format == 'html'){
                $data = '
                    <div class="post-container">
                        <div id="project-content">
                            <h1 class="entry-title">'.get_the_title().'</h1>
                            <div class="entry-content">'.get_the_content().'</div>
                        </div>
                    </div>
                ';
            }else{
                $data = json_encode(array("title"=>get_the_title(),"content"=>get_the_content()));
            }

        }
    }
    else {
        echo __('Didnt find anything', THEME_NAME);
    }
    wp_reset_postdata();


    echo $data;
}

add_action ( 'wp_ajax_nopriv_load-content', 'mapsvg_get_post' );
add_action ( 'wp_ajax_load-content', 'mapsvg_get_post' );

function safeURL($url){
    if(strpos("http://",$url) == 0 || strpos("https://",$url) == 0)
        $url = "//".array_pop(explode("://", $url));
    return $url;
}

function getOldOptions(){
    global $wpdb;

    $r = $wpdb->get_results("
        SELECT meta_value FROM ".$wpdb->postmeta." WHERE meta_key = 'mapsvg_options'
    ");
    foreach ( $r as $other_version ){
        ?>
            <script type="text/javascript">
                console.log(<?php json_encode($other_version)?>);
            </script>
        <?php
    }


}

function getOutdated(){
    global $wpdb;

    $r = $wpdb->get_results("
        SELECT t.pid as id, t.ver as version FROM (SELECT p.ID as pid, pm.meta_value as ver FROM ".$wpdb->posts." p
        LEFT JOIN ".$wpdb->postmeta." pm ON pm.post_id = p.ID AND pm.meta_key = 'mapsvg_version'
        WHERE p.post_type='mapsvg') t WHERE t.ver != '".MAPSVG_VERSION."' OR t.ver IS NULL
    ");

    $maps_outdated = array();

    if($r)
        foreach ( $r as $other_version ){
            if($other_version->version == null || version_compare($other_version->version, '2.0.0', '<')){
                $maps_outdated[$other_version->id] = $other_version->version ? $other_version->version : '1.6.4' ;
            }
        }


    return $maps_outdated;
}

function updateOutdatedMaps($maps){
    $i = 0;
    if($maps)
        foreach($maps as $id=>$version){
            if($version == null || version_compare($version,'2.0.0','<'))
                if(updateMapTo2($id))
                    $i++;
        }
    return $i;
}

function updateMapTo2($id){
    $d = get_post_meta($id,'mapsvg_options');
    if($d && isset($d[0]['m']))
        $data = $d[0]['m'];
    else
        return false;

    $events = array();
    if(isset($d[0]['events']))
        foreach($d[0]['events'] as $key=>$val)
            if(!empty($val))
                $events[$key] = $val;


    if(isset($data['pan'])){
        // do
        $data['scroll'] = array('on'=>($data['pan']=="1"));
        unset($data['pan']);
    }


    if(isset($data['zoom'])){
        $data['zoom'] = array('on'=>($data['zoom']=="1"));
    }else{
        $data['zoom'] = array();
    }

    if(isset($data['zoomButtons'])){
        $data['zoom']['buttons'] = array('location'=>$data['zoomButtons']['location']);
        unset($data['zoomButtons']);
    }
    if(isset($data['zoomLimit'])){
        $data['zoom']['limit'] = $data['zoomLimit'];
        unset($data['zoomLimit']);
    }
    if(isset($data['zoomDelta'])){
        unset($data['zoomDelta']);
    }
    if(isset($data['popover'])){
        unset($data['popover']);
    }

    if(isset($data['tooltipsMode'])){
        $data['tooltips'] = array('mode'=>($data['tooltipsMode']=='names'?'id':'off'));
        unset($data['tooltipsMode']);
    }

    if(isset($data['regions'])){
        if(count($data['regions'])>0){
            foreach($data['regions'] as &$r){
                if(isset($r['attr'])){
                    foreach($r['attr'] as $key=>$value){
                        if(!empty($value))
                            $r[$key] = $value;
                    }
                    unset($r['attr']);
                }
            }
        }
    }

    if(isset($data['marks'])){
        if(count($data['marks'])>0){
            $data['markers'] = $data['marks'];
            $inc = 0;
            foreach($data['markers'] as &$m){
                $m['id'] = 'marker_'.$inc;
                $inc++;
                if(isset($m['attrs'])){
                    foreach($m['attrs'] as $key=>$value){
                        if(!empty($value))
                            $m[$key] = $value;
                    }
                    unset($m['attrs']);
                }
            }
        }
        unset($data['marks']);
    }

    $data = json_encode($data);
    // We should add events to options separately as they
    // shouldn't be enclosed with quotes by json_encode
    $str = array();
    if(!empty($events)){
        foreach($events as $e=>$func)
            $str[] = $e.':'.stripslashes_deep($func);
        $events = implode(',',$str);

        $data = substr($data,0,-1).','.$events.'}';
    }

//        $data = str_replace("'","\'",$data);
    $data = addslashes($data);

//    delete_post_meta($id, 'mapsvg_options');
    mapsvg_save(array('map_id'=>$id, 'mapsvg_data'=>$data));

    return true;
}

function rollBack(){
    global $wpdb;

    $res = $wpdb->get_results("
        SELECT post_id, meta_value FROM ".$wpdb->postmeta." WHERE meta_key = 'mapsvg_options'
    ");
    foreach ( $res as $r ){
        delete_post_meta($r->post_id, 'mapsvg_version');
    }
}

?>