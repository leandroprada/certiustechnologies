<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

// Fix Widget Title if Empty
/*function fix_widget_title($title) {
    $title = $title;
    if($title ==""){
        $title=" ";
    }
    return $title;
}
add_filter('widget_title', 'fix_widget_title');*/

foreach ( glob( FRAMEWORK_DIR.'/widgets/it-widget-*.php' ) as $widget) {
    include_once( get_parent_theme_file_path('/it-framework/widgets/'. basename( $widget )) );
}

global $wc_options;
if ( ( !$wc_options = get_option( 'widget_css' ) ) || !is_array( $wc_options ) )
$wc_options = array();
if ( is_admin() ) {
    add_action( 'sidebar_admin_setup', 'widget_css_expand_control' );
    add_filter( 'widget_update_callback', 'widget_css_widget_update_callback', 10, 3 );
} else {
    add_filter( 'dynamic_sidebar_params', 'widget_css_widget_display_callback', 10 );
}

function widget_css_expand_control() {
    
    global $wp_registered_widgets, $wp_registered_widget_controls, $wc_options;
    
    if ( 'post' == strtolower( $_SERVER['REQUEST_METHOD'] ) ) {
        foreach ( (array) $_POST['widget-id'] as $widget_number => $widget_id ) {
            if ( isset( $_POST[$widget_id . '-widget_css'] ) )
            $wc_options[$widget_id] = $_POST[$widget_id . '-widget_css'];
        }
        $regd_plus_new = array_merge( array_keys( $wp_registered_widgets ), array_values( (array) $_POST['widget-id'] ), array( 'widget_css-options-filter', 'widget_css-options-wp_reset_query' ) );
        foreach ( array_keys( $wc_options ) as $key ) {
            if ( !in_array( $key, $regd_plus_new ) )
            unset( $wc_options[$key] );
        }
    }
    
    if ( isset( $_POST['widget_css-options-submit'] ) ) {
        $wc_options['widget_css-options-filter'] = $_POST['widget_css-options-filter'];
        $wc_options['widget_css-options-wp_reset_query'] = $_POST['widget_css-options-wp_reset_query'];
    }
    
    update_option( 'widget_css', $wc_options );
    
    foreach ( $wp_registered_widgets as $id => $widget ) {
        if ( !$wp_registered_widget_controls[$id] )
        wp_register_widget_control( $id, $widget['name'], 'widget_css_empty_control' );
        $wp_registered_widget_controls[$id]['callback_wc_redirect'] = $wp_registered_widget_controls[$id]['callback'];
        $wp_registered_widget_controls[$id]['callback'] = 'widget_css_extra_control';
        array_push( $wp_registered_widget_controls[$id]['params'], $id );
    }
}

function widget_css_empty_control() {
}

function widget_css_extra_control() {
    global $wp_registered_widget_controls, $wc_options;
    $params = func_get_args();
    $id = array_pop( $params );
    $callback = $wp_registered_widget_controls[$id]['callback_wc_redirect'];
    if ( is_callable( $callback ) )
    call_user_func_array( $callback, $params );
    $value = !empty( $wc_options[$id] ) ? htmlspecialchars( stripslashes( $wc_options[$id] ), ENT_QUOTES ) : '';
    $number = $params[0]['number'];
    if ( $number == -1 ) {
        $number = "%i%";
        $value = "";
    }
    $id_disp = $id;
    if ( isset( $number ) )
    $id_disp = $wp_registered_widget_controls[$id]['id_base'] . '-' . $number;
    echo "<p><label for='" . esc_attr($id_disp) . "-widget_css'>CSS Class</label><input class='widefat' name='" . esc_attr($id_disp) . "-widget_css' id='" . esc_attr($id_disp) . "-widget_css' type='text' value='" . esc_attr($value) . "' /></p>";
}

function widget_css_widget_update_callback( $instance, $new_instance, $this_widget ) {
    global $wc_options;
    $widget_id = $this_widget->id;
    if ( isset( $_POST[$widget_id . '-widget_css'] ) ) {
        $wc_options[$widget_id] = $_POST[$widget_id . '-widget_css'];
        update_option( 'widget_css', $wc_options );
    }
    return $instance;
}

function widget_css_widget_display_callback( $params ) {
    global $wp_registered_widgets;
    $id = $params[0]['widget_id'];
    $wc_options = maybe_unserialize( get_option( 'widget_css' ) );
    if ( is_array( $wc_options ) && array_key_exists( $id, $wc_options ) ) {
        $option_val = $wc_options[$id];
    }
    if ( !empty( $option_val ) ) {
        $classe_to_add = $option_val;
        $classe_to_add = 'class="' . $classe_to_add . ' ';
        $params[0]['before_widget'] = str_replace( 'class="', $classe_to_add, $params[0]['before_widget'] );
    }
    return $params;
}