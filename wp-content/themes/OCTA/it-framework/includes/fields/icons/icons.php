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
  
$request = FRAMEWORK_URI.'/includes/fields/icons/fontawesome.json';          
$response = wp_remote_get( $request );
$body = wp_remote_retrieve_body($response);
$icons = json_decode( $body, true );

$request_icomoon = FRAMEWORK_URI.'/includes/fields/icons/icomoon.json';          
$response_icomoon = wp_remote_get( $request_icomoon );
$body_icomoon = wp_remote_retrieve_body($response_icomoon);
$icons_icomoon = json_decode( $body_icomoon, true );

$request_openiconic = FRAMEWORK_URI.'/includes/fields/icons/openiconic.json';
$response_openiconic = wp_remote_get( $request_openiconic );
$body_openiconic = wp_remote_retrieve_body($response_openiconic);
$icons_openiconic  = json_decode( $body_openiconic, true );

$request_stroke = FRAMEWORK_URI.'/includes/fields/icons/Pe-icon-7-stroke.json';
$response_stroke = wp_remote_get( $request_stroke );
$body_stroke = wp_remote_retrieve_body($response_stroke);
$icons_stroke  = json_decode( $body_stroke, true );

$request_entypo = FRAMEWORK_URI.'/includes/fields/icons/entypo.json';
$response_entypo = wp_remote_get( $request_entypo );
$body_entypo = wp_remote_retrieve_body($response_entypo);
$icons_entypo  = json_decode( $body_entypo, true );

$request_lineaicons = FRAMEWORK_URI.'/includes/fields/icons/lineaicons.json';
$response_lineaicons = wp_remote_get( $request_lineaicons );
$body_lineaicons = wp_remote_retrieve_body($response_lineaicons);
$icons_lineaicons  = json_decode( $body_lineaicons, true );

?> 
<div class="it_add_icon" style="display: none;"> 
    <div class="add_i">
    <h3>Choose an icon <a class="close-login" href="#"><i class="fa fa-times"></i></a></h3>
    <h4 class="icons-sel-head">
        <span style="font-size: 13px;line-height: 20px;">Select From Icon Library:</span> <select name="type" class="select_icon">
            <option class="fontawesome" value="fontawesome" selected="selected">Font Awesome</option>
            <option class="icomoon" value="icomoon">IcoMoon</option>
            <option class="lineaicon" value="lineaicon">Linea Icons</option>
            <option class="Pe-icon-7-stroke" value="Pe-icon-7-stroke">Pe-icon-7-stroke</option>
            <option class="openiconic" value="openiconic">Open Iconic</option>
            <option class="entypo" value="entypo">Entypo</option>
        </select>
    </h4>

    <div class="icons_set">
        
        <div class="fontawesome">
            <div style="padding: 10px 0;"><input type="text" placeholder="Search for icon..." class="regular-text iconSearch"></div>
            <?php   
                foreach($icons["items"] as $ico){
                    print '<a href="#" data-icon="'.$ico.'"><i class="fa '.$ico.'"></i></a>';
                };
            ?>
        </div> 
        
        <div class="icomoon">
            <div style="padding: 10px 0;"><input type="text" placeholder="Search for icon..." class="regular-text iconSearch"></div>
            <?php   
                foreach($icons_icomoon["icons"] as $ico){
                    print '<a href="#" data-icon="icmon-'.$ico['properties']['name'].'"><i class="icmon-'.$ico['properties']['name'].'"></i></a>';
                };
            ?>
        </div> 
        
        <div class="lineaicon">
            <div style="padding: 10px 0;"><input type="text" placeholder="Search for icon..." class="regular-text iconSearch"></div>
            <?php   
                foreach($icons_lineaicons["icons"] as $ico){
                    print '<a href="#" data-icon="lineaico-'.$ico['properties']['name'].'"><i class="lineaico-'.$ico['properties']['name'].'"></i></a>';
                };
            ?>
        </div>
        
        <div class="Pe-icon-7-stroke">
            <div style="padding: 10px 0;"><input type="text" placeholder="Search for icon..." class="regular-text iconSearch"></div>
            <?php   
                foreach($icons_stroke["icons"] as $ico){
                    print '<a href="#" data-icon="pe-7s-'.$ico['properties']['name'].'"><i class="pe-7s-'.$ico['properties']['name'].'"></i></a>';
                };
            ?>
        </div>  
        
        <div class="openiconic">
            <div style="padding: 10px 0;"><input type="text" placeholder="Search for icon..." class="regular-text iconSearch"></div>
            <?php   
                foreach($icons_openiconic["items"] as $ico){
                    print '<a href="#" data-icon="'.$ico.'"><i class="oiconic '.$ico.'"></i></a>';
                };
            ?>
        </div> 
        
        <div class="entypo">
            <div style="padding: 10px 0;"><input type="text" placeholder="Search for icon..." class="regular-text iconSearch"></div>
            <?php   
                foreach($icons_entypo["items"] as $ico){
                    print '<a href="#" data-icon="'.$ico.'"><i class="'.$ico.'"></i></a>';
                };
            ?>
        </div>

    </div>
</div>
</div>