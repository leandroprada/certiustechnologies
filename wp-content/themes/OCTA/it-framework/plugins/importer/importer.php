<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

// Import demo data
if( ! function_exists( 'it_import_data' ) ) {
    function it_import_data() {
        
        if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);
        require_once ABSPATH . 'wp-admin/includes/import.php';
          
        if ( ! class_exists( 'WP_Importer' ) ) {
            $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
            if ( file_exists( $class_wp_importer ) ){
                require $class_wp_importer;
            }
        }
           
        if ( ! class_exists( 'WP_Import' ) ) {
            
            $plug_dir = ABSPATH . 'wp-content/plugins/octa-core'; 
            
            $class_wp_importer = $plug_dir . '/inc/importer/wordpress-importer.php';
            
            if ( file_exists( $class_wp_importer ) )
                require $class_wp_importer;
                
            locate_template('it-framework/plugins/importer/import.php',true);
        }
        
        if ( class_exists( 'WP_Import' ) ) {
            $import_filepath = FRAMEWORK_PLUGIN_DIR . '/importer/content/content.xml';
            
            $theme_options_file = FRAMEWORK_PLUGIN_URI . '/importer/content/theme_options.txt';

            $data = wp_remote_get( $theme_options_file );
            $options = unserialize( $data['body'] );
            
            if ( !empty( $data ) || is_array( $data ) ) {

                foreach ($options as $option) {
                    update_option($option->option_name, unserialize($option->option_value));
                }

            }           
                    
            $attachment = ( ! empty( $_POST['attachment'] ) ) ? true : false;
            $wp_import = new it_import();
            $wp_import->fetch_attachments = $attachment;
            $wp_import->import($import_filepath);
            
            // Import octa Portfolio Grids...
            if ( class_exists( 'boo_globals' ) ){
                $oc_portfolio_file = FRAMEWORK_PLUGIN_URI . '/importer/content/octa_portfolio.json';
                
                $response = wp_remote_get( $oc_portfolio_file );
                $body = wp_remote_retrieve_body($response);
                $port_data = json_decode( $body, true );

                global $wpdb;
                global $table_prefix;
                $oc_settings_tbl = $table_prefix . 'octa_portfolio_setting';

                $gridSetting = $wpdb->get_results("SELECT * FROM {$oc_settings_tbl}");
                
                $grst_Alias = array();
                foreach ($gridSetting as $booAli) {
                    $grst_Alias[] = $booAli->alias;
                }

                $grst_Alias2 = implode(" ", $grst_Alias);
                
                foreach ($port_data as $row) {
                    if (strpos($grst_Alias2, $row['alias']) !== false) {
                        $getAlias = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$oc_settings_tbl} WHERE  alias=%s ", $row['alias']));
                        foreach ($conficArr as $key => $value) {
                            if ($value['name'] == 'id') {
                                $itemArray[$value['name']] = $getAlias->id;
                            } elseif ($value['name'] == 'oldalias') {
                               // nothing here... 
                            } else {
                                $itemArray[$value['name']] = $row[$value['name']];
                            }
                        }
                        $settingData = $itemArray;
                        $where = array('id' => $getAlias->id);
                        $wpdb->update($oc_settings_tbl, $settingData, $where);
                    } else {
                        unset($row['oldalias']);
                        $wpdb->insert($oc_settings_tbl, $row);
                    }
                }
                
            } 
            
            // Import Pricing Tables...
            if ( class_exists( 'GW_GoPricing_Data' ) ) {
                
                $file = FRAMEWORK_PLUGIN_DIR . '/importer/content/go_pricing.txt';
                
                GW_GoPricing_AdminPage_Impex::import( $file , true , '' );
                
            }
            
            //Import Sliders...
            if (class_exists('RevSlider')) {
                $rvfile = ABSPATH . 'wp-content/plugins/octa-core/assets/sliders/';
                $rev_files = array(
                    $rvfile.'01-main-slider.zip',
                    $rvfile.'02-home-corporate-1-slider.zip',
                    $rvfile.'03-home-corporate-2-slider.zip',
                    $rvfile.'04-home-corporate-3-slider.zip',
                    $rvfile.'05-home-lawyer-slider.zip',
                    $rvfile.'06-home-medical-slider.zip',
                    $rvfile.'07-home-real-estate-slider.zip',
                    $rvfile.'08-home-restaurant-slider.zip',
                    $rvfile.'09-home-shop-1-slider.zip',
                );
                foreach ($rev_files as $rev_file) {
                    $_FILES['import_file']['tmp_name'] = $rev_file;
                    $slider = new RevSlider();
                    $slider->importSliderFromPost(true, 'none');
                }
            }    
            
               
            $wp_import->check();
            
            //Add sidebar widget areas
            /****************** Main sidebar *************************/
            register_sidebar(array(
                'name' => 'Secondary SideBar',
                'id' => 'sidebar-2',
                'before_widget' => '<li class="widget %2$s shape">',
                'after_widget' => '</div></li>',
                'before_title' => '<h4 class="widget-head main-color">',
                'after_title' => '</h4><div class="widget-content">',
            ));
            register_sidebar( array(
                'name' => 'Top Footer Widgets',
                'id' => 'top-footer-widgets',
                'before_widget' => '<div class="widget %2$s col-md-12">',
                'after_widget' => '</div>',
                'description' => 'Appears in the top footer bar',
                'before_title' => '<h4 class="block-head">',
                'after_title' => '</h4>'
            ));
            
            register_sidebar( array(
                'name' => 'Middle Footer Widgets',
                'id' => 'midle-footer-widgets',
                'before_widget' => '<div class="widget %2$s col-md-3">',
                'after_widget' => '</div>',
                'description' => 'Appears in the middle footer area',
                'before_title' => '<h4 class="block-head">',
                'after_title' => '</h4>'
            ));
            
            register_sidebar( array(
                'name' => 'Footer Bottom Widgets',
                'id' => 'footer-bottom-widgets',
                'before_widget' => '<div class="widget %2$s col-md-6">',
                'after_widget' => '</div>',
                'description' => 'Appears in the footer bottom bar',
                'before_title' => '<h4 class="block-head">',
                'after_title' => '</h4>'
            ));
            
            register_sidebar( array(
                'name' => 'Magazine SideBar',
                'id' => 'side-1',
                'before_widget' => '<div class="widget %2$s">',
                'after_widget' => '</div>'
            ));
            
            register_sidebar( array(
                'name' => 'Mega Menu 1',
                'id' => 'side-2',
                'before_widget' => '<div class="widget %2$s">',
                'after_widget' => '</div>'
            ));
            
            register_sidebar( array(
                'name' => 'Mega Menu 2',
                'id' => 'side-3',
                'before_widget' => '<div class="widget %2$s">',
                'after_widget' => '</div>'
            ));
            
            register_sidebar( array(
                'name' => 'Mega Menu 3',
                'id' => 'side-4',
                'before_widget' => '<div class="widget %2$s">',
                'after_widget' => '</div>'
            ));
            
            register_sidebar( array(
                'name' => 'Sliging Bar Content ',
                'id' => 'side-5',
                'before_widget' => '<div class="widget %2$s">',
                'after_widget' => '</div>'
            ));
            
            // Add data to widgets
            $widgets_json = FRAMEWORK_PLUGIN_URI . '/importer/content/widgets.json';
            $widgets_json = wp_remote_get( $widgets_json );
            $widget_data = $widgets_json['body'];
            
            $import_widgets = it_import_widget_data( $widget_data );
            die();
        }  
    }
    
    function it_import_widget_data( $widget_data ) {
        $json_data = $widget_data;
        $json_data = json_decode( $json_data, true );
        
        $sidebar_data = $json_data[0];
        $widget_data = $json_data[1];
        
        foreach ( $widget_data as $widget_data_title => $widget_data_value ) {
            $widgets[ $widget_data_title ] = '';
            foreach( $widget_data_value as $widget_data_key => $widget_data_array ) {
                if( is_int( $widget_data_key ) ) {
                    $widgets[$widget_data_title][$widget_data_key] = 'on';
                }
            }
        }
        unset($widgets[""]);

        foreach ( $sidebar_data as $title => $sidebar ) {
            $count = count( $sidebar );
            for ( $i = 0; $i < $count; $i++ ) {
                $widget = array( );
                $widget['type'] = trim( substr( $sidebar[$i], 0, strrpos( $sidebar[$i], '-' ) ) );
                $widget['type-index'] = trim( substr( $sidebar[$i], strrpos( $sidebar[$i], '-' ) + 1 ) );
                if ( !isset( $widgets[$widget['type']][$widget['type-index']] ) ) {
                    unset( $sidebar_data[$title][$i] );
                }
            }
            $sidebar_data[$title] = array_values( $sidebar_data[$title] );
        }

        foreach ( $widgets as $widget_title => $widget_value ) {
            foreach ( $widget_value as $widget_key => $widget_value ) {
                $widgets[$widget_title][$widget_key] = $widget_data[$widget_title][$widget_key];
            }
        }

        $sidebar_data = array( array_filter( $sidebar_data ), $widgets );

        it_parse_import_data( $sidebar_data );
    }

    function it_parse_import_data( $import_array ) {
        global $wp_registered_sidebars;
        $sidebars_data = $import_array[0];
        $widget_data = $import_array[1];
        $current_sidebars = get_option( 'sidebars_widgets' );
        $new_widgets = array( );

        foreach ( $sidebars_data as $import_sidebar => $import_widgets ) {

            foreach ( $import_widgets as $import_widget ) {
                //if the sidebar exists
                if ( isset( $wp_registered_sidebars[$import_sidebar] ) ) {
                    $title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
                    $index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
                    $current_widget_data = get_option( 'widget_' . $title );
                    $new_widget_name = it_get_new_widget_name( $title, $index );
                    $new_index = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

                    if ( !empty( $new_widgets[ $title ] ) && is_array( $new_widgets[$title] ) ) {
                        while ( array_key_exists( $new_index, $new_widgets[$title] ) ) {
                            $new_index++;
                        }
                    }
                    $current_sidebars[$import_sidebar][] = $title . '-' . $new_index;
                    if ( array_key_exists( $title, $new_widgets ) ) {
                        $new_widgets[$title][$new_index] = $widget_data[$title][$index];
                        $multiwidget = $new_widgets[$title]['_multiwidget'];
                        unset( $new_widgets[$title]['_multiwidget'] );
                        $new_widgets[$title]['_multiwidget'] = $multiwidget;
                    } else {
                        $current_widget_data[$new_index] = $widget_data[$title][$index];
                        $current_multiwidget = isset($current_widget_data['_multiwidget']) ? $current_widget_data['_multiwidget'] : false;
                        $new_multiwidget = isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;  
                        $multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
                        unset( $current_widget_data['_multiwidget'] );
                        $current_widget_data['_multiwidget'] = $multiwidget;
                        $new_widgets[$title] = $current_widget_data;
                    }

                }
            }
        }

        if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
            update_option( 'sidebars_widgets', $current_sidebars );

            foreach ( $new_widgets as $title => $content )
                update_option( 'widget_' . $title, $content );

            return true;
        }

        return false;
    }

    function it_get_new_widget_name( $widget_name, $widget_index ) {
        $current_sidebars = get_option( 'sidebars_widgets' );
        $all_widget_array = array( );
        foreach ( $current_sidebars as $sidebar => $widgets ) {
            if ( !empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
                foreach ( $widgets as $widget ) {
                    $all_widget_array[] = $widget;
                }
            }
        }
        while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
            $widget_index++;
        }
        $new_widget_name = $widget_name . '-' . $widget_index;
        return $new_widget_name;
    }

    add_action( 'wp_ajax_my_action', 'it_import_data' );
}


