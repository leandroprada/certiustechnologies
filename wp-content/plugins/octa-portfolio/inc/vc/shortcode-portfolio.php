<?php
return array(
    "name" => PLUGIN_NAME,
    "base" => PLUGIN_PFX,
    'category' => esc_html__( 'Content', 'js_composer' ),
    'description' => esc_html__( 'Add OCTA Grid Shortcode', PLUGIN_SLUG ),
    'icon' => PLUGIN_URI.'/assets/admin/images/short-logo.png',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Choose Grid", PLUGIN_SLUG ),
            "param_name" => "alias",
            "value" => it_dropdown_grids(),
         )
    )
);
    
